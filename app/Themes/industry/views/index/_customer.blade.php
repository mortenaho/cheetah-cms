<?php
$customer =post_get::query([["post_type","=","customer"],["status","=","1"]]);
?>

@if(isset($customer) && count($customer)>0)

    <section class="clients-section">
        <div class="auto-container">
            <div class="row clearfix">

                <!--Title Column-->
                <div class="title-column col-lg-3 col-md-12 col-sm-12">
                    <h4>{{trans('home.customers')}}</h4>
                </div>
                <!--Clients Column-->
                <div class="clients-column col-lg-9 col-md-12 col-sm-12">
                    <div class="sponsors-outer">
                        <!--Sponsors Carousel-->
                        <ul class="sponsors-carousel owl-carousel owl-theme">
                            @foreach($customer as $item)
                            <li class="slide-item">
                                <figure class="image-box"><a href="/{{$locale}}{{$item->link_address}}"><img src="{{$item->thumb}}" alt="{{$item->title}}"></a>
                                </figure>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endif
