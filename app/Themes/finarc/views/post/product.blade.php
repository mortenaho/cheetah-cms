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
    {{--    {{$site->header_banner}}--}}

    <section class="breadcrumbs-custom-inset">
        <div class="breadcrumbs-custom context-dark">
            <div class="container">
                <br/><br/> <br/>
                <h5 class="breadcrumbs-custom-title">{{$post->title}}</h5>
                <ul class="breadcrumbs-custom-path">
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
            <div class="box-position" style="background-image: url({{theme_assets("assets/images/bg-breadcrumbs.jpg")}});"></div>
        </div>
    </section>
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
    <section class="section section-sm bg-default">
        <div class="container">
            <div class="row row-50 justify-content-center align-items-xl-center">
                <div class="col-md-10 col-lg-6 col-xl-7">
                    <div class="offset-right-xl-15">
                        <!-- Owl Carousel-->
                        <div class="owl-carousel owl-dots-white" data-items="1" data-dots="true" data-autoplay="true" data-animation-in="fadeIn" data-animation-out="fadeOut">

                            <img src="{{$post->thumb}}" alt="{{$post->title}}" class="img-responsive" width="655" height="496"/>
                            @foreach($post->attachments as $item)
                                <img src="{{$item->file}}" alt="{{$item->title}}" class="img-responsive" width="655" height="496"/>
                            @endforeach

                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-lg-6 col-xl-5">
                    <div class="single-project">
                        <h5>{{$post->title}}</h5>
                        <p class="text-gray-500">{!! $post->content !!}</p>
                        <div class="divider divider-30"></div>
                        <ul class="list list-description d-inline-block d-md-block">

                            @isset($price)
                                <li><span>قیمت:</span><span>{{number_format($price)}} تومان</span></li>
                            @endisset
                        </ul>
                        <div class="divider divider-30"></div>
                        @isset($post->category)

                                <a class="button button-secondary " href="/{{$locale}}/category/{{$post->category->id}}/{{$post->category->url_slug}}">{{$post->category->title}}</a>

                        @endisset
                        <div class="group-md group-middle justify-content-sm-start"><span class="social-title">Share</span>
                            <div>
                                <ul class="list-inline list-inline-sm social-list">
                                    <li><a class="icon fa fa-facebook" href="#"></a></li>
                                    <li><a class="icon fa fa-twitter" href="#"></a></li>
                                    <li><a class="icon fa fa-google-plus" href="#"></a></li>
                                    <li><a class="icon fa fa-instagram" href="#"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- SECTION CONTENT END  -->

@endsection

@push("script")
    <script src="{{theme_assets("assets/plugin/validation/validate.min.js")}}"></script>
    <script src="{{theme_assets("assets/script/comment.js")}}"></script>
    <script src="/js/visits.js"></script>
@endpush
