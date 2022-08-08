<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


\AdminHelper::add_dashboard('root',[
    "name" => "province",
    "link" => "/admin/province",
    "title" => "فروشگاه",
    "icon" => "icon-cart",
    "child" => [
        [
            "name" => "ec_category",
            "link" => "/admin/ec/category",
            "title" => "دسته بندی",
            "icon" => "icon-folder"
        ],  [
            "name" => "ec_product",
            "link" => "/admin/province",
            "title" => "محصولات  ",
            "icon" => "icon-box"
        ],
        [
            "name" => "ec_customers",
            "link" => "/admin/province",
            "title" => "مشتریان  ",
            "icon" => "icon-users4"
        ],
        [
            "name" => "ec_orders",
            "link" => "/admin/province",
            "title" => "سفارشات  ",
            "icon" => "icon-bag"
        ]
    ]
]);








//if (!Schema::hasTable('cu_service')) {
//    Schema:: create("cu_service", function (Blueprint $table) {
//        $table->charset = 'utf8';
//        $table->collation = 'utf8_persian_ci';
//        $table->bigIncrements('id');
//        $table->string("title", 120);
//        $table->string("description", 255);
//        $table->boolean("status");
//    });
//}