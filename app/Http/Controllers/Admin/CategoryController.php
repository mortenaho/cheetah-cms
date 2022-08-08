<?php

namespace App\Http\Controllers\Admin;


use AdminHelper;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Repositories\CategoryRepository;
use App\Repositories\ToolsRepository;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Monolog\Logger;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        View::share('CurrentPage', 'category');
    }

    public function index($type="post")
    {
        $categoryRepo = new CategoryRepository();
        $categories = $categoryRepo->getAll();
        return view('admin.category.index', compact("categories","type"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tools = new ToolsRepository();
        $types = $tools->getAll(["has_category" => 1, "is_active" => 1]);
        return view('admin.category.create', compact('types'));
    }

    public function store(CategoryRequest $request)
    {
        try {
            /// insert to database
            $categoryRepo = new CategoryRepository();

            $res = $categoryRepo->insert($request->only($categoryRepo->getFillable()));
            if ($res != null) {
                $msg = AdminHelper:: adminAlert(trans("messages.op_ok"), "success");
                AdminHelper::TempData("msg", $msg);
            } else {
                $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
                AdminHelper::TempData("msg", $msg);
            }

        } catch (QueryException $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
            AdminHelper::TempData("msg", $msg);

        }
        return redirect("/admin/category/{$request->type}");
    }

    public function show($id)
    {
        try {
            $category = Category::find($id);
            if ($category)
                return view("admin.category.edit", compact('category'));
            else
                return abort(404, trans("messages.404"));
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/category");
        }
    }

    public function edit($id)
    {
        try {
            $category = Category::find($id);
            if ($category) {
                $catRep = new CategoryRepository();
                $categories = $catRep->getByType($category->type);
                $type = $category->type;
                $htmlCategory = \view()->make("admin.category._category", compact("categories"))->render();
                return view("admin.category.edit", compact('category', 'htmlCategory','type'));
            } else
                return abort(404, trans("messages.404"));
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/category");
        }
    }

    public function update(CategoryRequest $request, $id)
    {
        try {
            /// insert to database
            $categoryRepo = new CategoryRepository();
            $categoryRepo->updatings($request->only($categoryRepo->getFillable()), $id);
            $msg = AdminHelper::adminAlert(trans("messages.op_ok"), "success");
            AdminHelper::TempData("msg", $msg);

        } catch (QueryException $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
            AdminHelper::TempData("msg", $msg);

        }
        return redirect("/admin/category/{$request->type}");
    }

    public function destroy($id)
    {
        try {
            $categoryRepo = new CategoryRepository();
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
            $categoryRepo = new CategoryRepository();
            if ($categoryRepo->ChangeStatus($id)) {
                return response()->json(["status" => "true"], 200);
            } else
                return response()->json(["status" => "false"], 200);
        } catch (QueryException $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            return response()->json(["status" => "false", "msg" => trans("messages.op_error")], 403);
        }
    }

    public function getCategoryByType($type)
    {
        try {
            $categoryRepo = new CategoryRepository();
            $categories = $categoryRepo->getByType($type);
            if ($categories != null) {
                $html = \view()->make("admin.category._category", compact("categories"))->render();
                return response()->json(["status" => "true", "html" => "$html"], 200);
            } else
                return response()->json(["status" => "false"], 200);
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            return response()->json(["status" => "false", "msg" => trans("messages.op_error")], 403);
        }
    }
}
