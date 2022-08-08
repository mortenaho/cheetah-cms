<?php

namespace App\Http\Controllers\Admin;

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
    public function index()
    {
        //auth()->loginUsingId(1);
        if (Auth::check()) {
            return redirect("/admin");
        } else {
            return view('admin.login.index');
        }
    }

    public function login(LoginRequest $request)
    {
        try {

            if (auth()->attempt(["email" => $request->email, "password" => $request->password,"user_type"=>1], true)) {
                $jsonAnswer = array('status' => 'true', 'message' => 'ورود موفق');
                return json_encode($jsonAnswer);
                //return redirect()->intended('admin');
            } else {
                $msg = AdminHelper::adminAlert(trans("messages.user_not_exist"), "error");
                AdminHelper::TempData("msg", $msg);
                $jsonAnswer = array('status' => 'false', 'message' => trans("messages.user_not_exist"));
                return json_encode($jsonAnswer);
                //return redirect("/login/admin");
            }
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            $jsonAnswer = array('status' => 'false', 'message' => 'خطایی در سرور رخ داده است');
            return json_encode($jsonAnswer);
            //return redirect("/login/admin");
        }
    }

    public function logOut()
    {
        auth()->logout();
        return redirect("/login/admin");
    }
}
