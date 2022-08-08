<?php

namespace App\Themes\industry\Controllers;

use App\Models\Post;
use App\Repositories\SettingRepository;
use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected $lang;

    public function __construct()
    {
        $locale = app()->getLocale();
        //dd($locale);
        $this->lang =  $locale;
        $menu = DB::table("menu")->where("language", "=", "$this->lang")->where("status", "=", "1")->orderBy("ordering", "asc")->get();
        $contact_info = Post::with("post_meta")->where("post_type", "=", "contact_info")->where("status", "=", "1")->where("language", "$this->lang")->first();
        if (!cache()->has("all")) {
            $setting = new SettingRepository();
            $model = $setting->getSetting();
            site_setting("all", $model);
        }
        $site = (object)site_setting("all");
        $plugin = Cache::get("site_plugin");
        view()->share(compact('menu', 'site', 'contact_info', 'plugin','locale'));
    }

}
