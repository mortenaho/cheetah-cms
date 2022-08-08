<?php
$products = get_post("product", [["featured", 1]], 6, ["post_meta"]);
?>
@if(isset($products)  && count($products)>0)

    <!-- featured product area start -->
    <section class="feature-product section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- section title start -->
                    <div class="section-title text-center">
                        <h2 class="title">محصولات</h2>
                        <p class="sub-title">برخی از محصولات ما</p>
                    </div>
                    <!-- section title start -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-carousel-4_2 slick-row-10 slick-arrow-style">
                    @foreach($products as $item)
                        <?php
                        $post_meta = ResToModel($item->post_meta);
                        $price = $post_meta["price"];
                        $discount = $post_meta["discount"];
                        ?>
                        <!-- product item start -->
                            <div class="product-item">
                                <figure class="product-thumb">
                                    <a href="{{$item->link_address}}">
                                        <img class="pri-img" src="{{$item->thumb}}"
                                             alt="product">
                                        <img class="sec-img" src="{{$item->thumb}}"
                                             alt="product">
                                    </a>
                                    <div class="product-badge">
                                        <div class="product-label new">
                                            <span>new</span>
                                        </div>
                                        <div class="product-label discount">
                                            <span>10%</span>
                                        </div>
                                    </div>
                                    <div class="button-group">

                                        <a href="#" data-toggle="modal" data-target="#quick_view"><span
                                                data-toggle="tooltip" data-placement="right" title="Quick View"><i
                                                    class="pe-7s-search"></i></span></a>
                                    </div>
                                    <div class="cart-hover">
                                        <button class="btn btn-cart">add to cart</button>
                                    </div>
                                </figure>
                                <div class="product-caption text-center">
                                    <div class="product-identity">
                                        <p class="manufacturer-name"><a href="{{$item->link_address}}">Gold</a></p>
                                    </div>

                                    <h6 class="product-name">
                                        <a href="product-details.html">{{$item->title}}</a>
                                    </h6>
                                    <div class="price-box">
                                        <span class="price-regular">$60.00</span>
                                        <span class="price-old"><del>$70.00</del></span>
                                    </div>
                                </div>
                            </div>
                            <!-- product item end -->
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- featured product area end -->
@endif
