<?php
$customer =post_get::query([["post_type","=","customer"],["status","=","1"]]);
?>

@if(isset($customer) && count($customer)>0)

    <!-- CLIENT LOGO SECTION START -->
    <section class="section section-sm bg-default" style="direction:ltr !important;text-align:left;">
        <div class="container" style="direction:ltr !important;text-align:left;">
            <!-- Owl Carousel-->
            <div class="owl-carousel owl-clients" style="direction:ltr !important;text-align:left;" data-items="1" data-sm-items="2" data-md-items="3" data-lg-items="4" data-margin="30" data-dots="true" data-animation-in="fadeIn" data-animation-out="fadeOut" data-autoplay="true">

                @foreach($customer as $item)
                    <a class="clients-modern" href="#">
                        <img src="{{$item->thumb}}" alt="{{$item->title}}"  />
                    </a>
                @endforeach


            </div>
        </div>
    </section>
    <!-- CLIENT LOGO  SECTION End -->

@endif
