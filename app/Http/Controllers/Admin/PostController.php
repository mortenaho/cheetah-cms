<?php

namespace App\Http\Controllers\Admin;


use AdminHelper;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Monolog\Logger;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        View::share('CurrentPage', 'post');
    }

    public function index()
    {
        return view('admin.post.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catRep = new CategoryRepository();
        $categories = $catRep->getByType("post");
        $htmlCategory = \view()->make("admin.post._category", compact("categories"))->render();
        return view('admin.post.create', compact('htmlCategory'));
    }

    public function store(PostRequest $request)
    {

        try {
            /// insert to database
            $postRepo = new PostRepository();
            $request->request->add([
                "post_type" => "post",
                "author" => auth()->user()->full_name,
                "user_id" => auth()->id(),
                "uid" => uniqid()
            ]);

            if($request->has("is_login"))
            {
                $request->request->set("is_login","1");
            }else
                $request->request->set("is_login","0");

            if($request->has("has_comment"))
            {
                $request->request->set("has_comment","1");
            }else
                $request->request->set("has_comment","0");


            try {
                $res = $postRepo->insert($request->only($postRepo->getFillable()));
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
            return redirect("/admin/post");
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/post");
        }
    }

    public function show($id)
    {
        try {
            $post = Post::find($id);
            if ($post)
                return view("admin.post.edit", compact('post'));
            else
                return abort(404, trans("messages.404"));
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/post");
        }
    }

    public function edit($id)
    {
        try {

            $post = Post::find($id);
            if ($post) {
                $catRep = new CategoryRepository();
                $categories = $catRep->getByType("post");return view("admin.post.edit", compact('post', 'categories'));
            } else
                return abort(404, trans("messages.404"));
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/post");
        }
    }

    public function update(PostRequest $request, $id)
    {
        try {
            /// insert to database
            if($request->has("is_login"))
            {
                $request->request->set("is_login","1");
            }else
                $request->request->set("is_login","0");

            if($request->has("has_comment"))
            {
                $request->request->set("has_comment","1");
            }else
                $request->request->set("has_comment","0");
            $request->request->set("post_type","post");
            $postRepo = new PostRepository();
            $postRepo->updatings($request->only($postRepo->getFillable()), $id);
            $msg = AdminHelper::adminAlert(trans("messages.op_ok"), "success");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/post");
        } catch (QueryException $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/post");
        }
    }

    public function destroy($id)
    {
        try {
            $postRepo = new PostRepository();
            $res = $postRepo->DeletePost($id);
            if ($res === 1) {
                return response()->json(["status" => "true"], 200);
            } elseif ($res === -1)
                return response()->json(["status" => "false", "msg" => "اجازه حذف این نوشته را ندارید"], 200);
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
            $postRepo = new PostRepository();
            if ($postRepo->ChangeStatus($id)) {
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
            $postRepo = new PostRepository();
            if ($postRepo->featured($id)) {
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
            $postRepo = new PostRepository();
            $categories = $postRepo->getByType($type);
            if ($categories != null) {
                $html = \view()->make("admin.post._post", compact("categories"))->render();
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
        $type="post";
        return view('admin.category.create', compact('type'));
    }
}
