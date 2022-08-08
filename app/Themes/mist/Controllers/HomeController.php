<?php

namespace App\Themes\mist\Controllers;


use App\Http\Requests\HomeContactUsRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Slider;
use App\Repositories\ContactUsRepository;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Log;
use Unisharp\Setting\Setting;
use Unisharp\Setting\SettingFacade;


/**
 * Created by PhpStorm.
 * User: mortenaho
 * Date: 6/28/2019
 * Time: 12:51 AM
 */
class HomeController extends Controller
{

    public function index($locale)
    {

        app()->setLocale($locale);
        $sliders = Slider::where("status", "1")->get();
        $about = DB::table("post")->where("post_type", "=", "about_us")->where("language", "=", "{$this->lang}")->first();
        $customer = DB::table("post")->where("post_type", "=", "customer")->where("status", "=", "1")->where("language", "=", "{$this->lang}")->orderBy("ordering", "asc")->get();
        $last_post = DB::table("post")->where("post_type", "=", "post")->where("language", "=", "{$this->lang}")->where("status", "=", "1")->orderBy("created_at", "desc")->limit(12)->get();
        $customer_tel = DB::table("contact_us")->where("language", "=", "{$this->lang}")->where("is_show", "=", "1")->orderBy("created_at", "desc")->limit(5)->get();
        $portfolio = Category::with(["posts"=>function ($query){
        $query->where("featured", "1");
    }])
            ->where("type", "=", "portfolio")
            ->where("status", "=", "1")
            ->get();
        return view("home::index.index", compact('sliders', 'about', 'customer', 'last_post', 'portfolio', 'customer_tel','locale'));
    }

    public function about($locale)
    {
        try {
            App::setLocale($locale);
            return view(theme_view('main.about'), compact('posts'));
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "line" => $exp->getLine()]);
            return abort(404, Message404Search);
        }
    }

    public function setLocale($lang)
    {
        try {
            app()->setLocale("$lang");
            changeEnv(["APP_LOCALE" => "$lang"]);
            return redirect(url()->previous());
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "line" => $exp->getLine()]);
            return abort(404, Message404Search);
        }
    }

    public function contactUs($locale)
    {
        try {
            App::setLocale($locale);
            $contact_info = Post::with("post_meta")->where("post_type", "contact_info")
                ->where("language", Lang::getLocale())
                ->first();
            return \view("home::contact_us.index", compact('contact_info'));
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "line" => $exp->getLine()]);
            return abort(404, Message404Search);
        }
    }

    public function contactSendMessage(HomeContactUsRequest $request)
    {
        try {
            $request->request->add(["ip", $request->ip()]);
            $request->request->add(["is_show", 0]);
            $request->request->add(["status", 0]);
            $request->request->add(["language", Lang::getLocale()]);


            $contactURepo = new ContactUsRepository();
            $res = $contactURepo->insert($request->only($contactURepo->getFillable()));
            // dd($posts);
            if ($res > 0)
                return \response()->json(["status" => "true"], 200);
            else
                return \response()->json(["status" => "false"], 200);
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "line" => $exp->getLine()]);
            return \response()->json(["status" => "false"], 500);
        }
    }

    public function aboutUs($locale)
    {
        try {
            App::setLocale($locale);
            $about = Post::with("post_meta")->where("post_type", "about_us")
                ->where("language", Lang::getLocale())
                ->first();
            return \view("home::about_us.index", compact('about'));
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "line" => $exp->getLine()]);
            return abort(404, Message404Search);
        }
    }

    public function service($locale)
    {
        try {
            App::setLocale($locale);
            $services = Post::with("post_meta")->where("post_type", "service")
                ->where("language", Lang::getLocale())
                ->get();
            return \view("home::service.index", compact('services'));
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "line" => $exp->getLine()]);
            return abort(404, Message404Search);
        }
    }

    public function certificate($locale)
    {
        try {
            App::setLocale($locale);
            $certificates = Post::with("post_meta")->where("post_type", "certificate")
                ->where("language", Lang::getLocale())
                ->get();
            return \view("home::certificate.index", compact('certificates'));
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "line" => $exp->getLine()]);
            return abort(404, Message404Search);
        }
    }

    public function training($locale)
    {
        try {
            App::setLocale($locale);
            $training = Post::with('category',"post_meta")->where("post_type", "training")
                ->where("language", Lang::getLocale())
                ->orderBy("created_at", "desc")
                ->paginate(8);
            $categories=Category::where("type","training")->where("status","1")->get();
            return \view("home::training.index", compact('training','categories'));
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "line" => $exp->getLine()]);
            return abort(404, Message404Search);
        }
    }

    public function posts($locale)
    {
        try {
            App::setLocale($locale);
            $services = Post::with("post_meta")->where("post_type", "service")
                ->where("language", Lang::getLocale())
                ->get();
            return \view("home::post.index", compact('services'));
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "line" => $exp->getLine()]);
            return abort(404, Message404Search);
        }
    }

    public  function galleries($locale,$parent=0)
    {
        try {
            App::setLocale($locale);
            $galleries = Post::with("post_meta")->where("post_type", "gallery")
                ->where("language", Lang::getLocale())
                ->where("parent","=",$parent)
                ->get();

            return view("home::gallery.index",compact("galleries"));
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "line" => $exp->getLine()]);
            return abort(404, Message404Search);
        }

    }

}

