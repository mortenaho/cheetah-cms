@extends("home::shared.layout",
["title"=>"گالری تصاویر",
])


@section("breadcrumb")
    <div class="tm-breadcrumb-area tm-padding-section text-center" data-overlay="1"
         data-bgimage="{{$site->header_banner}}"
         style="background-image: url({{$site->header_banner}});">
        <div class="container">
            <div class="tm-breadcrumb">
                <h2 class="tm-breadcrumb-title">گالری تصاویر</h2>
                <ul>
                    <li><a href="/">خانه</a></li>
                    <li>گالری تصاویر</li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section("body")
    <main class="main-content">


        <!-- Our Portfolios -->
        <div class="tm-section portfolios-area bg-grey tm-padding-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-7 col-md-10 col-12">
                        <div class="tm-section-title text-center">
                            <h2>گالری تصاویر</h2>
                            <span class="divider"><i class="fa fa-superpowers"></i></span>

                        </div>
                    </div>
                </div>

                @if(isset($galleries)  && count($galleries)>0)

                    <div class="row tm-portfolio-wrapper mt-30-reverse">
                    @foreach($galleries as $item)

                        <!-- Portfolio Single -->
                            <div
                                class="col-lg-4 col-md-6 col-12 tm-portfolio-item portfolio-filter-{{$item->category_id}} portfolio-filter-investment">
                                <div class="tm-portfolio mt-30 wow fadeInUp">
                                    <div class="tm-portfolio-image">
                                        <img
                                            style="height: 220px;object-fit: cover;"
                                            src="{{$item->thumb}}"
                                            alt="{{$item->title}}">
                                        <ul class="tm-portfolio-actions">
                                            <li class="link-button">
                                                <a href="/galleries/{{$item->id}}"><i class="fa fa-link"></i></a>
                                            </li>
                                            <li class="zoom-button">
                                                <a href="{{$item->thumb}}"><i
                                                        class="fa fa-search-plus"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tm-portfolio-content">
                                        <h5><a href="/galleries/{{$item->id}}">{{$item->title}}</a></h5>
                                        <h6> {{$item->excerpt}} </h6>
                                    </div>
                                </div>
                            </div>
                            <!--// Portfolio Single -->

                        @endforeach
                    </div>
                @else
                    <div class="tm-pnf">

                        <h2> مشکلی پیش آمده است</h2>
                        <h4>چیزی برای نمایش یافت نشد .</h4>
                        <a href="/galleries" class="tm-button">بازگشت به صفحه گالری تصاویر</a>
                    </div>
                @endif
            </div>
        </div>
        <!--// Our Portfolios -->


    </main>
@endsection
@push("script")

@endpush
