<?php
/**
 * Created by PhpStorm.
 * User: mortenaho
 * Date: 7/1/2019
 * Time: 4:30 PM
 */

namespace App\Http\Controllers\Admin;


use AdminHelper;
use App\Http\Controllers\Controller;
use App\Models\Attachment;
use App\Repositories\AttachmentRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class AttachmentController extends Controller
{
    public function __construct()
    {
        view()->share('CurrentPage', '');
    }

    public function index($id)
    {
        $type_id=$id;
        return view('admin.attachment.index',compact('type_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $type_id=$id;
        return view('admin.attachment.create',compact('type_id'));
    }

    public function store(Request $request)
    {
        try {
            /// insert to database
            $attachmentRepo = new AttachmentRepository();
            if($request->input("file") !=null) {
                $request->request->add(["mime_type" => File::extension($request->input("file"))]);
            }
            $res = $attachmentRepo->insert($request->only($attachmentRepo->getFillable()));
            if ($res != null) {
                $msg = AdminHelper:: adminAlert(trans("messages.op_ok"), "success");
                AdminHelper::TempData("msg", $msg);
            } else {
                $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
                AdminHelper::TempData("msg", $msg);
            }
            return redirect("/admin/attachments/".$request->type_id);
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file"=>$exp->getFile(),"line" => $exp->getLine()]);
            $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/attachments/".+$request->type_id);
        }
    }

    public function show($id)
    {
        $attachment = Attachment::find($id);
        try {

            if ($attachment)
                return view("admin.attachment.edit", compact('attachment'));
            else
                return abort(404, trans("messages.404"));
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file"=>$exp->getFile(),"line" => $exp->getLine()]);
            $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/attachments/".$attachment->type_id,compact('type_id'));
        }
    }

    public function edit($id)
    {
        $attachment = Attachment::find($id);
        try {

            if ($attachment)
                return view("admin.attachment.edit", compact('attachment'));
            else
                return abort(404, trans("messages.404"));
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file"=>$exp->getFile(),"line" => $exp->getLine()]);
            $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/attachments/".$attachment->type_id);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            if($request->input("file") !=null) {
                $request->request->add(["mime_type" => File::extension($request->input("file"))]);
            }
            /// insert to database
            $attachmentRepo = new AttachmentRepository();
            $attachmentRepo->updatings($request->only($attachmentRepo->getFillable()), $id);
            $msg = AdminHelper::adminAlert(trans("messages.op_ok"), "success");
            AdminHelper::TempData("msg", $msg);

            return redirect("/admin/attachments/".$request->type_id);
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file"=>$exp->getFile(),"line" => $exp->getLine()]);
            $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/attachments/".$request->type_id);
        }
    }

    public function destroy($id)
    {
        try {
            $attachmentRepo = new AttachmentRepository();
            if ($attachmentRepo->DeleteAttachment($id)) {
                return response()->json(["status" => "true"], 200);
            } else
                return response()->json(["status" => "false"], 200);
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file"=>$exp->getFile(),"line" => $exp->getLine()]);
            return response()->json(["status" => "false", "msg" =>trans("messages.op_error")], 403);
        }
    }

    public function changeStatus($id)
    {
        try {
            $attachmentRepo = new AttachmentRepository();
            if ($attachmentRepo->ChangeStatus($id)) {
                return response()->json(["status" => "true"], 200);
            } else
                return response()->json(["status" => "false"], 200);
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file"=>$exp->getFile(),"line" => $exp->getLine()]);
            return response()->json(["status" => "false", "msg" =>trans("messages.op_error")], 403);
        }
    }
}
