@extends("home::shared.layout",
["title"=>"نمونه کار",
])


@section("breadcrumb")
    <!--Page Title-->
    <section class="page-title" style="background-image:url({{$site->header_banner}})">
        <div class="auto-container">
            <h1>{{trans('home.portfolio')}}</h1>
            <ul class="page-breadcrumb">
                <li><a href="/{{$locale}}/">{{trans('home.mainPage')}}</a></li>
                <li>{{trans('home.portfolio')}}</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->
@endsection

@section("body")

    @if(isset($portfolio)  && count($portfolio)>0)

        <!--Project Page Section-->
        <section class="project-page-section">
            <div class="auto-container">
                <!--MixitUp Galery-->
                <div class="mixitup-gallery">

                    <!--Filter-->
                    <div class="filters clearfix">
                        <ul class="filter-tabs filter-btns clearfix">

                            <li class="active filter" data-role="button" data-filter="all">نمایش همه </li>

                            @foreach($portfolio as $item)
                                <li class="filter" data-role="button" data-filter=".portfolio-filter-{{$item->id}}">{{$item->title}}</li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="filter-list row clearfix">
                    @foreach($portfolio as $item)
                        @foreach($item->posts as $post)
                        <!--Default Portfolio Item-->
                        <div class="default-portfolio-item mix all .portfolio-filter-{{$post->category_id}} col-lg-4 col-md-6 col-sm-12">
                            <div class="inner-box">
                                <figure class="image-box"><img src="{{$post->thumb}}" alt=""></figure>
                                <!--Overlay Box-->
                                <div class="overlay-box">
                                    <div class="overlay-inner">
                                        <div class="content">
                                            <a href="/{{$locale}}{{$post->link_address}}" class="link"><span class="fa fa-link"></span></a>
                                            <a href="{{$post->thumb}}" class="lightbox-image link" data-fancybox="images" data-caption="" title=""><span class="icon fa fa-search"></span></a>
                                            <h3><a href="/{{$locale}}{{$post->link_address}}">{{$post->title}}</a></h3>
{{--                                            <div class="tags">Agriculture, Chemical</div>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endforeach

                        <!--Default Portfolio Item-->
                        <div class="default-portfolio-item mix all  col-lg-4 col-md-6 col-sm-12">
                            <div class="inner-box">
                                <figure class="image-box"><img src="{{theme_assets("assets/images/gallery/21.jpg")}}" alt=""></figure>
                                <!--Overlay Box-->
                                <div class="overlay-box">
                                    <div class="overlay-inner">
                                        <div class="content">
                                            <a href="projects-detail.html" class="link"><span class="fa fa-link"></span></a>
                                            <a href="{{theme_assets("assets/images/gallery/21.jpg")}}" class="lightbox-image link" data-fancybox="images" data-caption="" title=""><span class="icon fa fa-search"></span></a>
                                            <h3><a href="projects-detail.html">Pre Construction</a></h3>
                                            <div class="tags">Agriculture, Chemical</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!--Styled Pagination-->
                    <ul class="styled-pagination text-center">
                        <li class="prev"><a href="#"><span class="fa fa-angle-left"></span></a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#" class="active">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li class="next"><a href="#"><span class="fa fa-angle-right"></span></a></li>
                    </ul>
                    <!--End Styled Pagination-->

                </div>
            </div>
        </section>
        <!--End Project Page Section-->

    @endif

@endsection
@push("script")
{{--    <script src="{{theme_assets("assets/js/isotope.min.js")}}"></script>--}}
@endpush
