<?php
$post_meta = collect($post->post_meta);
$template = $post_meta->firstWhere("meta_key", "template")->meta_value;
$page_content = $post_meta->firstWhere("meta_key", "page_content")->meta_value;
?>

@section("breadcrumb")
<!--Page Title-->
<section class="page-title" style="background-image:url({{$site->header_banner}})">
    <div class="auto-container">
        <h1>{{$post->title}}</h1>
        <ul class="page-breadcrumb">
            <li><a href="/{{$locale}}/">خانه</a></li>
            <li>{{$post->title}}</li>
        </ul>
    </div>
</section>
<!--End Page Title-->
@endsection

@section("body")
<!--Welcome Section-->
<section class="welcome-section alternate">
    <div class="auto-container">
        <div class="row clearfix">
            <form role="form" name="frm_visit" id="frm_visit" method="post">
                {{csrf_field()}}
                <input type="hidden" name="post_id" id="post_id" value="{{$post->id}}">
                <input type="hidden" name="post_type" id="post_type" value="{{$post->post_type}}">
                <input type="hidden" name="category_id"  id="category_id" value="0">
            </form>
            @php
             $col_number = 12;
            if(isset($post->thumb) && $post->thumb !=""){
                $col_number = 7;
            }
            @endphp

            <!--Content Column-->
            <div class="content-column col-lg-{{$col_number}} col-md-12 col-sm-12">
                <div class="inner-column">
                    <h2>{{$post->title}}</h2>
                    <div class="text">

                        <p>{{$post->excerpt}}</p>
                        <p>{!! $post->content !!}</p>
                    </div>
{{--                    <a href="#" class="theme-btn btn-style-three">Read More</a>--}}
                    @if(isset($post->attachments) && $post->attachments->count()>0)
                        @foreach($post->attachments as $item)
                            <a href="#" data-image="{{$item->file}}" data-zoom-image="{{$item->file}}">
                                <img id="img_{{$item->id}}" src="{{$item->file}}" />
                            </a>
                        @endforeach

                    @endif
                </div>
            </div>
            @if(isset($post->thumb) && $post->thumb !="")
            <!--image Column-->
            <div class="image-column col-lg-5 col-md-12 col-sm-12">

                <div class="image">
                    <img src="{{$post->thumb}}" alt="{{$post->title}}" />
                </div>

                @isset($page_content)
                    <span class="img-description" > {{$page_content }} </span>
                @endisset
            </div>
            @endif
        </div>
    </div>
</section>
<!--End Welcome Section-->
@endsection

@push("script")
{{--    <script type="text/javascript" src="{{theme_assets("assets/js/jquery.elevateZoom-3.0.8.min.js")}}"></script>--}}
{{--    <!-- Custom Js Code -->--}}
{{--    <script src="{{theme_assets("assets/plugin/validation/validate.min.js")}}"></script>--}}
{{--    <script src="{{theme_assets("assets/script/comment.js")}}"></script>--}}
    <script src="/js/visits.js"></script>
@endpush
