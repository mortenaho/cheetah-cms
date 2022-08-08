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
    <section id="section-portfolio" class="no-top no-bottom" aria-label="section-portfolio">
        <div class="container">

            <div class="spacer-single"></div>

            <!-- portfolio filter begin -->
            <div class="row">
                <div class="col-md-12 text-center">
                    <ul id="filters" class="wow fadeInUp" data-wow-delay="0s">

                        <li><a href="#" data-filter="*" class="selected">نمایش همه</a></li>
                        @foreach($portfolio as $item)
                            <li><a href="#" data-filter=".{{$item->id}}">{{$item->title}}</a></li>
                        @endforeach

                    </ul>

                </div>
            </div>
            <!-- portfolio filter close -->

        </div>

        <div id="gallery" class="gallery full-gallery de-gallery pf_full_width wow fadeInUp" data-wow-delay=".3s">
        @foreach($portfolio as $item)
            @foreach($item->posts as $post)

                    <!-- gallery item -->
                    <div class="item {{$post->category_id}}">
                        <div class="picframe">
                            <a class="simple-ajax-popup-align-top" href="/{{$locale}}{{$post->link_address}}">
                                <span class="overlay">
                                    <span class="pf_text">
                                        <span class="project-name">{{$post->title}}</span>
                                    </span>
                                </span>
                            </a>
                            <img src="{{$post->thumb}}" alt="{{$post->title}}" />
                        </div>
                    </div>
                    <!-- close gallery item -->
            @endforeach
        @endforeach
        </div>

        <div id="loader-area">
            <div class="project-load"></div>
        </div>
    </section>
    <!-- OUR WORK CONTENT END  -->

@endif


