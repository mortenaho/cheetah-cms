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

    <section class="breadcrumbs-custom-inset">
        <div class="breadcrumbs-custom context-dark">
            <div class="container">
                <br/><br/> <br/>
                <h5 class="breadcrumbs-custom-title">{{$post->title}}</h5>
                <ul class="breadcrumbs-custom-path">
                    <li><a href="/{{$locale}}/">صفحه اصلی</a></li>
                    <li><a href="/{{$locale}}/products">نوشته ها</a></li>
                    <li class="active">{{$post->title}}</li>
                </ul>
            </div>
            <div class="box-position" style="background-image: url({{theme_assets("assets/images/bg-breadcrumbs.jpg")}});"></div>
        </div>
    </section>
    <!-- INNER PAGE BANNER END -->
@endsection

@section("body")


    <form role="form" name="frm_visit" id="frm_visit" method="post">
        {{csrf_field()}}
        <input type="hidden" name="post_id" id="post_id" value="{{$post->id}}">
        <input type="hidden" name="post_type" id="post_type" value="post">
        <input type="hidden" name="category_id"  id="category_id" value="{{$post->category_id}}">
    </form>
    <!-- Blog Post-->
    <section class="section section-sm bg-default text-left">
        <div class="container">
            <div class="row row-70">
                <div class="col-lg-8">
                    <div class="blog-post">
                        <!-- Post Classic-->
                        <article class="post post-classic">
                            <h5 class="post-classic-title" style="line-height: 1.6">{{$post->title}}</h5>
                            <div class="post-classic-panel group-middle justify-content-start"><a class="badge badge-secondary" href="#"> <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="16px" height="27px" viewbox="0 0 16 27" enable-background="new 0 0 16 27" xml:space="preserve">
                <path d="M0,0v6c4.142,0,7.5,3.358,7.5,7.5S4.142,21,0,21v6h16V0H0z"></path>
                </svg>
                                    <div>{{$post->category["title"]}}</div>
                                </a>
                                <div class="post-classic-comments"><span class="icon fa fa-comments-o"></span><a href="#">3</a></div>
                                <div class="post-classic-time"><span class="icon fa fa-clock-o"></span>
                                    @php
                                        $post_date = \Morilog\Jalali\Jalalian::fromDateTime($post->created_at)->format("Y/m/d");
                                        $date_parts = explode('/' , $post_date);
                                         $reg_date_day = $date_parts[2];
                                         $key=array('فروردین','اردیبهشت','خرداد','تیر','مرداد','شهریور','مهر','آبان','آذر','دی','بهمن','اسفند');
                                         $month_num = $date_parts[1];
                                         $reg_date_month=$key[$month_num-1];
                                    @endphp
                                    <time datetime="2020-11-30">{{$post->reg_date}}</time>
                                </div>
                                <div class="post-classic-author">توسط :  <a href="#">{{$post->author}}</a></div>
                            </div>
                            <p class="post-classic-text"></p>
                            <div class="post-classic-figure"><img src="{{$post->thumb}}" alt="{{$post->title}}" width="770" height="430"/> </div>
                        </article>
                        <!-- Quote Classic-->
                        <article class="quote-classic quote-classic-big">
                            <div class="quote-classic-text">
                                <p class="q">{{$post->excerpt}}</p>
                            </div>
                        </article>
                        <p>{!!  $post->content !!}</p>
                        <div class="blog-post-bottom-panel group-md group-justify">

{{--                            <div class="blog-post-tags">--}}
{{--                                <a href="#">News</a>--}}
{{--                                <a href="#">Flooring</a>--}}
{{--                                <a href="#">Tips</a>--}}
{{--                            </div>--}}
                            <div>
                                <div class="group-md group-middle"><span class="social-title">اشتراک گذاری</span>
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
                    <div class="blog-post-comments" style="text-align: right;">
                        <h6 class="text-spacing-100 font-weight-normal">{{$post->comments->count()}}  تعداد نظرات </h6>
                        @foreach($post->comments as $item)
                            <div class="box-comment">
                                <div class="unit unit-spacing-md flex-column flex-md-row align-items-lg-center">
                                    <div class="unit-left"><a class="box-comment-figure" href="#"><img src="images/resource/2.jpg" alt="" width="119" height="119"/></a></div>
                                    <div class="unit-body">
                                        <div class="group-sm group-justify">
                                            <div>
                                                <div class="group-sm group-middle">
                                                    <p class="box-comment-author"><a href="#">{{$item->full_name}}</a></p>
                                                    <div class="box-comment-reply"><a href="#">Reply</a></div>
                                                </div>
                                            </div>
                                            <div class="box-comment-time">

                                                <?php $date = \Morilog\Jalali\Jalalian::fromDateTime($item->created_at)->format("Y/m/d") ?>
                                                <time datetime="2020-11-30">{{$date}}</time>
                                            </div>
                                        </div>
                                        <p class="box-comment-text">{!!  $item->content !!}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="blog-post-comments" style="text-align: right;">
                        <h6 class="text-spacing-100 font-weight-normal">نظر خود را وارد نمایید</h6>
                        <form class="finarc-form finarc-mailform">
                            <div class="row row-14 gutters-14">
                                <div class="col-sm-6">
                                    <div class="form-wrap">
                                        <input class="form-input" id="contact-your-name-5" type="text" name="name" data-constraints="@Required"/>
                                        <label class="form-label" for="contact-your-name-5">نام</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-wrap">
                                        <input class="form-input" id="contact-email-5" type="email" name="email" data-constraints="@Email @Required"/>
                                        <label class="form-label" for="contact-email-5">آدرس ایمیل</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-wrap">
                                        <label class="form-label" for="contact-message-5">پیام</label>
                                        <textarea class="form-input textarea-lg" id="contact-message-5" name="message" data-constraints="@Required"></textarea>
                                    </div>
                                </div>
                            </div>
                            <button class="button button-secondary button-pipaluk" type="submit">ارسال</button>
                        </form>
                    </div>
                </div>
                @include("home::shared._post_sidebar",["categories"=>$categories])
            </div>
        </div>
    </section>

@endsection

@push("script")
    <script src="{{theme_assets("assets/plugin/validation/validate.min.js")}}"></script>
    <script src="{{theme_assets("assets/script/comment.js")}}"></script>

    <script>
        $(document).ready(function () {
            visited($('#frm_visit').serialize());
        });

        function visited(formData) {

            console.log(formData);

            var request = $.ajax({
                url: "/home/visit",
                type: "POST",
                data: formData,
                dataType: "json"
            });

            request.done(function (res) {
                if (res.status === "true") {
                    console.log('true');
                } else {
                    console.log('false');
                }
            });

            request.fail(function (jqXHR, textStatus) {
                var err = jqXHR.responseText;
                err = $.parseJSON(err);
                var msg = "";
                for (var k in err.errors) {
                    msg += "<label style='font-family:Tahoma' class='text-danger'>" + err.errors[k] + '</label><br>';
                }

            });
        }

    </script>
    <script src="/js/visits.js"></script>
@endpush
