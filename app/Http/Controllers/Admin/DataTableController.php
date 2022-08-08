<?php

namespace App\Http\Controllers\Admin;

use App\Models\Attachment;
use App\Models\Category;
use App\Models\Comment;
use App\Models\ContactUs;
use App\Models\HMAds;
use App\Models\HMPost;
use App\Models\Menu;
use App\Models\Post;
use App\Models\Slider;
use App\Models\Social;
use App\Models\User;
use App\Models\Visit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\DataTables;

class DataTableController extends Controller
{
    public function slider()
    {
        $slider = Slider::select("id", "title", "sub_title", "link", "photo", "created_at", "status", "ordering")->orderBy("ordering", "asc");
        return Datatables::of($slider)->make(true);
    }

    public function gallery($parent = 0)
    {
        $gallery = Post::select("id", "title", "thumb", "reg_date", "status", "parent", "ordering")->where("post_type", "gallery")
            ->where("parent", $parent)
            ->orderBy("ordering", "asc");
        return Datatables::of($gallery)->make(true);
    }

    public function attachment($id)
    {
        $attachment = Attachment::select("id", "title","link_address", 'file', "status", "ordering")->where("type_id", $id)->orderBy("ordering", "asc");
        return Datatables::of($attachment)->make(true);
    }

    public function contact_us($state = 0)
    {
        $contact_us = ContactUs::select("id", "full_name", "email", "mobile", "message", "created_at", "status")
            ->where("soft_delete", "$state")
            ->orderBy("id", "desc");
        return Datatables::of($contact_us)->make(true);
    }

    public function social()
    {
        $social = Social::select("id", "title", "icon", "created_at", "status", "ordering")->orderBy("ordering", "asc");
        return Datatables::of($social)->make(true);
    }

    public function hm_post()
    {
        $post = HMPost::select("id", "title", "photo_address", "reg_date", "status")->orderBy("id", "desc");
        return Datatables::of($post)->make(true);
    }

    public function hm_reportage()
    {
        $post = HMPost::select("id", "title", "photo_address", "reg_date", "status")->where("post_type", "=", "2")->orderBy("id", "desc");
        return Datatables::of($post)->make(true);
    }

    public function hm_ads()
    {
        $ads = HMAds::select("id", "title", "photo_address", "status")->orderBy("id", "desc");
        return Datatables::of($ads)->make(true);
    }

    public function category($type = null)
    {
        $category = DB::table("category")
            ->join("tools", "tools.name", "category.type")
            ->where("tools.has_category", 1)
            ->where("tools.is_active", 1)
            ->where("category.type", $type)
            ->select(['category.title','category.icon',"category.created_at","category.id","category.status","tools.title as type_title"]);

        return Datatables::of($category)->make(true);
    }

    public function post()
    {
        $posts = Post::select("id", "title", "thumb", "reg_date", "user_id","featured", "status", "ordering")->where("post_type", "post")->orderBy("id", "desc");
        return Datatables::of($posts)->make(true);
    }

    public function pages()
    {
        $pages = Post::select("id", "title", "thumb", "reg_date", "user_id","featured", "status", "ordering")->where("post_type", "page")->orderBy("id", "desc");
        return Datatables::of($pages)->make(true);
    }

    public function service()
    {
        $services = Post::select("id", "title", "thumb", "reg_date", "featured", "status", "ordering")->where("post_type", "service")->orderBy("ordering", "asc");
        return Datatables::of($services)->make(true);
    }

    public function certificate()
    {
        $certificates = Post::select("id", "title", "thumb", "reg_date", "featured", "status", "ordering")->where("post_type", "certificate")->orderBy("ordering", "asc");
        return Datatables::of($certificates)->make(true);
    }

    public function training()
    {
        $trainings = Post::select("id", "title", "thumb", "reg_date", "featured", "status", "ordering")->where("post_type", "training")->orderBy("ordering", "asc");
        return Datatables::of($trainings)->make(true);
    }

    public function product()
    {
        $products = Post::select("id", "title", "thumb", "reg_date", "featured", "status", "ordering")->where("post_type", "product")->orderBy("ordering", "asc");
        return Datatables::of($products)->make(true);
    }

    public function portfolio()
    {
        $portfolios = Post::select("id", "title", "thumb", "reg_date", "featured", "status", "ordering")->where("post_type", "portfolio")->orderBy("ordering", "asc");
        return Datatables::of($portfolios)->make(true);
    }

    public function download()
    {
        $downloads = Post::select("id", "title", "thumb", "reg_date", "featured", "status", "ordering")->where("post_type", "download")->orderBy("ordering", "asc");
        return Datatables::of($downloads)->make(true);
    }

    public function customer()
    {
        $customers = Post::select("id", "title", "thumb", "reg_date", "featured", "status", "ordering")->where("post_type", "customer")->orderBy("ordering", "asc");
        return Datatables::of($customers)->make(true);
    }

    public function customers()
    {
        $customers = User::select("id", "first_name", "last_name", "avatar", "mobile", "status", "is_active")->orderBy("id", "asc");
        return Datatables::of($customers)->make(true);
    }

    public function about_us()
    {
        $about = Post::select("id", "title", "thumb", "reg_date", "status")->where("post_type", "about_us")->orderBy("id", "desc");
        return Datatables::of($about)->make(true);
    }

    public function contact_info()
    {
        $ontact_info = Post::select("id", "title", "thumb", "reg_date", "status")->where("post_type", "contact_info")->orderBy("id", "desc");
        return Datatables::of($ontact_info)->make(true);
    }

    public function menu()
    {
        $menus = Menu::select("id", "title", "type", "created_at", "status")->orderBy("ordering", "desc");
        return Datatables::of($menus)->make(true);
    }

    public function comment()
    {
        $comments = Comment::select("id", "post_id", "full_name", "author_ip", "email", "created_at", "status")->orderBy("id", "desc");
        return Datatables::of($comments)->make(true);
    }

    public function visits()
    {
        $visits = Visit::select("id", "post_type", "category_id", "post_id", "year_month", "user_ip", "browser_name", "browser_version", "device_type", "device_name", "visit_type", "visitor_session_time", "created_at", "status")->orderBy("id", "desc");
        return Datatables::of($visits)->make(true);
    }
}
