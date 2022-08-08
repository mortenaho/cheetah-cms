@extends("home::shared.layout",
["title"=>"محصولات"
])

@section("breadcrumb")
    {{--{{$site->header_banner}}--}}
    <section class="breadcrumbs-custom-inset">
        <div class="breadcrumbs-custom context-dark">
            <div class="container">
                <br/><br/> <br/>
                <h4 class="breadcrumbs-custom-title">محصولات</h4>
                <ul class="breadcrumbs-custom-path">
                    <li><a href="/">صفحه اصلی</a></li>
                    <li>محصولات</li>
                </ul>
            </div>
            <div class="box-position"
                 style="background-image: url({{theme_assets("assets/images/bg-breadcrumbs.jpg")}});"></div>
        </div>
    </section>
@endsection
@section("body")
    @if(isset($posts) && count($posts)>0)
        <section class="section section-sm bg-default text-center isotope-wrap">
            <div class="container">
{{--                <div class="isotope-filters isotope-filters-horizontal">--}}
{{--                    <button class="isotope-filters-toggle button button-md button-icon button-icon-right button-default-outline button-wapasha" data-custom-toggle="#isotope-1" data-custom-toggle-hide-on-blur="true"><span class="icon fa fa-caret-down"></span>Filter</button>--}}
{{--                    <ul class="isotope-filters-list" id="isotope-1">--}}
{{--                        <li><a class="active" href="#" data-isotope-filter="*" data-isotope-group="gallery">All</a></li>--}}
{{--                        <li><a href="#" data-isotope-filter="Type 1" data-isotope-group="gallery">Apartments</a></li>--}}
{{--                        <li><a href="#" data-isotope-filter="Type 2" data-isotope-group="gallery">Offices</a></li>--}}
{{--                        <li><a href="#" data-isotope-filter="Type 3" data-isotope-group="gallery">Corporate designs</a></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
                <div class="row row-50 isotope" data-lightgallery="group">
                    @foreach($posts as $item)
                        <?php
                        $post_meta = ResToModel($item->post_meta);
                        $price = $post_meta["price"];
                        $discount = $post_meta["discount"];
                        ?>
                    <div class="col-md-6 col-lg-4 isotope-item" data-filter="Type 3">
                        <!-- Thumbnail Modern-->
                        <article class="thumbnail thumbnail-modern thumbnail-sm"><a class="thumbnail-modern-figure" href="{{$item->thumb}}" data-lightgallery="item"><img src="{{$item->thumb}}" alt="" width="370" height="303"/></a>
                            <div class="thumbnail-modern-caption">
                                <h5 class="thumbnail-modern-title"><a href="/{{$locale}}{{$item->link_address}}">{{$item->title}}</a></h5>
                                <p class="thumbnail-modern-subtitle"></p>
                            </div>
                        </article>
                    </div>
                    @endforeach

                </div>
                <div class="button-wrap">
                    <button class="button button-md button-default-outline button-wapasha">بیشتر</button>
                </div>
            </div>
        </section>
        <!-- SECTION CONTENT START -->
    @endif

@endsection

@push("script")
    <script src="{{theme_assets("assets/script/products.js")}}"></script>
@endpush
