<?php

use Illuminate\Support\Facades\DB;

/**
 * Created by PhpStorm.
 * User: mortenaho
 * Date: 4/12/2019
 * Time: 6:46 PM
 */

function hq_get_ads($args=null)
{
   $data= isset($args) ? DB::table("hm_ads")->where($args)->take(10)->get() :
    DB::table("hm_ads")->take(10)->get();
   return $data;
}
function hq_get_social($args=null)
{
    $data= isset($args) ? DB::table("social")->where($args)->get() :
        DB::table("social")->get();
    return $data;
}
function get_blog_info()
{
    $data= DB::table("setting")->first();
    return $data;
}
function get_author()
{
    $data= DB::table("user")->select("avatar", "first_name", "last_name")->first();
    return $data;
}

function get_menu()
{
    $data= DB::table("user")->select("avatar", "first_name", "last_name")->first();
    return $data;
}
