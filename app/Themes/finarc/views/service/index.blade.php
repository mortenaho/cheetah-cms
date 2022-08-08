@extends("home::shared.layout",
["title"=>"خدمات"
])

@section("breadcrumb")
    {{--{{$site->header_banner}}--}}

    <section class="breadcrumbs-custom-inset">
        <div class="breadcrumbs-custom context-dark">
            <div class="container">
                <br/><br/> <br/>
                <h4 class="breadcrumbs-custom-title">خدمات</h4>
                <ul class="breadcrumbs-custom-path">
                    <li><a href="/">صفحه اصلی</a></li>
                    <li class="active">خدمات</li>
                </ul>
            </div>
            <div class="box-position" style="background-image: url({{theme_assets("assets/images/bg-breadcrumbs.jpg")}});"></div>
        </div>
    </section>

@endsection

@section("body")
    <!-- Section-services-->
    <section class="section section-sm bg-default">
        <div class="container">
            <div class="row row-50 justify-content-center box-ordered">

                @if(isset($services) && count($services)>0)
                    @foreach($services as $item)
                        <div class="col-md-6 col-lg-4 col-xl-3">
                            <!-- Services Classic-->
                            <article class="services-classic"><a class="services-classic-figure"
                                                                 href="/{{$locale}}{{$item->link_address}}"><img
                                        src="{{$item->thumb}}" alt="{{$item->title}}" width="370" height="297"/></a>
                                <div class="services-classic-caption">
                                    <h5 class="services-classic-counter box-ordered-item"></h5>
                                    <h6 class="services-classic-title"><a href="/{{$locale}}{{$item->link_address}}">{{$item->title}}</a>
                                    </h6>
                                </div>
                            </article>
                        </div>

                    @endforeach
                @endif

            </div>
        </div>
    </section>
@endsection

@push("script")
@endpush
