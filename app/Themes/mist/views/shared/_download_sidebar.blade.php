<?php
$posts = post_get::get_last_post(10,"download");
?>


<div class="sidebar col-sm-12 col-md-3">
    <div class="widget">
        <div class="widget-search">
            <h5 class="widget-title">جستجو</h5>
            <form target="_blank" action="https://www.google.com/search" class="widget-search-form">
                <input type="hidden" name="q" value="site:{{request()->root()}}">
                <input type="text" name="q" class="form-control" placeholder="جستجو...">
{{--                <div class="input-group">--}}
{{--                    <input type="hidden" name="q" value="site:{{request()->root()}}">--}}
{{--                    <input type="text" name="q" class="form-control" placeholder="جستجو...">--}}
{{--                    <div class="input-group-append">--}}
{{--                        <button class="btn btn-warning" type="submit"><i class="fa fa-search"></i></button>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </form>

        </div>
    </div>
    @isset($categories)
    <div class="widget">
        <div class="widget-title">
            <h3 class="title">دسته بندی ها</h3>
        </div>
        <div id="MainMenu2">
            <div class="list-group panel">
                @foreach($categories as $item)
                <a href="/{{$locale}}/category/{{$item->id}}/{{$item->url_slug}}" class="list-group-item" >
                    {{$item->title}}
                </a>
                @endforeach
            </div>
        </div>
        <!-- category-list -->
    </div>
    @endif
    <div class="widget">
        <div class="widget-title">
            <h3 class="title">دانلودهای اخیر</h3>
        </div>
        <ul class="latest-posts">
            @foreach($posts as $item)
            <li>
                <div class="post-thumb">
                    <img class="img-rounded" src="{{$item->thumb}}" alt="" title="" width="84" height="84"/>
                </div>
                <div class="post-details">
                    <div class="description">

                        <a href="/{{$locale}}{{$item->link_address}}">
                            <!-- Text -->
                            {{$item->title}}</a>
                    </div>
                    <div class="meta">
                        <!-- Meta Date -->
                        <span class="time">
                                            <i class="fa fa-calendar"></i> {{$item->reg_date}}</span>
                    </div>
                </div>
            </li>
@endforeach
        </ul>
    </div>

    <div class="widget">
        <div class="widget-title">
            <h3 class="title">کلمات کلیدی</h3>
        </div>
        <ul class="tags">
            <li>
                <a href="#">نرم افزارهای کاربردی</a>
            </li>
            <li>
                <a href="#">قالبهای HTML</a>
            </li>
            <li>
                <a href="#">فایلهای برنامه نویسی</a>
            </li>

        </ul>
    </div>
</div>
