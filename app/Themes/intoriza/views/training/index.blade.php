@extends("home::shared.layout",
["title"=>"آموزش"
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
                        <h3 class="text-white">آموزش</h3>
                    </div>
                </div>
                <!-- BREADCRUMB ROW -->

                <div>
                    <ul class="wt-breadcrumb breadcrumb-style-2" style="direction: rtl;">
                        <li><a href="/">خانه</a></li>
                        <li>آموزش</li>
                    </ul>
                </div>

                <!-- BREADCRUMB ROW END -->
            </div>
        </div>
    </div>
    <!-- INNER PAGE BANNER END -->
@endsection

@section("body")

    @if(isset($training) && count($training)>0)
        <!-- Training Area -->

        <!-- SECTION CONTENT START -->
        <div class="section-full small-device  p-tb80">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-12">
                    @if($training!=null && count($training)>0)
                            @foreach($training as $item)
                            <!-- BLOG START -->
                                <div class="blog-post date-style-1 blog-detail text-black">

                                    <div class="wt-post-media">

                                        <!--Fade slider-->
                                        <div class="owl-carousel owl-fade-slider-one owl-btn-vertical-center m-b30">
                                            <div class="item">
                                                <div class="aon-thum-bx">
                                                    <img src="{{$item->thumb}}" alt="{{$item->title}}">
                                                </div>
                                            </div>
                                        </div>
                                        <!--fade slider END-->

                                    </div>

                                    <div class="wt-post-title ">
                                        <a href="/{{$locale}}{{$item->link_address}}"><h4
                                                class="post-title">{{$item->title}}</h4></a>
                                    </div>

                                    <div class="wt-post-meta ">
                                        <ul>
                                            <li class="post-author"><strong>{{$item->author}}</strong></li>
                                            <li class="post-date"><strong>{{$item->reg_date}} </strong></li>
                                        </ul>
                                    </div>

                                    <div class="wt-post-text">
                                        <blockquote>
                                            <i class="fa fa-quote-left"></i>
                                            <p>{{$item->excerpt}}</p>
                                        </blockquote>
                                    </div>

                                </div>
                                <!-- BLOG END -->
                            @endforeach
                                <div class="row">
                                    <div class="col-md-12">
                                        <nav class="navbar-right">
                                            <ul class="pagination">
                                                <li>
                                                    <a href="{{$training->previousPageUrl()}}">
                                                        <span aria-hidden="true"><i class="fa fa-angle-left"></i></span>
                                                    </a>
                                                </li>
                                                @for($i=1;$i<=$training->lastPage();$i++)

                                                    @if($i==$training->currentPage())
                                                        <li class="active">
                                                            <a href="{{$training->url($i)}}">{{$i}}
                                                                <span class="sr-only">(current)</span>
                                                            </a>
                                                        </li>
                                                    @else
                                                        <li>
                                                            <a href="{{$training->url($i)}}">
                                                                {{$i}}
                                                            </a>
                                                        </li>

                                                    @endif
                                                @endfor
                                                <li>
                                                    <a href="{{$training->nextPageUrl()}}">
                                                        <span aria-hidden="true"><i class="fa fa-angle-right"></i></span>
                                                    </a>
                                                </li>

                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                                <!-- pagination -->
                        @endif
                    </div>
                    @include("home::shared._training_sidebar",["categories"=>$categories])

                </div>
            </div>
        </div>
        <!-- SECTION CONTENT END -->
    @endif

@endsection

@push("script")
@endpush
