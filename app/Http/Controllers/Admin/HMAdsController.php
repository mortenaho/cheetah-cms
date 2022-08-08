<?php

namespace App\Http\Controllers\Admin;


use AdminHelper;
use App\Models\HMAds;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;

class HMAdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        View::share('CurrentPage', 'HMAds');
    }

    public function index()
    {
        return view('admin.hm_ads.index');
    }

    public function show($id)
    {
        try {
            $ads = HMAds::find($id);
            if ($ads)
                return view("admin.hm_ads.edit", compact('ads'));
            else
                return abort(404, trans("messages.404"));
        } catch (\Exception $exp) {
Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file"=>$exp->getFile(),"line" => $exp->getLine()]);
            $msg = AdminHelper::adminAlert(trans("messages.op_error"), "error");
            AdminHelper::TempData("msg", $msg);
            return redirect("/admin/HMAds");
        }
    }




}
