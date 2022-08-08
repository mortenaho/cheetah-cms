@extends("home::shared.layout",
["title"=>"$title ",
"AjaxToken"=>"true"
])

@push("styles")
    <style>
        /* overwrite styles*/
        .team-section:before {
            background-color: rgba(0,0,0,0.1) !important;
        }
        .btn-style-three {
            background-color: #018dc8 !important;
            color: #ffffff !important;
            border-color: #176d92 !important;
        }

        .team-block .inner-box {
            position: relative;
            overflow: hidden;
            background-color: rgba(255,255,255,9.0) !important;
            text-align: right;
            padding: 10px;
        }
    </style>
@endpush

<?php $index_view= "home::category._$include_page";?>

@section("breadcrumb")
    <!--Page Title-->
    <section class="page-title" style="background-image:url({{$site->header_banner}})">
        <div class="auto-container">
            <h1>{{$title}}</h1>
            <ul class="page-breadcrumb">
                <li><a href="/{{$locale}}/">{{trans('home.mainPage')}}</a></li>
                <li class="active">{{$title}}</li>
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
