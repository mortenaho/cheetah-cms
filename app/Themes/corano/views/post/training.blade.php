@extends("home::shared.layout",
    ["title"=>"$title ",
    "captcha"=>true,
    "AjaxToken"=>"true"
    ])


<?php $index_view = "home::post._$include_page";?>

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

    <form role="form" name="frm_visit" id="frm_visit" method="post">
        {{csrf_field()}}
        <input type="hidden" name="post_id" id="post_id" value="{{$post->id}}">
        <input type="hidden" name="post_type" id="post_type" value="{{$post->post_type}}">
        <input type="hidden" name="category_id"  id="category_id" value="{{$post->category_id}}">
    </form>
    <!-- Main Content -->
    <main class="main-content">

        <!-- Blogs Area -->
        <div class="tm-section blogs-area bg-white tm-padding-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-12 order-1 order-lg-2">
                        <div class="tm-blog tm-blog-details ">
                            <div class="tm-blog-image">
                                <a href="{{$post->link_address}}">
                                    <img style="object-fit: cover" src="{{$post->thumb}}" alt="{{$post->title}}">
                                </a>
                            </div>
                            <div class="tm-blog-content">
                                <div class="tm-blog-meta">
                                    <span><i class="fa fa-user-o"></i>توسط<a
                                            href="{{$post->link_address}}"> {{$post->author}} </a></span>
                                    <span><i class="fa fa-calendar-o"></i>{{$post->reg_date}}</span>
                                    @isset($post->category)
                                        <span><i class="fa fa-folder-o"></i><a
                                                href="/category/{{$post->category->id}}/{{$post->category->url_slug}}">{{$post->category->title}}</a></span>
                                    @endisset
                                </div>
                                <h3>{{$post->title}}</h3>
                                <p>{{$post->excerpt}}</p>
                                <p>{!! $post->content !!}</p>
                            </div>


                        </div>
                    </div>
                    @include("home::shared._training_sidebar",["categories"=>$categories])
                </div>

            </div>
        </div>
        <!--// Blogs Area -->


    </main>
    <!--// Main Content -->


@endsection
@push("script")
    <script src="/js/visits.js"></script>
@endpush
