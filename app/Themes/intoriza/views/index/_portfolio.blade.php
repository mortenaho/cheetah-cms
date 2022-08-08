<?php

use App\Models\Category;

$portfolio = Category::with(["posts" => function ($query) {
    $query->where("featured", "1");
}])
    ->where("type", "=", "portfolio")
    ->where("status", "=", "1")
    ->get(); ?>

@if(isset($portfolio)  && count($portfolio)>0)
    <!-- OUR WORK CONTENT START -->
    <div class="section-full small-device p-t80 p-b50 bg-white">
        <div class="container">
            <!-- TITLE START -->
            <div class="section-head text-center">
                <div class="wt-separator-outer separator-center">
                    <div class="wt-separator">
                  <span class="text-primary text-uppercase sep-line-one"
                  >نمونه کارهای ما</span
                  >
                    </div>
                </div>
                {{--                <h3>نمونه کارها</h3>--}}
            </div>
            <!-- TITLE END -->
            <!-- PAGINATION START -->

            <!-- PAGINATION END -->
        </div>
        <!-- GALLERY CONTENT START -->
        <div class="portfolio-wrap mfp-gallery work-grid clearfix">
            <!-- COLUMNS 1 -->
            <div class="stamp col-md-3 col-sm-6 m-b40">
                <div class="bg-gray p-a30 p-b20 stamp-secion">
                    {{--                    <h4 class="wt-tilte m-t0">--}}
                    {{--                        We create Innovative design. exceptional designing for--}}
                    {{--                        exceptional Spaces--}}
                    {{--                    </h4>--}}
                    {{--                    <p>--}}
                    {{--                        There are many variations of passages of Lorem Ipsum--}}
                    {{--                        available, but the majority have suffered alteration fact some--}}
                    {{--                        form, by injected humour, or randomised words which don't look--}}
                    {{--                        even slightly believable. If you are this going to be use a--}}
                    {{--                        passage of Lorem Ipsum, you need to be sure there isn't--}}
                    {{--                        anything embarrassing hidden in the middle of text. It is a--}}
                    {{--                        long established fact that a reader will be distracted.--}}
                    {{--                    </p>--}}
                    <div class="filter-wrap">
                        <ul class="filter-navigation masonry-filter text-uppercase">
                            <li class="active">
                                <a data-filter="*" data-hover="نمایش همه" href="#">نمایش همه</a>
                            </li>
                            @foreach($portfolio as $item)
                                <li>
                                    <a
                                        data-filter=".cat-{{$item->id}}"
                                        data-hover="{{$item->title}}"
                                        href="javascript:;"
                                    >{{$item->title}}</a
                                    >
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>

        @foreach($portfolio as $item)
            @foreach($item->posts as $post)
                <!-- COLUMNS 2 -->
                    <div class="masonry-item cat-{{$post->category_id}} col-md-3 col-sm-6 m-b30">
                        <div class="wt-box work-hover-content">
                            <div class="wt-thum-bx img-center-icon">
                                <a href="javascript:;"
                                ><img src="{{$post->thumb}}" alt="{{$post->title}}"
                                    /></a>
                            </div>
                            <div class="wt-info p-t20">
                                <h4 class="wt-tilte m-b10 m-t0">
                                    <a href="/{{$locale}}{{$post->link_address}}">{{$post->title}}</a>
                                </h4>
                                <p class="m-b0">{{$post->excerpt}}</p>
                            </div>
                        </div>
                    </div>
            @endforeach
        @endforeach

        </div>
        <!-- GALLERY CONTENT END -->
    </div>
    <!-- OUR WORK CONTENT END  -->
@endif


