@extends("home::shared.layout",
["title"=>"$post->title ",
"AjaxToken"=>"true",
"captcha"=>true,

])

<?php
$post_meta = collect($post->post_meta);
$price = $post_meta->firstWhere("meta_key", "price")->meta_value;
$discount = $post_meta->firstWhere("meta_key", "discount")->meta_value;
?>
@section("breadcrumb")
    <div class="tm-breadcrumb-area tm-padding-section text-center" data-overlay="1"
         data-bgimage="{{$site->header_banner}}"
         style="background-image: url({{$site->header_banner}});">
        <div class="container">
            <div class="tm-breadcrumb">
                <h2 class="tm-breadcrumb-title">محصولات</h2>
                <ul>
                    <li><a href="/">خانه</a></li>
                    <li><a href="/products">محصولات</a></li>
                    @isset($post->category)
                        <li>
                            <a href="/category/{{$post->category->id}}/{{$post->category->url_slug}}">{{$post->category->title}}</a>
                        </li>
                    @endisset
                    <li>{{$post->title}}</li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section("body")
    <!-- Main Content -->
    <main class="main-content">
        <form role="form" name="frm_visit" id="frm_visit" method="post">
            {{csrf_field()}}
            <input type="hidden" name="post_id" id="post_id" value="{{$post->id}}">
            <input type="hidden" name="post_type" id="post_type" value="{{$post->post_type}}">
            <input type="hidden" name="category_id"  id="category_id" value="{{$post->category_id}}">
        </form>
        <!-- Shop Page Area -->
        <div class="tm-section shop-page-area bg-white tm-padding-section">
            <div class="container">
                <div class="tm-prodetails">
                    <div class="row">
                        <div class="col-lg-5 col-md-6 col-12">

                            <!-- Product Details Images -->
                            <div class="tm-prodetails-images">
                                <div class="tm-prodetails-largeimages">
                                    @if(isset($post->attachments) && $post->attachments->count()>0)
                                        @foreach($post->attachments as $item)
                                            <div class="tm-prodetails-largeimage">
                                                <a href="{{$item->file}}">
                                                    <img style="height: 250px;width: 100%;object-fit: cover"
                                                         src="{{$item->file}}"
                                                         alt="{{$item->title}}">
                                                </a>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="tm-prodetails-largeimage">
                                            <a href="{{$post->thumb}}">
                                                <img style="height: 250px;width: 100%;object-fit: cover"
                                                     src="{{$post->thumb}}"
                                                     alt="{{$post->title}}">
                                            </a>
                                        </div>
                                    @endif
                                </div>
                                <div class="tm-prodetails-thumbnails">
                                    @if(isset($post->attachments) && $post->attachments->count()>0)
                                        @foreach($post->attachments as $item)
                                            <div class="tm-prodetails-thumbnail">
                                                <img style="height: 100px;object-fit: cover" src="{{$item->file}}"
                                                     alt="{{$item->title}}">
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="tm-prodetails-thumbnail">
                                            <img style="height: 100px;object-fit: cover" src="{{$post->thumb}}"
                                                 alt="{{$post->title}}">
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <!--// Product Details Images -->

                        </div>

                        <div class="col-lg-7 col-md-6 col-12">
                            <div class="tm-prodetails-content">
                                <h3 class="tm-prodetails-title">{{$post->title}}</h3>

                                <div class="tm-prodetails-price">
                                    <span>
                                        @isset($discount)
                                            <del>{{$discount}} تومان</del>
                                        @endisset
                                        @isset($price)
                                            {{$price}}
                                            تومان
                                        @endisset

                                    </span>
                                </div>
                                <p>{{$post->excerpt}}</p>


                                <div class="tm-prodetails-categories">
                                    <h6>دسته بندی ها :</h6>
                                    <ul>
                                        @isset($post->category)
                                            <li>
                                                <a href="/category/{{$post->category->id}}/{{$post->category->url_slug}}">{{$post->category->title}}</a>
                                            </li>
                                        @endisset
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Product Details Description & Review -->
                    <div class="tm-prodetails-desreview tm-padding-section-sm-top">
                        <ul class="nav tm-tabgroup2" id="prodetails" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="prodetails-area1-tab" data-toggle="tab"
                                   href="#prodetails-area1" role="tab" aria-controls="prodetails-area1"
                                   aria-selected="true">توضیحات</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="prodetails-area2-tab" data-toggle="tab" href="#prodetails-area2"
                                   role="tab" aria-controls="prodetails-area2" aria-selected="false">نظرات
                                    {{$post->comments->count()}}</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="prodetails-content">
                            <div class="tab-pane fade show active" id="prodetails-area1" role="tabpanel"
                                 aria-labelledby="prodetails-area1-tab">
                                <div class="tm-prodetails-description">
                                    {!! $post->content !!}
                                </div>
                            </div>
                            <div class="tab-pane fade" id="prodetails-area2" role="tabpanel"
                                 aria-labelledby="prodetails-area2-tab">
                                <div class="tm-prodetails-review">
                                    @if($post->comments->count()>0)
                                        <h5 class="text-uppercase">) دیدگاه {{$post->comments->count()}})  </h5>

                                        <div class="tm-comment-wrapper mb-50">
                                        @foreach($post->comments as $item)
                                            <!-- Comment Single -->
                                                <div class="tm-comment">
                                                    <div class="tm-comment-thumb">
                                                        <img
                                                            src="{{theme_assets("assets/images/anonymous-avatar-sm.jpg")}}"
                                                            alt="author image">
                                                    </div>
                                                    <div class="tm-comment-content">
                                                        <h6 class="tm-comment-authorname"><a
                                                                href="#">{{$item->full_name}}</a></h6>
                                                        <span
                                                            class="tm-comment-date">{{\Morilog\Jalali\Jalalian::fromDateTime($item->created_at)->format("%A, %d %B %y ساعت h:m:s")}}</span>

                                                        <p>{{$item->content}}</p>
                                                    </div>
                                                </div>
                                                <!--// Comment Single -->
                                            @endforeach
                                        </div>
                                    @endif
                                    @if($post->has_comment===1)
                                        <h5 class="text-uppercase">اضافه کردن یک بررسی</h5>
                                        <form action="" method="post" id="frm_comment" class="tm-form">
                                            <div class="tm-form-inner">
                                                <input type="hidden" name="post_id" value="{{$post->id}}">
                                                <input type="hidden" name="post_type" value="product">
                                                <div class="tm-form-field tm-form-fieldhalf">
                                                    <input type="text" name="full_name" placeholder="نام شما*"
                                                           required="required">
                                                </div>
                                                <div class="tm-form-field tm-form-fieldhalf">
                                                    <input type="Email" name="email" placeholder="ایمیل شما*"
                                                           required="required">
                                                </div>
                                                <div class="tm-form-field">
                                                <textarea name="content" cols="30" rows="5"
                                                          placeholder="بررسی شما"></textarea>
                                                </div>
                                                <div class="tm-commentbox-singlefield">
                                                    {!! app('captcha')->display() !!}
                                                </div>
                                                <div class="tm-form-field">
                                                    <button type="submit" class="tm-button">ارسال<b></b></button>
                                                </div>
                                            </div>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--// Product Details Description & Review -->
                </div>
            </div>
        </div>
        <!--// Shop Page Area -->

    </main>
    <!--// Main Content -->


@endsection
@push("script")
    <script src="{{theme_assets("assets/plugin/validation/validate.min.js")}}"></script>
    <script src="{{theme_assets("assets/script/comment.js")}}"></script>
    <script src="/js/visits.js"></script>
@endpush
