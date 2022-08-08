<?php
$products = get_post("product", [["featured", 1],["language",app()->getLocale()]], 6, ["post_meta"]);
?>

@if(isset($products)  && count($products)>0)
    <section id="services" class="services-section">
        <div class="auto-container">
            <!--Sec Title-->
            <div class="sec-title centered">
                <h4>{{trans('home.products')}}</h4>
                <div class="separater"></div>
                <div class="text"></div>
            </div>
            <?php
            $col_size = 3;
            $products_count = count($products);
            if ($products_count % 3 == 0) {
                $col_size = 4;
            }
            ?>
            <div class="row clearfix">
            @foreach($products as $item)
                <!--Services Block-->
                    <?php
                    $post_meta = ResToModel($item->post_meta);
                    $price = $post_meta["price"];
                    $discount = $post_meta["discount"];

                    if (!isset($price)) {
                        $price = "";
                    }
                    if (!isset($discount)) {
                        $discount = "";
                    }
                    ?>
                    <div class="services-block col-lg-{{$col_size}} col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="upper-box">
                                <span
                                    class="icon flaticon-chemistry-class-flask-with-liquid-for-experimentation"></span>
                                <h3><a href="/{{$locale}}{{$item->link_address}}">{{$item->title}}</a></h3>
                            </div>
                            <div class="lower-box">
                                <div class="image">
                                    <img src="{{$item->thumb}}" alt="{{$item->title}}"/>
                                    <div class="overlay-box">
                                        <div class="text">
                                            {{$item->excerpt}}
                                        </div>
                                        <a href="/{{$locale}}{{$item->link_address}}" class="link-btn"><span
                                                class="fa fa-link"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Services Block-->
                @endforeach


            </div>
        </div>
    </section>
@endif
