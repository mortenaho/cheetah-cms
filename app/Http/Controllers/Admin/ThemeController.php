<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;


class ThemeController extends Controller
{
    private $themes;

    public function __construct()
    {
        $this->themes = new \App\Helpers\Theme();
        View::share('CurrentPage', 'themes');
    }

    public function index()
    {
        try {
            $siteThemes = $this->themes->all();
            return view("admin.theme.index", compact("siteThemes"));
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            return abort(404, Message404Page);
        }
    }

    public function Change($name)
    {
        try {
            $this->themes->set($name);
            return response()->json(["status" => "true"], 200);
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            return response()->json(["status" => "true"], 404);
        }
    }
}
