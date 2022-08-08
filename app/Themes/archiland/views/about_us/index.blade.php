@extends("home::shared.layout",
["title"=>"درباره ما","AjaxToken"=>true
,"captcha"=>true
])

@section("breadcrumb")
    {{--{{$site->header_banner}}--}}
    <section id="subheader" data-speed="8" data-type="background">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>درباره ما</h1>
                    <ul class="crumb">
                        <li><a href="/">صفحه اصلی</a></li>
                        <li class="sep">/</li>
                        <li>درباره ما</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- INNER PAGE BANNER END -->

@endsection

@section("body")

    <!-- Main -->
    @if(isset($about))

        <!-- content begin -->
        <div id="content" class="no-top no-bottom">
            <section id="section-about-us-2" class="side-bg no-padding">
                <div class="image-container col-md-5 pull-left" data-delay="0">
                    <img src="{{$about->thumb}}" alt="">
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-md-6 offset-md-6 " data-animation="fadeInRight" data-delay="200">
                            <div class="inner-padding">
                                <h2>{{$about->title}}</h2>

                                <p class="intro">{{$about->excerpt}}</p>

                                {!! $about->content !!}
                            </div>

                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="section-testimonial" class="text-light">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 offset-md-3 text-center wow fadeInUp">
                            <h1>خدمات</h1>
                            <div class="separator"><span><i class="fa fa-circle"></i></span></div>
                            <div class="spacer-single"></div>
                        </div>
                    </div>

                    <div class="owl-custom-nav">
                        <a class="btn-next"></a>
                        <a class="btn-prev"></a>
                    </div>

                    <div id="gallery-carousel-4" class="owl-carousel owl-theme owl-slide">
                    @isset($services)
                        @foreach($services as $item)
                            <!-- gallery item -->
                                <div class="item">
                                    <div class="picframe">
                                        <a class="simple-ajax-popup-align-top"
                                           href="/{{$locale}}{{$item->link_address}}">
                                        <span class="overlay-v">
                                            <span class="pf_text">
                                                <span class="project-name">{{$item->title}}</span>
                                            </span>

                                        </span>
                                        </a>
                                        <img src="{{$item->thumb}}" alt="{{$item->title}}"/>
                                    </div>

                                </div>
                                <!-- close gallery item -->
                            @endforeach
                        @endif


                    </div>

                </div>
            </section>

            <!-- section begin -->
            <section id="view-all-projects" class="call-to-action bg-color dark text-center" data-speed="5"
                     data-type="background" aria-label="view-all-projects">
                <a href="/{{$locale}}/contact-us" class="btn btn-line black btn-big">تماس با ما</a>
            </section>
            <!-- logo carousel section close -->
        </div>
    @endif


@endsection

@push("script")
@endpush
