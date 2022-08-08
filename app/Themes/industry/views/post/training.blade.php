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
    <div class="page-header" data-bgimage="{{$site->header_banner}}"
         style="background-image: url({{$site->header_banner}});"
    >
        <div class="container">
            <h2 class="title">{{$title}}</h2>
        </div>
        <div class="breadcrumb-box">
            <div class="container">
                <ul class="breadcrumb">
                    <li>
                        <a href="/{{$locale}}/">خانه</a>
                    </li>
                    <li class="active">{{$title}}</li>
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
    <section class="page-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-9">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="post-image opacity">
{{--                                <img src="{{$post->thumb}}" width="1170" height="382" alt="" title="">--}}
                                <i class="fa fa-3x fa-code"></i>
                            </div>
                            <div class="post-content top-pad-10">
                                <h1 itemprop="name" class="post-title"><a href="/{{$locale}}{{$post->link_address}}">{{$title}}</a></h1>
                                <p>{{$post->excerpt}}</p>
                                <p>{!! $post->content !!}</p>
                            </div>
                            <div class="post-meta">
                                <!-- Author  -->
                                <span class="author"><i class="fa fa-user"></i> {{$post->author}}</span>
                                <!-- Meta Date -->
                                <span class="time"><i class="fa fa-calendar"></i> {{$post->reg_date}}</span>
                                <!-- Comments -->
                                <span class="category "><i class="fa fa-heart"></i>
                                    @foreach(explode(',', $post->keywords) as $item)
                                        <a href="/tags/{{create_url_slug($item)}}">{{$item}}</a>,
                                    @endforeach
                                </span>
                                <!-- Category -->
                                <span class="comments pull-right"><i class="fa fa-comments"></i>  ({{$post->comments->count()}}) نظر  </span>
                            </div>
                        </div>
                    </div>
                    <hr>
                    @if($post->has_comment==1)
                        <div class="row">
                            <div class="col-md-12 top-pad-20">
                                <h4>نظرات</h4>
                                @foreach($post->comments as $item)
                                    <div class="comment-item">
                                        <div class="pull-left author-img"><img class="img-circle"   src="{{theme_assets("assets/img/sections/testimonials/1.jpg")}}" width="80" height="80" alt="{{$item->full_name}}" title="{{$item->full_name}}"></div>
                                        <p>{!!  $item->content !!}</p>
                                        <div class="post-meta">
                                            <!-- Author  -->
                                            <span class="author"><i class="fa fa-user"></i>{{$item->full_name}}</span>
                                            <!-- Meta Date -->
                                            <span class="time"><i class="fa fa-calendar"></i>   <?php $date = \Morilog\Jalali\Jalalian::fromDateTime($item->created_at)->format("Y/m/d") ?>
                                                {{$date}}</span>
                                            <!-- Category -->
                                            <span class="comments pull-right"><i class="fa fa-comments"></i> <a href="#">reply</a></span>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                        <h4>نظر خود را وارد نمایید</h4>
                        <div class="row">
                            <form role="form" name="contactform"  method="post" action="" id="frm_comment">
                                <input type="hidden" name="post_id" value="{{$post->id}}">
                                <input type="hidden" name="post_type" value="post">
                                <!-- Field 1 -->
                                <div class="col-md-6">
                                    <div class="input-text form-group">
                                        <input type="text" name="contact_name" class="input-name form-control" placeholder="نام و نام خانوادگی*" />
                                    </div>
                                    <!-- Field 2 -->
                                    <div class="input-email form-group">
                                        <input name="email" type="email" id="tm-comment-email" class="input-email form-control" placeholder="ایمیل*"/>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <!-- Field 4 -->
                                    <div class="textarea-message form-group">
                                        <textarea  name="content" id="tm-comment-textbox" class="textarea-message form-control" placeholder="نظر*" rows="4" ></textarea>
                                    </div>
                                    <!-- Button -->
                                    <button class="btn btn-default" type="submit">ارسال نظر <i class="icon-paper-plane"></i></button>
                                </div>
                            </form>
                        </div>
                    @endif
                </div>
                @include("home::shared._training_sidebar",["categories"=>$categories])
            </div>
        </div>
    </section>

@endsection

@push("script")
    <script src="{{theme_assets("assets/plugin/validation/validate.min.js")}}"></script>
    <script src="{{theme_assets("assets/script/comment.js")}}"></script>
    <script src="/js/visits.js"></script>

@endpush
