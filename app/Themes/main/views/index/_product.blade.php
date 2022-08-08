<?php
$products = get_post("product", [["featured", 1]], 6, ["post_meta"]);
?>

@if(isset($products)  && count($products)>0)
    <!-- Our Portfolios -->
    <div class="tm-section portfolios-area bg-grey tm-padding-section bg-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-7 col-md-10 col-12">
                    <div class="tm-section-title text-center">
                        <h2>محصولات</h2>
                        <span class="divider"><i class="fa fa-gear"></i></span>

                    </div>
                </div>
            </div>
            <?php
            $col_size = 3;
            $product_count = count($products);
            if ($product_count % 3 == 0) {
                $col_size = 4;
            }
            ?>
            <div class="row tm-portfolio-wrapper mt-30-reverse">
                @foreach($products as $item)

                    <?php
                    $post_meta = ResToModel($item->post_meta);
                    $price = $post_meta["price"];
                    $discount = $post_meta["discount"];
                    ?>
                    <div
                        class="col-lg-{{$col_size}} col-md-6 col-12 tm-portfolio-item portfolio-filter-{{$item->category_id}} portfolio-filter-investment">
                        <div class="tm-portfolio mt-30 wow fadeInUp">
                            <div class="tm-portfolio-image">
                                <img
                                    style="height: 220px;object-fit: cover;"
                                    src="{{$item->thumb}}"
                                    alt="{{$item->title}}">
                                <ul class="tm-portfolio-actions">
                                    <li class="link-button">
                                        <a href="{{$item->link_address}}"><i class="fa fa-link"></i></a>
                                    </li>
                                    <li class="zoom-button">
                                        <a href="{{$item->thumb}}"><i
                                                class="fa fa-search-plus"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tm-portfolio-content">
                                <h5><a href="{{$item->link_address}}">{{$item->title}}</a></h5>
                                @isset($price)  <h6><a href=""><i class="fa fa-certificate text-danger"></i> {{$price}}
                                        تومان </a></h6> @endisset
                            </div>
                        </div>
                    </div>
                    <!--// Portfolio Single -->

                @endforeach
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="tm-portfolio-loadmore text-center mt-50">
                        <a href="/products" class="tm-button tm-button-dark">مشاهده همه<b></b></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--// Our Portfolios -->
@endif
