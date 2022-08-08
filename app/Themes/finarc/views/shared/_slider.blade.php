@php
    $slider_row = 1;
@endphp

<!-- slider section start -->
<section class="section swiper-container swiper-slider swiper-slider-modern" data-loop="true" data-autoplay="5000"
         data-simulate-touch="true" data-nav="true" data-slide-effect="fade">
    <div class="swiper-wrapper text-left">

        <!-- slide 1 start -->
        @foreach($sliders as $item)

            <div class="swiper-slide" data-slide-bg="{{$item->photo}}">
                <div class="swiper-slide-caption">
                    <div class="container">
                        <div class="row">
                            <div class="col-11 col-sm-9 col-md-8 col-lg-7 col-xl-6 col-xxl-5">
                                <div class="slider-modern-box">
                                    <h4 class="oh slider-modern-title">
                                        <span data-caption-animate="slideInDown"
                                              data-caption-delay="0">{{$item->title}}</span>
                                        <span data-caption-animate="slideInUp"
                                              data-caption-delay="0">{{$item->sub_title}}</span>
                                    </h4>
                                    <p data-caption-animate="fadeInRight"
                                       data-caption-delay="400">{{$item->description}}</p>
                                    @if($item->link !=null)
                                        <div class="oh button-wrap"><a
                                                class="button button-default-outline-2 button-ujarak"
                                                href="{{$item->link}}" data-caption-animate="slideInLeft"
                                                data-caption-delay="400">جزییات</a></div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>

    <!-- Swiper Navigation-->
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
    <!-- Swiper Pagination-->
    <div class="swiper-pagination swiper-pagination-style-2"></div>
</section>
<!-- slider section end -->
