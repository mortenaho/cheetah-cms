<?php

namespace App\Http\Controllers\Customer;

use AdminHelper;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    //
    public function login()
    {
        return view('customer.login.login');
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
                return json_encode($jsonAnswer);
                //return redirect("/login/admin");
            }
        } catch (\Exception $exp) {
Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file"=>$exp->getFile(),"line" => $exp->getLine()]);
            $jsonAnswer = array('status' => 'false','message'=>'خطایی در سرور رخ داده است');
            return json_encode($jsonAnswer);
            //return redirect("/login/admin");
        }
    }

    public function register()
    {
        return view('home.login.register');
    }

    public function activate()
    {
        return view('home.login.activate');
    }

    public function recover()
    {
        return view('home.login.recover');
    }

    public function logOut()
    {
       auth()->logout();
        return redirect("/");
    }
}
