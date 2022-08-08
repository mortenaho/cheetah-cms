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
$dir="rtl";
if(isset($locale)){
    if($locale!='fa' && $locale!='ar'){
        $dir="ltr";
    }
}
?>
    <!DOCTYPE html>
<html lang="en">

<!-- Mirrored from zozothemes.com/html/mist/light/index-business.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 05 Feb 2020 15:04:01 GMT -->
<head>
    <meta charset="utf-8">
    <title>{{$title}} | {{isset($post_title)?$post_title:$site->title}}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="{{isset($post_keywords)?$post_keywords:$site->keywords}}">
    <meta name="description" content="{{isset($post_desc)?$post_desc: $site->description}}">
    <meta name="author" content="نوآوران البرز">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield("post_meta")

    @isset($AjaxToken)
        <meta name="csrf-token" content="{{ csrf_token() }}"/>
@endisset

<!-- Favicon -->
    <link rel="apple-touch-icon" href="{{$site->favicon}}">
    <link rel="shortcut icon" href="{{$site->favicon}}">

    <!-- Font -->
    <link rel="stylesheet" href="{{theme_assets("assets/farsi_font/farsi-font.css")}}">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Arimo:300,400,700,400italic,700italic'>
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
    <!-- Font Awesome Icons -->
    <link href='{{theme_assets("assets/css/font-awesome.min.css")}}' rel='stylesheet' type='text/css'/>
    <!-- Bootstrap core CSS -->
    <link href="{{theme_assets("assets/css/bootstrap.min.css")}}" rel="stylesheet">
    <link href="{{theme_assets("assets/css/hover-dropdown-menu.css")}}" rel="stylesheet">
    <!-- Icomoon Icons -->
    <link href="{{theme_assets("assets/css/icons.css")}}" rel="stylesheet">
    <!-- Revolution Slider -->
    <link href="{{theme_assets("assets/css/revolution-slider.css")}}" rel="stylesheet">
    <link href="{{theme_assets("assets/rs-plugin/css/settings.css")}}" rel="stylesheet">
    <!-- Animations -->
    <link href="{{theme_assets("assets/css/animate.min.css")}}" rel="stylesheet">

    <!-- Owl Carousel Slider -->
    <link href="{{theme_assets("assets/css/owl/owl.carousel.css")}}" rel="stylesheet">
    <link href="{{theme_assets("assets/css/owl/owl.theme.css")}}" rel="stylesheet">
    <link href="{{theme_assets("assets/css/owl/owl.transitions.css")}}" rel="stylesheet">
    <!-- PrettyPhoto Popup -->
    <link href="{{theme_assets("assets/css/prettyPhoto.css")}}" rel="stylesheet">
    <!-- Custom Style -->
    <link href="{{theme_assets("assets/css/style." . $dir .".css")}}" rel="stylesheet">
    <link href="{{theme_assets("assets/css/responsive.css")}}" rel="stylesheet">
    <!-- Color Scheme -->
    <link href="{{theme_assets("assets/css/color.css")}}" rel="stylesheet">

    <link href="/admin_assets/ckeditor/plugins/codesnippet/lib/highlight/styles/pojoaque.css" rel="stylesheet">
    <script src="/admin_assets/ckeditor/plugins/codesnippet/lib/highlight/highlight.pack.js"></script>

    <style>
        .tm-breadcrumb-area {
            background-color: {{$site->header_color}};
        }
    </style>

</head>
<body>
<div id="page">
    <!-- Page Loader -->
    <div id="pageloader">
        <div class="loader-item fa fa-spin text-color"></div>
    </div>

    <!-- Top Bar -->
    <div id="top-bar" class="top-bar-section top-bar-bg-color">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Top Language -->
                    <div class="top-contact link-hover-black">
                        <a href="/fa/">FA</a>
                        <span>|</span>
                        <a href="/en/">EN</a>
                    </div>
                    <!-- Top Contact -->
                    <div class="top-contact link-hover-black">
{{--                        <a href="/fa/">FA</a>--}}
{{--                        <span>|</span>--}}
{{--                        <a href="/en/">EN</a>--}}

                        <a href="tel:{{$tel_1}}"><i class="fa fa-phone"></i>{{$tel_1}}</a>
                        <a href="mailto:{{$email}}"><i class="fa fa-envelope"></i>{{$email}}</a>
                    </div>
                    <!-- Top Social Icon -->
                    <div class="top-social-icon icons-hover-black">
                        @foreach(get_social() as $item)
                            <a href="{{$item->link}}" data-toggle="tooltip" data-placement="left"
                               title="{{$item->title}}">
                                <img style="height: 25px;border-radius: 50%" src="{{$item->icon}}">
                            </a>
                        @endforeach
                        {{--                        <a href="#"><i class="fa fa-facebook"></i></a>--}}
                        {{--                        <a href="#"><i class="fa fa-twitter"></i></a>--}}
                        {{--                        <a href="#"><i class="fa fa-youtube"></i></a>--}}
                        {{--                        <a href="#"><i class="fa fa-dribbble"></i></a>--}}
                        {{--                        <a href="#"><i class="fa fa-linkedin"></i></a>--}}
                        {{--                        <a href="#"><i class="fa fa-github"></i></a>--}}
                        {{--                        <a href="#"><i class="fa fa-rss"></i></a>--}}
                        {{--                        <a href="#"><i class="fa fa-google-plus"></i></a>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Top Bar -->
    <!-- Sticky Navbar -->
    <header id="sticker" class="sticky-navigation">
        <!-- Sticky Menu -->
        <div class="sticky-menu relative">
            <!-- navbar -->
            <div class="navbar navbar-default navbar-bg-light" role="navigation">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="navbar-header">
                                <!-- Button For Responsive toggle -->
                                <button type="button" class="navbar-toggle" data-toggle="collapse"
                                        data-target=".navbar-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span></button>
                                <!-- Logo -->

                                <a class="navbar-brand" href="/{{$locale}}">
                                    <img class="site_logo" src="{{$site->header_logo}}" alt="{{$site->site_name}}"/>
                                </a></div>
                            <!-- Navbar Collapse -->
                            <div class="navbar-collapse collapse">
                                <!-- nav -->
                            {{--nav menu --}}
                            @include("home::shared.nav_menu",["menus"=>$menu])
                            {{--end nave menu --}}
                            <!-- Right nav -->
                                <!-- Header Contact Content -->
                                <div class="bg-white hide-show-content no-display header-contact-content">
                                    <p class="vertically-absolute-middle">Call Us
                                        <strong>{{$tel_1}}</strong></p>
                                    <button class="close">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                                <!-- Header Contact Content -->
                                <!-- Header Search Content -->
                                <div class="bg-white hide-show-content no-display header-search-content">
                                    <form role="search" class="navbar-form vertically-absolute-middle">
                                        <div class="form-group">
                                            <input type="text" placeholder="Enter your text &amp; Search Here"
                                                   class="form-control" id="s" name="s" value=""/>
                                        </div>
                                    </form>
                                    <button class="close">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                                <!-- Header Search Content -->
                                <!-- Header Share Content -->
                                <div class="bg-white hide-show-content no-display header-share-content">
                                    <div class="vertically-absolute-middle social-icon gray-bg icons-circle i-3x">
                                        <a href="#">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                        <a href="#">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                        <a href="#">
                                            <i class="fa fa-pinterest"></i>
                                        </a>
                                        <a href="#">
                                            <i class="fa fa-google"></i>
                                        </a>
                                        <a href="#">
                                            <i class="fa fa-linkedin"></i>
                                        </a></div>
                                    <button class="close">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                                <!-- Header Share Content -->
                            </div>
                            <!-- /.navbar-collapse -->
                        </div>
                        <!-- /.col-md-12 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container -->
            </div>
            <!-- navbar -->
        </div>
        <!-- Sticky Menu -->
    </header>
    <!-- Sticky Navbar -->
    <!-- slider -->
    @if(isset($has_slider))
        <section class="slider" id="home">

            {{--        <div id="main-slider" class="carousel">--}}
            {{--            <div data-ride="carousel" class="carousel slide carousel-fade" id="carousel-example-generic1">--}}
            {{--                <!-- Wrapper for slides -->--}}
            {{--                <div role="listbox" class="carousel-inner">--}}
            {{--                    @php--}}
            {{--                    $active = " active";--}}
            {{--                    @endphp--}}

            {{--                    @foreach($sliders as $item)--}}
            {{--                    <div class="item {{$active}}">--}}
            {{--                        <img width="1920" height="640" title="{{$item->title}}" alt="{{$item->title}}" src="{{$item->photo}}">--}}
            {{--                        <div class="carousel-caption text-right">--}}
            {{--                            <h1 class="upper animation animated-item-1 white text-right"><span class="text-color">{{$item->title}}</span><br>--}}
            {{--                                {{$item->sub_title}}--}}
            {{--                            </h1>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                    @php--}}
            {{--                        $active = "";--}}
            {{--                    @endphp--}}

            {{--                    @endforeach--}}

            {{--                </div>--}}
            {{--                <!-- Controls -->--}}
            {{--                <a data-slide="prev" role="button" href="#carousel-example-generic1" class="left carousel-control">--}}
            {{--                    <span aria-hidden="true" class="fa fa-angle-left fa-2x"></span>--}}
            {{--                    <span class="sr-only">Previous</span>--}}
            {{--                </a>--}}
            {{--                <a data-slide="next" role="button" href="#carousel-example-generic1" class="right carousel-control">--}}
            {{--                    <span aria-hidden="true" class="fa fa-angle-right fa-2x"></span>--}}
            {{--                    <span class="sr-only">Next</span>--}}
            {{--                </a>--}}
            {{--            </div>--}}
            {{--        </div>--}}

            <div class="tp-banner" style="height:450px !important;">
                <ul>
                @foreach($sliders as $item)
                    <!-- Slide -->
                        <li data-delay="7000" data-transition="fade" data-slotamount="7" data-masterspeed="2000">
                            <div class="elements">
                                <h2 class="tp-caption lft skewtotop title white text-shadow bold" data-x="12"
                                    data-y="200"
                                    data-speed="1000" data-start="1700" data-easing="Power4.easeOut" data-endspeed="500"
                                    data-endeasing="Power1.easeIn">
                                    <strong>
                                        <span class="text-color">{{$item->title}}</span>
                                        <br/> {{$item->sub_title}}</strong>
                                </h2>
                            </div>
                            <img src="{{$item->photo}}" alt="{{$item->title}}" data-bgfit="cover"
                                 data-bgposition="center top"
                                 data-bgrepeat="no-repeat"/>
                        </li>
                        <!-- Slide Ends -->
                    @endforeach
                </ul>
                <div class="tp-bannertimer"></div>
            </div>

        </section>

    @endif
<!-- slider -->

    @yield("breadcrumb")
    @yield("body")

    <div id="get-quote" class="bg-color get-a-quote black text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12" data-animation="pulse">
                    <a class="white" href="/{{$locale}}/contact_us">{{trans('home.keep_in_touch')}} </a>
                </div>
            </div>
        </div>
    </div>
    <!-- request -->
    <footer id="footer">
        <div class="footer-widget">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-3 widget bottom-xs-pad-20">
                        <div class="widget-title">
                            <!-- Footer Logo -->
                            <a href="/{{$locale}}" class="widget-info-logo">
                                <img src="{{$site->footer_logo}}" alt="footer logo">
                            </a>
                        </div>
                        <!-- Text -->
                        <p> {{$site->description}}</p>
                        <!-- Address -->
                        @if(!empty($address) && !is_null($address))
                            <p><strong>{{trans('home.address')}}:</strong>{{$address}}</p>
                        @endif
                        @if(!empty($tel_1) && !is_null($tel_1))
                            <p><strong>{{trans('home.phone_1')}} :</strong>  <a style="display: inline-flex;" href="tel:{{$tel_1}}">{{$tel_1}}</a>
                            </p>
                        @endif
                        @if(!empty($tel_2) && !is_null($tel_2))
                            <p><strong>{{trans('home.phone_2')}} :</strong> <a style="display: inline-flex;" href="tel:{{$tel_2}}">{{$tel_2}}</a>
                            </p>
                        @endif
                        @if(!empty($fax) && !is_null($fax))
                            <p><strong>{{trans('home.fax')}} :</strong><a style="display: inline-flex;" href="tel:{{$fax}}">{{$fax}}</a>
                            </p>
                        @endif
                        @if(!empty($email) && !is_null($email))
                            <p><strong>{{trans('home.email')}} :</strong><a href="mailto:{{$email}}">{{$email}}</a></p>
                        @endif

                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3 widget bottom-xs-pad-20">
                        <div class="widget-title">
                            <!-- Title -->
                            <h3 class="title">{{trans('home.shortcut_links')}}</h3>
                        </div>
                        <nav>
                            <ul>
                                <!-- List Items -->
                                <li><a href="/{{$locale}}/about-us">{{trans('home.about_us')}}</a></li>
                                <li><a href="/{{$locale}}/services">{{trans('home.services')}}</a></li>
                                <li><a href="/{{$locale}}/portfolio">{{trans('home.portfolio')}}</a></li>
                                <li><a href="/{{$locale}}/products">{{trans('home.products')}}</a></li>
                                <li><a href="/{{$locale}}/contact-us">{{trans('home.contact_info')}}</a></li>
                            </ul>
                        </nav>
                        <br>
{{--                        <div class="widget-title">--}}
{{--                            <!-- Title -->--}}
{{--                            <h3 class="title">My account</h3>--}}
{{--                        </div>--}}
{{--                        <nav>--}}
{{--                            <ul>--}}
{{--                                <!-- List Items -->--}}
{{--                                <li><a href="#">درباره ما</a></li>--}}
{{--                                <li><a href="#">خدمات ما</a></li>--}}
{{--                                <li><a href="#">تماس با ما</a></li>--}}
{{--                            </ul>--}}
{{--                        </nav>--}}
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3 widget">
                        <div class="widget-title">
                            <!-- Title -->
                            <h3 class="title">{{trans('home.last_posts')}}</h3>
                        </div>
                        <nav>
                            <ul class="footer-blog">
                                <!-- List Items -->
                                @foreach(post_get::get_last_post(4) as $item)
                                    <li><a href="/{{$locale}}{{$item->link_address}}">  {{$item->title}}    </a></li>
                                @endforeach
                            </ul>
                        </nav>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3 widget newsletter bottom-xs-pad-20">
                        <div class="widget-title">
                            <!-- Title -->
                            <h3 class="title">{{trans('home.newsletter_signup')}}</h3>
                        </div>
                        <div>
                            <!-- Text -->
                            <p>{{trans('home.newsletter_signup_message')}}:</p>
                            <p class="form-message1" style="display: none;"></p>
                            <div class="clearfix"></div>
                            <!-- Form -->
                            <form id="subscribe_form" action="#"
                                  method="post" name="subscribe_form" role="form">
                                <div class="input-text form-group has-feedback">
                                    <input class="form-control" type="email" value="" name="subscribe_email">
                                    <button class="submit bg-color" type="submit"><span
                                            class="glyphicon glyphicon-arrow-right"></span></button>
                                </div>
                            </form>
                        </div>
                        <!-- Count -->
                        <div class="footer-count">
                            <p class="count-number" data-count="93550">{{trans('home.download_counts')}} : <span class="counter"></span>
                            </p>
                        </div>
                        <div class="footer-count">
                            <p class="count-number" data-count="79550">{{trans('home.customer_counts')}} : <span class="counter"></span></p>
                        </div>
                        <!-- Social Links -->
                        <div class="social-icon gray-bg icons-circle i-3x">
                            {{--                            <a href="#"><i class="fa fa-facebook"></i></a>--}}
                            {{--                            <a href="#"><i class="fa fa-twitter"></i></a>--}}
                            {{--                            <a href="#"><i class="fa fa-pinterest"></i></a>--}}
                            {{--                            <a href="#"><i class="fa fa-google"></i></a>--}}
                            {{--                            <a href="#"><i class="fa fa-linkedin"></i></a>--}}
                            @foreach(get_social() as $item)
                                <a href="{{$item->link}}" data-toggle="tooltip" data-placement="left"
                                   title="{{$item->title}}">
                                    <img style="height: 25px;border-radius: 50%" src="{{$item->icon}}">
                                </a>
                            @endforeach
                        </div>
                    </div>
                    <!-- .newsletter -->
                </div>
            </div>
        </div>
        <!-- footer-top -->
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <!-- Copyrights -->
                    <div class="col-xs-10 col-sm-6 col-md-6"> &copy; {{date("Y")}} <a
                            href="https://www.naw3.com/">{{trans('home.copy_rights')}}</a>.
                        <br>
                        <!-- Terms Link -->
                        {{--                        <a href="#">Terms of Use</a> / <a href="#"> Privacy Policy</a>--}}
                    </div>
                    <div class="col-xs-2  col-sm-6 col-md-6 text-right page-scroll gray-bg icons-circle i-3x">
                        <!-- Goto Top -->
                        <a href="#page">
                            <i class="glyphicon glyphicon-arrow-up"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer-bottom -->
    </footer>
    <!-- footer -->
</div>
<!-- page -->
<!-- Scripts -->
<script type="text/javascript" src="{{theme_assets("assets/js/jquery.min.js")}}"></script>
<script type="text/javascript" src="{{theme_assets("assets/js/bootstrap.min.js")}}"></script>
<!-- Menu jQuery plugin -->
<script type="text/javascript" src="{{theme_assets("assets/js/hover-dropdown-menu.js")}}"></script>
<!-- Menu jQuery Bootstrap Addon -->
<script type="text/javascript" src="{{theme_assets("assets/js/jquery.hover-dropdown-menu-addon.js")}}"></script>
<!-- Scroll Top Menu -->
<script type="text/javascript" src="{{theme_assets("assets/js/jquery.easing.1.3.js")}}"></script>
<!-- Sticky Menu -->
<script type="text/javascript" src="{{theme_assets("assets/js/jquery.sticky.js")}}"></script>
<!-- Bootstrap Validation -->
<script type="text/javascript" src="{{theme_assets("assets/js/bootstrapValidator.min.js")}}"></script>
<!-- Revolution Slider -->
<script type="text/javascript" src="{{theme_assets("assets/rs-plugin/js/jquery.themepunch.tools.min.js")}}"></script>
<script type="text/javascript"
        src="{{theme_assets("assets/rs-plugin/js/jquery.themepunch.revolution.min.js")}}"></script>
<script type="text/javascript" src="{{theme_assets("assets/js/revolution-custom.js")}}"></script>
<!-- Portfolio Filter -->
<script type="text/javascript" src="{{theme_assets("assets/js/jquery.mixitup.min.js")}}"></script>
<!-- Animations -->
<script type="text/javascript" src="{{theme_assets("assets/js/jquery.appear.js")}}"></script>
<script type="text/javascript" src="{{theme_assets("assets/js/effect.js")}}"></script>
<!-- Owl Carousel Slider -->
<script type="text/javascript" src="{{theme_assets("assets/js/owl.carousel.min.js")}}"></script>
<!-- Pretty Photo Popup -->
<script type="text/javascript" src="{{theme_assets("assets/js/jquery.prettyPhoto.js")}}"></script>
<!-- Parallax BG -->
<script type="text/javascript" src="{{theme_assets("assets/js/jquery.parallax-1.1.3.js")}}"></script>
<!-- Fun Factor / Counter -->
<script type="text/javascript" src="{{theme_assets("assets/js/jquery.countTo.js")}}"></script>
<!-- PieChart -->
<script type="text/javascript" src="{{theme_assets("assets/js/jquery.easypiechart.min.js")}}"></script>
<!-- Twitter Feed -->
{{--<script type="text/javascript" src="{{theme_assets("assets/js/tweet/carousel.js")}}"></script>--}}
{{--<script type="text/javascript" src="{{theme_assets("assets/js/tweet/scripts.js")}}"></script>--}}
{{--<script type="text/javascript" src="{{theme_assets("assets/js/tweet/tweetie.min.js")}}"></script>--}}
<!-- Background Video -->
<script type="text/javascript" src="{{theme_assets("assets/js/jquery.mb.YTPlayer.js")}}"></script>

<script src="{{theme_assets("assets/plugin/loaders/pace.min.js")}}"></script>
<script src="{{theme_assets("assets/plugin/loaders/blockui.min.js")}}"></script>
<script src="{{theme_assets("assets/plugin/sweetalert2@8.js")}}"></script>

<!-- Custom Js Code -->
<script type="text/javascript" src="{{theme_assets("assets/js/custom.js")}}"></script>
<!-- Scripts -->
@stack('script')
</body>
<!-- Mirrored from zozothemes.com/html/mist/light/index-business.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 05 Feb 2020 15:04:42 GMT -->
</html>
