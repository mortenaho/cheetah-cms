@extends("home::shared.layout",
["title"=>"درباره ما","AjaxToken"=>true
,"captcha"=>true
])

@section("breadcrumb")

   <!--Page Title-->
    <section class="page-title" style="background-image:url({{$site->header_banner}})">
        <div class="auto-container">
            <h1>{{trans('home.about_us')}}</h1>
            <ul class="page-breadcrumb">
                <li>
                    <a href="/{{$locale}}/">{{trans('home.mainPage')}}</a>
                </li>
                <li class="active">{{trans('home.about_us')}}</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->
@endsection

@section("body")

    <!-- Main -->
    @if(isset($about))

        <section class="welcome-section alternate">
            <div class="auto-container">
                <div class="row clearfix">

                    <!--Content Column-->
                    <div class="content-column col-lg-7 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <h2>{{$about->title}}</h2>
                            <div class="text">
                                <p>{!! $about->content !!}</p>
                            </div>

                            {{--                        @if(isset($post->attachments) && $post->attachments->count()>0)--}}
                            {{--                            @foreach($post->attachments as $item)--}}
                            {{--                                <a href="#" data-image="{{$item->file}}" data-zoom-image="{{$item->file}}">--}}
                            {{--                                    <img id="img_{{$item->id}}" src="{{$item->file}}" />--}}
                            {{--                                </a>--}}
                            {{--                            @endforeach--}}
                            {{--                        @endif--}}
                        </div>
                    </div>

                    <!--image Column-->
                    <div class="image-column col-lg-5 col-md-12 col-sm-12">
                        <div class="image">
                            <img src="{{$about->thumb}}" alt="{{$about->title}}" />
                        </div>
                        <p class="img-description">{{$about->excerpt}}</p>
                    </div>

                </div>
            </div>
        </section>
    @endif


@endsection

@push("script")
@endpush
