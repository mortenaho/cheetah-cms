<?php
$certificates =post_get::query([["post_type","=","certificate"],["status","=","1"],["featured","=","1"]]);
?>


@if(isset($certificates) && count($certificates)>0)
<!-- certificates -->
<section id="certificate" class="page-section">
    <div class="image-bg content-in fixed" data-background="img/sections/bg/bg-12.jpg">
        <div class="overlay"></div>
    </div>
    <div class="container">
        <div class="section-title white" data-animation="fadeInUp">
            <!-- Heading -->
{{--            <h2 class="title">{{trans('home.certificate')}}</h2>--}}
            <h2 class="title">گواهینامه ها</h2>
        </div>

        <div class="row">
            <div class="col-md-12 text-center">
                <div class="owl-carousel pagination-1 light-switch" data-pagination="true" data-items="4" data-autoplay="true" data-navigation="false">
                    @isset($certificates)
                        @foreach($certificates as $item)
                                <a href="/{{$locale}}{{$item->link_address}}">
                                    <img src="{{$item->thumb}}" width="270"  alt="{{$item->title}}" />
                                </a>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<!-- certificates -->
@endif
