<?php

$post_meta = ResToModel($contact_info->post_meta);
$tel_1 = $post_meta["tel_1"];
$tel_2 = $post_meta["tel_2"];
$mobile = $post_meta["mobile"];
$address = $post_meta["address"];
$postal_code = $post_meta["postal_code"];
$fax = $post_meta["fax"];
$email = $post_meta["email"];
$latitude = $post_meta["latitude"];
$longitude = $post_meta["longitude"];
$dir = "rtl";
if (isset($locale)) {
    if ($locale != 'fa' && $locale != 'ar') {
        $dir = "ltr";
    }
}
?>
    <!DOCTYPE html>
<html>

<!-- Mirrored from expert-themes.com/html/global-industry/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Dec 2021 15:54:52 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title>{{$title}} | {{isset($post_title)?$post_title:$site->title}}</title>
    <!-- Font -->
    <link rel="stylesheet" href="{{theme_assets("assets/farsi_font/farsi-font.css")}}">
    <!-- Stylesheets -->
    <link href="{{theme_assets("assets/css/bootstrap.css")}}" rel="stylesheet">
    <link href="{{theme_assets("assets/plugins/revolution/css/settings.css")}}" rel="stylesheet" type="text/css">
    <!-- REVOLUTION SETTINGS STYLES -->
    <link href="{{theme_assets("assets/plugins/revolution/css/layers.css")}}" rel="stylesheet" type="text/css">
    <!-- REVOLUTION LAYERS STYLES -->
    <link href="{{theme_assets("assets/plugins/revolution/css/navigation.css")}}" rel="stylesheet" type="text/css">
    <!-- REVOLUTION NAVIGATION STYLES -->

    <link href="{{theme_assets("assets/css/style." . $dir .".css")}}" rel="stylesheet">
    <link href="{{theme_assets("assets/css/responsive." . $dir .".css")}}" rel="stylesheet">
    <!--Color Switcher Mockup-->
    <link href="{{theme_assets("assets/css/color-switcher-design.css")}}" rel="stylesheet">

    <!--Color Themes-->
    <link id="theme-color-file" href="{{theme_assets("assets/css/color-themes/blue-theme.css")}}" rel="stylesheet">

    <link rel="shortcut icon" href="{{theme_assets("assets/images/favicon.png")}}" type="image/x-icon">
    <link rel="icon" href="{{theme_assets("assets/images/favicon.png")}}" type="image/x-icon">

    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="{{theme_assets("assets/js/respond.js")}}"></script><![endif]-->

    @stack('styles')
    <style>
        div#main-content-area table td {
            border: 1px solid #bbb;
            padding: 8px;
        }
    </style>
</head>

<body>

<div class="page-wrapper">

    <!-- Preloader -->
{{--    <div class="preloader"></div>--}}

<!-- Main Header-->
    <header class="main-header">

        <!--Header Top-->
        <div class="header-top">
            <div class="auto-container">
                <div class="clearfix">
                    <!--Top right-->
                    <div class="top-right pull-right">
                        <ul class="clearfix">
                            <li>Let's be a part of Filtration-Separation solutions
                            </li>
                            <li><span class="fa fa-phone"></span>
                                @if(!empty($tel_1) && !is_null($tel_1))
                                    {{$tel_1}}
                                @endif
                            </li>
                        </ul>
                    </div>
                    <!--Top left-->
                    <div class="top-left pull-left">
                        <ul class="social-nav">
                            {{--                            <li><a href="/fa"><span>FA</span></a></li>--}}
                            {{--                            <li><span>|</span></li>--}}
                            {{--                            <li><a href="/en"><span>EN</span></a></li>--}}


                            {{--                            <li><a href="#"><span class="fa fa-google-plus"></span></a></li>--}}
                            {{--                            <li><a href="#"><span class="fa fa-pinterest-p"></span></a></li>--}}
                            {{--                            <li><a href="#"><span class="fa fa-dribbble"></span></a></li>--}}
                        </ul>
                        <!-- Search -->
                        <div class="search-box">
                            <form method="post" action="https://expert-themes.com/html/global-industry/contact.html">
                                <div class="form-group">
                                    <input type="search" name="search-field" value="" placeholder="Search" required>
                                    <button type="submit"><span class="icon fa fa-search"></span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Header-Upper-->
        <div class="header-upper">
            <div class="auto-container">
                <div class="clearfix">

                    <div class="pull-right logo-box">
                        <div class="logo"><a href="/{{$locale}}"><img src="{{$site->header_logo}}" alt=""
                                                                      title="{{$site->site_name}}"></a>
                        </div>
                    </div>

                    <div class="pull-left upper-left clearfix">

                        <!--Info Box-->
                        <div class="upper-column info-box">
                            <div class="icon-box"><span class="flaticon-stamp"></span></div>
                            <ul>
                                <li><strong>Certified Company</strong></li>
                                <li>ISO 9001/14001/18001</li>
                            </ul>
                        </div>

                        <!--Info Box-->
                    {{--                        <div class="upper-column info-box">--}}
                    {{--                            <div class="icon-box"><span class="flaticon-trophy-silhouette"></span></div>--}}
                    {{--                            <ul>--}}
                    {{--                                <li><strong>Great Industrial</strong></li>--}}
                    {{--                                <li>Solution Provider</li>--}}
                    {{--                            </ul>--}}
                    {{--                        </div>--}}

                    <!--Info Box-->
                        <div class="upper-column info-box">
                            <div class="icon-box"><span class="flaticon-earth-globe"></span></div>
                            <ul>
                                @if(!empty($address) && !is_null($address))
                                    <li><strong>{{trans('home.address')}}</strong></li>
                                    <li>{{$address}}</li>
                                @endif

                            </ul>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <!--End Header Upper-->

        <!--Header Lower-->
        <div class="header-lower">

            <div class="auto-container">
                <div class="nav-outer clearfix">
                    <!-- Main Menu -->
                    <nav class="main-menu navbar-expand-md">
                        <div class="navbar-header">
                            <!-- Toggle Button -->
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>

                        <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
                            {{--nav menu --}}
                            @include("home::shared.nav_menu",["menus"=>$menu])
                            {{--end nave menu --}}
                        </div>
                    </nav>
                    <!-- Main Menu End-->
                    <div class="outer-box clearfix">
                        <div class="advisor-box">
                            <a href="#" class="theme-btn advisor-btn"><span>Deylaman Filter</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Header Lower-->

        <!--Sticky Header-->
        <div class="sticky-header">
            <div class="auto-container clearfix">
                <!--Logo-->
                <div class="logo pull-right">
                    <a href="/{{$locale}}" class="img-responsive"><img src="{{$site->header_logo}}" alt=""
                                                                       title="{{$site->site_name}}"></a>
                </div>

                <!--left Col-->
                <div class="left-col pull-left">
                    <!-- Main Menu -->
                    <nav class="main-menu navbar-expand-md">
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1"
                                aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent1">
                            {{--nav menu --}}
                            @include("home::shared.nav_menu_responsive",["menus_responsive"=>$menu])
                            {{--                            <ul class="navigation clearfix">--}}
                            {{--                                <li class="current dropdown"><a href="#">Home</a>--}}
                            {{--                                    <ul>--}}
                            {{--                                        <li><a href="index-2.html">Home Page 01</a></li>--}}
                            {{--                                        <li><a href="index-3.html">Home Page 02</a></li>--}}
                            {{--                                        <li><a href="index-4.html">Home Page 03</a></li>--}}
                            {{--                                        <li class="dropdown"><a href="#">Header Styles</a>--}}
                            {{--                                            <ul>--}}
                            {{--                                                <li><a href="index-2.html">Header Style One</a></li>--}}
                            {{--                                                <li><a href="index-3.html">Header Style Two</a></li>--}}
                            {{--                                                <li><a href="index-4.html">Header Style Three</a></li>--}}
                            {{--                                            </ul>--}}
                            {{--                                        </li>--}}
                            {{--                                    </ul>--}}
                            {{--                                </li>--}}
                            {{--                                <li class="dropdown"><a href="#">About</a>--}}
                            {{--                                    <ul>--}}
                            {{--                                        <li><a href="about.html">About Us</a></li>--}}
                            {{--                                        <li><a href="team.html">Team</a></li>--}}
                            {{--                                        <li><a href="team-single.html">Team Single</a></li>--}}
                            {{--                                        <li><a href="testimonials.html">Testimonial</a></li>--}}
                            {{--                                        <li><a href="faq.html">FAQ's</a></li>--}}
                            {{--                                        <li><a href="comming-soon.html">Coming Soon</a></li>--}}
                            {{--                                    </ul>--}}

                            {{--                                </li>--}}
                            {{--                                <li class="dropdown"><a href="#">Solutions</a>--}}
                            {{--                                    <ul>--}}
                            {{--                                        <li><a href="solutions.html">Solutions</a></li>--}}
                            {{--                                        <li><a href="chemical-enginering.html">Chemical Engineering</a></li>--}}
                            {{--                                        <li><a href="energy-power.html">Energy & Power Engineering</a></li>--}}
                            {{--                                        <li><a href="oil-gas.html">Oil & Gas Engineering</a></li>--}}
                            {{--                                        <li><a href="civil.html">Civil Engineering</a></li>--}}
                            {{--                                        <li><a href="agriculture.html">Agriculture Engineering</a></li>--}}
                            {{--                                        <li><a href="mechanical.html">Mechanical Engineering</a></li>--}}
                            {{--                                    </ul>--}}
                            {{--                                </li>--}}
                            {{--                                <li class="dropdown"><a href="#">Projects</a>--}}
                            {{--                                    <ul>--}}
                            {{--                                        <li><a href="projects.html">Our projects</a></li>--}}
                            {{--                                        <li><a href="projects-detail.html">Projects Details</a></li>--}}
                            {{--                                    </ul>--}}
                            {{--                                </li>--}}
                            {{--                                <li class="dropdown has-mega-menu"><a href="#">Pages</a>--}}
                            {{--                                    <div class="mega-menu">--}}
                            {{--                                        <div class="mega-menu-bar row clearfix">--}}
                            {{--                                            <div class="column col-md-3 col-sm-3 col-xs-12">--}}
                            {{--                                                <h3>About Us</h3>--}}
                            {{--                                                <ul>--}}
                            {{--                                                    <li><a href="team.html">Team</a></li>--}}
                            {{--                                                    <li><a href="team-single.html">Team Single</a></li>--}}
                            {{--                                                    <li><a href="testimonials.html">Testimonial</a></li>--}}
                            {{--                                                    <li><a href="faq.html">FAQ's</a></li>--}}
                            {{--                                                    <li><a href="comming-soon.html">Coming Soon</a></li>--}}
                            {{--                                                </ul>--}}
                            {{--                                            </div>--}}
                            {{--                                            <div class="column col-md-3 col-sm-3 col-xs-12">--}}
                            {{--                                                <h3>Solutions</h3>--}}
                            {{--                                                <ul>--}}
                            {{--                                                    <li><a href="solutions.html">Solutions</a></li>--}}
                            {{--                                                    <li><a href="chemical-enginering.html">Chemical Engineering</a></li>--}}
                            {{--                                                    <li><a href="energy-power.html">Energy & Power Engineering</a></li>--}}
                            {{--                                                    <li><a href="oil-gas.html">Oil & Gas Engineering</a></li>--}}
                            {{--                                                    <li><a href="civil.html">Civil Engineering</a></li>--}}
                            {{--                                                </ul>--}}
                            {{--                                            </div>--}}
                            {{--                                            <div class="column col-md-3 col-sm-3 col-xs-12">--}}
                            {{--                                                <h3>Blog</h3>--}}
                            {{--                                                <ul>--}}
                            {{--                                                    <li><a href="blog.html">Blog Three Column</a></li>--}}
                            {{--                                                    <li><a href="blog-list-view.html">Blog List View</a></li>--}}
                            {{--                                                    <li><a href="blog-modern.html">Blog Modern View</a></li>--}}
                            {{--                                                    <li><a href="blog-classic.html">Blog with Sidebar</a></li>--}}
                            {{--                                                    <li><a href="blog-detail.html">Blog Post Details</a></li>--}}
                            {{--                                                </ul>--}}
                            {{--                                            </div>--}}
                            {{--                                            <div class="column col-md-3 col-sm-3 col-xs-12">--}}
                            {{--                                                <h3>Shop</h3>--}}
                            {{--                                                <ul>--}}
                            {{--                                                    <li><a href="shop.html">Shop</a></li>--}}
                            {{--                                                    <li><a href="shop-single.html">Product Details</a></li>--}}
                            {{--                                                    <li><a href="shoping-cart.html">Cart Page</a></li>--}}
                            {{--                                                    <li><a href="checkout.html">Checkout Page</a></li>--}}
                            {{--                                                    <li><a href="login.html">Registration Page</a></li>--}}
                            {{--                                                </ul>--}}
                            {{--                                            </div>--}}
                            {{--                                        </div>--}}
                            {{--                                    </div>--}}
                            {{--                                </li>--}}
                            {{--                                <li class="dropdown"><a href="#">Blog</a>--}}
                            {{--                                    <ul>--}}
                            {{--                                        <li><a href="blog.html">Blog Three Column</a></li>--}}
                            {{--                                        <li><a href="blog-list-view.html">Blog List View</a></li>--}}
                            {{--                                        <li><a href="blog-modern.html">Blog Modern View</a></li>--}}
                            {{--                                        <li><a href="blog-classic.html">Blog with Sidebar</a></li>--}}
                            {{--                                        <li><a href="blog-detail.html">Blog Post Details</a></li>--}}
                            {{--                                        <li><a href="error-page.html">404 Page</a></li>--}}
                            {{--                                    </ul>--}}
                            {{--                                </li>--}}
                            {{--                                <li class="dropdown"><a href="#">Shop</a>--}}
                            {{--                                    <ul>--}}
                            {{--                                        <li><a href="shop.html">Shop</a></li>--}}
                            {{--                                        <li><a href="shop-single.html">Product Details</a></li>--}}
                            {{--                                        <li><a href="shoping-cart.html">Cart Page</a></li>--}}
                            {{--                                        <li><a href="checkout.html">Checkout Page</a></li>--}}
                            {{--                                        <li><a href="login.html">Registration Page</a></li>--}}
                            {{--                                    </ul>--}}
                            {{--                                </li>--}}
                            {{--                                <li><a href="contact.html">Contact us</a></li>--}}
                            {{--                            </ul>--}}
                            {{--end nave menu --}}
                        </div>
                    </nav><!-- Main Menu End-->
                </div>

            </div>
        </div>
        <!--End Sticky Header-->

    </header>
    <!--End Main Header -->

    <!--Main Slider-->
    @if(isset($has_slider))
        <section class="main-slider">

            <div class="rev_slider_wrapper fullwidthbanner-container" id="rev_slider_one_wrapper" data-source="gallery">
                <div class="rev_slider fullwidthabanner" id="rev_slider_one" data-version="5.4.1">
                    <ul>
                        @foreach($sliders as $item)
                            <li data-description="Slide Description" data-easein="default" data-easeout="default"
                                data-fsmasterspeed="1500" data-fsslotamount="7" data-fstransition="fade"
                                data-hideafterloop="0"
                                data-hideslideonmobile="off" data-index="rs-1687" data-masterspeed="default"
                                data-param1=""
                                data-param10="" data-param2="" data-param3="" data-param4="" data-param5=""
                                data-param6=""
                                data-param7="" data-param8="" data-param9="" data-rotate="0" data-saveperformance="off"
                                data-slotamount="default" data-thumb="{{$item->photo}}"
                                data-title="Slide Title" data-transition="parallaxvertical">
                                <img alt="" class="rev-slidebg" data-bgfit="cover" data-bgparallax="10"
                                     data-bgposition="center center" data-bgrepeat="no-repeat" data-no-retina=""
                                     src="{{$item->photo}}">

                                <div class="tp-caption"
                                     data-paddingbottom="[0,0,0,0]"
                                     data-paddingright="[0,0,0,0]"
                                     data-paddingleft="[0,0,0,0]"
                                     data-paddingtop="[0,0,0,0]"
                                     data-responsive_offset="on"
                                     data-type="text"
                                     data-height="none"
                                     data-width="['720','720','650','450']"
                                     data-whitespace="normal"
                                     data-hoffset="['15','15','15','15']"
                                     data-voffset="['-100','-110','-70','-75']"
                                     data-x="['right','right','right','right']"
                                     data-y="['middle','middle','middle','middle']"
                                     data-textalign="['top','top','top','top']"
                                     data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'>
                                    <h2>{{$item->title}} </h2>
                                </div>

                                <div class="tp-caption tp-resizeme"
                                     data-paddingbottom="[0,0,0,0]"
                                     data-paddingright="[0,0,0,0]"
                                     data-paddingleft="[0,0,0,0]"
                                     data-paddingtop="[0,0,0,0]"
                                     data-responsive_offset="on"
                                     data-type="text"
                                     data-height="none"
                                     data-whitespace="normal"
                                     data-width="['550','720','650','450']"
                                     data-hoffset="['15','15','15','15']"
                                     data-voffset="['30','15','20','5']"
                                     data-x="['right','right','right','right']"
                                     data-y="['middle','middle','middle','middle']"
                                     data-textalign="['top','top','top','top']"
                                     data-frames='[{"from":"x:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'>
                                    <div class="text">
                                        {{$item->sub_title}}
                                    </div>
                                </div>

                                <div class="tp-caption tp-resizeme"
                                     data-paddingbottom="[0,0,0,0]"
                                     data-paddingright="[0,0,0,0]"
                                     data-paddingleft="[0,0,0,0]"
                                     data-paddingtop="[0,0,0,0]"
                                     data-responsive_offset="on"
                                     data-type="text"
                                     data-height="none"
                                     data-width="['720','720','650','450']"
                                     data-whitespace="normal"
                                     data-hoffset="['15','15','15','15']"
                                     data-voffset="['125','110','100','95']"
                                     data-x="['right','right','right','right']"
                                     data-y="['middle','middle','middle','middle']"
                                     data-textalign="['top','top','top','top']"
                                     data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'>
                                    {{--                                    <a href="/" class="theme-btn btn-style-one">Learn More</a>--}}
                                </div>

                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </section>
@endif
<!--End Main Slider-->

@yield("breadcrumb")
@yield("body")

<!--Map Section-->
{{--    <section class="map-section">--}}
{{--        <div class="auto-container">--}}
{{--            <!--Map Outer-->--}}
{{--            <div id="map" class="map-outer">--}}
{{--                <!--Map Canvas-->--}}
{{--                                <iframe--}}
{{--                                    src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d3239.1886114245167!2d51.41852461549032!3d35.72157963536496!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x3f8e016791f585bd%3A0x897d46b1da51d01f!2sTehran%20Province%2C%20Tehran%2C%20District%206%2C%20Qaem%20Maqam-e-Farahani%2C%20Iran!3m2!1d35.7215753!2d51.420713299999996!5e0!3m2!1sen!2sus!4v1641745212672!5m2!1sen!2sus"--}}
{{--                                    height="500" style="border:0;">--}}
{{--                                </iframe>--}}
{{--            </div>--}}

{{--            <!--Map Info Box-->--}}
{{--            <div class="map-info-box">--}}
{{--                <div class="info-inner">--}}
{{--                    <!--List Style Two-->--}}
{{--                    <ul class="list-style-two">--}}

{{--                        @if(!empty($tel_1) && !is_null($tel_1))--}}
{{--                            <li><span class="icon flaticon-telephone"></span><strong>{{$tel_1}}</strong>--}}
{{--                                @if(!empty($tel_2) && !is_null($tel_2))--}}
{{--                                    {{$tel_2}}--}}
{{--                                @endif--}}
{{--                            </li>--}}
{{--                        @endif--}}

{{--                        @if(!empty($email) && !is_null($email))--}}
{{--                            <li><span class="icon flaticon-note"></span><strong>{{$email}}</strong>--}}
{{--                                پاسخگویی به صورت تمام وقت--}}
{{--                            </li>--}}
{{--                        @endif--}}
{{--                        @if(!empty($address) && !is_null($address))--}}
{{--                            <li><span class="icon fa fa-map-marker"></span>{{$address}}--}}
{{--                                <strong>...</strong>--}}
{{--                            </li>--}}
{{--                        @endif--}}
{{--                    </ul>--}}

{{--                </div>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </section>--}}
<!--End Map Section-->
{{--    <footer class="main-footer" style="background-image:url({{theme_assets("assets/images/background/5.jpg")}})">--}}
<!--Main Footer-->
    <footer class="main-footer"
            style="background-image:url({{theme_assets("assets/images/background/footer-back.jpg")}})">
        <div class="auto-container">

            <!--Widgets Section-->
            <div class="widgets-section">
                <div class="row clearfix">

                    <!--big column-->
                    <div class="big-column col-lg-6 col-md-12 col-sm-12">
                        <div class="row clearfix">

                            <!--Footer Column-->
                            <div class="footer-column col-lg-7 col-md-6 col-sm-12">
                                <div class="footer-widget logo-widget">
                                    <div class="logo">
                                        <a href="/{{$locale}}"><img src="{{$site->footer_logo}}" alt=""/></a>
                                    </div>
                                    {{--                                    <div class="text">{{$site->description}}</div>--}}
                                </div>
                            </div>

                            <!--Footer Column-->
                            {{--                            <div class="footer-column col-lg-5 col-md-6 col-sm-12">--}}
                            {{--                                <div class="footer-widget links-widget">--}}
                            {{--                                    <div class="footer-title">--}}
                            {{--                                        <h2>{{trans('home.shortcut_links')}}</h2>--}}
                            {{--                                    </div>--}}
                            {{--                                    <ul class="footer-lists">--}}

                            {{--                                        <li><a href="/{{$locale}}/about-us">{{trans('home.about_us')}}</a></li>--}}
                            {{--                                        <li><a href="/{{$locale}}/products">{{trans('home.products')}}</a></li>--}}
                            {{--                                        <li><a href="/{{$locale}}/certificates">{{trans('home.certificates')}}</a></li>--}}
                            {{--                                        <li><a href="/{{$locale}}/contact-us">{{trans('home.contact_info')}}</a></li>--}}
                            {{--                                    </ul>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}

                        </div>
                    </div>

                    <!--big column-->
                    <div class="big-column col-lg-6 col-md-12 col-sm-12">
                        <div class="row clearfix">

                            <!--Footer Column-->
                        {{--                            <div class="footer-column col-lg-6 col-md-6 col-sm-12">--}}
                        {{--                                <div class="footer-widget news-widget">--}}
                        {{--                                    <div class="footer-title">--}}
                        {{--                                        <h2>{{trans('home.last_posts')}}</h2>--}}
                        {{--                                    </div>--}}
                        {{--                                    <div class="widget-content">--}}
                        {{--                                        @foreach(post_get::get_last_post(2) as $item)--}}
                        {{--                                            <article class="post">--}}
                        {{--                                                <figure class="post-thumb"><a--}}
                        {{--                                                        href="/{{$locale}}{{$item->link_address}}"><img--}}
                        {{--                                                            src="{{$item->thumb}}" alt=""></a></figure>--}}
                        {{--                                                <div class="text"><a--}}
                        {{--                                                        href="/{{$locale}}{{$item->link_address}}">{{$item->title}}</a>--}}
                        {{--                                                </div>--}}
                        {{--                                                <ul class="post-info">--}}
                        {{--                                                    <li><span class="icon fa fa-calendar"></span>{{$item->reg_date}}--}}
                        {{--                                                    </li>--}}
                        {{--                                                    --}}{{--                                                    <li><span class="icon fa fa-comment-o"></span>25</li>--}}
                        {{--                                                </ul>--}}
                        {{--                                            </article>--}}
                        {{--                                        @endforeach--}}

                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}

                        <!--Footer Column-->
                            <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                                <div class="footer-widget subscribe-widget">
                                    {{--                                    <div class="footer-title">--}}
                                    {{--                                        <h2>{{trans('home.contact_info')}}</h2>--}}
                                    {{--                                    </div>--}}
                                    <div class="widget-content">
                                        {{--                                        <div class="text">{{trans('home.contact_info')}} </div>--}}
                                        <ul class="list-style-two">

                                            @if(!empty($tel_1) && !is_null($tel_1))
                                                <li>
{{--                                                    <span class="icon flaticon-telephone"></span>--}}
                                                    {{--                                                    تلفن :--}}
                                                    <strong>
                                                        {{$tel_1}}
                                                        @if(!empty($tel_2) && !is_null($tel_2))
                                                            / {{$tel_2}}
                                                        @endif
                                                    </strong>

                                                </li>

                                            @endif

                                            @if(!empty($email) && !is_null($email))
                                                <li>
{{--                                                    <span class="icon flaticon-note"></span>--}}
                                                    {{--                                                    ایمیل :--}}
                                                    <strong>
                                                        {{$email}}
                                                    </strong>
                                                </li>

                                            @endif
                                            @if(!empty($address) && !is_null($address))
                                                    <li>
{{--                                                        <span class="icon fa fa-map-marker"> </span>--}}
{{--                                                        آدرس :--}}
                                                        <strong>
                                                            {{$address}}
                                                        </strong>
                                                    </li>
                                                @endif
                                                @if(!empty($postal_code) && !is_null($postal_code))
                                                    <li>
                                                        {{--                                                        <span class="icon fa fa-map-marker"> </span>--}}
                                                        {{--                                                        آدرس :--}}
                                                        <strong>
                                                            کد پستی :   {{$postal_code}}
                                                        </strong>
                                                    </li>
                                                @endif
                                        </ul>
                                        {{--                                        <ul class="social-icon-two">--}}
                                        {{--                                            <li class="follow">{{trans('home.socialNetwork')}} :</li>--}}
                                        {{--                                       --}}

                                        {{--                                            @foreach(get_social() as $item)--}}
                                        {{--                                                <li><a href="{{$item->link}}" title="{{$item->title}}"><img--}}
                                        {{--                                                            style="height: 25px;border-radius: 50%"--}}
                                        {{--                                                            src="{{$item->icon}}"></a></li>--}}
                                        {{--                                            @endforeach--}}

                                        {{--                                        </ul>--}}
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>
        <div class="footer-bottom">
            <div class="auto-container">
                <div class="copyleft">&copy; {{date("Y")}}. {{trans('home.copy_rights')}}</div>
            </div>
        </div>
    </footer>
    <!--End Main Footer-->

</div>
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="icon fa fa-angle-double-up"></span></div>

<!-- Color Palate / Color Switcher -->
<div class="color-palate">
    <div class="color-trigger">
        <i class="fa fa-gear"></i>
    </div>
    <div class="color-palate-head">
        <h6>رنگ دلخواه خود را انتخاب نمایید</h6>
    </div>
    <div class="various-color clearfix">
        <div class="colors-list">
            <span class="palate default-color "
                  data-theme-file="{{theme_assets("assets/css/color-themes/default-theme.css")}}"></span>
            <span class="palate teal-color active"
                  data-theme-file="{{theme_assets("assets/css/color-themes/teal-theme.css")}}"></span>
            <span class="palate green-color"
                  data-theme-file="{{theme_assets("assets/css/color-themes/green-theme.css")}}"></span>
            <span class="palate aqua-color"
                  data-theme-file="{{theme_assets("assets/css/color-themes/aqua-theme.css")}}"></span>
            <span class="palate pink-color"
                  data-theme-file="{{theme_assets("assets/css/color-themes/pink-theme.css")}}"></span>
            <span class="palate orange-color"
                  data-theme-file="{{theme_assets("assets/css/color-themes/orange-theme.css")}}"></span>
            <span class="palate lime-color"
                  data-theme-file="{{theme_assets("assets/css/color-themes/lime-theme.css")}}"></span>
            <span class="palate red-color"
                  data-theme-file="{{theme_assets("assets/css/color-themes/red-theme.css")}}"></span>
        </div>
    </div>
    <div class="various-color clearfix">
        <ul class="rtl-version option-box">
            <li class="rtl">نسخه راست چین</li>
            <li>نسخه چپ چین</li>
        </ul>
    </div>
    <div class="palate-foo">
        <span>تم رنگی دلخواه خود را به راحتی انتخاب نمایید.</span>
    </div>

</div>
<!-- /.End Of Color Palate -->

<script src="{{theme_assets("assets/js/jquery.js")}}"></script>
<!--Revolution Slider-->
<script src="{{theme_assets("assets/plugins/revolution/js/jquery.themepunch.revolution.min.js")}}"></script>
<script src="{{theme_assets("assets/plugins/revolution/js/jquery.themepunch.tools.min.js")}}"></script>
<script src="{{theme_assets("assets/plugins/revolution/js/extensions/revolution.extension.actions.min.js")}}"></script>
<script src="{{theme_assets("assets/plugins/revolution/js/extensions/revolution.extension.carousel.min.js")}}"></script>
<script src="{{theme_assets("assets/plugins/revolution/js/extensions/revolution.extension.kenburn.min.js")}}"></script>
<script
    src="{{theme_assets("assets/plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js")}}"></script>
<script
    src="{{theme_assets("assets/plugins/revolution/js/extensions/revolution.extension.migration.min.js")}}"></script>
<script
    src="{{theme_assets("assets/plugins/revolution/js/extensions/revolution.extension.navigation.min.js")}}"></script>
<script src="{{theme_assets("assets/plugins/revolution/js/extensions/revolution.extension.parallax.min.js")}}"></script>
<script
    src="{{theme_assets("assets/plugins/revolution/js/extensions/revolution.extension.slideanims.min.js")}}"></script>
<script src="{{theme_assets("assets/plugins/revolution/js/extensions/revolution.extension.video.min.js")}}"></script>
<script src="{{theme_assets("assets/js/main-slider-script.js")}}"></script>

<script src="{{theme_assets("assets/js/popper.min.js")}}"></script>
<script src="{{theme_assets("assets/js/bootstrap.min.js")}}"></script>
<script src="{{theme_assets("assets/js/jquery.mCustomScrollbar.concat.min.js")}}"></script>
<script src="{{theme_assets("assets/js/jquery.fancybox.js")}}"></script>
<script src="{{theme_assets("assets/js/owl.js")}}"></script>
<script src="{{theme_assets("assets/js/wow.js")}}"></script>
<script src="{{theme_assets("assets/js/appear.js")}}"></script>
<script src="{{theme_assets("assets/js/isotope.js")}}"></script>
<script src="{{theme_assets("assets/js/jquery-ui.js")}}"></script>
<script src="{{theme_assets("assets/js/script.js")}}"></script>
<!--Google Map APi Key-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCIJ_QKHN-bi6_1C9f5eYE3pZs1zhQIo5o"></script>
<script src="{{theme_assets("assets/js/map-script.js")}}"></script>
<!--End Google Map APi-->
<!--Color Switcher-->
<script src="{{theme_assets("assets/js/color-settings.js")}}"></script>

<script src="{{theme_assets("assets/plugins/loaders/pace.min.js")}}"></script>
<script src="{{theme_assets("assets/plugins/loaders/blockui.min.js")}}"></script>
<script src="{{theme_assets("assets/plugins/sweetalert2@8.js")}}"></script>

@stack('script')
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.3/leaflet.js"></script>--}}
<script>
    $(document).ready(function(){
        var mainContentArea = $('#main-content-area').html();
        if(mainContentArea !==undefined) {
            var mainContentEnNumber =   fixNumbers(mainContentArea);
            $('#main-content-area').html(mainContentEnNumber);
        }
    });

    var
        persianNumbers = [/۰/g, /۱/g, /۲/g, /۳/g, /۴/g, /۵/g, /۶/g, /۷/g, /۸/g, /۹/g],
        arabicNumbers  = [/٠/g, /١/g, /٢/g, /٣/g, /٤/g, /٥/g, /٦/g, /٧/g, /٨/g, /٩/g],
        fixNumbers = function (str)
        {
            if(typeof str === 'string')
            {
                for(var i=0; i<10; i++)
                {
                    str = str.replace(persianNumbers[i], i).replace(arabicNumbers[i], i);
                }
            }
            return str;
        };
</script>

</body>

<!-- Mirrored from expert-themes.com/html/global-industry/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Dec 2021 15:54:52 GMT -->
</html>
