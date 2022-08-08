<?php

namespace App\Http\Controllers\Admin;


use AdminHelper;
use App\Http\Requests\ProductRequest;
use App\Models\Post;
use App\Repositories\CategoryRepository;
use App\Repositories\PostMetaRepository;
use App\Repositories\PostRepository;
use Illuminate\Database\QueryException;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;

//For test
class ContactInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        View::share('CurrentPage', 'contact_info');
    }

    public function index()
    {
        return view('admin.contact_info.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contact_info.create');
    }

    public function store(ProductRequest $request)
    {
        try {
            /// insert to database
            $contact_infoRepo = new PostRepository();
            $request->request->add([
                "post_type" => "contact_info",
                "author" => auth()->user()->full_name,
                "user_id" => auth()->id(),
                "uid" => uniqid()
            ]);

            try {
                $id = $contact_infoRepo->insert($request->only($contact_infoRepo->getFillable()));
                if ($id >0) {
                    $post_meta=[
                        ["post_id"=>$id,"meta_key"=>"tel_1","meta_value"=>$request->tel_1],
                        ["post_id"=>$id,"meta_key"=>"tel_2","meta_value"=>$request->tel_2],
                        ["post_id"=>$id,"meta_key"=>"fax","meta_value"=>$request->fax],
                        ["post_id"=>$id,"meta_key"=>"mobile","meta_value"=>$request->mobile],
                        ["post_id"=>$id,"meta_key"=>"email","meta_value"=>$request->email],
                        ["post_id"=>$id,"meta_key"=>"address","meta_value"=>$request->address],
                        ["post_id"=>$id,"meta_key"=>"latitude","meta_value"=>$request->latitude],
                        ["post_id"=>$id,"meta_key"=>"longitude","meta_value"=>$request->longitude],
                        ["post_id"=>$id,"meta_key"=>"postal_code","meta_value"=>$request->postal_code],
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
            return redirect("/admin/contact_info");
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/contact_info");
        }
    }

    public function show($id)
    {
        try {
            $contact_info = Post::find($id);
            if ($contact_info)
                return view("admin.contact_info.edit", compact('contact_info'));
            else
                return abort(404, trans("messages.404"));
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/contact_info");
        }
    }

    public function edit($id)
    {
        try {
            $contact_info = Post::find($id);
            if ($contact_info) {
                $catRep = new CategoryRepository();
                $categories = $catRep->getByType("contact_info");return view("admin.contact_info.edit", compact('contact_info', 'categories'));
            } else
                return abort(404, trans("messages.404"));
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/contact_info");
        }
    }

    public function update(ProductRequest $request, $id)
    {
        try {
            /// insert to database
            $contact_infoRepo = new PostRepository();
            $request->request->set("post_type","contact_info");
            $contact_infoRepo->updatings($request->only($contact_infoRepo->getFillable()), $id);
            $post_meta=[
                ["post_id"=>$id,"meta_key"=>"tel_1","meta_value"=>$request->tel_1],
                ["post_id"=>$id,"meta_key"=>"tel_2","meta_value"=>$request->tel_2],
                ["post_id"=>$id,"meta_key"=>"fax","meta_value"=>$request->fax],
                ["post_id"=>$id,"meta_key"=>"mobile","meta_value"=>$request->mobile],
                ["post_id"=>$id,"meta_key"=>"email","meta_value"=>$request->email],
                ["post_id"=>$id,"meta_key"=>"address","meta_value"=>$request->address],
                ["post_id"=>$id,"meta_key"=>"latitude","meta_value"=>$request->latitude],
                ["post_id"=>$id,"meta_key"=>"longitude","meta_value"=>$request->longitude],
                ["post_id"=>$id,"meta_key"=>"postal_code","meta_value"=>$request->postal_code],
            ];

            $p_meta=new PostMetaRepository();
            $p_meta->updatings($post_meta,$id);
            $msg = AdminHelper::adminAlert(trans("messages.op_ok"), "success");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/contact_info");
        } catch (QueryException $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/contact_info");
        }
    }

    public function destroy($id)
    {
        try {
            $contact_infoRepo = new PostRepository();
            $res = $contact_infoRepo->DeletePost($id);
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
            $contact_infoRepo = new PostRepository();
            if ($contact_infoRepo->ChangeStatus($id)) {
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
            $contact_infoRepo = new PostRepository();
            $categories = $contact_infoRepo->getByType($type);
            if ($categories != null) {
                $html = \view()->make("admin.contact_info._contact_info", compact("categories"))->render();
                return response()->json(["status" => "true", "html" => "$html"], 200);
            } else
                return response()->json(["status" => "false"], 200);
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            return response()->json(["status" => "false", "msg" => trans("messages.op_error")], 403);
        }
    }
}
