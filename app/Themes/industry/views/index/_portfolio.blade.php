<?php

use App\Models\Category;

$portfolio = Category::with(["posts"=>function ($query){
    $query->where("featured", "1");
}])
    ->where("type", "=", "portfolio")
    ->where("status", "=", "1")
    ->get();?>

@if(isset($portfolio)  && count($portfolio)>0)

    <!--Portfolio Section-->
    <section class="gallery-section">
        <div class="auto-container">
            <div class="sec-title centered">
                <h4>{{trans('home.portfolio')}}</h4>
                <div class="separater"></div>
            </div>
        </div>
        <!--Sortable Masonry-->
        <div class="sortable-masonry">
            <div class="auto-container">
                <!--Filter-->
                <div class="filters">

                    <ul class="filter-tabs filter-btns clearfix">
                        <li class="active filter" data-role="button" data-filter=".all">همه</li>
                        @foreach($portfolio as $item)
                            <li class="filter" data-role="button" data-filter=".{{$item->id}}">{{$item->title}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="items-container row clearfix">
                @foreach($portfolio as $item)

                    @foreach($item->posts as $post)
                    <!--Default Portfolio Item-->
                    <div class="default-portfolio-item big-column masonry-item all {{$post->category_id}}">
                        <div class="inner-box">
                            <figure class="image-box"><img src="{{$post->thumb}}" alt="{{$post->title}}"></figure>
                            <!--Overlay Box-->
                            <div class="overlay-box">
                                <div class="overlay-inner">
                                    <div class="content">
                                        <a href="/{{$locale}}{{$post->link_address}}" class="link"><span class="fa fa-link"></span></a>
                                        <a href="{{$post->thumb}}" class="lightbox-image link"
                                           data-fancybox="images" data-caption="" title="{{$post->title}}"><span
                                                class="icon fa fa-search"></span></a>
                                        <h3><a href="/{{$locale}}{{$post->link_address}}">{{$post->title}}</a></h3>
{{--                                        <div class="tags">Agriculture, Chemical</div>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endforeach


        </div>
    </section>

@endif


