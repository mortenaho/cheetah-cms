<div class="section-full small-device  p-tb80">
    <!-- GALLERY CONTENT START -->
    <div class="container clearfix">
        <div class="portfolio-wrap mfp-gallery news-masonry row" style="position: relative; height: 3209.69px;">

        @if(isset($posts) && $posts->count()>0)
            <!-- COLUMNS 2 -->
                @foreach($posts as $item)
                    <div class="masonry-item col-lg-4 col-md-6 col-sm-6"
                         style="position: absolute; left: 0px; top: 0px;">
                        <div class="blog-post blog-grid blog-grid-1 date-style-1">
                            <div class="wt-post-media wt-img-effect zoom-slow">
                                <a href="/{{$locale}}{{$item->link_address}}"><img src="{{$item->thumb}}"
                                                                                   alt="  {{$item->title}}"></a>
                            </div>
                            <div class="wt-post-info  bg-white p-t30">

                                <div class="wt-post-title ">
                                    <h6 class="post-title">
                                        <a href="/{{$locale}}{{$item->link_address}}" class=" font-weight-600 m-t0">
                                            {{$item->title}}
                                        </a>
                                    </h6>
                                </div>
                                <div class="wt-post-meta ">
                                    <ul>
                                        <li class="post-date"><strong> {{$item->reg_date}} </strong></li>
                                        <li class="post-author"><i class="fa fa-user"></i>
                                            <a href="javascript:void(0);">By
                                                <span> {{$item->author}} </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="wt-post-text">
                                    <p> {{$item->excerpt}}</p>
                                </div>
                                <a href="/{{$locale}}{{$item->link_address}}"
                                   class="btn-half site-button site-btn-effect button-md">
                                    <span>ادامه مطلب</span>
                                </a>
                                {{--                                <div class="wt-post-bottom  bdr-t-1 bdr-gray bdr-solid">--}}
                                {{--                                    <ul>--}}
                                {{--                                        <li class="post-like"><i class="fa fa-heart-o"></i><a--}}
                                {{--                                                href="javascript:void(0);">18 <span>Likes</span></a></li>--}}
                                {{--                                        <li class="post-comment"><i class="fa fa fa-comments"></i><a--}}
                                {{--                                                href="javascript:void(0);">29 <span>Comment</span></a></li>--}}
                                {{--                                    </ul>--}}
                                {{--                                </div>--}}
                            </div>
                        </div>
                    </div>
            @endforeach
        @endif

        </div>
        <ul class="pagination m-tb0">

            <li>
                <a href="{{$posts->nextPageUrl()}}">
                    <span aria-hidden="true"><i class="fa fa-angle-right"></i></span>
                </a>
            </li>
            @for($i=1;$i<=$posts->lastPage();$i++)

                @if($i==$posts->currentPage())
                    <li class="active">
                        <a href="{{$posts->url($i)}}">{{$i}}
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                @else
                    <li>
                        <a href="{{$posts->url($i)}}">
                            {{$i}}
                        </a>
                    </li>

                @endif
            @endfor
            <li>
                <a href="{{$posts->previousPageUrl()}}">
                    <span aria-hidden="true"><i class="fa fa-angle-left"></i></span>
                </a>
            </li>

        </ul>
    </div>
    <!-- GALLERY CONTENT END -->
</div>
