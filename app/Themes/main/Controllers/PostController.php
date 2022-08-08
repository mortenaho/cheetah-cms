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
use App\Repositories\CommentRepository;
use App\Themes\main\repository\post_repository;
use App\Themes\main\Requests\CommentRequest;
use function Composer\Autoload\includeFile;
use http\Env\Response;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    public function products()
    {
        try {

            $posts = Post::with("post_meta")
                ->where("post_type", "=", "product")
                ->orderBy("created_at", "desc")
                ->paginate(20);
            $title = "محصولات";
            $include_page = "products";
            $categories = Category::where("type", "product")->where("status", "1")->get();
            return view("home::post.index", compact('title', 'include_page', 'posts', 'categories'));
        } catch (\Exception $exception) {
            Log::error($exception->getMessage(), ["code" => $exception->getCode(), "line" => $exception->getLine()]);
            return abort(404, Message404Search);
        }
    }

    public function posts()
    {
        try {

            $posts = Post::with("post_meta")
                ->where("post_type", "=", "post")
                ->orderBy("created_at", "desc")
                ->paginate(8);
            $title = "نوشته ها";
            $include_page = "posts";
            $categories = Category::where("type", "post")->where("status", "1")->get();
            return view("home::post.index", compact('title', 'include_page', 'posts', 'categories'));
        } catch (\Exception $exception) {
            Log::error($exception->getMessage(), ["code" => $exception->getCode(), "line" => $exception->getLine()]);
            return abort(404, Message404Search);
        }
    }

    public function tags($tag)
    {
        try {
            $tag=remove_url_slug($tag);
            $posts = Post::
                 with("post_meta")
                ->select(["id","title","thumb","link_address","excerpt"])
                ->where("post_type", "=", "post")
                ->where("keywords", "like", '%'."$tag".'%')
                ->orderBy("created_at", "desc")
                ->paginate(8);
            $title = "نوشته ها";
            $include_page = "posts";
            $categories = Category::where("type", "post")->where("status", "1")->get();
            return view("home::post.index", compact('title', 'include_page', 'posts', 'categories'));
        } catch (\Exception $exception) {
            Log::error($exception->getMessage(), ["code" => $exception->getCode(), "line" => $exception->getLine()]);
            return abort(404, Message404Search);
        }
    }

    public function post($id, $slug = null)
    {
        try {

            $postRep = new post_repository();
            $posts = $postRep->showNextPrev($id, "post");
            $post = $posts["post"];
            $next = $posts["next"];
            $prev = $posts["previous"];
            $title = "نوشته ها";
            $include_page = "post";
            $categories = Category::where("type", "post")->where("status", "1")->get();

            if(session()->has("post_$id")===false)
            {
                $postRep->setVisited($id);
                session()->push("post_$id","post_$id");
            }
            return view("home::post.post", compact('title', 'include_page', 'post', 'next', 'prev', 'categories'));
        } catch (\Exception $exception) {
            Log::error($exception->getMessage(), ["code" => $exception->getCode(), "line" => $exception->getLine()]);
            return abort(404, Message404Search);
        }
    }

    public function service($id, $slug = null)
    {
        try {

            $postRep = new post_repository();
            $posts = $postRep->showNextPrev($id, "service");
            $post = $posts["post"];
            $next = $posts["next"];
            $prev = $posts["previous"];


            $title = "خدمات";
            $include_page = "service";
            $categories = Category::where("type", "service")->where("status", "1")->get();
            return view("home::post.service", compact('title', 'include_page', 'post', 'next', 'prev', 'categories'));
        } catch (\Exception $exception) {
            Log::error($exception->getMessage(), ["code" => $exception->getCode(), "line" => $exception->getLine()]);
            return abort(404, Message404Search);
        }
    }

    public function training($id, $slug = null)
    {
        try {

            $postRep = new post_repository();
            $posts = $postRep->showNextPrev($id, "training");
            $post = $posts["post"];
            $next = $posts["next"];
            $prev = $posts["previous"];


            $title = "آموزش";
            $include_page = "training";
            $categories = Category::where("type", "training")->where("status", "1")->get();
            return view("home::post.training", compact('title', 'include_page', 'post', 'next', 'prev', 'categories'));
        } catch (\Exception $exception) {
            Log::error($exception->getMessage(), ["code" => $exception->getCode(), "line" => $exception->getLine()]);
            return abort(404, Message404Search);
        }
    }

    public function portfolios()
    {
        try {

            $portfolio = Category::with("posts")->where("type", "=", "portfolio")->where("status", "=", "1")->get();

            return view("home::portfolio.index", compact('portfolio'));
        } catch (\Exception $exception) {
            Log::error($exception->getMessage(), ["code" => $exception->getCode(), "line" => $exception->getLine()]);
            return abort(404, Message404Search);
        }
    }

    public function portfolio($id, $slug = null)
    {
        try {
            $postRep = new post_repository();
            $posts = $postRep->getById($id);
            $post = $posts["post"];
            return view("home::portfolio.details", compact('post'));
        } catch (\Exception $exception) {
            Log::error($exception->getMessage(), ["code" => $exception->getCode(), "line" => $exception->getLine()]);
            return abort(404, Message404Search);
        }
    }

    public function product($id, $slug = null)
    {
        try {
            $postRep = new post_repository();
            $posts = $postRep->getById($id);
            $post = $posts["post"];
            return view("home::post.product", compact('post'));
        } catch (\Exception $exception) {
            Log::error($exception->getMessage(), ["code" => $exception->getCode(), "line" => $exception->getLine()]);
            return abort(404, Message404Search);
        }
    }

    public function productDetailsAjax(Request $request)
    {
        try {
            $id=$request->product_id;
            $postRep = new post_repository();
            $posts = $postRep->getById($id);
            $product = $posts["post"];
            if (isset($product->id)) {
                $html = view()->make("home::post._product_modal", compact('product'))->render();
                return \response()->json(["status" => "true", "html" => $html], 200);
            } else {
                return \response()->json(["status" => "false"], 200);
            }
        } catch (\Exception $exception) {
            Log::error($exception->getMessage(), ["code" => $exception->getCode(), "line" => $exception->getLine()]);
            return \response()->json(["status" => "false"], 500);
        }
    }

//get all hm_post and show .
    public function CommentMessage(CommentRequest $request)
    {
        try {

            $request->request->add(["author_ip" => request()->ip()]);
            $request->request->add(["status" => 0]);
            $comment = new CommentRepository();
            $res = $comment->insert($request->only($comment->getFillable()));
            if ($res > 0)
                return \response()->json(["status" => "true"], 200);
            else
                return \response()->json(["status" => "false"], 200);
        } catch (\Exception $exp) {
            Log::error($exp->getMessage(), ["code" => $exp->getCode(), "file" => $exp->getFile(), "line" => $exp->getLine()]);
            return \response()->json(["status" => "false"], 500);
        }
    }


}
