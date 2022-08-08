@php
  if(!isset($lang)){$lang="fa";}
@endphp

@extends("home::shared.layout",
["title"=>"صفحه اصلی","has_slider"=>"true","sliders"=>$sliders,"AjaxToken"=>true
,"captcha"=>true,"lang"=>$lang
])


@section("body")
    <!-- Main -->
    <!-- section services begin -->
    @if(plugin::is_active("service"))

        @include("home::index._service")

    @endif
    <!-- section services close -->

    <!-- About us section start -->
    @if(isset($about))

        <!-- call2 section start -->
        <section class="section bg-default text-center" style="direction: rtl;background-image: url({{theme_assets("assets/images/bg-breadcrumbs.jpg")}});">
            <div class="parallax-container" data-parallax-img="{{theme_assets("assets/images/bg-cta-3.jpg")}}">
                <div class="parallax-content section-sm context-dark">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-9 col-lg-7 col-xl-6">
                                <h5 class="oh"><span class="d-inline-block">{{$about->title}}</span></h5>
                                <p class="oh"><span class="d-inline-block">{{$about->excerpt}}</span></p>
                                <a class="button button-secondary button-ujarak" href="/{{$locale}}/about-us">بیشتر</a> </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- call2 section end -->
    @endif
    <!-- About us section end -->

    <!-- section begin -->
    @if(plugin::is_active("product"))

        @include("home::index._product")

    @endif
    <!-- section close -->



    <!-- What people say start -->
{{--        @include("home::index._testimonial")--}}
    <!-- What people say end -->

    <!-- Team section start -->
{{--    <section class="section section-sm bg-default">--}}
{{--        <div class="container">--}}
{{--            <div class="headingTitle">--}}
{{--                <h1>Team of <span>professionals</span></h1>--}}
{{--                <p>Duis ornare diam purus, ac malesuada ante congue in. Cras gravida ex elit, vel bibendum mauris efficitur non. Sed ut massa a dui iaculis pretium eu a nunc.</p>--}}
{{--            </div>--}}
{{--            <div class="row row-30">--}}
{{--                <div class="col-md-4 col-lg-4">--}}
{{--                    <!-- Team Classic-->--}}
{{--                    <article class="team-classic"><a class="team-classic-figure" href="#"><img src="{{theme_assets("assets/images/resource/team-1.jpg")}}" alt="" width="370" height="406"/></a>--}}
{{--                        <div class="team-classic-caption">--}}
{{--                            <h5 class="team-classic-name"><a href="#">Ryan Wilson</a></h5>--}}
{{--                            <p class="team-classic-status">Founder, Owner</p>--}}
{{--                        </div>--}}
{{--                    </article>--}}
{{--                </div>--}}
{{--                <div class="col-md-4 col-lg-4">--}}
{{--                    <!-- Team Classic-->--}}
{{--                    <article class="team-classic"><a class="team-classic-figure" href="#"><img src="{{theme_assets("assets/images/resource/team-2.jpg")}}" alt="" width="370" height="406"/></a>--}}
{{--                        <div class="team-classic-caption">--}}
{{--                            <h5 class="team-classic-name"><a href="#">Amanda Clark</a></h5>--}}
{{--                            <p class="team-classic-status">Measure Technician</p>--}}
{{--                        </div>--}}
{{--                    </article>--}}
{{--                </div>--}}
{{--                <div class="col-md-4 col-lg-4">--}}
{{--                    <!-- Team Classic-->--}}
{{--                    <article class="team-classic"><a class="team-classic-figure" href="#"><img src="{{theme_assets("assets/images/resource/team-3.jpg")}}" alt="" width="370" height="406"/></a>--}}
{{--                        <div class="team-classic-caption">--}}
{{--                            <h5 class="team-classic-name"><a href="#">Sam Robinson</a></h5>--}}
{{--                            <p class="team-classic-status">Installer</p>--}}
{{--                        </div>--}}
{{--                    </article>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
    <!-- Team section end -->

    <!-- Delivery section start -->
{{--    <section class="section section-sm bg-default bg_second_cl">--}}
{{--        <div class="container">--}}
{{--            <div class="row row-30 justify-content-center">--}}
{{--                <div class="col-md-4 col-lg-4">--}}
{{--                    <article class="box-icon-ruby">--}}
{{--                        <div class="unit box-icon-ruby-body flex-column flex-md-row text-md-left flex-lg-column text-lg-center flex-xl-row text-xl-left">--}}
{{--                            <div class="unit-left">--}}
{{--                                <div class="box-icon-ruby-icon fl-bigmug-line-airplane86"></div>--}}
{{--                            </div>--}}
{{--                            <div class="unit-body">--}}
{{--                                <h5 class="box-icon-ruby-title"><a href="single-service.html">Free worldwide Delivery</a></h5>--}}
{{--                                <p class="box-icon-ruby-text">When ordering from $300</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </article>--}}
{{--                </div>--}}
{{--                <div class="col-md-4 col-lg-4">--}}
{{--                    <article class="box-icon-ruby">--}}
{{--                        <div class="unit box-icon-ruby-body flex-column flex-md-row text-md-left flex-lg-column text-lg-center flex-xl-row text-xl-left">--}}
{{--                            <div class="unit-left">--}}
{{--                                <div class="box-icon-ruby-icon fl-bigmug-line-circular220"></div>--}}
{{--                            </div>--}}
{{--                            <div class="unit-body">--}}
{{--                                <h5 class="box-icon-ruby-title"><a href="single-service.html">High-Quality products</a></h5>--}}
{{--                                <p class="box-icon-ruby-text">Awafinarc-winning flooring</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </article>--}}
{{--                </div>--}}
{{--                <div class="col-md-4 col-lg-4">--}}
{{--                    <article class="box-icon-ruby">--}}
{{--                        <div class="unit box-icon-ruby-body flex-column flex-md-row text-md-left flex-lg-column text-lg-center flex-xl-row text-xl-left">--}}
{{--                            <div class="unit-left">--}}
{{--                                <div class="box-icon-ruby-icon fl-bigmug-line-hot67"></div>--}}
{{--                            </div>--}}
{{--                            <div class="unit-body">--}}
{{--                                <h5 class="box-icon-ruby-title"><a href="single-service.html">-20% on new collections</a></h5>--}}
{{--                                <p class="box-icon-ruby-text">Get your discount today!</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </article>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
    <!-- Delivery section end -->

    <!-- blog section start -->
    @include("home::index._last_post",["last_post"=>$last_post])
    <!-- blog section end -->


    <!-- call2 section start -->
    <section class="section bg-default text-center" style="direction: rtl;background-image: url({{theme_assets("assets/images/bg-breadcrumbs.jpg")}});">
        <div class="parallax-container" data-parallax-img="{{theme_assets("assets/images/bg-cta-3.jpg")}}">
            <div class="parallax-content section-sm context-dark">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-9 col-lg-7 col-xl-6">
                            <h5 class="oh"><span class="d-inline-block">آیا برای یک تجربه جدید آماده هستید</span></h5>
                            <p class="oh"><span class="d-inline-block">برای خرید از فروشگاه ما بر روی لینک زیر کلیک نمایید</span></p>
                            <a class="button button-secondary button-ujarak" href="shop.html">فروشگاه</a> </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- call2 section end -->
    <!-- clients section start -->
        @if(plugin::is_active("customer"))

            @include("home::index._customer")

        @endif
    <!-- clients section end -->


@endsection

@push("script")
    <script src="{{theme_assets("assets/plugin/validation/validate.min.js")}}"></script>
    <script src="{{theme_assets("assets/script/contact_us.js")}}"></script>
@endpush
