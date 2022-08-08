@extends("home::shared.layout",
["title"=>"$post->title ",
"AjaxToken"=>"true",
"captcha"=>true,

])

<?php
$post_meta = collect($post->post_meta);
$price = $post_meta->firstWhere("meta_key", "price")->meta_value;
$discount = $post_meta->firstWhere("meta_key", "discount")->meta_value;
?>
@section("breadcrumb")
    {{--    {{$site->header_banner}}--}}
    <section id="subheader" data-speed="8" data-type="background">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>{{$post->title}}</h1>
                    <ul class="crumb">
                        <li><a href="/{{$locale}}/">خانه</a></li>
                        <li><a href="/{{$locale}}/products">محصولات</a></li>
                        @isset($post->category)
                            <li>
                                <a href="/{{$locale}}/category/{{$post->category->id}}/{{$post->category->url_slug}}">{{$post->category->title}}</a>
                            </li>
                        @endisset
                        <li>{{$post->title}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- INNER PAGE BANNER END -->
@endsection

@section("body")


    <form role="form" name="frm_visit" id="frm_visit" method="post">
        {{csrf_field()}}
        <input type="hidden" name="post_id" id="post_id" value="{{$post->id}}">
        <input type="hidden" name="post_type" id="post_type" value="{{$post->post_type}}">
        <input type="hidden" name="category_id"  id="category_id" value="{{$post->category_id}}">
    </form>

    <!-- section service begin -->
    <section id="section-service-2" class="side-bg no-padding mt-4" data-bgcolor="#212225">
        @php
            $post_meta = ResToModel($contact_info->post_meta);
            $tel_1 = $post_meta["tel_1"];
            $tel_2 = $post_meta["tel_2"];
            $mobile = $post_meta["mobile"];
        @endphp
        <div class="image-container col-md-6 offset-md-4 pull-right inner-padding" data-delay="0">

            <img  class="img-responsive "  src="{{$post->thumb}}" alt="{{$post->title}}" />

        </div>
        <div class="container">
            <div class="row">
                <div class="inner-padding pull-right">
                    <div class="col-md-12 wow fadeInLeft " data-wow-delay=".5s">

                        <a href="/{{$locale}}{{$post->link_address}}">
                            <h3 class="id-color">{{$post->title}}</h3>
                        </a>
                        {{$post->excerpt}}
                        <div class="spacer-single"></div>

                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

    </section>

    <section id="section-service-3" class="side-bg no-padding">

        <div class="container">
            <div class="row">
                <div class="inner-padding">
                    <div class="col-md-12  wow fadeInRight" data-wow-delay=".5s">

                        {!! $post->content !!}

                        <div class="spacer-single"></div>

                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </section>


@endsection
@push("script")
    <script src="{{theme_assets("assets/plugin/validation/validate.min.js")}}"></script>
    <script src="{{theme_assets("assets/script/comment.js")}}"></script>
    <script src="/js/visits.js"></script>
@endpush
