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


<!-- Mirrored from www.designesia.com/themes/archi-main/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Mar 2021 03:44:59 GMT -->
<head>
    <meta charset="utf-8">
    <title>{{$title}} | {{isset($post_title)?$post_title:$site->title}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{isset($post_desc)?$post_desc: $site->description}}">
    <meta name="keywords" content="{{isset($post_keywords)?$post_keywords:$site->keywords}}">
    <meta name="author" content="">


    <!--[if lt IE 9]>
    <script src="{{theme_assets("assets/js/html5shiv.js")}}"></script>
    <![endif]-->


    <!-- CSS Files
    ================================================== -->
    <link rel="stylesheet" href="/Themes/shared/css/farsi_font/farsi-font.css"   type="text/css" />
    <link rel="stylesheet" href="{{theme_assets("assets/css/bootstrap.css")}}" type="text/css">
    <link rel="stylesheet" href="{{theme_assets("assets/css/jpreloader.css")}}" type="text/css">
    <link rel="stylesheet" href="{{theme_assets("assets/css/animate.css")}}" type="text/css">
    <link rel="stylesheet" href="{{theme_assets("assets/css/plugin.rtl.css")}}" type="text/css">
    <link rel="stylesheet" href="{{theme_assets("assets/css/owl.carousel.css")}}" type="text/css">
    <link rel="stylesheet" href="{{theme_assets("assets/css/owl.theme.css")}}" type="text/css">
    <link rel="stylesheet" href="{{theme_assets("assets/css/owl.transitions.css")}}" type="text/css">
    <link rel="stylesheet" href="{{theme_assets("assets/css/magnific-popup.css")}}" type="text/css">
    <link rel="stylesheet" href="{{theme_assets("assets/css/style.rtl.css")}}" type="text/css">

    <!-- custom background -->
    <link rel="stylesheet" href="{{theme_assets("assets/css/bg.css")}}" type="text/css">

    <!-- color scheme -->
    <link rel="stylesheet" href="{{theme_assets("assets/css/colors/yellow.css")}}" type="text/css" id="colors">
    <link rel="stylesheet" href="{{theme_assets("assets/css/color.css")}}" type="text/css">

    <!-- load fonts -->
    <link rel="stylesheet" href="{{theme_assets("assets/fonts/font-awesome/css/font-awesome.css")}}" type="text/css">
    <link rel="stylesheet" href="{{theme_assets("assets/fonts/elegant_font/HTML_CSS/style.css")}}" type="text/css">
    <link rel="stylesheet" href="{{theme_assets("assets/fonts/et-line-font/style.css")}}" type="text/css">

    <!-- revolution slider -->
    <link rel="stylesheet" href="{{theme_assets("assets/rs-plugin/css/settings.css")}}" type="text/css">
    <link rel="stylesheet" href="{{theme_assets("assets/css/rev-settings.css")}}" type="text/css">
</head>

<body id="homepage">

<div id="wrapper">

    <!-- header begin -->
    <header>
        <div class="info">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="column">Working Hours Monday - Friday <span class="id-color"><strong>08:00-16:00</strong></span></div>
                        <div class="column">Toll Free <span class="id-color"><strong>1800.899.900</strong></span></div>
                        <!-- social icons -->
                        <div class="column social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-rss"></i></a>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                            <a href="#"><i class="fa fa-envelope-o"></i></a>
                        </div>
                        <!-- social icons close -->
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- logo begin -->
                    <div id="logo">
                        <a href="/{{$locale}}">
                            <img class="logo" src="{{$site->header_logo}}" alt="{{$site->site_name}}">
                        </a>
                    </div>
                    <!-- logo close -->

                    <!-- small button begin -->
                    <span id="menu-btn"></span>
                    <!-- small button close -->

                    <!-- mainmenu begin -->
                    {{--nav menu --}}
                    @include("home::shared.nav_menu",["menus"=>$menu])
                    {{--end nave menu --}}
                    <!-- mainmenu close -->
                    <!-- mainmenu close -->
                    @if (env('SHOP_ACTIVATE') == '1')
                    <div id='de-extra-menu'>
                        <a class="d-cart-icon" href="/{{$locale}}/cart">
                            <i class="fa fa-shopping-basket"></i>
                            @if(isset($cart))
                            <span id="cart_items_count" class="d-cart-icon-count">
                                {{count($cart)}}
                            </span>
                            @else
                                <span id="cart_items_count" class="d-cart-icon-count">0</span>
                            @endif
                        </a>
                    </div>
                    @endif

                </div>


            </div>
        </div>
    </header>
    <!-- header close -->


    <!-- content begin -->
    <div id="content" class="no-bottom no-top">

        <!-- revolution slider begin -->
        @if(isset($has_slider))
            <!-- SLIDER START -->
            @include("home::shared._slider",["sliders"=>$sliders])
        @endif
        <!-- revolution slider close -->

        @yield("breadcrumb")
        @yield("body")

        <!-- footer begin -->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <img src="{{$site->footer_logo}}" class="logo-small" alt="{{$site->site_name}}"><br>
                        {{$site->description}}
                    </div>

                    <div class="col-md-3">
                        <div class="widget widget_recent_post">
                            <h3>آخرین مطالب</h3>
                            <ul>
                                @foreach(post_get::get_last_post(4) as $item)
                                    <li><a href="/{{$locale}}{{$item->link_address}}">  {{$item->title}}    </a></li>
                                @endforeach
{{--                                <li><a href="#">5 Things That Take a Room from Good to Great</a></li>--}}
{{--                                <li><a href="#">Functional and Stylish Wall-to-Wall Shelves</a></li>--}}
{{--                                <li><a href="#">9 Unique and Unusual Ways to Display Your TV</a></li>--}}
{{--                                <li><a href="#">The 5 Secrets to Pulling Off Simple, Minimal Design</a></li>--}}
{{--                                <li><a href="#">How to Make a Huge Impact With Multiples</a></li>--}}
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <h3>تماس باما</h3>
                        <div class="widget widget-address">
                            <address>
                                <span>{{$address}}</span>
                                <span>{{$tel_1}}<strong>تلفن </strong></span>
                                <span>{{$fax}}<strong>فکس</strong></span>
                                <span><a href="mailto:{{$email}}">{{$email}}</a><strong>ایمیل</strong></span>
                                <span><a href="#">{{$mobile}}</a><strong>موبایل</strong></span>
                            </address>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="widget widget_recent_post">
                            <h3>لینکهای مفید</h3>
                            <ul>
                                <li><a href="/{{$locale}}/services">خدمات</a></li>
                                <li><a href="/{{$locale}}/portfolio">نمونه کار</a></li>
                                <li><a href="https://shop.aranelectronic.ir">فروشگاه</a></li>
                                <li><a href="/{{$locale}}/about_us">درباره ما</a></li>
                                <li><a href="/{{$locale}}/contact_us">تماس با ما</a></li>
                                @if (Auth::check())
                                    <li><a class="orange" href="/customer">
                                        <strong>
                                            پنل کاربر
                                        </strong>
                                        </a></li>
                                    <li><a  class="red" href="/home/logout">خروج</a></li>
                                @else
                                    <li><a href="/{{$locale}}/login"> ورود به سیستم</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="subfooter">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            © {{ date('Y') }} تمامی حقوق سایت مربوط به <span class="id-color">{{$site->site_name}}</span> می باشد
                        </div>
                        <div class="col-md-6 text-right">
                            <div class="social-icons">
                                @foreach(get_social() as $item)
                                    <a href="{{$item->link}}" data-toggle="tooltip" data-placement="left"
                                       title="{{$item->title}}">
                                        <img style="height: 25px;border-radius: 50%" src="{{$item->icon}}">
                                    </a>
                                @endforeach
{{--                                <a href="#"><i class="fa fa-facebook fa-lg"></i></a>--}}
{{--                                <a href="#"><i class="fa fa-twitter fa-lg"></i></a>--}}
{{--                                <a href="#"><i class="fa fa-rss fa-lg"></i></a>--}}
{{--                                <a href="#"><i class="fa fa-google-plus fa-lg"></i></a>--}}
{{--                                <a href="#"><i class="fa fa-skype fa-lg"></i></a>--}}
{{--                                <a href="#"><i class="fa fa-dribbble fa-lg"></i></a>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="#" id="back-to-top"></a>
        </footer>
        <!-- footer close -->
    </div>
</div>

<!-- style switcher
================================================== -->


<div id="switcher">
    <span class="custom-close"></span>
    <span class="custom-show"></span>

    <span class="sw-title">Header Style</span>
    <select name="switcher" id="de-header-style">
        <option value="opt-1" selected>Solid</option>
        <option value="opt-2">Transparent</option>
    </select>

    <div class="clearfix"></div>

    <span class="sw-title">Header Color</span>
    <select name="switcher" id="de-header-color">
        <option value="opt-1" selected>Dark</option>
        <option value="opt-2">Light</option>
    </select>

    <div class="clearfix"></div>

    <span class="sw-title">Header Layout</span>
    <select name="switcher" id="de-header-layout">
        <option value="opt-1" selected>Simple</option>
        <option value="opt-2">Extended</option>
    </select>

    <div class="clearfix"></div>

    <span class="sw-title">Menu Style</span>
    <select name="switcher" id="de-menu">
        <option value="opt-1" selected>Dotted Separator</option>
        <option value="opt-2">Line Separator</option>
        <option value="opt-3">Circle Separator</option>
        <option value="opt-4">Square Separator</option>
        <option value="opt-5">Plus Separator</option>
        <option value="opt-6">Strip Separator</option>
        <option value="opt-0">No Separator</option>
    </select>

    <div class="clearfix"></div>

    <span class="sw-title">Color :</span>
    <ul id="de-color">
        <li class="bg1"></li>
        <li class="bg2"></li>
        <li class="bg3"></li>
        <li class="bg4"></li>
        <li class="bg5"></li>
        <li class="bg6"></li>
        <li class="bg7"></li>
        <li class="bg8"></li>
        <li class="bg9"></li>
        <li class="bg10"></li>
    </ul>
</div>

{{--<div id="purchase-now">--}}
{{--    <a href="https://themeforest.net/item/archi-interior-design-website-template/10940889"><span>$</span>20</a>--}}
{{--    <div class="pn-hover">Buy Now</div>--}}
{{--</div>--}}

<!-- Javascript Files
================================================== -->
<script src="{{theme_assets("assets/js/jquery.min.js")}}"></script>
<script src="{{theme_assets("assets/js/jpreLoader.js")}}"></script>
<script src="{{theme_assets("assets/js/bootstrap.min.js")}}"></script>
<script src="{{theme_assets("assets/js/jquery.isotope.min.js")}}"></script>
<script src="{{theme_assets("assets/js/easing.js")}}"></script>
<script src="{{theme_assets("assets/js/jquery.flexslider-min.js")}}"></script>
<script src="{{theme_assets("assets/js/jquery.scrollto.js")}}"></script>
<script src="{{theme_assets("assets/js/owl.carousel.js")}}"></script>
<script src="{{theme_assets("assets/js/jquery.countTo.js")}}"></script>
<script src="{{theme_assets("assets/js/classie.js")}}"></script>
<script src="{{theme_assets("assets/js/video.resize.js")}}"></script>
<script src="{{theme_assets("assets/js/validation.js")}}"></script>
<script src="{{theme_assets("assets/js/wow.min.js")}}"></script>
<script src="{{theme_assets("assets/js/jquery.magnific-popup.min.js")}}"></script>
<script src="{{theme_assets("assets/js/jquery.stellar.min.js")}}"></script>
<script src="{{theme_assets("assets/js/enquire.min.js")}}"></script>
<script src="{{theme_assets("assets/js/cookit.js")}}"></script>
<script src="{{theme_assets("assets/js/designesia.js")}}"></script>

<!-- SLIDER REVOLUTION SCRIPTS  -->
<script src="{{theme_assets("assets/rs-plugin/js/jquery.themepunch.plugins.min.js")}}"></script>
<script src="{{theme_assets("assets/rs-plugin/js/jquery.themepunch.revolution.min.js")}}"></script>

<!-- Common JS -->
<script src="/Themes/shared/js/loaders/pace.min.js"></script>
<script src="/Themes/shared/js/loaders/blockui.min.js"></script>
<script src="/Themes/shared/js/sweetalert2@8.js"></script>
<script src="/admin_assets/custom/general.js"></script>
<!-- COOKIES PLUGIN  -->
<script>
    $(document).ready(function() {
        $.cookit({
            backgroundColor: '#1c1c1c',
            messageColor: '#fff',
            linkColor: '#fad04c',
            buttonColor: '#fad04c',
            messageText: "This website uses <b>cookies</b> to ensure you get the best experience on our website.",
            linkText: "Learn more",
            linkUrl: "index.html",
            buttonText: "I accept",
        });
    });
</script>

@stack('script')

</body>


<!-- Mirrored from www.designesia.com/themes/archi-main/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Mar 2021 03:48:27 GMT -->
</html>
