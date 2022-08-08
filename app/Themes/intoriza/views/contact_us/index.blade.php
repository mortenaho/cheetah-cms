@extends("home::shared.layout",
["title"=>"تماس با ما","AjaxToken"=>true
,"captcha"=>true
])
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
{{--<div class="section-content overlay-wraper ">--}}
@section("breadcrumb")
    <!-- INNER PAGE BANNER -->
    {{--    {{$site->header_banner}}--}}
    <div class="wt-bnr-inr overlay-wraper bg-center"
         style="background-image:url({{$site->header_banner}});">
        <div class="overlay-main bg-black opacity-07"></div>
        <div class="container">
            <div class="wt-bnr-inr-entry">
                <div class="banner-title-outer">
                    <div class="banner-title-name">
                        <h3 class="text-white">تماس با ما</h3>
                    </div>
                </div>
                <!-- BREADCRUMB ROW -->

                <div>
                    <ul class="wt-breadcrumb breadcrumb-style-2" style="direction: rtl;">
                        <li><a href="/">خانه</a></li>
                        <li>تماس با ما</li>
                    </ul>
                </div>

                <!-- BREADCRUMB ROW END -->
            </div>
        </div>
    </div>
    <!-- INNER PAGE BANNER END -->
@endsection
@section("body")

    <style>
        #map {
            width: 100%;
            height: 380px;
        }

        .validation-invalid-label, .validation-valid-label {
            margin-top: .5rem;
            margin-bottom: .5rem;
            display: block;
            color: #f44336;
            position: relative;
            padding-right: 1.625rem
        }

        .validation-valid-label {
            color: #4caf50
        }

        .validation-invalid-label:before, .validation-valid-label:before {
            font-family: icomoon;
            font-size: 1rem;
            position: absolute;
            top: .12502rem;
            right: 0;
            display: inline-block;
            line-height: 1;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale
        }

        .validation-invalid-label:empty, .validation-valid-label:empty {
            display: none
        }

        .validation-invalid-label:before {
            content: ""
        }

        .validation-valid-label:before {
            content: ""
        }


    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.3/leaflet.css"/>

    <!-- SECTION CONTENTG START -->
    <div class="section-full small-device  p-tb80">

        <!-- LOCATION BLOCK-->
        <div class="container">
            <div class="gmap-outline m-b80">
                <div id="map" class="google-map"></div>
            </div>
        </div>

        <div class="section-content m-b50">
            <div class="container">

                <!-- TITLE START -->
                <div class="section-head text-center">
                    <div class="wt-separator-outer separator-center">
                        <div class="wt-separator">
                            <span
                                class="text-primary text-uppercase sep-line-one ">پیشنهادتان را برای ما ارسال نمایید</span>
                        </div>
                    </div>
                    <h3>تماس با ما</h3>
                </div>
                <!-- TITLE END -->
                <div class="row">
                    <div class="col-md-4 col-sm-12 m-b30">
                        <div class="wt-icon-box-wraper center p-lr30 p-tb50 bdr-1 bdr-gray">
                            <div class="icon-md m-b10"><i class="flaticon-smartphone"></i></div>
                            <div class="icon-content">
                                <h4>تلفن</h4>
                                @isset($tel_1)
                                    <h5>Tel : {{$tel_1}}</h5>
                                @endisset
                                @isset($tel_2)
                                    <h5>Tel : {{$tel_2}}</h5>
                                @endisset
                                @isset($fax)
                                    <h5>Tel : {{$fax}}</h5>
                                @endisset
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 m-b30">
                        <div class="wt-icon-box-wraper center p-lr30 p-tb50  block-shadow">
                            <div class="icon-md  m-b10"><i class="flaticon-email"></i></div>
                            <div class="icon-content">
                                <h4>ایمیل</h4>
                                @isset($email)
                                    <h5>Support : {{$email}}</h5>
                                @endisset
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 m-b30">
                        <div class="wt-icon-box-wraper center p-lr30 p-tb50">
                            <div class="icon-md	 m-b10"><i class="flaticon-placeholder"></i></div>
                            <div class="icon-content">
                                <h4>آدرس</h4>
                                @isset($address)
                                    <h5>  {{$address}}</h5>
                                @endisset
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- GOOGLE MAP & CONTACT FORM -->

        <div class="container">
            <!-- TITLE START -->
            <div class="section-head text-center">
                <div class="wt-separator-outer separator-center">
                    <div class="wt-separator">
                        <span class="text-primary text-uppercase sep-line-one ">فرم تماس</span>
                    </div>
                </div>
                <h3>با ما در تماس باشید</h3>
            </div>
            <!-- TITLE END -->
            <form name="frm_contact_us" id="frm_contact_us" class="contact-form cons-contact-form" method="post">
                {{csrf_field()}}
                <div class="contact-one">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <input name="full_name" id="full_name" type="text" required class="form-control" placeholder="نام *">
                                <span class="spin"></span>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <input name="email" id="email" type="text" class="form-control" required placeholder="ایمیل">
                                <span class="spin"></span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea name="message" id="message" rows="4" class="form-control " required
                                          placeholder="متن پیام *"></textarea>
                                <span class="spin"></span>
                            </div>
                        </div>
                        <div class="text-left col-md-12">
                            <button name="submit" type="submit" value="Submit" class="site-button site-btn-effect">
                                ارسال پیام
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- SECTION CONTENT END -->
    </div>
@endsection
@push("script")
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.3/leaflet.js"></script>
    <script>

        var mymap = L.map('map', {
            keyboard: false,
            dragging: false,
            zoomControl: false,
            boxZoom: false,
            doubleClickZoom: false,
            scrollWheelZoom: false,
            tap: false,
            touchZoom: false,
            center: [{{$latitude}},{{$longitude}}],
            zoom: 16,
            minZoom: 16,
            maxZoom: 16
        });

        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
            maxZoom: 16,
            attribution: '{{$site->title}}',
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1
        }).addTo(mymap);

        L.marker([{{$latitude}}, {{$longitude}}]).addTo(mymap)
            .bindPopup("<b> {{$site->title}} </b>").openPopup();

        var popup = L.popup();

    </script>

    <script src ="/admin_assets/global_assets/js/plugins/forms/validation/validate.min.js" ></script>
    <script src="/admin_assets/custom/general.js"></script>
    <script src="{{theme_assets("assets/script/contact_us.js")}}"></script>

@endpush
