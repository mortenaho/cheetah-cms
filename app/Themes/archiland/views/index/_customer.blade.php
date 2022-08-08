<?php
$customer =post_get::query([["post_type","=","customer"],["status","=","1"]]);
?>

@if(isset($customer) && count($customer)>0)



    <!-- CLIENT LOGO SECTION START -->
    <div class="section-full small-device bg-gray p-t80 p-b60">
        <div class="container">
            <!-- TITLE START -->
            <div class="section-head text-center">
                <div class="wt-separator-outer separator-center">
                    <div class="wt-separator">
                  <span class="text-primary text-uppercase sep-line-one">
                      مشتریان ما
                  </span>
                    </div>
                </div>
{{--                <h3>مشتریان</h3>--}}
            </div>
            <!-- TITLE END -->
            <div class="section-content p-tb10 owl-btn-vertical-center">
                <div class="owl-carousel home-client-carousel-2">
                    @foreach($customer as $item)
                    <div class="item">
                        <div class="ow-client-logo">
                            <div class="client-logo client-logo-media">

                                <a href="javascript:void(0);" >
                                    <img src="{{$item->thumb}}" alt="{{$item->title}}"/>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <!-- CLIENT LOGO  SECTION End -->

@endif
