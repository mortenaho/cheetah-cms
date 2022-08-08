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
    <div class="tm-breadcrumb-area tm-padding-section text-center" data-overlay="1"
         data-bgimage="{{$site->header_banner}}"
         style="background-image: url({{$site->header_banner}});">
        <div class="container">
            <div class="tm-breadcrumb">
                <h2 class="tm-breadcrumb-title">{{$title}}</h2>
                <ul>
                    <li><a href="/">خانه</a></li>
                    <li>{{$title}}</li>
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
    <!-- Main Content -->
    <main class="main-content">

        <!-- Blogs Area -->
        <div class="tm-section blogs-area bg-white tm-padding-section" >
            <div class="container">
                <div class="row" >
                    <div style="display: none" itemprop="aggregateRating" itemscope itemtype="https://schema.org/AggregateRating">
                        <span itemprop="ratingValue">5</span>
                        <span itemprop="reviewCount">{{$post->visit*100}}</span>
                    </div>
                    <div class="col-lg-8 col-12 order-1 order-lg-2" itemscope itemtype="https://schema.org/Article">
                        <div class="tm-blog tm-blog-details ">
                            <div class="tm-blog-image">
                                <a href="{{$post->link_address}}">
                                    <img style="object-fit: cover" src="{{$post->thumb}}" alt="blog image">
                                </a>
                            </div>
                            <div class="tm-blog-content">
                                <div class="tm-blog-meta">
                                    <span><i class="fa fa-user"></i>توسط<a
                                            href="{{$post->link_address}}" itemprop="author"> {{$post->author}} </a></span>
                                    <span><i class="fa fa-calendar-o"></i>{{$post->reg_date}}</span>
                                    @isset($post->category)
                                        <span><i class="fa fa-folder-o"></i><a
                                                href="/category/{{$post->category->id}}/{{$post->category->url_slug}}">{{$post->category->title}}</a></span>
                                    @endisset
                                </div>
                                <h1  itemprop="name">{{$post->title}}</h1>
                                <p>{{$post->excerpt}}</p>
                                <p>{!! $post->content !!}</p>
                            </div>
                            <div class="tm-blog-tags">
                                    <span class="tm-blog-tags-title">
                                        <i class="fa fa-tags"></i>
                                    </span>
                                <ul>
                                    @foreach(explode(',', $post->keywords) as $item)
                                        <li><a href="/tags/{{create_url_slug($item)}}">{{$item}}</a></li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="tm-blog-pagination tm-pagination">
                                <ul>
                                    @isset($prev)
                                        <li>
                                            <a href="{{$prev->link_address}}">پست قبلی</a>
                                        </li>
                                    @endisset
                                    @isset($next)
                                        <li>
                                            <a href="{{$next->link_address}}">پست بعدی</a>
                                        </li>
                                    @endisset
                                </ul>
                            </div>
                        @if($post->has_comment==1)
                            <!-- tm-blog Comments -->
                                <div class="tm-blog-comments mt-50">
                                    <h5 class="small-title">  ({{$post->comments->count()}}) دیدگاه  </h5>

                                    <div class="tm-comment-wrapper">

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
                                        @endforeach


                                    </div>

                                </div>
                                <!--// tm-blog Comments -->

                                <!-- tm-blog Commentbox -->
                                <div class="tm-blog-commentbox mt-50">
                                    {{--@if($post->has_comment===1)--}}
                                    <h5 class="small-title">ارسال نظر</h5>
                                    <form method="post" action="" id="frm_comment" class="tm-commentbox">
                                        <input type="hidden" name="post_id" value="{{$post->id}}">
                                        <input type="hidden" name="post_type" value="post">
                                        <div class="tm-commentbox-singlefield">
                                            <p>آدرس ایمیل شما منتشر نخواهد شد. فیلدهای مورد نیاز *</p>
                                        </div>
                                        <div class="tm-commentbox-singlefield w-33">
                                            <label for="tm-comment-namefield">نام و نام خانوادگی*</label>
                                            <input name="full_name" type="text" id="tm-comment-namefield">
                                        </div>
                                        <div class="tm-commentbox-singlefield w-33">
                                            <label for="tm-comment-email">ایمیل*</label>
                                            <input name="email" type="email" id="tm-comment-email">
                                        </div>

                                        <div class="tm-commentbox-singlefield">
                                            <label for="tm-comment-textbox">نظر</label>
                                            <textarea name="content" id="tm-comment-textbox" cols="30"
                                                      rows="7"></textarea>
                                        </div>
                                        <div class="tm-commentbox-singlefield">
                                            {!! app('captcha')->display() !!}
                                        </div>

                                        <div class="tm-commentbox-singlefield">
                                            <button type="submit" class="tm-button">ارسال نظر<b></b></button>
                                        </div>
                                    </form>
                                    {{--@endif--}}
                                </div>
                                <!--// tm-blog Commentbox -->
                            @endif
                        </div>
                    </div>
                    @include("home::shared._post_sidebar",["categories"=>$categories])
                </div>

            </div>
        </div>
        <!--// Blogs Area -->


    </main>
    <!--// Main Content -->


@endsection
@push("script")
    <script src="{{theme_assets("assets/plugin/validation/validate.min.js")}}"></script>
    <script src="{{theme_assets("assets/script/comment.js")}}"></script>
    <script src="/js/visits.js"></script>
@endpush
