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
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="{{isset($post_desc)?$post_desc: $site->description}}">
    <meta name="keywords" content="{{isset($post_keywords)?$post_keywords:$site->keywords}}">
    <title>{{$title}} | {{isset($post_title)?$post_title:$site->title}}    </title>
    @yield("post_meta")


    @isset($AjaxToken)
        <meta name="csrf-token" content="{{ csrf_token() }}"/>
    @endisset

    <link rel="apple-touch-icon" href="{{$site->favicon}}">
    <link rel="shortcut icon" href="{{$site->favicon}}">

    @include('home::shared.progressive_meta')
    <link rel="stylesheet" href="{{theme_assets("assets/farsi_font/farsi-font.css")}}">
    <link rel="stylesheet" href="{{theme_assets("assets/css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{theme_assets("assets/css/plugins.css")}}">
    <link rel="stylesheet" href="{{theme_assets("assets/css/style.css")}}">
    <link rel="stylesheet" href="{{theme_assets("assets/css/font-awesome.min.css")}}">
    <link rel="stylesheet" href="{{theme_assets("assets/css/custom.css")}}">
    <link href="/admin_assets/ckeditor/plugins/codesnippet/lib/highlight/styles/pojoaque.css" rel="stylesheet">
    <script src="/admin_assets/ckeditor/plugins/codesnippet/lib/highlight/highlight.pack.js"></script>
    <style>
        .tm-breadcrumb-area {
            background-color: {{$site->header_color}};
        }
    </style>

</head>

<body>
<!-- Wrapper -->
<div id="wrapper" class="wrapper">

    <!-- Header -->
    <div class="header sticky-header">

        <!-- Header Top Area -->
        <div class="header-toparea">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="header-topinfo">
                            <ul>
                                <li><a href="tel:{{$tel_1}}"><i class="fa fa-phone"></i>{{$tel_1}}</a></li>
                                <li><a href="mailto:{{$email}}"><i class="fa fa-envelope-o"></i>{{$email}}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-12" style="display: contents; align-content: center;">
                        <div class="header-topinfo text-right ">
                            <ul>
                                امروز :
                                <li><i class="fa fa-clock-o"></i>{{m_jdate("l d F Y")}}</li>
                                <li><i class="fa fa-clock-o"></i>{{date("l d F Y")}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--// Header Top Area -->

        <!-- Header Bottom Area -->
        <div class="header-bottomarea">
            <div class="container">
                <div class="header-bottominner">
                    <div class="header-logo">
                        <a href="/">
                            <img src="{{$site->header_logo}}" alt="{{$site->site_name}}">
                        </a>
                    </div>
                    {{--nav menu --}}
                    @include("home::shared.nav_menu",["menus"=>$menu])
                    {{--end nave menu --}}
                    <div class="header-icons">
                        <ul>
                            <li>
                                <button title="Search" class="header-searchtrigger"><i class="fa fa-search"></i>
                                </button>
                            </li>

                            {{--<li>--}}
                            {{--<button title="Login / Register" class="header-loginformtrigger" type="button"--}}
                            {{--data-toggle="modal" data-target="#tm-loginregister-popup"><i--}}
                            {{--class="fa fa-user"></i></button>--}}
                            {{--</li>--}}
                        </ul>
                    </div>

                    <!-- Header Searchform -->
                    <div class="header-searchbox">
                        <form target="_blank" action="https://www.google.com/search" class="header-searchform">
                            <input type="hidden" name="q" value="site:{{request()->root()}}">
                            <input type="text" name="q" placeholder="کلمه کلیدی جستجو را وارد کنید">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <!--// Header Searchform -->

                </div>
                <div class="header-mobilemenu clearfix">
                    <div class="tm-mobilenav"></div>
                </div>
            </div>
        </div>
        <!--// Header Bottom Area -->

    </div>
    <!--// Header -->
@if(isset($has_slider))


    <!-- Heroslider -->
        <div class="heroslider" >
            <div class="heroslider-slider heroslider-animted tm-slider-arrow" >
            @foreach($sliders as $item)
                <!-- Heroslider Item -->
                    <div class="heroslider-wrapper" >

                        <div class="heroslider-single"
                             data-bgimage="{{$item->photo}}"
                             data-black-overlay="8">
                            <div class="container" >
                                <div class="row justify-content-center" >
                                    <div class="col-xl-8 col-lg-10">
                                        <div class="heroslider-content text-center">
                                            <div class="heroslider-animatebox">
                                                <h1>
                                                    <span>{{$item->title}}</span>
                                                    <b>{{$item->sub_title}}</b>
                                                </h1>
                                            </div>
                                            <div class="heroslider-animatebox">
                                                <p>{{$item->description}}</p>
                                            </div>
                                            @if(isset($item->link) && $item->link!=null)
                                                <div class="heroslider-animatebox">
                                                    <div class="tm-buttongroup">

                                                        <a href="{{$item->link}}"
                                                           class="tm-button">مشاهده<b></b></a>

                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!--// Heroslider Item -->
                @endforeach
            </div>
            <div class="heroslider-slidecounter"></div>
        </div>
        <!--// Heroslider -->

@endif

@yield("breadcrumb")
<!-- Main -->
    <main class="page-content">

    @yield("body")

    <!-- Call To Action Area -->
        <div class="tm-section call-to-action-area bg-theme">
            <div class="container">
                <div class="row align-items-center tm-cta">
                    <div class="col-lg-9 col-md-8 col-12">
                        <div class="tm-cta-content">
                            <h3>آیا نگران کسب و کار خود هستید؟</h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-12">
                        <div class="tm-cta-button">
                            <a href="/contact_us" class="tm-button tm-button-white">تماس با ما<b></b></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--// Call To Action Area -->

    </main>
    <!--// Main -->

    <!-- Footer Area -->
    <div class="footer fixed-footer">

        <!-- Footer Widgets Area -->
        <div class="footer-toparea tm-padding-section"
             data-bgimage="{{$site->footer_banner}}" style="background-color: {{$site->footer_color}}" data-overlay="2">
            <div class="container">
                <div class="row widgets footer-widgets">

                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- Single Widget (Widget Info) -->
                        <div class="single-widget widget-info">
                            <a href="index.html" class="widget-info-logo">
                                <img src="{{$site->footer_logo}}" alt="footer logo">
                            </a>
                            <p>{{$site->description}}</p>
                            <a href="/about_us" class="tm-button">بیشتر بخوانید<b></b></a>
                        </div>
                        <!--// Single Widget (Widget Info) -->
                    </div>


                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- Single Widget (Widget Blog) -->
                        <div class="single-widget widget-recentpost">
                            <h5 class="widget-title">پست های اخیر</h5>
                            <ul>
                                @foreach(post_get::get_last_post(4) as $item)
                                    <li>
                                        <a href="{{$item->link_address}}" class="widget-recentpost-image">
                                            <img
                                                    src="{{$item->thumb}}"
                                                    alt="blog thumbnail">
                                        </a>
                                        <div class="widget-recentpost-content">
                                            <h6><a href="{{$item->link_address}}">{{$item->title}}</a></h6>
                                            <span>{{timeStampToPersian($item->created_at)}}</span>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <!--// Single Widget (Widget Blog) -->
                    </div>

                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- Single Widget (Widget Newsletter) -->
                        <div class="single-widget widget-newsletter">
                            <h5 class="widget-title">اطلاعات تماس </h5>
                            <ul>
                                @if(!empty($tel_1) && !is_null($tel_1))
                                    <li> تلفن 1 : <a style="display: inline-flex;" href="tel:{{$tel_1}}">{{$tel_1}}</a>
                                    </li>@endif
                                @if(!empty($tel_2) && !is_null($tel_2))
                                    <li> تلفن 2 : <a style="display: inline-flex;" href="tel:{{$tel_2}}">{{$tel_2}}</a>
                                    </li>@endif
                                @if(!empty($fax) && !is_null($fax))
                                    <li> فکس : <a style="display: inline-flex;" href="tel:{{$fax}}">{{$fax}}</a>
                                    </li>@endif
                                @if(!empty($email) && !is_null($email))
                                    <li> ایمیل : <a href="mailto:{{$email}}">{{$email}}</a></li>@endif
                                @if(!empty($address) && !is_null($address))
                                    <li>آدرس : <a href="">{{$address}}</a></li>@endif
                            </ul>
                        </div>
                        <!--// Single Widget (Widget Newsletter) -->
                    </div>

                </div>
            </div>
        </div>
        <!--// Footer Widgets Area -->

        <!-- Footer Copyright Area -->
        <div class="footer-copyrightarea">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-8 col-12">
                        <p class="footer-copyright"> کپی رایت © {{now()->year}} تمام حقوق برای <a
                                    href="https://www.naw3.com">نوآوران البرز</a> محفوظ است</p>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="footer-copyrightsocial">
                            <ul>
                                @foreach(get_social() as $item)
                                    <li><a href="{{$item->link}}" data-toggle="tooltip" data-placement="top"
                                           title="{{$item->title}}">
                                            <img style="height: 35px;border-radius: 50%" src="{{$item->icon}}"></a></li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--// Footer Copyright Area -->

    </div>
    <!--// Footer Area -->

    <!-- Login Register Popup -->
    <div class="tm-loginregister-popup modal fade" id="tm-loginregister-popup" role="dialog" aria-hidden="true">
        <div class="container">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="row justify-content-center">
                        <div class="col-xl-8 col-lg-9 col-md-10 col-sm-10 col-12">
                            <div class="tm-loginregister">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-times"></i>
                                </button>
                                <ul class="nav tm-tabgroup" id="bstab1" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="bstab1-area1-tab" data-toggle="tab"
                                           href="#bstab1-area1" role="tab" aria-controls="bstab1-area1"
                                           aria-selected="true">ورود</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="bstab1-area2-tab" data-toggle="tab" href="#bstab1-area2"
                                           role="tab" aria-controls="bstab1-area2" aria-selected="false">ثبت نام</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="bstab1-ontent">
                                    <div class="tab-pane fade show active" id="bstab1-area1" role="tabpanel"
                                         aria-labelledby="bstab1-area1-tab">

                                        <form action="#" class="tm-form tm-login-form tm-form-bordered">
                                            <h4>ورود</h4>
                                            <div class="tm-form-inner">
                                                <div class="tm-form-field">
                                                    <label for="login-email">نام کاربری یا آدرس ایمیل *</label>
                                                    <input type="email" id="login-email" required="required">
                                                </div>
                                                <div class="tm-form-field">
                                                    <label for="login-password">کلمه عبور*</label>
                                                    <input type="password" id="login-password" required="required">
                                                </div>
                                                <div class="tm-form-field">
                                                    <input type="checkbox" name="login-remember" id="login-remember">
                                                    <label for="login-remember">مرا به خاطر بسپار</label>
                                                </div>
                                                <div class="tm-form-field">
                                                    <button type="submit" class="tm-button">ورود<b></b></button>
                                                </div>
                                                <div class="tm-form-field">
                                                    <a href="#">رمز عبور خود را فراموش کرده اید؟</a>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                    <div class="tab-pane fade" id="bstab1-area2" role="tabpanel"
                                         aria-labelledby="bstab1-area2-tab">

                                        <form action="#" class="tm-form tm-register-form tm-form-bordered">
                                            <h4>ایجاد یک حساب کاربری</h4>
                                            <div class="tm-form-inner">
                                                <div class="tm-form-field">
                                                    <label for="register-username">نام کاربری</label>
                                                    <input type="text" id="register-username" required="required">
                                                </div>
                                                <div class="tm-form-field">
                                                    <label for="register-email">آدرس ایمیل</label>
                                                    <input type="email" id="register-email" required="required">
                                                </div>
                                                <div class="tm-form-field">
                                                    <label for="register-password">رمز عبور</label>
                                                    <input type="password" id="register-password" required="required">
                                                </div>
                                                <div class="tm-form-field">
                                                    <input type="checkbox" id="register-terms">
                                                    <label for="register-terms">من شرایط و ضوابط سایت را خواند و موافق
                                                        هستم</label>
                                                </div>
                                                <div class="tm-form-field">
                                                    <button type="submit" class="tm-button">ثبت نام<b></b></button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--// Login Register Popup -->

</div>
<!--// Wrapper -->

<!-- Js Files -->
<script src="{{theme_assets("assets/js/modernizr-3.6.0.min.js")}}"></script>
<script src="{{theme_assets("assets/plugin/loaders/pace.min.js")}}"></script>
<script src="{{theme_assets("assets/js/jquery.min.js")}}"></script>
<script src="{{theme_assets("assets/js/popper.min.js")}}"></script>
<script src="{{theme_assets("assets/js/bootstrap.min.js")}}"></script>
<script src="{{theme_assets("assets/js/plugins.js")}}"></script>
{{--<script src="{{theme_assets("assets/js/chart.min.js")}}"></script>--}}
{{--<script src="{{theme_assets("assets/js/chart-active.js")}}"></script>--}}
<script src="{{theme_assets("assets/js/owl.carousel.js")}}"></script>
<script src="{{theme_assets("assets/plugin/loaders/blockui.min.js")}}"></script>
<script src="{{theme_assets("assets/plugin/sweetalert2@8.js")}}"></script>
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

@isset($captcha)
    {!! NoCaptcha::renderJs(\Illuminate\Support\Facades\Lang::getLocale(), true, 'recaptchaCallback') !!}

    {!! NoCaptcha::renderJs() !!}
@endisset
<!--// Js Files -->
@stack('script')
</body>
</html>


