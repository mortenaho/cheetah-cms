@extends("home::shared.layout",
    ["title"=>"$title ",
    "captcha"=>true,
    "AjaxToken"=>"true"
    ])


<?php $index_view = "home::post._$include_page";?>
<?php
$other_services = post_get::get_last_post(8, "service");
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
                        <h3 class="text-white">{{$title}}</h3>
                    </div>
                </div>
                <!-- BREADCRUMB ROW -->

                <div>
                    <ul class="wt-breadcrumb breadcrumb-style-2" style="direction: rtl;">
                        <li><a href="/{{$locale}}/">خانه</a></li>
                        <li><a href="/{{$locale}}/services">خدمات</a></li>
                        <li>{{$title}}</li>
                    </ul>
                </div>

                <!-- BREADCRUMB ROW END -->
            </div>
        </div>
    </div>
    <!-- INNER PAGE BANNER END -->
@endsection

@section("body")

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
                                <img src="{{$post->thumb}}" alt="">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="product-block bg-gray p-a30 p-b15 m-b30">
                            <div class="row">

                                <div class="col-md-6 col-sm-6 m-b30">
                                    <p>{{$post->excerpt}}</p>
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
                                    <h4>{{$post->title}}</h4>
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

                            </div>
                        </div>

                    </div>
                </div>



            </div>
            <br/><br/>

            <div class="project-detail-containt">
                <div class="bg-white text-black">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="section-title white">
                                <!-- Heading -->
                                <h4 class="title">سایر خدمات</h4>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <hr/>
            <div class="portfolio-wrap mfp-gallery work-grid row clearfix">
                <!-- COLUMNS 1 -->
                @isset($other_services)

                    @foreach($other_services as $item)
                        @if($item->id != $post->id)
                            <div class="masonry-item cat-1   col-md-4 col-sm-6 m-b30">
                                <div class="wt-box">
                                    <div class="work-hover-grid">
                                        <img src="{{$item->thumb}}" alt="{{$item->title}}"/>
                                        <div class="work-hover-discription">
                                            <h4>{{$item->title}}</h4>
                                            <h5>{{$item->excerpt}}</h5>
                                        </div>
                                        <a href="/{{$locale}}{{$item->link_address}}"></a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>

    </div>
    <!-- SECTION CONTENT END  -->

@endsection
@push("script")
    <script src="/js/visits.js"></script>
@endpush
