@extends("home::shared.layout",
["title"=>"$post->title ",
"AjaxToken"=>"true",
"captcha"=>true,

])

<?php
$post_meta = collect($post->post_meta);
$price = $post_meta->firstWhere("meta_key", "price")->meta_value;
$discount = $post_meta->firstWhere("meta_key", "discount")->meta_value;
?>
@section("breadcrumb")
    <div class="page-header" data-bgimage="{{$site->header_banner}}"
         style="background-image: url({{$site->header_banner}});"
    >
        <div class="container">
            <h2 class="title">{{$post->title}}</h2>
        </div>
        <div class="breadcrumb-box">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="/{{$locale}}/">خانه</a></li>
                    <li><a href="/{{$locale}}/products">محصولات</a></li>
                    @isset($post->category)
                        <li>
                            <a href="/{{$locale}}/category/{{$post->category->id}}/{{$post->category->url_slug}}">{{$post->category->title}}</a>
                        </li>
                    @endisset
                    <li class="active">{{$post->title}}</li>

                </ul>
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
    <section class="page-section">
        <div class="container shop">
            <div class="row">
                <div class="col-md-12 product-page">
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <div class="single-product">
                                <img id="zoom-product" src="{{$post->thumb}}" width="500" height="600" data-zoom-image="{{$post->thumb}}" />
                                <div id="zoom-product-thumb" class="zoom-product-thumb">
                                    <div class="owl-carousel navigation-shop dark-switch lr-pad-20" data-pagination="false" data-autoplay="true" data-navigation="true" data-items="3" data-tablet="4" data-mobile="3">

                                        <a href="#" data-image="{{$post->thumb}}" data-zoom-image="{{$post->thumb}}">
                                            <img id="img_0{{$post->id}}" src="{{$post->thumb}}" />
                                        </a>

                                        @if(isset($post->attachments) && $post->attachments->count()>0)
                                            @foreach($post->attachments as $item)
                                                <a href="#" data-image="{{$item->file}}" data-zoom-image="{{$item->file}}">
                                                    <img id="img_{{$item->id}}" src="{{$item->file}}" />
                                                </a>
                                            @endforeach

                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- .product -->
                        <div class="col-md-8 col-sm-6">
                            <h3 class="title">{{$post->title}}</h3>
                            <div class="product-rating pull-right">
                                <div class="star-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o"></i></div>
                            </div>
                            <br/>
                            <div class="price-details">
{{--                                @isset($discount)--}}
{{--                                    <span class="actual-price">{{number_format($discount)}}  تومان </span>--}}
{{--                                @endisset--}}
                                @isset($price)
                                        <span class="price"> {{number_format($price)}}  تومان </span></div>
                                @endisset

                            <div class="description">
                                <p>{{$post->excerpt}}</p>
                            </div>
                            <h5>دسته بندیها</h5>
                            <ul class="arrow-style">
                                @isset($post->category)
                                    <li>
                                        <a href="/{{$locale}}/category/{{$post->category->id}}/{{$post->category->url_slug}}">{{$post->category->title}}</a>
                                    </li>
                                @endisset

                            </ul>
{{--                            <div class="product-regulator">--}}
{{--                                <button id="minus" type="button">--}}
{{--                                    <i class="fa fa-minus"></i>--}}
{{--                                </button>--}}
{{--                                <div id="output">0</div>--}}
{{--                                <button id="plus" type="button">--}}
{{--                                    <i class="fa fa-plus"></i>--}}
{{--                                </button>--}}
{{--                            </div>--}}
                            @php
                                $post_meta = ResToModel($contact_info->post_meta);
                                $tel_1 = $post_meta["tel_1"];
                                $tel_2 = $post_meta["tel_2"];
                                $mobile = $post_meta["mobile"];
                            @endphp
                            <a href="/{{$locale}}/home/order/{{$post->id}}" class="btn btn-default btn-lg">برای سفارش با شماره های زیر تماس بگیرید
                            <hr/>
                                @if(!empty($tel_1) && !is_null($tel_1))
                                <span class="product-code"><i class="icon-2x icon-phone2"></i></span>
                                <span class="strong">{{$tel_1}}</span>
                                @endif
                                @if(!empty($tel_2) && !is_null($tel_2))
                                <span class="product-code"><i class="icon-2x icon-phone2"></i></span>
                                <span class="strong">{{$tel_2}}</span>
                                @endif
                                @if(!empty($mobile) && !is_null($mobile))
                                <span class="product-code"><i class="icon-2x icon-mobile"></i></span>
                                <span class="strong">{{$mobile}}</span>
                                @endif
                            </a>
{{--                            <div class="product-meta-details">--}}
{{--                                <span class="product-code"><i class="icon-2x icon-phone"></i></span>--}}
{{--                                <span class="product-code pull-right title"></span>--}}
{{--                                <div class="product-tag">--}}
{{--                                    <strong>Tags:</strong>--}}
{{--                                    <span class="text-color">Watch, Men Watch, round</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                    <div class="row top-pad-80">
                        <div class="col-md-12">
                            <p>{{$post->excerpt}}</p>
{{--                            <div role="tabpanel">--}}
{{--                                <!-- Nav tabs -->--}}
{{--                                <ul class="nav nav-tabs" role="tablist">--}}
{{--                                    <li role="presentation" class="active">--}}
{{--                                        <a href="#home" aria-controls="home" role="tab" data-toggle="tab">Description</a>--}}
{{--                                    </li>--}}
{{--                                    <li role="presentation">--}}
{{--                                        <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Additional Info</a>--}}
{{--                                    </li>--}}
{{--                                    <li role="presentation">--}}
{{--                                        <a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Reviews</a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                                <!-- Tab panes -->--}}
{{--                                <div class="tab-content">--}}
{{--                                    <div role="tabpanel" class="tab-pane active" id="home">--}}
{{--                                        <h5>Description</h5>--}}
{{--                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae odit iste exercitationem praesentium deleniti nostrum laborum rem id nihil tempora. Adipisci ea commodi unde nam placeat cupiditate quasi a ducimus rem consequuntur ex eligendi minima voluptatem assumenda voluptas quidem sit maiores odio velit voluptate.</p>--}}
{{--                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae odit iste exercitationem praesentium deleniti nostrum laborum rem id nihil tempora. Adipisci ea commodi unde nam placeat cupiditate quasi a ducimus rem consequuntur ex eligendi minima voluptatem assumenda voluptas quidem sit maiores odio velit voluptate.</p>--}}
{{--                                        <ul class="list-style">--}}
{{--                                            <li>Type: Analog Watch</li>--}}
{{--                                            <li>Dial: Round Dial</li>--}}
{{--                                            <li>Strap: Leatherette</li>--}}
{{--                                        </ul>--}}
{{--                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae odit iste exercitationem praesentium deleniti nostrum laborum rem id nihil tempora. Adipisci ea commodi unde nam placeat cupiditate quasi a ducimus rem consequuntur ex eligendi minima voluptatem assumenda voluptas quidem sit maiores odio velit voluptate.</p>--}}
{{--                                    </div>--}}
{{--                                    <div role="tabpanel" class="tab-pane" id="profile">--}}
{{--                                        <h5>Additional Info</h5>--}}
{{--                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae odit iste exercitationem praesentium deleniti nostrum laborum rem id nihil tempora. Adipisci ea commodi unde nam placeat cupiditate quasi a ducimus rem consequuntur ex eligendi minima voluptatem assumenda voluptas quidem sit maiores odio velit voluptate.</p>--}}
{{--                                        <ul class="arrow-style">--}}
{{--                                            <li>Type: Analog Watch</li>--}}
{{--                                            <li>Dial: Round Dial</li>--}}
{{--                                            <li>Strap: Leatherette</li>--}}
{{--                                            <li>Clasp Type: Buckle</li>--}}
{{--                                            <li>Occasion: Casual</li>--}}
{{--                                            <li>Movement: PC21 Movement</li>--}}
{{--                                            <li>Others: One Year Warranty</li>--}}
{{--                                            <li>Style Tip: Try with polo tees and Yepme chinos!</li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                    <div role="tabpanel" class="tab-pane" id="messages">--}}
{{--                                        <h5>Reviews</h5>--}}
{{--                                        <div class="item">--}}
{{--                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae odit iste exercitationem praesentium deleniti nostrum laborum rem id nihil tempora. Adipisci ea commodi unde nam placeat cupiditate quasi a ducimus rem consequuntur ex eligendi minima voluptatem assumenda voluptas quidem sit maiores odio velit voluptate.</p>--}}
{{--                                            <div class="post-meta">--}}
{{--                                                <!-- Author  -->--}}
{{--                                                <span class="author">--}}
{{--                                                <i class="fa fa-user"></i> John Deo</span>--}}
{{--                                                <!-- Meta Date -->--}}

{{--                                                <span class="time">--}}
{{--                                                <i class="fa fa-calendar"></i> 03.11.2014</span>--}}
{{--                                                <!-- Category -->--}}

{{--                                                <span class="pull-right"></span>--}}
{{--                                                <div class="star-rating">--}}
{{--                                                    <span class="pull-right">--}}
{{--                                                    <i class="fa fa-star"></i>--}}
{{--                                                    <i class="fa fa-star"></i>--}}
{{--                                                    <i class="fa fa-star"></i>--}}
{{--                                                    <i class="fa fa-star"></i>--}}
{{--                                                    <i class="fa fa-star-half-o"></i></span>--}}
{{--                                                </div>--}}
{{--                                                <span class="pull-right"></span></div>--}}
{{--                                        </div>--}}
{{--                                        <hr />--}}
{{--                                        <div class="item">--}}
{{--                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae odit iste exercitationem praesentium deleniti nostrum laborum rem id nihil tempora. Adipisci ea commodi unde nam placeat cupiditate quasi a ducimus rem consequuntur ex eligendi minima voluptatem assumenda voluptas quidem sit maiores odio velit voluptate.</p>--}}
{{--                                            <div class="post-meta">--}}
{{--                                                <!-- Author  -->--}}
{{--                                                <span class="author">--}}
{{--                                                <i class="fa fa-user"></i> John Deo</span>--}}
{{--                                                <!-- Meta Date -->--}}

{{--                                                <span class="time">--}}
{{--                                                <i class="fa fa-calendar"></i> 03.11.2014</span>--}}
{{--                                                <!-- Category -->--}}

{{--                                                <span class="pull-right"></span>--}}
{{--                                                <div class="star-rating">--}}
{{--                                                    <span class="pull-right">--}}
{{--                                                    <i class="fa fa-star"></i>--}}
{{--                                                    <i class="fa fa-star"></i>--}}
{{--                                                    <i class="fa fa-star"></i>--}}
{{--                                                    <i class="fa fa-star"></i>--}}
{{--                                                    <i class="fa fa-star-half-o"></i></span>--}}
{{--                                                </div>--}}
{{--                                                <span class="pull-right"></span></div>--}}
{{--                                        </div>--}}
{{--                                        <hr />--}}
{{--                                        <div class="item">--}}
{{--                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae odit iste exercitationem praesentium deleniti nostrum laborum rem id nihil tempora. Adipisci ea commodi unde nam placeat cupiditate quasi a ducimus rem consequuntur ex eligendi minima voluptatem assumenda voluptas quidem sit maiores odio velit voluptate.</p>--}}
{{--                                            <div class="post-meta">--}}
{{--                                                <!-- Author  -->--}}
{{--                                                <span class="author">--}}
{{--                                                <i class="fa fa-user"></i> John Deo</span>--}}
{{--                                                <!-- Meta Date -->--}}

{{--                                                <span class="time">--}}
{{--                                                <i class="fa fa-calendar"></i> 03.11.2014</span>--}}
{{--                                                <!-- Category -->--}}

{{--                                                <span class="pull-right"></span>--}}
{{--                                                <div class="star-rating">--}}
{{--                                                    <span class="pull-right">--}}
{{--                                                    <i class="fa fa-star"></i>--}}
{{--                                                    <i class="fa fa-star"></i>--}}
{{--                                                    <i class="fa fa-star"></i>--}}
{{--                                                    <i class="fa fa-star"></i>--}}
{{--                                                    <i class="fa fa-star-half-o"></i></span>--}}
{{--                                                </div>--}}
{{--                                                <span class="pull-right"></span></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- page-section -->


@endsection
@push("script")
    <script type="text/javascript" src="{{theme_assets("assets/js/jquery.elevateZoom-3.0.8.min.js")}}"></script>
    <!-- Custom Js Code -->
    <script src="{{theme_assets("assets/plugin/validation/validate.min.js")}}"></script>
    <script src="{{theme_assets("assets/script/comment.js")}}"></script>
    <script src="/js/visits.js"></script>
@endpush
