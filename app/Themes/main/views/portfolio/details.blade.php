@extends("home::shared.layout",
["title"=>"نمونه کار",
])

<?php
$post_meta = ResToModel($post->post_meta);

$project = isset($post_meta) && count($post_meta) > 0 ? $post_meta["project"]: "";
$customer = isset($post_meta) && count($post_meta) > 0 ? $post_meta["customer"] : "";
$start_date = isset($post_meta) && count($post_meta) > 0 ? $post_meta["start_date"]: "";
$end_date = isset($post_meta) && count($post_meta) > 0 ?$post_meta["end_date"] : "";
$project_status = isset($post_meta) && count($post_meta) > 0 ?$post_meta["project_status"]: "";
?>
@section("breadcrumb")
    <div class="tm-breadcrumb-area tm-padding-section text-center" data-overlay="1"
         data-bgimage="{{$site->header_banner}}"
         style="background-image: url({{$site->header_banner}});">
        <div class="container">
            <div class="tm-breadcrumb">
                <h2 class="tm-breadcrumb-title">نمونه کارها</h2>
                <ul>
                    <li><a href="/">خانه</a></li>
                    <li><a href="/portfolio">نمونه کار ها</a></li>
                    <li><a>{{$post->title}}</a></li>

                </ul>
            </div>
        </div>
    </div>
@endsection

@section("body")

    <!-- Main Content -->
    <main class="main-content">
        <form role="form" name="frm_visit" id="frm_visit" method="post">
            {{csrf_field()}}
            <input type="hidden" name="post_id" id="post_id" value="{{$post->id}}">
            <input type="hidden" name="post_type" id="post_type" value="{{$post->post_type}}">
            <input type="hidden" name="category_id"  id="category_id" value="{{$post->category_id}}">
        </form>
        <!-- Portfolio Details Area -->
        <div class="tm-section portfolio-details-area bg-white tm-padding-section">
            <div class="container">
                <div class="tm-portfoliodetails">
                    <div
                        class="tm-portfoliodetails-image tm-portfoliodetails-gallery tm-slider-arrow tm-slider-arrow-hovervisible">
                        <div class="tm-portfoliodetails-gallery-img">
                            <a href="{{$post->thumb}}">
                                <img style="height: 350px;object-fit: cover" src="{{$post->thumb}}"
                                     alt="portfolio details">
                            </a>
                        </div>
                        @foreach($post->attachments as $item)
                            <div class="tm-portfoliodetails-gallery-img">
                                <a href="{{$item->file}}">
                                    <img style="height: 350px;object-fit: cover" src="{{$item->file}}"
                                         alt="{{$item->title}}">
                                </a>
                            </div>
                        @endforeach
                    </div>

                    <div class="tm-portfoliodetails-content tm-padding-section-sm-top">
                        <div class="row">
                            <div class="col-xl-4 col-lg-5">
                                <div class="tm-portfoliodetails-info">
                                    <ul>
                                        <li><b>پروژه :</b>{{$project}}</li>
                                        <li><b>دسته بندی ها :</b>{{$post->category->title}}</li>
                                        <li><b>تاریخ شروع :</b>{{$start_date}}</li>
                                        <li><b>تاریخ پایان :</b>{{$end_date}}</li>
                                        <li><b>وضعیت :</b>{{$project_status}}</li>
                                        <li><b>مشتری :</b>{{$customer}}</li>

                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-8 col-lg-7">
                                <div class="tm-portfoliodetails-description">
                                    <h3>{{$post->title}}</h3>
                                    <p>{{$post->excerpt}}</p>
                                    <p>{!! $post->content !!}</p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--// Portfolio Details Area -->
    </main>
    <!--// Main Content -->
@endsection
@push("script")
    <script src="/js/visits.js"></script>
@endpush


