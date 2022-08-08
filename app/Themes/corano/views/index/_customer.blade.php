<?php
$customers = post_get::query([["post_type", "=", "customer"], ["status", "=", "1"]]);
?>


@if(isset($customers) && count($customers)>0)


    <!-- brand logo area start -->
    <div class="brand-logo section-padding pt-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center">
{{--                        <h3 class="title text-center">مشتریان ما</h3>--}}
                        <p class="sub-title-2 text-center">برخی از مشتریان ما</p>
                    </div>
                    <div class="brand-logo-carousel slick-row-10 slick-arrow-style">
                        @foreach($customers as $item)
                             <!-- single brand start -->
                            <div class="brand-item">
                                <a href="/{{$locale}}{{$item->link_address}}">
                                    <img src="{{$item->thumb}}" alt="{{$item->title}}">
                                </a>
                            </div>
                            <!-- single brand end -->
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- brand logo area end -->

    {{--<section class="p-top-70 p-bottom-70">--}}
    {{--    <div class="container">--}}
    {{--        <div class="row">--}}
    {{--            <div class="col-lg-12">--}}
    {{--                <h3>مشتریان</h3>--}}
    {{--                <div class="logo-carousel-four owl-carousel">--}}
    {{--                    @foreach($customers as $item)--}}
    {{--                    <div class="carousel-single">--}}
    {{--                        <a href="#"> <img src="{{$item->thumb}}"  alt="{{$item->title}}"></a>--}}
    {{--                    </div><!-- ends: .carousel-single -->--}}
    {{--                    @endforeach--}}

    {{--                </div>--}}

    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}

    {{--</section>--}}
@endif
