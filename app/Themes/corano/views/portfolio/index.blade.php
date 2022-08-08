@extends("home::shared.layout",
["title"=>"نمونه کار",
])


@section("breadcrumb")
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/"><i class="fa fa-home"></i>خانه</a></li>
                                <li class="breadcrumb-item active" aria-current="page">نمونه کارها</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("body")
    <!-- page main wrapper start -->
    <div class="shop-main-wrapper section-padding">
        <div class="container">
            <div class="row">
                <!-- shop main wrapper start -->
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <h3 class="title text-center">نمونه کارهای ما</h3>
                        <p class="sub-title-2 text-center"></p>
                    </div>
                    <div class="shop-product-wrapper">

                    @if(isset($portfolio)  && count($portfolio)>0)
                        <!-- product item list wrapper start -->
                            <div class="shop-product-wrap grid-view row mbn-30">
                                <!-- product single item start -->
                                @foreach($portfolio as $item)
                                    @foreach($item->posts as $post)
                                        <div class="col-md-4 col-sm-6">
                                            <!-- product grid start -->
                                            <div class="product-item">
                                                <figure class="product-thumb custom-product-thumb">
                                                    <a href="/{{$locale}}{{$post->link_address}}">
                                                        <img class="pri-img" src="{{$post->thumb}}"
                                                             alt="{{$item->title}}">
                                                        <img class="sec-img" src="{{$post->thumb}}"
                                                             alt="{{$item->title}}">
                                                    </a>
                                                    {{--                                        <div class="product-badge">--}}
                                                    {{--                                            <div class="product-label new">--}}
                                                    {{--                                                <span>new</span>--}}
                                                    {{--                                            </div>--}}
                                                    {{--                                            <div class="product-label discount">--}}
                                                    {{--                                                <span>10%</span>--}}
                                                    {{--                                            </div>--}}
                                                    {{--                                        </div>--}}
                                                    {{--                                                    <div class="button-group">--}}
                                                    {{--                                                        <a href="wishlist.html" data-toggle="tooltip"--}}
                                                    {{--                                                           data-placement="left" title="Add to wishlist"><i--}}
                                                    {{--                                                                class="pe-7s-like"></i></a>--}}
                                                    {{--                                                        <a href="compare.html" data-toggle="tooltip"--}}
                                                    {{--                                                           data-placement="left" title="Add to Compare"><i--}}
                                                    {{--                                                                class="pe-7s-refresh-2"></i></a>--}}
                                                    {{--                                                        <a onclick="getPortfolioDetails({{$post->id}});"><span--}}
                                                    {{--                                                                data-toggle="tooltip" data-placement="left"--}}
                                                    {{--                                                                title="Quick View"><i--}}
                                                    {{--                                                                    class="pe-7s-search"></i></span></a>--}}
                                                    {{--                                                    </div>--}}
                                                    <div class="cart-hover">
                                                        <a href="/{{$locale}}{{$post->link_address}}">
                                                            <button class="btn btn-cart">جزییات کامل</button>
                                                        </a>
                                                    </div>
                                                </figure>
                                                <div class="product-caption text-center">
                                                    {{--                                                    <div class="product-identity">--}}
                                                    {{--                                                        <p class="manufacturer-name"><a href="product-details.html">Platinum</a>--}}
                                                    {{--                                                        </p>--}}
                                                    {{--                                                    </div>--}}
                                                    <ul class="color-categories">
                                                        <li>
                                                            <a class="c-lightblue" href="#" title="LightSteelblue"></a>
                                                        </li>
                                                        <li>
                                                            <a class="c-darktan" href="#" title="Darktan"></a>
                                                        </li>
                                                        <li>
                                                            <a class="c-grey" href="#" title="Grey"></a>
                                                        </li>
                                                        <li>
                                                            <a class="c-brown" href="#" title="Brown"></a>
                                                        </li>
                                                    </ul>
                                                    <h6 class="product-name">
                                                        <a href="{{$post->link_address}}">{{$item->title}}</a>
                                                    </h6>
                                                    {{--                                                    <div class="price-box">--}}
                                                    {{--                                                        <span class="price-regular">$60.00</span>--}}
                                                    {{--                                                        <span class="price-old"><del>$70.00</del></span>--}}
                                                    {{--                                                    </div>--}}
                                                </div>
                                            </div>
                                            <!-- product grid end -->
                                        </div>
                                    @endforeach
                                @endforeach
                            </div>
                            <!-- product item list wrapper end -->
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- page main wrapper end -->
@endsection
@push("script")
    <script src="{{theme_assets("assets/script/portfolio.js")}}"></script>
@endpush
