@extends("home::shared.layout",
["title"=>"درباره ما","AjaxToken"=>true
,"captcha"=>true
])

@section("breadcrumb")
    {{--{{$site->header_banner}}--}}
    <!-- INNER PAGE BANNER -->
    <div class="wt-bnr-inr overlay-wraper bg-center"
         style="background-image:url({{theme_assets("assets/images/banner/4.jpg")}});">
        <div class="overlay-main bg-black opacity-07"></div>
        <div class="container">
            <div class="wt-bnr-inr-entry">
                <div class="banner-title-outer">
                    <div class="banner-title-name">
                        <h3 class="text-white">درباره ما</h3>
                    </div>
                </div>
                <!-- BREADCRUMB ROW -->

                <div>
                    <ul class="wt-breadcrumb breadcrumb-style-2" style="direction: rtl;">
                        <li><a href="/{{$locale}}/">خانه</a></li>
                        <li>درباره ما</li>
                    </ul>
                </div>

                <!-- BREADCRUMB ROW END -->
            </div>
        </div>
    </div>

@endsection

@section("body")

    <!-- Main -->
    @if(isset($about))

        <!-- SECTION CONTENT START -->
        <div class="section-full small-device  p-tb80">
            <div class="container">
                <div class="project-detail-outer">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="project-detail-pic m-b30">
                                <div class="wt-media">
                                    <img src="{{$about->thumb}}" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="product-block bg-gray p-a30 p-b15 m-b30">
                                <div class="row">

                                    <div class="col-md-6 col-sm-6 m-b30">
                                        <p>{{$about->excerpt}}</p>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="project-detail-containt">
                        <div class="bg-white text-black">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <a href="/{{$locale}}{{$about->link_address}}">
                                        <h4>{{$about->title}}</h4>
                                    </a>
                                    <p> {!! $about->content !!}</p>
                                    <div class="p-t0">
                                        <ul class="social-icons social-square social-lg social-darkest m-b0">
                                            <li><a href="javascript:void(0);" class="fa fa-facebook"></a></li>
                                            <li><a href="javascript:void(0);" class="fa fa-twitter"></a></li>
                                            <li><a href="javascript:void(0);" class="fa fa-linkedin"></a></li>
                                            <li><a href="javascript:void(0);" class="fa fa-rss"></a></li>
                                            <li><a href="javascript:void(0);" class="fa fa-youtube"></a></li>
                                            <li><a href="javascript:void(0);" class="fa fa-instagram"></a></li>
                                        </ul>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>



                </div>



            </div>

        </div>
        <!-- SECTION CONTENT END  -->
        <!-- WHAT WE DO SECTION START -->
        <div class="section-full p-t80 p-b50 bg-gray">
            <div class="container">
                <!-- TITLE START -->
                <div class="section-head text-center">
                    <div class="wt-separator-outer separator-center">
                        <div class="wt-separator">
                            <span class="text-primary text-uppercase sep-line-one ">خدمات</span>
                        </div>
                    </div>
                    {{--                            <h2>خدمات</h2>--}}
                </div>
                <!-- TITLE END -->
                <div class="section-content">
                    <div class="row">
                        @isset($services)
                            @foreach($services as $item)
                                <div class="col-md-3 col-sm-6 col-xs-6 col-xs-100pc m-b30">
                                    <div class="hover-box-effect  v-icon-effect">
                                        <div class="wt-icon-box-wraper center p-lr30  p-b50 p-t50 bg-white">
                                            <div class="icon-lg text-primary m-b20">
                                                <img src="{{$item->thumb}}" alt="{{$item->title}}"/>
                                            </div>
                                            <div class="icon-content text-black">
                                                <h4 class="wt-tilte m-b25">{{$item->title}}</h4>
                                                <p>{{$item->excerpt}}</p>
                                                <a href="/{{$locale}}{{$item->link_address}}" class="site-button-link" data-hover="جزییات">جزییات</a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif


@endsection

@push("script")
@endpush
