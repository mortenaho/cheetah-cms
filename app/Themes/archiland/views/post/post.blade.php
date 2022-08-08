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

    <section id="subheader" data-speed="8" data-type="background">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>{{$post->title}}</h1>
                    <ul class="crumb">
                        <li><a href="/{{$locale}}">صفحه اصلی</a></li>
                        <li class="sep">/</li>
                        <li><a href="/{{$locale}}/posts">نوشته ها</a></li>
                        <li class="sep">/</li>
                        <li>{{$post->title}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
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
    <div id="content">
        <div class="container">
            <div class="row">

                <div class="col-md-8">
                    <div class="blog-read">
                        <div class="post-content">
                            <div class="post-image">
                                <img src="{{$post->thumb}}" alt="{{$post->title}}" />
                            </div>
                            @php
                                   $post_date = \Morilog\Jalali\Jalalian::fromDateTime($post->created_at)->format("Y/m/d");
                                   $date_parts = explode('/' , $post_date);
                                    $reg_date_day = $date_parts[2];
                                    $key=array('فروردین','اردیبهشت','خرداد','تیر','مرداد','شهریور','مهر','آبان','آذر','دی','بهمن','اسفند');
	                                $month_num = $date_parts[1];
                                    $reg_date_month=$key[$month_num-1];
                            @endphp
                            <div class="date-box">
                                <div class="day">{{$reg_date_day}}</div>
                                <div class="month">{{$reg_date_month}}</div>
                            </div>

                            <div class="post-text">
                                <h3><a href="/{{$locale}}{{$post->link_address}}">{{$post->title}}</a></h3>

                                <blockquote class="s1">{{$post->excerpt}}</blockquote>

                                <p>{!! $post->content !!}</p>
                            </div>
                        </div>

                        <div class="post-meta"><span><i class="fa fa-user id-color"></i>نویسنده: <a href="#">{{$post->author}}</a></span> <span><i class="fa fa-tag id-color"></i><a href="#">News</a>, <a href="#">Events</a></span> <span><i class="fa fa-comment id-color"></i><a href="#">10 Comments</a></span></div>

                        <div class="spacer-single"></div>

                        <div id="blog-comment">
                            <h3>تعداد نظرات ({{$post->comments->count()}})</h3>

                            <div class="spacer-half"></div>

                            <ol>
                                @foreach($post->comments as $item)
                                <li>
                                    <div class="avatar">
                                        <img src="images/avatar.jpg" alt="" /></div>
                                    <div class="comment-info">
                                        <span class="c_name">{{$item->full_name}}</span>
                                        <?php $date = \Morilog\Jalali\Jalalian::fromDateTime($item->created_at)->format("Y/m/d") ?>
                                        <span class="c_date id-color">{{$date}}</span>
{{--                                        <span class="c_reply"><a href="#">Reply</a></span>--}}
                                        <div class="clearfix"></div>
                                    </div>

                                    <div class="comment">{!!  $item->content !!}</div>

                                </li>
                                @endforeach
                            </ol>

                            <div class="spacer-single"></div>

{{--                            <div id="comment-form-wrapper">--}}
{{--                                <h3>نظر خود را وارد نمایید</h3>--}}
{{--                                <div class="comment_form_holder">--}}
{{--                                    <form id="contact_form" name="form1" method="post" action="#">--}}

{{--                                        <label>Name</label>--}}
{{--                                        <input type="text" name="name" id="name" class="form-control" />--}}

{{--                                        <label>Email <span class="req">*</span></label>--}}
{{--                                        <input type="text" name="email" id="email" class="form-control" />--}}
{{--                                        <div id="error_email" class="error">Please check your email</div>--}}

{{--                                        <label>Message <span class="req">*</span></label>--}}
{{--                                        <textarea cols="10" rows="10" name="message" id="message" class="form-control"></textarea>--}}
{{--                                        <div id="error_message" class="error">Please check your message</div>--}}
{{--                                        <div id="mail_success" class="success">Thank you. Your message has been sent.</div>--}}
{{--                                        <div id="mail_failed" class="error">Error, email not sent</div>--}}

{{--                                        <p id="btnsubmit">--}}
{{--                                            <input type="submit" id="send" value="Send" class="btn btn-line" /></p>--}}



{{--                                    </form>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>

                    </div>


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
