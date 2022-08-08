@php
  if(!isset($lang)){$lang="fa";}
@endphp

@extends("home::shared.layout",
["title"=>"صفحه اصلی","has_slider"=>"true","sliders"=>$sliders,"AjaxToken"=>true
,"captcha"=>true,"lang"=>$lang
])


@section("body")
    <!-- Main -->



{{--    @if(plugin::is_active("product"))--}}
{{--        --}}{{--start products--}}
{{--        @include("home::index._product")--}}
{{--        --}}{{--end products--}}
{{--    @endif--}}



    <!-- works -->


{{--    --}}{{--start last_post--}}
{{--    @include("home::index._last_post",["last_post"=>$last_post])--}}
{{--    --}}{{--end last_post--}}
{{--    <!-- News -->--}}

{{--    @if(plugin::is_active("customer"))--}}
{{--        --}}{{--start customer--}}
{{--        @include("home::index._customer")--}}
{{--        --}}{{--end customer--}}
{{--    @endif--}}
{{--    <!-- clients -->--}}

{{--    @include("home::index._testimonial")--}}


    <!-- section services begin -->
    @if(plugin::is_active("service"))

            @include("home::index._service")

        @endif
    <!-- section services close -->

    @if(isset($about))
    <!-- section begin -->
    <section id="section-steps" class="text-light">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3 text-center wow fadeInUp">
                    <h1>{{$about->title}}</h1>
                    <div class="separator"><span><i class="fa fa-circle"></i></span></div>
                    <div class="spacer-single"></div>
                </div>

                <div class="col-md-12">
                   <p>
                       {{$about->excerpt}}
                   </p>
                </div>
            </div>
        </div>
    </section>
    <!-- section close -->
    @endif

    <!-- section begin -->
    @if(plugin::is_active("portfolio"))

        @include("home::index._portfolio")

    @endif
    <!-- section close -->


    <!-- section begin -->
    <section id="view-all-projects" class="call-to-action bg-color text-center" data-speed="5" data-type="background" aria-label="view-all-projects">
        <a href="/{{$locale}}/portfolio" class="btn btn-line black btn-big">نمایش همه </a>
    </section>

    <!-- logo carousel section close -->

    @include("home::index._testimonial")

@endsection

@push("script")
    <script src="{{theme_assets("assets/plugin/validation/validate.min.js")}}"></script>
    <script src="{{theme_assets("assets/script/contact_us.js")}}"></script>
@endpush
