<?php

namespace App\Http\Controllers\Admin;


use AdminHelper;
use App\Models\HMPost;
use App\Http\Controllers\Controller;
use App\Repositories\HMPostRepository;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;

class HMPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        View::share('CurrentPage', 'HMPost');
    }

    public function index()
    {
        return view('admin.hm_post.index');
    }

    public function show($id)
    {
        try {
            $post = HMPost::find($id);
            if ($post)
                return view("admin.hm_post.edit", compact('post'));
            else
                return abort(404, trans("messages.404"));
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/HMPost");
        }
    }

    public function changeStatus($id)
    {
        try {
            $id = Crypt::decrypt($id);
            $postRepo = new HMPostRepository();
            if ($postRepo->ChangeStatus($id)) {
                return response()->json(["status" => "true"], 200);
            } else
                return response()->json(["status" => "false"], 200);
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            return response()->json(["status" => "false", "msg" => trans("messages.op_error")], 403);
        }
    }


}
