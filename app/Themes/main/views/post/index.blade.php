@extends("home::shared.layout",
["title"=>"$title ",
"AjaxToken"=>"true"
])
<?php $index_view= "home::post._$include_page";?>

@section("breadcrumb")
    <div class="tm-breadcrumb-area tm-padding-section text-center" data-overlay="1"
         data-bgimage="{{$site->header_banner}}"
         style="background-image: url({{$site->header_banner}});">
        <div class="container">
            <div class="tm-breadcrumb">
                <h2 class="tm-breadcrumb-title">{{$title}}</h2>
                <ul>
                    <li><a href="/">خانه</a></li>
                    <li>{{$title}}</li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section("body")
@include($index_view,["posts"=>$posts,"categories"=>$categories])
@endsection
@push("script")

@endpush
