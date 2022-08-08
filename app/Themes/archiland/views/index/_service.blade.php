<?php
$services = get_post("service", [["featured", 1],["status", 1]], 3, ["post_meta"]);
?>

@if(isset($services) && count($services)>0)

    <section id="section-about"   >
        <div class="container">
            <div class="row">
                <?php
                $col_size = 3;
                $service_count = count($services);
                if ($service_count % 3 == 0) {
                    $col_size = 4;
                }
                ?>
                <div class="col-md-12  text-center wow fadeInUp">
                    <h1>خدمات ما</h1>
                    <div class="separator"><span><i class="fa fa-circle"></i></span></div>
                    <div class="spacer-single"></div>
                </div>

                @foreach($services as $item)
                <div class="col-md-{{$col_size}} wow fadeInLeft">
                    <h3><span class="id-color">{{$item->title}}</span> </h3>
                    {{$item->excerpt}}
                    <div class="spacer-single"></div>
                    <a class="image-popup-no-margins" href="{{$item->thumb}}">
                        <img src="{{$item->thumb}}" class="img-responsive" alt="{{$item->title}}">
                    </a>
                    <a  href="/{{$locale}}{{$item->link_address}}"
                        class="btn btn-primary mt-3 p-2"
                        data-hover="بیشتر">بیشتر</a
                    >
                </div>
                @endforeach


            </div>
        </div>
    </section>

@endif
