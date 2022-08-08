<?php

namespace App\Http\Controllers\Admin;

use AdminHelper;
use App\Repositories\AttachmentRepository;
use App\Repositories\SettingRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
use Unisharp\Setting\Setting;

class SettingController extends Controller
{
    public function __construct()
    {
        View::share('CurrentPage', 'setting');
    }

    public function index()
    {
        try {
            $setting = new SettingRepository();
            $model =$setting->getSetting();
            return view("admin.setting.index", compact("model"));
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
            AdminHelper:: TempData("msg", $msg);
            return redirect("/admin/Setting");
        }
    }

    public function update(Request $request, $id)
    {
        try {
            /// update to database
            $settingRepo = new SettingRepository();
            $settingRepo->updateSetting($request->only($settingRepo->getFillable()), $id);
            site_setting("all",$request->only($settingRepo->getFillable()));
            $msg = AdminHelper::adminAlert(trans("messages.op_ok"), "success");
            if($request->has("attachment") && $request->input("attachment")!=null) {
                $attach = new AttachmentRepository();
                $attach->insert(["type" => "setting", "type_id" => $id, "file" => $request->input("attachment"), "mime_type" => File::extension($request->input("attachment"))]);
            }
            AdminHelper::TempData("msg", $msg);
             return redirect("/admin/setting");
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/setting");
        }
    }
}
