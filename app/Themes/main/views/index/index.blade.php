@extends("home::shared.layout",
["title"=>"صفحه اصلی","has_slider"=>"true","sliders"=>$sliders,"AjaxToken"=>true
,"captcha"=>true
])



@section("body")
    <!-- Main -->


    @if(isset($about))
        <!-- About Us Area -->
        <div class="tm-section about-us-area bg-white tm-padding-section">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-5">
                        <div class="tm-about-image">
                            <img class="wow fadeInLeft" src="{{$about->thumb}}"
                                 alt="deconsult image">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-7">
                        <div class="tm-about-content">
                            <h2>{{$about->title}}</h2>
                            <span class="divider"><i class="fa fa-gear"></i></span>
                            <p>{{$about->excerpt}}</p>
                            <br/>
                            <a href="/about_us" class="tm-button">درباره ی ما<b></b></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--// About Us Area -->
    @endif
    @if(plugin::is_active("service"))
        {{--start service--}}
        @include("home::index._service")
        {{--end service--}}
    @endif
    <!-- Request Callback Area -->
{{--    <div class="tm-section callback-area bg-white tm-padding-section">--}}
{{--        <div class="container">--}}

{{--            <form class="row" id="frm_contact_us">--}}
{{--                <div class="col-lg-6">--}}
{{--                    <div class="tm-callback">--}}
{{--                        <h2>درخواست تماس</h2>--}}

{{--                        <div class="tm-form-inner">--}}
{{--                            <div class="tm-form-field">--}}
{{--                                <input name="email" type="email" placeholder="ایمیل را وارد کنید*" required="">--}}
{{--                            </div>--}}
{{--                            <div class="tm-form-field tm-form-fieldhalf">--}}
{{--                                <input name="full_name" type="text" placeholder="نام و نام خانوادگی" required="">--}}
{{--                            </div>--}}
{{--                            <div class="tm-form-field tm-form-fieldhalf">--}}
{{--                                <input name="mobile" type="text" placeholder="موبایل"/>--}}
{{--                            </div>--}}

{{--                            <div class="tm-form-field">--}}
{{--                                {!! app('captcha')->display() !!}--}}
{{--                            </div>--}}
{{--                            <div class="tm-form-field">--}}

{{--                                <button id="btn_send_message" type="submit" class="tm-button">ثبت</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-6">--}}
{{--                    <div class="tm-successreport">--}}
{{--                        <div class="tm-form-field ">--}}
{{--                            <textarea required class="col-lg-12" name="message" rows="10"--}}
{{--                                      placeholder="متن پیام شما ...."></textarea>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}
    <!--// Request Callback Area -->
    @if(plugin::is_active("portfolio"))
        {{--start portfolio--}}
        @include("home::index._portfolio")
        {{--end portfolio--}}
    @endif
    @if(plugin::is_active("product"))
        {{--start customer--}}
        @include("home::index._product")
        {{--end customer--}}
    @endif
    {{--start customer_tel--}}
    @include("home::index._customer_tel",["customer_tel"=>$customer_tel])
    {{--end customer_tel--}}
    {{--start last_post--}}
    @include("home::index._last_post",["last_post"=>$last_post])
    {{--end last_post--}}
    @if(plugin::is_active("customer"))
        {{--start customer--}}
        @include("home::index._customer")
        {{--end customer--}}
    @endif
@endsection

@push("script")
    <script src="{{theme_assets("assets/plugin/validation/validate.min.js")}}"></script>
    <script src="{{theme_assets("assets/script/contact_us.js")}}"></script>
@endpush
