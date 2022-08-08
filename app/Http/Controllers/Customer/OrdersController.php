<?php

namespace App\Http\Controllers\Customer;


use AdminHelper;
use App\Helpers\Validations\SliderValidation;
use App\Models\OrderDetailsModel;
use App\Models\OrdersModel;
use App\Repositories\OrdersRepository;
use App\Repositories\OrderDetailsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Monolog\Logger;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        View::share('CurrentPage', 'orders');
    }

    public function index()
    {
        return view('customer.orders.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.orders.create');
    }


    public function details($id)
    {
        try {
            $order = OrdersModel::find($id);
            $orderDetails = OrderDetailsModel::select("*")
                ->where("order_id", $id)
                ->orderBy("id", "desc")
                ->get();


            if ($order) {
                $html = view()->make("customer.orders._orders_details", compact("order", "orderDetails"))->render();
                return response()->json(["status" => "true", "html" => "$html"], 200);
            } else
                return abort(404, trans("messages.404"));
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
            AdminHelper::TempData("msg", $msg);
            return redirect("/customer/orders");
        }
    }

    public function show($id)
    {
        try {
            $order = OrdersModel::find($id);
            if ($order)
                return view("customer.orders.edit", compact('order'));
            else
                return abort(404, trans("messages.404"));
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
            AdminHelper::TempData("msg", $msg);
            return redirect("/customer/Orders");
        }
    }

    public function edit($id)
    {
        try {
            $order = OrdersModel::find($id);
            if ($order)
                return view("customer.orders.edit", compact('order'));
            else
                return abort(404, trans("messages.404"));
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
            AdminHelper::TempData("msg", $msg);
            return redirect("/customer/Orders");
        }
    }

    public function destroy($id)
    {
        try {
            $ordersRepo = new OrdersRepository();
            if ($ordersRepo->DeleteOrder($id)) {
                return response()->json(["status" => "true"], 200);
            } else
                return response()->json(["status" => "false"], 200);
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            return response()->json(["status" => "false", "msg" => trans("messages.op_error")], 403);
        }
    }

    public function changeStatus($id)
    {
        try {
            $ordersRepo = new OrdersRepository();
            if ($ordersRepo->changeStatus($id)) {
                return response()->json(["status" => "true","id",$id], 200);
            } else
                return response()->json(["status" => "false"], 200);
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            return response()->json(["status" => "false", "msg" => trans("messages.op_error")], 403);
        }
    }
}
