<?php
$posts = post_get::get_last_post(10);
?>
<div class="col-lg-3 order-2">
    <aside class="blog-sidebar-wrapper">
        <div class="blog-sidebar">
            <h5 class="title">جستجو</h5>
            <div class="sidebar-serch-form">
                <form target="_blank" action="https://www.google.com/search">
                    <input type="hidden" name="q" value="site:{{request()->root()}}">
                    <input type="text" name="q" class="search-field" placeholder="عبارت جستجو را وارد نمایید">
                    <button type="submit" class="search-btn"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div> <!-- single sidebar end -->
        <div class="blog-sidebar">
            <h5 class="title">دسته بندیها</h5>
            @isset($categories)
                <ul class="blog-archive blog-category">
                    @foreach($categories as $item)
                        <li><a href="/{{$locale}}/category/{{$item->id}}/{{$item->url_slug}}"> {{$item->title}}</a></li>
                    @endforeach

                </ul>
            @endif
        </div> <!-- single sidebar end -->
        {{--        <div class="blog-sidebar">--}}
        {{--            <h5 class="title">Blog Archives</h5>--}}
        {{--            <ul class="blog-archive">--}}
        {{--                <li><a href="#">January (10)</a></li>--}}
        {{--                <li><a href="#">February (08)</a></li>--}}
        {{--                <li><a href="#">March (07)</a></li>--}}
        {{--                <li><a href="#">April (14)</a></li>--}}
        {{--                <li><a href="#">May (10)</a></li>--}}
        {{--            </ul>--}}
        {{--        </div> <!-- single sidebar end -->--}}
        <div class="blog-sidebar">
            <h5 class="title">پستهای اخیر </h5>
            <div class="recent-post">
                @foreach($posts as $item)
                    <div class="recent-post-item">
                        <figure class="product-thumb">
                            <a href="/{{$locale}}{{$item->link_address}}">
                                <img src="{{$item->thumb}}" alt="blog image">
                            </a>
                        </figure>
                        <div class="recent-post-description">
                            <div class="product-name">
                                <span><a href="/{{$locale}}{{$item->link_address}}">{{$item->title}}</a></span>
                                <p>{{$item->reg_date}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div> <!-- single sidebar end -->
        <div class="blog-sidebar">
            <h5 class="title">تگ ها</h5>
            <ul class="blog-tags">
                @foreach($categories as $item)
                    <li><a href="/{{$locale}}/category/{{$item->id}}/{{$item->url_slug}}">{{$item->title}}</a></li>
                @endforeach
            </ul>
        </div> <!-- single sidebar end -->
    </aside>
</div>
