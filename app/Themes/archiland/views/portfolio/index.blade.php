@extends("home::shared.layout",
["title"=>"نمونه کار",
])


@section("breadcrumb")


    {{--{{$site->header_banner}}--}}

    <section id="subheader" data-speed="8" data-type="background">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>نمونه کار</h1>
                    <ul class="crumb">
                        <li><a href="/">صفحه اصلی</a></li>
                        <li class="sep">/</li>
                        <li>نمونه کار</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- INNER PAGE BANNER END -->
@endsection

@section("body")

    @if(isset($portfolio)  && count($portfolio)>0)

         <!-- content begin -->
        <div id="content">
            <div class="container">

                <div class="spacer-single"></div>
                <!-- portfolio filter begin -->
                <div class="row">
                <div class="col-md-12">
                    <ul id="filters" class="wow fadeInUp" data-wow-delay="0s">
                        @foreach($portfolio as $item)
                        <li><a href="#" data-filter=".{{$item->id}}">{{$item->title}}</a></li>
                        @endforeach
                        <li class="pull-right"><a href="#" data-filter="*" class="selected">نمایش همه</a></li>
                    </ul>

                </div>
            </div>
                <!-- portfolio filter close -->
                <div id="gallery" class="row gallery full-gallery de-gallery pf_4_cols hover-1 wow fadeInUp" data-wow-delay=".3s">
                @foreach($portfolio as $item)
                    @foreach($item->posts as $post)
                    <!-- gallery item -->
                    <div class="col-md-3 col-sm-6 col-xs-12 item mb30 {{$post->category_id}}">
                        <div class="picframe">
                            <a class="simple-ajax-popup-align-top" href="/{{$locale}}{{$post->link_address}}">
                                    <span class="overlay-1">
                                        <span class="pf_text">
                                            <span class="project-name">{{$post->title}}</span>
                                        </span>
                                    </span>
                            </a>
                            <img src="{{$post->thumb}}" alt="{{$post->title}}" />
                        </div>
                    </div>
                    <!-- close gallery item -->
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
