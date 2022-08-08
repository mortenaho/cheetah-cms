@extends("home::shared.layout",
["title"=>"درباره ما","AjaxToken"=>true
,"captcha"=>true
])

@section("breadcrumb")
    <div class="tm-breadcrumb-area tm-padding-section text-center" data-overlay="1"
         data-bgimage="{{$site->header_banner}}"
         style="background-image: url({{$site->header_banner}});">
        <div class="container">
            <div class="tm-breadcrumb">
                <h2 class="tm-breadcrumb-title">درباره ما</h2>
                <ul>
                    <li><a href="/">خانه</a></li>
                    <li>درباره ما</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
@section("body")

    <!-- Main -->
    @if(isset($about))
        <!-- About Us Area -->
        <div class="tm-section about-us-area bg-white tm-padding-section">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-5">
                        <div class="tm-about-image">
                            <img class="wow fadeInLeft" src="{{$about->thumb}}"
                                 alt="{{$about->title}}">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-7">
                        <div class="tm-about-content">
                            <h2>{{$about->title}}</h2>
                            <span class="divider"><i class="fa fa-superpowers"></i></span>
                            <p>{{$about->excerpt}}</p>
                            <br/>
                            <p>{!! $about->content !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--// About Us Area -->
    @endif


@endsection

@push("script")
@endpush
