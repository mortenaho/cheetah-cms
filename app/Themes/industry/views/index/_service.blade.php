<?php
$services = post_get::query([["post_type", "=", "service"], ["status", "=", "1"], ["featured", "=", "1"]]);
?>

@if(isset($services) && count($services)>0)

    <!--Services Section Two-->
    <section class="services-section-two">
        <div class="auto-container">
            <div class="inner-container">
                <div class="four-item-carousel owl-carousel owl-theme">

                    <!--Services Block Two-->
                    @foreach($services as $item)
                    <div class="services-block-two">
                        <div class="inner-box">
                            <div class="upper-box">
                                <div class="image">
                                    <img src="{{$item->thumb}}" alt="{{$item->title}}"/>
{{--                                    <div class="icon-box">--}}
{{--                                        <span class="icon flaticon-branch-with-leaves-black-shape"></span>--}}
{{--                                    </div>--}}
                                    <div class="overlay-box">
                                        <div class="overlay-inner">
                                            <div class="text">
                                                {{$item->excerpt}}
                                            </div>
                                            <a href="/{{$locale}}{{$item->link_address}}" class="read-more">Read More <span
                                                    class="fa fa-angle-double-right"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="lower-box">
                                <h3><a href="/{{$locale}}{{$item->link_address}}">{{$item->title}}</a></h3>
{{--                                <div class="title">Technoeconomic Activities</div>--}}
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <!--Services Block Two-->
                </div>
            </div>
        </div>
    </section>
    <!--End Services Section Two-->

@endif
