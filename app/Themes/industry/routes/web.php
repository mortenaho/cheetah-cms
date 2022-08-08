<?php
/**
 * Created by PhpStorm.
 * User: mortenaho
 * Date: 6/28/2019
 * Time: 12:46 AM
 */

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/fa/');
});


Route::get('/{locale}','HomeController@index');
Route::get('/{locale}/about', 'HomeController@about');
Route::get('/{locale}/posts', 'PostController@posts');
Route::get('/{locale}/tags/{tag}', 'PostController@tags');
Route::get('/{locale}/products', 'PostController@products');
Route::get('/{locale}/downloads', 'PostController@downloads');
Route::get('/{locale}/download/{id}/{slug?}', 'PostController@download');
Route::get('/{locale}/galleries/{parent?}', 'HomeController@galleries')->where('parent', '[0-9]+');
Route::get('/{locale}/product/{id}/{slug?}', 'PostController@product');
Route::get('/{locale}/page/{id}/{slug?}', 'PostController@page');
Route::get('/{locale}/category/{id}/{slug?}', 'CategoryController@index');

Route::post("/home/contact_us","HomeController@contactSendMessage");
Route::post("/home/comment","PostController@CommentMessage");
Route::post("/home/product-details","PostController@productDetailsAjax");

Route::get("/{locale}/contact_us","HomeController@contactUs");
Route::get("/{locale}/contact-us","HomeController@contactUs");
Route::get("/{locale}/about-us","HomeController@aboutUs");
Route::get("/{locale}/about_us","HomeController@aboutUs");
Route::get("/{locale}/service/{id}/{slug?}","PostController@service");
Route::get("/{locale}/services","HomeController@service");
Route::get("/{locale}/certificate/{id}/{slug?}","PostController@certificate");
Route::get("/{locale}/certificates","HomeController@certificate");
Route::get("/{locale}/training","HomeController@training");
Route::get("/{locale}/training/{id}/{slug?}","PostController@training");

Route::get("/{locale}/post","HomeController@posts");
Route::get("/{locale}/post/{id}/{slug?}","PostController@post");

Route::get("/{locale}/portfolio","PostController@portfolios");
Route::get("/{locale}/portfolio/{id}/{slug?}","PostController@portfolio");

