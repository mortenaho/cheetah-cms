@extends("home::shared.layout",
["title"=>"فروشگاه"
])

@section("breadcrumb")
    {{--{{$site->header_banner}}--}}
    <section id="subheader" data-speed="8" data-type="background">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>ورود / ثبت نام</h1>
                    <ul class="crumb">
                        <li><a href="/">صفحه اصلی</a></li>
                        <li class="sep">/</li>
                        <li>ورود / ثبت نام</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- INNER PAGE BANNER END -->
@endsection
@section("body")

    <!-- content begin -->
    <div id="content">
        <div class="container">
            <div class="row">
                {{csrf_field()}}
                <div class="col-md-9">

                    <div id="register_section" class="d-summary" style="direction: rtl">
                        <h3>ثبت نام</h3>
                        <div class="spacer-line"></div>
                        <form class="row" id="form_coupon" method="post" name="form_register">

                            <div class="col text-center">
                                <input class="form-control text-center" id="firstName" name="firstName"
                                       placeholder="نام"
                                       type="text"/> <a style="cursor: pointer;" id="btn-submit"><i
                                        class="fa fa-address-card"></i></a>
                                <div class="clearfix"></div>
                                <br/>
                                <input class="form-control text-center" id="lastName" name="lastName"
                                       placeholder="نام خانوادگی"
                                       type="text"/> <a style="cursor: pointer;" id="btn-submit"><i
                                        class="fa fa-address-card"></i></a>
                            </div>
                            <div class="clearfix"></div>
                            <br/>
                            <div class="col text-center">
                                <input class="form-control text-center" id="email" name="email" placeholder="ایمیل"
                                       type="text"/> <a style="cursor: pointer;" id="btn-submit"><i
                                        class="fa fa-address-card-o"></i></a>
                                <div class="clearfix"></div>
                                <br/>
                                <input class="form-control text-center" id="phone" name="phone"
                                       placeholder="شماره همراه"
                                       type="text"/> <a style="cursor: pointer;" id="btn-submit"><i
                                        class="fa fa-phone"></i></a>
                            </div>
                            <div class="clearfix"></div>
                            <br/>
                            <div class="col text-center">
                                <input class="form-control text-center" id="address" name="address" placeholder="آدرس"
                                       type="text"/> <a style="cursor: pointer;" id="btn-submit"><i
                                        class="fa fa-address-card"></i></a>
                                <div class="clearfix"></div>
                                <br/>
                                <input class="form-control text-center" id="postal_code" name="postal_code"
                                       placeholder="کد پستی"
                                       type="text"/> <a style="cursor: pointer;" id="btn-submit"><i
                                        class="fa fa-address-book"></i></a>
                            </div>
                            <div class="clearfix"></div>
                            <br/>
                            <div class="col text-center">
                                <input class="form-control text-center" id="password" name="password"
                                       placeholder="کلمه عبور"
                                       type="password"/>
                                <a style="cursor: pointer;" id="btn-submit"><i
                                        class="fa fa-lock"></i></a>
                                <div class="clearfix"></div>
                                <br/>
                                <input class="form-control text-center" id="rePassword" name="rePassword"
                                       placeholder="تکرار کلمه عبور"
                                       type="password"/>
                                <a style="cursor: pointer;" id="btn-submit"><i
                                        class="fa fa-lock"></i></a>
                                <div class="clearfix"></div>
                                <br/>

                            </div>

                        </form>
                        <div class="spacer-line"></div>

                        <a id="register_user" class="btn-custom rounded btn-fullwidth text-center"
                           style="cursor: pointer;"
                        >ثبت نام</a>
                    </div>

                    <div id="user_activation" class="d-summary" style="direction: rtl;">
                        <h3>تایید شماره موبایل</h3>
                        <div class="spacer-line"></div>
                        <form class="row" id="form_coupon" method="post" name="form_user_activation">

                            <div class="col text-center">
                                <input type="hidden" id="user_id" name="user_id" value="">
                                <input class="form-control text-center" id="otp_code" name="otp_code"
                                       placeholder="کد ارسالی را وارد نمایید"
                                       type="text"/> <a style="cursor: pointer;" id="btn-submit"><i
                                        class="fa fa-phone"></i></a>
                            </div>
                        </form>
                        <div class="spacer-line"></div>

                        <a id="mobile_number_activate" class="btn-custom rounded  text-center" style="cursor: pointer;">
                            تایید موبایل
                        </a>
                        <a id="resend_activation_code" class="btn-custom  rounded  text-center"
                           style="cursor: pointer;">
                            ارسال مجدد
                        </a>

                    </div>
                </div>

                <div id="sidebar" class="col-md-3">
                    <div id="login_section" class="d-summary">
                        <h3>ورود</h3>

                        <div class="spacer-line"></div>

                        <form class="row" id="form_coupon" name="form_login" method="post">
                            <div class="col text-center">
                                <input class="form-control text-center" id="userName" name="userName"
                                       placeholder="نام کاربری"
                                       type="text"/> <a style="cursor: pointer;" id="btn-submit"><i
                                        class="fa fa-user"></i></a>
                                <div class="clearfix"></div>
                                <br/>
                                <input class="form-control text-center" id="userPass" name="userPass"
                                       placeholder="کلمه عبور"
                                       type="password"/> <a style="cursor: pointer;" id="btn-submit"><i
                                        class="fa fa-lock"></i></a>
                            </div>
                        </form>


                        <div class="spacer-line"></div>

                        <a class="btn-custom rounded btn-fullwidth text-center" style="cursor: pointer;"
                           onclick="login();">ورود</a>
                    </div>
                </div>

            </div>
        </div>
    </div>


@endsection

@push("script")
    <script src="{{theme_assets("assets/script/login.js")}}"></script>
    <script src="/admin_assets/global_assets/js/plugins/forms/validation/validate.min.js"></script>
@endpush
