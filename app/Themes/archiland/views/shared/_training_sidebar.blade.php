<?php
$posts = post_get::get_last_post(10,"training");
?>
<!-- SIDE BAR START -->
<div class="col-md-3 col-sm-12">

    <aside class="side-bar">

        <!-- SEARCH -->
        <div class="widget bg-white ">
            <h4 class="widget-title">جستجو</h4>
            <div class="search-bx">
                <form role="search" method="post" target="_blank" action="https://www.google.com/search">
                    <div class="input-group">
                        <input type="hidden" name="q" value="site:{{request()->root()}}">
                        <input name="news-letter" type="text" class="form-control"
                               placeholder="جستجو...">
                        <span class="input-group-btn">
                                                        <button type="submit"><i class="fa fa-search"></i></button>
                                                    </span>
                    </div>
                </form>
            </div>
        </div>

        <!-- RECENT POSTS -->
        <div class="widget bg-white  recent-posts-entry">
            <h4 class="widget-title">پستهای اخیر</h4>
            <div class="section-content">
                <div class="widget-post-bx">
                    @foreach($posts as $item)
                        <div class="widget-post clearfix">
                            <div class="wt-post-date text-center text-uppercase text-white p-t5">
                                {{--                                <strong>{{$item->reg_date}}</strong>--}}
                                <a href="{{$item->thumb}}" class="mfp-link"><img
                                        src="{{$item->thumb}}" alt="{{$item->title}}"></a>
                            </div>
                            <div class="wt-post-info">
                                <div class="wt-post-meta">
                                    <ul>
                                        <li class="post-author"> {{$item->author}} </li>
                                        <li class="post-author"> {{$item->reg_date}} </li>
                                    </ul>
                                </div>
                                <div class="wt-post-header">
                                    <a href="/{{$locale}}{{$item->link_address}}">
                                        <h6 class="post-title">  {{$item->title}}</h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>



        <div class="widget bg-white  widget_services">
            @isset($categories)
                <h4 class="widget-title">دسته بندی ها</h4>
                <ul>

                    @foreach($categories as $item)
                        <li>
                            <a href="/{{$locale}}/category/{{$item->id}}/{{$item->url_slug}}">
                                {{$item->title}}
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endisset
        </div>

    </aside>

</div>
<!-- SIDE BAR END -->


