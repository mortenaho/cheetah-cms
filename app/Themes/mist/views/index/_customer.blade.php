<?php
$customer =post_get::query([["post_type","=","customer"],["status","=","1"]]);
?>

@if(isset($customer) && count($customer)>0)
    <!-- Brandlogo Area -->
{{--    <div class="tm-section brand-logo-area bg-grey tm-padding-section">--}}
{{--        <div class="container">--}}
{{--            <div class="brandlogo-slider tm-slider-arrow tm-slider-arrow-hovervisible">--}}
{{--            @foreach($customer as $item)--}}
{{--                <!-- Brang Logo Single -->--}}
{{--                    <div class="brandlogo">--}}
{{--                        <a href="{{$item->link_address}}">--}}
{{--                            <img style="height: 120px;width: 80%;object-fit: contain;" src="{{$item->thumb}}"--}}
{{--                                 alt="{{$item->title}}">--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                    <!--// Brang Logo Single -->--}}
{{--                --}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <!--// Brandlogo Area -->

    <section id="clients" class="page-section light-bg tb-pad-20">
        <div class="container">
            <div class="row" data-animation="fadeInUp">
                <div class="col-md-12 text-center">
                    <div class="owl-carousel pagination-1" data-pagination="false" data-items="6" data-autoplay="true"
                         data-navigation="false">
                        @foreach($customer as $item)
                        <div class="boxed-block inline-block margin-10">
                            <a href="/{{$locale}}{{$item->link_address}}"><img src="{{$item->thumb}}" width="130" height="130" alt="{{$item->title}}"></a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

@endif
