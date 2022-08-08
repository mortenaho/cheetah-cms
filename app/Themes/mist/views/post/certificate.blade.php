@extends("home::shared.layout",
    ["title"=>"$title ",
    "captcha"=>true,
    "AjaxToken"=>"true"
    ])


<?php $index_view = "home::post._$include_page";?>
<?php
$other_certificates = post_get::get_last_post(8, "certificate");
?>
@section("breadcrumb")

    <div class="page-header" data-bgimage="{{$site->header_banner}}"
         style="background-image: url({{$site->header_banner}});"
    >
        <div class="container">
            <h3 class="title">{{$title}}</h3>
        </div>
        <div class="breadcrumb-box">
            <div class="container">
                <ul class="breadcrumb">
                    <li>
                        <a href="/{{$locale}}/">خانه</a>
                    </li>
                    <li class="active">{{$title}}</li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section("body")

    <form role="form" name="frm_visit" id="frm_visit" method="post">
        {{csrf_field()}}
        <input type="hidden" name="post_id" id="post_id" value="{{$post->id}}">
        <input type="hidden" name="post_type" id="post_type" value="{{$post->post_type}}">
        <input type="hidden" name="category_id"  id="category_id" value="{{$post->category_id}}">
    </form>

    <!-- Main services -->
    <section class="page-section">
        <div class="container">
            <div class="row">
{{--                <div class="col-md-6 col-sm-6 text-center" data-animation="fadeInLeft">--}}


{{--                </div>--}}
                <div class="col-md-12 col-sm-12" data-animation="fadeInRight">
                    <!-- Image -->
                    <a href="/{{$locale}}{{$post->link_address}}">
                        <img src="{{$post->thumb}}" width="590" height="415" alt="{{$post->title}}" style="float: right;margin-left:20px;"/>
                    </a>
                    <p class="lead">
                        <strong>{{$post->title}}</strong>
                    </p>
                    <p><strong>{{$post->excerpt}}</strong></p>
                    <div class="post-desc">
                        {!! $post->content !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Main services -->

    <!-- Other services -->
    <section id="features" class="page-section">
        <div class="image-bg content-in fixed" data-background="{{theme_assets("assets/img/sections/bg/bg-4.jpg")}}">
            <div class="overlay-strips"></div>
        </div>
        <div class="container">

            <div class="section-title white">
                <!-- Heading -->
                <h2 class="title">سایر گواهینامه ها</h2>
            </div>

            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="owl-carousel pagination-1 light-switch" data-pagination="true" data-items="4" data-autoplay="true" data-navigation="false">
                        @isset($other_certificates)

                            @foreach($other_certificates as $item)
                                @if($item->id != $post->id)
                                    <a href="/{{$locale}}{{$item->link_address}}">
                                        <img src="{{$item->thumb}}" width="270"  alt="{{$item->title}}" />
                                    </a>
                                @endif
                            @endforeach

                        @endif
                      </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Other services -->

@endsection
@push("script")
    <script src="/js/visits.js"></script>
@endpush
