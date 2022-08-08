<main class="main-content">

    <!-- Shop Page Area -->
    <div class="tm-section shop-page-area bg-white tm-padding-section">
        <div class="container">
            <div class="tm-shop-productsarea">
                <form action="#" class="tm-shop-header">
                    <p class="tm-shop-countview">نمایش 1 تا {{$posts->perPage()}} از {{$posts->total()}}</p>

                </form>
                <div class="tm-shop-products">
                    <div class="row mt-30-reverse">
                    @if($posts!=null && count($posts)>0)
                        @foreach($posts as $item)
                            <?php
                            $post_meta = ResToModel($item->post_meta);
                            $price = $post_meta["price"];
                            $discount = $post_meta["discount"];
                            ?>

                            <!-- Single Product -->
                                <div class="col-lg-3 col-md-4 col-sm-6 col-12 mt-30 card card-body m-2">
                                    <div id="product-box-{{$item->id}}" class="tm-product wow fadeInUp">
                                        <div class="tm-product-image">
                                            <a class="tm-product-imagelink" href="{{$item->link_address}}">
                                                <img style="object-fit: cover;height: 250px;" src="{{$item->thumb}}"
                                                     alt="{{$item->title}}">
                                            </a>
                                            <ul class="tm-product-actions">
                                                <li>
                                                    <button data-pid="{{$item->id}}" type="button"
                                                            class="product_details"><i class="fa fa-eye"></i></button>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="tm-product-content">
                                            <h5 class="tm-product-title"><a
                                                    href="{{$item->link_address}}">{{$item->title}}</a></h5>
                                            <div class="tm-product-rating"></div>
                                            @isset($price)
                                                <h5 class="tm-product-price p-1">{{$price}} تومان</h5>
                                            @endisset
                                        </div>
                                    </div>
                                </div>
                                <!--// Single Product -->
                            @endforeach
                        @else
                            <div class="tm-pnf">

                                <h2> مشکلی پیش آمده است</h2>
                                <h4>چیزی برای نمایش یافت نشد .</h4>
                                <a href="/" class="tm-button">بازگشت به صفحه اصلی</a>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="tm-pagination mt-50">
                    <ul>
                        <li><a href="{{$posts->previousPageUrl()}}"><</a></li>
                        @for($i=1;$i<=$posts->lastPage();$i++)
                            @if($i==$posts->currentPage())
                                <li class="is-active"><a href="{{$posts->url($i)}}">{{$i}}</a></li>
                            @else
                                <li><a href="{{$posts->url($i)}}">{{$i}}</a></li>
                            @endif


                        @endfor
                        <li><a href="{{$posts->nextPageUrl()}}">&gt;</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--// Shop Page Area -->
    <div id="modal-load">

    </div>

</main>
@push("script")

    <script src="{{theme_assets("assets/script/products.js")}}"></script>

@endpush
