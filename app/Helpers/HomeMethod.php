<?php

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class post_get
{
    public static function query($where = null)
    {
        try {
            if ($where == null)
                $where = ["post_type" => "post", "status" => 1];
            $data = \App\Models\Post::where($where)
                ->where("language", "=", app()->getLocale())
                ->get();
            return $data;
        } catch (Exception $exception) {
            Log::error($exception->getMessage(), ["code" => $exception->getCode(), "file" => $exception->getFile(), "line" => $exception->getLine()]);
        }
    }

    public static function get_last_post($count = 3, $type = "post")
    {
        try {
            $where = ["post_type" => "$type", "status" => 1];
            $data = \App\Models\Post::where($where)
                ->where("language", "=", app()->getLocale())
                ->orderBy("id", "desc")
                ->limit($count)
                ->get();
            return $data;
        } catch (Exception $exception) {
            Log::error($exception->getMessage(), ["code" => $exception->getCode(), "file" => $exception->getFile(), "line" => $exception->getLine()]);
        }
    }

}

class plugin
{

    public static function is_active($name)
    {
        $plugin = collect(Cache::get("site_plugin"));
        if ($plugin->where("name", "=", "$name")->first())
            return true;
        else
            return false;
    }
}

function get_social()
{
    return DB::table("social")->where("status", "=", 1)->get();
}

function get_post($type, $where, $count = null, $with = null)
{
    if ($with == null) {
        return isset($count) ? DB::table("post")->where("post_type", "=", "$type")->where($where)->get()
            :
            DB::table("post")->where("post_type", "=", "$type")->where($where)->limit($count)->get();
    } else {
        return isset($count) ? \App\Models\Post::with($with)->where("post_type", "=", "$type")->where($where)->get()
            :
            \App\Models\Post::with($with)->where("post_type", "=", "$type")->where($where)->limit($count)->get();
    }
}

function get_post_count($type, $where = null, $with = null)
{
    $query= DB::table("post")->where("post_type", "=", "$type");
    if ($with != null) {
        $query= \App\Models\Post::with($with)->where("post_type", "=", "$type");
    }
    if ($where != null) {
        $query= $query->where($where);
    }
    return $query->count();
}

function get_visit($where = null)
{
    $query=DB::table("post");
    if($where!=null)
        $query->where($where);
    return $query->sum("visit");
}

function get_count($table,$where){
    return DB::table($table)->where($where)->count();
}




