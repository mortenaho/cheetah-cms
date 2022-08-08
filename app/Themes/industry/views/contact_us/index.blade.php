@extends("home::shared.layout",
["title"=>"تماس با ما","AjaxToken"=>true
,"captcha"=>true
])
<?php
$post_meta = ResToModel($contact_info->post_meta);
$tel_1 = $post_meta["tel_1"];
$tel_2 = $post_meta["tel_2"];
$mobile =$post_meta["mobile"];
$address = $post_meta["address"];
$fax = $post_meta["fax"];
$email = $post_meta["email"];
$latitude =$post_meta["latitude"];
$longitude = $post_meta["longitude"];
?>

@section("breadcrumb")
    <!--Page Title-->
    <section class="page-title" style="background-image:url({{theme_assets("assets/images/contact.jpg")}})">
        <div class="auto-container">
            <h1>{{trans('home.contact_us')}}</h1>
            <ul class="page-breadcrumb">
                <li>
                    <a href="/{{$locale}}/">{{trans('home.mainPage')}}</a>
                </li>
                <li class="active">{{trans('home.contact_us')}}</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->
@endsection
@section("body")
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    <style>
        #map {
            width: 100%;
            height: 480px;
        }
    </style>


    <!-- Contact Us -->

    <!--Contact Section-->
    <section class="contact-section">
        <div class="auto-container">
            <div class="sec-title">
                <h3>{{trans('home.contact_us')}}</h3>
                <div class="separater"></div>
            </div>
            <div class="row clearfix">
                <div class="form-column col-lg-9 col-md-8 col-sm-12">
                    <div class="inner-column">

                        <!-- Default Form -->
                        <div class="default-form contact-form">
                            <!--Default Form-->
                            <form method="post" name="frm_contact_us" id="frm_contact_us"  >
                                {{csrf_field()}}
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <input type="text" name="full_name"  id="full_name" placeholder="Enter Name" required>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <input type="email" name="email" id="email" placeholder="Enter Email" required>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <input type="text" name="subject" id="subject" placeholder="Enter Subject" required>
                                    </div>



                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <textarea name="message" placeholder="Massage"></textarea>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <button class="theme-btn btn-style-one" type="submit" name="submit-form">ارسال پیام</button>
                                    </div>

                                </div>
                            </form>

                        </div>
                        <!--End Default Form -->

                    </div>
                </div>
                <div class="info-column col-lg-3 col-md-4 col-sm-12">
                    <!--List Style Three-->
                    <ul class="list-style-three">
                        <li><span class="icon flaticon-note"></span>
                            <strong>ایمیل : </strong>
                            @isset($email)
                                {{$email}}
                            @endisset
                        </li>
                        <li><span class="icon flaticon-telephone"></span>
                            <strong>تلفن : </strong>
                            @isset($tel_1)
                                {{$tel_1}}
                            @endisset
                        </li>
                        <li><span class="icon flaticon-telephone"></span>
                            <strong>فکس : </strong>
                            @isset($fax)
                                {{$fax}}
                            @endisset
                        </li>

                        <li><span class="icon fa fa-map-marker"></span>{{$address}}</li>
                    </ul>
                    <ul class="social-icon-two">
                        <li class="follow">{{trans('home.socialNetwork')}}</li>
                        <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                        <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                        <li><a href="#"><span class="fa fa-google-plus"></span></a></li>
                        <li><a href="#"><span class="fa fa-pinterest-p"></span></a></li>
                        <li><a href="#"><span class="fa fa-dribbble"></span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--End Contact Section-->

    <!--Map Section-->
    <section id="map" class="contact-map-section">
        <!--Map Outer-->
{{--        <div class="map-outer">--}}
{{--            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d317718.69319292053!2d-0.3817765050863085!3d51.528307984912544!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a00baf21de75%3A0x52963a5addd52a99!2sLondon%2C%20UK!5e0!3m2!1sen!2s!4v1598510584932!5m2!1sen!2s" height="500" style="border:0;"></iframe>--}}
{{--        </div>--}}
    </section>
    <!--End Map Section-->

@endsection
@push("script")
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
    <script>

        //var mymap = L.map('map').setView([@(Model.place.Latitude), @(Model.place.Longitude)], 16);

        var mymap = L.map('map',{
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
            .bindPopup("<b>{{$site->title}}</b>").openPopup();

        var popup = L.popup();


    </script>

    <script src="{{theme_assets("assets/plugins/validation/validate.min.js")}}"></script>
    <script src="{{theme_assets("assets/script/contact_us.js")}}"></script>

@endpush
