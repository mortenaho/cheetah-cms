@extends("home::shared.layout",
    ["title"=>"$title ",
    "captcha"=>true,
    "AjaxToken"=>"true"
    ])


<?php $index_view = "home::post._$include_page";?>
<?php
$other_services = post_get::get_last_post(8, "service");
?>
@section("breadcrumb")

    <!--Page Title-->
    <section class="page-title" style="background-image:url({{$site->header_banner}})">
        <div class="auto-container">
            <h1>{{$post->title}}</h1>
            <ul class="page-breadcrumb">
                <li><a href="/{{$locale}}/">{{trans('home.mainPage')}}</a></li>
                <li><a href="/{{$locale}}/services">{{trans('home.services')}}</a></li>
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

    <!-- page-section -->
    <section class="welcome-section alternate">
        <div class="auto-container">
            <div class="row clearfix">
                <form role="form" name="frm_visit" id="frm_visit" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="post_id" id="post_id" value="{{$post->id}}">
                    <input type="hidden" name="post_type" id="post_type" value="{{$post->post_type}}">
                    <input type="hidden" name="category_id"  id="category_id" value="0">
                </form>

                <!--Content Column-->
                <div class="content-column col-lg-7 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <h2>{{$post->title}}</h2>
                        <div class="text">
                            <p>{!! $post->content !!}</p>
                        </div>

                        {{--                        @if(isset($post->attachments) && $post->attachments->count()>0)--}}
                        {{--                            @foreach($post->attachments as $item)--}}
                        {{--                                <a href="#" data-image="{{$item->file}}" data-zoom-image="{{$item->file}}">--}}
                        {{--                                    <img id="img_{{$item->id}}" src="{{$item->file}}" />--}}
                        {{--                                </a>--}}
                        {{--                            @endforeach--}}
                        {{--                        @endif--}}
                    </div>
                </div>

                <!--image Column-->
                <div class="image-column col-lg-5 col-md-12 col-sm-12">
                    <div class="image">
                        <img src="{{$post->thumb}}" alt="{{$post->title}}" />
                    </div>
                    <p class="img-description">{{$post->excerpt}}</p>
                </div>

            </div>
        </div>
    </section>

    <!-- Other services -->
    <section class="solutions-page-section">
        <div class="auto-container">
            <div class="sec-title centered">
                <h4>{{trans('home.otherServices')}}</h4>
{{--                <div class="separater"></div>--}}
                <hr/>
                <div class="text"></div>
            </div>
            <div class="row clearfix">
                @isset($other_services)

                    @foreach($other_services as $item)
                        @if($item->id != $post->id)
                    <div class="services-block col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="upper-box">
                                    <span
                                        class="icon flaticon-chemistry-class-flask-with-liquid-for-experimentation"></span>
                                <h3><a href="/{{$locale}}{{$item->link_address}}">{{$item->title}}</a></h3>
                            </div>
                            <div class="lower-box">
                                <div class="image">
                                    <img src="{{$item->thumb}}" alt="{{$item->title}}"/>
                                    <div class="overlay-box">
                                        <div class="text"> {{$item->excerpt}}</div>
                                        <a href="/{{$locale}}{{$item->link_address}}" class="link-btn"><span
                                                class="fa fa-link"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        @endif
                    @endforeach
                @endif

            </div>
        </div>
    </section>
@endsection
@push("script")
    <script src="/js/visits.js"></script>
@endpush
