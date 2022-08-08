<?php
/**
 * Created by PhpStorm.
 * User: mortenaho
 * Date: 6/29/2019
 * Time: 1:17 AM
 */

use Illuminate\Support\Facades\Route;

Route::resource("/admin/ec/category","EC_CategoryController")->name('get','ec_category');
Route::get("/admin/ec/dtAjaxData/category","EC_CategoryController@dt_category");
Route::get("/ec/getByType/{type}", "EC_CategoryController@getCategoryByType");
Route::post("/ec/category/status/{id}", "EC_CategoryController@changeStatus");


