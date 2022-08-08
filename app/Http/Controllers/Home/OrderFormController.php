<?php

namespace App\Http\Controllers\Home;

use App\Repositories\OrderFormMetaRepository;
use App\Repositories\OrdersRepository;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\View;

class OrderFormController extends Controller
{
    private $lang;

    public function __construct()
    {
        $this->lang = App::getLocale();
        $locale =$this->lang;
        $menu = DB::table("menu")->where("language", "=", "$this->lang")->where("status", "=", "1")->orderBy("ordering", "asc")->get();
        $contact_info = Post::with("post_meta")->where("post_type", "=", "contact_info")->where("status", "=", "1")->where("language", "$this->lang")->first();
        $site = DB::table("setting")->first();
        $plugin = Cache::get("site_plugin");
        View::share(compact('menu', 'site', 'contact_info', 'plugin','locale'));
    }

    public function show($id, $pid = null)
    {
        $res = DB::table('order_form')->where(["id" => $id])->first();
        if($res == null){
            $res = DB::table('order_form')->where(["slug" => $id])->first();
        }

        if ($res != null && $res->id > 0) {
            $form_id = $res->id;
            $form_name = $res->form_name;
            $table_name = "";
            $table_id = "";
            $post = null;
            $type_name="";
            if ($pid != null && $pid > 0) {
                $postRep = new PostRepository();
                $post = $postRep->find($pid);
                if($post) {
                    $table_name = "post";
                    $table_id = $post->id;
                    $type_name = $post->post_type;
                }else{
                    abort(404);
                }
            }
            return view("order_form.$res->form_name", compact('form_id', 'form_name', 'table_name', 'table_id', 'post','type_name'));
        }
    }

    public function store(Request $request)
    {

        try {
            $qu = new OrdersRepository();
            $pm = ["user_id", "table_id", "table_name", "type_name", "type_name", "registered_date", "order_form_id", "_token", "form_id"];
            $table_name = $request->get("table_name");
            $table_id = $request->get("table_id");
            $type_name = $request->get("type_name");
            $form_id = $request->get("form_id");

            $meta = array_filter($request->all(), function ($v, $k) use ($pm) {
                return !in_array($k, $pm);
            }, ARRAY_FILTER_USE_BOTH);
            $user_id = null;
            if (auth()->check())
                $user_id = auth()->id();
            $param = ["user_id" => $user_id, "table_name" => $table_name, "table_id" => $table_id, "type_name" => $type_name, "register_date" => Carbon::now(), "order_form_id" => $form_id];
            $id = $qu->insert($param);
            if ($id > 0) {
                $metaRep = new OrderFormMetaRepository();
                $metas = [];
                foreach ($meta as $k => $v) {
                    array_push($metas, ["key" => $k, "value" => $v, "order_id" => $id]);
                }
                $res = $metaRep->insert($metas);
                if ($res == true) {
                    return "ok";
                }
            }
        } catch (\Exception $ex) {
            Log::error($ex->getMessage(), [$ex]);
            return "خطا";
        }
    }
}
