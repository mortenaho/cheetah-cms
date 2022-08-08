<?php
$posts = post_get::get_last_post(10,"training");
?>

<div class="sidebar col-sm-12 col-md-3">
    <div class="widget">
        <div class="widget-search">
            <h5 class="widget-title">جستجو</h5>
            <form target="_blank" action="https://www.google.com/search" class="widget-search-form">
                <input type="hidden" name="q" value="site:{{request()->root()}}">
                <input type="text" name="q" class="form-control" placeholder="جستجو...">
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
            <h3 class="title">پستهای اخیر</h3>
        </div>
        <ul class="latest-posts">
            @foreach($posts as $item)
                <li>
                    <div class="post-thumb">
{{--                        <img class="img-rounded" src="{{$item->thumb}}" alt="" title="" width="84" height="84"/>--}}
                        <i class="fa fa-2x fa-code color-warning"></i>
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
                <a href="#">Corporate</a>
            </li>
            <li>
                <a href="#">business</a>
            </li>
            <li>
                <a href="#">agency</a>
            </li>
            <li>
                <a href="#">medical</a>
            </li>
            <li>
                <a href="#">studio</a>
            </li>
            <li>
                <a href="#">university</a>
            </li>
            <li>
                <a href="#">motors</a>
            </li>
            <li>
                <a href="#">charity</a>
            </li>
            <li>
                <a href="#">realestate</a>
            </li>
            <li>
                <a href="#">app</a>
            </li>
            <li>
                <a href="#">restaurant</a>
            </li>
            <li>
                <a href="#">fitness</a>
            </li>
            <li>
                <a href="#">band</a>
            </li>
            <li>
                <a href="#">wedding</a>
            </li>
            <li>
                <a href="#">sports</a>
            </li>
            <li>
                <a href="#">fashion</a>
            </li>
        </ul>
    </div>
</div>



