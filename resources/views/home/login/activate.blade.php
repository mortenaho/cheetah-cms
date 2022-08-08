<?php
$lang = app()->getLocale();
$left = config("app.siteLang.{$lang}.dir") == "rtl" ? "left" : "right";
$right = config("app.siteLang.{$lang}.dir") == "rtl" ? "right" : "left";
$admin_theme = config("app.adminTheme.dark.address");

$userId = $user->id;
$userMobile = $user->mobile;
$user_full_name = $user->first_name . ' ' . $user->last_name;
?>
<!DOCTYPE html>
<html lang="en" dir="rtl">

<!-- Mirrored from demo.interface.club/limitless/demo/Template/layout_1/RTL/dark/full/login_unlock.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Jul 2020 02:50:10 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>عنوان</title>

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
    <script src="/admin_assets/global_assets/js/demo_pages/login.js"></script>
    <!-- /theme JS files -->

</head>

<body>

<!-- Main navbar -->
<div class="navbar navbar-expand-md navbar-light navbar-static">
    <div class="navbar-brand">
        <a href="index.html" class="d-inline-block">
            <img src="global_assets/images/logo_light.png" alt="">
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

            <!-- Unlock form -->
            <form class="login-form form-validate" >
                <div class="card mb-0">
                    <div class="card-body">
                        <div class="text-center">
                            <div class="card-img-actions d-inline-block mb-3">
{{--                                <img class="rounded-circle" src="/admin_assets/global_assets/images/demo/users/face11.jpg" width="160" height="160" alt="">--}}
                                <i class="icon-unlocked  mr-2" style="font-size: 80px"></i>
                                <div class="card-img-actions-overlay card-img rounded-circle">
                                    <a href="#" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round">
                                        <i class="icon-question7"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="text-center mb-3">
                            <h6 class="font-weight-semibold mb-0">{{$user_full_name}}</h6>
                            <span class="d-block text-muted">حساب کاربری خود را فعال نمایید</span>
                        </div>

                        <div class="form-group form-group-feedback form-group-feedback-right">
                            <input type="password" class="form-control" placeholder="Your password">
                            <div class="form-control-feedback">
                                <i class="icon-user-lock text-muted"></i>
                            </div>
                        </div>

                        <div class="form-group d-flex align-items-center">
{{--                            <div class="form-check mb-0">--}}
{{--                                <label class="form-check-label">--}}
{{--                                    <input type="checkbox" name="remember" class="form-input-styled" data-fouc>--}}
{{--                                    Remember--}}
{{--                                </label>--}}
{{--                            </div>--}}

{{--                            <a href="login_password_recover.html" class="ml-auto">Forgot password?</a>--}}
                        </div>

                        <button type="button" id="activate_user" name="activate_user" class="btn btn-primary btn-block"><i class="icon-unlocked mr-2"></i> فعال سازی</button>
                    </div>
                </div>
            </form>
            <!-- /unlock form -->

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
						&copy; 2015 - 2018. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
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
<script src="/js/activate.js"></script>
<!-- Mirrored from demo.interface.club/limitless/demo/Template/layout_1/RTL/dark/full/login_unlock.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Jul 2020 02:50:10 GMT -->
</html>
