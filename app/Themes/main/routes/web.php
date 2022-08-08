<?php
/**
 * Created by PhpStorm.
 * User: mortenaho
 * Date: 6/28/2019
 * Time: 12:46 AM
 */

use Illuminate\Support\Facades\Route;


Route::get('/', 'HomeController@index');
Route::get('/about', 'HomeController@about');
Route::get('/posts', 'PostController@posts');
Route::get('/tags/{tag}', 'PostController@tags');
Route::get('/products', 'PostController@products');
Route::get('/galleries/{parent?}', 'HomeController@galleries')->where('parent', '[0-9]+');
Route::get('/product/{id}/{slug?}', 'PostController@product');
Route::get('/category/{id}/{slug?}', 'CategoryController@index');



Route::post("/home/contact_us","HomeController@ContactSendMessage");
Route::post("/home/comment","PostController@CommentMessage");

Route::post("/home/product-details","PostController@productDetailsAjax");

Route::get("/contact_us","HomeController@contactUs");
Route::get("/contact-us","HomeController@contactUs");
Route::get("/about-us","HomeController@aboutUs");
Route::get("/about_us","HomeController@aboutUs");
Route::get("/service/{id}/{slug?}","PostController@service");
Route::get("/services","HomeController@service");
Route::get("/training/{id}/{slug?}","PostController@training");
Route::get("/training","HomeController@training");

Route::get("/post","HomeController@posts");
Route::get("/post/{id}/{slug?}","PostController@post");

Route::get("/portfolio","PostController@portfolios");
Route::get("/portfolio/{id}/{slug?}","PostController@portfolio");

