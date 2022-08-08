<section class="page-section">
    <div class="container shop text-center">
        <div class="row">
            @if($posts!=null && count($posts)>0)
                @foreach($posts as $item)
                    <?php
                    $post_meta = ResToModel($item->post_meta);
                    $customer = $post_meta["customer"];
                    $start_date = $post_meta["start_date"];
                    $end_date = $post_meta["end_date"];
                    ?>
                    <div class="col-sm-4 col-md-3">
                        <div class="product-item code-{{$item->id}}">
                            <div class="product-img">
                                <img src="{{$item->thumb}}" alt="{{$item->title}}" width="265" height="276"/>
                                <div class="product-overlay">
                                    <div class="add-to-cart">
                                        <a href="/{{$locale}}{{$item->link_address}}">
                                            <i class="fa fa-shopping-cart"></i> جزییات</a>
                                    </div>
                                    <div class="quick-view">
                                        <a href="{{$item->thumb}}" data-rel="prettyPhoto[portfolio]">
                                            <i class="fa fa-eye"></i> بزرگنمایی</a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-details">
                                <h4>{{$item->title}}</h4>
                                <h5 class="text-color">{{$customer}}</h5>
                            </div>
                        </div>
                    </div>
                    <!-- .product -->
                @endforeach
                <div class="row">
                    <div class="col-md-12">
                        <nav class="navbar-right">
                            <ul class="pagination">
                                <li>
                                    <a href="/{{$posts->previousPageUrl()}}">
                                        <span aria-hidden="true"><i class="fa fa-angle-left"></i></span>
                                    </a>
                                </li>
                                @for($i=1;$i<=$posts->lastPage();$i++)

                                    @if($i==$posts->currentPage())
                                        <li class="active">
                                            <a href="{{$posts->url($i)}}">{{$i}}
                                                <span class="sr-only">(current)</span>
                                            </a>
                                        </li>
                                    @else
                                        <li>
                                            <a href="{{$posts->url($i)}}">
                                                {{$i}}
                                            </a>
                                        </li>

                                    @endif
                                @endfor
                                <li>
                                    <a href="{{$posts->nextPageUrl()}}">
                                        <span aria-hidden="true"><i class="fa fa-angle-right"></i></span>
                                    </a>
                                </li>

                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- pagination -->
            @else
                <div class="row">
                    <div class="alert alert-warning">
                        <h2> مشکلی پیش آمده است</h2>
                        <h4>چیزی برای نمایش یافت نشد .</h4>
                        <a href="/" class="tm-button">بازگشت به صفحه اصلی</a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>
<!-- page-section -->

<div id="modal-load">

</div>

@push("script")
    <script src="{{theme_assets("assets/script/products.js")}}"></script>
@endpush
