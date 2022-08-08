<?php
$lang = app()->getLocale();
$left = config("app.siteLang.{$lang}.dir") == "rtl" ? "left" : "right";
$right = config("app.siteLang.{$lang}.dir") == "rtl" ? "right" : "left";
$admin_theme = config("app.adminTheme.dark.address");
?>
<!DOCTYPE html>
<html lang="en" dir="rtl">

<!-- Mirrored from demo.interface.club/limitless/demo/Template/layout_1/RTL/dark/full/login_validation.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Jul 2020 02:50:10 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>عنوان سایت</title>

    <link href="/farsi_font/farsi-font.css" rel="stylesheet" type="text/css"/>
    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="/admin_assets/global_assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
    <link href="/admin_assets/assets/{{$admin_theme}}/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/admin_assets/assets/{{$admin_theme}}/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
    <link href="/admin_assets/assets/{{$admin_theme}}/css/layout.min.css" rel="stylesheet" type="text/css">
    <link href="/admin_assets/assets/{{$admin_theme}}/css/components.min.css" rel="stylesheet" type="text/css">
    <link href="/admin_assets/assets/{{$admin_theme}}/css/colors.min.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script src="/admin_assets/global_assets/js/main/jquery.min.js"></script>
    <script src="/admin_assets/global_assets/js/main/bootstrap.bundle.min.js"></script>
    <script src="/admin_assets/global_assets/js/plugins/loaders/blockui.min.js"></script>
    <script type="text/javascript"
            src="/admin_assets/global_assets/js/plugins/notifications/sweet_alert.min.js?v=1.0.0.0"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="/admin_assets/global_assets/js/plugins/forms/validation/validate.min.js"></script>
    <script src="/admin_assets/global_assets/js/plugins/forms/styling/uniform.min.js"></script>

    <script src="/admin_assets/assets/{{$admin_theme}}/js/app.js"></script>
    <script src="/admin_assets/global_assets/js/demo_pages/login_validation.js"></script>
    <!-- /theme JS files -->

</head>

<body>

<!-- Main navbar -->
<div class="navbar navbar-expand-md navbar-light navbar-static">
    <div class="navbar-brand">
        <a href="/" class="d-inline-block">
            <img src="/admin_assets/global_assets/images/logo_light.png" alt="">
        </a>
    </div>

    <div class="d-md-none">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
            <i class="icon-tree5"></i>
        </button>
    </div>

    <div class="collapse navbar-collapse" id="navbar-mobile">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a href="#" class="navbar-nav-link">
                    <i class="icon-display4"></i>
                    <span class="d-md-none ml-2">Go to website</span>
                </a>
            </li>

            <li class="nav-item dropdown">
                <a href="#" class="navbar-nav-link">
                    <i class="icon-user-tie"></i>
                    <span class="d-md-none ml-2">Contact admin</span>
                </a>
            </li>

            <li class="nav-item dropdown">
                <a href="#" class="navbar-nav-link">
                    <i class="icon-cog3"></i>
                    <span class="d-md-none ml-2">Options</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- /main navbar -->


<!-- Page content -->
<div class="page-content">

    <!-- Main content -->
    <div class="content-wrapper">

        <!-- Content area -->
        <div class="content d-flex justify-content-center align-items-center pt-0">

            <!-- Login card -->
            <form class="login-form form-validate" action="">
                <div class="card mb-0">
                    <div class="card-body">
                        <div class="text-center mb-3">
                            <i class="icon-reading icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"></i>
                            <h5 class="mb-0">ورود به حساب کاربری</h5>
                            <span class="d-block text-muted">Your credentials</span>
                        </div>
                        {{csrf_field()}}
                        <div class="form-group form-group-feedback form-group-feedback-left">
                            <input type="text" class="form-control"  id="username" name="username" placeholder="نام کاربری" required>
                            <div class="form-control-feedback">
                                <i class="icon-user text-muted"></i>
                            </div>
                        </div>

                        <div class="form-group form-group-feedback form-group-feedback-left">
                            <input type="password" class="form-control" id="password" name="password" placeholder="کلمه عبور" required>
                            <div class="form-control-feedback">
                                <i class="icon-lock2 text-muted"></i>
                            </div>
                        </div>

                        <div class="form-group d-flex align-items-center">
                            <div class="form-check mb-0">
                                <label class="form-check-label">
                                    <input type="checkbox" name="remember" class="form-input-styled" checked data-fouc>
                                    مرا به خاطر بسپار
                                </label>
                            </div>

                            <a href="/{{$lang}}/home/recover" class="ml-auto">فراموشی رمز ؟</a>
                        </div>

                        <div class="form-group">
                            <button  id="login_user" name="login_user"  class="btn btn-primary btn-block">ورود <i class="icon-circle-left2 ml-2"></i></button>
                        </div>

{{--                        <div class="form-group text-center text-muted content-divider">--}}
{{--                            <span class="px-2">or sign in with</span>--}}
{{--                        </div>--}}

{{--                        <div class="form-group text-center">--}}
{{--                            <button type="button" class="btn btn-outline bg-indigo border-indigo text-indigo btn-icon rounded-round border-2"><i class="icon-facebook"></i></button>--}}
{{--                            <button type="button" class="btn btn-outline bg-pink-300 border-pink-300 text-pink-300 btn-icon rounded-round border-2 ml-2"><i class="icon-dribbble3"></i></button>--}}
{{--                            <button type="button" class="btn btn-outline bg-slate-600 border-slate-600 text-slate-600 btn-icon rounded-round border-2 ml-2"><i class="icon-github"></i></button>--}}
{{--                            <button type="button" class="btn btn-outline bg-info border-info text-info btn-icon rounded-round border-2 ml-2"><i class="icon-twitter"></i></button>--}}
{{--                        </div>--}}

                        <div class="form-group text-center text-muted content-divider">
                            <span class="px-2">حساب کاربری نداریر ؟</span>
                        </div>

                        <div class="form-group">
                            <a href="/{{$lang}}/home/register" class="btn btn-light btn-block">ثبت نام کنید</a>
                        </div>

{{--                        <span class="form-text text-center text-muted">By continuing, you're confirming that you've read our <a href="#">Terms &amp; Conditions</a> and <a href="#">Cookie Policy</a></span>--}}
                    </div>
                </div>
            </form>
            <!-- /login card -->

        </div>
        <!-- /content area -->


        <!-- Footer -->
        <div class="navbar navbar-expand-lg navbar-light">
            <div class="text-center d-lg-none w-100">
                <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
                    <i class="icon-unfold mr-2"></i>
                    Footer
                </button>
            </div>

            <div class="navbar-collapse collapse" id="navbar-footer">
					<span class="navbar-text">
						&copy; 2010 - 2022. <a href="#">سیستم مدیریت محتوای چیتا</a> پشتیبانی توسط <a href="https://www.naw3.com" target="_blank">نوآوران البرز</a>
					</span>

                <ul class="navbar-nav ml-lg-auto">
                    <li class="nav-item"><a href="https://kopyov.ticksy.com/" class="navbar-nav-link" target="_blank"><i class="icon-lifebuoy mr-2"></i> Support</a></li>
                    <li class="nav-item"><a href="http://demo.interface.club/limitless/docs/" class="navbar-nav-link" target="_blank"><i class="icon-file-text2 mr-2"></i> Docs</a></li>
                    <li class="nav-item"><a href="https://themeforest.net/item/limitless-responsive-web-application-kit/13080328?ref=kopyov" class="navbar-nav-link font-weight-semibold"><span class="text-pink-400"><i class="icon-cart2 mr-2"></i> Purchase</span></a></li>
                </ul>
            </div>
        </div>
        <!-- /footer -->

    </div>
    <!-- /main content -->

</div>
<!-- /page content -->

</body>
<script src="/admin_assets/custom/general.js"></script>
<script src="/js/login.js"></script>
<!-- Mirrored from demo.interface.club/limitless/demo/Template/layout_1/RTL/dark/full/login_validation.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Jul 2020 02:50:10 GMT -->
</html>
