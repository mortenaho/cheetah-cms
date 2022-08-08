<?php

use App\Models\Category;

$portfolio = Category::with(["posts"=>function ($query){
    $query->where("featured", "1");
}])
    ->where("type", "=", "portfolio")
    ->where("status", "=", "1")
    ->get();
?>
@if(isset($portfolio)  && count($portfolio)>0)

    <!-- group product start -->
    <section class="feature-product section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- section title start -->
                    <div class="section-title text-center">
                        <h3 class="title text-center">نمونه کارها</h3>
                        <p class="sub-title-2 text-center">برخی از نمونه کارهای ما</p>
                    </div>
                    <!-- section title start -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-carousel-4_2 slick-row-10 slick-arrow-style">
                    @foreach($portfolio as $item)
                        @foreach($item->posts as $post)
                        <!-- product item start -->
                            <div class="product-item">
                                <figure class="product-thumb">
                                    <a href="/{{$locale}}{{$item->link_address}}">
                                        <img class="pri-img" src="{{$post->thumb}}"
                                             alt="product">
                                        <img class="sec-img" src="{{$post->thumb}}"
                                             alt="product">
                                    </a>
                                    <div class="product-badge">
                                        <div class="product-label new">
                                            <span>جدید</span>
                                        </div>
{{--                                        <div class="product-label discount">--}}
{{--                                            <span>10%</span>--}}
{{--                                        </div>--}}
                                    </div>
                                    <div class="button-group">

                                        <a  onclick="getPortfolioDetails({{$post->id}});" ><span
                                                data-toggle="tooltip" data-placement="right" title="نمایش جزییات"><i
                                                    class="pe-7s-search"></i></span></a>
                                    </div>
{{--                                    <div class="cart-hover">--}}
{{--                                        <button class="btn btn-cart">add to cart</button>--}}
{{--                                    </div>--}}
                                </figure>
                                <div class="product-caption text-center">
                                    <div class="product-identity">
                                        <p class="manufacturer-name"><a href="/{{$locale}}{{$post->link_address}}">{{$post->title}}</a></p>
                                    </div>

{{--                                    <h6 class="product-name">--}}
{{--                                        <a href="{{$post->link_address}}">{{$post->title}}</a>--}}
{{--                                    </h6>--}}
{{--                                    <div class="price-box">--}}
{{--                                        <span class="price-regular">$60.00</span>--}}
{{--                                        <span class="price-old"><del>$70.00</del></span>--}}
{{--                                    </div>--}}
                                </div>
                            </div>
                            <!-- product item end -->
                        @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- group product end -->


@endif
