@extends("home::shared.layout",
["title"=>"گالری تصاویر",
])

@section("breadcrumb")
    {{--{{$site->header_banner}}--}}
    <section class="breadcrumbs-custom-inset">
        <div class="breadcrumbs-custom context-dark">
            <div class="container">
                <br/><br/> <br/>
                <h5 class="breadcrumbs-custom-title">گالری تصاویر</h5>
                <ul class="breadcrumbs-custom-path">
                    <li><a href="/{{$locale}}/">صفحه اصلی</a></li>
                    <li class="active">گالری تصاویر</li>
                </ul>
            </div>
            <div class="box-position" style="background-image: url({{theme_assets("assets/images/bg-breadcrumbs.jpg")}});"></div>
        </div>
    </section>
    <!-- INNER PAGE BANNER END -->
@endsection

@section("body")
    <section class="section section-sm section-fluid bg-default text-center isotope-wrap">
        <div class="container-fluid">
{{--            <div class="isotope-filters isotope-filters-horizontal">--}}
{{--                <button class="isotope-filters-toggle button button-md button-icon button-icon-right button-default-outline button-wapasha" data-custom-toggle="#isotope-6" data-custom-toggle-hide-on-blur="true"><span class="icon fa fa-caret-down"></span>Filter</button>--}}
{{--                <ul class="isotope-filters-list" id="isotope-6">--}}
{{--                    <li><a class="active" href="#" data-isotope-filter="*" data-isotope-group="gallery">All</a></li>--}}
{{--                    <li><a href="#" data-isotope-filter="Type 1" data-isotope-group="gallery">Apartments</a></li>--}}
{{--                    <li><a href="#" data-isotope-filter="Type 2" data-isotope-group="gallery">Offices</a></li>--}}
{{--                    <li><a href="#" data-isotope-filter="Type 3" data-isotope-group="gallery">Corporate designs</a></li>--}}
{{--                </ul>--}}
{{--            </div>--}}
            <div class="row row-30 row-isotope isotope" data-lightgallery="group">
                @foreach($galleries as $item)
                <div class="col-sm-6 col-md-4 col-xl-3 isotope-item" data-filter="Type 3">
                    <div class="oh-desktop">
                        <!-- Thumbnail Classic-->
                        <article class="thumbnail thumbnail-mary thumbnail-md">
                            <div class="thumbnail-mary-figure"><img src="{{$item->thumb}}" alt="{{$item->title}}" /> </div>
                            <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="{{$item->thumb}}" data-lightgallery="item"><img src="{{$item->thumb}}" alt="" /></a>
                                @if($item->parent==0)
                                    <h5 class="thumbnail-mary-title"><a href="/{{$locale}}/galleries/{{$item->id}}">{{$item->title}}</a></h5>
                                @else
                                    <h5 class="thumbnail-mary-title"><a href="{{$item->thumb}}">{{$item->title}}</a></h5>
                                @endif
                            </div>
                        </article>
                    </div>
                </div>
                @endforeach
             </div>
{{--            <div class="button-wrap">--}}
{{--                <button class="button button-md button-default-outline button-wapasha">Load More</button>--}}
{{--            </div>--}}
        </div>
    </section>

@endsection
@push("script")
    {{--    <script src="{{theme_assets("assets/js/isotope.min.js")}}"></script>--}}
@endpush
