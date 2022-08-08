@extends("home::shared.layout",
["title"=>"محصولات"
])

@section("breadcrumb")
    <!-- INNER PAGE BANNER -->
    <div class="wt-bnr-inr overlay-wraper bg-center"
         style="background-image:url({{$site->header_banner}});">
        <div class="overlay-main bg-black opacity-07"></div>
        <div class="container">
            <div class="wt-bnr-inr-entry">
                <div class="banner-title-outer">
                    <div class="banner-title-name">
                        <h3 class="text-white">محصولات</h3>
                    </div>
                </div>
                <!-- BREADCRUMB ROW -->

                <div>
                    <ul class="wt-breadcrumb breadcrumb-style-2" style="direction: rtl;">
                        <li><a href="/">خانه</a></li>
                        <li>محصولات</li>
                    </ul>
                </div>

                <!-- BREADCRUMB ROW END -->
            </div>
        </div>
    </div>
    <!-- INNER PAGE BANNER END -->

@endsection
@section("body")
    @if(isset($posts) && count($posts)>0)

        <!-- SECTION CONTENT START -->
        <div class="section-full small-device p-t80 p-b50 bg-gray">

            <!-- GALLERY CONTENT START -->
            <div class="container">
                <!-- GALLERY CONTENT START -->
                <div class="portfolio-wrap mfp-gallery work-grid row clearfix">
                @foreach($posts as $item)
                    <?php
                    $post_meta = ResToModel($item->post_meta);
                    $price = $post_meta["price"];
                    $discount = $post_meta["discount"];
                    ?>
                    <!-- COLUMNS  -->
                    <div class="masonry-item col-lg-3  col-md-4 col-sm-6 m-b30">
                        <div class="wt-box">
                            <div class="work-hover-grid">
                                <img src="{{$item->thumb}}" alt="{{$item->title}}"/>
                                <div class="work-hover-discription">
                                    <h4>{{$item->title}}</h4>
                                    <h5>{{number_format($price)}}</h5>
                                </div>
                                <a href="/{{$locale}}{{$item->link_address}}"></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <ul class="pagination m-tb0">

                            <li>
                                <a href="{{$posts->nextPageUrl()}}">
                                    <span aria-hidden="true"><i class="fa fa-angle-right"></i></span>
                                </a>
                            </li>
                            @for($i=1;$i<=$posts->lastPage();$i++)

                                @if($i==$posts->currentPage())
                                    <li class="active">
                                        <a href="{{$posts->url($i)}}">{{$i}}
                                            <span class="sr-only">(current)</span>
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
                            <li>
                                <a href="{{$posts->previousPageUrl()}}">
                                    <span aria-hidden="true"><i class="fa fa-angle-left"></i></span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection

@push("script")
    <script src="{{theme_assets("assets/script/products.js")}}"></script>
@endpush
