<?php
/**
 * Created by PhpStorm.
 * User: mortenaho
 * Date: 6/29/2019
 * Time: 1:17 AM
 */

use Illuminate\Support\Facades\Route;

Route::get("/pl_test",function (){
    return view("plugin::index");
});
