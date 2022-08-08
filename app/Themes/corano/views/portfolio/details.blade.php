@extends("home::shared.layout",
["title"=>"نمونه کار",
])

<?php
$post_meta = ResToModel($post->post_meta);

$project = isset($post_meta) && count($post_meta) > 0 ? $post_meta["project"]: "";
$customer = isset($post_meta) && count($post_meta) > 0 ? $post_meta["customer"] : "";
$start_date = isset($post_meta) && count($post_meta) > 0 ? $post_meta["start_date"]: "";
$end_date = isset($post_meta) && count($post_meta) > 0 ?$post_meta["end_date"] : "";
$project_status = isset($post_meta) && count($post_meta) > 0 ?$post_meta["project_status"]: "";
?>

@section("breadcrumb")
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/{{$locale}}"><i class="fa fa-home"></i>خانه</a></li>
                                <li class="breadcrumb-item"><a href="/{{$locale}}/portfolio"> نمونه کار ها  </a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{$post->title}}</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section("body")
    <form role="form" name="frm_visit" id="frm_visit" method="post">
        {{csrf_field()}}
        <input type="hidden" name="post_id" id="post_id" value="{{$post->id}}">
        <input type="hidden" name="post_type" id="post_type" value="{{$post->post_type}}">
        <input type="hidden" name="category_id"  id="category_id" value="{{$post->category_id}}">
    </form>
    <!-- page main wrapper start -->
    <div class="shop-main-wrapper section-padding pb-0" >
        <div class="container">
            <div class="row">
                <!-- product details wrapper start -->
                <div class="col-lg-12 order-1 order-lg-2">
                    <!-- product details inner end -->
                    <div class="product-details-inner">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="product-large-slider">
                                    <div class="pro-large-img img-zoom">
                                        <img src="{{$post->thumb}}" alt="{{$post->title}}" />
                                    </div>
                                    @foreach($post->attachments as $item)
                                        <div class="pro-large-img img-zoom">
                                            <img src="{{$item->file}}" alt="{{$item->title}}" />
                                        </div>
                                    @endforeach

                                </div>
                                <div class="pro-nav slick-row-10 slick-arrow-style">
                                    <div class="pro-nav-thumb">
                                        <img src="{{$post->thumb}}" alt="{{$post->title}}" />
                                    </div>
                                    @foreach($post->attachments as $item)
                                        <div class="pro-nav-thumb">
                                            <img src="{{$item->file}}" alt="{{$item->title}}" />
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="product-details-des" style="direction: rtl;text-align: right;">
{{--                                    <div class="manufacturer-name">--}}
{{--                                        <a href="#">{{$post->title}}</a>--}}
{{--                                    </div>--}}
                                    <h4 class="product-name">{{$post->title}}</h4>
                                    <div class="ratings d-flex">
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
{{--                                        <div class="pro-review">--}}
{{--                                            <span>1 Reviews</span>--}}
{{--                                        </div>--}}
                                    </div>
{{--                                    <div class="price-box">--}}
{{--                                        <span class="price-regular">$70.00</span>--}}
{{--                                        <span class="price-old"><del>$90.00</del></span>--}}
{{--                                    </div>--}}

{{--                                    <div class="product-countdown" data-countdown="{{$end_date}}"></div>--}}

                                    <div class="availability">
                                        <i class="fa fa-check-circle"></i>
                                        <span>{{$project}}</span>
                                    </div>
                                    <div class="availability">
                                        <i class="fa fa-check-circle"></i>
                                        <span>{{$post->category->title}}</span>
                                    </div>
                                    <div class="availability">
                                        <i class="fa fa-check-circle"></i>
                                        <span>{{$project_status}}</span>
                                    </div>
                                    <div class="availability">
                                        <i class="fa fa-check-circle"></i>
                                        <span>{{$customer}}</span>
                                    </div>




                                    <p class="pro-desc">{{$post->excerpt}}</p>
{{--                                    <div class="quantity-cart-box d-flex align-items-center">--}}
{{--                                        <h6 class="option-title">qty:</h6>--}}
{{--                                        <div class="quantity">--}}
{{--                                            <div class="pro-qty"><input type="text" value="1"></div>--}}
{{--                                        </div>--}}
{{--                                        <div class="action_link">--}}
{{--                                            <a class="btn btn-cart2" href="#">Add to cart</a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="pro-size">--}}
{{--                                        <h6 class="option-title">size :</h6>--}}
{{--                                        <select class="nice-select">--}}
{{--                                            <option>S</option>--}}
{{--                                            <option>M</option>--}}
{{--                                            <option>L</option>--}}
{{--                                            <option>XL</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                    <div class="color-option">--}}
{{--                                        <h6 class="option-title">color :</h6>--}}
{{--                                        <ul class="color-categories">--}}
{{--                                            <li>--}}
{{--                                                <a class="c-lightblue" href="#" title="LightSteelblue"></a>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <a class="c-darktan" href="#" title="Darktan"></a>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <a class="c-grey" href="#" title="Grey"></a>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <a class="c-brown" href="#" title="Brown"></a>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                    <div class="useful-links">--}}
{{--                                        <a href="#" data-toggle="tooltip" title="Compare"><i--}}
{{--                                                class="pe-7s-refresh-2"></i>compare</a>--}}
{{--                                        <a href="#" data-toggle="tooltip" title="Wishlist"><i--}}
{{--                                                class="pe-7s-like"></i>wishlist</a>--}}
{{--                                    </div>--}}
                                    <div class="like-icon">
                                        <a class="facebook" href="#"><i class="fa fa-facebook"></i>like</a>
                                        <a class="twitter" href="#"><i class="fa fa-twitter"></i>tweet</a>
                                        <a class="pinterest" href="#"><i class="fa fa-pinterest"></i>save</a>
                                        <a class="google" href="#"><i class="fa fa-google-plus"></i>share</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- product details inner end -->

                    <!-- product details reviews start -->
                    <div class="product-details-reviews section-padding pb-0" style="direction: rtl;">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="product-review-info">
                                    <ul class="nav review-tab">
                                        <li>
                                            <a class="active" data-toggle="tab" href="#tab_one">شرح</a>
                                        </li>

                                    </ul>
                                    <div class="tab-content reviews-tab">
                                        <div class="tab-pane fade show active" id="tab_one">
                                            <div class="tab-one">
                                                <p>{!! $post->content !!}</p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- product details reviews end -->
                </div>
                <!-- product details wrapper end -->
            </div>
        </div>
    </div>
    <!-- page main wrapper end -->

@endsection

@push("script")
    <script src="/js/visits.js"></script>
@endpush


