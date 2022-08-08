@extends("home::shared.layout",
    ["title"=>"$title ",
    "captcha"=>true,
    "AjaxToken"=>"true"
    ])


<?php $index_view = "home::post._$include_page";?>
<?php
$other_services = post_get::get_last_post(8, "service");
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
                        <li><a href="/{{$locale}}/services">خدمات</a></li>
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
{{--                        <a href="service-1.html" class="btn-line">Read More</a>--}}
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
    <br/>
    <section id="section-service-3" class="side-bg padding5" data-bgcolor="#212225">

        <div class="container">
            <div class="inner-padding ">
                <div class="col-md-12 wow fadeInLeft text-center " data-wow-delay=".5s">
                        <h2 class="id-color">سایر خدمات</h2>
                        <hr/>
                </div>
                <div class="clearfix"></div>

                <div class="row">
                @isset($other_services)
                    @foreach($other_services as $item)
                        @if($item->id != $post->id)
                            <div class="col-md-4">
                                <h3><span class="id-color">{{$item->title}}</span> </h3>
                                <div class="spacer-single"></div>
                                <img src="{{$item->thumb}}" class="img-responsive" alt="{{$item->title}}">
                                <div class="spacer-single"></div>
                                <a href="/{{$locale}}{{$item->link_address}}" class="btn-line btn-fullwidth">ادامه</a>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
            </div>
        </div>
    </section>
    <br/>
@endsection
@push("script")
    <script src="/js/visits.js"></script>
@endpush
