<?php
$services = post_get::query([["post_type", "=", "service"], ["status", "=", "1"], ["featured", "=", "1"]]);
?>
@if(isset($services) && count($services)>0)
    <!-- Services Area -->
    {{--    <div class="tm-section services-area bg-grey tm-padding-section">--}}
    {{--        <div class="container">--}}
    {{--            <div class="row justify-content-center">--}}
    {{--                <div class="col-xl-6 col-lg-7 col-md-10 col-12">--}}
    {{--                    <div class="tm-section-title text-center">--}}
    {{--                        <h2>خدمات ما</h2>--}}
    {{--                        <span class="divider"><i class="fa fa-gear"></i></span>--}}
    {{--                        <p></p>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <div class="row mt-30-reverse">--}}
    {{--            @foreach($services as $item)--}}
    {{--                <!-- Single Service -->--}}
    {{--                    <div class="col-lg-4 col-md-6 col-12 mt-30">--}}
    {{--                        <div class="tm-service text-center wow fadeInUp">--}}
    {{--                                    <span class="tm-service-icon">--}}
    {{--                                        <img src="{{$item->thumb}}" alt="{{$item->title}}">--}}
    {{--                                    </span>--}}
    {{--                            <div class="tm-service-content">--}}
    {{--                                <h5><a href="{{$item->link_address}}">{{$item->title}}</a></h5>--}}
    {{--                                <p>{{$item->excerpt}}</p>--}}
    {{--                                <a href="{{$item->link_address}}" class="tm-readmore">بیشتر بخوانید</a>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                    <!--// Single Service -->--}}
    {{--                @endforeach--}}
    {{--            </div>--}}
    {{--            <div class="col-lg-12">--}}
    {{--                <div class="tm-portfolio-loadmore text-center mt-50">--}}
    {{--                    <a href="/services" class="tm-button tm-button-dark">مشاهده همه<b style="top: 53.75px; right: 65.8833px;"></b></a>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}


    {{--    </div>--}}
    <!--// Services Area -->
@endif

@if(isset($services) && count($services)>0)
    <section id="services" class="page-section">
        <div class="container">
            <div class="section-title" data-animation="fadeInUp">
                <!-- Heading -->
                <h2 class="title">{{trans('home.services')}}</h2>
            </div>
            <?php
            $col_size = 3;
            $service_count = count($services);
            if ($service_count % 3 == 0) {
                $col_size = 4;
            }
            ?>
            <div class="row">
                @foreach($services as $item)
                    <div class="col-sm-6 col-md-{{$col_size}}" data-animation="fadeInLeft">
                        <div class="boxed-block light-bg opacity pad-20 bottom-margin-30">
                            <a href="/{{$locale}}{{$item->link_address}}">
                                <!-- image -->
                                <img src="{{$item->thumb}}" alt="{{$item->title}}" width="400" height="273"/>
                                <!-- Title -->
                                <h5 class="title tb-margin-10">{{$item->title}}</h5>
                                <!-- Text -->
                                <div>{{$item->excerpt}}</div>
                            </a>
                        </div>
                    </div>
                @endforeach


                {{--            <div class="col-sm-6 col-md-4" data-animation="fadeInUp">--}}
                {{--                <div class="boxed-block light-bg opacity pad-20 bottom-margin-30">--}}
                {{--                    <a href="#">--}}
                {{--                        <!-- image -->--}}
                {{--                        <img src="img/sections/archi-2.jpg" alt="" width="400" height="273" />--}}
                {{--                        <!-- Title -->--}}
                {{--                        <h5 class="title tb-margin-10">Construction Consultant</h5>--}}
                {{--                        <!-- Text -->--}}
                {{--                        <div>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those--}}
                {{--                            intereste.</div></a>--}}
                {{--                </div>--}}
                {{--            </div>--}}
                {{--            <div class="col-sm-6 col-md-4" data-animation="fadeInRight">--}}
                {{--                <div class="boxed-block light-bg opacity pad-20 bottom-margin-30">--}}
                {{--                    <a href="#">--}}
                {{--                        <!-- image -->--}}
                {{--                        <img src="img/sections/archi-5.jpg" alt="" width="400" height="273" />--}}
                {{--                        <!-- Title -->--}}
                {{--                        <h5 class="title tb-margin-10">House Renovation</h5>--}}
                {{--                        <!-- Text -->--}}
                {{--                        <div>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those--}}
                {{--                            intereste.</div></a>--}}
                {{--                </div>--}}
                {{--            </div>--}}

            </div>
            <div class="clearfix"></div>
        </div>
    </section>
@endif
