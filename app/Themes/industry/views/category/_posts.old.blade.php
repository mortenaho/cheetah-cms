<main class="main-content">
    <!-- Blogs Area -->
{{--    <div class="tm-section blogs-area bg-white tm-padding-section">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-8 col-12 order-1 order-lg-2">--}}
{{--                    <div class="tm-blog-list sticky-sidebar">--}}
{{--                        @if($posts!=null && count($posts)>0)--}}
{{--                            <div class="row mt-30-reverse blog-masonry-active">--}}
{{--                                @foreach($posts as $item)--}}
{{--                                    <div class="col-lg-6 col-md-6 col-12 mt-30 blog-masonry-item">--}}
{{--                                        <div class="blog-slider-item">--}}
{{--                                            <div class="tm-blog wow fadeInUp">--}}
{{--                                                <div class="tm-blog-image">--}}
{{--                                                    <a href="{{$item->link_address}}">--}}
{{--                                                        <img style="height: 225px;object-fit: cover;"--}}
{{--                                                             src="{{$item->thumb}}"--}}
{{--                                                             alt="{{$item->title}}">--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                                <div class="tm-blog-content">--}}
{{--                                                    <div class="tm-blog-meta">--}}
{{--                                                    <span><i class="fa fa-user-o"></i>توسط<a--}}
{{--                                                            href="{{$item->link_address}}"> {{$item->author}} </a></span>--}}
{{--                                                        <span><i class="fa fa-calendar-o"></i>{{$item->reg_date}}</span>--}}
{{--                                                    </div>--}}
{{--                                                    <h5><a href="{{$item->link_address}}">{{$item->title}}</a></h5>--}}
{{--                                                    <p class="blog_list_p" style="height: 130px;">{{$item->excerpt}}</p>--}}
{{--                                                    <a href="{{$item->link_address}}" class="tm-readmore">ادامه--}}
{{--                                                        مطلب...</a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                @endforeach--}}

{{--                            </div>--}}
{{--                            <div class="tm-pagination mt-50">--}}
{{--                                <ul>--}}
{{--                                    <li><a href="{{$posts->previousPageUrl()}}"><</a></li>--}}
{{--                                    @for($i=1;$i<=$posts->lastPage();$i++)--}}
{{--                                        @if($i==$posts->currentPage())--}}
{{--                                            <li class="is-active"><a href="{{$posts->url($i)}}">{{$i}}</a></li>--}}
{{--                                        @else--}}
{{--                                            <li><a href="{{$posts->url($i)}}">{{$i}}</a></li>--}}
{{--                                        @endif--}}


{{--                                    @endfor--}}
{{--                                    <li><a href="{{$posts->nextPageUrl()}}">&gt;</a></li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        @else--}}
{{--                            <div class="tm-pnf">--}}

{{--                                <h2> مشکلی پیش آمده است</h2>--}}
{{--                                <h4>چیزی برای نمایش یافت نشد .</h4>--}}
{{--                                <a href="/" class="tm-button">بازگشت به صفحه اصلی</a>--}}
{{--                            </div>--}}
{{--                        @endif--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                @include("home::shared._post_sidebar",["categories"=>$categories])--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!--// Blogs Area -->--}}
{{--    </div>--}}

    <section class="page-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-9 post-list">
                    <!-- post -->
                    <div class="post-item">
                        <div class="post-image pull-left">
                            <img src="img/sections/blog/big-1.jpg" width="320" height="282" alt="" title="" />
                        </div>
                        <h2 class="post-title">
                            <a href="blog-single.html">Sample Blog Post</a>
                        </h2>
                        <div class="post-content">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                        <div class="post-meta">
                            <!-- Author  -->
                            <span class="author">
                            <i class="fa fa-user"></i> John Deo</span>
                            <!-- Meta Date -->

                            <span class="time">
                            <i class="fa fa-calendar"></i> 03.11.2014</span>
                            <!-- Category -->

                            <span class="category pull-right">
                            <i class="fa fa-heart"></i> Travel, Nature, Business</span></div>
                    </div>
                    <!-- post -->
                    <div class="row">
                        <div class="col-md-12">
                            <nav class="navbar-right">
                                <ul class="pagination">
                                    <li class="disabled">
                                    <span>
                                        <span aria-hidden="true"><i class="fa fa-angle-left"></i></span>
                                    </span>
                                    </li>
                                    <li class="active">
                                    <span>1
                                    <span class="sr-only">(current)</span></span>
                                    </li>
                                    <li class="">
                                    <span>2
                                    <span class="sr-only">(current)</span></span>
                                    </li>
                                    <li class="">
                                    <span>3
                                    <span class="sr-only">(current)</span></span>
                                    </li>
                                    <li class="">
                                    <span>4
                                    <span class="sr-only">(current)</span></span>
                                    </li>
                                    <li>
                                    <span>
                                        <span aria-hidden="true"><i class="fa fa-angle-right"></i></span>
                                    </span>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- pagination -->
                    <div class="tm-pagination mt-50">
                        <ul>
                            <li><a href="{{$posts->previousPageUrl()}}"><</a></li>
                            @for($i=1;$i<=$posts->lastPage();$i++)
                                @if($i==$posts->currentPage())
                                    <li class="is-active"><a href="{{$posts->url($i)}}">{{$i}}</a></li>
                                @else
                                    <li><a href="{{$posts->url($i)}}">{{$i}}</a></li>
                                @endif


                            @endfor
                            <li><a href="{{$posts->nextPageUrl()}}">&gt;</a></li>
                        </ul>
                    </div>
                </div>
                @include("home::shared._post_sidebar",["categories"=>$categories])

        </div>
    </section>
</main>
