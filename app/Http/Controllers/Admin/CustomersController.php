<?php

namespace App\Http\Controllers\Admin;


use AdminHelper;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Database\QueryException;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;


class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        View::share('CurrentPage', 'customers');
    }

    public function index()
    {
        return view('admin.customers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customers.create');
    }

    public function store(Request $request)
    {
        try {
            /// insert to database
            $userRepo = new UserRepository();

            try {
                $res = $userRepo->insert($request->only($userRepo->getFillable()),true);
                if ($res != null) {
                    $msg = AdminHelper:: adminAlert(trans("messages.op_ok"), "success");
                    AdminHelper::TempData("msg", $msg);
                } else {
                    $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
                    AdminHelper::TempData("msg", $msg);
                }
            } catch (QueryException $queryException) {
                Log::error($queryException->getMessage(), ["code" => $queryException->getCode(), "file" => $queryException->getFile(), "line" => $queryException->getLine()]);
                $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
                AdminHelper::TempData("msg", $msg);
            }
            return redirect("/admin/customer");
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/customer");
        }
    }

    public function show($id)
    {
        try {
            $customer = User::find($id);
            if ($customer)
                return view("admin.customers.edit", compact('customer'));
            else
                return abort(404, trans("messages.404"));
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/customers");
        }
    }

    public function edit($id)
    {
        try {
            $customer = User::find($id);
            if ($customer) {
                return view("admin.customers.edit", compact('customer'));
            } else
                return abort(404, trans("messages.404"));
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/customers");
        }
    }

    public function update(Request $request, $id)
    {
        try {
            /// insert to database
            $userRepo = new UserRepository();
            $userRepo->updatings($request->only($userRepo->getFillable()), $id,true);
            $msg = AdminHelper::adminAlert(trans("messages.op_ok"), "success");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/customers");
        } catch (QueryException $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/customers");
        }
    }

    public function destroy($id)
    {
        try {
            $userRepo = new UserRepository();
            $res = $userRepo->DeleteUser($id);
            if ($res === 1) {
                return response()->json(["status" => "true"], 200);
            } elseif ($res === -1)
                return response()->json(["status" => "false", "msg" => "شما اجازه حذف این  خدمات را ندارید"], 200);
            else
                return response()->json(["status" => "false", "msg" => "خطایی در حذف اطلاعات رخ داده است."], 200);
        } catch (QueryException $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            return response()->json(["status" => "false", "msg" => trans("messages.op_error")], 403);
        }
    }

    public function changeStatus($id)
    {
        try {
            $userRepo = new UserRepository();
            if ($userRepo->ChangeStatus($id)) {
                return response()->json(["status" => "true"], 200);
            } else
                return response()->json(["status" => "false"], 200);
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            return response()->json(["status" => "false", "msg" => trans("messages.op_error")], 403);
        }
    }

    public function changeActive($id)
    {
        try {
            $userRepo = new UserRepository();
            if ($userRepo->Activate($id)) {
                return response()->json(["status" => "true"], 200);
            } else
                return response()->json(["status" => "false"], 200);
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            return response()->json(["status" => "false", "msg" => trans("messages.op_error")], 403);
        }
    }

}
