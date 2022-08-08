<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        View::share('CurrentPage', 'dashboard');
    }
    public function Index()
    {

        return view("admin.main.index");
    }

    public function ordering(Request $request)
    {
        try {
            foreach ($request->data as $item) {
                DB::table("post")->where("id", "=", $item[0])
                    ->update(["ordering" => $item[1]]);
            }
            return response()->json(["status" => "true", "msg" => MessageSuccessOp], 200);

        } catch (Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            return response()->json(["status" => "false", "msg" => "An error occurred during the operation"], 403);
        }
    }
    public function customOrder(Request $request,$tbale)
    {
        try {
            foreach ($request->data as $item) {
                DB::table("$tbale")->where("id", "=", $item[0])
                    ->update(["ordering" => $item[1]]);
            }
            return response()->json(["status" => "true", "msg" => MessageSuccessOp], 200);

        } catch (Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            return response()->json(["status" => "false", "msg" => "An error occurred during the operation"], 403);
        }
    }
}
