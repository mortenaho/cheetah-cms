@extends("home::shared.layout",
    ["title"=>"$post->title",
    "captcha"=>true,
    "AjaxToken"=>"true"
    ])

<?php
$post_meta = ResToModel($post->post_meta);

$project = isset($post_meta) && count($post_meta) > 0 ? $post_meta["project"] : "";
$customer = isset($post_meta) && count($post_meta) > 0 ? $post_meta["customer"] : "";
$start_date = isset($post_meta) && count($post_meta) > 0 ? $post_meta["start_date"] : "";
$end_date = isset($post_meta) && count($post_meta) > 0 ? $post_meta["end_date"] : "";
$project_status = isset($post_meta) && count($post_meta) > 0 ? $post_meta["project_status"] : "";
?>


<input type="hidden" id="post_id" value="{{$post->id}}">
<input type="hidden" id="post_type" value="portfolio">

{{--<div class="container project-view">--}}

{{--    <div class="row">--}}
{{--        <div class="col-md-8 project-images">--}}
{{--            <img src="{{$post->thumb}}" alt="{{$post->title}}" class="img-responsive"/>--}}
{{--            @foreach($post->attachments as $item)--}}
{{--                <img src="{{$item->file}}" alt="{{$item->title}}" class="img-responsive"/>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--        <div class="col-md-4">--}}
{{--            <div class="project-info">--}}
{{--                <a href="/{{$locale}}{{$post->link_address}}">--}}
{{--                    <h2>{{$post->title}}</h2>--}}
{{--                </a>--}}

{{--                <div class="details">--}}
{{--                    <div class="info-text">--}}
{{--                        <span class="title">تاریخ شروع</span>--}}
{{--                        <span class="val">{{$start_date}}</span>--}}
{{--                    </div>--}}

{{--                    <div class="info-text">--}}
{{--                        <span class="title">تاریخ پایان</span>--}}
{{--                        <span class="val">{{$end_date}}</span>--}}
{{--                    </div>--}}

{{--                    <div class="info-text">--}}
{{--                        <span class="title">وضعیت پروژه</span>--}}
{{--                        <span class="val">{{$project_status}}</span>--}}
{{--                    </div>--}}

{{--                    <div class="info-text">--}}
{{--                        <span class="title">مشتری</span>--}}
{{--                        <span class="val">{{$customer}}</span>--}}
{{--                    </div>--}}

{{--                    <div class="info-text">--}}
{{--                        <span class="title">عنوان پروژه</span>--}}
{{--                        <span class="val">{{$project}}</span>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <p>{{$post->excerpt}}</p>--}}
{{--                <hr/>--}}
{{--                <p>--}}
{{--                    {!! $post->content !!}--}}
{{--                </p>--}}


{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

@section("breadcrumb")
    {{--    {{$site->header_banner}}--}}

    <section class="breadcrumbs-custom-inset">
        <div class="breadcrumbs-custom context-dark">
            <div class="container">
                <br/><br/> <br/>
                <h5 class="breadcrumbs-custom-title">{{$post->title}}</h5>
                <ul class="breadcrumbs-custom-path">
                    <li><a href="/{{$locale}}/">خانه</a></li>
                    <li><a href="/{{$locale}}/portfolio">نمونه کار</a></li>
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
        <input type="hidden" name="post_type" id="post_type" value="{{$post->post_type}}">
        <input type="hidden" name="category_id"  id="category_id" value="{{$post->category_id}}">
    </form>

    <!-- Section single service-->
    <section class="section section-sm bg-default">
        <div class="container">
            <div class="row row-50 justify-content-center align-items-xl-center">
                <div class="col-md-10 col-lg-6 col-xl-7">
                    <div class="offset-right-xl-15">
                        <!-- Owl Carousel-->
                        <div class="owl-carousel owl-dots-white" data-items="1" data-dots="true" data-autoplay="true" data-animation-in="fadeIn" data-animation-out="fadeOut">

                              <img src="{{$post->thumb}}" alt="{{$post->title}}" class="img-responsive" width="655" height="496"/>
                               @foreach($post->attachments as $item)
                                  <img src="{{$item->file}}" alt="{{$item->title}}" class="img-responsive" width="655" height="496"/>
                               @endforeach

                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-lg-6 col-xl-5">
                    <div class="single-project">
                        <h5>{{$post->title}}</h5>
                        <p class="text-gray-500">{!! $post->content !!}</p>
                        <div class="divider divider-30"></div>
                        <ul class="list list-description d-inline-block d-md-block">
                            <li><span>مشتری:</span><span>{{$customer}}</span></li>
                            <li><span>زمان:</span><span>{{$start_date}}</span></li>
                            <li><span>عنوان:</span><span>{{$project}}</span></li>
                        </ul>
                        <div class="divider divider-30"></div>
                        <div class="group-md group-middle justify-content-sm-start"><span class="social-title">Share</span>
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
        </div>
    </section>
    <section class="section section-sm bg-default">
        <div class="container">
            <div class="project-navigation">
                <div class="row row-30">
                    @foreach($portfolios as $item)
                    <div class="col-sm-6">
                        <div class="project-minimal">
                            <div class="unit unit-spacing-lg align-items-center flex-column flex-lg-row text-lg-left">
                                <div class="unit-left"><a class="project-minimal-figure" href="#"><img src="{{$item->thumb}}" alt="{{$item->title}}" width="168" height="139"/></a></div>
                                <div class="unit-body">
{{--                                    <p class="project-minimal-text">{{$item->title}}</p>--}}
                                    <div class="project-minimal-title"><a href="/{{$locale}}{{$post->link_address}}" > <br class="d-none d-lg-block">
                                          </a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                   @endforeach
                </div>
                <a class="project-navigation-arrow-prev" href="#"></a><a class="project-navigation-arrow-next" href="#"></a> </div>
        </div>
    </section>

@endsection
@push("script")
    <script src="/js/visits.js"></script>
@endpush
