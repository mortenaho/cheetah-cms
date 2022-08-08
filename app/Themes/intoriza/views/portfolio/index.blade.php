@extends("home::shared.layout",
["title"=>"نمونه کار",
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
                        <h3 class="text-white">نمونه کار</h3>
                    </div>
                </div>
                <!-- BREADCRUMB ROW -->

                <div>
                    <ul class="wt-breadcrumb breadcrumb-style-2" style="direction: rtl;">
                        <li><a href="/">خانه</a></li>
                        <li>نمونه کار</li>
                    </ul>
                </div>

                <!-- BREADCRUMB ROW END -->
            </div>
        </div>
    </div>
    <!-- INNER PAGE BANNER END -->
@endsection

@section("body")

    @if(isset($portfolio)  && count($portfolio)>0)
        <!-- SECTION CONTENT START -->
        <div class="section-full small-device  p-t80 p-b50 bg-gray">
            <div class="container">
                <!-- PAGINATION START -->
                <div class="filter-wrap p-b30 text-center">
                    <ul class="filter-navigation masonry-filter text-uppercase" style="direction: rtl;">
                        <li class="active"><a data-filter="*" data-hover="نمایش همه" href="#">نمایش همه</a></li>
                        @foreach($portfolio as $item)

                            <li><a data-filter=".cat-{{$item->id}}" data-hover="{{$item->title}}" href="javascript:;">{{$item->title}}</a></li>
                        @endforeach

                    </ul>
                </div>
                <!-- PAGINATION END -->
                <!-- GALLERY CONTENT START -->
                <div class="portfolio-wrap mfp-gallery work-grid row clearfix">
                @foreach($portfolio as $item)
                    @foreach($item->posts as $post)
                           <!-- COLUMNS 1 -->
                            <div class="masonry-item cat-{{$post->category_id}}  col-md-4 col-sm-6 m-b30">
                                <div class="wt-box">
                                    <div class="work-hover-grid">
                                        <img src="{{$post->thumb}}" alt=""/>
                                        <div class="work-hover-discription">
                                            <h4>{{$post->title}}</h4>
                                            <h5>{{$post->excerpt}} </h5>
                                        </div>
                                        <a href="/{{$locale}}{{$post->link_address}}"></a>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                @endforeach

                </div>
            </div>
        </div>
    @endif

@endsection
@push("script")
{{--    <script src="{{theme_assets("assets/js/isotope.min.js")}}"></script>--}}
@endpush
