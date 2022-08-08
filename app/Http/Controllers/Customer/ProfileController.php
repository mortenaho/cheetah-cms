<?php

namespace App\Http\Controllers\Customer;

use AdminHelper;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\ProfileRequest;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;

class ProfileController extends Controller
{
    public function __construct()
    {
        View::share('CurrentPage', 'profile');
    }

    public function index()
    {
        try {
            $id = auth()->user()->id;
            $profile = new UserRepository();
            $model = $profile->getUser($id);
            return view("admin.profile.index", compact("model"));
        } catch (\Exception $exp) {
Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file"=>$exp->getFile(),"line" => $exp->getLine()]);
            $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/profile");
        }
    }

    public function update(ProfileRequest $request)
    {
        try {

            $id = auth()->user()->id;
            /// update to database
            $profileRepo = new UserRepository();
            $profileRepo->updateUser($request->only($profileRepo->profile), $id);
            $msg = AdminHelper::adminAlert(trans("messages.op_ok"), "success");
            AdminHelper::TempData("msg", $msg);

            return redirect("/admin/profile");
        } catch (\Exception $exp) {
Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file"=>$exp->getFile(),"line" => $exp->getLine()]);
            $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/profile");
        }
    }

    public function changePassword(PasswordRequest $request)
    {
        try {

            $currentPass =$request->input('current_password');
            $password=Crypt::decrypt(auth()->user()->getAuthPassword());
            if (trim($currentPass)==trim($password)) {
                $id =auth()->user()->id;
                $password = $request->only("password");
                $password = Crypt::encrypt($password);
                /// update to database
                $profileRepo = new UserRepository();
                $profileRepo->changePassword($password, $id);
                $msg = AdminHelper::adminAlert(trans("messages.op_ok"), "success");
                AdminHelper::TempData("msg", $msg);
                Cache::forget("HomeIndexView");
            } else {
                $msg = AdminHelper::adminAlert(trans("messages.current_pass_not_ok"), "error");
                AdminHelper::TempData("msg", $msg);
            }
            return redirect("/admin/profile");
        } catch (\Exception $exp) {
Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file"=>$exp->getFile(),"line" => $exp->getLine()]);
            $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/profile");
        }
    }
}
