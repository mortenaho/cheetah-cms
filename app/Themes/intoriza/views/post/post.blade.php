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
                        <li><a href="/{{$locale}}/posts">نوشته ها</a></li>
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

                                <div class="item">
                                    <div class="aon-thum-bx">
                                        <img src="{{$post->thumb}}" alt="{{$title}}">
                                    </div>
                                </div>

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
                                {{--                                <div class="p-t15 text-uppercase">--}}
                                {{--                                    <strong>Maurica drake</strong>--}}
                                {{--                                    <span>Lead manager</span>--}}
                                {{--                                </div>--}}

                            </blockquote>
                            <p>
                                {!! $post->content !!}
                            </p>



                        </div>
                    </div>

                    <div class="clear" id="comment-list">
                        <div class="comments-area" id="comments">
                            <h2 class="comments-title m-b0">
                                نظر
                                {{$post->comments->count()}}
                            </h2>
                            <div class="p-tb30">
                            @if($post->has_comment==1)


                                <!-- COMMENT LIST START -->
                                    <ol class="comment-list">
                                        @foreach($post->comments as $item)
                                            <li class="comment">
                                                <!-- COMMENT BLOCK -->
                                                <div class="comment-body ">
                                                    <div class="comment-meta">
                                                        <?php $date = \Morilog\Jalali\Jalalian::fromDateTime($item->created_at)->format("Y/m/d") ?>
                                                        <a href="javascript:void(0);">{{$date}}</a>
                                                    </div>
                                                    <div class="comment-author vcard">
                                                        <img class="avatar photo" src="images/testimonials/pic1.jpg"
                                                             alt="">
                                                        <cite class="fn">{{$item->full_name}}</cite>
                                                        <span class="says">says:</span>
                                                    </div>

                                                    <p>{!!  $item->content !!}</p>
                                                    <div class="reply">
                                                        <a href="javscript:;"
                                                           class="comment-reply-link  text-uppercase">Read More</a>
                                                    </div>
                                                </div>
                                                <!-- SUB COMMENT BLOCK -->
                                                <ol class="children">
                                                    <li class="comment odd parent">

                                                        <div class="comment-body ">
                                                            <div class="comment-meta">
                                                                <a href="javascript:void(0);">Feb 8, 2019 at 9:15 am</a>
                                                            </div>
                                                            <div class="comment-author vcard">
                                                                <img class="avatar photo"
                                                                     src="images/testimonials/pic3.jpg" alt="">
                                                                <cite class="fn">Brayden</cite>
                                                                <span class="says">says:</span>
                                                            </div>

                                                            <p>Asperiores, tenetur, blanditiis, quaerat odit ex
                                                                exercitationem pariatur quibusdam veritatis quisquam
                                                                laboriosam esse beatae hic perferendis velit deserunt
                                                                soluta iste repellendus officia in neque veniam
                                                                debitis</p>
                                                            <div class="reply">
                                                                <a href="javscript:;"
                                                                   class="comment-reply-link  text-uppercase">Read
                                                                    More</a>
                                                            </div>

                                                        </div>

                                                        <ol class="children">
                                                            <li class="comment odd parent">
                                                                <div class="comment-body ">
                                                                    <div class="comment-meta">
                                                                        <a href="javascript:void(0);">Feb 9, 2019 at
                                                                            11:15 am</a>
                                                                    </div>
                                                                    <div class="comment-author vcard">
                                                                        <img class="avatar photo"
                                                                             src="images/testimonials/pic2.jpg" alt="">
                                                                        <cite class="fn">Diego</cite>
                                                                        <span class="says">says:</span>
                                                                    </div>

                                                                    <p>Vel velit auctor aliquet. Aenean sollicitudin,
                                                                        lorem quis bibendum auctor Lorem ipsum dolor sit
                                                                        amet of Lorem Ipsum. Proin gravida nibh..</p>
                                                                    <div class="reply">
                                                                        <a href="javscript:;"
                                                                           class="comment-reply-link  text-uppercase">Read
                                                                            More</a>
                                                                    </div>

                                                                </div>
                                                            </li>
                                                        </ol>

                                                    </li>
                                                </ol>
                                            </li>
                                        @endforeach

                                    </ol>
                                    <!-- COMMENT LIST END -->

                                    <!-- LEAVE A REPLY START -->
                                    <div class="comment-respond m-t30" id="respond">

                                        <h2 class="comment-reply-title" id="reply-title">نظر خود را وارد نمایید
                                            <small>
                                                <a style="display:none;" href="#" id="cancel-comment-reply-link"
                                                   rel="nofollow">Cancel reply</a>
                                            </small>
                                        </h2>

                                        <form class="comment-form" id="commentform" method="post">
                                            <input type="hidden" name="post_id" value="{{$post->id}}">
                                            <input type="hidden" name="post_type" value="post">
                                            <p class="comment-form-author">
                                                <label for="author">Name <span class="required">*</span></label>
                                                <input class="form-control" type="text" value="" name="contact_name"
                                                       placeholder="Author" id="author">
                                            </p>

                                            <p class="comment-form-email">
                                                <label for="email">Email <span class="required">*</span></label>
                                                <input class="form-control" type="text" value="" name="email"
                                                       placeholder="Email">
                                            </p>


                                            <p class="comment-form-comment">
                                                <label for="comment">Comment</label>
                                                <textarea class="form-control" rows="8" name="content"
                                                          placeholder="Comment" id="content"></textarea>
                                            </p>

                                            <p class="form-submit">
                                                <button
                                                    class="site-button site-btn-effect radius-no text-uppercase font-weight-600"
                                                    type="button">ارسال نظر
                                                </button>
                                            </p>

                                        </form>

                                    </div>
                                    <!-- LEAVE A REPLY END -->
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- BLOG END -->
                </div>
                @include("home::shared._post_sidebar",["categories"=>$categories])

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
