@extends("home::shared.layout",
["title"=>"گالری تصاویر",
])

@section("breadcrumb")
    {{--{{$site->header_banner}}--}}
    <!-- INNER PAGE BANNER -->
    <div class="wt-bnr-inr overlay-wraper bg-center"
         style="background-image:url({{theme_assets("assets/images/banner/4.jpg")}});">
        <div class="overlay-main bg-black opacity-07"></div>
        <div class="container">
            <div class="wt-bnr-inr-entry">
                <div class="banner-title-outer">
                    <div class="banner-title-name">
                        <h3 class="text-white">گالری تصاویر</h3>
                    </div>
                </div>
                <!-- BREADCRUMB ROW -->

                <div>
                    <ul class="wt-breadcrumb breadcrumb-style-2" style="direction: rtl;">
                        <li><a href="/">خانه</a></li>
                        <li>گالری تصاویر</li>
                    </ul>
                </div>

                <!-- BREADCRUMB ROW END -->
            </div>
        </div>
    </div>
    <!-- INNER PAGE BANNER END -->
@endsection

@section("body")

    <div class="section-full small-device p-t80 p-b50 bg-gray">

        <!-- GALLERY CONTENT START -->
        <div class="container">
            <!-- GALLERY CONTENT START -->
            <div class="portfolio-wrap mfp-gallery work-grid row clearfix">
            @foreach($galleries as $item)

                <!-- COLUMNS  -->
                    <div class="masonry-item col-lg-3  col-md-4 col-sm-6 m-b30">
                        <div class="wt-box">
                            <div class="work-hover-grid">

                                <img src="{{$item->thumb}}" alt="{{$item->title}}"/>
                                <div class="work-hover-discription">
                                    <h4>{{$item->title}}</h4>
                                </div>
                                @if($item->parent==0)
                                    <a href="/{{$locale}}/galleries/{{$item->id}}">
                                        {{--                                        <i class="fa fa-link"></i>--}}
                                    </a>
                                @else
                                    <a href="{{$item->thumb}}" target="_blank">
                                        {{--                                        <i class="fa fa-link"></i>--}}
                                    </a>
                                @endif

                            </div>
                        </div>
                    </div>


                @endforeach
            </div>
        </div>
    </div>
@endsection
@push("script")
    {{--    <script src="{{theme_assets("assets/js/isotope.min.js")}}"></script>--}}
@endpush
