<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests\HomeContactUsRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;

use App\Repositories\CustomerRepository;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use DateInterval;
use DateTime;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\View;

//This is test for git
class LoginController extends Controller
{
    private $lang;

    public function __construct()
    {
        $this->lang = App::getLocale();
        $site = DB::table("setting")->first();
    }

    public function login()
    {
        //dd($_GET["redirect"]);
        return view('home.login.login');
    }

    public function register()
    {
        return view('home.login.register');
    }

    public function activate($locale,$id)
    {
        //$encryptId = encryptData("hashKey",18);
        $decryptId = decryptData("hashKey",$id);
        dd($decryptId);
        $user= User::select("*")->where("id",$decryptId)
            ->first();

        if(!$user){
            return abort(404, trans("messages.404"));
        }
        return view('home.login.activate',compact('user'));
    }

    public function recover()
    {
        return view('home.login.recover');
    }

    public function registerRequest(Request $request)
    {
        try {

            $digits = 4;
            $code =  rand(pow(10, $digits-1), pow(10, $digits)-1);

            $request->request->add(["ip", $request->ip()]);
            $request->request->add(["user_type", 0]);
            $request->request->add(["code", $code]);
            $request->request->add(["status", 1]);

            $user_type=2; // customer
            $email = $request["email"];
            $first_name = $request["first_name"];
            $last_name = $request["last_name"];
            $mobile = $request["mobile"];
            $password = Hash::make($request['password']);
            $address = $request["address"];
            $post_code = $request["postal_code"];
            $statue = 1;
            $is_active=0;

            //server validation
            $userEmail=User::select("*")->where("email",$email)
                ->first();
            if($userEmail){
                return \response()->json(["status" => "false","message"=>"این ایمیل قبلا ثبت شده است"], 200);
            }

            $userMobile=User::select("*")->where("mobile",$mobile)
                ->first();
            if($userMobile){
                return \response()->json(["status" => "false","message"=>"این موبایل قبلا ثبت شده است"], 200);
            }
            //---------------

            $userRepo = new UserRepository();
            $param = ["email" => $email,
                "first_name" => $first_name, "last_name" =>  $last_name,
                "mobile" => $mobile, "password" => $password,"user_type"=>$user_type, "code" =>$code,
                "is_active" => $is_active,  "created_at" => Carbon::now(),"updated_at" => Carbon::now(),
                "remember_token" => "","status" =>$statue];

            $res = $userRepo->insert($param);



            if ($res > 0) {

                $customerRepo  = new CustomerRepository();
                $customerParams = ["user_id" => $res,
                    "address" => $address, "postal_code" =>  $post_code,
                    "province" => "","city"=>"","phone" =>"","created_at" => Carbon::now(),"updated_at" => Carbon::now()];

                $resCustomer = $customerRepo->insert($customerParams);
                $resSMS = sendOTP($code, $mobile);
                $hashId= encryptData("hashKey",$res);
                return \response()->json(["status" => "true","hashId"=>$hashId], 200);
            }
            else
                return \response()->json(["status" => "false"], 200);
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "line" => $exp->getLine()]);
            return \response()->json(["status" => "false","err"=>$exp->getMessage()], 500);
        }
    }

    public function resendCode(Request $request)
    {
        try {

            $mobile = $request["mobile"];

            $user=User::select("*")->where("mobile",$mobile)
                ->first();

            if(!$user){
                return \response()->json(["status" => "false","message"=>"این موبایل  ثبت نشده است"], 200);
            }

            if($user && $user->is_active ){
                return \response()->json(["status" => "false","message"=>"این موبایل  قبلا  فعال شده است"], 200);
            }

            $digits = 4;
            $code =  rand(pow(10, $digits-1), pow(10, $digits)-1);

            $userRepo = new UserRepository();
            $param = ["code" =>$code,"updated_at" => Carbon::now() ];
            $res = $userRepo->updateUser($param,$user->id);

            $minutes_to_add = 5;
            $time = Carbon::now();
            $time->add(new DateInterval('PT' . $minutes_to_add . 'M'));

            if ($res > 0) {
                return \response()->json(["status" => "true","new_time"=>$time], 200);
            }
            else
                return \response()->json(["status" => "false"], 200);
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "line" => $exp->getLine()]);
            return \response()->json(["status" => "false","err"=>$exp->getMessage()], 500);
        }
    }

    public function activateRequest(Request $request)
    {
        try {

            $mobile = $request["mobile"];
            $code = $request["otp"];

            $user=User::select("*")->where("mobile",$mobile)
                ->first();

            if(!$user){
                return \response()->json(["status" => "false","message"=>"این موبایل  ثبت نشده است"], 200);
            }

            if($user && $user->is_active ){
                return \response()->json(["status" => "false","message"=>"این موبایل  قبلا  فعال شده است"], 200);
            }

            if($user && $user->code != $code  ){
                return \response()->json(["status" => "false","message"=>"کد ورودی نا معتبر می باشد"], 200);
            }

            $minutes_to_add = 5;
            // $date = date_create_from_format('Y/m/d H:i:s', $user->updated_at);
            $date = new DateTime($user->updated_at);
             //dd($date);
            $date->add(new DateInterval('PT' . $minutes_to_add . 'M'));

            if($user && $date < Carbon::now()  ){
                return \response()->json(["status" => "false","message"=>"کد ورودی نا معتبر می باشد - منقضی شد"], 200);
            }
            //---------------

            $userRepo = new UserRepository();
            $res = $userRepo->Activate($user->id);

            if ($res > 0) {
                auth()->loginUsingId($user->id);
                return \response()->json(["status" => "true"], 200);
            }
            else
                return \response()->json(["status" => "false"], 200);
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "line" => $exp->getLine()]);
            return \response()->json(["status" => "false","err"=>$exp->getMessage()], 500);
        }
    }

    public function loginRequest(LoginRequest $request)
    {
        try {
            if (auth()->attempt(["email"=>$request->email,"password"=>$request->password],true)) {
                $jsonAnswer = array('status' => 'true','message'=>'ورود موفق');
                return json_encode($jsonAnswer);
                //return redirect()->intended('admin');
            } else {
                $msg = AdminHelper::adminAlert(trans("messages.user_not_exist"), "error");
                AdminHelper::TempData("msg", $msg);
                $jsonAnswer = array('status' => 'false','message'=>trans("messages.user_not_exist"));
                dd($jsonAnswer);
                return json_encode($jsonAnswer);
                //return redirect("/login/admin");
            }
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file"=>$exp->getFile(),"line" => $exp->getLine()]);
            $jsonAnswer = array('status' => 'false','message'=>'خطایی در سرور رخ داده است');
            dd($jsonAnswer);
            return json_encode($jsonAnswer);
            //return redirect("/login/admin");
        }
    }

    public function logOut()
    {
        auth()->logout();
        return redirect("/");
    }
}
