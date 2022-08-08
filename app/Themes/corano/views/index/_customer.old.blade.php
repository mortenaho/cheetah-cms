<?php
$customer =post_get::query([["post_type","=","customer"],["status","=","1"]]);
?>

@if(isset($customer) && count($customer)>0)
    <!-- Brandlogo Area -->
    <div class="tm-section brand-logo-area bg-grey tm-padding-section">
        <div class="container">
            <div class="brandlogo-slider tm-slider-arrow tm-slider-arrow-hovervisible">
            @foreach($customer as $item)
                <!-- Brang Logo Single -->
                    <div class="brandlogo">
                        <a href="{{$item->link_address}}">
                            <img style="height: 120px;width: 80%;object-fit: contain;" src="{{$item->thumb}}"
                                 alt="{{$item->title}}">
                        </a>
                    </div>
                    <!--// Brang Logo Single -->
                @endforeach
            </div>
        </div>
    </div>
    <!--// Brandlogo Area -->
@endif



@if(isset($customer) && count($customer)>0)
<section class="p-top-70 p-bottom-70">

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="logo-carousel-one owl-carousel">
                    @foreach($customer as $item)
                    <div class="carousel-single">
                        <img src="{{$item->thumb}}" alt="{{$item->title}}">
                    </div><!-- ends: .carousel-single -->
                    @endforeach

                </div>
            </div>
        </div>
    </div>

</section>
@endif
