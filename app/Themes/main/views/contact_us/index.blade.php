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
    <div class="tm-breadcrumb-area tm-padding-section text-center" data-overlay="1"
         data-bgimage="{{$site->header_banner}}"
         style="background-image: url({{$site->header_banner}});">
        <div class="container">
            <div class="tm-breadcrumb">
                <h2 class="tm-breadcrumb-title">تماس با ما</h2>
                <ul>
                    <li><a href="/">خانه</a></li>
                    <li>تماس با ما</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
@section("body")

    <style>
        #map {
            width: 100%;
            height: 380px;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.3/leaflet.css"/>

    <!-- Contact Us -->
    <div class="tm-section contact-us-area tm-padding-section bg-white">
        <div class="container">
            <div class="row justify-content-center mt-30-reverse">

                <div class="col-lg-12 col-md-6 col-12 mt-30">
                    <div class="tm-contact-block text-center">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">مکان بر روی نقشه </h3>
                            </div>
                            <div id="map"></div>
                        </div>
                    </div>

                </div>


            </div>
        </div>
        <div class="container tm-padding-section-top">
            <div class="row ">
                <div class="col-lg-7">
                    <div class="tm-contact-formwrapper">
                        <h5>تماس با ما</h5>
                        <form id="frm_contact_us" class="tm-form">
                            <div class="tm-form-inner">
                                <div class="tm-form-field">
                                    <input type="text" name="full_name" placeholder="نام و نام خانوادگی*">
                                </div>
                                <div class="tm-form-field">
                                    <input type="email" name="email" placeholder="ایمیل*">
                                </div>
                                <div class="tm-form-field">
                                    <input type="text" name="subject" placeholder="موضوع*">
                                </div>
                                <div class="tm-form-field">
                                    <textarea name="message" cols="30" rows="5" placeholder="پیام*"></textarea>
                                </div>
                                <div class="tm-form-field">
                                    {!! app('captcha')->display() !!}
                                </div>
                                <div class="tm-form-field">
                                    <button type="submit" class="tm-button">ارسال پیام<b></b></button>
                                </div>
                            </div>
                        </form>
                        <p class="form-messages"></p>
                    </div>
                </div>
                <div class="col-lg-5">
                    @isset($address)
                        <div class="tm-portfoliodetails-info m-2">


                            <ul>
                                <li><b> <i class="fa fa-address"></i> آدرس :</b>{{$address}}</li>
                            </ul>
                        </div>
                    @endisset
                    @isset($tel_1)
                        <div class="tm-portfoliodetails-info m-2">
                            <ul>
                                <li><b> <i class="fa fa-phone "></i> تلفن :</b><a
                                        href="tel:{{$tel_1}}">{{$tel_1}}</a></li>
                            </ul>
                        </div>
                    @endisset
                    @isset($tel_2)
                        <div class="tm-portfoliodetails-info m-2">
                            <ul>
                                <li><b> <i class="fa fa-phone "></i> تلفن :</b><a
                                        href="tel:{{$tel_2}}">{{$tel_2}}</a></li>
                            </ul>
                        </div>
                    @endisset
                    @isset($fax)
                        <div class="tm-portfoliodetails-info m-2">
                            <ul>
                                <li><b> <i class="fa fa-print "></i> فکس : </b><a href="tel:{{$fax}}">{{$fax}}</a>
                                </li>
                            </ul>
                        </div>
                    @endisset
                    @isset($email)
                        <div class="tm-portfoliodetails-info m-2">
                            <ul>
                                <li><b> <i class="fa fa-envelope"></i> ایمیل :</b><a
                                        href="mailto:{{$email}}">{{$email}}</a></li>
                            </ul>
                        </div>
                    @endisset

                </div>
            </div>
        </div>
    </div>
    <!--// Contact Us -->
@endsection
@push("script")
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.3/leaflet.js"></script>
    <script>

        var map = L.map('map').setView([{{$latitude}},{{$longitude}}], 15);

        L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
            attribution: 'ghdhb',
            maxZoom: 18,
            id: 'sonihal.9b051ec5',
            accessToken: 'pk.eyJ1Ijoic29uaWhhbCIsImEiOiIxNGViNGQ1YjdkZTgyNDM2OGY2ZTFmYzRiYzVmODgwYyJ9.hvFFPqS5Mltym7RhKYwLNg'
        }).addTo(map);
        L.marker([{{$latitude}},{{$longitude}}]).addTo(map)
            .bindPopup('{{$site->title}}')
            .openPopup();

    </script>
    <script src="{{theme_assets("assets/plugin/validation/validate.min.js")}}"></script>
    <script src="{{theme_assets("assets/script/contact_us.js")}}"></script>

@endpush
