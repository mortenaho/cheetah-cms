@extends("home::shared.layout",
["title"=>trans('home.services')
])

@section("breadcrumb")
    <!--Page Title-->
    <section class="page-title" style="background-image:url({{$site->header_banner}})">
        <div class="auto-container">
            <h1>{{trans('home.services')}}</h1>
            <ul class="page-breadcrumb">
                <li><a href="/{{$locale}}/">{{trans('home.mainPage')}}</a></li>
                <li class="active">{{trans('home.services')}}</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->
@endsection

@section("body")
    @if(isset($services) && count($services)>0)
        <!--Solutions Page Section-->
        <section class="solutions-page-section">
            <div class="auto-container">
                <div class="row clearfix">
                    @foreach($services as $item)
                          <div class="services-block col-lg-4 col-md-6 col-sm-12">
                            <div class="inner-box">
                                <div class="upper-box">
                                    <span
                                        class="icon flaticon-chemistry-class-flask-with-liquid-for-experimentation"></span>
                                    <h3><a href="/{{$locale}}{{$item->link_address}}">{{$item->title}}</a></h3>
                                </div>
                                <div class="lower-box">
                                    <div class="image">
                                        <img src="{{$item->thumb}}" alt="{{$item->title}}"/>
                                        <div class="overlay-box">
                                            <div class="text"> {{$item->excerpt}}</div>
                                            <a href="/{{$locale}}{{$item->link_address}}" class="link-btn"><span
                                                    class="fa fa-link"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
        <!--End Solutions Page Section-->
    @endif
@endsection

@push("script")
@endpush
