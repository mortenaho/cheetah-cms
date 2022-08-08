<?php
$services = get_post("service", [["featured", 1],["status", 1]], 3, ["post_meta"]);
?>

@if(isset($services) && count($services)>0)

    <!-- Offer section start -->
    <section class="section section-sm bg-default bg_second_cl">
        <div class="container">
            <div class="headingTitle">
                <h4><b><span>خدمات</span></b></h4>
{{--                <p>Duis ornare diam purus, ac malesuada ante congue in. Cras gravida ex elit, vel bibendum mauris efficitur non. Sed ut massa a dui iaculis pretium eu a nunc.</p>--}}
            </div>
            <div class="row row-30 justify-content-center">
                <?php
                    $col_size = 3;
                    $service_count = count($services);
                    if ($service_count % 3 == 0) {
                        $col_size=4;
                    }
                ?>
                @foreach($services as $item)
                <div class="col-sm-6 col-lg-{{$col_size}}">
                    <div class="oh-desktop">
                        <article class="box-sportlight box-sportlight-sm"><a class="box-sportlight-figure" href="/{{$locale}}{{$item->link_address}}"><img src="{{$item->thumb}}" alt="{{$item->title}}" width="370" height="332"/></a>
                            <div class="box-sportlight-caption">
                                <h6 class="box-sportlight-title"><a href="/{{$locale}}{{$item->link_address}}">{{$item->title}}</a></h6>
{{--                                <p>{{$item->excerpt}}</p>--}}
                            </div>
                        </article>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- Offer section end -->
@endif
