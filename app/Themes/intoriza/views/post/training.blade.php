@extends("home::shared.layout",
    ["title"=>"$title ",
    "captcha"=>true,
    "AjaxToken"=>"true",
    "post_desc"=>"$post->excerpt",
    "post_keywords"=>"$post->keywords",
    "post_title"=>"$post->title",

    ])

<?php $index_view = "home::post._$include_page";?>

@section("post_meta")
    <meta name=keywords itemprop=keywords content="{{$post->keywords}}">
    <link rel=canonical href="{{url()->current()}}">
    <meta property=og:locale content=fa_IR>
    <meta property=og:type content=article>
    <meta property=og:title content="{{$post->title}}">
    <meta property=og:description
          content="{{$post->excerpt}}">
    <meta property=og:url content="{{url()->current()}}">
    <meta property=og:site_name content="{{$site->title}}">
    <meta property=og:image content="{{$post->thumb}}">
    <meta name=twitter:card content=summary>
    <meta name=twitter:description
          content="{{$post->excerpt}}">
    <meta name=twitter:title content="{{$post->title}}">
    <meta name=twitter:image content="{{$post->thumb}}">

@stop

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
                        <li><a href="/{{$locale}}/training">آموزش</a></li>
                        @isset($post->category)
                            <li>
                                <a href="/{{$locale}}/category/{{$post->category->id}}/{{$post->category->url_slug}}">{{$post->category->title}}</a>
                            </li>
                        @endisset
                        <li>{{$post->title}}</li>
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
            <div class="row">
                <div class="col-md-8 col-sm-12">
                    <!-- BLOG START -->
                    <div class="blog-post date-style-1 blog-detail text-black">
                        <div class="wt-post-media">
                            <!--Fade slider-->
                            <div class="owl-carousel owl-fade-slider-one owl-btn-vertical-center m-b30">

                                <div class="item">
                                    <div class="aon-thum-bx">
                                        <img src="{{$post->thumb}}" alt="{{$title}}">
                                    </div>
                                </div>
                            </div>
                            <!--fade slider END-->
                        </div>

                        <div class="wt-post-title ">
                            <a href="/{{$locale}}{{$post->link_address}}"><h4 class="post-title">{{$title}}</h4></a>
                        </div>
                        <div class="wt-post-meta ">
                            <ul>
                                <li class="post-author"><strong>{{$post->author}}</strong></li>
                                <li class="post-date"><strong>{{$post->reg_date}} </strong></li>
                            </ul>
                        </div>

                        <div class="wt-post-text">
                            <blockquote>
                                <i class="fa fa-quote-left"></i>
                                <p>{{$post->excerpt}}</p>

                            </blockquote>
                            <p>
                                {!! $post->content !!}
                            </p>



                        </div>
                    </div>

                    <!-- BLOG END -->
                </div>
                @include("home::shared._training_sidebar",["categories"=>$categories])

            </div>
        </div>
    </div>
    <!-- SECTION CONTENT END -->
@endsection

@push("script")
    <script src="{{theme_assets("assets/plugin/validation/validate.min.js")}}"></script>
    <script src="{{theme_assets("assets/script/comment.js")}}"></script>
    <script src="/js/visits.js"></script>

@endpush
