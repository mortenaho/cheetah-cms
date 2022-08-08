<?php
$products = get_post("product", [["featured", 1],["language",app()->getLocale()]], 6, ["post_meta"]);
?>

@if(isset($products)  && count($products)>0)
    <!--// Our Portfolios -->
    <section id="pricing" class="page-section">
        <div class="container">
            <div class="section-title" data-animation="fadeInUp">
                <!-- Heading -->
                <h2 class="title"> {{trans('home.products')}}</h2>
            </div>
            <?php
            $col_size = 3;
            $products_count = count($products);
            if ($products_count % 3 == 0) {
                $col_size = 4;
            }
            ?>
            <div class="row text-center">

                @foreach($products as $item)

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


                    <div class="col-sm-6 col-md-6 col-lg-{{$col_size}}" data-animation="fadeInLeft">
                        <div class="pricing light-bg" style="max-width: 100%;">
                            <div class="title">
                                <a href="/{{$locale}}{{$item->link_address}}">{{$item->title}}</a>
                            </div>
                            <div class="price-box">
                                <!-- Price -->
                                <div class="starting">شروع قیمت</div>
                                @isset($price)
                                    <div class="price">
                                        {{number_format($price)}}
                                    </div>
                                @endisset
                            </div>

                            <div>
                                <a href="/{{$locale}}{{$item->link_address}}">
                                    <img width="500" height="320" src="{{$item->thumb}}" alt="{{$item->title}}"/>
                                </a>
                            </div>
                            <ul class="options">
                                <!-- Item List -->
                                @isset($discount)
                                    {{--                                    <li class="active">{{$discount}}</li>--}}
                                @endisset
                            </ul>
                            <div class="btn-box">
                                <div class="clearfix"></div>
                                <a href="/{{$locale}}{{$item->link_address}}">
                                    <button class="btn btn-default btn-block">سفارش دهید</button>
                                </a>
                            </div>
                        </div>
                        <!-- .pricing -->
                    </div>
                @endforeach

            </div>
        </div>
    </section>

@endif
