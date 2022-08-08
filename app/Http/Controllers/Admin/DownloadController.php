<?php

namespace App\Http\Controllers\Admin;


use AdminHelper;
use App\Http\Requests\DownloadRequest;
use App\Models\Post;
use App\Repositories\CategoryRepository;
use App\Repositories\PostMetaRepository;
use App\Repositories\PostRepository;
use Illuminate\Database\QueryException;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;


class DownloadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        View::share('CurrentPage', 'download');
    }

    public function index()
    {
        return view('admin.download.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catRep = new CategoryRepository();
        $categories = $catRep->getByType("download");
        $htmlCategory = \view()->make("admin.download._category", compact("categories"))->render();
        return view('admin.download.create', compact('htmlCategory'));
    }

    public function store(DownloadRequest $request)
    {
        try {
            /// insert to database
            $downloadRepo = new PostRepository();
            $request->request->add([
                "post_type" => "download",
                "author" => auth()->user()->full_name,
                "user_id" => auth()->id(),
                "uid" => uniqid()
            ]);

            try {
                $res = $downloadRepo->insert($request->only($downloadRepo->getFillable()));
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
            return redirect("/admin/download");
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/download");
        }
    }

    public function show($id)
    {
        try {
            $download = Post::find($id);
            if ($download)
                return view("admin.download.edit", compact('download'));
            else
                return abort(404, trans("messages.404"));
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/download");
        }
    }

    public function edit($id)
    {
        try {
            $download = Post::find($id);
            if ($download) {
                $catRep = new CategoryRepository();
                $categories = $catRep->getByType("download");return view("admin.download.edit", compact('download', 'categories'));
            } else
                return abort(404, trans("messages.404"));
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/download");
        }
    }

    public function update(DownloadRequest $request, $id)
    {
        try {
            $request->request->set("post_type","download");
            /// insert to database
            $downloadRepo = new PostRepository();
            $downloadRepo->updatings($request->only($downloadRepo->getFillable()), $id);

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
            return redirect("/admin/download");
        } catch (QueryException $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/download");
        }
    }

    public function destroy($id)
    {
        try {
            $downloadRepo = new PostRepository();
            $res = $downloadRepo->DeletePost($id);
            if ($res === 1) {
                return response()->json(["status" => "true"], 200);
            } elseif ($res === -1)
                return response()->json(["status" => "false", "msg" => "شما اجازه حذف این دانلود را ندارید"], 200);
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
            $downloadRepo = new PostRepository();
            if ($downloadRepo->ChangeStatus($id)) {
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
            $downloadRepo = new PostRepository();
            if ($downloadRepo->featured($id)) {
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
            $downloadRepo = new PostRepository();
            $categories = $downloadRepo->getByType($type);
            if ($categories != null) {
                $html = \view()->make("admin.download._download", compact("categories"))->render();
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
        $type="download";
        return view('admin.category.create', compact('type'));
    }
}
