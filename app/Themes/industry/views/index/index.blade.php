@php
    if(!isset($lang)){$lang="fa";}
@endphp

@extends("home::shared.layout",
["title"=>"صفحه اصلی","has_slider"=>"true","sliders"=>$sliders,"AjaxToken"=>true
,"captcha"=>true,"lang"=>$lang
])



@section("body")



    <!--Services Section-->
    @if(plugin::is_active("service"))
        {{--start service--}}
        @include("home::index._service")
        {{--end service--}}
    @endif
    <!--End Services Section-->

    @if(plugin::is_active("product"))
        {{--start products--}}
{{--        @include("home::index._product")--}}
        {{--end products--}}
    @endif

    <style>

        #videoSection {
            width: 100%;
            height: 100%;
            position: relative;
            overflow: hidden;
        }

        #videoSection video {
            position: absolute;
            left: 50%;
            top: 50%;
            /* The following will size the video to fit the full container. Not necessary, just nice.*/
            min-width: 100%;
            min-height: 100%;
            -webkit-transform: translate(-50%, -50%);
            -moz-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            z-index: 0;
        }

        #videoSection div {
            position: relative;
            z-index: 1;
        }
    </style>
    @if(isset($about))
    <!--About Section-->
    <section class="product-section" id="videoSection" style="background-image:url({{theme_assets("assets/images/background/header_bg.jpg")}})">
{{--        <video playsinline autoplay muted loop poster="polina.jpg">--}}
{{--           <source src="polina.webm" type="video/webm">--}}
{{--            <source src="{{theme_assets("assets/videos/intro_video.mp4")}}" type="video/mp4">--}}
{{--        </video>--}}
{{--        <div class="upper-box">--}}
{{--            <div class="auto-container">--}}
{{--                <h2> Let's be a part of <span class="theme_color">Filtration-Separation</span> solutions </h2>--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="auto-container">
            <div class="lower-box">
                <div class="clearfix">
                @if(isset($about))
                    <!--Image Column-->
                        <div class="image-column col-lg-6 col-md-12 col-sm-12">
                            <div class="image">
                                <img src="{{$about->thumb}}" alt=""/>
                            </div>
                        </div>
                        <!--Content Column-->

                        <div class="content-column col-lg-6 col-md-12 col-sm-12">
                            <div class="inner-column">
{{--                                <h5 class="about-title"  >{{$about->title}}</h5>--}}
                                <div class="text" >
                                    <p style="color: #fff">{!! $about->content !!} </p>
                                </div>
                                {{--                            <div class="row clearfix">--}}
                                {{--                                <div class="column col-lg-6 col-md-6 col-sm-12">--}}
                                {{--                                    <ul class="list-style-one">--}}
                                {{--                                        <li><span class="icon flaticon-tool"></span>Greate Technology</li>--}}
                                {{--                                        <li><span class="icon flaticon-mechanic"></span>Certified Engineers</li>--}}
                                {{--                                    </ul>--}}
                                {{--                                </div>--}}
                                {{--                                <div class="column col-lg-6 col-md-6 col-sm-12">--}}
                                {{--                                    <ul class="list-style-one">--}}
                                {{--                                        <li><span class="icon flaticon-clock-2"></span>Delivery Ontime</li>--}}
                                {{--                                        <li><span class="icon flaticon-megaphone"></span>Best Branding</li>--}}
                                {{--                                    </ul>--}}
                                {{--                                </div>--}}
                                {{--                            </div>--}}
                            </div>
                        </div>

                    @endif
                </div>
            </div>
        </div>
    </section>
    <!--End About Section-->
    @endif


    @if(plugin::is_active("portfolio"))
        {{--            start portfolio--}}
        @include("home::index._portfolio")
        {{--            end portfolio--}}
    @endif


    <!--News Section-->
    {{--start last_post--}}
    @include("home::index._last_post",["last_post"=>$last_post])
    {{--end last_post--}}
    <!--End News Section-->

    <!--Certificates Section-->
    @if(plugin::is_active("certificate"))
        {{--start certificates--}}
        @include("home::index._certificate")
        {{--end certificates--}}
    @endif
    <!--End Certificates Section-->

    <!--Clients Section-->
    @if(plugin::is_active("customer"))
        {{--start customer--}}
        @include("home::index._customer")
        {{--end customer--}}
    @endif
    <!--End Clients Section-->


@endsection

@push("script")
    <script src="{{theme_assets("assets/plugin/validation/validate.min.js")}}"></script>
    <script src="{{theme_assets("assets/script/contact_us.js")}}"></script>
@endpush
