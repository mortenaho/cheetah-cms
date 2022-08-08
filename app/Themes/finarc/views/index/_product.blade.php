<?php
$products = get_post("product", [["featured", 1]], 6, ["post_meta"]);
?>

@if(isset($products)  && count($products)>0)

    <!-- Projects section start -->
    <section class="section section-sm bg-default">
        <div class="container">
            <div class="headingTitle">
                <h1> <span>برخی از پروژه ها</span></h1>
                {{--                <p>Duis ornare diam purus, ac malesuada ante congue in. Cras gravida ex elit, vel bibendum mauris efficitur non. Sed ut massa a dui iaculis pretium eu a nunc.</p>--}}
            </div>
            <?php
            $col_size = 3;
            $products_count = count($products);
            if ($products_count % 3 == 0) {
                $col_size = 4;
            }
            ?>
            <div class="row row-30" data-lightgallery="group">
                @foreach($products as $item)
                <div class="col-sm-6 col-lg-{{$col_size}}">
                    <div class="oh-desktop">
                        <article class="thumbnail thumbnail-mary thumbnail-sm">
                            <div class="thumbnail-mary-figure"><img src="{{$item->thumb}}" alt="" width="370" height="303"/> </div>
                            <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="{{$item->thumb}}" data-lightgallery="item"><img src="{{$item->thumb}}" alt="" width="370" height="303"/></a>
                                <h5 class="thumbnail-mary-title"><a href="/{{$locale}}{{$item->link_address}}">{{$item->title}} <span> {{$item->excerpt}}</span></a></h5>
                            </div>
                        </article>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- Projects section end -->
@endif
