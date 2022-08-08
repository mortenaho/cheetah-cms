<?php
/**
 * Created by PhpStorm.
 * User: Mortenaho
 * Date: 7/12/2021
 * Time: 9:18 PM
 */

namespace App\Plugins\e_shopping\Controllers;


use AdminHelper;
use App\Http\Controllers\Controller;

use App\Plugins\e_shopping\Model\EC_CategoryModel;
use App\Plugins\e_shopping\repository\EC_CategoryRepository;
use App\Plugins\e_shopping\request\CategoryRequest;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;

use Yajra\DataTables\Facades\DataTables;

class EC_CategoryController extends Controller
{

    private $categoryRepo;


    public function __construct()
    {
        View::share('CurrentPage', 'category');
        $this->categoryRepo = new EC_CategoryRepository();
    }

    public function index($type = "post")
    {

        $categories = $this->categoryRepo->getAll();

        return view('e_shopping::admin.category.index', compact("categories", 'type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categoryRepo->getAll();
        return view('e_shopping::admin.category.create', compact('categories'));
    }

    public function store(Request $request)
    {
        try {
            /// insert to database


            $res = $this->categoryRepo->insert($request->only($this->categoryRepo->getFillable()));
            if ($res != null) {
                $msg = \AdminHelper:: adminAlert(trans("messages.op_ok"), "success");
                \AdminHelper::TempData("msg", $msg);
                
            } else {
                $msg = \AdminHelper::adminAlert(trans("messages.op_error"), "error");
                \AdminHelper::TempData("msg", $msg);
            }
            return redirect("/admin/ec/category");
        } catch (QueryException $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            $msg = \AdminHelper::adminAlert(trans("messages.op_error"), "error");
            \AdminHelper::TempData("msg", $msg);
            return redirect("/admin/category");
        }
    }

    public function show($id)
    {
        try {
            $category = EC_CategoryModel::query()->find($id);
            if ($category)
                return view("e_shopping::admin.category.edit", compact('category'));
            else
                return abort(404, trans("messages.404"));
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            $msg = \AdminHelper::adminAlert(trans("messages.op_error"), "error");
            \AdminHelper::TempData("msg", $msg);
            return redirect("/admin/category");
        }
    }

//
    public function edit($id)
    {
        try {
            $category = EC_CategoryModel::query()->find($id);
            if ($category) {
                $catRep = new EC_CategoryRepository();
                $categories = $catRep->getAll();
                $selected = $category->parent;
                $htmlCategory = \view()->make("e_shopping::admin.category._category", compact("categories",'selected'))->render();
                return view("e_shopping::admin.category.edit", compact('category', 'htmlCategory'));
            } else
                return abort(404, trans("messages.404"));
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/ec/category");
        }
    }

    public function update(Request $request, $id)
    {
        try {
            /// insert to database
            $categoryRepo = new EC_CategoryRepository();
            $categoryRepo->edit($request->only($categoryRepo->getFillable()), $id);
            $msg = AdminHelper::adminAlert(trans("messages.op_ok"), "success");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/ec/category");
        } catch (QueryException $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/ec/category");
        }
    }

    public function destroy($id)
    {
        try {
            
            $categoryRepo = new EC_CategoryRepository();
            $res = $categoryRepo->DeleteCategory($id);
            if ($res === 1) {
                return response()->json(["status" => "true"], 200);
            } elseif ($res === -1)
                return response()->json(["status" => "false", "msg" => "این دسته بندی دارای فرزند میباشد و نمیتوانید آن را حذف کنید"], 200);
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
            $categoryRepo = new EC_CategoryRepository();
            if ($categoryRepo->ChangeStatus($id)) {
                return response()->json(["status" => "true"], 200);
            } else
                return response()->json(["status" => "false"], 200);
        } catch (QueryException $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            return response()->json(["status" => "false", "msg" => trans("messages.op_error")], 403);
        }
    }


    public function dt_category()
    {
        $category = DB::table("ec_category")->get();
        return Datatables::of($category)->make(true);
    }

}