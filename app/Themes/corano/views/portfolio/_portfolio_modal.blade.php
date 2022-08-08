<?php
$post_meta = collect($portfolio->post_meta);
$project = $post_meta->firstWhere("meta_key", "project")->meta_value;
$customer = $post_meta->firstWhere("meta_key", "customer")->meta_value;
$start_date = $post_meta->firstWhere("meta_key", "start_date")->meta_value;
$end_date = $post_meta->firstWhere("meta_key", "end_date")->meta_value;
?>

<!-- product details inner start -->
<div class="product-details-inner">
    <div class="row">
        <div class="col-lg-5">
            <div class="product-large-slider">
                <div class="pro-large-img img-zoom">
                    <img src="{{$portfolio->thumb}}" alt="product-details"/>
                </div>
                @if(isset($portfolio->attachments) && $portfolio->attachments->count()>0)
                    @foreach($portfolio->attachments as $item)

                        <div class="pro-large-img img-zoom">
                            <img src="{{$item->file}}"/>
                        </div>

                    @endforeach
                @endif

            </div>
            <div class="pro-nav slick-row-10 slick-arrow-style">
                <div class="pro-nav-thumb">
                    <img src="{{$portfolio->thumb}}" alt="product-details"/>
                </div>
                @if(isset($portfolio->attachments) && $portfolio->attachments->count()>0)
                    @foreach($portfolio->attachments as $item)

                        <div class="pro-nav-thumb">
                            <img src="{{$item->file}}" alt="{{$item->title}}"/>
                        </div>

                    @endforeach
                @endif

            </div>
        </div>
        <div class="col-lg-7">
            <div class="product-details-des">
                <div class="manufacturer-name">
                    <a href="{{$portfolio->link_address}}">{{$portfolio->title}}</a>
                </div>
                <h4 class="product-name">{{$customer}}</h4>
{{--                <div class="ratings d-flex">--}}
{{--                    <span><i class="fa fa-star-o"></i></span>--}}
{{--                    <span><i class="fa fa-star-o"></i></span>--}}
{{--                    <span><i class="fa fa-star-o"></i></span>--}}
{{--                    <span><i class="fa fa-star-o"></i></span>--}}
{{--                    <span><i class="fa fa-star-o"></i></span>--}}
{{--                    <div class="pro-review">--}}
{{--                        <span>1 Reviews</span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="price-box">--}}
{{--                    <span class="price-regular">$70.00</span>--}}
{{--                    <span class="price-old"><del>$90.00</del></span>--}}
{{--                </div>--}}
{{--                <h5 class="offer-text"><strong></strong>تاریخ پایان:</h5>--}}
                <div class="product-countdown" data-countdown="{{$end_date}}"></div>
                <div class="availability">
                    <i class="fa fa-check-circle"></i>
                    <span>{{$end_date}}</span>
                </div>
                <p class="pro-desc">{{$portfolio->excerpt}}</p>
                <div class="quantity-cart-box d-flex align-items-center">
{{--                    <h6 class="option-title">qty:</h6>--}}
{{--                    <div class="quantity">--}}
{{--                        <div class="pro-qty"><input type="text" value="1"></div>--}}
{{--                    </div>--}}
                    <div class="action_link">
                        <a class="btn btn-cart2" href="#">جزییات کامل</a>
                    </div>
                </div>
{{--                <div class="useful-links">--}}
{{--                    <a href="#" data-toggle="tooltip" title="Compare"><i--}}
{{--                            class="pe-7s-refresh-2"></i>compare</a>--}}
{{--                    <a href="#" data-toggle="tooltip" title="Wishlist"><i--}}
{{--                            class="pe-7s-like"></i>wishlist</a>--}}
{{--                </div>--}}
                <div class="like-icon">
                    @foreach(get_social() as $item)
                        <a href="{{$item->link}}" data-toggle="tooltip" data-placement="left"
                           title="{{$item->title}}">
                            <img style="height: 25px;border-radius: 50%" src="{{$item->icon}}">
                        </a>
                    @endforeach
                    {{--                                    <a class="facebook" href="#"><i class="fa fa-facebook"></i>like</a>--}}
                    {{--                                    <a class="twitter" href="#"><i class="fa fa-twitter"></i>tweet</a>--}}
                    {{--                                    <a class="pinterest" href="#"><i class="fa fa-pinterest"></i>save</a>--}}
                    {{--                                    <a class="google" href="#"><i class="fa fa-google-plus"></i>share</a>--}}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- product details inner end -->

@push("script")
    <!-- Js Files -->
    {{--    <script src="{{theme_assets("assets/js/modernizr-3.6.0.min.js")}}"></script>--}}
    {{--    <script src="{{theme_assets("assets/plugin/loaders/pace.min.js")}}"></script>--}}

@endpush
