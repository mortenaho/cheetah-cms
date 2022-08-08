<?php

namespace App\Http\Controllers\Admin;

use AdminHelper;
use App\Repositories\ToolsRepository;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use RecursiveArrayIterator;
use RecursiveIteratorIterator;

class PluginController extends Controller
{

    public function __construct()
    {

        view()->share('CurrentPage', 'plugin');
    }

    public function index()
    {
        try {
            $toolsRep = new ToolsRepository();
            $plugins = $toolsRep->getAll(["type"=>"plugin"]);
            return view("admin.plugin.index", compact('plugins'));
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin");
        }
    }

    public function changeStatus($id)
    {
        try {
            $toolsRepo = new ToolsRepository();
            if ($toolsRepo->ChangeStatus($id)) {
                return response()->json(["status" => "true"], 200);
            } else
                return response()->json(["status" => "false"], 200);
        } catch (QueryException $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            return response()->json(["status" => "false", "msg" => trans("messages.op_error")], 403);
        }
    }

    public function isActive($id)
    {
        try {
            $toolsRepo = new ToolsRepository();

            $is_active = $toolsRepo->isActive($id);
            $tools = $toolsRepo->getAll(["type"=>"plugin","is_active"=>1]);
            if (Cache::has("site_plugin"))
                Cache::forget("site_plugin");
            Cache::forever("site_plugin", $tools, now()->month);
            $html = view()->make('admin.plugin._is_active_element', compact('id', "is_active"))->render();
            return response()->json(["status" => "true", "html" => $html], 200);

        } catch (QueryException $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            return response()->json(["status" => "false", "msg" => trans("messages.op_error")], 403);
        }
    }
}
