@extends("home::shared.layout",
["title"=>"نمونه کار",
])


@section("breadcrumb")


    {{--{{$site->header_banner}}--}}
    <section class="breadcrumbs-custom-inset">
        <div class="breadcrumbs-custom context-dark">
            <div class="container">
                <br/><br/> <br/>
                <h4 class="breadcrumbs-custom-title">نمونه کار</h4>
                <ul class="breadcrumbs-custom-path">
                    <li><a href="/">صفحه اصلی</a></li>
                    <li>نمونه کار</li>
                </ul>
            </div>
            <div class="box-position"
                 style="background-image: url({{theme_assets("assets/images/bg-breadcrumbs.jpg")}});"></div>
        </div>
    </section>
@endsection

@section("body")

    @if(isset($portfolio)  && count($portfolio)>0)

        <!-- content begin -->
        <section class="section section-sm section-fluid bg-default text-center isotope-wrap">
            <div class="container-fluid">
                <div class="isotope-filters isotope-filters-horizontal">
                    <button
                        class="isotope-filters-toggle button button-md button-icon button-icon-right button-default-outline button-wapasha"
                        data-custom-toggle="#isotope-3" data-custom-toggle-hide-on-blur="true"><span
                            class="icon fa fa-caret-down"></span>Filter
                    </button>
                    <ul class="isotope-filters-list" id="isotope-3">
                        <li><a class="active" href="#" data-isotope-filter="*" data-isotope-group="gallery">نمایش
                                همه</a></li>
                        @foreach($portfolio as $item)
                            <li><a href="#" data-isotope-filter="Type {{$item->id}}"
                                   data-isotope-group="gallery">{{$item->title}}</a></li>
                        @endforeach

                    </ul>
                </div>
                <div class="row row-30 isotope" data-lightgallery="group">
                    @foreach($portfolio as $item)
                        @foreach($item->posts as $post)
                            <div class="col-sm-6 col-lg-4 col-xxl-3 isotope-item"
                                 data-filter="Type {{$post->category_id}}">
                                <!-- Thumbnail Classic-->
                                <article class="thumbnail thumbnail-classic thumbnail-md">
                                    <div class="thumbnail-classic-figure"><img src="{{$post->thumb}}" alt="" width="420"
                                                                               height="350"/></div>
                                    <div class="thumbnail-classic-caption">
                                        <div class="thumbnail-classic-title-wrap"><a class="icon fl-bigmug-line-zoom60"
                                                                                     href="{{$post->thumb}}"
                                                                                     data-lightgallery="item"><img
                                                    src="{{$post->thumb}}" alt="" width="420" height="350"/></a>
                                            <h5 class="thumbnail-classic-title"><a
                                                    href="/{{$locale}}{{$post->link_address}}">{{$item->title}}</a></h5>
                                        </div>
                                         <p class="thumbnail-classic-text">{{$item->title}}</p>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    @endforeach

                </div>
                <div class="button-wrap">
                    <button class="button button-md button-default-outline button-wapasha">ادامه</button>
                </div>
            </div>
        </section>

    @endif
@endsection
@push("script")
    {{--    <script src="{{theme_assets("assets/js/isotope.min.js")}}"></script>--}}
@endpush
