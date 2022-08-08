@extends("home::shared.layout",
["title"=>"$title ",
"AjaxToken"=>"true"
])
<?php $index_view= "home::post._$include_page";?>

@section("breadcrumb")
    <div class="page-header" data-bgimage="{{$site->header_banner}}"
         style="background-image: url({{$site->header_banner}});"
    >
        <div class="container">
            <h2 class="title">{{$title}}</h2>
        </div>
        <div class="breadcrumb-box">
            <div class="container">
                <ul class="breadcrumb">
                    <li>
                        <a href="/">خانه</a>
                    </li>
                    <li class="active">{{$title}}</li>
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
