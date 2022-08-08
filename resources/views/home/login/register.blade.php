<?php
$lang = app()->getLocale();
$left = config("app.siteLang.{$lang}.dir") == "rtl" ? "left" : "right";
$right = config("app.siteLang.{$lang}.dir") == "rtl" ? "right" : "left";
$admin_theme = config("app.adminTheme.dark.address");
?>
<!DOCTYPE html>
<html lang="en" dir="rtl">

<!-- Mirrored from demo.interface.club/limitless/demo/Template/layout_1/RTL/dark/full/login_registration_advanced.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Jul 2020 02:50:10 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>عنوان سایت - ثبت نام</title>

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

    <!-- /theme JS files -->

</head>

<body>

<!-- Main navbar -->
<div class="navbar navbar-expand-md navbar-light navbar-static">
    <div class="navbar-brand">
        <a href="index.html" class="d-inline-block">
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

            <!-- Registration form -->
            <form  class=" flex-fill form-validate">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        <div class="card mb-0 register-form">
                            <div class="card-body">
                                <div class="text-center mb-3">
                                    <i class="icon-plus3 icon-2x text-success border-success border-3 rounded-round p-3 mb-3 mt-1"></i>
                                    <h5 class="mb-0">ثبت نام</h5>
{{--                                    <span class="d-block text-muted">All fields are required</span>--}}
                                </div>
                                {{csrf_field()}}
                                <div class="form-group form-group-feedback form-group-feedback-right">
                                    <input type="text" name="email" id="email" class="form-control" placeholder="ایمیل / نام کاربری">
                                    <div class="form-control-feedback">
                                        <i class="icon-user-plus text-muted"></i>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-group-feedback form-group-feedback-right">
                                            <input name="firstName" id="firstName" type="text" class="form-control" placeholder="نام">
                                            <div class="form-control-feedback">
                                                <i class="icon-user-check text-muted"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-group-feedback form-group-feedback-right">
                                            <input name="lastName"  id="lastName" type="text" class="form-control" placeholder="نام خانوادگی">
                                            <div class="form-control-feedback">
                                                <i class="icon-user-check text-muted"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-group-feedback form-group-feedback-right">
                                            <input name="password" id="password" type="password" class="form-control" placeholder="کلمه عبور">
                                            <div class="form-control-feedback">
                                                <i class="icon-user-lock text-muted"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-group-feedback form-group-feedback-right">
                                            <input name="rePassword" id="rePassword" type="password" class="form-control" placeholder="تکرار کلمه عبور">
                                            <div class="form-control-feedback">
                                                <i class="icon-user-lock text-muted"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-group-feedback form-group-feedback-right">
                                            <input name="phone" id="phone" type="text" class="form-control" placeholder="موبایل">
                                            <div class="form-control-feedback">
                                                <i class="icon-mobile text-muted"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-group-feedback form-group-feedback-right">
                                            <input name="postal_code" id="postal_code" type="text" class="form-control" placeholder="کد پستی">
                                            <div class="form-control-feedback">
                                                <i class="icon-map text-muted"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group form-group-feedback form-group-feedback-right">
                                    <input type="text" name="address" id="address" class="form-control" placeholder="آدرس">
                                    <div class="form-control-feedback">
                                        <i class="icon-address-book text-muted"></i>
                                    </div>
                                </div>

{{--                                <div class="form-group">--}}
{{--                                    <div class="form-check">--}}
{{--                                        <label class="form-check-label">--}}
{{--                                            <input type="checkbox" class="form-input-styled" checked data-fouc>--}}
{{--                                            Send me <a href="#">test account settings</a>--}}
{{--                                        </label>--}}
{{--                                    </div>--}}

{{--                                    <div class="form-check">--}}
{{--                                        <label class="form-check-label">--}}
{{--                                            <input type="checkbox" class="form-input-styled" checked data-fouc>--}}
{{--                                            Subscribe to monthly newsletter--}}
{{--                                        </label>--}}
{{--                                    </div>--}}

{{--                                    <div class="form-check">--}}
{{--                                        <label class="form-check-label">--}}
{{--                                            <input type="checkbox" class="form-input-styled" data-fouc>--}}
{{--                                            Accept <a href="#">terms of service</a>--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                    --}}
{{--                                </div>--}}

                                <button  id="register_user" class="btn bg-teal-400 btn-labeled btn-labeled-right"><b><i class="icon-plus3"></i></b> ثبت نام</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- /registration form -->

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
<script src="/js/register.js"></script>
<!-- Mirrored from demo.interface.club/limitless/demo/Template/layout_1/RTL/dark/full/login_registration_advanced.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Jul 2020 02:50:10 GMT -->
</html>
