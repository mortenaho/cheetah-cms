@extends("home::shared.layout",
["title"=>"خدمات"
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
                        <h3 class="text-white">خدمات</h3>
                    </div>
                </div>
                <!-- BREADCRUMB ROW -->

                <div>
                    <ul class="wt-breadcrumb breadcrumb-style-2" style="direction: rtl;">
                        <li><a href="/">خانه</a></li>
                        <li>خدمات</li>
                    </ul>
                </div>

                <!-- BREADCRUMB ROW END -->
            </div>
        </div>
    </div>
    <!-- INNER PAGE BANNER END -->
@endsection
@section("body")
    <!-- SECTION CONTENT START -->
    <div class="section-full small-device  p-t80 p-b50 bg-gray">
        <div class="container">
            <!-- PAGINATION START -->
            <div class="filter-wrap p-b30 text-center">
                <ul class="filter-navigation masonry-filter text-uppercase">
                    <li class="active"><a data-filter="*" data-hover="All" href="#">خدمات</a></li>
                </ul>
            </div>
            @if(isset($services) && count($services)>0)
            <!-- GALLERY CONTENT START -->
                <div class="portfolio-wrap mfp-gallery work-grid row clearfix">
                    <!-- COLUMNS 1 -->
                    @foreach($services as $item)
                        <div class="masonry-item cat-1   col-md-4 col-sm-6 m-b30">
                            <div class="wt-box">
                                <div class="work-hover-grid">
                                    <img src="{{$item->thumb}}" alt="{{$item->title}}"/>
                                    <div class="work-hover-discription">
                                        <h4>{{$item->title}}</h4>
                                        <h5>{{$item->excerpt}}</h5>
                                    </div>
                                    <a href="/{{$locale}}{{$item->link_address}}"></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endsection

@push("script")
@endpush
