@extends("home::shared.layout",
    ["title"=>"$title ",
    "captcha"=>true,
    "AjaxToken"=>"true"
    ])

<?php
    $post_meta = ResToModel($contact_info->post_meta);
    $tel_1 = $post_meta["tel_1"];
    $tel_2 = $post_meta["tel_2"];
    $mobile = $post_meta["mobile"];
    $address = $post_meta["address"];
    $fax = $post_meta["fax"];
    $email = $post_meta["email"];
    $latitude = $post_meta["latitude"];
    $longitude = $post_meta["longitude"];
?>

<?php //$index_view = "home::post._$include_page";?>
<?php
$other_services = post_get::get_last_post(8, "service");
?>
@section("breadcrumb")
    {{--    {{$site->header_banner}}--}}

    <section class="breadcrumbs-custom-inset">
        <div class="breadcrumbs-custom context-dark">
            <div class="container">
                <br/><br/> <br/>
                <h4 class="breadcrumbs-custom-title">{{$post->title}}</h4>
                <ul class="breadcrumbs-custom-path">
                    <li><a href="/{{$locale}}/">خانه</a></li>
                    <li><a href="/{{$locale}}/services">خدمات</a></li>
                    <li class="active">{{$post->title}}</li>
                </ul>
            </div>
            <div class="box-position" style="background-image: url({{theme_assets("assets/images/bg-breadcrumbs.jpg")}});"></div>
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


    <!-- Section single service-->
    <section class="section section-sm bg-default">
        <div class="container">
            <div class="row row-70">
                <div class="col-lg-8">
                    <div class="single-service">
                        <h4>{{$post->title}}</h4>
                        <p class="text-spacing-100"></p>
                        <!-- Quote Classic-->
                        <article class="quote-classic">
                            <div class="quote-classic-text">
                                <p class="q"> {{$post->excerpt}}</p>
                            </div>
                        </article>
                        <p class="text-spacing-100"> {!! $post->content !!}</p>
                        <div class="row row-40 align-items-xl-center">
                            <div class="col-md-6 col-xl-5">
                                <h5 class="text-spacing-100">سایر خدمات</h5>
                                <ul class="list-sm list-marked list-marked-sm list-marked-secondary text-spacing-100">
                                    @isset($other_services)
                                        @foreach($other_services as $item)
                                            @if($item->id != $post->id)
                                                <li><img src="{{$item->thumb}}" alt="{{$item->title}}"  width="100"/></li>
                                            @endif
                                        @endforeach
                                    @endif
                                </ul>
{{--                                <a class="button button-primary button-pipaluk" href="/{{$locale}}/services">خدمات</a>--}}
                            </div>
                            <div class="col-md-6 col-xl-7 text-lg-right"><img src="{{$post->thumb}}" alt="{{$post->title}}" width="418" height="289"/> </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <!-- Post Sidebar-->
                    <div class="post-sidebar post-sidebar-inset">
                        <div class="row row-lg row-60">
                            <div class="col-sm-6 col-lg-12">
                                <div class="post-sidebar-item">
                                    <h5>سایر خدمات</h5>
                                    <div class="post-sidebar-item-inset inset-right-20">
                                        <ul class="list list-categories">
                                            @isset($other_services)
                                                @foreach($other_services as $item)
                                                    @if($item->id != $post->id)
                                                          <li><a href="/{{$locale}}{{$item->link_address}}">{{$item->title}}</a></li>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-12">
                                <div class="post-sidebar-item">
                                    <h5>اطلاعات تماس</h5>
                                    <div class="post-sidebar-item-inset">
                                        <ul class="list-contacts">
                                            <li>
                                                <div class="unit unit-spacing-xs">
                                                    <div class="unit-left"><span class="icon fa fa-phone"></span></div>
                                                    <div class="unit-body"><a class="link-phone" href="tel:{{$tel_1}}">{{$tel_1}}</a></div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="unit unit-spacing-xs">
                                                    <div class="unit-left"><span class="icon fa fa-envelope"></span></div>
                                                    <div class="unit-body"><a class="link-email" href=""><span class="__cf_email__" data-cfemail="ea83848c85aa8e8f878586838481c485988d">{{$email}}</span></a></div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="unit unit-spacing-xs">
                                                    <div class="unit-left"><span class="icon fa fa-location-arrow"></span></div>
                                                    <div class="unit-body"><a class="link-location" href="#">{{$address}}</a></div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@push("script")
    <script src="/js/visits.js"></script>
@endpush
