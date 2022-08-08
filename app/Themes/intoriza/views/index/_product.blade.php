<?php
$products = get_post("product", [["featured", 1]], 6, ["post_meta"]);
?>

@if(isset($products)  && count($products)>0)


    <!-- PROJECT SECTION START -->
    <div class="section-full p-t80 p-b20 bg-gray">
        <div class="container">
            <!-- TITLE START -->
            <div class="section-head text-center">
                <div class="wt-separator-outer separator-center">
                    <div class="wt-separator">
                  <span class="text-primary text-uppercase sep-line-one"
                  >برخی از پروژه های ما</span
                  >
                    </div>
                </div>
{{--                <h3>جدید ترین پروژه های ما</h3>--}}
            </div>
            <!-- TITLE END -->
        </div>
        <!-- IMAGE CAROUSEL START -->
        <div class="section-content">
            <div class="owl-carousel owl-carousel-filter owl-btn-bottom-center">

            @foreach($products as $item)
                <!-- COLUMNS 1 -->
                <div class="item">
                    <div
                        class="line-filter-outer bg-cover"
                        style="background-image: url({{$item->thumb}})"
                    >
                        <div class="hover-effect-1">
                            <div class="hover-effect-content">
                                <h4 class="m-t0 m-b25">
                                    {{$item->title}}
                                </h4>
                                <p>
                                    {{$item->excerpt}}
                                </p>
                                <a
                                    href="/{{$locale}}{{$item->link_address}}"
                                    class="site-button-link"
                                    data-hover="جزییات"
                                >جزییات</a
                                >
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            </div>
        </div>
    </div>
    <!-- PROJECT SECTION END -->
@endif
