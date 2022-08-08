@extends("home::shared.layout",
["title"=>"$title ",
"AjaxToken"=>"true"
])
<?php $index_view= "home::category._$include_page";?>

@section("breadcrumb")

    {{--{{$site->header_banner}}--}}
    <!-- INNER PAGE BANNER END -->
    <section class="breadcrumbs-custom-inset">
        <div class="breadcrumbs-custom context-dark">
            <div class="container">
                <br/><br/> <br/>
                <h5 class="breadcrumbs-custom-title">{{$title}}</h5>
                <ul class="breadcrumbs-custom-path">
                    <li><a href="/{{$locale}}/">صفحه اصلی</a></li>
                    <li class="active">{{$title}}</li>
                </ul>
            </div>
            <div class="box-position" style="background-image: url({{theme_assets("assets/images/bg-breadcrumbs.jpg")}});"></div>
        </div>
    </section>

@endsection

@section("body")
@include($index_view,["posts"=>$posts,"categories"=>$categories])
@endsection
@push("script")

@endpush
