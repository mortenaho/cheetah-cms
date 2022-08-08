@extends("home::shared.layout",
["title"=>"$title ",
"AjaxToken"=>"true"
])
<?php $index_view= "home::post._$include_page";?>

@section("breadcrumb")
    <!--Page Title-->
    <section class="page-title" style="background-image:url({{$site->header_banner}})">
        <div class="auto-container">
            <h1>{{trans('home.posts')}}</h1>
            <ul class="page-breadcrumb">
                <li><a href="/{{$locale}}/">{{trans('home.mainPage')}}</a></li>
                <li class="active">{{trans('home.posts')}}</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->
@endsection

@section("body")
@include($index_view,["posts"=>$posts,"categories"=>$categories])
@endsection
@push("script")

@endpush
