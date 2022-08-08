@extends("home::shared.layout",
["title"=>"خدمات"
])

@section("breadcrumb")
    {{--{{$site->header_banner}}--}}

    <section id="subheader" data-speed="8" data-type="background">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>خدمات</h1>
                    <ul class="crumb">
                        <li><a href="/">صفحه اصلی</a></li>
                        <li class="sep">/</li>
                        <li>خدمات</li>
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
                @if(isset($services) && count($services)>0)
                    @foreach($services as $item)
                        <div class="col-md-3">
                            <h3><span class="id-color">{{$item->title}}</span> </h3>
                            {{$item->excerpt}}
                            <div class="spacer-single"></div>
                            <img src="{{$item->thumb}}" class="img-responsive" alt="{{$item->title}}">
                            <div class="spacer-single"></div>
                            <a href="/{{$locale}}{{$item->link_address}}" class="btn-line btn-fullwidth">ادامه</a>
                        </div>
                    @endforeach
                @endif


            </div>
        </div>



    </div>

@endsection

@push("script")
@endpush
