<?php
/**
 * Created by PhpStorm.
 * User: mortenaho
 * Date: 3/24/2019
 * Time: 12:21 AM
 */

namespace App\Repositories;


use App\Models\HMCategory;
use App\Models\HMPost;
use Illuminate\Database\QueryException;

class HMPostRepository extends HMPost
{
    public function insert($data)
    {
        try {
            $post= HMPost::create($data);
            return $post->id;
        } catch (QueryException $exp) {
           return $exp;
        }
    }
    public function updatings($data)
    {
        try {

            return HMPost::where("post_code", $data["post_code"])->update($data);
        } catch (QueryException $exp) {
            return $exp;
        }
    }
    public function LastPostByCategoryId($id, $limit)
    {
        try {
            return HMPost::where("category_id", $id)
                ->where("status",1)
                ->orderBy('id',"desc")->limit($limit)->get();
        } catch (QueryException $exp) {
            return $exp;
        }

    }
    public function getAll()
    {
        try {
            return HMPost::whereHas("category")
                ->where("status",1)
                ->orderBy("id","desc")->paginate(20);
        } catch (QueryException $exp) {
            return $exp;
        }
    }
    public function FindByUrlName($urlName)
    {
        try {
            return HMPost::where('url_name', 'like', "%$urlName%")
                ->first();
        } catch (QueryException $exp) {
            return $exp;
        }
    }
    public function FindByPostCode($post_code)
    {
        try {
            return HMPost::where('post_code', '=', "$post_code")
                ->first();
        } catch (QueryException $exp) {
            return $exp;
        }
    }

    public function Search($search)
    {
        try {
            return HMPost::where('title', 'like', "%$search%")
                ->where('url_name', 'like', "%$search%")
                ->get();
        } catch (QueryException $exp) {
            return $exp;
        }
    }
    public function FindByCategoryAndSubCategory($urlName)
    {
        try {
            return $posts = HMPost::whereHas("category", function ($q) use ($urlName) {
                $q->where('url_name', $urlName);

            })->
            orwhereHas("sub_category", function ($q) use ($urlName) {
                $q->where('url_name', $urlName);
            })
                ->with("category")
                ->with("sub_category")
                ->orderBy("id","desc")
                ->where("status",1)
                ->paginate(20);
        } catch (QueryException $exp) {
            return $exp;
        }
    }
    public function NextAndPrevious($id)
    {
        try {
            $previous = HMPost::where('id', '<', $id)->where("status",1)->orderBy('id', 'desc')->first();
            $next = HMPost::where('id', '>', $id) ->where("status",1)->orderBy('id')->first();
            $nexPreious = ["next" => $next, "pre" => $previous];
            return $nexPreious;
        } catch (QueryException $exp) {
            return $exp;
        }
    }
    public function RelatedPost($category)
    {
        try {
            return HMPost::where("category_id", "=", $category)
                ->with("category")
                ->orderBy("category_id")
                ->take(6)
                ->get();
        } catch (QueryException $exp) {
            return $exp;
        }
    }
    public  function TopLastPosts($count)
    {
        try {
            return HMPost::with("category")
                ->orderBy("id","desc")
                ->take($count)
                ->get();
        } catch (QueryException $exp) {
            return $exp;
        }
    }

    public function ChangeStatus($id)
    {
        try {
            $post=HMPost::find($id);
            $post->status=!$post->status;
            return  $post->save();
        } catch (QueryException $exp) {
            return $exp;
        }
    }

    public function getNewPostEachCategory($limit)
    {
        $categories = HMCategory::select('id')->get();
        $latest_posts_by_category = [];
        foreach($categories as $category){
            $post = HMPost::where("category_id",$category->id)->where("status",1)->take($limit)->get();
            $latest_posts_by_category[] = $post;
        }
        return $latest_posts_by_category;
    }
}
