<?php

namespace App\Http\Controllers\Admin;


use AdminHelper;
use App\Http\Requests\PortfolioRequest;
use App\Models\Post;
use App\Repositories\CategoryRepository;
use App\Repositories\PostMetaRepository;
use App\Repositories\PostRepository;
use Illuminate\Database\QueryException;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;


class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        View::share('CurrentPage', 'portfolio');
    }

    public function index()
    {
        return view('admin.portfolio.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catRep = new CategoryRepository();
        $categories = $catRep->getByType("portfolio");
        $htmlCategory = \view()->make("admin.portfolio._category", compact("categories"))->render();
        return view('admin.portfolio.create', compact('htmlCategory'));
    }

    public function store(PortfolioRequest $request)
    {
        try {
            /// insert to database
            $portfolioRepo = new PostRepository();
            $request->request->add([
                "post_type" => "portfolio",
                "author" => auth()->user()->full_name,
                "user_id" => auth()->id(),
                "uid" => uniqid()
            ]);

            try {
                $res = $portfolioRepo->insert($request->only($portfolioRepo->getFillable()));
                if ($res>0) {
                    $post_meta=[
                        ["post_id"=>$res,"meta_key"=>"project","meta_value"=>$request->project],
                        ["post_id"=>$res,"meta_key"=>"customer","meta_value"=>$request->customer],
                        ["post_id"=>$res,"meta_key"=>"start_date","meta_value"=>$request->start_date],
                        ["post_id"=>$res,"meta_key"=>"end_date","meta_value"=>$request->end_date],
                        ["post_id"=>$res,"meta_key"=>"project_status","meta_value"=>$request->project_status],
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
            return redirect("/admin/portfolio");
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/portfolio");
        }
    }

    public function show($id)
    {
        try {
            $portfolio = Post::find($id);
            if ($portfolio)
                return view("admin.portfolio.edit", compact('portfolio'));
            else
                return abort(404, trans("messages.404"));
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/portfolio");
        }
    }

    public function edit($id)
    {
        try {
            $portfolio = Post::find($id);
            if ($portfolio) {
                $catRep = new CategoryRepository();
                $categories = $catRep->getByType("portfolio");return view("admin.portfolio.edit", compact('portfolio', 'categories'));
            } else
                return abort(404, trans("messages.404"));
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/portfolio");
        }
    }

    public function update(PortfolioRequest $request, $id)
    {
        try {
            $request->request->set("post_type","portfolio");
            /// insert to database
            $portfolioRepo = new PostRepository();
            $portfolioRepo->updatings($request->only($portfolioRepo->getFillable()), $id);

            $post_meta=[
                ["post_id"=>$id,"meta_key"=>"project","meta_value"=>$request->project],
                ["post_id"=>$id,"meta_key"=>"customer","meta_value"=>$request->customer],
                ["post_id"=>$id,"meta_key"=>"start_date","meta_value"=>$request->start_date],
                ["post_id"=>$id,"meta_key"=>"end_date","meta_value"=>$request->end_date],
                ["post_id"=>$id,"meta_key"=>"project_status","meta_value"=>$request->project_status],
            ];

            $p_meta=new PostMetaRepository();
            $p_meta->updatings($post_meta,$id);

            $msg = AdminHelper::adminAlert(trans("messages.op_ok"), "success");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/portfolio");
        } catch (QueryException $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/portfolio");
        }
    }

    public function destroy($id)
    {
        try {
            $portfolioRepo = new PostRepository();
            $res = $portfolioRepo->DeletePost($id);
            if ($res === 1) {
                return response()->json(["status" => "true"], 200);
            } elseif ($res === -1)
                return response()->json(["status" => "false", "msg" => "شما اجازه حذف این نمونه کار را ندارید"], 200);
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
            $portfolioRepo = new PostRepository();
            if ($portfolioRepo->ChangeStatus($id)) {
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
            $portfolioRepo = new PostRepository();
            if ($portfolioRepo->featured($id)) {
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
            $portfolioRepo = new PostRepository();
            $categories = $portfolioRepo->getByType($type);
            if ($categories != null) {
                $html = \view()->make("admin.portfolio._portfolio", compact("categories"))->render();
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
        $type="portfolio";
        return view('admin.category.create', compact('type'));
    }
}
