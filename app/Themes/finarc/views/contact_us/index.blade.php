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
   {{--{{$site->header_banner}}--}}

    <section class="breadcrumbs-custom-inset">
        <div class="breadcrumbs-custom context-dark">
            <div class="container">
                <br/><br/> <br/>
                <h5 class="breadcrumbs-custom-title">تماس با ما</h5>
                <ul class="breadcrumbs-custom-path">
                    <li><a href="/{{$locale}}/">صفحه اصلی</a></li>
                    <li class="active">تماس با ما</li>
                </ul>
            </div>
            <div class="box-position" style="background-image: url({{theme_assets("assets/images/bg-breadcrumbs.jpg")}});"></div>
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

    <section class="section section-sm bg-default bg_second_cl">
        <div class="container">
            <div class="row row-30 justify-content-center">
                <div class="col-md-4 col-lg-4">
                    <article class="box-contacts bg_first_cl">
                        <div class="box-contacts-body">
                            <div class="box-contacts-icon fl-bigmug-line-cellphone55"></div>
                            <div class="box-contacts-decor"></div>
                            @isset($tel_1)
                                <p class="box-contacts-link"><a href="tel:#">{{$tel_1}}</a></p>
                            @endisset

                            @isset($tel_2)
                                <p class="box-contacts-link"><a href="tel:#">{{$tel_2}}</a></p>
                            @endisset
                        </div>
                    </article>
                </div>
                <div class="col-md-4 col-lg-4">
                    <article class="box-contacts bg_first_cl">
                        <div class="box-contacts-body">
                            <div class="box-contacts-icon fl-bigmug-line-up104"></div>
                            <div class="box-contacts-decor"></div>
                            <p class="box-contacts-link">
                                @isset($address)
                                    <a href="#">{{$address}}</a>
                                @endisset
                            </p>
                        </div>
                    </article>
                </div>
                <div class="col-md-4 col-lg-4">
                    <article class="box-contacts bg_first_cl">
                        <div class="box-contacts-body">
                            <div class="box-contacts-icon fl-bigmug-line-chat55"></div>
                            <div class="box-contacts-decor"></div>
                            @isset($email)
                                <p class="box-contacts-link"><a href="#"><span class="__cf_email__" data-cfemail="#">{{$email}}</span></a></p>
                             @endisset
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Form and Gmap-->
    <section class="section section-sm bg-default text-md-left">
        <div class="container">
            <div class="row row-50">
                <div class="col-lg-6 section-map-small" >
{{--                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d47748.57774690996!2d{{$latitude}}!3d{{$longitude}}!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25accc457649b%3A0x319d12e89a244ab9!2s{{$site->title}}!5e1!3m2!1sen!2s!4v1561120805660!5m2!1sen!2s" width="100%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>--}}
{{--                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d953.2042390129798!2d52.68242949219063!3d36.5378368587638!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzbCsDMyJzE1LjkiTiA1MsKwNDAnNTguMyJF!5e0!3m2!1sen!2s!4v1634055254083!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>--}}
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.3/leaflet.css"/>
                    <div id="map" class="google-map"></div>
                </div>
                <div class="col-lg-6">
                    <h5 class="text-spacing-50 text-right">فرم تماس</h5>
{{--                    <form name="contactForm" id="contact_form" class="finarc-form finarc-mailform" data-form-output="form-output-global" data-form-type="contact" method="post" action="#">--}}
                    <form role="form" name="frm_contact_us" id="frm_contact_us" class="finarc-form finarc-mailform" data-form-output="form-output-global" data-form-type="contact"  method="post">
                        {{csrf_field()}}
                        <div class="row row-14 gutters-14">
                            <div class="col-sm-6">
                                <div class="form-wrap">
                                    <input class="form-input"  type="text" name="full_name" id="full_name" data-constraints="@Required">
                                    <label class="form-label" for="full_name">نام و نام خانوادگی</label>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-wrap">
                                    <input class="form-input" id="email" type="email" name="email" data-constraints="@Email @Required">
                                    <label class="form-label" for="email">ایمیل</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-wrap">
                                    <input class="form-input" id="subject" type="text" name="subject" data-constraints="@Required">
                                    <label class="form-label" for="subject">موضوع</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-wrap">
                                    <label class="form-label" for="message">پیام</label>
                                    <textarea class="form-input" id="message" name="message" data-constraints="@Required"></textarea>
                                </div>
                            </div>

                        </div>
                        <button  id="send_message" class="button button-secondary button-pipaluk" type="submit">ارسال</button>
                    </form>

{{--                    <form class="finarc-form finarc-mailform" data-form-output="form-output-global" data-form-type="contact" method="post" action="#">--}}
{{--                        <div class="row row-14 gutters-14">--}}
{{--                            <div class="col-sm-6">--}}
{{--                                <div class="form-wrap">--}}
{{--                                    <input class="form-input" id="contact-first-name" type="text" name="name" data-constraints="@Required">--}}
{{--                                    <label class="form-label" for="contact-first-name">First Name</label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-sm-6">--}}
{{--                                <div class="form-wrap">--}}
{{--                                    <input class="form-input" id="contact-last-name" type="text" name="name" data-constraints="@Required">--}}
{{--                                    <label class="form-label" for="contact-last-name">Last Name</label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-12">--}}
{{--                                <div class="form-wrap">--}}
{{--                                    <input class="form-input" id="contact-email" type="email" name="email" data-constraints="@Email @Required">--}}
{{--                                    <label class="form-label" for="contact-email">E-mail</label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-12">--}}
{{--                                <div class="form-wrap">--}}
{{--                                    <label class="form-label" for="contact-message">Message</label>--}}
{{--                                    <textarea class="form-input" id="contact-message" name="message" data-constraints="@Required"></textarea>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <button class="button button-secondary button-pipaluk" type="submit">Send Message</button>--}}
{{--                    </form>--}}
                </div>
            </div>
        </div>
    </section>


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
