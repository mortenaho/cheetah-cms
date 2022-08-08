<?php
$lang = app()->getLocale();
$left = config("app.siteLang.{$lang}.dir") == "rtl" ? "left" : "right";
$right = config("app.siteLang.{$lang}.dir") == "rtl" ? "right" : "left";
$admin_theme = config("app.adminTheme.dark.address");
?>
    <!DOCTYPE html>
<html lang="{{config("app.siteLang.{$lang}.code")}}" dir="{{config("app.siteLang.{$lang}.dir")}}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@lang("admin.loginPage")</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
          type="text/css">
    <link href="/admin_assets/global_assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
    <link href="/admin_assets/assets/{{$admin_theme}}/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/admin_assets/assets/{{$admin_theme}}/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
    <link href="/admin_assets/assets/{{$admin_theme}}/css/layout.min.css" rel="stylesheet" type="text/css">
    <link href="/admin_assets/assets/{{$admin_theme}}/css/components.min.css" rel="stylesheet" type="text/css">
    <link href="/admin_assets/assets/{{$admin_theme}}/css/colors.min.css" rel="stylesheet" type="text/css">

    <link href="/farsi_font/farsi-font.css" rel="stylesheet" type="text/css"/>
    <link href="/admin_assets/custom/theme.css" rel="stylesheet" type="text/css"/>
    <link href="/admin_assets/custom/custom.css" rel="stylesheet" type="text/css"/>
    <link href="/plugin/persianDatePicker/persianDatepicker-default.css" rel="stylesheet" type="text/css"/>
    <!-- /global stylesheets -->

<!-- Core JS files -->
    <script src="/admin_assets/global_assets/js/main/jquery.min.js"></script>
    <script src="/admin_assets/global_assets/js/main/bootstrap.bundle.min.js"></script>
    <script src="/admin_assets/global_assets/js/plugins/loaders/blockui.min.js"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script type="text/javascript" src="/admin_assets/lang/{{$lang}}/admin.js"></script>
    <script src="/admin_assets/assets/{{$admin_theme}}/js/app.js"></script>
    <script src="/admin_assets/global_assets/js/demo_pages/dashboard.js"></script>

    <script type="text/javascript" src="/admin_assets/global_assets/js/plugins/loaders/pace.min.js"></script>
    <script src="/admin_assets/global_assets/js/plugins/forms/styling/switchery.min.js"></script>
    <script src="/admin_assets/global_assets/js/plugins/ui/moment/moment.min.js"></script>
    <script src="/admin_assets/global_assets/js/plugins/pickers/daterangepicker.js"></script>

    <script type="text/javascript" src="/admin_assets/global_assets/js/plugins/forms/styling/uniform.min.js"></script>
    <script type="text/javascript"
            src="/admin_assets/global_assets/js/plugins/tables/datatables/datatables.min.js"></script>
    {{--    <script type="text/javascript" src="/admin_assets/global_assets/js/plugins/forms/selects/select2.min.js"></script>--}}
    <script type="text/javascript" src="/admin_assets/global_assets/js/plugins/notifications/pnotify.min.js"></script>
    <script type="text/javascript" src="/admin_assets/global_assets/js/plugins/media/fancybox.min.js"></script>


    <script type="text/javascript" src="/admin_assets/global_assets/js/plugins/notifications/noty.min.js"></script>
    <script type="text/javascript" src="/admin_assets/global_assets/js/plugins/buttons/ladda.min.js"></script>
    <script type="text/javascript" src="/admin_assets/global_assets/js/plugins/forms/tags/tagsinput.min.js"></script>
    <script type="text/javascript" src="/admin_assets/global_assets/js/plugins/forms/tags/tokenfield.min.js"></script>
    <script type="text/javascript" src="/admin_assets/global_assets/js/plugins/ui/prism.min.js"></script>
    <script type="text/javascript"
            src="/admin_assets/global_assets/js/plugins/forms/inputs/typeahead/typeahead.bundle.min.js"></script>
    <script type="text/javascript" src="/admin_assets/global_assets/js/plugins/forms/inputs/touchspin.min.js"></script>
    <script type="text/javascript" src="/admin_assets/global_assets/js/plugins/forms/inputs/maxlength.min.js"></script>
    <script type="text/javascript" src="/admin_assets/global_assets/js/plugins/forms/inputs/formatter.min.js"></script>
    <script type="text/javascript"
            src="/admin_assets/global_assets/js/core/libraries/jquery_ui/interactions.min.js"></script>
    <script type="text/javascript" src="/admin_assets/global_assets/js/core/libraries/jquery_ui/touch.min.js"></script>
    <script type="text/javascript"
            src="/admin_assets/global_assets/js/plugins/forms/validation/validate.min.js"></script>
    <script type="text/javascript"
            src="/admin_assets/global_assets/js/plugins/notifications/sweet_alert.min.js?v=1.0.0.0"></script>
    <!-- Theme JS files -->
    <script src="/admin_assets/global_assets/js/plugins/notifications/jgrowl.min.js"></script>
    <script src="/admin_assets/custom/datatabl-config.js?v.d.001"></script>
    <script src="/admin_assets/custom/general.js"></script>
    <!-- /theme JS files -->

    <script type="text/javascript" src="/admin_assets/lang/{{$lang}}/admin.js"></script>
    <script type="text/javascript" src="/admin_assets/custom/forms/login.js"></script>

    <script type="text/javascript" src="/admin_assets/assets/js/plugins/ui/ripple.min.js"></script>

{!! NoCaptcha::renderJs("$lang", true, 'recaptchaCallback') !!}

{!! NoCaptcha::renderJs() !!}

<!-- /theme JS files -->
    <style>
        .ssgrecaptcha-badge {
            display: none;
        }

        .rc-anchor-light {
            width: 250px !important;
        }
        .login-cover{
            background-color: #0b3251;
        }
    </style>


</head>


<body class="bg-slate-800 login-cover">

<!-- Page content -->
<div class="page-content">

    <!-- Main content -->
    <div class="content-wrapper">
    {!! AdminHelper::TempData("msg") !!}
    <!-- Content area -->
        <div class="content d-flex justify-content-center align-items-center pt-0">
            <!-- Form with validation -->
            <form  id="loginForm" action="/login/admin" method="post" class="form-validate login-form">
                {{csrf_field()}}
                <div class="card mb-0">
                    <div class="card-body">
                        <div class="text-center">
                            <div style="padding: 0px;margin-bottom: 2px;"
                                 class="icon-object border-slate-300 text-slate-300"><img class="img-circle" height="80" src="/admin_assets/global_assets/images/logo_login_light.png">
                            </div>
{{--                            <h6 class="text-slate-300">Cheetah CMS</h6>--}}
                            <h5 class="content-group">@lang("admin.loginToYourAccount") </h5>
                        </div>

                        <div class="form-group has-feedback has-feedback-left">
                            <input type="email" class="form-control text-center" placeholder="@lang("admin.username") " name="email"
                                   required="required">
                            <div class="form-control-feedback">
                                <i class="icon-user text-muted"></i>
                            </div>
                        </div>

                        <div class="form-group has-feedback has-feedback-left">
                            <input minlength="6" type="password" class="form-control text-center"
                                   placeholder="@lang("admin.password") " name="password" required="required">
                            <div class="form-control-feedback">
                                <i class="icon-lock2 text-muted"></i>
                            </div>
                        </div>
                        <div class="form-group has-feedback has-feedback-left">


                            {{--                                {!! app('captcha')->display() !!}--}}

                        </div>

                        <div class="form-group login-options">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" class="styled" checked="checked">
                                        @lang("admin.rememberMe")
                                    </label>
                                </div>

                                <div class="col-sm-6 text-right">
                                    <a href="login_password_recover.html">@lang("admin.forgetYourPassword")</a>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn bg-pink-400 btn-block">@lang("admin.signIn") <i
                                    class="icon-arrow-left13 position-right"></i></button>
                        </div>
                    </div>
                </div>
            </form>
            <!-- /form with validation -->

        </div>
        <!-- /content area -->

    </div>
    <!-- /main content -->

</div>
<!-- /page content -->

@include("admin.shared._show_error_validation",["errors"=>$errors])
<script type="text/javascript" src="/admin_assets/custom/theme.js"></script>
<script type="text/javascript" src="/admin_assets/custom/datatables/dt-config.js"></script>
<script>
    $(function () {

        // Image lightbox
        $('[data-popup="lightbox"]').fancybox({
            padding: 3
        });

    });
</script>
{{--@stack('script')--}}
</body>
</html>
