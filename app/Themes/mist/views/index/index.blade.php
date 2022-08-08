@php
  if(!isset($lang)){$lang="fa";}
@endphp

@extends("home::shared.layout",
["title"=>"صفحه اصلی","has_slider"=>"true","sliders"=>$sliders,"AjaxToken"=>true
,"captcha"=>true,"lang"=>$lang
])



@section("body")
    <!-- Main -->

    @if(plugin::is_active("service"))
        {{--start service--}}
        @include("home::index._service")
        {{--end service--}}
    @endif
    <!-- services  -->

    <section id="call-to-action" class="page-section no-pad bg-color">
        <div class="container">
            <div class="row">
                <div class="col-md-12 top-pad-40 bottom-pad-20 text-center white" data-animation="pulse">
                    <h3>{{trans('home.dreams_come_true')}} </h3>
                </div>
            </div>
        </div>
    </section>
    <!-- call to action -->


    @if(isset($about))
{{--    <section id="about-us" class="page-section" data-animation="fadeInUp">--}}
{{--        <div class="container">--}}

{{--            <div class="row">--}}
{{--                <div data-appear-animation="fadeInLeft"--}}
{{--                     class="col-md-6 text-center appear-animation fadeInLeft appear-animation-visible">--}}
{{--                    <!-- Image -->--}}
{{--                    <img width="960" height="960" alt="" src="{{$about->thumb}}">--}}
{{--                </div>--}}
{{--                <div class="col-md-6">--}}
{{--                    <div class="section-title text-left" data-animation="fadeInUp">--}}
{{--                        <!-- Title -->--}}
{{--                        <h2 class="title">{{$about->title}}</h2>--}}
{{--                    </div>--}}
{{--                    <!-- Content -->--}}
{{--                    <div data-animation="fadeInDown">--}}
{{--                        <p>--}}
{{--                            {{$about->excerpt}}--}}
{{--                        </p>--}}

{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
    @endif
    <!-- about-us 1-->

{{--    @if(isset($about))--}}
{{--    <section id="who-we-are" class="page-section no-pad light-bg border-tb">--}}
{{--        <div class="container-fluid who-we-are">--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-6 pad-60" data-animation="fadeInLeft">--}}
{{--                    <div class="section-title text-left" data-animation="fadeInUp">--}}
{{--                        <!-- Title -->--}}
{{--                        <h2 class="title">درباره ما</h2>--}}
{{--                    </div>--}}
{{--                    <div class="owl-carousel pagination-1 dark-switch" data-pagination="true" data-autoplay="true"--}}
{{--                         data-navigation="false" data-singleitem="true">--}}

{{--                        <div class="item">--}}
{{--                            <!-- Heading -->--}}
{{--                            <h2 class="entry-title">--}}
{{--                                <a href="#">{{$about->title}}</a>--}}
{{--                            </h2>--}}
{{--                            <!-- Content -->--}}
{{--                            <div class="entry-content">--}}
{{--                                <p>--}}
{{--                                    {{$about->excerpt}}--}}
{{--                                </p>--}}
{{--                        </div>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-md-6 no-pad text-center" data-animation="fadeInRight">--}}
{{--                    <!-- Image -->--}}
{{--                    <div class="image-bg" data-background="{{$about->thumb}}"></div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--    @endif--}}
    <!-- about-us 2-->

{{--    @if(plugin::is_active("portfolio"))--}}
{{--        --}}{{--start portfolio--}}
{{--        @include("home::index._portfolio")--}}
{{--        --}}{{--end portfolio--}}
{{--    @endif--}}
{{--    <!-- works -->--}}

    <section id="fun-factor" class="page-section">
        <div class="image-bg content-in fixed" data-background="{{theme_assets("assets/img/sections/bg/bg-11.jpg")}}"></div>
        <div class="container">
            <div class="row white top-pad-20">
                <div class="col-md-6" data-animation="fadeInLeft">
                    <h3 class="text-uppercase bottom-margin-10"><span class="text-color">{{trans('home.dreams_come_true')}}</span></h3>
                    <p>{{trans('home.we_are_leaders')}}</p>
{{--                    <a href="#" class="btn btn-default">Read more..</a>--}}
                </div>
                <div class="col-md-6" data-animation="fadeInRight">
                    <div class="row text-center fact-counter white">
                        <div class="col-sm-4 col-md-4 bottom-xs-pad-30">
                            <!-- Icon -->
                            <i class="icon-download14 fa-3x"></i>
                            <!-- number -->
                            <div class="count-number" data-count="9987">
                                <span class="counter"></span>
                            </div>
                            <!-- Title -->
                            <h5>{{trans('home.downloads')}}</h5></div>
                        <div class="col-sm-4 col-md-4 bottom-xs-pad-30">
                            <!-- Icon -->
                            <i class="icon-profile-male fa-3x"></i>
                            <!-- number -->
                            <div class="count-number" data-count="9123">
                                <span class="counter"></span>
                            </div>
                            <!-- Title -->
                            <h5>{{trans('home.happy_client')}}</h5></div>
                        <div class="col-sm-4 col-md-4 bottom-xs-pad-30">
                            <!-- Icon -->
                            <i class="icon-trophy5 fa-3x"></i>
                            <!-- number -->
                            <div class="count-number" data-count="925">
                                <span class="counter"></span>
                            </div>
                            <!-- Title -->
                            <h5>{{trans('home.awards')}}</h5></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- fun-factor -->

    @if(plugin::is_active("product"))
        {{--start products--}}
        @include("home::index._product")
        {{--end products--}}
    @endif

    @if(plugin::is_active("certificate"))
        {{--start certificates--}}
        @include("home::index._certificate")
        {{--end certificates--}}
    @endif


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







@endsection

@push("script")
    <script src="{{theme_assets("assets/plugin/validation/validate.min.js")}}"></script>
    <script src="{{theme_assets("assets/script/contact_us.js")}}"></script>
@endpush
