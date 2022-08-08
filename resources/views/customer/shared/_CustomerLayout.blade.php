<?php
$lang = app()->getLocale();
$left = config("app.siteLang.{$lang}.dir") == "rtl" ? "left" : "right";
$right = config("app.siteLang.{$lang}.dir") == "rtl" ? "right" : "left";
$admin_theme = config("app.adminTheme.dark.address");
?>
<!DOCTYPE html>
<html lang="{{config("app.siteLang.{$lang}.code")}}" dir="{{config("app.siteLang.{$lang}.dir")}}">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    @isset($AjaxToken)
        <meta name="csrf-token" content="{{ csrf_token() }}"/>
    @endisset
    <title>{{$title}}</title>

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
    @yield("style")

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
    <script type="text/javascript" src="/admin_assets/global_assets/js/plugins/forms/validation/validate.min.js"></script>
    <script type="text/javascript"
            src="/admin_assets/global_assets/js/plugins/notifications/sweet_alert.min.js?v=1.0.0.0"></script>
    <!-- Theme JS files -->
    <script src="/admin_assets/global_assets/js/plugins/notifications/jgrowl.min.js"></script>
    <script src="/admin_assets/custom/datatabl-config.js?v.d.001"></script>
    <script src="/admin_assets/custom/general.js"></script>
    <!-- /theme JS files -->

    @isset($AjaxToken)
        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

        </script>
    @endisset


</head>

<body>

<!-- Main navbar -->
<div class="navbar navbar-expand-md navbar-dark m-0">

    <div class="navbar-brand m-0">
        <a href="/" class="d-inline-block m-0" >
            <img style="text-align: center;min-width: 200px !important;min-height: 60px" src="/admin_assets/global_assets/images/logo_light.png" alt="Cheetah CMS">
        </a>
    </div>

    <div class="d-md-none">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
            <i class="icon-tree5"></i>
        </button>
        <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
            <i class="icon-paragraph-justify3"></i>
        </button>
    </div>

    <div class="collapse navbar-collapse" id="navbar-mobile">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
                    <i class="icon-paragraph-justify3"></i>
                </a>
            </li>


        </ul>

        <span class="badge bg-success ml-md-3 mr-md-auto">@lang("admin.online")</span>

        <ul class="navbar-nav">


            <li class="nav-item dropdown">
                <a href="#" class="navbar-nav-link dropdown-toggle caret-0" data-toggle="dropdown">
                    <i class="icon-bubbles4"></i>
                    <span class="d-md-none ml-2">پیامها</span>
                    <span class="badge badge-pill bg-warning-400 ml-auto ml-md-0">{{get_count("contact_us",["status"=>0])}}</span>
                </a>

                <div class="dropdown-menu dropdown-menu-right dropdown-content wmin-md-350">
                    <div class="dropdown-content-header">
                        <a href="/customer/tickets" class="text-default">
                        <span class="font-weight-semibold">نمایش صندوق پیامها</span>
                        </a>
                        <a href="/customer/tickets" class="text-default"><i class="icon-compose"></i></a>
                    </div>



                    <div class="dropdown-content-footer justify-content-center p-0">
                        <a href="/admin/ContactUs" class="bg-light text-grey w-100 py-2" data-popup="tooltip" title="Load more"><i
                                class="icon-menu7 d-block top-0"></i></a>
                    </div>
                </div>
            </li>

            <li class="nav-item dropdown dropdown-user">
                <a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
                    <img src="{{auth()->user()->avatar}}" class="rounded-circle mr-2" height="34" alt="">
                    <span>{{auth()->user()->full_name}} </span>
                </a>

                <div class="dropdown-menu dropdown-menu-right">
                    <a href="/customer/profile" class="dropdown-item"><i
                            class="icon-user-plus"></i> {{trans("admin.myUserAccount")}}</a>
                    <div class="dropdown-divider"></div>
                    <a href="/home/logout" class="dropdown-item"><i class="icon-switch2"></i> {{trans("admin.logOut")}}
                    </a>
                </div>
            </li>
        </ul>
    </div>
</div>
<!-- /main navbar -->


<!-- Page content -->
<div class="page-content">

    <!-- Main sidebar -->
    <div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

        <!-- Sidebar mobile toggler -->
        <div class="sidebar-mobile-toggler text-center">
            <a href="#" class="sidebar-mobile-main-toggle">
                <i class="icon-arrow-right8"></i>
            </a>
            منو
            <a href="#" class="sidebar-mobile-expand">
                <i class="icon-screen-full"></i>
                <i class="icon-screen-normal"></i>
            </a>
        </div>
        <!-- /sidebar mobile toggler -->


        <!-- Sidebar content -->
        <div class="sidebar-content">

            <!-- User menu -->
            <div class="sidebar-user">
                <div class="card-body">
                    <div class="media">
                        <div class="mr-3">
                            <a href="#"><img src="{{auth()->user()->avatar}}" width="38" height="38"
                                             class="rounded-circle" alt=""></a>
                        </div>

                        <div class="media-body">
                            <div class="media-title font-weight-semibold">{{auth()->user()->full_name}}</div>
                            <div class="font-size-xs opacity-50">
                                <i class="icon-pin font-size-sm"></i> &nbsp;{{auth()->user()->email}}
                            </div>
                        </div>

                        <div class="ml-3 align-self-center">
                            <a href="#" class="text-white"><i class="icon-cog3"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /user menu -->


            <!-- Main navigation -->
        @include("customer.shared._RightSideBar",["CurrentPage"=>$CurrentPage])
        <!-- /main navigation -->

        </div>
        <!-- /sidebar content -->

    </div>
    <!-- /main sidebar -->

    <!-- Main content -->
    <div class="content-wrapper">

        <!-- Page header -->
    @yield("pageHeader")
    <!-- /page header -->


        <!-- Content area -->
        <div class="content">

            @yield("body")


        </div>
        <!-- /content area -->


        <!-- Footer -->
        <div class="navbar navbar-expand-lg navbar-light">
            <div class="text-center d-lg-none w-100">
                <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse"
                        data-target="#navbar-footer">
                    <i class="icon-unfold mr-2"></i>
                    Footer
                </button>
            </div>

            <div class="navbar-collapse collapse" id="navbar-footer">
					<span class="navbar-text">
						&copy; 2010 - 2020.  سیستم مدیریت محتوای چیتا -  طراحی توسط :  <a href="http://www.naw3.com/"
                                                                                          target="_blank">نوآوران البرز</a>
					</span>

                <ul class="navbar-nav ml-lg-auto">
{{--                    <li class="nav-item"><a href="https://kopyov.ticksy.com/" class="navbar-nav-link" target="_blank"><i--}}
{{--                                class="icon-lifebuoy mr-2"></i> پشتیبانی</a></li>--}}
                    <li class="nav-item"><a href="http:/www.naw3.com/" class="navbar-nav-link"
                                            target="_blank"><i class="icon-file-text2 mr-2"></i> مستندات</a></li>

                </ul>
            </div>
        </div>
        <!-- /footer -->

    </div>
    <!-- /main content -->

</div>
<!-- /page content -->


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
@stack('script')

</body>

</html>
