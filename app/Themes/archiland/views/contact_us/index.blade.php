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
    <section id="subheader" data-speed="8" data-type="background">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>تماس با ما</h1>
                    <ul class="crumb">
                        <li><a href="/">صفحه اصلی</a></li>
                        <li class="sep">/</li>
                        <li>تماس با ما</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
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
    <div id="content" class="no-top">
        <section id="de-map" aria-label="map-container">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="map-container map-fullwidth img-rounded">
                            <div id="map" class="google-map"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="container">
            <div class="row">

                <div class="col-md-8">
                    <h3>با ما در تماس باشید</h3>
                    <form name="contactForm" id='contact_form' method="post"  >
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-6">
                                <div id='name_error' class='error'>نام</div>
                                <div>
                                    <input type='text' name='full_name' id='full_name' class="form-control" placeholder="نام">
                                </div>

                                <div id='email_error' class='error'>ایمیل</div>
                                <div>
                                    <input type='text' name='email' id='email' class="form-control" placeholder="ایمیل">
                                </div>
                                <div >
                                    <input type="text" name="subject" id="subject" class="form-control" placeholder="موضوع"/>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div id='message_error' class='error'>متن پیام</div>
                                <div>
                                    <textarea name='message' id='message' class="form-control"
                                              placeholder="متن پیام"></textarea>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <p id='submit'>
                                    <input type='submit' id='send_message' value='ارسال پیام' class="btn btn-line">
                                </p>
                                <div id='mail_success' class='success'>پیام شما با موفقیت ارسال گردید.</div>
                                <div id='mail_fail' class='error'>متاسفانه خطایی در ارسال پیام رخ داده است. لطفا چند لحظه دیگر مجددا تلاش نمایید
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div id="sidebar" class="col-md-4">

                    <div class="widget widget_text">
                        <h3>اطلاعات تماس</h3>
                        <address>
                            @isset($address)
                                <span>{{$address}}</span>
                            @endisset
                            <span>
                                @isset($tel_1)
                                    {{$tel_1}}
                                @endisset
                                <strong>تلفن</strong>
                            </span>
                            <span>
                                @isset($fax)
                                    {{$fax}}
                                @endisset
                                <strong>فکس</strong>
                            </span>
                            <span>
                                     @isset($email)
                                    <a href="mailto:{{$email}}">{{$email}}</a>
                                @endisset
                                <strong>ایمیل</strong>
                            </span>
                            {{--                            <span><strong>Web:</strong><a href="#test">http://example.com</a></span>--}}
                            {{--                            <span><strong>Open</strong>Sunday - Friday 08:00 - 18:00</span>--}}
                        </address>
                    </div>
                </div>
            </div>
        </div>
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
    <script src="/admin_assets/global_assets/js/plugins/forms/validation/validate.min.js"></script>
    <script src="/admin_assets/custom/general.js"></script>
    <script src="{{theme_assets("assets/script/contact_us.js")}}"></script>

@endpush
