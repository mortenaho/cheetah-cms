@extends("home::shared.layout",
["title"=>"صفحه اصلی","has_slider"=>"true","sliders"=>$sliders,"AjaxToken"=>true
,"captcha"=>true
])



@section("body")

    @include("home::index._slider",["has_slider"=>"true","sliders"=>$sliders])

{{--    @if(plugin::is_active("service"))--}}
{{--        --}}{{--start service--}}
{{--        @include("home::index._service2")--}}
{{--        --}}{{--end service--}}
{{--    @endif--}}

    <br/>

    @if(plugin::is_active("service"))
        {{--start service--}}
        @include("home::index._service")
        {{--end service--}}
    @endif

    <br/>

    @if(isset($about))
        <section class="testimonial-area section-padding bg-img pt-10 mt-10" data-bg="{{$about->thumb}}" style="background-image: url({{$about->thumb}});">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- section title start -->
                        <div class="section-title text-center">
                            <h2 class="title text-center">درباره ما</h2>
                            <p class="sub-title text-center">{{$about->excerpt}}</p>
                        </div>
                        <!-- section title start -->
                    </div>
                </div>
            </div>
        </section>
    @endif

    <br/>


    @if(plugin::is_active("product"))
        {{--start customer--}}
{{--      @include("home::index._product")--}}
        {{--end customer--}}
    @endif

    @if(plugin::is_active("portfolio"))
        {{--start portfolio--}}
        @include("home::index._portfolio")
        {{--end portfolio--}}
    @endif

    @include("home::index._last_post",["last_post"=>$last_post])

    @if(plugin::is_active("customer"))
        {{--start customer--}}
        @include("home::index._customer")
        {{--end customer--}}
    @endif


@endsection

@push("script")
    <script src="{{theme_assets("assets/plugin/validation/validate.min.js")}}"></script>
    <script src="{{theme_assets("assets/script/index.js")}}"></script>
@endpush
