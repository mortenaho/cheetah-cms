<?php
$services =post_get::query([["post_type","=","service"],["status","=","1"],["featured","=","1"]]);
?>
@if(isset($services) && count($services)>0)
    <!-- Services Area -->
    <div class="tm-section services-area bg-grey tm-padding-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-7 col-md-10 col-12">
                    <div class="tm-section-title text-center">
                        <h2>خدمات ما</h2>
                        <span class="divider"><i class="fa fa-gear"></i></span>
                        <p></p>
                    </div>
                </div>
            </div>
            <?php
            $col_size = 3;
            $service_count = count($services);
            if ($service_count % 3 == 0) {
                $col_size = 4;
            }
            ?>
            <div class="row mt-30-reverse">
            @foreach($services as $item)
                <!-- Single Service -->
                    <div class="col-lg-{{$col_size}} col-md-6 col-12 mt-30">
                        <div class="tm-service text-center wow fadeInUp">
                                    <span class="tm-service-icon">
                                        <img src="{{$item->thumb}}" alt="{{$item->title}}">
                                    </span>
                            <div class="tm-service-content">
                                <h5><a href="{{$item->link_address}}">{{$item->title}}</a></h5>
                                <p>{{$item->excerpt}}</p>
                                <a href="{{$item->link_address}}" class="tm-readmore">بیشتر بخوانید</a>
                            </div>
                        </div>
                    </div>
                    <!--// Single Service -->
                @endforeach
            </div>
            <div class="col-lg-12">
                <div class="tm-portfolio-loadmore text-center mt-50">
                    <a href="/services" class="tm-button tm-button-dark">مشاهده همه<b style="top: 53.75px; right: 65.8833px;"></b></a>
                </div>
            </div>
        </div>


    </div>
    <!--// Services Area -->
@endif
