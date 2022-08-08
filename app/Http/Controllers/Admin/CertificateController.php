<?php

namespace App\Http\Controllers\Admin;


use AdminHelper;
use App\Http\Requests\CertificateRequest;
use App\Models\Post;
use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;
use Illuminate\Database\QueryException;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;


class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        View::share('CurrentPage', 'certificate');
    }

    public function index()
    {
        return view('admin.certificate.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catRep = new CategoryRepository();
        $categories = $catRep->getByType("certificate");
        $htmlCategory = \view()->make("admin.certificate._category", compact("categories"))->render();
        return view('admin.certificate.create', compact('htmlCategory'));
    }

    public function store(CertificateRequest $request)
    {
        try {
            /// insert to database
            $certificateRepo = new PostRepository();
            $request->request->add([
                "post_type" => "certificate",
                "author" => auth()->user()->full_name,
                "user_id" => auth()->id(),
                "uid" => uniqid()
            ]);

            try {
                $res = $certificateRepo->insert($request->only($certificateRepo->getFillable()));
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
            return redirect("/admin/certificate");
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/certificate");
        }
    }

    public function show($id)
    {
        try {
            $certificate = Post::find($id);
            if ($certificate)
                return view("admin.certificate.edit", compact('certificate'));
            else
                return abort(404, trans("messages.404"));
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/certificate");
        }
    }

    public function edit($id)
    {
        try {
            $certificate = Post::find($id);
            if ($certificate) {
                $catRep = new CategoryRepository();
                $categories = $catRep->getByType("certificate");return view("admin.certificate.edit", compact('certificate', 'categories'));
            } else
                return abort(404, trans("messages.404"));
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/certificate");
        }
    }

    public function update(CertificateRequest $request, $id)
    {
        try {
            /// insert to database
              $request->request->set("post_type","certificate");
            $certificateRepo = new PostRepository();
            $certificateRepo->updatings($request->only($certificateRepo->getFillable()), $id);
            $msg = AdminHelper::adminAlert(trans("messages.op_ok"), "success");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/certificate");
        } catch (QueryException $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/certificate");
        }
    }

    public function destroy($id)
    {
        try {
            $certificateRepo = new PostRepository();
            $res = $certificateRepo->DeletePost($id);
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
            $certificateRepo = new PostRepository();
            if ($certificateRepo->ChangeStatus($id)) {
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
            $certificateRepo = new PostRepository();
            if ($certificateRepo->featured($id)) {
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
            $certificateRepo = new PostRepository();
            $categories = $certificateRepo->getByType($type);
            if ($categories != null) {
                $html = \view()->make("admin.certificate._certificate", compact("categories"))->render();
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
        $type="certificate";
        return view('admin.category.create', compact('type'));
    }
}
