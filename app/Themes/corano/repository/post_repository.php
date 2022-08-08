<?php
/**
 * Created by PhpStorm.
 * User: mortenaho
 * Date: 6/30/2019
 * Time: 1:28 PM
 */

namespace App\Themes\corano\repository;


use App\Models\Post;
use Illuminate\Database\QueryException;

class post_repository extends Post
{
    public function showNextPrev($id, $type)
    {
        try {
            $post = Post::with('category')->with(['comments' => function ($query) {
                $query->where("status", "1");
                return $query->orderBy("id", "desc");
            }])->find($id);
            // get previous user id
            $previous = Post::where('post_type', '=', $type)->where('id', '<', $id)->first();
            // get next user id
            $next = Post::where('post_type', '=', $type)->where('id', '>', $id)->first();
            return compact('post', 'previous', 'next');
        } catch (QueryException $exception) {
            return $exception;
        }
    }

    public function getById($id)
    {
        try {
            $post = Post::with('category')
                ->with("attachments")
                ->with(['comments' => function ($query) {
                $query->where("status", "1");
                return $query->orderBy("id", "desc");
            }])
                ->with(["attachments"=>function($query){
                    return $query->where("status",1);
                }])
                ->find($id);
            // get previous user id
            return compact('post');
        } catch (QueryException $exception) {
            return $exception;
        }
    }

    public function setVisited($id)
    {
        try {
            $post = Post::find($id);
            $post->visit+= 1;
            $post->save();
            return $post;
        } catch (QueryException $exp) {

            return $exp;
        } catch (\Exception $exp) {

            return $exp;
        }
    }
}
