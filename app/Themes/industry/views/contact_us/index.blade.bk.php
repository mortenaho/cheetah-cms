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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.3/leaflet.css"/>

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
