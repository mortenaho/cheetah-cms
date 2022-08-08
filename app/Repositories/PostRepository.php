<?php
/**
 * Created by PhpStorm.
 * User: mortenaho
 * Date: 3/17/2019
 * Time: 7:20 PM
 */

namespace App\Repositories;


use App\Models\Post;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;


class PostRepository extends Post
{
    public function insert($data, $has_link = null)
    {
        try {

            DB::beginTransaction();
            $data["ordering"] = $this->ordering($data["post_type"]);
            $data["slug"] = sanitize($data["title"]);
            $data["reg_date"] =m_jdate("Y/m/d");
            $data+=[
                "author" => auth()->user()->full_name,
                "user_id" => auth()->id(),
                "uid" => uniqid()
            ];

            $post = Post::create($data);
            if ($has_link == null) {
                $data["link_address"] = "/$data[post_type]/$post->id/$data[slug]";
                $this->updatings($data, $post->id);
            }
            DB::commit();
            return $post->id;
        } catch (QueryException $exp) {

            DB::rollback();
            return $exp;
        } catch (\Exception $exp) {
            DB::rollback();
            return $exp;
        }

    }

    public function updatings($data, $id, $has_link = null)
    {

        try {
            DB::beginTransaction();
            $data["slug"] = sanitize($data["title"]);
            $data["reg_date"] =m_jdate("Y/m/d");
            $data["id"] = $id;
            $data+=[
                "author" => auth()->user()->full_name,
                "user_id" => auth()->id(),
                "uid" => uniqid()
            ];

            if ($has_link == null) {
                $data["link_address"] = "/$data[post_type]/$id/$data[slug]";
            }
            DB::commit();
            return Post::where("id", $data["id"])->update($data);
        } catch (QueryException $exp) {
            DB::rollback();

            return $exp;
        } catch (\Exception $exp) {
            DB::rollback();
            return $exp;
        }
    }

    public function DeletePost($id)
    {
        try {
            DB::beginTransaction();
            $find = Post::find($id);
            if ($find->post_meta()->count() > 0) {
                $find->post_meta()->delete();
            }
            $find->comments()->delete();
            if ($find->delete()) {
                DB::commit();
                return 1;
            } else {
                DB::rollBack();
                return -1;
            }
        } catch (QueryException $exp) {
            DB::rollback();
            return $exp;
        } catch (\Exception $exp) {
            DB::rollback();

            return $exp;
        }
    }

    public function ChangeStatus($id)
    {
        DB::beginTransaction();
        try {
            $post = Post::find($id);
            $post->status = !$post->status;
            $post->save();
            DB::commit();
            return true;
        } catch (QueryException $exp) {
            DB::rollback();
            return $exp;
        } catch (\Exception $exp) {
            DB::rollback();
            return $exp;
        }
    }

    public function featured($id)
    {
        DB::beginTransaction();
        try {
            $post = Post::find($id);
            $post->featured = !$post->featured;
            $post->save();
            DB::commit();
            return true;
        } catch (QueryException $exp) {
            DB::rollback();
            return $exp;
        } catch (\Exception $exp) {
            DB::rollback();

            return $exp;
        }
    }

    public function ordering($type)
    {
        DB::beginTransaction();
        try {
            $post = Post::where("post_type","$type")->max("ordering");
            if ($post == null || $post === 0) $post = 1;
            else $post += 1;
            DB::rollBack();
            return $post;
        } catch (QueryException $exp) {
            DB::rollback();

            return $exp;
        } catch (\Exception $exp) {
            DB::rollback();
            return $exp;
        }
    }

    public function getAll()
    {
        try {
            $post = Post::all();
            return $post;
        } catch (QueryException $exp) {
            return $exp;
        } catch (\Exception $exp) {

            return $exp;
        }
    }

    public function getPos($title, $type)
    {
        try {
            $post = Post::where("title", "like", "%$title%")->where("post_type", "=", "$type")->get();
            return $post;
        } catch (QueryException $exp) {
            return $exp;
        } catch (\Exception $exp) {
            return $exp;
        }
    }

    public function getVisitCount($where)
    {
        try {
            $post = Post::where($where)->sum("visit");
            return $post;
        } catch (QueryException $exp) {
            return $exp;
        } catch (\Exception $exp) {
            return $exp;
        }
    }
    public function siteMap($id = 0)
    {
        try {
            if ($id > 0)
                return $posts = Post::where("category_id", "=", "$id")
                    ->whereIn("post_type",["post","product"])
                    ->orderBy("id", "desc")
                    ->where("status", 1)
                    ->get();
            else
                return $posts = Post::
                    whereIn("post_type",["post","product"])
                    ->where("status", 1)
                    ->orderBy("id", "desc")
                    ->get();
        } catch (\Exception $exp) {
            return $exp;
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
