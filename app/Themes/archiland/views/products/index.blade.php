@extends("home::shared.layout",
["title"=>"محصولات"
])

@section("breadcrumb")

    {{--{{$site->header_banner}}--}}
    <section id="subheader" data-speed="8" data-type="background">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>محصولات</h1>
                    <ul class="crumb">
                        <li><a href="/">صفحه اصلی</a></li>
                        <li class="sep">/</li>
                        <li>محصولات</li>
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

                <div class="col-md-12">
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
                                        <a href="/{{$locale}}{{$item->link_address}}" class="btn btn-line p-2 m-t20">جزییات</a>
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


            </div>
        </div>


    </div>

@endsection

@push("script")
    <script src="{{theme_assets("assets/script/products.js")}}"></script>
@endpush
