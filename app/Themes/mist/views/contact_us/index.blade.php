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

    <div class="page-header" data-bgimage="{{$site->header_banner}}"
         style="background-image: url({{$site->header_banner}});">
        <div class="container">
            <h1 class="title">تماس با ما</h1>
        </div>
        <div class="breadcrumb-box">
            <div class="container">
                <ul class="breadcrumb">
                    <li>
                        <a href="/">خانه</a>
                    </li>
                    <li class="active">تماس با ما</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- page-header -->
@endsection
@section("body")

    <style>
        #map {
            width: 100%;
            height: 380px;
        }
    </style>

    <!-- Contact Us -->

    <section id="contact-us" class="page-section">
        <form role="form" name="frm_visit" id="frm_visit" method="post">
            {{csrf_field()}}
            <input type="hidden" name="post_id" id="post_id" value="0">
            <input type="hidden" name="post_type" id="post_type" value="{{$contact_info->post_type}}">
            <input type="hidden" name="category_id"  id="category_id" value="0">
        </form>
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-8">
                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <address>
                                <h5 class="title"><i class="icon-map-pin text-color"></i> آدرس</h5>
                                @isset($address)
                                    {{$address}}
                                @endisset
                            </address>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <h5 class="title"><i class="icon-phone10 text-color"></i> تلفن</h5>
                            @isset($tel_1)
                            <div>Tel  : {{$tel_1}}</div>
                            @endisset
                            @isset($tel_2)
                                <div>Tel  : {{$tel_2}}</div>
                            @endisset
                            @isset($fax)
                            <div>Fax : {{$fax}}</div>
                            @endisset

                        </div>
                        <div class="col-sm-6 col-md-4">
                            <h5 class="title"><i class="icon-envelope7 text-color"></i> ایمیل</h5>
                            @isset($email)
                            <div>Support : {{$email}}</div>
                            @endisset
                            <div>Sales : sales@yoursite.com</div>
                            <div>Admin : admin@yoursite.com</div>
                        </div>
                    </div>
                    <hr>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
                <div class="col-md-6 col-md-4">
                    <h3 class="title">فرم تماس</h3>
                    <p class="form-message" style="display: none;"></p>
                    <div class="contact-form">
                        <!-- Form Begins -->
                        <form role="form" name="frm_contact_us" id="frm_contact_us" method="post">
                            {{csrf_field()}}
                            <!-- Field 1 -->
                            <div class="input-text form-group">
                                <input type="text" name="full_name" class="input-name form-control" placeholder="نام و نام خانوادگی*" />
                            </div>
                            <!-- Field 2 -->
                            <div class="input-email form-group">
                                <input type="email" name="email" class="input-email form-control" placeholder="ایمیل*"/>
                            </div>
                            <!-- Field 3 -->
                            <div class="input-email form-group">
                                <input type="text" name="subject" class="input-phone form-control" placeholder="موضوع*"/>
                            </div>
                            <!-- Field 4 -->
                            <div class="textarea-message form-group">
                                <textarea name="message" class="textarea-message form-control" placeholder="پیام*" rows="2" ></textarea>
                            </div>

                            <!-- Button -->
                            <button class="btn btn-default" type="submit">ارسال پیام <i class="icon-paper-plane"></i></button>
                        </form>
                        <!-- Form Ends -->
                        <p class="form-messages"></p>
                    </div>


                </div>
            </div>
        </div>
    </section><!-- page-section -->
    <section id="map">

    </section> <!-- map -->


@endsection
@push("script")
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
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
    <script src="{{theme_assets("assets/plugin/validation/validate.min.js")}}"></script>
    <script src="{{theme_assets("assets/script/contact_us.js")}}"></script>

@endpush
