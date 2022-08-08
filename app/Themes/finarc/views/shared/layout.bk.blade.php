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

    <!DOCTYPE html>
<html lang="en">
<!-- Mirrored from thewebmax.com/intoriza/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Apr 2021 17:15:27 GMT -->
<head>
    <!-- META -->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="keywords" content="{{isset($post_keywords)?$post_keywords:$site->keywords}}"/>
    <meta name="author" content=""/>
    <meta name="robots" content=""/>
    <meta name="description" content="{{isset($post_desc)?$post_desc: $site->description}}"/>
    @yield("post_meta")

    @isset($AjaxToken)
        <meta name="csrf-token" content="{{ csrf_token() }}"/>
    @endisset
<!-- FAVICONS ICON -->
    <link rel="icon" href="{{theme_assets("assets/images/favicon.ico")}}" type="image/x-icon"/>
    <link
        rel="shortcut icon"
        type="image/x-icon"
        href="{{theme_assets("assets/images/favicon.png")}}"
    />

    <!-- PAGE TITLE HERE -->
    <title>{{$title}} | {{isset($post_title)?$post_title:$site->title}}</title>

    <!-- MOBILE SPECIFIC -->
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

<!-- [if lt IE 9]>
    <script src="{{theme_assets("js/html5shiv.min.js")}}"></script>
    <script src="{{theme_assets("js/respond.min.js")}}"></script>
    <![endif] -->

    <!-- BOOTSTRAP STYLE SHEET -->
    <link
        rel="stylesheet"
        type="text/css"
        href="{{theme_assets("assets/css/bootstrap.rtl.css")}}"
    />
    <!-- FONTAWESOME STYLE SHEET -->

    <link
        rel="stylesheet"
        type="text/css"
        href="{{theme_assets("assets/farsi_font/farsi-font.css")}}"
    />
    <link
        rel="stylesheet"
        type="text/css"
        href="{{theme_assets("assets/css/fontawesome/css/font-awesome.min.css")}}"
    />

    <!-- OWL CAROUSEL STYLE SHEET -->
    <link
        rel="stylesheet"
        type="text/css"
        href="{{theme_assets("assets/css/owl.carousel.min.css")}}"
    />

    <!-- MAGNIFIC POPUP STYLE SHEET -->
    <link
        rel="stylesheet"
        type="text/css"
        href="{{theme_assets("assets/css/magnific-popup.min.css")}}"
    />
    <!-- LOADER STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="{{theme_assets("assets/css/loader.min.css")}}"/>
    <!-- MAIN STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="{{theme_assets("assets/css/style.rtl.css")}}"/>
    <!-- FLATICON STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="{{theme_assets("assets/css/flaticon.min.css")}}"/>
    <!-- THEME COLOR CHANGE STYLE SHEET -->
    <link
        rel="stylesheet"
        class="skin"
        type="text/css"
        href="{{theme_assets("assets/css/skin/skin-1.css")}}"
    />
    <!-- SIDE SWITCHER STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="{{theme_assets("assets/css/switcher.css")}}"/>

    <!-- REVOLUTION SLIDER CSS -->
    <link
        rel="stylesheet"
        type="text/css"
        href="{{theme_assets("assets/plugins/revolution/revolution/css/settings.css")}}"
    />
    <!-- REVOLUTION NAVIGATION STYLE -->
    <link
        rel="stylesheet"
        type="text/css"
        href="{{theme_assets("assets/plugins/revolution/revolution/css/navigation.css")}}"
    />

    <!-- GOOGLE FONTS -->
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,500i,600,600i,700,800,800i,900"
        rel="stylesheet"
    />
    <link
        href="https://fonts.googleapis.com/css?family=Martel:200,300,400,600,700,800,900"
        rel="stylesheet"
    />
    <link href="/admin_assets/ckeditor/plugins/codesnippet/lib/highlight/styles/pojoaque.css" rel="stylesheet">
    <script src="/admin_assets/ckeditor/plugins/codesnippet/lib/highlight/highlight.pack.js"></script>
    <!-- CUSTOM STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="{{theme_assets("assets/css/custom.css")}}"/>
</head>

<body>
<div class="page-wraper">
    <!-- HEADER START -->
    <header class="site-header header-style-1 nav-wide">
        <div class="sticky-header main-bar-wraper">
            <div class="main-bar bg-white">
                <div class="container header-center">
                    <div class="wt-header-left">
                        <div class="logo-header">
                            <div class="logo-header-inner logo-header-one">
                                <a href="index.html">
                                    <img
                                        src="{{theme_assets("assets/images/logo-dark.png")}}"
                                        width="171"
                                        height="49"
                                        alt=""
                                    />
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="wt-header-center">
                        <!-- NAV Toggle Button -->
                        <button
                            data-target=".header-nav"
                            data-toggle="collapse"
                            type="button"
                            class="navbar-toggle collapsed"
                        >
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <!-- MAIN Vav -->

                        {{--nav menu --}}
                        @include("home::shared.nav_menu",["menus"=>$menu])
                        {{--end nave menu --}}

                    </div>
                    <div class="wt-header-right">
                        <div class="bg-primary wt-header-right-child">
                            <!-- ETRA Nav -->
                            <div class="extra-nav">
                                <div class="extra-cell">
                                    <a href="#search" class="site-search-btn"
                                    ><i class="fa fa-search"></i
                                        ></a>
                                </div>
                            </div>
                            <!-- ETRA Nav -->
                            <div class="extra-nav">
                                <div class="extra-cell">
                                    <div class="right-arrow-btn">
                                        <button
                                            type="button"
                                            class="btn-open contact-slide-show text-white notification-animate"
                                        >
                                            <i class="fa fa-angle-left"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Contact Nav -->
                {{--                    @include("home::shared._contact_slide",["data"=>"data"])--}}
                <!-- Search popup -->
                    <div id="search">
                        <span class="close"></span>
                        <form
                            role="search"
                            id="searchform"
                            action="https://www.google.com/search"
                            method="get"
                            class="radius-xl"
                        >
                            <div class="input-group">
                                <input
                                    value=""
                                    name="q"
                                    type="search"
                                    placeholder="عبارت جستجو را وارد نمایید"
                                />
                                <span class="input-group-btn"
                                ><button type="button" class="search-btn">
                        <i class="fa fa-search"></i></button
                                    ></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- HEADER END -->

    <!-- CONTENT START -->
    <div class="page-content">
    @if(isset($has_slider))
        <!-- SLIDER START -->
        @include("home::shared._slider",["sliders"=>$sliders])
    @endif

    <!-- slider -->

        @yield("breadcrumb")
        @yield("body")


    </div>
    <!-- CONTENT END -->

    <!-- FOOTER START -->
    <footer class="site-footer footer-large footer-light footer-wide">
        <!-- FOOTER BLOCKES START -->
        <div class="footer-top overlay-wraper">
            <div class="overlay-main"></div>
            <div class="container">
                <div class="text-center">
                    <div class="footer-link">
                        <ul>
                            <li><a href="about-1.html" data-hover="About">درباره ما</a></li>
                            <li>
                                <a href="post-gallery.html" data-hover="Gallery">خدمات</a>
                            </li>
                            <li><a href="news-grid.html" data-hover="Blog">وبلاگ</a></li>
                            <li>
                                <a href="work-masonry.html" data-hover="Portfolio"
                                >نمونه کارها</a
                                >
                            </li>
                            <li>
                                <a href="contact-1.html" data-hover="Contact Us"
                                >تماس با ما</a
                                >
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <!-- ABOUT COMPANY -->
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <div class="widget text-center getin-touch">
                            <h4 class="widget-title">با ما در تماس باشید</h4>
                            <div class="widget-section">
                                <ul>
                                    <li>{{$email}}</li>
                                    <li>{{$tel_1}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- TAGS -->
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <div class="widget text-center widget_address m-b20">
                            <h4 class="widget-title">آدرس</h4>
                            <div class="widget-section">
                                <ul>
                                    <li>
                                        {{$address}}
                                    </li>
                                </ul>
                            </div>
                            <div class="footer-social-icon">
                                <ul class="social-icons f-social-link">
                                    <li>
                                        <a href="javascript:void(0);" class="fa fa-google"></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="fa fa-rss"></a>
                                    </li>
                                    <li>
                                        <a
                                            href="javascript:void(0);"
                                            class="fa fa-facebook"
                                        ></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="fa fa-twitter"></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- USEFUL LINKS -->
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <div class="widget text-center">
                            <h4 class="widget-title">درباره ما</h4>
                            <div class="widget-section">
                                <p>{{$site->description}}</p>
                            </div>
                        </div>
                    </div>

                    <!-- NEWSLETTER -->
                </div>
            </div>
        </div>
        <!-- FOOTER COPYRIGHT -->
        <div class="footer-bottom overlay-wraper">
            <div class="overlay-main"></div>
            <div class="container">
                <div class="row">
                    <div class="wt-footer-bot-center">
                <span class="copyrights-text"
                >© 2021 تمامی حقوق سایت مربوط به گروه صنعتی شیشه ایرانمهر می باشد</span
                >
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- FOOTER END -->

    <!-- BUTTON TOP START -->
    <button class="scroltop">
        <span class="fa fa-angle-up relative" id="btn-vibrate"></span>
    </button>
</div>

<!-- LOADING AREA START ===== -->
<div class="loading-area">
    <div class="loading-box"></div>
    <div class="loading-pic">
        <div class="cssload-box-loading"></div>
    </div>
</div>
<!-- LOADING AREA  END ====== -->

<!-- JAVASCRIPT  FILES ========================================= -->
<script src="{{theme_assets("assets/js/jquery-1.12.4.min.js")}}"></script>
<!-- JQUERY.MIN JS -->
<script src="{{theme_assets("assets/js/bootstrap.min.js")}}"></script>
<!-- BOOTSTRAP.MIN JS -->

<script src="{{theme_assets("assets/js/magnific-popup.min.js")}}"></script>
<!-- MAGNIFIC-POPUP JS -->

<script src="{{theme_assets("assets/js/waypoints.min.js")}}"></script>
<!-- WAYPOINTS JS -->
<script src="{{theme_assets("assets/js/counterup.min.js")}}"></script>
<!-- COUNTERUP JS -->
<script src="{{theme_assets("assets/js/waypoints-sticky.min.js")}}"></script>
<!-- COUNTERUP JS -->

<script src="{{theme_assets("assets/js/isotope.pkgd.min.js")}}"></script>
<!-- MASONRY  -->

<script src="{{theme_assets("assets/js/owl.carousel.min.js")}}"></script>
<!-- OWL  SLIDER  -->
<script src="{{theme_assets("assets/js/jquery.owl-filter.js")}}"></script>

<script src="{{theme_assets("assets/js/stellar.min.js")}}"></script>
<!-- PARALLAX BG IMAGE   -->

<script src="{{theme_assets("assets/js/custom.js")}}"></script>
<!-- CUSTOM FUCTIONS  -->
<script src="{{theme_assets("assets/js/shortcode.js")}}"></script>
<!-- SHORTCODE FUCTIONS  -->
<script src="{{theme_assets("assets/js/switcher.js")}}"></script>
<!-- SHORTCODE FUCTIONS  -->
<!-- REVOLUTION JS FILES -->

<script src="{{theme_assets("assets/plugins/revolution/revolution/js/jquery.themepunch.tools.min.js")}}"></script>
<script src="{{theme_assets("assets/plugins/revolution/revolution/js/jquery.themepunch.revolution.min.js")}}"></script>

<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
<script src="{{theme_assets("assets/plugins/revolution/revolution/js/extensions/revolution-plugin.js")}}"></script>

<!-- REVOLUTION SLIDER SCRIPT FILES -->
<script src="{{theme_assets("assets/js/rev-script-1.js")}}"></script>

<!-- Validation JS -->
<script src="{{theme_assets("assets/plugins/validation/jquery.validate.min.js")}}"></script>
<!-- Common JS -->
<script src="{{theme_assets("assets/plugins/loaders/pace.min.js")}}"></script>
<script src="{{theme_assets("assets/plugins/loaders/blockui.min.js")}}"></script>
<script src="{{theme_assets("assets/plugins/sweetalert2@8.js")}}"></script>

<!-- STYLE SWITCHER  ======= -->
<div class="styleswitcher">
    <div class="switcher-btn-bx">
        <a class="switch-btn">
            <span class="fa fa-cog fa-spin"></span>
        </a>
    </div>

    <div class="styleswitcher-inner">
        <h6 class="switcher-title">Color Skin</h6>
        <ul class="color-skins">
            <li>
                <a
                    class="theme-skin skin-1"
                    href="indexa39b.html?theme=css/skin/skin-1"
                    title="default Theme"
                ></a>
            </li>
            <li>
                <a
                    class="theme-skin skin-2"
                    href="index61e7.html?theme=css/skin/skin-2"
                    title="pink Theme"
                ></a>
            </li>
            <li>
                <a
                    class="theme-skin skin-3"
                    href="indexcce5.html?theme=css/skin/skin-3"
                    title="sky Theme"
                ></a>
            </li>
            <li>
                <a
                    class="theme-skin skin-4"
                    href="index13f7.html?theme=css/skin/skin-4"
                    title="green Theme"
                ></a>
            </li>
            <li>
                <a
                    class="theme-skin skin-5"
                    href="index19a6.html?theme=css/skin/skin-5"
                    title="red Theme"
                ></a>
            </li>
            <li>
                <a
                    class="theme-skin skin-6"
                    href="indexfe5c.html?theme=css/skin/skin-6"
                    title="orange Theme"
                ></a>
            </li>
        </ul>
    </div>
</div>
<!-- STYLE SWITCHER END ==== -->
</body>
@stack('script')
<!-- Mirrored from thewebmax.com/intoriza/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Apr 2021 17:15:54 GMT -->
</html>
