<?php
/**
 * Created by PhpStorm.
 * User: mortenaho
 * Date: 3/17/2019
 * Time: 7:20 PM
 */

namespace App\Repositories;


use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;


class CommentRepository extends Comment
{
    public function insert($data)
    {
        try {
            DB::beginTransaction();
            $comment = Comment::create($data);
            $post = $comment->post;
            $post->comment_count += 1;
            $post->update();
            DB::commit();
            return $comment->id;
        } catch (QueryException $exp) {
            DB::rollBack();
//            return $exp;
            dd($exp);
        }
    }

    public function updatings($data, $id)
    {
        try {
            $data["id"] = $id;
            return Comment::where("id", $data["id"])->update($data);
        } catch (QueryException $exp) {
            return $exp;
        }
    }


    public function DeleteComment($id)
    {
        DB::beginTransaction();
        try {
            $comments = Comment::with("post")->whereIn("id", $id)->get();
            foreach ($comments as $item) {
                $post = Post::find($item["post_id"]);
                if($post) {
                    $post->comment_count = $post->comment_count - 1 > 0 ? $post->comment_count - 1 : 0;
                    $post->save();
                }
            }
            DB::table("comments")->whereIn("id", $id)->delete();

            DB::commit();
            return true;
        } catch (QueryException $exp) {
            DB::rollBack();
            return false;// $exp;
        } catch (\Exception $exp) {
            DB::rollBack();
            return false;// $exp;
        }
    }

    public function ChangeStatus($id, $status = null)
    {
        try {
            DB::beginTransaction();
            $comment = Comment::find($id);
            $comment->status = $status != null ? $status : !$comment->status;
            $comment->save();
            DB::commit();
            return true;
        } catch (QueryException $exp) {
            DB::rollBack();
            return $exp;
        } catch (\Exception $exp) {
            return $exp;
        }
    }
    public function isShow($id, $status = null)
    {
        try {
            $comment = Comment::find($id);
            $comment->is_show = $status != null ? $status : !$comment->is_show;
            return $comment->save();
        } catch (QueryException $exp) {
            return $exp;
        }
    }
    public function getAll($data)
    {
        try {
            return DB::table("comments")
                ->where("full_name", "like", "%{$data}%")
                ->orWhere("email", "like", "%{$data}%")
                ->orWhere("created_at", "like", "%{$data}%")
                ->orderBy("status", "asc")
                ->orderBy("created_at","desc")
                ->paginate(20);
        } catch (QueryException $exp) {
            return $exp;
        }
    }
}
