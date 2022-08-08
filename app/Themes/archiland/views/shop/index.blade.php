@extends("home::shared.layout",
["title"=>"فروشگاه"
])

@section("breadcrumb")
    {{--{{$site->header_banner}}--}}
    <section id="subheader" data-speed="8" data-type="background">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>فروشگاه</h1>
                    <ul class="crumb">
                        <li><a href="/">صفحه اصلی</a></li>
                        <li class="sep">/</li>
                        <li>فروشگاه</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- INNER PAGE BANNER END -->
@endsection
@section("body")

    <!-- content begin -->
    <div id="content">
        <div class="container">
            <div class="row">
{{--                <form name="shopForm" id='shopForm' >--}}
                    {{csrf_field()}}
                    <div class="col-md-9">
                        @if(isset($posts) && count($posts)>0)
                            <ul class="products row">
                                @foreach($posts as $item)
                                    <?php
                                    $post_meta = ResToModel($item->post_meta);
                                    $price = $post_meta["price"];
                                    $discount = $post_meta["discount"];
                                    ?>
                                    <li class="col-xl-3 col-lg-4 col-md-6 product">
                                        <div class="p-inner">
                                            <div class="p-images">
                                                <a href="/{{$locale}}{{$item->link_address}}">
                                                    <img src="{{$item->thumb}}" class="pi-1 img-responsive"
                                                         alt="{{$item->title}}">
                                                    <img src="{{$item->thumb}}" class="pi-2 img-responsive"
                                                         alt="{{$item->title}}">
                                                </a>
                                            </div>
                                            <a href="/{{$locale}}{{$item->link_address}}">
                                                <h4>{{$item->title}}</h4>
                                            </a>
                                            <div class="p-rating">
                                                <i class="fa fa-star checked"></i>
                                                <i class="fa fa-star checked"></i>
                                                <i class="fa fa-star checked"></i>
                                                <i class="fa fa-star checked"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="price">${{$price}}</div>
                                            <button onclick="addToCart({{$item->id}});" class="btn btn-line">افزودن به سبد خرید</button>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>

                            <div class="text-center">
                                <ul class="pagination">

                                    <li>
                                        <a href="{{$posts->nextPageUrl()}}">
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </li>
                                    @for($i=1;$i<=$posts->lastPage();$i++)

                                        @if($i==$posts->currentPage())
                                            <li class="active">
                                                <a href="{{$posts->url($i)}}">{{$i}}</a>
                                            </li>
                                        @else
                                            <li>
                                                <a href="{{$posts->url($i)}}"> {{$i}} </a>
                                            </li>

                                        @endif
                                    @endfor
                                    <li>
                                        <a href="{{$posts->previousPageUrl()}}">
                                            <i class="fa fa-angle-left"></i>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        @endif
                    </div>
{{--                </form>--}}
                <div id="sidebar" class="col-md-3">
                    <div class="widget widget_search">
                        <input type='text' name='search' id='search' class="form-control" placeholder="{{trans('home.products_search')}}">
                        <button id="btn-search" type='submit'></button>
                        <div class="clearfix"></div>
                    </div>

                    <div class="widget widget_top_rated_product">
                        <h4>{{trans('home.top_selling_products')}}</h4>
                        <ul>
                            @foreach($posts as $item)
                            <li>
                                <a href="/{{$locale}}{{$item->link_address}}" >
                                <img src="{{$item->thumb}}" alt="">
                                </a>>
                                <div class="text">
                                    <a href="/{{$locale}}{{$item->link_address}}" >
                                    {{$item->title}}
                                    </a>
                                    <div class="p-rating">
                                        <i class="fa fa-star checked"></i>
                                        <i class="fa fa-star checked"></i>
                                        <i class="fa fa-star checked"></i>
                                        <i class="fa fa-star checked"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
{{--                                    <div class="price">$420</div>--}}
                                </div>

                            </li>

                            @endforeach

                        </ul>
                    </div>

                    <div class="widget widget_category">
                        <h4>{{trans('home.products_categories')}}</h4>
                        <ul>
                            @foreach($categories as $category)
                            <li><a href="/{{$locale}}/category/{{$category->id}}/{{$category->url_slug}}">{{$category->title}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>
        </div>


    </div>

@endsection

@push("script")
    <script src="/admin_assets/global_assets/js/plugins/forms/validation/validate.min.js"></script>
    <script src="{{theme_assets("assets/script/shop.js")}}"></script>
@endpush
