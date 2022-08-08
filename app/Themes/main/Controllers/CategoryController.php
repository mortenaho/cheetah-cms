<?php
/**
 * Created by PhpStorm.
 * User: mortenaho
 * Date: 6/29/2019
 * Time: 3:34 PM
 */

namespace App\Themes\Main\Controllers;


use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    public function index($id, $slug = null)
    {
        try {
            $category = Category::find($id);
            if ($category != null) {
                $plugin = Cache::get("site_plugin");
                $posts=Post::with("post_meta")->where("category_id","=","$id")
                    ->orderBy("created_at","desc")
                    ->paginate(8);

                if ($category->type === "post") {
                    $title = "دسته بندی مطالب";
                    $include_page="posts";
                    $categories=Category::where("type","post")->where("status","1")->get();
                }
                if ($category->type === "training") {
                    $title = "دسته بندی آموزشها";
                    $include_page="training";
                    $categories=Category::where("type","training")->where("status","1")->get();
                }
                if ($category->type === "product") {
                    $title = "گروه محصولات";
                    $include_page="products";
                    $categories=Category::where("type","post")->where("status","1")->get();
                }
            }
            return view("home::category.index", compact('title','include_page','posts','categories'));
        } catch (\Exception $exception) {
            Log::error($exception->getMessage(), ["code" => $exception->getCode(), "line" => $exception->getLine()]);
            return abort(404, Message404Search);
        }
    }


}
