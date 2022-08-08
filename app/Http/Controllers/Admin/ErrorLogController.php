<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;

class ErrorLogController extends Controller
{
    public function __construct()
    {
        View::share('CurrentPage', 'errorLog');
    }

    public function index()
    {
        try {
            $path = storage_path("/logs");
            $logFiles = array_reverse(File::glob("{$path}/*.log"));

            return view("admin.error_log.index", compact('logFiles'));
        } catch (\Exception $exp) {
Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file"=>$exp->getFile(),"line" => $exp->getLine()]);
            return redirect("/admin");
        }
    }

    public function getErrors(Request $request)
    {
        try {
            $path=$request->path;
            $logs = file($path);
            $title = $name = substr($path, strlen($path) - 22);

            $html=view()->make("admin.error_log._error_detailes",compact("logs"))->render();
            return response()->json(["status" => "true", "html" => "$html", "title" => "$title"], 200);
        } catch (\Exception $exp) {
Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file"=>$exp->getFile(),"line" => $exp->getLine()]);
            return response()->json(["status" => "false", "msg" =>trans("messages.op_error")], 403);
        }
    }

    public function delete(Request $request)
    {
        try {

            $path = storage_path("/logs/".$request->name);
            $row=$request->row;
             File::delete($path);
            return response()->json(["status" => "true","row"=>$row,"msg"=>MessageSuccessOp], 200);
        } catch (\Exception $exp) {
Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file"=>$exp->getFile(),"line" => $exp->getLine()]);
            return response()->json(["status" => "false", "msg" => MessageErrorOp], 403);
        }
    }
}
