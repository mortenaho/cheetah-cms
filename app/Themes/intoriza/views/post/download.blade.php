@extends("home::shared.layout",
["title"=>"$post->title ",
"AjaxToken"=>"true",
"captcha"=>true,

])

@section("breadcrumb")
    {{--{{$site->header_banner}}--}}
    <!-- INNER PAGE BANNER -->
    <div class="wt-bnr-inr overlay-wraper bg-center"
         style="background-image:url({{theme_assets("assets/images/banner/4.jpg")}});">
        <div class="overlay-main bg-black opacity-07"></div>
        <div class="container">
            <div class="wt-bnr-inr-entry">
                <div class="banner-title-outer">
                    <div class="banner-title-name">
                        <h3 class="text-white">{{$post->title}}</h3>
                    </div>
                </div>
                <!-- BREADCRUMB ROW -->

                <div>
                    <ul class="wt-breadcrumb breadcrumb-style-2" style="direction: rtl;">
                        <li><a href="/{{$locale}}/">خانه</a></li>
                        <li><a href="/{{$locale}}/downloads">دانلودها</a></li>
                        @isset($post->category)
                            <li>
                                <a href="/{{$locale}}/category/{{$post->category->id}}/{{$post->category->url_slug}}">{{$post->category->title}}</a>
                            </li>
                        @endisset
                        <li>{{$post->title}}</li>
                    </ul>
                </div>

                <!-- BREADCRUMB ROW END -->
            </div>
        </div>
    </div>
    <!-- INNER PAGE BANNER END -->
@endsection

@section("body")
    <form role="form" name="frm_visit" id="frm_visit" method="post">
        {{csrf_field()}}
        <input type="hidden" name="post_id" id="post_id" value="{{$post->id}}">
        <input type="hidden" name="post_type" id="post_type" value="{{$post->post_type}}">
        <input type="hidden" name="category_id"  id="category_id" value="{{$post->category_id}}">
    </form>
    <!-- SECTION CONTENT START -->
    <div class="section-full small-device  p-tb80">
        <div class="container">
            <div class="project-detail-outer">
                <div class="row">

                    <div class="col-md-6">
                        <div class="project-detail-pic m-b30">
                            <div class="wt-media">

                                <!--Fade slider-->
                                <div class="owl-carousel owl-fade-slider-one owl-btn-vertical-center m-b30">

                                    <div class="item">
                                        <div class="aon-thum-bx">
                                            <img src="{{$post->thumb}}" alt="{{$post->title}}">
                                        </div>
                                    </div>

                                </div>
                                <!--fade slider END-->
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="product-block bg-gray p-a30 p-b15 m-b30">
                            <div class="row">

                                <div class="col-md-6 col-sm-6 m-b30">
                                    <h4 class="m-b10">عنوان</h4>
                                    <p>{{$post->title}}</p>
                                </div>
                                <div class="col-md-6 col-sm-6 m-b30">
                                    <h4 class="m-b10">دسته بندی ها</h4>
                                    @isset($post->category)
                                        <p>
                                            <a href="/{{$locale}}/category/{{$post->category->id}}/{{$post->category->url_slug}}">{{$post->category->title}}</a>
                                        </p>
                                    @endisset
                                </div>
                                <div class="col-md-12 col-sm-6 m-b30">
                                    {{$post->excerpt}}
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

                <div class="project-detail-containt">
                    <div class="bg-white text-black">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">

                                <p> {!! $post->content !!}</p>
                                <div class="p-t0">
                                    <ul class="social-icons social-square social-lg social-darkest m-b0">
                                        <li><a href="javascript:void(0);" class="fa fa-facebook"></a></li>
                                        <li><a href="javascript:void(0);" class="fa fa-twitter"></a></li>
                                        <li><a href="javascript:void(0);" class="fa fa-linkedin"></a></li>
                                        <li><a href="javascript:void(0);" class="fa fa-rss"></a></li>
                                        <li><a href="javascript:void(0);" class="fa fa-youtube"></a></li>
                                        <li><a href="javascript:void(0);" class="fa fa-instagram"></a></li>
                                    </ul>
                                </div>
                                <br/><br/>
                                <hr/>
                                <h5>دانلود</h5>

                                    @if(isset($post->attachments) && $post->attachments->count()>0)
                                        @foreach($post->attachments as $item)
                                            <p>
                                                <a href="{{$item->file}}" class="site-button m-t15 m-b15">
                                                    <i class="fa fa-download fa-2x" style="color: #FFC400;"></i>  {{$post->title}}
                                                </a>
                                            </p>
                                        @endforeach
                                    @endif

                            </div>
                        </div>

                    </div>
                </div>


            </div>
            <br/><br/>

        </div>

    </div>
    <!-- SECTION CONTENT END  -->
@endsection
@push("script")
    <script type="text/javascript" src="{{theme_assets("assets/js/jquery.elevateZoom-3.0.8.min.js")}}"></script>
    <!-- Custom Js Code -->
    <script src="{{theme_assets("assets/plugin/validation/validate.min.js")}}"></script>
    <script src="{{theme_assets("assets/script/comment.js")}}"></script>
    <script src="/js/visits.js"></script>
@endpush
