<?php
/**
 * Created by PhpStorm.
 * User: mortenaho
 * Date: 3/17/2019
 * Time: 7:20 PM
 */

namespace App\Repositories;


use App\Models\PostMeta;
use App\Models\PostMetaMeta;
use Illuminate\Database\QueryException;


class PostMetaRepository extends PostMeta
{
    public function insert($data)
    {
        try {
            $post = PostMeta::insert($data);
            return $post;
        } catch (QueryException $exp) {
            dd($exp->getMessage());
            return $exp;
        }
    }

    public function updatings($data,$post_id)
    {
        try {
            PostMeta::where("post_id",$post_id)->delete();
            return $this->insert($data);
        } catch (QueryException $exp) {
            return $exp;
        }
    }

    public function DeletePostMeta($id)
    {
        try {
             if(PostMeta::where("id", "=", $id)->delete())
             {
                 return 1;
             }
             else
             {
                 return -1;
             }
        } catch (QueryException $exp) {
            return $exp;
        }
    }

    public function getAll()
    {
        try {
            $post = PostMeta::all();
            return $post;
        } catch (QueryException $exp) {
            return $exp;
        }
    }

    public function getByPost($post_id)
    {
        try {
            $post = PostMeta::where("post_id",$post_id)->get();
            return $post;
        } catch (QueryException $exp) {
            return $exp;
        }
    }
}
