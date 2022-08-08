@extends("home::shared.layout",
["title"=>"$title",
"AjaxToken"=>"true"
])
<?php $index_view= "home::post._$include_page";?>

@section("breadcrumb")

<section id="subheader" data-speed="8" data-type="background">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>{{$title}}</h1>
                <ul class="crumb">
                    <li><a href="/">صفحه اصلی</a></li>
                    <li class="sep">/</li>
                    <li>{{$title}}</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- INNER PAGE BANNER END -->
@endsection

@section("body")
@include($index_view,["posts"=>$posts,"categories"=>$categories])
@endsection
@push("script")

@endpush
