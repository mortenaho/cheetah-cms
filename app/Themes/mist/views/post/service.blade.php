@extends("home::shared.layout",
    ["title"=>"$title ",
    "captcha"=>true,
    "AjaxToken"=>"true"
    ])


<?php $index_view = "home::post._$include_page";?>
<?php
$other_services = post_get::get_last_post(8, "service");
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
                <h2 class="title">سایر خدمات</h2>
            </div>
            <div class="row white">
                @isset($other_services)

                    @foreach($other_services as $item)
                        @if($item->id != $post->id)
                        <div class="item-box icons-color hover-white col-sm-6 col-md-4">
                            <a href="/{{$locale}}{{$item->link_address}}">
                                <!-- Icon -->
                                <i class="icon-perm-data-setting fa-2x"></i>
                                <!-- Title -->
                                <h5 class="title">{{$item->title}}</h5>
                                <!-- Text -->
                                <div>
                                    {{$post->excerpt}}
                                </div>
                            </a>
                        </div>
                        @endif
                    @endforeach
                @endif

            </div>
        </div>
    </section>
    <!-- Other services -->

@endsection
@push("script")
    <script src="/js/visits.js"></script>
@endpush
