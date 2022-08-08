@extends("home::shared.layout",
["title"=>"محصولات"
])
@push("styles")
    <style>
        /* overwrite styles*/
        .team-section:before {
            background-color: rgba(0,0,0,0.1) !important;
        }
        .btn-style-three {
            background-color: #018dc8 !important;
            color: #ffffff !important;
            border-color: #ffb200 !important;
        }
    </style>
@endpush
@section("breadcrumb")
    <!--Page Title-->
    <section class="page-title" style="background-image:url({{$site->header_banner}})">
        <div class="auto-container">
            <h1>{{trans('home.products')}}</h1>
            <ul class="page-breadcrumb">
                <li><a href="/{{$locale}}/">{{trans('home.mainPage')}}</a></li>
                <li>{{trans('home.products')}}</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->
@endsection
@section("body")
    @if(isset($posts) && count($posts)>0)
        @php
            $row=1;
        @endphp

        @foreach($posts->sortBy('ordering') as $item)

            <section class="team-section"
                     style="background-image:url({{$item->thumb}})">

                @php
                    $offset=2;
                    if(($row % 2)==0){
                        $offset=8;
                    }
                @endphp

                <div class="auto-container">


                    <div class="row clearfix">

                        <div class="team-block col-lg-6 col-md-6 col-sm-12 offset-lg-{{$offset}}">
                            <div class="inner-box">
                                <h4 >{{$item->title}}</h4>
                                @php
                                    $dom = new DOMDocument();
                                    $html = $item->content;
                                    $dom->loadHTML(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'));
                                    $xpath = new DOMXPath($dom);
                                    $domElements= $xpath->query('//div[@class="brief_desc_class"]');

                                    $divContent   =  "";//array(); //$domElement->innerHTML;
                                    foreach ($domElements as $element) {
                                       $divContent =  $dom->saveHtml($element);
                                    }

                                @endphp
                                <p style="color: #fafafa">
                                    {!! $divContent !!}
                                </p>
                                <h3 style="text-align: center;padding: 10px;">
                                    <a href="/{{$locale}}{{$item->link_address}}" class="theme-btn btn-style-three">ادامه
                                        مطلب</a>
                                </h3>
                            </div>
                        </div>


                    </div>

                </div>

                @php
                    $row++;
                @endphp
            </section>
        @endforeach
    @endif

@endsection

@push("script")
    <script src="{{theme_assets("assets/script/products.js")}}"></script>
@endpush
