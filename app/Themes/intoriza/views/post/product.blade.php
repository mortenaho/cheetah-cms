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
    {{--{{$site->header_banner}}--}}
    <!-- INNER PAGE BANNER -->
    <div class="wt-bnr-inr overlay-wraper bg-center"
         style="background-image:url({{theme_assets("assets/images/banner/4.jpg")}});">
        <div class="overlay-main bg-black opacity-07"></div>
        <div class="container">
            <div class="wt-bnr-inr-entry">
                <div class="banner-title-outer">
                    <div class="banner-title-name">
                        <h3 class="text-white">{{$post->title}}</h3>
                    </div>
                </div>
                <!-- BREADCRUMB ROW -->

                <div>
                    <ul class="wt-breadcrumb breadcrumb-style-2" style="direction: rtl;">
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

                <!-- BREADCRUMB ROW END -->
            </div>
        </div>
    </div>
    <!-- INNER PAGE BANNER END -->
@endsection

@section("body")

    <!-- page-section -->
    <form role="form" name="frm_visit" id="frm_visit" method="post">
        {{csrf_field()}}
        <input type="hidden" name="post_id" id="post_id" value="{{$post->id}}">
        <input type="hidden" name="post_type" id="post_type" value="{{$post->post_type}}">
        <input type="hidden" name="category_id"  id="category_id" value="{{$post->category_id}}">
    </form>
    <!-- SECTION CONTENT START -->
    <div class="section-full small-device  p-tb80">
        <div class="container">
            <div class="project-detail-outer">
                <div class="row">

                    <div class="col-md-6">
                        <div class="project-detail-pic m-b30">
                            <div class="wt-media">

                                <!--Fade slider-->
                                <div class="owl-carousel owl-fade-slider-one owl-btn-vertical-center m-b30">

                                    <div class="item">
                                        <div class="aon-thum-bx">
                                            <img src="{{$post->thumb}}" alt="{{$post->title}}">
                                        </div>
                                    </div>
                                    @foreach($post->attachments as $item)
                                        <div class="item">
                                            <div class="aon-thum-bx">
                                                <img src="{{$item->file}}" alt="{{$item->title}}">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <!--fade slider END-->
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="product-block bg-gray p-a30 p-b15 m-b30">
                            <div class="row">

                                <div class="col-md-6 col-sm-6 m-b30">
                                    <h4 class="m-b10">عنوان</h4>
                                    <p>{{$post->title}}</p>
                                </div>
                                <div class="col-md-6 col-sm-6 m-b30">
                                    <h4 class="m-b10">دسته بندی ها</h4>
                                    @isset($post->category)
                                        <p>
                                            <a href="/{{$locale}}/category/{{$post->category->id}}/{{$post->category->url_slug}}">{{$post->category->title}}</a>
                                        </p>
                                    @endisset
                                </div>
                                <div class="col-md-6 col-sm-6 m-b30">
                                    <h4 class="m-b10">قیمیت</h4>
                                    @isset($price)
                                        <p class="price"> {{number_format($price)}} تومان </p>
                                    @endisset
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

                <div class="project-detail-containt">
                    <div class="bg-white text-black">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <a href="/{{$locale}}{{$post->link_address}}">
                                    <h4>{{$post->excerpt}}</h4>
                                </a>
                                <p> {!! $post->content !!}</p>
                                <div class="p-t0">
                                    <ul class="social-icons social-square social-lg social-darkest m-b0">
                                        <li><a href="javascript:void(0);" class="fa fa-facebook"></a></li>
                                        <li><a href="javascript:void(0);" class="fa fa-twitter"></a></li>
                                        <li><a href="javascript:void(0);" class="fa fa-linkedin"></a></li>
                                        <li><a href="javascript:void(0);" class="fa fa-rss"></a></li>
                                        <li><a href="javascript:void(0);" class="fa fa-youtube"></a></li>
                                        <li><a href="javascript:void(0);" class="fa fa-instagram"></a></li>
                                    </ul>
                                </div>
                                <br/><br/>
                                <hr/>
                                @php
                                    $post_meta = ResToModel($contact_info->post_meta);
                                    $tel_1 = $post_meta["tel_1"];
                                    $tel_2 = $post_meta["tel_2"];
                                    $mobile = $post_meta["mobile"];
                                @endphp

                                <a href="/{{$locale}}/home/order/{{$post->id}}" class="btn btn-default btn-lg">
                                    <h4> برای سفارش با شماره های زیر تماس بگیرید</h4>
                                </a>
                                <hr/>
                                @if(!empty($tel_1) && !is_null($tel_1))
                                    <span class="product-code"><i class="icon-2x icon-phone2"></i></span>
                                    <a href="javascript:void(0);" class="site-button m-t15 m-b15">{{$tel_1}}</a>
                                @endif
                                @if(!empty($tel_2) && !is_null($tel_2))
                                    <span class="product-code"><i class="icon-2x icon-phone2"></i></span>
                                    <a href="javascript:void(0);" class="site-button m-t15 m-b15">{{$tel_2}}</a>
                                @endif
                                @if(!empty($mobile) && !is_null($mobile))
                                    <span class="product-code"><i class="icon-2x icon-mobile"></i></span>
                                    <a href="javascript:void(0);" class="site-button m-t15 m-b15">{{$mobile}}</a>
                                @endif


                            </div>
                        </div>

                    </div>
                </div>


            </div>
            <br/><br/>

        </div>

    </div>
    <!-- SECTION CONTENT END  -->

@endsection
@push("script")
    <script src="{{theme_assets("assets/plugin/validation/validate.min.js")}}"></script>
    <script src="{{theme_assets("assets/script/comment.js")}}"></script>
    <script src="/js/visits.js"></script>
@endpush
