<?php
function sendOTP($code,$receptor) {
    ///TEST SMS START
    try {
        $sender = "10000100004477";
        $message = "سلام ";
        $api = new \Kavenegar\KavenegarApi("64703779584D6B545A4B555261355533344A665A33376243446C77492B54713273326332496E7A597534593D");
        $res = $api->Send($sender, $receptor, $message);
        $res2 = $api->VerifyLookup( $receptor,$code ,"1400-11-18","06:59","AddPlaceNotification");
    }
    catch(\Kavenegar\Exceptions\ApiException $e){
        // در صورتی که خروجی وب سرویس 200 نباشد این خطا رخ می دهد
        return response()->json(["status" => "false","msg" => $e->errorMessage()], 403);
    }
    catch(\Kavenegar\Exceptions\HttpException $e){
        // در زمانی که مشکلی در برقرای ارتباط با وب سرویس وجود داشته باشد این خطا رخ می دهد
        return response()->json(["status" => "false","msg" => $e->errorMessage()], 403);
    }
    ///TEST SMS END

    return true;
}
function sendOrderSms($code,$receptor) {
    ///TEST SMS START
    try {
        $sender = "10000100004477";
        $message = "سلام ";
        $api = new \Kavenegar\KavenegarApi("64703779584D6B545A4B555261355533344A665A33376243446C77492B54713273326332496E7A597534593D");
        $res = $api->Send($sender, $receptor, $message);
        $res2 = $api->VerifyLookup( $receptor,$code ,"1400-11-18","06:59","AddPlaceNotification");
    }
    catch(\Kavenegar\Exceptions\ApiException $e){
        // در صورتی که خروجی وب سرویس 200 نباشد این خطا رخ می دهد
        return response()->json(["status" => "false","msg" => $e->errorMessage()], 403);
    }
    catch(\Kavenegar\Exceptions\HttpException $e){
        // در زمانی که مشکلی در برقرای ارتباط با وب سرویس وجود داشته باشد این خطا رخ می دهد
        return response()->json(["status" => "false","msg" => $e->errorMessage()], 403);
    }
    ///TEST SMS END

    return true;
}
?>
