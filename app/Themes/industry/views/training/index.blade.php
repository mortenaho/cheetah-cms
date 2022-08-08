@extends("home::shared.layout",
["title"=>"آموزش"
])

@section("breadcrumb")
    <div class="page-header" data-bgimage="{{$site->header_banner}}"
         style="background-image: url({{$site->header_banner}});"
    >
        <div class="container">
            <h3 class="title">آموزش</h3>
        </div>
        <div class="breadcrumb-box">
            <div class="container">
                <ul class="breadcrumb">
                    <li>
                        <a href="/">خانه</a>
                    </li>
                    <li class="active">آموزش</li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section("body")
    @if(isset($training) && count($training)>0)
        <!-- Training Area -->
        <section id="training" class="page-section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-9 post-list">
                    @if($training!=null && count($training)>0)
                        @foreach($training as $item)
                            <!-- post -->
                                <div class="post-item clearfix">
                                    <div class="post-image pull-right ">
                                        {{--                                    <img src="{{$item->thumb}}" width="320" height="282" alt="" title=""--}}
                                        {{--                                         style="margin-left:20px"/>--}}
                                        <i class="fa fa-3x fa-code color-danger"></i>
                                    </div>
                                    <h2 class="post-title">
                                        <a href="/{{$locale}}{{$item->link_address}}">{{$item->title}}</a>
                                    </h2>
                                    <div class="post-content">{{$item->excerpt}}</div>
                                    <div class="post-meta">
                                        <!-- Author  -->
                                        <span class="author">
                                    <i class="fa fa-user"></i> {{$item->author}}</span>
                                        <!-- Meta Date -->

                                        <span class="time">
                                    <i class="fa fa-calendar"></i> {{$item->reg_date}}</span>
                                        <!-- Category -->
                                        <a href="/{{$locale}}{{$item->link_address}}">
                                    <span class="category pull-right">
                                    <i class="fa fa-link"></i> ادامه</span>
                                        </a>
                                    </div>
                                </div>
                                <!-- post -->
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
        </section>
        <!--// Training Area -->
        <section id="categories" class="page-section">
            <div class="container">
                {{--                            <div class="row">--}}
                {{--                                <div class="col-md-10 col-md-offset-1">--}}
                {{--                                    <div class="section-title" data-animation="fadeInUp">--}}
                {{--                                        <h2 class="text-center title"></h2>--}}
                {{--                                    </div>--}}
                {{--                                    <p class="text-center" data-animation="fadeInDown"></p>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                <div class="row text-left top-pad-50">
                    <div class="col-sm-3 col-md-3 opacity" data-animation="fadeInLeft">
                        <img width="500" height="319" class="bottom-pad-20" alt=""
                             src="img/sections/arc1.jpg"/>
                        <p></p>
                        <hr class="bottom-margin-10"/>
                        <h4>ASP.net Core</h4>
                    </div>
                    <div class="col-sm-3 col-md-3 opacity" data-animation="fadeInRight">
                        <img width="500" height="319" class="bottom-pad-20" alt=""
                             src="img/sections/arc2.jpg"/>
                        <p></p>
                        <hr class="bottom-margin-10"/>
                        <h4>PHP Laravel</h4>
                    </div>
                    <div class="col-sm-3 col-md-3 opacity" data-animation="fadeInLeft">
                        <img width="500" height="319" class="bottom-pad-20" alt=""
                             src="img/sections/arc3.jpg"/>
                        <p></p>
                        <hr class="bottom-margin-10"/>
                        <h4>ReactJS</h4>
                    </div>
                    <div class="col-sm-3 col-md-3 opacity" data-animation="fadeInRight">
                        <img width="500" height="319" class="bottom-pad-20" alt=""
                             src="img/sections/arc4.jpg"/>
                        <p></p>
                        <hr class="bottom-margin-10"/>
                        <h4>Flutter</h4>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection

@push("script")
@endpush
