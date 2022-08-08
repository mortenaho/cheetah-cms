<?php

use App\Models\Category;

$portfolio = Category::with(["posts"=>function ($query){
    $query->where("featured", "1");
}])
    ->where("type", "=", "portfolio")
    ->where("status", "=", "1")
    ->get();?>

@if(isset($portfolio)  && count($portfolio)>0)
    <!-- works -->
    <section id="works" class="page-section">
        <div class="image-bg content-in fixed" data-background="{{theme_assets("assets/img/sections/bg/bg-13.jpg")}}">
            <div class="overlay"></div>
        </div>
        <div class="container work-section">
            <div class="section-title white" data-animation="fadeInUp">
                <!-- Heading -->
                <h2 class="title">{{trans('home.portfolio')}}</h2>
            </div>
            <div id="options" class="filter-menu" data-animation="fadeInUp">
                <ul class="option-set nav nav-pills">
                    <li class="filter active" data-filter="all">همه</li>
                    @foreach($portfolio as $item)
                        <li class="filter" data-filter=".filter_{{$item->id}}">{{$item->title}}</li>
                    @endforeach
                   </ul>
            </div>
        </div>
        <!-- filter -->
        <div id="mix-container" class="portfolio-grid" data-animation="fadeInUp">

        @foreach($portfolio as $item)
            @foreach($item->posts as $post)
            <!-- Item 1 -->
            <div class="grids col-xs-12 col-sm-6 col-md-3 all filter_{{$post->category_id}} ">
                <div class="grid">
                    <img src="{{$post->thumb}}" width="400" height="273" alt="{{$post->title}}" class="img-responsive" />
                    <div class="figcaption">
                        <div class="caption-block">
                            <h4>{{$post->title}}</h4>
                            <p>Buildings</p>
                        </div>
                        <!-- Image Popup-->
                        <a href="{{$post->thumb}}" data-rel="prettyPhoto[portfolio]">
                            <i class="fa fa-search"></i>
                        </a>
                        <a href="/{{$locale}}{{$post->link_address}}">
                            <i class="fa fa-link"></i>
                        </a></div>
                </div>
            </div>
            <!-- Item 1 Ends-->
            @endforeach
        @endforeach

        </div>
        <!-- Mix Container -->
    </section>
    <!-- works -->

@endif


