@extends("home::shared.layout",
["title"=>"آموزش"
])

@section("breadcrumb")
    <div class="tm-breadcrumb-area tm-padding-section text-center" data-overlay="1"
         data-bgimage="{{$site->header_banner}}"
         style="background-image: url({{$site->header_banner}});">
        <div class="container">
            <div class="tm-breadcrumb">
                <h2 class="tm-breadcrumb-title">آموزش</h2>
                <ul>
                    <li><a href="/">خانه</a></li>
                    <li>آموزش</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
@section("body")
    @if(isset($training) && count($training)>0)
        <!-- Training Area -->
        <div class="tm-section services-area bg-grey tm-padding-section">
            <div class="container">
{{--                <div class="row justify-content-center ">--}}
{{--                    <div class="col-xl-6 col-lg-7 col-md-10 col-12">--}}
{{--                        <div class="tm-section-title text-center">--}}
{{--                            <h2>آموزش ها</h2>--}}
{{--                            <span class="divider"><i class="fa fa-superpowers"></i></span>--}}
{{--                            <p></p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div class="col-lg-8 col-12 float-lg-right">
                    @foreach($training as $item)
                        <div class="col-lg-12 col-md-12 col-12 mt-30 blog-masonry-item">
                            <div class="blog-slider-item">
                                <div class="tm-blog wow fadeInUp">

                                    <div class="tm-blog-content">
                                        <div class="tm-blog-meta">
                                                    <span><i class="fa fa-user-o"></i>توسط<a
                                                            href="{{$item->link_address}}"> {{$item->author}} </a></span>
                                            <span><i class="fa fa-calendar-o"></i>{{$item->reg_date}}</span>
                                        </div>
                                        <h5><a href="{{$item->link_address}}">{{$item->title}}</a></h5>
                                        {{--                                                    <p class="blog_list_p" style="height: 130px;">{{$item->excerpt}}</p>--}}
                                        <a href="{{$item->link_address}}" class="tm-readmore">ادامه
                                            مطلب...</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                @include("home::shared._training_sidebar",["categories"=>$categories])

            </div>
        </div>
        <!--// Training Area -->

    @endif

@endsection

@push("script")
@endpush
