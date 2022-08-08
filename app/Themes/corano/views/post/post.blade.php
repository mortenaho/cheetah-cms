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
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/{{$locale}}"><i class="fa fa-home"></i>خانه</a>
                                </li>
                                <li class="breadcrumb-item"><a href="/{{$locale}}/posts">{{$title}}</a>
                                </li>
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

    <div class="blog-main-wrapper section-padding">
        <div class="container">
            <div class="row">
                <input type="hidden" id="post_id" value="{{$post->id}}">
                <input type="hidden" id="post_type" value="post">
                @include("home::shared._post_sidebar",["categories"=>$categories])
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
                                <div class="blog-meta">

                                    <p> {{$post->reg_date}} | <a href="#">{{$post->author}}</a></p>
                                    <p>بازدید : {{$post->visit*100}}</p>
                                </div>
                                <div class="entry-summary">

                                    <blockquote>
                                        <p> {{$post->excerpt}} </p>
                                    </blockquote>

                                    {!! $post->content !!}

                                    <div class="tag-line">
                                        <h6> کلمات کلیدی :</h6>

                                        @foreach(explode(',', $post->keywords) as $item)
                                            <a href="/tags/{{create_url_slug($item)}}">{{$item}}</a> ,
                                        @endforeach
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
                    @if($post->has_comment==1)
                        <!-- comment area start -->
                            <div class="comment-section section-padding">
                                <h5>({{$post->comments->count()}}) دیدگاه </h5>
                                <ul>
                                @foreach($post->comments as $item)
                                    <!-- Comment Single -->
                                        <div class="tm-comment">
                                            <div class="tm-comment-thumb">
                                                <img src="{{theme_assets("assets/images/anonymous-avatar-sm.jpg")}}"
                                                     alt="{{$item->full_name}}">
                                            </div>
                                            <div class="tm-comment-content">
                                                <h6 class="tm-comment-authorname"><a
                                                        href="#">{{$item->full_name}}</a>
                                                </h6>
                                                <span class="tm-comment-date">
                                                 <?php $date = \Morilog\Jalali\Jalalian::fromDateTime($item->created_at)->format("Y/m/d") ?>
                                                    {{$date}}
                                                </span>
                                                <p>{!!  $item->content !!}</p>
                                            </div>
                                        </div>
                                        <!--// Comment Single -->
                                        <li>
                                            <div class="author-avatar">
                                                <img src="{{theme_assets("assets/img/blog/comment-icon.png")}}"
                                                     alt="{{$item->full_name}}">
                                            </div>
                                            <div class="comment-body">
                                                <span class="reply-btn"><a href="#">Reply</a></span>
                                                <h5 class="comment-author">{{$item->full_name}}</h5>
                                                <div class="comment-post-date">
                                                    <?php $date = \Morilog\Jalali\Jalalian::fromDateTime($item->created_at)->format("Y/m/d") ?>
                                                    {{$date}}
                                                </div>
                                                <p>{!!  $item->content !!}</p>
                                            </div>
                                        </li>
                                    @endforeach


                                </ul>
                            </div>
                            <!-- comment area end -->

                            <!-- start blog comment box -->
                            <div class="blog-comment-wrapper">
                                <h5>ارسال نظر</h5>
                                <p>آدرس ایمیل شما منتشر نخواهد شد. فیلدهای مورد نیاز *</p>
                                <form method="post" action="" id="frm_comment" class="tm-commentbox">
                                    <div class="comment-post-box">
                                        <div class="row">
                                            <div class="col-12">

                                                <label for="tm-comment-textbox">نظر</label>
                                                <textarea name="content" id="tm-comment-textbox" cols="30"
                                                          rows="7"></textarea>
                                            </div>
                                            <div class="col-lg-4 col-md-4">

                                                <label for="tm-comment-namefield">نام و نام خانوادگی*</label>
                                                <input name="full_name" type="text" class="coment-field" id="tm-comment-namefield">
                                            </div>
                                            <div class="col-lg-4 col-md-4">
                                                <label for="tm-comment-email">ایمیل*</label>
                                                <input name="email" type="email" class="coment-field" id="tm-comment-email">
                                            </div>
                                            <div class="col-lg-4 col-md-4">
                                                {!! app('captcha')->display() !!}
                                            </div>
                                            <div class="col-12">
                                                <div class="coment-btn">
                                                    <button class="btn btn-sqr" type="submit" name="submit"
                                                            >ارسال نظر</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                            <!-- start blog comment box -->
                    @endif
                    <!-- blog post item end -->
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
@push("script")
    <script src="{{theme_assets("assets/plugin/validation/validate.min.js")}}"></script>
    <script src="{{theme_assets("assets/script/comment.js")}}"></script>
    <script src="/js/visits.js"></script>
@endpush
