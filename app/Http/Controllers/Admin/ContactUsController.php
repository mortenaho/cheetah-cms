<?php

namespace App\Http\Controllers\Admin;


use AdminHelper;
use App\Helpers\Validations\ContactUsValidation;
use App\Http\Requests\ContactUsRequest;
use App\Http\Requests\MailRequest;
use App\Models\ContactUs;
use App\Repositories\ContactUsRepository;
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

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        View::share('CurrentPage', 'contact_us');
    }

    public function index($type = null)
    {
        $contacRepo=new ContactUsRepository();
        $contacts =$contacRepo->getAll(null);

        return view('admin.contact_us.index', compact("contacts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contact_us.create');
    }

    public function store(ContactUsRequest $request)
    {
        try {
            /// insert to database
            $contactUsRepo = new ContactUsRepository();
            $res = $contactUsRepo->insert($request->only($contactUsRepo->getFillable()));
            if ($res != null) {
                $msg = AdminHelper:: adminAlert(trans("messages.op_ok"), "success");
                AdminHelper::TempData("msg", $msg);
                Cache::forget("HomeIndexView");
            } else {
                $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
                AdminHelper::TempData("msg", $msg);
            }
            return redirect("/admin/ContactUs");
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/ContactUs");
        }
    }

    public function show($id)
    {
        try {
            //   $id=Crypt::decrypt($id);
            $contacts = ContactUs::find($id);
            if ($contacts) {
                $contactUsRepo = new ContactUsRepository();
                $contactUsRepo->ChangeStatus($id, "1");
                return view("admin.contact_us.show", compact('contacts'));
            } else
                return abort(404, trans("messages.404"));
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/ContactUs");
        }
    }

    public function edit($id)
    {
        try {
            // $id = Crypt::decrypt($id);
            $contactUs = ContactUs::find($id);
            if ($contactUs)
                return view("admin.contact_us.edit", compact('contactUs'));
            else
                return abort(404, trans("messages.404"));
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/ContactUs");
        }
    }

    public function update(ContactUsRequest $request, $id)
    {
        try {
            //  $id = Crypt::decrypt($id);
            /// insert to database
            $request->request->set("post_type", "contact_us");
            $contactUsRepo = new ContactUsRepository();
            $contactUsRepo->updatings($request->only($contactUsRepo->getFillable()), $id);
            $msg = AdminHelper::adminAlert(trans("messages.op_ok"), "success");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/ContactUs");
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/ContactUs");
        }
    }

    public function destroy(Request $request, $id)
    {
        try {

            $contactUsRepo = new ContactUsRepository();
            if ($contactUsRepo->DeleteContactUs($request->ids)) {
                return response()->json(["status" => "true"], 200);
            } else
                return response()->json(["status" => "false"], 200);
        } catch (QueryException $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            return response()->json(["status" => "false", "msg" => MessageErrorOp], 403);
        }
    }

    public function delete($id)
    {
        try {

            $contactUsRepo = new ContactUsRepository();
            if ($contactUsRepo->DeleteContactUs([$id])) {
                $msg = AdminHelper::adminAlert(trans("messages.op_ok"), "success");
                AdminHelper::TempData("msg", $msg);
            } else {
                $msg = AdminHelper::adminAlert(trans("messages.op_error"), "success");
                AdminHelper::TempData("msg", $msg);
            }
        } catch (QueryException $exp) {
            $msg = AdminHelper::adminAlert(trans("messages.op_error"), "success");
            AdminHelper::TempData("msg", $msg);
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            return response()->json(["status" => "false", "msg" => MessageErrorOp], 403);
        }
        return redirect("/admin/ContactUs");
    }

    public function changeStatus($id)
    {
        try {
            //   $id = Crypt::decrypt($id);
            $contactUsRepo = new ContactUsRepository();
            if ($contactUsRepo->ChangeStatus($id)) {
                return response()->json(["status" => "true"], 200);
            } else
                return response()->json(["status" => "false"], 200);
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            return response()->json(["status" => "false", "msg" => trans("messages.op_error")], 403);
        }
    }

    public function isShow($id)
    {
        try {
            $contactUsRepo = new ContactUsRepository();
            if ($contactUsRepo->isShow($id)) {
                $msg = AdminHelper::adminAlert(trans("messages.op_ok"), "success");
                AdminHelper::TempData("msg", $msg);
            } else {
                $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
                AdminHelper::TempData("msg", $msg);
            }
        } catch (\Exception $exp) {
            $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
            AdminHelper::TempData("msg", $msg);
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
        }
        return redirect("/admin/ContactUs/$id");
    }

    public function replay($id)
    {
        try {
            $contact = ContactUs::find($id);
            if ($contact)
                return view("admin.contact_us.create", compact('contact'));
            else
                return abort(404, trans("messages.404"));
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            return response()->json(["status" => "false", "msg" => trans("messages.op_error")], 403);
        }
    }

    public function answer(MailRequest $request)
    {
        try {
            $request->request->set("post_type", "contact_us");
            $data = $request->all();
            $data["html"] = $request->message;
            Mail::send(['html' => 'admin.contact_us.email'], $data, function ($message) use ($data) {
                $message->to($data["to"], auth()->user()->full_name)->subject($data["subject"]);
            });
            $contactRepository = new ContactUsRepository();
            $param = [
                "email" => auth()->user()->email,
                "subject" => $request->subject,
                "message" => $request->message,
                "parent" => $request->parent,
                "ip" => $request->getClientIp(),
                "full_name" => auth()->user()->full_name,
                "mobile" => auth()->user()->mobile,
                "status" => "1"
            ];
            $contactRepository->insert($param);
            return response()->json(["status" => "true"], 200);
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            return response()->json(["status" => "false", "msg" => trans("messages.op_error")], 200);
        }
    }

    public function getAll(Request $request)
    {
        try {
            $contactUsRepo = new ContactUsRepository();
            $contacts = $contactUsRepo->getAll($request->data);

            $html = view()->make("admin.contact_us._list", compact("contacts"))->render();
            return response()->json(["status" => "true", "html" => $html], 200);
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            return response()->json(["status" => "false", "msg" => $exp->getMessage()], 403);
        }
    }
}
