@extends("home::shared.layout",
["title"=>"خدمات"
])

@section("breadcrumb")
    <div class="tm-breadcrumb-area tm-padding-section text-center" data-overlay="1"
         data-bgimage="{{$site->header_banner}}"
         style="background-image: url({{$site->header_banner}});">
        <div class="container">
            <div class="tm-breadcrumb">
                <h2 class="tm-breadcrumb-title">خدمات</h2>
                <ul>
                    <li><a href="/">خانه</a></li>
                    <li>خدمات</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
@section("body")
    @if(isset($services) && count($services)>0)
        <!-- Services Area -->
        <div class="tm-section services-area bg-grey tm-padding-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-7 col-md-10 col-12">
                        <div class="tm-section-title text-center">
                            <h2>خدمات ما</h2>
                            <span class="divider"><i class="fa fa-superpowers"></i></span>
                            <p></p>
                        </div>
                    </div>
                </div>
                <div class="row mt-30-reverse">
                @foreach($services as $item)
                    <!-- Single Service -->
                        <div class="col-lg-4 col-md-6 col-12 mt-30">
                            <div class="tm-service text-center wow fadeInUp">
                                    <span class="tm-service-icon">
                                        <img src="{{$item->thumb}}" alt="{{$item->title}}">
                                    </span>
                                <div class="tm-service-content">
                                    <h5><a href="{{$item->link_address}}">{{$item->title}}</a></h5>
                                    <p>{{$item->excerpt}}</p>
                                    <a href="{{$item->link_address}}" class="tm-readmore">بیشتر بخوانید</a>
                                </div>
                            </div>
                        </div>
                        <!--// Single Service -->
                    @endforeach
                </div>
            </div>
        </div>
        <!--// Services Area -->
    @endif

@endsection

@push("script")
@endpush
