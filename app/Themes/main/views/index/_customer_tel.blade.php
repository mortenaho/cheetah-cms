@if(isset($customer_tel) && count($customer_tel)>0)
    <!-- Testimonial Area -->
    <div class="tm-section testimonial-area tm-padding-section tm-parallax" data-overlay="9"
         data-bgimage="{{$site->header_banner}}" style="background-color: {{$site->header_color}}">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-7 col-md-10 col-12">
                    <div class="tm-section-title tm-section-title-white text-center">
                        <h2>آنچه مشتریان می گویند</h2>
                        <span class="divider"><i class="fa fa-gear"></i></span>
                        <p></p>
                    </div>
                </div>
            </div>
            <div class="row testimonial-slider-active">
            @foreach($customer_tel as $item)
                <!-- Testimonial -->
                    <div class="col-lg-6">
                        <div class="tm-testimonial">
                            <div class="tm-testimonial-content">
                                <i class="fa fa-quote-left"></i>
                                <p>{{$item->message}}</p>
                            </div>
                            <div class="tm-testimonial-bottom">
                                <div class="tm-testimonial-authorimage">
                                    <img src={{theme_assets("assets/images/anonymous-avatar-sm.jpg")}}"
                                         alt="{{$item->full_name}}">
                                </div>
                                <div class="tm-testimonial-authorcontent">
                                    <h5>{{$item->full_name}}</h5>
                                    <p>مشتری</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--// Testimonial -->
                @endforeach
            </div>
        </div>
    </div>
    <!--// Testimonial Area -->
@endif
