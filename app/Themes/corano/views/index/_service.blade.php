<?php
//$services =post_get::query([["post_type","=","service"],["status","=","1"],["featured","=","1"]]);
$services = get_post("service", [["featured", 1],["status", 1]],4, ["post_meta"]);
?>

@if(isset($services) && count($services)>0)
    <!-- product banner statistics area start -->
    <section class="product-banner-statistics pt-5">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center">
                        <h3 class="title text-center">خدمات ما</h3>
                        <p class="sub-title-2 text-center">برخی از خدمات ما شامل موارد زیر می باشد</p>
                    </div>
                    <div class="product-banner-carousel slick-row-10">
                    @foreach($services as $item)
                        <!-- banner single slide start -->
                        <div class="banner-slide-item">
                            <figure class="banner-statistics">
                                <a href="/{{$locale}}{{$item->link_address}}">
                                    <img src="{{$item->thumb}}" alt="product banner">
                                </a>
                                <div class="banner-content banner-content_style2">
                                    <h5 class="banner-text3"><a href="/{{$locale}}{{$item->link_address}}">{{$item->title}}</a></h5>
                                </div>
                            </figure>
                        </div>
                        <!-- banner single slide start -->
                    @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product banner statistics area end -->

@endif
