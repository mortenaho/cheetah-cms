<?php

namespace App\Http\Controllers\Admin;


use AdminHelper;
use App\Helpers\Validations\CommentValidation;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\MailRequest;
use App\Models\Comment;
use App\Models\Post;
use App\Repositories\CommentRepository;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Monolog\Logger;

//for git test
class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        View::share('CurrentPage', 'comment');
    }

    public function index($type = null)
    {
        $commntRepo=new CommentRepository();
        $comment =$commntRepo->getAll(null);
        return view('admin.comment.index', compact("comment"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.comment.create');
    }

    public function store(CommentRequest $request)
    {
        try {
            /// insert to database
            $commentUsRepo = new CommentRepository();
            $res = $commentUsRepo->insert($request->only($commentUsRepo->getFillable()));
            if ($res != null) {
                $msg = AdminHelper:: adminAlert(trans("messages.op_ok"), "success");
                AdminHelper::TempData("msg", $msg);
                Cache::forget("HomeIndexView");
            } else {
                $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
                AdminHelper::TempData("msg", $msg);
            }
            return redirect("/admin/Comment");
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/Comment");
        }
    }

    public function show($id)
    {
        try {
            //   $id=Crypt::decrypt($id);
            $comment = Comment::find($id);
            if ($comment) {
                $commentUsRepo = new CommentRepository();
                $commentUsRepo->ChangeStatus($id, "1");
                return view("admin.comment.show", compact('comment'));
            } else
                return abort(404, trans("messages.404"));
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/Comment");
        }
    }

    public function edit($id)
    {
        try {
            // $id = Crypt::decrypt($id);
            $commentUs = Comment::find($id);
            if ($commentUs)
                return view("admin.comment.edit", compact('commentUs'));
            else
                return abort(404, trans("messages.404"));
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/Comment");
        }
    }

    public function update(CommentRequest $request, $id)
    {
        try {
            //  $id = Crypt::decrypt($id);
            /// insert to database
            $commentUsRepo = new CommentRepository();
            $commentUsRepo->updatings($request->only($commentUsRepo->getFillable()), $id);
            $msg = AdminHelper::adminAlert(trans("messages.op_ok"), "success");
            AdminHelper::TempData("msg", $msg);
            Cache::forget("HomeIndexView");
            return redirect("/admin/Comment");
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/Comment");
        }
    }

    public function destroy(Request $request, $id)
    {
        try {
            $commentUsRepo = new CommentRepository();
            if ($commentUsRepo->DeleteComment($request->ids)) {
                return response()->json(["status" => "true"], 200);
            } else {
                return response()->json(["status" => "false"], 200);
            }
        } catch (QueryException $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            return response()->json(["status" => "false", "msg" => MessageErrorOp], 403);
        }
    }

    public function delete($id)
    {
        try {

            $commentUsRepo = new CommentRepository();
            if ($commentUsRepo->DeleteComment([$id])) {
                $msg = AdminHelper::adminAlert(trans("messages.op_ok"), "success");
            } else
                $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");

            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/comment");
        } catch (QueryException $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            $msg = AdminHelper::adminAlert(trans("messages.op_ok"), "error");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/comment");
        }
    }
    public function close($id)
    {
        try {

            $commentUsRepo = Comment::find($id);
            if ( $commentUsRepo->post->update(["has_comment"=>0])) {
                $msg = AdminHelper::adminAlert(trans("messages.op_ok"), "success");
            } else
                $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");

            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/comment");
        } catch (QueryException $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            $msg = AdminHelper::adminAlert(trans("messages.op_ok"), "error");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/comment");
        }
    }


    public function changeStatus($id)
    {
        try {
            //   $id = Crypt::decrypt($id);
            $commentUsRepo = new CommentRepository();
            if ($commentUsRepo->ChangeStatus($id)) {
                return response()->json(["status" => "true"], 200);
            } else
                return response()->json(["status" => "false"], 200);
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            return response()->json(["status" => "false", "msg" => trans("messages.op_error")], 403);
        }
    }

    public function replay($id)
    {
        try {
            $comment = Comment::find($id);
            if ($comment)
                return view("admin.comment.create", compact('comment'));
            else
                return abort(404, trans("messages.404"));
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            return response()->json(["status" => "false", "msg" => trans("messages.op_error")], 403);
        }
    }

    public function answer(Request $request)
    {
        try {
            $data = $request->all();
            $data["html"] = $request->get("content");
            $comment = Comment::with("post")->where("id",$request->get("id"))->first();

            if ($comment != null) {
                $data["to"] = $comment->email;
                $data["link"] = $comment->post->link_address;
                $data["post_title"] = $comment->post->title;

                $data["subject"] = "به دیدگاه شما پاسخ داده شد";
                Mail::send(['html' => 'admin.comment.email'], $data, function ($message) use ($data) {
                    $message->to($data["to"], auth()->user()->full_name)->subject($data["subject"]);
                });
                $commentRepository = new CommentRepository();
                $param = [
                    "email" => auth()->user()->email,
                    "post_id" =>$comment->post->id,
                    "post_type" =>$comment->post->post_type,
                    "user_id" => auth()->id(),
                    "content" => $request->get("content"),
                    "parent" => $comment->id,
                    "author_ip" => $request->getClientIp(),
                    "full_name" => auth()->user()->full_name,
                    "status" => "1"
                ];
                $commentRepository->insert($param);
                return response()->json(["status" => "true"], 200);
            } else {
                return response()->json(["status" => "false"], 200);
            }
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            return response()->json(["status" => "false", "msg" => trans("messages.op_error")], 200);
        }
    }

    public function getAll(Request $request)
    {
        try {
            $commentUsRepo = new CommentRepository();
            $comment = $commentUsRepo->getAll($request->data);

            $html = view()->make("admin.comment._list", compact("comment"))->render();
            return response()->json(["status" => "true", "html" => $html], 200);
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            return response()->json(["status" => "false", "msg" => $exp->getMessage()], 403);
        }
    }
}
