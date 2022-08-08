<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

\AdminHelper::add_dashboard([
    "name"=>"customer_order",
    "link"=>"/admin/customer_order",
    "title"=>"درخواست مشتری",
    "icon"=>"icon-user"
]);
\AdminHelper::add_dashboard([
    "name"=>"agency",
    "link"=>"/admin/agency",
    "title"=>"نمایندگی ها",
    "icon"=>"icon-user"
]);
\AdminHelper::add_dashboard([
    "name"=>"province",
    "link"=>"/admin/province",
    "title"=>"استان/شهر",
    "icon"=>"icon-server"
]);
\AdminHelper::add_dashboard([
    "name"=>"customer_service",
    "link"=>"/admin/customer_service",
    "title"=>"خدمات مشتریان",
    "icon"=>"icon-server"
]);
\AdminHelper::add_dashboard([
    "name"=>"customer_service_type",
    "link"=>"/admin/customer_service_type",
    "title"=>"نوع خدمات",
    "icon"=>"icon-server"
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