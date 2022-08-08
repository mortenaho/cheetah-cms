<?php

namespace App\Themes\archiland\Controllers;


use App\Http\Requests\HomeContactUsRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Category;
use App\Models\ContactUs;
use App\Models\Post;
use App\Models\Slider;
use App\Repositories\ContactUsRepository;
use App\Repositories\UserRepository;
use App\Repositories\OrdersRepository;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
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
        App::setLocale($locale);
        $sliders = Slider::where("status", "1")->get();
        $messages = ContactUs::where("status", "1")->get();
        $about = DB::table("post")->where("post_type", "=", "about_us")->where("language", "=", "$this->lang")->first();
        $customer = DB::table("post")->where("post_type", "=", "customer")->where("status", "=", "1")->where("language", "=", "$this->lang")->orderBy("ordering", "asc")->get();
        $last_post = DB::table("post")->where("post_type", "=", "post")->where("language", "=", "$this->lang")->where("status", "=", "1")->orderBy("created_at", "desc")->limit(3)->get();
        $customer_tel = DB::table("contact_us")->where("language", "=", "$this->lang")->where("is_show", "=", "1")->orderBy("created_at", "desc")->limit(5)->get();
        $galleries = DB::table("post")->where("post_type", "=", "gallery")->where("parent", " = ", null)->where("language", "=", "$this->lang")->where("status", "=", "1")->orderBy("created_at", "desc")->limit(5)->get();
        $portfolio = Category::with(["posts"=>function ($query){
            $query->where("featured", "1");
        }])
            ->where("type", "=", "portfolio")
            ->where("status", "=", "1")
            ->get();
        return view("home::index.index", compact('sliders', 'about', 'customer', 'last_post','galleries', 'portfolio', 'customer_tel','messages','locale'));
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
            $services = Post::with("post_meta")->where("post_type", "service")
                ->where("language", Lang::getLocale())
                ->get();
            return \view("home::about_us.index", compact('about','services'));
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

    public function login($locale)
    {
        try {
            if (Auth::check()) {
                return redirect("/");
            } else {
                App::setLocale($locale);
                $title = "ورود / ثبت نام";
                return view("home::login.index", compact('title'));
            }

        } catch (\Exception $exception) {
            Log::error($exception->getMessage(), ["code" => $exception->getCode(), "line" => $exception->getLine()]);
            return abort(404, Message404Search);
        }
    }

    public function shop($locale)
    {
        try {
            App::setLocale($locale);
            $posts = Post::with("post_meta")
                ->where("post_type", "=", "product")
                ->orderBy("created_at", "desc")
                ->paginate(20);
            $title = "فروشگاه";
            $include_page = "products";
            $categories = Category::where("type", "product")->where("status", "1")->get();
            return view("home::shop.index", compact('title', 'include_page', 'posts', 'categories'));
        } catch (\Exception $exception) {
            Log::error($exception->getMessage(), ["code" => $exception->getCode(), "line" => $exception->getLine()]);
            return abort(404, Message404Search);
        }
    }

    public function cart($locale)
    {
        try {
            App::setLocale($locale);
            $posts = Post::with("post_meta")
                ->where("post_type", "=", "product")
                ->orderBy("created_at", "desc")
                ->paginate(20);
            $cart = Session()->get('cart');
            $title = "فروشگاه";
            $include_page = "products";
            $categories = Category::where("type", "product")->where("status", "1")->get();
            return view("home::shop.cart", compact('title', 'include_page', 'posts','cart', 'categories'));
        } catch (\Exception $exception) {
            Log::error($exception->getMessage(), ["code" => $exception->getCode(), "line" => $exception->getLine()]);
            return abort(404, Message404Search);
        }
    }

//    public function addToCart(Request $cartdata)
//    {
//        //App::setLocale($locale);
//        $id = $cartdata["id"];
//        $cart = Session()->get('cart');
//        if(isset($cart[$id])){
//            $cart[$id]['qty'] += 1;
//        }
//        else {
//            $product = Post::find($id);
//            $cart[$product->id] = array(
//                "id" => $product->id,
//                "product_name" => $product->title,
//                "product_photo" => $product->thumb,
//                "product_unit" => "تعداد",
//                "product_price" => 10000,
//                "qty" => 1,
//            );
//        }
//
//        Session()->put('cart', $cart);
//
//        Session()->flash('success','Add to cart!');
//        return \response()->json(["status" => "true","cart_items"=>count($cart)], 200);
//    }
//
//    public function updateCart(Request $cartdata)
//    {
//        $cart = Session()->get('cart');
//        $update_id = $cartdata["id"];
//        $qty = $cartdata["qty"];
//        if ($qty > 0) {
//            $cart[$update_id]['qty'] = $qty;
//        } else {
//            unset($cart[$update_id]);
//        }
//        $item_total_price =  $cart[$update_id]['qty'] * $cart[$update_id]['product_price'];
//        $total_price=0;
//        foreach ( $cart as $item )
//        {
//            $total_price +=  $item['qty'] * $item['product_price'] ;
//        }
//        Session()->put('cart', $cart);
//        return \response()->json(["status" => "true","cart_items"=>count($cart),"id"=>$update_id,"total_price"=>$total_price,"item_total_price"=>$item_total_price], 200);
//    }
//
//    public function updateCartOld(Request $cartdata)
//    {
//        $cart = Session()->get('cart');
//
//        foreach ($cartdata->all() as $id => $val)
//        {
//            if ($val > 0) {
//                $cart[$id]['qty'] += $val;
//            } else {
//                unset($cart[$id]);
//            }
//        }
//
//        Session()->put('cart', $cart);
//        return redirect()->back();
//    }
//
//    public function deleteCart(Request $cartdata)
//    {
//        $id = $cartdata["id"];
//        $cart = Session()->get('cart');
//        unset($cart[$id]);
//        $total_price=0;
//        foreach ( $cart as $item )
//        {
//            $total_price +=  $item['qty'] * $item['product_price'] ;
//        }
//        Session()->put('cart', $cart);
//        return \response()->json(["status" => "true","cart_items"=>count($cart),"total_price"=>$total_price], 200);
//    }
//
//    public function checkOut(Request $cartdata)
//    {
//        $cart = Session()->get('cart');
//
//        $qu = new OrdersRepository();
//
//        $user_id = null;
//        if (auth()->check())
//            $user_id = auth()->id();
//
//
//        $total_price=0;
//        foreach ( $cart as $item )
//        {
//            $total_price +=  $item['qty'] * $item['product_price'] ;
//        }
//
//        $param = ["user_id" => $user_id, "customer_name" => "majid mohammadi",
//            "customer_mobile" => "09119047411", "customer_address" => "babol",
//            "payment_status" => 0, "table_id" => 1, "table_name" =>"posts",
//            "type_name" => "product_list",  "register_date" => Carbon::now(),
//            "discount" => 0, "total_price" =>  $total_price, "description" =>"shopping",
//            "order_form_id" => 0,"status" =>0];
//
//        $id = $qu->insert($param);
//
//        return \response()->json(["status" => "true","cart_items"=>count($cart),"total_price"=>$total_price,"id"=>$id], 200);
//    }

    //TODO finish later
    public function register($locale)
    {
        try {
            App::setLocale($locale);
            return \view("home::register.index");
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "line" => $exp->getLine()]);
            return abort(404, Message404Search);
        }
    }

    //TODO finish later
    public function registerSave(RegisterRequest $request)
    {
        try {

            $digits = 4;
            $code =  rand(pow(10, $digits-1), pow(10, $digits)-1);

            $request->request->add(["ip", $request->ip()]);
            $request->request->add(["user_type", 0]);
            $request->request->add(["code", $code]);
            $request->request->add(["status", 1]);

            $userRepo = new UserRepository();
            $res = $userRepo->insert($request->only($userRepo->getFillable()));
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

}

