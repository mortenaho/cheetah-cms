

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
                            <h4 style="color: #0a0a0a;text-align: center">{{$item->title}}</h4>
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

    <!--Styled Pagination-->
    <ul class="styled-pagination text-center">
        <li class="prev"><a href="/{{$posts->previousPageUrl()}}"><span class="fa fa-angle-left"></span></a>
        </li>
        @for($i=1;$i<=$posts->lastPage();$i++)

            @if($i==$posts->currentPage())
                <li class="active">
                    <a class="active" href="{{$posts->url($i)}}">{{$i}} </a>
                </li>
            @else
                <li>
                    <a href="{{$posts->url($i)}}">
                        {{$i}}
                    </a>
                </li>
            @endif
        @endfor
        <li class="next"><a href="{{$posts->nextPageUrl()}}"><span class="fa fa-angle-right"></span></a></li>
    </ul>
    <!--End Styled Pagination-->

@endif

@push("script")
    <script src="{{theme_assets("assets/script/products.js")}}"></script>
@endpush
