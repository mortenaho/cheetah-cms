@extends("home::shared.layout",
["title"=>"دانلودها"
])

@section("breadcrumb")
    {{--{{$site->header_banner}}--}}
    <!-- INNER PAGE BANNER -->
    <div class="wt-bnr-inr overlay-wraper bg-center"
         style="background-image:url({{$site->header_banner}});">
        <div class="overlay-main bg-black opacity-07"></div>
        <div class="container">
            <div class="wt-bnr-inr-entry">
                <div class="banner-title-outer">
                    <div class="banner-title-name">
                        <h3 class="text-white">دانلودها</h3>
                    </div>
                </div>
                <!-- BREADCRUMB ROW -->

                <div>
                    <ul class="wt-breadcrumb breadcrumb-style-2" style="direction: rtl;">
                        <li><a href="/">خانه</a></li>
                        <li>دانلودها</li>
                    </ul>
                </div>

                <!-- BREADCRUMB ROW END -->
            </div>
        </div>
    </div>
    <!-- INNER PAGE BANNER END -->
@endsection

@section("body")
    @if(isset($posts) && count($posts)>0)

        <!-- SECTION CONTENT START -->
        <div class="section-full small-device  p-tb80 bg-white">

            <!-- GALLERY CONTENT START -->
            <div class="container">
                <div class="news-listing ">
                    @if($posts!=null && count($posts)>0)
                        @foreach($posts as $item)
                        <!-- COLUMNS 1 -->
                            <div class="blog-post blog-md date-style-1 blog-list-1 clearfix  m-b60 bg-white">
                                <div class="wt-post-media wt-img-effect zoom-slow">
                                    <a href="/{{$locale}}{{$item->link_address}}"><img src="{{$item->thumb}}"
                                                                       alt="{{$item->title}}"></a>
                                </div>
                                <div class="wt-post-info  bg-white">

                                    <div class="wt-post-title ">
                                        <h4><a href="/{{$locale}}{{$item->link_address}}">{{$item->title}}</a></h4>
                                    </div>
                                    <div class="wt-post-meta ">
                                        <ul>
                                            <li class="post-date"><strong>{{$item->reg_date}}</strong></li>
                                            <li class="post-author"><i class="fa fa-user"></i><a
                                                    href="javascript:void(0);">{{$item->author}}</a></li>
                                        </ul>
                                    </div>
                                    <div class="wt-post-text">
                                        <p>{{$item->excerpt}}</p>
                                    </div>
                                    <a href="/{{$locale}}{{$item->link_address}}"
                                       class="btn-half site-button site-btn-effect button-md"><span>ادامه و دانلود</span></a>
                                    {{--                            <div class="wt-post-bottom  bdr-t-1 bdr-gray bdr-solid">--}}
                                    {{--                                <ul>--}}
                                    {{--                                    <li class="post-like"><i class="fa fa-heart-o"></i><a href="javascript:void(0);">5 <span>Likes</span></a> </li>--}}
                                    {{--                                    <li class="post-comment"><i class="fa fa fa-comments"></i><a href="javascript:void(0);">10 <span>Comment</span></a> </li>--}}
                                    {{--                                </ul>--}}
                                    {{--                            </div>--}}
                                </div>
                            </div>
                        @endforeach
                        <div class="row">
                            <div class="col-md-12">
                                <nav class="navbar-right">
                                    <ul class="pagination">
                                        <li>
                                            <a href="{{$posts->previousPageUrl()}}">
                                                <span aria-hidden="true"><i class="fa fa-angle-left"></i></span>
                                            </a>
                                        </li>
                                        @for($i=1;$i<=$posts->lastPage();$i++)

                                            @if($i==$posts->currentPage())
                                                <li class="active">
                                                    <a href="{{$posts->url($i)}}">{{$i}}
                                                        <span class="sr-only">(current)</span>
                                                    </a>
                                                </li>
                                            @else
                                                <li>
                                                    <a href="{{$posts->url($i)}}">
                                                        {{$i}}
                                                    </a>
                                                </li>

                                            @endif
                                        @endfor
                                        <li>
                                            <a href="{{$posts->nextPageUrl()}}">
                                                <span aria-hidden="true"><i class="fa fa-angle-right"></i></span>
                                            </a>
                                        </li>

                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <!-- pagination -->
                    @else
                        <div class="row">
                            <div class="alert alert-warning">
                                <h2> مشکلی پیش آمده است</h2>
                                <h4>چیزی برای نمایش یافت نشد .</h4>
                                <a href="/" class="tm-button">بازگشت به صفحه اصلی</a>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
            <!-- GALLERY CONTENT END -->

        </div>
        <!-- SECTION CONTENT END  -->
    @endif
@endsection

@push("script")
    <script src="{{theme_assets("assets/script/downloads.js")}}"></script>
@endpush
