@extends("home::shared.layout",
    ["title"=>"{{$post->title}} ",
    "captcha"=>true,
    "AjaxToken"=>"true"
    ])


<?php $index_view = "home::post._$include_page";?>
<?php
$other_services = post_get::get_last_post(8, "service");
?>
@section("breadcrumb")
    <!-- breadcrumb area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/{{$locale}}"> <i class="fa fa-home"></i> خانه </a>
                                </li>
                                <li class="breadcrumb-item " aria-current="page">خدمات</li>
                                <li class="breadcrumb-item active" aria-current="page">{{$post->title}}</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

@endsection

@section("body")
    <div class="blog-main-wrapper section-padding">
        <div class="container">
            <div class="row">
                <form role="form" name="frm_visit" id="frm_visit" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="post_id" id="post_id" value="{{$post->id}}">
                    <input type="hidden" name="post_type" id="post_type" value="{{$post->post_type}}">
                    <input type="hidden" name="category_id"  id="category_id" value="{{$post->category_id}}">
                </form>
                @include("home::shared._service_sidebar",["categories"=>$categories])
                <div class="col-lg-9 order-1">
                    <div class="blog-item-wrapper">
                        <!-- blog post item start -->
                        <div class="blog-post-item blog-details-post">
                            <figure class="blog-thumb">
                                <a href="/{{$locale}}{{$post->link_address}}">
                                    <img src="{{$post->thumb}}" alt="{{$post->title}}">
                                </a>
                            </figure>
                            <div class="blog-content">
                                <h3 class="blog-title">
                                    {{$post->title}}
                                </h3>
                                {{--                    <div class="blog-meta">--}}
                                {{--                        <p>25/03/2019 | <a href="#">Corano</a></p>--}}
                                {{--                    </div>--}}
                                <div class="entry-summary">

                                    <blockquote>
                                        <p> {{$post->excerpt}} </p>
                                    </blockquote>

                                    {!! $post->content !!}

                                    <div class="tag-line">
                                        <h6> سایر خدمات :</h6>
                                        @isset($other_services)
                                            @foreach($other_services as $item)
                                                @if($item->id != $post->id)
                                                    <a href="/{{$locale}}{{$item->link_address}}">{{$item->title}}</a>,
                                                @endif
                                            @endforeach
                                        @endif

                                    </div>
                                    <div class="blog-share-link">
                                        <h6>اشتراک گذاری :</h6>
                                        <div class="blog-social-icon">
                                            <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                                            <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                                            <a href="#" class="pinterest"><i class="fa fa-pinterest"></i></a>
                                            <a href="#" class="google"><i class="fa fa-google-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- blog post item end -->
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@push("script")
    <script src="/js/visits.js"></script>
@endpush
