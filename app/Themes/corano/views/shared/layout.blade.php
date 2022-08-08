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
<html class="no-js" lang="en">


<!-- Mirrored from demo.hasthemes.com/naw3-preview/corano/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Oct 2019 16:52:31 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>{{$title}} | {{isset($post_title)?$post_title:$site->title}}    </title>
    <meta name="description" content="{{isset($post_desc)?$post_desc: $site->description}}">
    <meta name="keywords" content="{{isset($post_keywords)?$post_keywords:$site->keywords}}">
    @yield("post_meta")

    @isset($AjaxToken)
        <meta name="csrf-token" content="{{ csrf_token() }}"/>
    @endisset

    @include('home::shared.progressive_meta')
    <link rel="stylesheet" href="{{theme_assets("assets/farsi_font/farsi-font.css")}}">
    <meta name="robots" content="noindex, follow"/>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="apple-touch-icon" href="{{$site->favicon}}">
    <link rel="shortcut icon" href="{{$site->favicon}}">

    <!-- CSS
	============================================ -->
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,900" rel="stylesheet">
    <link rel="stylesheet" href="{{theme_assets("assets/farsi_font/farsi-font.css")}}">
    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="{{theme_assets("assets/css/vendor/bootstrap.min.css")}}">
    <!-- Pe-icon-7-stroke CSS -->
    <link rel="stylesheet" href="{{theme_assets("assets/css/vendor/pe-icon-7-stroke.css")}}">
    <!-- Font-awesome CSS -->
    <link rel="stylesheet" href="{{theme_assets("assets/css/vendor/font-awesome.min.css")}}">
    <!-- Slick slider css -->
    <link rel="stylesheet" href="{{theme_assets("assets/css/plugins/slick.min.css")}}">
    <!-- animate css -->
    <link rel="stylesheet" href="{{theme_assets("assets/css/plugins/animate.css")}}">
    <!-- Nice Select css -->
    <link rel="stylesheet" href="{{theme_assets("assets/css/plugins/nice-select.css")}}">
    <!-- jquery UI css -->
    <link rel="stylesheet" href="{{theme_assets("assets/css/plugins/jqueryui.min.css")}}">
    <!-- main style css -->
    <link rel="stylesheet" href="{{theme_assets("assets/css/style.fa.css")}}">
    <link rel="stylesheet" href="{{theme_assets("assets/css/custom.fa.css")}}">
    <link href="/admin_assets/ckeditor/plugins/codesnippet/lib/highlight/styles/pojoaque.css" rel="stylesheet">
    <script src="/admin_assets/ckeditor/plugins/codesnippet/lib/highlight/highlight.pack.js"></script>
    <style>
        .tm-breadcrumb-area {
            background-color: {{$site->header_color}};
        }
    </style>
</head>

<body>
<!-- Start Header Area -->
<header class="header-area header-wide">
    <!-- main header start -->
    <div class="main-header d-none d-lg-block">
        <!-- header top start -->
        <div class="header-top bdr-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="welcome-message">
                            <p>
                                <span><a href="tel:{{$tel_1}}"><i class="fa fa-phone"></i> {{$tel_1}} </a></span>
                                <span><a href="mailto:{{$email}}"><i class="fa fa-envelope-o"></i> {{$email}} </a>
                                </span>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 text-left">
                        <div class="header-top-settings">
                            <ul class="nav align-items-center justify-content-end">

                                <li><i class="fa fa-clock-o"></i>{{m_jdate("l d F Y")}}</li>
{{--                                <li><i class="fa fa-clock-o"></i>{{date("l d F Y")}}</li>--}}

                                <li class="language">
                                    <img src="{{theme_assets("assets/img/icon/en.png")}}" alt="flag"> English
                                    <i class="fa fa-angle-down"></i>
                                    <ul class="dropdown-list">
                                        <li><a href="#"><img src="{{theme_assets("assets/img/icon/en.png")}}" alt="flag"> english</a></li>
                                        <li><a href="#"><img src="{{theme_assets("assets/img/icon/fr.png")}}" alt="flag"> french</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- header top end -->

        <!-- header middle area start -->
        <div class="header-main-area sticky">
            <div class="container">
                <div class="row align-items-center position-relative">

                    <!-- start logo area -->
                    <div class="col-lg-2">
                        <div class="logo">
                            <a href="/">
                                <img src="{{$site->header_logo}}" alt="{{$site->site_name}}" >
                            </a>
                        </div>
                    </div>
                    <!-- start logo area -->

                    <!-- main menu area start -->
                    <div class="col-lg-8 position-static">
                        <div class="main-menu-area">
                            <div class="main-menu">
                                <!-- main menu navbar start -->
                                @include("home::shared.nav_menu",["menus"=>$menu])
                                <!-- main menu navbar end -->
                            </div>
                        </div>
                    </div>
                    <!-- main menu area end -->

                    <!-- mini cart area start -->
                    <div class="col-lg-2">
                        <div
                            class="header-left d-flex align-items-center justify-content-xl-between justify-content-lg-end">
                            <div class="header-search-container">
                                <button class="search-trigger d-xl-none d-lg-block"><i class="pe-7s-search"></i>
                                </button>
                                <form class="header-search-box d-lg-none d-xl-block animated jackInTheBox">
                                    <input type="text" placeholder="جستجو در سایت"
                                           class="header-search-field">
                                    <button class="header-search-btn"><i class="pe-7s-search"></i></button>
                                </form>
                            </div>
                            <div class="header-configure-area">
                                <ul class="nav justify-content-end">
{{--                                    <li class="user-hover">--}}
{{--                                        <a href="#">--}}
{{--                                            <i class="pe-7s-user"></i>--}}
{{--                                        </a>--}}
{{--                                        <ul class="dropdown-list">--}}
{{--                                            <li><a href="login-register.html">login</a></li>--}}
{{--                                            <li><a href="login-register.html">register</a></li>--}}
{{--                                            <li><a href="my-account.html">my account</a></li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="wishlist.html">--}}
{{--                                            <i class="pe-7s-like"></i>--}}
{{--                                            <div class="notification">0</div>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="#" class="minicart-btn">--}}
{{--                                            <i class="pe-7s-shopbag"></i>--}}
{{--                                            <div class="notification">2</div>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- mini cart area end -->

                </div>
            </div>
        </div>
        <!-- header middle area end -->
    </div>
    <!-- main header start -->

    <!-- mobile header start -->
    <div class="mobile-header d-lg-none d-md-block sticky">
        <!--mobile header top start -->
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="mobile-main-header">
                        <div class="mobile-logo">
                            <a href="index.html">
                                <img src="{{$site->header_logo}}" alt="{{$site->site_name}}">
                            </a>
                        </div>
                        <div class="mobile-menu-toggler">
{{--                            <div class="mini-cart-wrap">--}}
{{--                                <a href="cart.html">--}}
{{--                                    <i class="pe-7s-shopbag"></i>--}}
{{--                                    <div class="notification">0</div>--}}
{{--                                </a>--}}
{{--                            </div>--}}
                            <button class="mobile-menu-btn">
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- mobile header top start -->
    </div>
    <!-- mobile header end -->
    <!-- off-canvas mobile menu start -->
    <aside class="off-canvas-wrapper">
        <div class="off-canvas-overlay"></div>
        <div class="off-canvas-inner-content">
            <div class="btn-close-off-canvas">
                <i class="pe-7s-close"></i>
            </div>

            <div class="off-canvas-inner">
                <!-- search box start -->
                <div class="search-box-offcanvas">
                    <form>
                        <input type="text" placeholder="عبارت جستجو...">
                        <button class="search-btn"><i class="pe-7s-search"></i></button>
                    </form>
                </div>
                <!-- search box end -->

                <!-- mobile menu start -->
                <div class="mobile-navigation">
                <!-- mobile menu navigation start -->
                @include("home::shared.nav_menu_mobile",["mobile_menus"=>$menu])
                <!-- mobile menu navigation end -->
                </div>
                <!-- mobile menu end -->

{{--                <div class="mobile-settings">--}}
{{--                    <ul class="nav">--}}
{{--                        <li>--}}
{{--                            <div class="dropdown mobile-top-dropdown">--}}
{{--                                <a href="#" class="dropdown-toggle" id="currency" data-toggle="dropdown"--}}
{{--                                   aria-haspopup="true" aria-expanded="false">--}}
{{--                                    Currency--}}
{{--                                    <i class="fa fa-angle-down"></i>--}}
{{--                                </a>--}}
{{--                                <div class="dropdown-menu" aria-labelledby="currency">--}}
{{--                                    <a class="dropdown-item" href="#">$ USD</a>--}}
{{--                                    <a class="dropdown-item" href="#">$ EURO</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <div class="dropdown mobile-top-dropdown">--}}
{{--                                <a href="#" class="dropdown-toggle" id="myaccount" data-toggle="dropdown"--}}
{{--                                   aria-haspopup="true" aria-expanded="false">--}}
{{--                                    My Account--}}
{{--                                    <i class="fa fa-angle-down"></i>--}}
{{--                                </a>--}}
{{--                                <div class="dropdown-menu" aria-labelledby="myaccount">--}}
{{--                                    <a class="dropdown-item" href="my-account.html">my account</a>--}}
{{--                                    <a class="dropdown-item" href="login-register.html"> login</a>--}}
{{--                                    <a class="dropdown-item" href="login-register.html">register</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
                <!-- offcanvas widget area start -->
                <div class="offcanvas-widget-area">
                    <div class="off-canvas-contact-widget">
                        <ul>
                            <li><i class="fa fa-mobile"></i>
                                <a href="#">{{$tel_1}}</a>
                            </li>
                            <li><i class="fa fa-envelope-o"></i>
                                <a href="#">{{$email}}</a>
                            </li>
                        </ul>
                    </div>
                    <div class="off-canvas-social-widget">
                        @foreach(get_social() as $item)
                            <a href="{{$item->link}}" data-toggle="tooltip" data-placement="left"
                               title="{{$item->title}}">
                                <img style="height: 25px;border-radius: 50%" src="{{$item->icon}}">
                            </a>
                        @endforeach
                    </div>
                </div>
                <!-- offcanvas widget area end -->
            </div>
        </div>
    </aside>
    <!-- off-canvas mobile menu end -->
</header>
<!-- end Header Area -->


<main>
@if(isset($has_slider))
    <!-- hero slider area start -->
    <section class="slider-area">
        <div class="hero-slider-active slick-arrow-style slick-arrow-style_hero slick-dot-style">
        @foreach($sliders as $item)
            <!-- single slider item start -->
            <div class="hero-single-slide hero-overlay">
                <div class="hero-slider-item bg-img" data-bg="{{$item->photo}}">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="hero-slider-content slide-{{$item->id}}">
                                    <h2 class="slide-title"><span>{{$item->title}}</span></h2>
                                    <h4 class="slide-desc">{{$item->sub_title}}</h4>
                                    @if($item->link !=null)
                                    <a href="{{$item->link}}" class="btn btn-hero">مطالب بیشتر</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- single slider item start -->
        @endforeach

        </div>
    </section>
    <!-- hero slider area end -->
@endif

 <!-- twitter feed area start -->
{{--    <div class="twitter-feed">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-12">--}}
{{--                    <div class="twitter-feed-content text-center">--}}
{{--                        <p>{{$site->description}} </p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <!-- twitter feed area end -->

    <!-- service policy area start -->
{{--    <div class="service-policy section-padding">--}}
{{--        <div class="container">--}}
{{--            <div class="row mtn-30">--}}
{{--                <div class="col-sm-6 col-lg-3">--}}
{{--                    <div class="policy-item">--}}
{{--                        <div class="policy-icon">--}}
{{--                            <i class="pe-7s-plane"></i>--}}
{{--                        </div>--}}
{{--                        <div class="policy-content">--}}
{{--                            <h6>Free Shipping</h6>--}}
{{--                            <p>Free shipping all order</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-sm-6 col-lg-3">--}}
{{--                    <div class="policy-item">--}}
{{--                        <div class="policy-icon">--}}
{{--                            <i class="pe-7s-help2"></i>--}}
{{--                        </div>--}}
{{--                        <div class="policy-content">--}}
{{--                            <h6>Support 24/7</h6>--}}
{{--                            <p>Support 24 hours a day</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-sm-6 col-lg-3">--}}
{{--                    <div class="policy-item">--}}
{{--                        <div class="policy-icon">--}}
{{--                            <i class="pe-7s-back"></i>--}}
{{--                        </div>--}}
{{--                        <div class="policy-content">--}}
{{--                            <h6>Money Return</h6>--}}
{{--                            <p>30 days for free return</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-sm-6 col-lg-3">--}}
{{--                    <div class="policy-item">--}}
{{--                        <div class="policy-icon">--}}
{{--                            <i class="pe-7s-credit"></i>--}}
{{--                        </div>--}}
{{--                        <div class="policy-content">--}}
{{--                            <h6>100% Payment Secure</h6>--}}
{{--                            <p>We ensure secure payment</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <!-- service policy area end -->



    @yield("breadcrumb")
    @yield("body")
</main>
<br/>
<br/>
<!-- Scroll to top start -->
<div class="scroll-top not-visible">
    <i class="fa fa-angle-up"></i>
</div>
<!-- Scroll to Top End -->

<!-- footer area start -->
<footer class="footer-widget-area">
    <div class="footer-top section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="widget-item">
                        <div class="widget-title">
                            <div class="widget-logo">
                                <a href="/{{$locale}}">
                                    <img src="{{$site->footer_logo}}" alt="brand logo">
                                </a>
                            </div>
                        </div>
                        <div class="widget-body">
                            <p>{{$site->description}} </p>
                        </div>
                    </div>
                </div>


                <div class="col-lg-3 col-md-6">
                    <div class="widget-item">
                        <h6 class="widget-title">اطلاعات تماس </h6>
                        <div class="widget-body">
                            <address class="contact-block">
                                <ul>
                                    <li><i class="pe-7s-home"></i> {{$address}}</li>
                                    <li><i class="pe-7s-mail"></i> <a href="mailto:demo@plazathemes.com">{{$email}} </a>
                                    </li>
                                    <li><i class="pe-7s-call"></i> <a href="tel:{{$tel_1}}">{{$tel_1}}</a></li>
                                </ul>
                            </address>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="widget-item">
                        <h6 class="widget-title">دسترسی سریع</h6>
                        <div class="widget-body">
                            <ul class="info-list">
                                <li><a href="#">درباره ما</a></li>
                                <li><a href="#">قوانین و مقررات</a></li>
                                <li><a href="#">تماس با ما</a></li>
                                <li><a href="#">نقشه سایت</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="widget-item">
                        <h6 class="widget-title">ما را دنبال کنید</h6>
                        <div class="widget-body social-link">
                            @foreach(get_social() as $item)
                                <a href="{{$item->link}}" data-toggle="tooltip" data-placement="left"
                                   title="{{$item->title}}">
                                    <img style="height: 25px;border-radius: 50%" src="{{$item->icon}}">
                                </a>
                            @endforeach
{{--                            <a href="#"><i class="fa fa-facebook"></i></a>--}}
{{--                            <a href="#"><i class="fa fa-twitter"></i></a>--}}
{{--                            <a href="#"><i class="fa fa-instagram"></i></a>--}}
{{--                            <a href="#"><i class="fa fa-youtube"></i></a>--}}
                        </div>
                    </div>
                </div>
            </div>
{{--            <div class="row align-items-center mt-20">--}}
{{--                <div class="col-md-6">--}}
{{--                    <div class="newsletter-wrapper">--}}
{{--                        <h6 class="widget-title-text"> ثبت نام در خبرنامه</h6>--}}
{{--                        <form class="newsletter-inner" id="mc-form">--}}
{{--                            <input type="email" class="news-field" id="mc-email" autocomplete="off"--}}
{{--                                   placeholder="ایمیل خود را وارد نمایید">--}}
{{--                            <button class="news-btn" id="mc-submit">ثبت نام</button>--}}
{{--                        </form>--}}
{{--                        <!-- mailchimp-alerts Start -->--}}
{{--                        <div class="mailchimp-alerts">--}}
{{--                            <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->--}}
{{--                            <div class="mailchimp-success"></div><!-- mailchimp-success end -->--}}
{{--                            <div class="mailchimp-error"></div><!-- mailchimp-error end -->--}}
{{--                        </div>--}}
{{--                        <!-- mailchimp-alerts end -->--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-md-6">--}}
{{--                    <div class="footer-payment">--}}
{{--                        <img src="Themes/corano/assets/img/payment.png" alt="payment method">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="copyright-text text-center">
                        <p>تمامی حقوق سایت متعلق به شرکت <a href="#">نو آوران البرز </a>می باشد.  © 2021</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer area end -->

<!-- Quick view modal start -->
<div class="modal" id="quick_view">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" id="item_details" >

            </div>
        </div>
    </div>
</div>
<!-- Quick view modal end -->

<!-- offcanvas mini cart start -->
<div class="offcanvas-minicart-wrapper">
    <div class="minicart-inner">
        <div class="offcanvas-overlay"></div>
        <div class="minicart-inner-content">
            <div class="minicart-close">
                <i class="pe-7s-close"></i>
            </div>
            <div class="minicart-content-box">
                <div class="minicart-item-wrapper">
                    <ul>
                        <li class="minicart-item">
                            <div class="minicart-thumb">
                                <a href="product-details.html">
                                    <img src="Themes/corano/assets/img/cart/cart-1.jpg" alt="product">
                                </a>
                            </div>
                            <div class="minicart-content">
                                <h3 class="product-name">
                                    <a href="product-details.html">Dozen White Botanical Linen Dinner Napkins</a>
                                </h3>
                                <p>
                                    <span class="cart-quantity">1 <strong>&times;</strong></span>
                                    <span class="cart-price">$100.00</span>
                                </p>
                            </div>
                            <button class="minicart-remove"><i class="pe-7s-close"></i></button>
                        </li>
                        <li class="minicart-item">
                            <div class="minicart-thumb">
                                <a href="product-details.html">
                                    <img src="Themes/corano/assets/img/cart/cart-2.jpg" alt="product">
                                </a>
                            </div>
                            <div class="minicart-content">
                                <h3 class="product-name">
                                    <a href="product-details.html">Dozen White Botanical Linen Dinner Napkins</a>
                                </h3>
                                <p>
                                    <span class="cart-quantity">1 <strong>&times;</strong></span>
                                    <span class="cart-price">$80.00</span>
                                </p>
                            </div>
                            <button class="minicart-remove"><i class="pe-7s-close"></i></button>
                        </li>
                    </ul>
                </div>

                <div class="minicart-pricing-box">
                    <ul>
                        <li>
                            <span>sub-total</span>
                            <span><strong>$300.00</strong></span>
                        </li>
                        <li>
                            <span>Eco Tax (-2.00)</span>
                            <span><strong>$10.00</strong></span>
                        </li>
                        <li>
                            <span>VAT (20%)</span>
                            <span><strong>$60.00</strong></span>
                        </li>
                        <li class="total">
                            <span>total</span>
                            <span><strong>$370.00</strong></span>
                        </li>
                    </ul>
                </div>

                <div class="minicart-button">
                    <a href="cart.html"><i class="fa fa-shopping-cart"></i> View Cart</a>
                    <a href="cart.html"><i class="fa fa-share"></i> Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- offcanvas mini cart end -->

<!-- JS
============================================ -->

<!-- Modernizer JS -->
<script src="{{theme_assets("assets/js/vendor/modernizr-3.6.0.min.js")}}"></script>
<!-- jQuery JS -->
<script src="{{theme_assets("assets/js/vendor/jquery-3.3.1.min.js")}}"></script>
<!-- Popper JS -->
<script src="{{theme_assets("assets/js/vendor/popper.min.js")}}"></script>
<!-- Bootstrap JS -->
<script src="{{theme_assets("assets/js/vendor/bootstrap.min.js")}}"></script>
<!-- slick Slider JS -->
<script src="{{theme_assets("assets/js/plugins/slick.min.js")}}"></script>
<!-- Countdown JS -->
<script src="{{theme_assets("assets/js/plugins/countdown.min.js")}}"></script>
<!-- Nice Select JS -->
<script src="{{theme_assets("assets/js/plugins/nice-select.min.js")}}"></script>
<!-- jquery UI JS -->
<script src="{{theme_assets("assets/js/plugins/jqueryui.min.js")}}"></script>
<!-- Image zoom JS -->
<script src="{{theme_assets("assets/js/plugins/image-zoom.min.js")}}"></script>
<!-- Imagesloaded JS -->
<script src="{{theme_assets("assets/js/plugins/imagesloaded.pkgd.min.js")}}"></script>
<!-- Instagram feed JS -->
<script src="{{theme_assets("assets/js/plugins/instagramfeed.min.js")}}"></script>
<!-- mailchimp active js -->
<script src="{{theme_assets("assets/js/plugins/ajaxchimp.js")}}"></script>
<!-- contact form dynamic js -->
<script src="{{theme_assets("assets/js/plugins/ajax-mail.js")}}"></script>
<!-- google map api -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfmCVTjRI007pC1Yk2o2d_EhgkjTsFVN8"></script>
<!-- google map active js -->
<script src="{{theme_assets("assets/js/plugins/google-map.js")}}"></script>
<!-- Validation JS -->
<script src="{{theme_assets("assets/plugin/validation/jquery.validate.min.js")}}"></script>

<!-- Common JS -->
<script src="{{theme_assets("assets/plugin/loaders/pace.min.js")}}"></script>
<script src="{{theme_assets("assets/plugin/loaders/blockui.min.js")}}"></script>
<script src="{{theme_assets("assets/plugin/sweetalert2@8.js")}}"></script>
<script src="/admin_assets/custom/general.js"></script>

<!-- Main JS -->
<script src="{{theme_assets("assets/js/main.js")}}"></script>

<script>hljs.initHighlightingOnLoad();</script>
@isset($AjaxToken)
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    </script>
@endisset

@stack('script')
</body>


<!-- Mirrored from demo.hasthemes.com/naw3-preview/corano/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Oct 2019 16:53:59 GMT -->
</html>
