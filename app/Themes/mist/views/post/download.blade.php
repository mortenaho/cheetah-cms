@extends("home::shared.layout",
["title"=>"$post->title ",
"AjaxToken"=>"true",
"captcha"=>true,

])

@section("breadcrumb")
    <div class="page-header" data-bgimage="{{$site->header_banner}}"
         style="background-image: url({{$site->header_banner}});"
    >
        <div class="container">
            <h2 class="title">{{$post->title}}</h2>
        </div>
        <div class="breadcrumb-box">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="/{{$locale}}/">خانه</a></li>
                    <li><a href="/{{$locale}}/products">دانلود</a></li>
                    @isset($post->category)
                        <li>
                            <a href="/{{$locale}}/category/{{$post->category->id}}/{{$post->category->url_slug}}">{{$post->category->title}}</a>
                        </li>
                    @endisset
                    <li class="active">{{$post->title}}</li>

                </ul>
            </div>
        </div>
    </div>
@endsection

@section("body")
    <form role="form" name="frm_visit" id="frm_visit" method="post">
        {{csrf_field()}}
        <input type="hidden" name="post_id" id="post_id" value="{{$post->id}}">
        <input type="hidden" name="post_type" id="post_type" value="{{$post->post_type}}">
        <input type="hidden" name="category_id"  id="category_id" value="{{$post->category_id}}">
    </form>
    <section class="page-section">
        <div class="container shop">
            <div class="row">
                <div class="col-md-12 product-page">
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <div class="single-product">
                                <img src="{{$post->thumb}}" alt="{{$post->title}}" width="500" height="600"/>
                            </div>
                        </div>
                        <!-- .product -->
                        <div class="col-md-8 col-sm-6">
                            <h3 class="title">{{$post->title}}</h3>

                            <div class="description">
                                <p>{{$post->excerpt}}</p>
                            </div>
                            <hr/>
                            <h5>دانلود</h5>
                            <ul>
                                @if(isset($post->attachments) && $post->attachments->count()>0)
                                    @foreach($post->attachments as $item)
                                        <li>
                                            <a href="{{$item->file}}">
                                                <i class="fa fa-download fa-2x" style="color: #FFC400;"></i> {{$post->title}}
                                            </a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>

                            <hr/>

                            <h5>دسته بندیها</h5>
                            <ul class="arrow-style">
                                @isset($post->category)
                                    <li>
                                        <a href="/{{$locale}}/category/{{$post->category->id}}/{{$post->category->url_slug}}">{{$post->category->title}}</a>
                                    </li>
                                @endisset
                            </ul>


                        </div>
                    </div>
                    <div class="row top-pad-80">
                        <div class="col-md-12">
                            <p>{!! $post->content !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- page-section -->


@endsection
@push("script")
    <script type="text/javascript" src="{{theme_assets("assets/js/jquery.elevateZoom-3.0.8.min.js")}}"></script>
    <!-- Custom Js Code -->
    <script src="{{theme_assets("assets/plugin/validation/validate.min.js")}}"></script>
    <script src="{{theme_assets("assets/script/comment.js")}}"></script>
    <script src="/js/visits.js"></script>
@endpush
