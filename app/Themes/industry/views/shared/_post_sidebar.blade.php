<?php
$posts = post_get::get_last_post(10);
?>

<!--Sidebar Side-->
<div class="sidebar-side col-lg-4 col-md-4 col-sm-12">
    <aside class="sidebar">

        <!-- Search -->
        <div class="sidebar-widget search-box">
            <form method="post" action="https://www.google.com/search">
                <div class="form-group">
                    <input type="hidden" name="q" value="site:{{request()->root()}}">
                    <input type="search" name="q" value="" placeholder="{{trans('home.search')}} ..." required>
                    <button type="submit"><span class="icon fa fa-search"></span></button>
                </div>
            </form>
        </div>

        <!--Blog Category Widget-->
        <div class="sidebar-widget sidebar-blog-category">
            <div class="sidebar-title">
                <h2>{{trans('home.categories')}}</h2>
                <div class="separater"></div>
            </div>
            <ul class="cat-list">
                @foreach($categories as $item)
                    <li class="clearfix"><a
                            href="/{{$locale}}/category/{{$item->id}}/{{$item->url_slug}}"> {{$item->title}}
                            <span></span></a></li>
                @endforeach
            </ul>
        </div>

        <!-- Popular Posts -->
        <div class="sidebar-widget popular-posts">
            <div class="sidebar-title">
                <h2>{{trans('home.last_posts')}}</h2>
                <div class="separater"></div>
            </div>
            @foreach($posts as $item)
            <article class="post">
                <figure class="post-thumb"><img src="{{$item->thumb}}" alt=""><a href="/{{$locale}}{{$item->link_address}}"
                                                                                                 class="overlay-box"><span
                            class="icon fa fa-link"></span></a></figure>
                <div class="text"><a href="/{{$locale}}{{$item->link_address}}">{{$item->title}}</a></div>
                <div class="post-info">{{$item->reg_date}}</div>
            </article>
            @endforeach

        </div>

        <!-- Tags-->
{{--        <div class="sidebar-widget popular-tags">--}}
{{--            <div class="sidebar-title">--}}
{{--                <h2>Tags</h2>--}}
{{--                <div class="separater"></div>--}}
{{--            </div>--}}
{{--            <a href="#">Auto</a>--}}
{{--            <a href="#">Automation</a>--}}
{{--            <a href="#">Business</a>--}}
{{--            <a href="#">Department</a>--}}
{{--            <a href="#">Provider</a>--}}
{{--            <a href="#">Partnering</a>--}}
{{--            <a href="#">resources</a>--}}
{{--            <a href="#">Solutions</a>--}}
{{--        </div>--}}

    </aside>
</div>
