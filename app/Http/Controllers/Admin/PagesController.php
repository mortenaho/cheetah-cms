<?php

namespace App\Http\Controllers\Admin;


use AdminHelper;
use App\Http\Requests\PageRequest;
use App\Models\Post;
use App\Repositories\CategoryRepository;
use App\Repositories\PostMetaRepository;
use App\Repositories\PostRepository;
use Illuminate\Database\QueryException;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;


class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        View::share('CurrentPage', 'page');
    }

    public function index()
    {
        return view('admin.pages.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catRep = new CategoryRepository();
        $categories = $catRep->getByType("page");
        $htmlCategory = \view()->make("admin.pages._category", compact("categories"))->render();
        return view('admin.pages.create', compact('htmlCategory'));
    }

    public function store(PageRequest $request)
    {
        try {
            /// insert to database
            $pagesRepo = new PostRepository();
            $request->request->add([
                "post_type" => "page",
                "author" => auth()->user()->full_name,
                "user_id" => auth()->id(),
                "uid" => uniqid()
            ]);

            try {
                $res = $pagesRepo->insert($request->only($pagesRepo->getFillable()));
                if ($res >0) {
                    $post_meta=[
                        ["post_id"=>$res,"meta_key"=>"template","meta_value"=>$request->template],
                        ["post_id"=>$res,"meta_key"=>"page_content","meta_value"=>$request->page_content],
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
            return redirect("/admin/pages");
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/pages");
        }
    }

    public function show($id)
    {
        try {
            $page = Post::find($id);
            if ($page)
                return view("admin.page.edit", compact('page'));
            else
                return abort(404, trans("messages.404"));
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/pages");
        }
    }

    public function edit($id)
    {
        try {
            $page = Post::find($id);
            if ($page) {
                $catRep = new CategoryRepository();
                $categories = $catRep->getByType("page");return view("admin.pages.edit", compact('page', 'categories'));
            } else
                return abort(404, trans("messages.404"));
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/pages");
        }
    }

    public function update(PageRequest $request, $id)
    {
        try {
            /// insert to database
            ///
            $request->request->set("post_type","page");
            $pagesRepo = new PostRepository();
            $pagesRepo->updatings($request->only($pagesRepo->getFillable()), $id);
            $post_meta=[
                ["post_id"=>$id,"meta_key"=>"template","meta_value"=>$request->template],
                ["post_id"=>$id,"meta_key"=>"page_content","meta_value"=>$request->page_content],
            ];

            $p_meta=new PostMetaRepository();
            $p_meta->updatings($post_meta,$id);
            $msg = AdminHelper::adminAlert(trans("messages.op_ok"), "success");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/pages");
        } catch (QueryException $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/pages");
        }
    }

    public function destroy($id)
    {
        try {
            $pagesRepo = new PostRepository();
            $res = $pagesRepo->DeletePost($id);
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
            $pagesRepo = new PostRepository();
            if ($pagesRepo->ChangeStatus($id)) {
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
            $pagesRepo = new PostRepository();
            if ($pagesRepo->featured($id)) {
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
            $pagesRepo = new PostRepository();
            $categories = $pagesRepo->getByType($type);
            if ($categories != null) {
                $html = \view()->make("admin.pages._page", compact("categories"))->render();
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
        $type="page";
        return view('admin.category.create', compact('type'));
    }

}
