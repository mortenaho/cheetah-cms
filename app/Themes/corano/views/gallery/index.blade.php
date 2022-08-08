@extends("home::shared.layout",
["title"=>"گالری تصاویر",
])

@section("breadcrumb")

    <!-- breadcrumb area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/{{$locale}}"> <i class="fa fa-home"></i> خانه </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">گالری تصاویر</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->
@endsection

@section("body")

    <!-- blog main wrapper start -->
    <div class="blog-main-wrapper section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="blog-item-wrapper">
                        <!-- blog item wrapper end -->
                        <div class="row mbn-30">

                            @if(isset($galleries)  && count($galleries)>0)

                                @foreach($galleries as $item)
                                    @if($item->parent==0)
                                        <div class="col-md-4">
                                            <!-- blog post item start -->
                                            <div class="blog-post-item mb-30">
                                                <figure class="blog-thumb">
                                                    <a href="/{{$locale}}/galleries/{{$item->id}}">
                                                        <img src="{{$item->thumb}}" alt="{{$item->title}}">
                                                    </a>
                                                </figure>
                                                <div class="blog-content">
                                                    <div class="blog-meta">
                                                        <p> {{$item->reg_date}} | <a
                                                                href="{{$item->user_id}}">{{$item->id}}</a></p>
                                                    </div>
                                                    <h4 class="blog-title">
                                                        <a href="/{{$locale}}/galleries/{{$item->id}}">{{$item->title}}</a>
                                                    </h4>
                                                </div>
                                            </div>
                                            <!-- blog post item end -->
                                        </div>
                                    @else
                                        <div class="col-md-4">
                                            <!-- blog post item start -->
                                            <div class="blog-post-item mb-30">
                                                <figure class="blog-thumb" style="height: 200px">
                                                    <a href="{{$item->thumb}}">
                                                        <img  style="object-fit: cover;" src="{{$item->thumb}}" alt="{{$item->title}}">
                                                    </a>
                                                </figure>
                                                <div class="blog-content">
                                                    <div class="blog-meta">
                                                        <p> {{$item->reg_date}} | <a
                                                                href="{{$item->user_id}}">{{$item->id}}</a></p>
                                                    </div>
                                                    <h4 class="blog-title">
                                                        <a href="{{$item->thumb}}">{{$item->title}}</a>
                                                    </h4>
                                                </div>
                                            </div>
                                            <!-- blog post item end -->
                                        </div>
                                    @endif
                                @endforeach

                            @else
                                <div class="alert alert-warning">
                                    <h4>چیزی برای نمایش یافت نشد .</h4>
                                    <a href="/{{$locale}}/" class="tm-button">بازگشت به صفحه اصلی</a>
                                </div>

                            @endif
                        </div>
                        <!-- blog item wrapper end -->

                        <!-- start pagination area -->
                        <div class="paginatoin-area text-center">
                            <ul class="pagination-box">
                                <li><a class="previous" href="#"><i class="pe-7s-angle-left"></i></a></li>
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a class="next" href="#"><i class="pe-7s-angle-right"></i></a></li>
                            </ul>
                        </div>
                        <!-- end pagination area -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- blog main wrapper end -->

@endsection
@push("script")
    <script src="{{theme_assets("assets/js/isotope.min.js")}}"></script>
@endpush
