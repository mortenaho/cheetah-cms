@extends("home::shared.layout",
["title"=>"نمونه کار",
])

<?php
$post_meta = ResToModel($post->post_meta);

$project = isset($post_meta) && count($post_meta) > 0 ? $post_meta["project"] : "";
$customer = isset($post_meta) && count($post_meta) > 0 ? $post_meta["customer"] : "";
$start_date = isset($post_meta) && count($post_meta) > 0 ? $post_meta["start_date"] : "";
$end_date = isset($post_meta) && count($post_meta) > 0 ? $post_meta["end_date"] : "";
$project_status = isset($post_meta) && count($post_meta) > 0 ? $post_meta["project_status"] : "";
?>
@section("breadcrumb")

    <div class="page-header" data-bgimage="{{$site->header_banner}}"
         style="background-image: url({{$site->header_banner}});">
        <div class="container">
            <h3 class="title">نمونه کار ها</h3>
        </div>
        <div class="breadcrumb-box">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="/{{$locale}}/">خانه</a></li>
                    <li><a href="/{{$locale}}/portfolio">نمونه کار ها</a></li>
                    <li><a>{{$post->title}}</a></li>
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
    <section id="works" class="page-section">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            @php
                                $counter = 1;
                            @endphp
                            @foreach($post->attachments as $item)

                                <li data-target="#carousel-example-generic" data-slide-to="{{$counter}}"></li>
                                @php
                                    $counter =$counter + 1
                                @endphp

                            @endforeach
                        </ol>
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <img src="{{$post->thumb}}" width="1000" height="740" alt="" title=""/>
                            </div>
                            @foreach($post->attachments as $item)
                                <div class="item">
                                    <img src="{{$item->file}}" width="1000" height="740" alt=""
                                         title="{{$item->title}}"/>
                                </div>
                            @endforeach

                        </div>
                        <!-- Controls -->
                        <a class="left carousel-control no-bg" href="#carousel-example-generic" role="button"
                           data-slide="prev">
                            <span class="fa fa-angle-left fa-2x" aria-hidden="true"></span>
                            <span class="sr-only">قبلی</span></a>
                        <a class="right carousel-control no-bg" href="#carousel-example-generic" role="button"
                           data-slide="next">
                            <span class="fa fa-angle-right fa-2x" aria-hidden="true"></span>
                            <span class="sr-only">بعدی</span></a></div>
                </div>
                <h3>{{$post->title}}</h3>
                <hr/>
                <p>
                    <b>پروژه :</b><span>{{$project}}</span>
                </p>
                <p>
                    <b>دسته بندی ها :</b><span>{{$post->category->title}}></span>
                </p>
                <p>
                    <b>تاریخ شروع :</b><span>{{$start_date}}</span>
                </p>
                <p>
                    <b>تاریخ پایان :</b><span>{{$end_date}}</span>
                </p>
                <p>
                    <b>وضعیت :</b><span>{{$project_status}}</span>
                </p>
                <hr/>


                <p>{{$post->excerpt}}</p>
                <p>{!! $post->content !!}</p>
                <p>
                    <b>مشتری :</b><span>{{$customer}}</span>
                </p>
                @php
                    $post_meta = ResToModel($contact_info->post_meta);
                    $tel_1 = $post_meta["tel_1"];
                    $tel_2 = $post_meta["tel_2"];
                    $mobile = $post_meta["mobile"];
                @endphp
                <a href="/{{$locale}}/home/order/{{$post->id}}" class="btn btn-default btn-lg">برای سفارش با شماره های زیر تماس بگیرید
                    <hr/>
                    @if(!empty($tel_1) && !is_null($tel_1))
                        <span class="product-code"><i class="icon-2x icon-phone2"></i></span>
                        <span class="strong">{{$tel_1}}</span>
                    @endif
                    @if(!empty($tel_2) && !is_null($tel_2))
                        <span class="product-code"><i class="icon-2x icon-phone2"></i></span>
                        <span class="strong">{{$tel_2}}</span>
                    @endif
                    @if(!empty($mobile) && !is_null($mobile))
                        <span class="product-code"><i class="icon-2x icon-mobile"></i></span>
                        <span class="strong">{{$mobile}}</span>
                    @endif
                </a>

            </div>
        </div>

    </section>
    <!-- works -->
{{--    <section id="related-post" class="page-section">--}}
{{--        <div class="image-bg content-in fixed" data-background="img/sections/bg/bg-2.jpg">--}}
{{--            <div class="overlay-strips"></div>--}}
{{--        </div>--}}
{{--        <div class="container white">--}}
{{--            <div class="section-title">--}}
{{--                <!-- Heading -->--}}
{{--                <h2 class="title">Related Post</h2>--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-12 text-center">--}}
{{--                    <div class="owl-carousel pagination-1 light-switch" data-pagination="true" data-items="4"--}}
{{--                         data-autoplay="true" data-navigation="false">--}}
{{--                        <a href="#">--}}
{{--                            <img src="img/sections/portfolio/1.jpg" width="270" height="235" alt=""/>--}}
{{--                        </a>--}}
{{--                        <a href="#">--}}
{{--                            <img src="img/sections/portfolio/2.jpg" width="270" height="235" alt=""/>--}}
{{--                        </a>--}}
{{--                        <a href="#">--}}
{{--                            <img src="img/sections/portfolio/3.jpg" width="270" height="235" alt=""/>--}}
{{--                        </a>--}}
{{--                        <a href="#">--}}
{{--                            <img src="img/sections/portfolio/4.jpg" width="270" height="235" alt=""/>--}}
{{--                        </a>--}}
{{--                        <a href="#">--}}
{{--                            <img src="img/sections/portfolio/5.jpg" width="270" height="235" alt=""/>--}}
{{--                        </a>--}}
{{--                        <a href="#">--}}
{{--                            <img src="img/sections/portfolio/6.jpg" width="270" height="235" alt=""/>--}}
{{--                        </a>--}}
{{--                        <a href="#">--}}
{{--                            <img src="img/sections/portfolio/1.jpg" width="270" height="235" alt=""/>--}}
{{--                        </a>--}}
{{--                        <a href="#">--}}
{{--                            <img src="img/sections/portfolio/2.jpg" width="270" height="235" alt=""/>--}}
{{--                        </a></div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
@endsection
@push("script")
    <script src="/js/visits.js"></script>
@endpush


