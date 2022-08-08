<?php
$posts = post_get::get_last_post(10,"service");
?>

<div class="col-lg-4 col-12 order-2 order-lg-1">
    <div class="widgets sidebar-widgets sticky-sidebar" style="">
        <div class="inner-wrapper-sticky" style="position: relative;">

            <!-- Single Widget -->
            <div class="single-widget widget-search">
                <h5 class="widget-title">جستجو</h5>
                <form target="_blank" action="https://www.google.com/search" class="widget-search-form">
                    <input type="hidden" name="q" value="site:{{request()->root()}}">
                    <input type="text" name="q" placeholder="جستجو...">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
            <!--// Single Widget -->
        @isset($categories)
            <!-- Single Widget -->
                <div class="single-widget widget-categories">
                    <h5 class="widget-title">دسته بندی ها</h5>
                    <ul>
                        @foreach($categories as $item)
                            <li><a href="/{{$locale}}/category/{{$item->id}}/{{$item->url_slug}}">{{$item->title}}</a></li>
                        @endforeach

                    </ul>
                </div>
                <!--// Single Widget -->
        @endisset
        @isset($posts)
            <!-- Single Widget -->
                <div class="single-widget widget-recentpost">
                    <h5 class="widget-title">خدمات</h5>
                    <ul>

                        @foreach($posts as $item)
                            <li>
                                <a href="/{{$locale}}{{$item->link_address}}" class="widget-recentpost-image">
                                    <img src="{{$item->thumb}}" alt="blog thumbnail">
                                </a>
                                <div class="widget-recentpost-content">
                                    <h6><a href="/{{$locale}}{{$item->link_address}}">{{$item->title}}</a></h6>
                                    <span>{{$item->reg_date}}</span>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <!--// Single Widget -->
            @endisset
        </div>
    </div>
</div>
