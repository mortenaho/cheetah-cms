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
    <!--Page Title-->
    <section class="page-title" style="background-image:url({{$site->header_banner}})">
        <div class="auto-container">
            <h1>{{$post->title}}</h1>
            <ul class="page-breadcrumb">
                <li><a href="/{{$locale}}/">{{trans('home.mainPage')}}</a></li>
                <li><a href="/{{$locale}}/posts">{{trans('home.posts')}}</a></li>
                @isset($post->category)
                    <li>
                        <a href="/{{$locale}}/category/{{$post->category->id}}/{{$post->category->url_slug}}">{{$post->category->title}}</a>
                    </li>
                @endisset
                <li class="active">{{$post->title}}</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->
@endsection

@section("body")

    <form role="form" name="frm_visit" id="frm_visit" method="post">
        {{csrf_field()}}
        <input type="hidden" name="post_id" id="post_id" value="{{$post->id}}">
        <input type="hidden" name="post_type" id="post_type" value="{{$post->post_type}}">
        <input type="hidden" name="category_id"  id="category_id" value="{{$post->category_id}}">
    </form>
    <!--Sidebar Page Container-->
    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">

                <!--Content Side-->
                <!--Content Side-->
                <div class="content-side col-lg-8 col-md-8 col-sm-12">
                    <div class="news-single">
                        <div class="inner-box">
                            <div class="image">
                                <a href="/{{$locale}}{{$post->link_address}}" title="{{$post->title}}" >
                                <img src="{{$post->thumb}}" alt="{{$post->title}}" />
                                </a>
                            </div>
                            <div class="lower-content">
                                <ul class="post-meta">
{{--                                    <li><span class="icon fa fa-comments-o"></span>Comments</li>--}}
                                    <li><span class="icon fa fa-user"></span>{{$post->author}}</li>
                                    <li><span class="icon fa fa-calendar"></span>{{$post->reg_date}}</li>
                                </ul>
                                <h3>{{$post->title}}</h3>
                                <div class="text">
                                    <blockquote>{{$post->excerpt}}</blockquote>
                                    <p>{!! $post->content !!}</p>

                                </div>

                                <!--post-share-options-->
                                <div class="post-share-options clearfix">
                                    <div class="pull-left tags"><span class="tag">{{trans('home.tags')}}:</span>
                                        @foreach(explode(',', $post->keywords) as $item)
                                            <a href="/tags/{{create_url_slug($item)}}">{{$item}}</a>,
                                        @endforeach
                                    </div>
                                    <div class="pull-right">
                                        <ul class="social-icon-three">
                                            <li><a href="#"><span class="fa fa-facebook-f"></span></a></li>
                                            <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                                            <li><a href="#"><span class="fa fa-google-plus"></span></a></li>
                                            <li><a href="#"><span class="fa fa-pinterest-p"></span></a></li>
                                            <li><a href="#"><span class="fa fa-dribbble"></span></a></li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!--Comments Area-->
{{--                        <div class="comments-area">--}}

{{--                            <div class="sec-title">--}}
{{--                                <h2>2 Comments</h2>--}}
{{--                                <div class="separater"></div>--}}
{{--                            </div>--}}

{{--                            <!--Comment Box-->--}}
{{--                            <div class="comment-box">--}}
{{--                                <div class="comment">--}}
{{--                                    <div class="author-thumb"><img src="images/resource/author-4.jpg" alt=""></div>--}}
{{--                                    <div class="comment-inner">--}}
{{--                                        <div class="comment-info clearfix"><strong>Hendry Cavill</strong><div class="comment-time">May 15, 2018 AT 2:30 PM</div></div>--}}
{{--                                        <div class="text">Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio.</div>--}}
{{--                                        <a class="comment-reply" href="#">Reply</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <!--Comment Box-->--}}
{{--                            <div class="comment-box reply-comment">--}}
{{--                                <div class="comment">--}}
{{--                                    <div class="author-thumb"><img src="images/resource/author-5.jpg" alt=""></div>--}}
{{--                                    <div class="comment-inner">--}}
{{--                                        <div class="comment-info clearfix"><strong>Ben Steven</strong><div class="comment-time">May 15, 2018 AT 2:30 PM</div></div>--}}
{{--                                        <div class="text">Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio.</div>--}}
{{--                                        <a class="comment-reply" href="#">Reply</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                        </div>--}}
                        <!--End Comments Area-->

                        <!-- Comment Form -->
{{--                        <div class="comment-form">--}}
{{--                            <div class="sec-title">--}}
{{--                                <h2>Leave Your Comment</h2>--}}
{{--                                <div class="separater"></div>--}}
{{--                            </div>--}}
{{--                            <!--Comment Form-->--}}
{{--                            <form method="post" action="https://expert-themes.com/html/global-industry/blog.html">--}}
{{--                                <div class="row clearfix">--}}
{{--                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">--}}
{{--                                        <input type="text" name="username" placeholder="Name" required>--}}
{{--                                    </div>--}}

{{--                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">--}}
{{--                                        <input type="email" name="email" placeholder="Email" required>--}}
{{--                                    </div>--}}

{{--                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">--}}
{{--                                        <input type="text" name="text" placeholder="Subject" required>--}}
{{--                                    </div>--}}

{{--                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">--}}
{{--                                        <textarea name="message" placeholder="Your Comments"></textarea>--}}
{{--                                    </div>--}}

{{--                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">--}}
{{--                                        <button class="theme-btn btn-style-one" type="submit" name="submit-form">Post Comment</button>--}}
{{--                                    </div>--}}

{{--                                </div>--}}
{{--                            </form>--}}

{{--                        </div>--}}
                        <!--End Comment Form -->

                    </div>
                </div>

                @include("home::shared._post_sidebar",["categories"=>$categories])

            </div>
        </div>
    </div>
    <!--End Sidebar Page Container-->
@endsection

@push("script")
{{--    <script src="{{theme_assets("assets/plugin/validation/validate.min.js")}}"></script>--}}
{{--    <script src="{{theme_assets("assets/script/comment.js")}}"></script>--}}
    <script src="/js/visits.js"></script>
@endpush
