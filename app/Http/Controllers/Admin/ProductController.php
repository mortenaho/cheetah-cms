<?php

namespace App\Http\Controllers\Admin;


use AdminHelper;
use App\Http\Requests\ProductRequest;
use App\Models\Post;
use App\Repositories\CategoryRepository;
use App\Repositories\PostMetaRepository;
use App\Repositories\PostRepository;
use Illuminate\Database\QueryException;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        View::share('CurrentPage', 'product');
    }

    public function index()
    {
        return view('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catRep = new CategoryRepository();
        $categories = $catRep->getByType("product");
        $htmlCategory = \view()->make("admin.product._category", compact("categories"))->render();
        return view('admin.product.create', compact('htmlCategory'));
    }

    public function store(ProductRequest $request)
    {
        try {
            /// insert to database
            $productRepo = new PostRepository();
            $request->request->add([
                "post_type" => "product",
                "author" => auth()->user()->full_name,
                "user_id" => auth()->id(),
                "uid" => uniqid()
            ]);

            try {
                $res = $productRepo->insert($request->only($productRepo->getFillable()));
                if ($res >0) {
                    $post_meta=[
                        ["post_id"=>$res,"meta_key"=>"price","meta_value"=>$request->price],
                        ["post_id"=>$res,"meta_key"=>"discount","meta_value"=>$request->discount],
                    ];

                    $p_meta=new PostMetaRepository();
                    $p_meta->insert($post_meta);
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
            return redirect("/admin/product");
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/product");
        }
    }

    public function show($id)
    {
        try {
            $product = Post::find($id);
            if ($product)
                return view("admin.product.edit", compact('product'));
            else
                return abort(404, trans("messages.404"));
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/product");
        }
    }

    public function edit($id)
    {
        try {
            $product = Post::find($id);
            if ($product) {
                $catRep = new CategoryRepository();
                $categories = $catRep->getByType("product");return view("admin.product.edit", compact('product', 'categories'));
            } else
                return abort(404, trans("messages.404"));
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/product");
        }
    }

    public function update(ProductRequest $request, $id)
    {
        try {
            /// insert to database
            ///
            $request->request->set("post_type","product");
            $productRepo = new PostRepository();
            $productRepo->updatings($request->only($productRepo->getFillable()), $id);
            $post_meta=[
                ["post_id"=>$id,"meta_key"=>"price","meta_value"=>$request->price],
                ["post_id"=>$id,"meta_key"=>"discount","meta_value"=>$request->discount],
            ];

            $p_meta=new PostMetaRepository();
            $p_meta->updatings($post_meta,$id);
            $msg = AdminHelper::adminAlert(trans("messages.op_ok"), "success");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/product");
        } catch (QueryException $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/product");
        }
    }

    public function destroy($id)
    {
        try {
            $productRepo = new PostRepository();
            $res = $productRepo->DeletePost($id);
            if ($res === 1) {
                return response()->json(["status" => "true"], 200);
            } elseif ($res === -1)
                return response()->json(["status" => "false", "msg" => "شما اجازه حذف این سطر را ندارید"], 200);
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
            $productRepo = new PostRepository();
            if ($productRepo->ChangeStatus($id)) {
                return response()->json(["status" => "true"], 200);
            } else
                return response()->json(["status" => "false"], 200);
        } catch (QueryException $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            return response()->json(["status" => "false", "msg" => trans("messages.op_error")], 403);
        }
    }
    public function featured($id)
    {
        try {
            $productRepo = new PostRepository();
            if ($productRepo->featured($id)) {
                return response()->json(["status" => "true"], 200);
            } else
                return response()->json(["status" => "false"], 200);
        } catch (QueryException $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            return response()->json(["status" => "false", "msg" => trans("messages.op_error")], 403);
        }
    }
    public function getPostByType($type)
    {
        try {
            $productRepo = new PostRepository();
            $categories = $productRepo->getByType($type);
            if ($categories != null) {
                $html = \view()->make("admin.product._product", compact("categories"))->render();
                return response()->json(["status" => "true", "html" => "$html"], 200);
            } else
                return response()->json(["status" => "false"], 200);
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            return response()->json(["status" => "false", "msg" => trans("messages.op_error")], 403);
        }
    }

    public function categoryCreate()
    {
        $type="product";
        return view('admin.category.create', compact('type'));
    }

}
