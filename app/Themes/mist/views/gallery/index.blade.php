@extends("home::shared.layout",
["title"=>"گالری تصاویر",
])

@section("breadcrumb")

    <div class="page-header" data-bgimage="{{$site->header_banner}}"
         style="background-image: url({{$site->header_banner}});">
        <div class="container">
            <h1 class="title">گالری تصاویر</h1>
        </div>
        <div class="breadcrumb-box">
            <div class="container">
                <ul class="breadcrumb">
                    <li>
                        <a href="/">خانه</a>
                    </li>
                    <li class="active">گالری تصاویر</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- page-header -->
@endsection

@section("body")

    <section id="works" class="page-section">
        <div class="container">
            <div class="mixed-grid pad">
                <div class="clearfix"></div>
                <div class="masonry-grid grid-col-4" data-gutter="0">
                    <div class="grid-sizer"></div>


                @if(isset($galleries)  && count($galleries)>0)

                    @foreach($galleries as $item)
                        <!-- Item 1 -->
                            <div class="grid-item">
                                <img src="{{$item->thumb}}" alt="{{$item->title}}" class="img-responsive"/>
                                <div class="img-overlay"></div>
                                <div class="figcaption">
                                    <div class="caption-block">
                                        <h4>{{$item->title}}</h4>
                                    </div>
                                    <!-- Image Popup-->
                                    <a href="{{$item->thumb}}" data-rel="prettyPhoto[portfolio]">
                                        <i class="fa fa-search"></i>
                                    </a>
                                    <a href="/{{$locale}}/galleries/{{$item->id}}">
                                        <i class="fa fa-link"></i>
                                    </a></div>
                            </div>
                            <!-- Item 1 Ends-->

                        @endforeach

                    @else
                        <div class="alert alert-warning">
                            <h4>چیزی برای نمایش یافت نشد .</h4>
                            <a href="/{{$locale}}/galleries" class="tm-button">بازگشت به صفحه گالری تصاویر</a>
                        </div>

                    @endif


                </div>
            </div>
        </div>
    </section>

@endsection
@push("script")
    <script src="{{theme_assets("assets/js/isotope.min.js")}}"></script>
@endpush
