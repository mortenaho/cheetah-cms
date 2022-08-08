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

@section("breadcrumb")
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/{{$locale}}"><i class="fa fa-home"></i>خانه</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">تماس با ما</li>
                            </ul>
                        </nav>
                    </div>
                </div>
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

    <!-- google map start -->
    <div class="map-area section-padding">
        <div id="map"></div>
    </div>
    <!-- google map end -->

    <!-- contact area start -->
    <div class="contact-area section-padding pt-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact-message">
                        <h4 class="contact-title">با ما تماس بگیرید</h4>
                        <form role="form" name="frm_contact_us" id="frm_contact_us" method="post" class="contact-form">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input name="full_name" placeholder="نام و نام خانوادگی*" type="text">
                                </div>


                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input name="email" placeholder="ایمیل*" type="text">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-6">
                                    <input name="subject" placeholder="موضوع*" type="text">
                                </div>
                                <div class="col-12">
                                    <div class="contact2-textarea text-center">
                                        <textarea placeholder="پیام*" name="message" class="form-control2"></textarea>
                                    </div>
                                    {!! app('captcha')->display() !!}
                                    <div class="contact-btn">
                                        <button class="btn btn-sqr" type="submit">ارسال پیام</button>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-center">
                                    <p class="form-messege"></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-info">
                        <h4 class="contact-title">اطلاعات تماس</h4>
                        <p></p>
                        <ul>
                            @isset($address)
                                <li><i class="fa fa-map-marker"></i> آدرس : {{$address}}    </li>
                            @endisset
                            @isset($email)
                                <li><i class="fa fa-envelope-o"></i> ایمیل : {{$email}}</li>
                            @endisset
                            @isset($fax)
                                <li><i class="fa fa-fax"></i> فکس : {{$fax}}    </li>
                            @endisset
                            @isset($tel_1)
                                <li><i class="fa fa-phone"></i> {{$tel_1}}</li>
                            @endisset
                            @isset($tel_2)
                                <li><i class="fa fa-phone"></i> {{$tel_2}}</li>
                            @endisset
                        </ul>
                        <div class="working-time">
                            {{--                            <h6>Working Hours</h6>--}}
                            {{--                            <p><span>Monday – Saturday:</span>08AM – 22PM</p>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact area end -->

@endsection
@push("script")
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.3/leaflet.js"></script>
    <script>

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
            attribution: 'مکان ما',
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1
        }).addTo(mymap);

        L.marker([{{$latitude}}, {{$longitude}}]).addTo(mymap)
            .bindPopup("<b> {{$site->title}} </b>").openPopup();

        var popup = L.popup();




    </script>
    <script src="{{theme_assets("assets/script/contact_us.js")}}"></script>
@endpush
