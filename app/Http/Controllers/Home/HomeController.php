<?php

namespace App\Http\Controllers\Home;


use App\Http\Requests\HomeContactUsRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\VisitRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use App\Models\Slider;

use App\Repositories\ContactUsRepository;
use App\Repositories\CustomerRepository;
use App\Repositories\HMPostRepository;

use App\Http\Controllers\Controller;
use App\Repositories\OrderDetailsRepository;
use App\Repositories\OrdersRepository;
use App\Repositories\PostRepository;
use App\Repositories\UserRepository;
use App\Repositories\VisitRepository;
use DateInterval;
use DateTime;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\View;

//This is test for git
class HomeController extends Controller
{
    private $lang;

    public function __construct()
    {
        $this->lang = App::getLocale();
        $menu = DB::table("menu")->where("language", "=", "$this->lang")->where("status", "=", "1")->orderBy("ordering", "asc")->get();
        $contact_info = Post::with("post_meta")->where("post_type", "=", "contact_info")->where("status", "=", "1")->where("language", "$this->lang")->first();
        $site = DB::table("setting")->first();
        $plugin = Cache::get("site_plugin");
        View::share(compact('menu', 'site', 'contact_info', 'plugin'));
    }

    public function index($locale)
    {
        App::setLocale($locale);
        $sliders = Slider::where("status", "1")->get();
        $about = DB::table("post")->where("post_type", "=", "about_us")->where("language", "=", "$this->lang")->first();
        $customer = DB::table("post")->where("post_type", "=", "customer")->where("status", "=", "1")->where("language", "=", "$this->lang")->get();
        $last_post = DB::table("post")->where("post_type", "=", "post")->where("language", "=", "$this->lang")->where("status", "=", "1")->orderBy("created_at", "desc")->limit(12)->get();
        $customer_tel = DB::table("contact_us")->where("language", "=", "$this->lang")->where("is_show", "=", "1")->orderBy("created_at", "desc")->limit(5)->get();
        $portfolio = Category::with("posts")->where("type", "=", "portfolio")->where("status", "=", "1")->get();
        return view("home::index.index", compact('sliders', 'about', 'customer', 'last_post', 'portfolio', 'customer_tel'));
    }

// show hm_post details
    public function post($post_code, $url_name = null)
    {
        try {
            $postRepo = new HMPostRepository();
            $post = $postRepo->FindByPostCode($post_code);
            $nextAndPrePost = $postRepo->NextAndPrevious(Crypt::decrypt($post->id));
            $relatedPost = $postRepo->RelatedPost($post->category_id);
            $content = file_get_contents($post->link_address);

            if ($post != null)
                return view(theme_view('hm_post.details'), compact('post', 'nextAndPrePost', 'relatedPost', 'content'));
            else
                return abort(404, Message404Search);
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "line" => $exp->getLine()]);
            return abort(404, Message404Search);
        }
    }


//get all hm_post and show .
    public function ContactSendMessage(HomeContactUsRequest $request)
    {
        try {
            $request->request->add(["ip"=> $request->ip()]);
            $request->request->add(["is_show"=> 0]);
            $request->request->add(["status"=> 0]);
            $request->request->add(["language"=>Lang::getLocale()]);

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

    //insert to visit table
    public function visit(VisitRequest $request)
    {
        try {

            $userAgent = $request->userAgent();
            $bRes =  $this->getBrowser($userAgent);

            $visit_date =m_jdate("Y/m/d");
            $visit_date =  $this->convertPersianToEng($visit_date);
            $visit_date = str_replace('/', '', $visit_date);
            $year_month = substr($visit_date,0,6);

            $request->request->add(["category_id"=> (int)$request["category_id"]]);
            $request->request->add(["post_id"=> (int)$request["post_id"]]);
            $request->request->add(["user_ip"=> $request->ip()]);
            $request->request->add(["year_month"=>$year_month]);
            $request->request->add(["browser_name"=> $this->get_browser_name($userAgent)]);
            $request->request->add(["browser_version"=> $bRes["version"]]);
            $request->request->add(["device_type"=> $this->detectDevice($userAgent)]);
            $request->request->add(["device_name"=> $bRes["platform"]]);
            $request->request->add(["visitor_session_time"=> 1000]);
            $request->request->add(["visit_type"=> "normal"]);
            $request->request->add(["status"=> 1]);

            $visitRepo = new VisitRepository();
            $res = $visitRepo->insert($request->all($visitRepo->getFillable()));
            if ($res > 0)
                return \response()->json(["status" => "true"], 200);
            else
                return \response()->json(["status" => "false"], 200);

        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "line" => $exp->getLine()]);
            return \response()->json($exp->getMessage(), 500);
        }
    }


    //--- function for detect device
    private  function detectDevice($userAgent){

        $devicesTypes = array(
            "computer" => array("Trident","msie 10", "msie 9", "msie 8", "windows.*firefox", "windows.*chrome", "x11.*chrome", "x11.*firefox", "macintosh.*chrome", "macintosh.*firefox", "opera"),
            "tablet"   => array("tablet", "android", "ipad", "tablet.*firefox"),
            "mobile"   => array("mobile ", "android.*mobile", "iphone", "ipod", "opera mobi", "opera mini"),
            "bot"      => array("googlebot", "mediapartners-google", "adsbot-google", "duckduckbot", "msnbot", "bingbot", "ask", "facebook", "yahoo", "addthis")
        );
        foreach($devicesTypes as $deviceType => $devices) {
            foreach($devices as $device) {
                if(preg_match("/" . $device . "/i", $userAgent)) {
                    $deviceName = $deviceType;
                }
            }
        }
        return ucfirst($deviceName);
    }
    //--- function for get user browser name
    private function getBrowser($u_agent)
    {
        $bname = 'Unknown';
        $platform = 'Unknown';
        $version= "";

        //First get the platform?
        if (preg_match('/linux/i', $u_agent)) {
            $platform = 'linux';
        }
        elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
            $platform = 'mac';
        }
        elseif (preg_match('/windows|win32/i', $u_agent)) {
            $platform = 'windows';
        }

        // Next get the name of the useragent yes seperately and for good reason
        if (preg_match('~MSIE|Internet Explorer~i', $_SERVER['HTTP_USER_AGENT']) || (strpos($_SERVER['HTTP_USER_AGENT'], 'Trident/7.0; rv:11.0') !== false)) {
            $bname = 'Internet Explorer';
            $ub = "MSIE";
        }
        elseif(preg_match('/Firefox/i',$u_agent))
        {
            $bname = 'Mozilla Firefox';
            $ub = "Firefox";
        }
        elseif(preg_match('/Chrome/i',$u_agent))
        {
            $bname = 'Google Chrome';
            $ub = "Chrome";
        }
        elseif(preg_match('/Safari/i',$u_agent))
        {
            $bname = 'Apple Safari';
            $ub = "Safari";
        }
        elseif(preg_match('/Opera/i',$u_agent))
        {
            $bname = 'Opera';
            $ub = "Opera";
        }
        elseif(preg_match('/Netscape/i',$u_agent))
        {
            $bname = 'Netscape';
            $ub = "Netscape";
        }

        // finally get the correct version number
        $known = array('Version', $ub, 'other');
        $pattern = '#(?<browser>' . join('|', $known) .
            ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
        if (!preg_match_all($pattern, $u_agent, $matches)) {
            // we have no matching number just continue
        }

        // see how many we have
        $i = count($matches['browser']);
        if ($i != 1) {
            //we will have two since we are not using 'other' argument yet
            //see if version is before or after the name
            if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
                $version= $matches['version'][0];
            }
            else {

                if(isset($matches['version'][1]))
                    $version= $matches['version'][1];
                else
                    $version = "x";
            }
        }
        else {
            $version= $matches['version'][0];
        }

        // check if we have a number
        if ($version==null || $version=="") {$version="?";}

        return array(
            'userAgent' => $u_agent,
            'name'      => $bname,
            'version'   => $version,
            'platform'  => $platform,
            'pattern'    => $pattern
        );
    }

    private function get_browser_name($user_agent){
        $t = strtolower($user_agent);
        $t = " " . $t;
        if     (strpos($t, 'opera'     ) || strpos($t, 'opr/')     ) return 'Opera'            ;
        elseif (strpos($t, 'edge'      )                           ) return 'Edge'             ;
        elseif (strpos($t, 'chrome'    )                           ) return 'Chrome'           ;
        elseif (strpos($t, 'safari'    )                           ) return 'Safari'           ;
        elseif (strpos($t, 'firefox'   )                           ) return 'Firefox'          ;
        elseif (strpos($t, 'msie'      ) || strpos($t, 'trident/7')) return 'Internet Explorer';
        return 'Unkown';
    }

    //---functions for convert persian to en numbers and vise versa
    private function convertEngToPersian($string){
        $arr1 = str_split($string);
        $farsi_array = array("۰", "۱", "۲", "۳", "۴", "۵", "۶", "۷", "۸", "۹", ".");
        $english_array = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", ".");
        $resultArray =str_replace($english_array, $farsi_array, $arr1);
        $result_string = join($resultArray);
        return $result_string;
    }

    private function PerToEng($string){
        $arr1 = str_split($string);
        $farsi_array = array("۰", "۱", "۲", "۳", "۴", "۵", "۶", "۷", "۸", "۹", ".");
        $english_array = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", ".");
        $resultArray =str_replace($farsi_array,$english_array, $arr1);
        $result_string = join($resultArray);
        return $result_string;
    }

    private function convertPersianToEng($string)
    {
        $str=explode("/",$string);
        $result_string="";
        $farsi_array = "۱۲۳۴۵۶۷۸۹۰";
        $english_array = array(1=>"1", 3=>"2",5=> "3",7=> "4",9=> "5", 11=>"6",13=> "7",15=> "8", 17=>"9",19=>"0");
        $arr_farsi = str_split($farsi_array);
        for ($i=0;$i<sizeof($str);$i++){
            $arr_tmp = str_split($str[$i]);
            for ($j=1;$j<sizeof($arr_tmp);$j+=2){
                $index=array_search($arr_tmp[$j], $arr_farsi);
                if(isset($english_array[$index]))
                    $result_string.=$english_array[$index];
            }
            if ($i!=sizeof($str)-1)
                $result_string.="/";
        }
        return $result_string;
    }


    //show posts with category and subCategory
    public function category($url_name)
    {
        try {
            $postRep = new HMPostRepository();
            $posts = $postRep->FindByCategoryAndSubCategory($url_name);
            if ($posts->count() > 0)
                return view(theme_view('hm_post.list'), compact('posts'));
            else
                return abort(404, Message404Search);
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "line" => $exp->getLine()]);
            return abort(404, Message404Search);
        }
    }


    //show about
    public function about()
    {
        try {
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

    public function contactUs()
    {
        try {
            $contact_info=Post::with("post_meta")->where("post_type","contact_info")
                ->where("language",Lang::getLocale())
                ->first();
            return \view("home::contact_us.index",compact('contact_info'));
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "line" => $exp->getLine()]);
            return abort(404, Message404Search);
        }
    }

    public function aboutUs()
    {
        try {
            $about=Post::with("post_meta")->where("post_type","about_us")
                ->where("language",Lang::getLocale())
                ->first();
            return \view("home::about_us.index",compact('about'));
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "line" => $exp->getLine()]);
            return abort(404, Message404Search);
        }
    }

    public function service()
    {
        try {
            $services=Post::with("post_meta")->where("post_type","service")
                ->where("language",Lang::getLocale())
               ->get();
            return \view("home::service.index",compact('services'));
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "line" => $exp->getLine()]);
            return abort(404, Message404Search);
        }
    }

    public function posts()
    {
        try {
            $services=Post::with("post_meta")->where("post_type","service")
                ->where("language",Lang::getLocale())
                ->get();
            return \view("home::post.index",compact('services'));
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "line" => $exp->getLine()]);
            return abort(404, Message404Search);
        }
    }

    //show sitemap
    public function sitemap($id = null)
    {
        try {
            $postRep = new PostRepository();
            if ($id != null && $id > 0) {
                $posts = $postRep->siteMap($id);
            } else {
                $posts = $postRep->siteMap(0);
            }
            return response()
                ->view('shared.sitemap', compact('posts'))
                ->header('Content-Type', 'text/xml');
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "line" => $exp->getLine()]);
            return abort(404, Message404Search);
        }
    }

    public function addToCart(Request $cartdata)
    {
        //App::setLocale($locale);
        $id = $cartdata["id"];
        $cart = Session()->get('cart');
        if(isset($cart[$id])){
            $cart[$id]['qty'] += 1;
        }
        else {
            $product = Post::find($id);
            $post_meta = collect($product->post_meta);
            $price = $post_meta->firstWhere("meta_key", "price")->meta_value;
            $cart[$product->id] = array(
                "id" => $product->id,
                "product_name" => $product->title,
                "product_photo" => $product->thumb,
                "product_unit" => "تعداد",
                "product_price" => $price,
                "qty" => 1,
            );
        }

        Session()->put('cart', $cart);

        Session()->flash('success','Add to cart!');
        return \response()->json(["status" => "true","cart_items"=>count($cart)], 200);
    }

    public function updateCart(Request $cartdata)
    {
        $cart = Session()->get('cart');
        $update_id = $cartdata["id"];
        $qty = $cartdata["qty"];
        if ($qty > 0) {
            $cart[$update_id]['qty'] = $qty;
        } else {
            unset($cart[$update_id]);
        }
        $item_total_price =  $cart[$update_id]['qty'] * $cart[$update_id]['product_price'];
        $total_price=0;
        foreach ( $cart as $item )
        {
            $total_price +=  $item['qty'] * $item['product_price'] ;
        }
        Session()->put('cart', $cart);
        return \response()->json(["status" => "true","cart_items"=>count($cart),"id"=>$update_id,"total_price"=>number_format($total_price),"item_total_price"=>number_format($item_total_price)], 200);
    }

    public function updateCartOld(Request $cartdata)
    {
        $cart = Session()->get('cart');

        foreach ($cartdata->all() as $id => $val)
        {
            if ($val > 0) {
                $cart[$id]['qty'] += $val;
            } else {
                unset($cart[$id]);
            }
        }

        Session()->put('cart', $cart);
        return redirect()->back();
    }

    public function deleteCart(Request $cartdata)
    {
        $id = $cartdata["id"];
        $cart = Session()->get('cart');
        unset($cart[$id]);
        $total_price=0;
        foreach ( $cart as $item )
        {
            $total_price +=  $item['qty'] * $item['product_price'] ;
        }
        Session()->put('cart', $cart);
        return \response()->json(["status" => "true","cart_items"=>count($cart),"total_price"=>number_format($total_price)], 200);
    }

    public function checkOut(Request $cartdata)
    {

        if (!auth()->check()){
            $lang=  app()->getLocale();
            return \response()->json(["status" => "false","login"=>"false","message"=>"ابتدا وارد برنامه شوید","redirect"=>"/$lang/login"], 200);
        }

        $cart = Session()->get('cart');

        $ordersRepo = new OrdersRepository();


        $user_id = auth()->id();
        $user= User::find($user_id);
        $customer_name = $user["first_name"] . " " . $user["last_name"];
        $customer_mobile = $user["mobile"];
        $customer_address = "address of user get later";

        $order_items = array();
        $total_price=0;
        foreach ( $cart as $item )
        {
            $product = Post::find($item['id']);
            $post_meta = collect($product->post_meta);
            $price = $post_meta->firstWhere("meta_key", "price")->meta_value;
            $order_items[] = ["item_id" => $item['id'], "item_count" => $item['qty'],"unit_price"=>$price];
            $total_price +=  $item['qty'] * $price;
        }

        $param = ["user_id" => $user_id, "customer_name" => $customer_name,
            "customer_mobile" => $customer_mobile, "customer_address" => $customer_address,
            "payment_status" => 0, "table_id" => 1, "table_name" =>"posts",
            "type_name" => "product_list",  "register_date" => Carbon::now(),
            "discount" => 0, "total_price" =>  $total_price, "description" =>"shopping",
            "order_form_id" => 0,"status" =>0];

        $id = $ordersRepo->insert($param);
        //TODO insert order details with bulk insert
        $orderDetailsRepo = new OrderDetailsRepository();
        foreach ( $order_items as $order_item ) {
            $param_detail = ["id"=>null,"order_id" => $id, "item_id" => $order_item["item_id"],"item_count"=>$order_item["item_count"],
                "unit_price" => $order_item["unit_price"],"discount"=>0,"item_type"=>"product","status" =>0];
            //insert to database
          $od_id =  $orderDetailsRepo->insert($param_detail);
        }

        //Send sms
        sendOrderSms("ثبت-سفرش","09119047411");

        //Clear cart
        session()->forget('cart');
        $lang=  app()->getLocale();

        return \response()->json(["status" => "true","cart_items"=>count($cart),"total_price"=>number_format($total_price),"order_items"=>$order_items,"id"=>$id,"redirect"=>"/$lang/cart"], 200);
    }

    public function register(Request $request)
    {
        try {

            $digits = 4;
            $code =  rand(pow(10, $digits-1), pow(10, $digits)-1);

            $request->request->add(["ip", $request->ip()]);
            $request->request->add(["user_type", 0]);
            $request->request->add(["code", $code]);
            $request->request->add(["status", 1]);

            $user_type=2; // customer
            $email = $request["email"];
            $first_name = $request["first_name"];
            $last_name = $request["last_name"];
            $mobile = $request["mobile"];
            $password = Hash::make($request['password']);
            $address = $request["address"];
            $post_code = $request["postal_code"];
            $statue = 1;
            $is_active=0;

            //server validation
            $userEmail=User::select("*")->where("email",$email)
                ->first();
            if($userEmail){
                return \response()->json(["status" => "false","message"=>"این ایمیل قبلا ثبت شده است"], 200);
            }

            $userMobile=User::select("*")->where("mobile",$mobile)
                ->first();
            if($userMobile){
                return \response()->json(["status" => "false","message"=>"این موبایل قبلا ثبت شده است"], 200);
            }
            //---------------

            $userRepo = new UserRepository();
            $param = ["email" => $email,
                "first_name" => $first_name, "last_name" =>  $last_name,
                "mobile" => $mobile, "password" => $password,"user_type"=>$user_type, "code" =>$code,
                "is_active" => $is_active,  "created_at" => Carbon::now(),"updated_at" => Carbon::now(),
                "remember_token" => "","status" =>$statue];

            $res = $userRepo->insert($param);

            if ($res > 0) {
                $newUser=User::select("*")->where("email",$email)
                    ->first();
                $newUserId = $newUser->id;
                $customerRepo  = new CustomerRepository();
                $customerParams = ["user_id" => $newUserId,
                    "address" => $address, "postal_code" =>  $post_code,
                    "province" => "","city"=>"","phone" =>"","created_at" => Carbon::now(),"updated_at" => Carbon::now()];

                $resCustomer = $customerRepo->insert($customerParams);
                $resSMS = sendOTP($code, $mobile);
                $hashId= encryptData("hashKey",$newUserId);
                return \response()->json(["status" => "true","hashId"=>$hashId,"id"=>$newUserId], 200);
            }
            else
                return \response()->json(["status" => "false"], 200);
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "line" => $exp->getLine()]);
            return \response()->json(["status" => "false","err"=>$exp->getMessage()], 500);
        }
    }

    public function resendCode(Request $request)
    {
        try {

            $mobile = $request["mobile"];

            $user=User::select("*")->where("mobile",$mobile)
                ->first();

            if(!$user){
                return \response()->json(["status" => "false","message"=>"این موبایل  ثبت نشده است"], 200);
            }

            if($user && $user->is_active ){
                return \response()->json(["status" => "false","message"=>"این موبایل  قبلا  فعال شده است"], 200);
            }

            $digits = 4;
            $code =  rand(pow(10, $digits-1), pow(10, $digits)-1);

            $userRepo = new UserRepository();
            $param = ["code" =>$code,"updated_at" => Carbon::now() ];
            $res = $userRepo->updateUser($param,$user->id);

            $minutes_to_add = 5;
            $time = Carbon::now();
            $time->add(new DateInterval('PT' . $minutes_to_add . 'M'));

            if ($res > 0) {
                return \response()->json(["status" => "true","new_time"=>$time], 200);
            }
            else
                return \response()->json(["status" => "false"], 200);
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "line" => $exp->getLine()]);
            return \response()->json(["status" => "false","err"=>$exp->getMessage()], 500);
        }
    }

    public function validateCode(Request $request)
    {
        try {

            $mobile = $request["mobile"];
            $code = $request["otp"];

            $user=User::select("*")->where("mobile",$mobile)
                ->first();

            if(!$user){
                return \response()->json(["status" => "false","message"=>"این موبایل  ثبت نشده است"], 200);
            }

            if($user && $user->is_active ){
                return \response()->json(["status" => "false","message"=>"این موبایل  قبلا  فعال شده است"], 200);
            }

            if($user && $user->code != $code  ){
                return \response()->json(["status" => "false","message"=>"کد ورودی نا معتبر می باشد"], 200);
            }

            $minutes_to_add = 5;
            // $date = date_create_from_format('Y/m/d H:i:s', $user->updated_at);
            $date = new DateTime($user->updated_at);
             //dd($date);
            $date->add(new DateInterval('PT' . $minutes_to_add . 'M'));

            if($user && $date < Carbon::now()  ){
                return \response()->json(["status" => "false","message"=>"کد ورودی نا معتبر می باشد - منقضی شد"], 200);
            }
            //---------------

            $userRepo = new UserRepository();
            $res = $userRepo->Activate($user->id);

            if ($res > 0) {
                auth()->loginUsingId($user->id);
                return \response()->json(["status" => "true"], 200);
            }
            else
                return \response()->json(["status" => "false"], 200);
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "line" => $exp->getLine()]);
            return \response()->json(["status" => "false","err"=>$exp->getMessage()], 500);
        }
    }

    public function login(LoginRequest $request)
    {
        try {
            if (auth()->attempt(["email"=>$request->email,"password"=>$request->password],true)) {
                $jsonAnswer = array('status' => 'true','message'=>'ورود موفق');
                return json_encode($jsonAnswer);
            } else {
                $jsonAnswer = array('status' => 'false','message'=>trans("messages.user_not_exist"));
                return json_encode($jsonAnswer);
            }
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file"=>$exp->getFile(),"line" => $exp->getLine()]);
            $jsonAnswer = array('status' => 'false','message'=>'خطایی در سرور رخ داده است');
            return json_encode($jsonAnswer);
        }
    }

    public function logOut()
    {
        auth()->logout();
        return redirect("/");
    }
}
