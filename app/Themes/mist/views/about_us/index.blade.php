@extends("home::shared.layout",
["title"=>"درباره ما","AjaxToken"=>true
,"captcha"=>true
])

@section("breadcrumb")

    <div class="page-header" >
        <div class="container">
            <h1 class="title">درباره ما</h1>
        </div>
        <div class="breadcrumb-box">
            <div class="container">
                <ul class="breadcrumb">
                    <li>
                        <a href="/">خانه</a>
                    </li>
                    <li class="active">درباره ما</li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section("body")

    <!-- Main -->
    @if(isset($about))
        <!-- About Us Area -->
{{--        <div class="tm-section about-us-area bg-white tm-padding-section">--}}
{{--            <div class="container">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-xl-6 col-lg-5">--}}
{{--                        <div class="tm-about-image">--}}
{{--                            <img class="wow fadeInLeft" src="{{$about->thumb}}"--}}
{{--                                 alt="{{$about->title}}">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-xl-6 col-lg-7">--}}
{{--                        <div class="tm-about-content">--}}
{{--                            <h2>{{$about->title}}</h2>--}}
{{--                            <span class="divider"><i class="fa fa-superpowers"></i></span>--}}
{{--                            <p>{{$about->excerpt}}</p>--}}
{{--                            <br/>--}}
{{--                            <p>{!! $about->content !!}</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <!--// About Us Area -->
        <section class="page-section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
{{--                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>--}}
                            </ol>
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
                                <div class="item active">
                                    <img src="{{$about->thumb}}" width="800" height="570" alt="" title="{{$about->title}}" />
                                    <div class="carousel-caption">
                                        <h2>{{$about->title}}</h2>
                                    </div>
                                </div>
{{--                                <div class="item">--}}
{{--                                    <img src="img/sections/about/img2.jpg" width="800" height="570" alt="" title="" />--}}
{{--                                    <div class="carousel-caption">--}}
{{--                                        <h2>Team Work</h2>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

                            </div>
                            <!-- Controls -->
                            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                                <span class="fa fa-angle-left fa-2x" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span></a>
                            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                                <span class="fa fa-angle-right fa-2x" aria-hidden="true"></span>
                                <span class="sr-only">Next</span></a></div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <h4>>{{$about->title}}</h4>
                        <p>{{$about->excerpt}}</p>
                        <br/>
                        <span>{!! $about->content !!}</span>

                    </div>
                </div>
            </div>
        </section>
    @endif


@endsection

@push("script")
@endpush
