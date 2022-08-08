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
<style>
    /* overwrite  css*/
    .page-title {
        position: relative;
        text-align: center;
        padding: 150px 0px 150px !important;
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center top;
    }
</style>
@section("breadcrumb")
    <!--Page Title-->
    <section class="page-title" style="background-image:url({{$post->thumb}})">
        <div class="auto-container">
{{--            <h1>{{$post->title}}</h1>--}}
{{--            <ul class="page-breadcrumb">--}}
{{--                <li><a href="/{{$locale}}/">خانه</a></li>--}}
{{--                <li><a href="/{{$locale}}/products">محصولات</a></li>--}}
{{--                @isset($post->category)--}}
{{--                    <li>--}}
{{--                        <a href="/{{$locale}}/category/{{$post->category->id}}/{{$post->category->url_slug}}">{{$post->category->title}}</a>--}}
{{--                    </li>--}}
{{--                @endisset--}}
{{--                <li class="active">{{$post->title}}</li>--}}
{{--            </ul>--}}
        </div>
    </section>
    <!--End Page Title-->
@endsection
@section("body")
    <!-- page-section -->
    <section class="welcome-section alternate">
        <div class="auto-container">
            <div class="row clearfix">
                <form role="form" name="frm_visit" id="frm_visit" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="post_id" id="post_id" value="{{$post->id}}">
                    <input type="hidden" name="post_type" id="post_type" value="{{$post->post_type}}">
                    <input type="hidden" name="category_id"  id="category_id" value="0">
                </form>

                <!--Content Column-->
                <div class="content-column col-lg-12 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <h2>{{$post->title}}</h2>
                        <div class="text">
                            <div id="main-content-area">{!! $post->content !!}</div>
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

            </div>
        </div>
    </section>

@endsection
@push("script")
{{--    <script type="text/javascript" src="{{theme_assets("assets/js/jquery.elevateZoom-3.0.8.min.js")}}"></script>--}}
{{--    <!-- Custom Js Code -->--}}
{{--    <script src="{{theme_assets("assets/plugin/validation/validate.min.js")}}"></script>--}}
{{--    <script src="{{theme_assets("assets/script/comment.js")}}"></script>--}}
    <script src="/js/visits.js"></script>
@endpush
