@extends("home::shared.layout",
["title"=>"نمونه کار",
])


@section("breadcrumb")

    <div class="page-header" data-bgimage="{{$site->header_banner}}"
         style="background-image: url({{$site->header_banner}});">
        <div class="container">
            <h3 class="title">نمونه کار</h3>
        </div>
        <div class="breadcrumb-box">
            <div class="container">
                <ul class="breadcrumb">
                    <li>
                        <a href="/">خانه</a>
                    </li>
                    <li class="active">نمونه کار</li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section("body")

    @if(isset($portfolio)  && count($portfolio)>0)
        <section id="works" class="page-section">
            <div class="container">
                <div class="mixed-grid pad">
                    <div class="filter-menu">
                        <ul class="nav black works-filters text-center" id="filters">
                            <li class="filter active" data-filter=".all">نمایش همه</li>

                            @foreach($portfolio as $item)
                                <li class="filter" data-filter=".portfolio-filter-{{$item->id}}">{{$item->title}}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                    <div class="masonry-grid grid-col-4">
                        <div class="grid-sizer"></div>

                    @foreach($portfolio as $item)
                        @foreach($item->posts as $post)
                            <!-- Portfolio Single -->
                            {{--                            <div--}}
                            {{--                                class="col-lg-4 col-md-6 col-12 tm-portfolio-item portfolio-filter-{{$post->category_id}} portfolio-filter-investment">--}}
                            {{--                                <div class="tm-portfolio mt-30 wow fadeInUp">--}}
                            {{--                                    <div class="tm-portfolio-image">--}}
                            {{--                                        <img--}}
                            {{--                                            style="height: 220px;object-fit: cover;"--}}
                            {{--                                            src="{{$post->thumb}}"--}}
                            {{--                                            alt="{{$post->title}}">--}}
                            {{--                                        <ul class="tm-portfolio-actions">--}}
                            {{--                                            <li class="link-button">--}}
                            {{--                                                <a href="/{{$locale}}{{$post->link_address}}"><i class="fa fa-link"></i></a>--}}
                            {{--                                            </li>--}}
                            {{--                                            <li class="zoom-button">--}}
                            {{--                                                <a href="{{$post->thumb}}"><i--}}
                            {{--                                                        class="fa fa-search-plus"></i></a>--}}
                            {{--                                            </li>--}}
                            {{--                                        </ul>--}}
                            {{--                                    </div>--}}
                            {{--                                    <div class="tm-portfolio-content">--}}
                            {{--                                        <h5><a href="/{{$locale}}{{$post->link_address}}">{{$post->title}}</a></h5>--}}
                            {{--                                        <h6><a href="">{{$item->title}}</a></h6>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                            <!--// Portfolio Single -->
                                <!-- Item 1 -->
                                <div class="grid-item all portfolio-filter-{{$post->category_id}}">
                                    <img src="{{$post->thumb}}" alt="{{$post->title}}" class="img-responsive"/>
                                    <div class="img-overlay"></div>
                                    <div class="figcaption">
                                        <div class="caption-block">
                                            <h4>{{$post->title}}</h4>
                                            <p>{{$post->excerpt}}</p>
                                        </div>
                                        <!-- Image Popup-->
                                        <a href="{{$post->thumb}}" data-rel="prettyPhoto[portfolio]">
                                            <i class="fa fa-search"></i>
                                        </a>
                                        <a href="/{{$locale}}{{$post->link_address}}">
                                            <i class="fa fa-link"></i>
                                        </a></div>
                                </div>
                                <!-- Item 1 Ends-->

                            @endforeach
                        @endforeach

                    </div>
                </div>
            </div>
        </section>
        <!-- works -->
    @endif

@endsection
@push("script")
    <script src="{{theme_assets("assets/js/isotope.min.js")}}"></script>
@endpush
