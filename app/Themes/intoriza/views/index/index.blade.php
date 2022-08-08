@php
  if(!isset($lang)){$lang="fa";}
@endphp

@extends("home::shared.layout",
["title"=>"صفحه اصلی","has_slider"=>"true","sliders"=>$sliders,"AjaxToken"=>true
,"captcha"=>true,"lang"=>$lang
])


@section("body")
    <!-- Main -->

    @if(isset($about))
        <!-- WELCOME SECTION START -->
        <div class="section-full p-tb80 bg-white">
            <div class="container">
                <div class="section-content">
                    <div class="row">
                        <div class="col-md-7 col-sm-12">
                            <div class="welcome-carousel-outer m-b60">
                                <div class="welcome-bg-block clearfix" style="background-image: url({{$about->thumb}});">
                                    <div class="welcome-carousel-1">
                                        <div
                                            class="owl-carousel home-carousel-1 owl-btn-bottom-left"
                                        >

                                            @if(isset($galleries))
                                                @foreach($galleries as $gallery)
                                                    <!-- COLUMNS 1 -->
                                                    <div class="item">
                                                        <div class="ow-img">
                                                            <a href="javascript:void(0);"
                                                            ><img
                                                                    src="{{$gallery->thumb}}"
                                                                    alt=""
                                                                /></a>
                                                        </div>
                                            </div>
                                                @endforeach
                                            @endif

                                         </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-12">
                            <!-- TITLE START -->
                            <div class="section-head">
                                <div class="wt-separator-outer separator-left">
                                    <div class="wt-separator">
                        <span class="text-primary text-uppercase sep-line-one"
                        >{{ $about->title }}</span
                        >
                                    </div>
                                </div>
{{--                                <h3>--}}
{{--                                    ما از چه سالی شروع کردیم <br/>--}}
{{--                                    ما از سال 1370 سروع به فعالیت کردیم--}}
{{--                                </h3>--}}
                            </div>
                            <!-- TITLE END -->
                            <p>
                                {{$about->excerpt}}
                            </p>

                            <a href="javascript:void(0);" class="site-button m-t15 m-b15"
                            >بیشتر</a
                            >
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- WELCOME  SECTION END -->
    @endif


    @if(plugin::is_active("product"))
        {{--start products--}}
        @include("home::index._product")
        {{--end products--}}
    @endif


    @if(plugin::is_active("service"))
        {{--start service--}}
        @include("home::index._service")
        {{--end service--}}
    @endif
    <!-- services  -->

    <!-- VIDEO SECTION START -->
    <div
        class="section-full bg-center bg-no-repeat bg-cover"
        style="background-image: url({{theme_assets("assets/images/background/bg-1.jpg")}})"
    >
        <div class="container">
            <div class="section-content">
                <div class="video-section-full bg-white">
                <span class="font-18 text-primary text-uppercase"
                >{{$site->title}}</span
                >
                    <h4 class="wt-tilte m-tb20">
                        {{$site->description}}
                    </h4>
                    <div class="video-section-content">
                        <div class="video-section-left">
                            <a
                                href="https://player.vimeo.com/video/34741214?color=ffffff&amp;title=0&amp;byline=0&amp;portrait=0"
                                class="mfp-video play-now"
                            >
                                <i class="icon fa fa-play"></i>
                                <span class="ripple"></span>
                            </a>
                        </div>
                        <div class="video-secion-right">
                            <a
                                href="https://player.vimeo.com/video/34741214?color=ffffff&amp;title=0&amp;byline=0&amp;portrait=0"
                                class="mfp-video font-weight-600 text-uppercase"
                            > نمایش ویدیو</a
                            >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- VIDEO SECTION END -->


    @if(plugin::is_active("portfolio"))
{{-- start portfolio--}}
        @include("home::index._portfolio")
{{-- end portfolio--}}
    @endif
    <!-- works -->


    {{--start last_post--}}
    @include("home::index._last_post",["last_post"=>$last_post])
    {{--end last_post--}}
    <!-- News -->

    @if(plugin::is_active("customer"))
        {{--start customer--}}
        @include("home::index._customer")
        {{--end customer--}}
    @endif
    <!-- clients -->

    @include("home::index._testimonial")

@endsection

@push("script")
    <script src="{{theme_assets("assets/plugin/validation/validate.min.js")}}"></script>
    <script src="{{theme_assets("assets/script/contact_us.js")}}"></script>
@endpush
