<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Repository\StarRateRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class StarRateController extends Controller
{
    //set rate for item
    public function set_rate($cid)
    {
        try {
            if (request()->has("rate")) {
                $rateRep = new StarRateRepository();
                $res = $rateRep->insert(["table_name" => "post", "table_id" => $cid, "user_id" => auth()->id(), "ip" => request()->ip(), "rate_value" => request()->get("rate")]);
                if ($res > 0) {
                    return response()->json(["status" => 200,"msg"=>"امتیاز شما ثبت شد ! با تشکر"], 200);
                } return response()->json(["status" => 500,"msg"=>"اجاز ثبت امتیاز را ندارید"], 200);
            }
            return response()->json(["status" => 500,"msg"=>"درخواست شما نامعتبر میباشد"], 200);
        } catch (Exception $ex) {
            Log::error($ex->getMessage(), [$ex]);
            return response()->json(["status" => 500,"msg"=>"خطایی در انجام عملیات رخ داده است"], 200);
        }
    }
}
