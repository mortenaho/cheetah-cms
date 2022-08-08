<?php

$post_meta = ResToModel($contact_info->post_meta);
$tel_1 = $post_meta["tel_1"];
$tel_2 = $post_meta["tel_2"];
$mobile = $post_meta["mobile"];
$address = $post_meta["address"];
$fax = $post_meta["fax"];
$email = $post_meta["email"];
$latitude = $post_meta["latitude"];
$longitude = $post_meta["longitude"];


?>
<!doctype html>
<html lang="en">

<!-- Mirrored from malikhassan.com/blog_designer/finarc/html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Mar 2021 03:45:29 GMT -->
<head>
    <meta charset="utf-8">
    <title>{{$title}} | {{isset($post_title)?$post_title:$site->title}}</title>
    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="{{isset($post_desc)?$post_desc: $site->description}}">
    <meta name="keywords" content="{{isset($post_keywords)?$post_keywords:$site->keywords}}">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    @yield("post_meta")

    @isset($AjaxToken)
        <meta name="csrf-token" content="{{ csrf_token() }}"/>
    @endisset
    <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
    <!--[if lt IE 9]><script src="{{theme_assets("assets/js/respond.js")}}"></script><![endif]-->
    <!-- favicon -->
    <link rel="icon" href="{{theme_assets("assets/images/favicon.png")}}" type="image/x-icon">
    <!-- Stylesheets-->
    <link rel="stylesheet" href="/Themes/shared/css/farsi_font/farsi-font.css"   type="text/css" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins:400,500%7CTeko:300,400,500%7CMaven+Pro:500">
    <link rel="stylesheet" href="{{theme_assets("assets/css/bootstrap.css")}}">
    <link rel="stylesheet" href="{{theme_assets("assets/css/fonts.css")}}">
    <link rel="stylesheet" href="{{theme_assets("assets/css/style.rtl.css")}}" id="main-styles-link">
    <link rel="stylesheet" href="{{theme_assets("assets/css/custom.css")}}">
    <!--Color Switcher Mockup-->
    <link rel="stylesheet" href="{{theme_assets("assets/dist/color-default.css")}}">
    <link rel="stylesheet" href="{{theme_assets("assets/dist/color-switcher.css")}}">

</head>
<body dir="rtl">
<div class="page">
    <!-- Page Header Start -->
    <header class="section page-header">
        <!-- RD Navbar Start -->
        <div class="finarc-navbar-wrap finarc-navbar-modern-wrap">
            <nav class="finarc-navbar finarc-navbar-modern" data-layout="finarc-navbar-fixed" data-sm-layout="finarc-navbar-fixed" data-md-layout="finarc-navbar-fixed" data-md-device-layout="finarc-navbar-fixed" data-lg-layout="finarc-navbar-static" data-lg-device-layout="finarc-navbar-fixed" data-xl-layout="finarc-navbar-static" data-xl-device-layout="finarc-navbar-static" data-xxl-layout="finarc-navbar-static" data-xxl-device-layout="finarc-navbar-static" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="70px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
                <div class="finarc-navbar-main-outer">
                    <div class="finarc-navbar-main">
                        <!-- RD Navbar Panel-->
                        <div class="finarc-navbar-panel">
                            <!-- RD Navbar Toggle-->
                            <button class="finarc-navbar-toggle" data-finarc-navbar-toggle=".finarc-navbar-nav-wrap"><span></span></button>
                            <!-- RD Navbar Brand-->
                            <div class="finarc-navbar-brand"><a class="brand" href="/{{$locale}}"><img src="{{$site->header_logo}}" class="logo-sticky" alt="{{$site->site_name}}" title="{{$site->site_name}}"></a></div>
                        </div>
                        <div class="finarc-navbar-main-element">
                            <div class="finarc-navbar-nav-wrap">
                                <!-- RD Navbar Basket-->
{{--                                <div class="finarc-navbar-basket-wrap">--}}
{{--                                    <button class="finarc-navbar-basket fl-bigmug-line-shopping198" data-finarc-navbar-toggle=".cart-inline"><span>2</span></button>--}}
{{--                                    <div class="cart-inline">--}}
{{--                                        <div class="cart-inline-header">--}}
{{--                                            <h5 class="cart-inline-title">In cart:<span> 2</span> Products</h5>--}}
{{--                                            <h6 class="cart-inline-title">Total price:<span> $524</span></h6>--}}
{{--                                        </div>--}}
{{--                                        <div class="cart-inline-body">--}}
{{--                                            <div class="cart-inline-item">--}}
{{--                                                <div class="unit align-items-center">--}}
{{--                                                    <div class="unit-left"><a class="cart-inline-figure" href="single-product.html"><img src="assets/images/products/products-mini-1.jpg" alt="" width="100" height="100"/></a></div>--}}
{{--                                                    <div class="unit-body">--}}
{{--                                                        <h6 class="cart-inline-name"><a href="single-product.html">Interior Design</a></h6>--}}
{{--                                                        <div>--}}
{{--                                                            <div class="group-xs group-middle-2">--}}
{{--                                                                <div class="table-cart-stepper">--}}
{{--                                                                    <input class="form-input" type="number" data-zeros="true" value="1" min="1" max="1000"/>--}}
{{--                                                                </div>--}}
{{--                                                                <h6 class="cart-inline-title">$289</h6>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="cart-inline-item">--}}
{{--                                                <div class="unit align-items-center">--}}
{{--                                                    <div class="unit-left"><a class="cart-inline-figure" href="single-product.html"><img src="assets/images/products/products-mini-2.jpg" alt="" width="100" height="100"/></a></div>--}}
{{--                                                    <div class="unit-body">--}}
{{--                                                        <h6 class="cart-inline-name"><a href="single-product.html">Interior Design</a></h6>--}}
{{--                                                        <div>--}}
{{--                                                            <div class="group-xs group-middle-2">--}}
{{--                                                                <div class="table-cart-stepper">--}}
{{--                                                                    <input class="form-input" type="number" data-zeros="true" value="1" min="1" max="1000"/>--}}
{{--                                                                </div>--}}
{{--                                                                <h6 class="cart-inline-title">$235</h6>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="cart-inline-footer">--}}
{{--                                            <div class="group-sm"><a class="button button-md button-default-outline button-wapasha" href="cart-page.html">Go to cart</a><a class="button button-md button-secondary button-pipaluk" href="checkout.html">Checkout</a></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <a class="finarc-navbar-basket finarc-navbar-basket-mobile fl-bigmug-line-shopping198" href="cart-page.html"><span>2</span></a>--}}
                                <!-- RD Navbar Search-->
                                <div class="finarc-navbar-search">
                                    <button class="finarc-navbar-search-toggle" data-finarc-navbar-toggle=".finarc-navbar-search"><span></span></button>
                                    <form class="finarc-search" action="https://www.google.com/search" data-search-live="finarc-search-results-live" method="GET">
                                        <div class="form-wrap">
                                            <label class="form-label" for="finarc-navbar-search-form-input">جستجو...</label>
                                            <input class="finarc-navbar-search-form-input form-input" id="finarc-navbar-search-form-input" type="text" name="s" autocomplete="off"/>
                                            <div class="finarc-search-results-live" id="finarc-search-results-live"></div>
                                            <input type="hidden" value="naw3.com/" name="domains">
                                            <input type="hidden" value="UTF-8" name="oe">
                                            <input type="hidden" value="UTF-8" name="ie">
                                            <input type="hidden" value="fa" name="hl">
                                            <input type="hidden" value="naw3.com" name="sitesearch">
                                            <button class="finarc-search-form-submit fl-bigmug-line-search74" type="submit"></button>
                                        </div>
                                    </form>

                                </div>
                                <!-- RD Navbar Nav-->
                                {{--nav menu --}}
                                @include("home::shared.nav_menu",["menus"=>$menu])
                                {{--end nave menu --}}
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- RD Navbar End -->
    </header>
    <!-- Page Header End -->
    @if(isset($has_slider))
        <!-- SLIDER START -->
        @include("home::shared._slider",["sliders"=>$sliders])
    @endif


    @yield("breadcrumb")
    @yield("body")


    <!-- Footer section start -->
    <footer class="section footer-variant-2 footer-modern context-dark">
        <div class="footer-variant-2-content">
            <div class="container">
                <div class="row row-40 justify-content-between">
                    <div class="col-sm-6 col-lg-4 col-xl-3">
                        <div class="oh-desktop">
                            <div class="">
                                <div class="footer-brand"><a href="/{{$locale}}"> <img class="logo-footer" src="{{$site->footer_logo}}" alt="{{$site->site_name}}" /></a></div>
                                <p>{{$site->description}}</p>
                                <ul class="footer-contacts d-inline-block d-md-block">
                                    <li>
                                        <div class="unit unit-spacing-xs">
                                            <div class="unit-left"><span class="icon fa fa-phone"></span></div>
                                            <div class="unit-body"><a class="link-phone" href="tel:{{$tel_1}}">{{$tel_1}}</a></div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="unit unit-spacing-xs">
                                            <div class="unit-left">
                                                <span class="icon fa fa-inbox"></span>
                                            </div>
                                            <div class="unit-body">
                                                <p>{{$email}}</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="unit unit-spacing-xs">
                                            <div class="unit-left"><span class="icon fa fa-location-arrow"></span></div>
                                            <div class="unit-body"><a class="link-location" href="#"> {{$address}}</a></div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 col-xl-4">
                        <div class="oh-desktop">
                            <div class="inset-top-18">
                                <h5 class="text-spacing-75">عضویت در خبر نامه</h5>
                                <p>برای عضویت در خبر نامه ایمیل خود را وارد نمایید</p>
                                <form class="finarc-form finarc-mailform" data-form-output="form-output-global" data-form-type="subscribe" method="post" action="#">
                                    <div class="form-wrap">
                                        <input class="form-input" id="subscribe-form-5-email" type="email" name="email" data-constraints="@Email @Required">
                                        <label class="form-label" for="subscribe-form-5-email">ایمیل خود را وارد نمایید</label>
                                    </div>
                                    <button class="button button-block button-secondary button-ujarak" type="submit">عضویت</button>
                                </form>
                                <div class="group-lg group-middle">
                                    <p class="footer-social-list-title">مارا در شبکه های اجتماعی دنبال کنبد</p>
                                    <div>
                                        <ul class="list-inline list-inline-xs footer-social-list-2">
                                            @foreach(get_social() as $item)

                                                <li>
                                                    <a class="icon fa" href="{{$item->link}}">
                                                        <img style="height: 25px;border-radius: 50%" align="{{$item->title}}" src="{{$item->icon}}">
                                                    </a>
                                                </li>

                                            @endforeach

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xl-4">
                        <div class="oh-desktop">
                            <div class="inset-top-18">
                                <h5 class="text-spacing-75">گالری</h5>
                                <div class="row row-10 gutters-10">

                                    @foreach($footerGallery as $item)
                                    <div class="col-4 col-sm-2 col-lg-4">
                                        <article class="thumbnail thumbnail-mary">
                                            <div class="thumbnail-mary-figure"><img src="{{$item->thumb}}" alt="" style="width:128px;height:85px" /> </div>
                                            <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="{{$item->thumb}}" data-lightgallery="item"><img src="{{$item->thumb}}" alt="{{$item->title}}" width="370" height="303"></a> </div>
                                        </article>
                                    </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-variant-2-bottom-panel">
            <div class="container">
                <!-- Rights-->
                <div class="text-center">
                    <p class="rights"><span>&copy;&nbsp;</span><span class="copyright-year">{{ date('Y') }}</span> تمامی حقوق سایت مربوط به <span>{{$site->site_name}}</span> می باشد </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer section end -->
</div>
<!-- Javascript-->
<script src="{{theme_assets("assets/js/core.min.js")}}"></script>
<script src="{{theme_assets("assets/dist/color-switcher.js")}}"></script>
<script src="{{theme_assets("assets/dist/colorJS.js")}}"></script>
<script src="{{theme_assets("assets/js/script.js")}}"></script>

<!-- Common JS -->
<script src="/Themes/shared/js/loaders/pace.min.js"></script>
<script src="/Themes/shared/js/loaders/blockui.min.js"></script>
<script src="/Themes/shared/js/sweetalert2@8.js"></script>
@stack('script')
</body>

<!-- Mirrored from malikhassan.com/blog_designer/finarc/html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Mar 2021 04:03:11 GMT -->
</html>
