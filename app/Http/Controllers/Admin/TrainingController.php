<?php

namespace App\Http\Controllers\Admin;


use AdminHelper;
use App\Http\Requests\TrainingRequest;
use App\Models\Post;
use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;
use Illuminate\Database\QueryException;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;


class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        View::share('CurrentPage', 'training');
    }

    public function index()
    {
        return view('admin.training.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catRep = new CategoryRepository();
        $categories = $catRep->getByType("training");
        $htmlCategory = \view()->make("admin.training._category", compact("categories"))->render();
        return view('admin.training.create', compact('htmlCategory'));
    }

    public function store(TrainingRequest $request)
    {
        try {
            /// insert to database
            $trainingRepo = new PostRepository();
            $request->request->add([
                "post_type" => "training",
                "author" => auth()->user()->full_name,
                "user_id" => auth()->id(),
                "uid" => uniqid()
            ]);

            try {
                $res = $trainingRepo->insert($request->only($trainingRepo->getFillable()));
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
            return redirect("/admin/training");
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/training");
        }
    }

    public function show($id)
    {
        try {
            $training = Post::find($id);
            if ($training)
                return view("admin.training.edit", compact('training'));
            else
                return abort(404, trans("messages.404"));
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/training");
        }
    }

    public function edit($id)
    {
        try {
            $training = Post::find($id);
            if ($training) {
                $catRep = new CategoryRepository();
                $categories = $catRep->getByType("training");
                return view("admin.training.edit", compact('training', 'categories'));
            } else
                return abort(404, trans("messages.404"));
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/training");
        }
    }

    public function update(TrainingRequest $request, $id)
    {
        try {
            /// insert to database
              $request->request->set("post_type","training");
            $trainingRepo = new PostRepository();
            $trainingRepo->updatings($request->only($trainingRepo->getFillable()), $id);
            $msg = AdminHelper::adminAlert(trans("messages.op_ok"), "success");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/training");
        } catch (QueryException $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/training");
        }
    }

    public function destroy($id)
    {
        try {
            $trainingRepo = new PostRepository();
            $res = $trainingRepo->DeletePost($id);
            if ($res === 1) {
                return response()->json(["status" => "true"], 200);
            } elseif ($res === -1)
                return response()->json(["status" => "false", "msg" => "شما اجازه حذف این  آموزش را ندارید"], 200);
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
            $trainingRepo = new PostRepository();
            if ($trainingRepo->ChangeStatus($id)) {
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
            $trainingRepo = new PostRepository();
            if ($trainingRepo->featured($id)) {
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
            $trainingRepo = new PostRepository();
            $categories = $trainingRepo->getByType($type);
            if ($categories != null) {
                $html = \view()->make("admin.training._training", compact("categories"))->render();
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
        $type="training";
        return view('admin.category.create', compact('type'));
    }
}
