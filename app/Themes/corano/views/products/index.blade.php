@extends("home::shared.layout",
["title"=>"محصولات"
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
                                <li class="breadcrumb-item active" aria-current="page">محصولات</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section("body")
    @if(isset($posts) && count($posts)>0)
        <!-- page main wrapper start -->
        <div class="shop-main-wrapper section-padding">
            <div class="container">
                <div class="row">
                    <!-- shop main wrapper start -->
                    <div class="col-lg-12">
                        <div class="section-title text-center">
                            <h3 class="title text-center">محصولات ما</h3>
                            <p class="sub-title-2 text-center"></p>
                        </div>
                        <div class="shop-product-wrapper">

                        @if(isset($posts) && count($posts)>0)
                            <!-- product item list wrapper start -->
                                <div class="shop-product-wrap grid-view row mbn-30">
                                    <!-- product single item start -->
                                    @foreach($posts as $item)

                                        <?php
                                        $post_meta = ResToModel($item->post_meta);
                                        $price = $post_meta["price"];
                                        $discount = $post_meta["discount"];
                                        ?>
                                        <div class="col-md-4 col-sm-6">
                                            <!-- product grid start -->
                                            <div class="product-item">
                                                <figure class="product-thumb custom-product-thumb">
                                                    <a href="/{{$locale}}{{$item->link_address}}">
                                                        <img class="pri-img" src="{{$item->thumb}}"
                                                             alt="{{$item->title}}">
                                                        <img class="sec-img" src="{{$item->thumb}}"
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
                                                        <a href="/{{$locale}}{{$item->link_address}}">
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
                                                        <a href="{{$item->link_address}}">{{$item->title}}</a>
                                                    </h6>
                                                    <div class="price-box">
                                                        <span class="price-regular">{{number_format($price)}}</span>
                                                        <span class="price-old"><del>{{number_format($discount)}}</del></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- product grid end -->
                                        </div>

                                    @endforeach
                                </div>
                                <!-- product item list wrapper end -->
                                <!-- pagination start -->
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <nav class="navbar-right">--}}
{{--                                            <ul class="pagination">--}}
{{--                                                <li>--}}
{{--                                                    <a href="/{{$posts->previousPageUrl()}}">--}}
{{--                                                        <span aria-hidden="true"><i class="fa fa-angle-left"></i></span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                @for($i=1;$i<=$posts->lastPage();$i++)--}}

{{--                                                    @if($i==$posts->currentPage())--}}
{{--                                                        <li class="active">--}}
{{--                                                            <a href="{{$posts->url($i)}}">{{$i}}--}}
{{--                                                                <span class="sr-only">(current)</span>--}}
{{--                                                            </a>--}}
{{--                                                        </li>--}}
{{--                                                    @else--}}
{{--                                                        <li>--}}
{{--                                                            <a href="{{$posts->url($i)}}">--}}
{{--                                                                {{$i}}--}}
{{--                                                            </a>--}}
{{--                                                        </li>--}}

{{--                                                    @endif--}}
{{--                                                @endfor--}}
{{--                                                <li>--}}
{{--                                                    <a href="{{$posts->nextPageUrl()}}">--}}
{{--                                                        <span aria-hidden="true"><i--}}
{{--                                                                class="fa fa-angle-right"></i></span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}

{{--                                            </ul>--}}
{{--                                        </nav>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

                                <div class="paginatoin-area text-center">
                                    <ul class="pagination-box">
                                        <li><a class="previous" href="/{{$posts->previousPageUrl()}}"><i class="pe-7s-angle-left"></i></a></li>


                                        @for($i=1;$i<=$posts->lastPage();$i++)

                                            @if($i==$posts->currentPage())
                                                <li class="active">
                                                    <a href="{{$posts->url($i)}}">{{$i}}
                                                    </a>
                                                </li>
                                            @else
                                                <li>
                                                    <a href="{{$posts->url($i)}}">
                                                        {{$i}}
                                                    </a>
                                                </li>

                                            @endif
                                        @endfor

                                        <li><a class="next" href="{{$posts->nextPageUrl()}}"><i class="pe-7s-angle-right"></i></a></li>
                                    </ul>
                                </div>
                                <!-- pagination end -->
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- page main wrapper end -->
    @endif



@endsection

@push("script")
    <script src="{{theme_assets("assets/script/products.js")}}"></script>
@endpush
