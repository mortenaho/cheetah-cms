<!--Sidebar Page Container-->
<div class="sidebar-page-container">
    <div class="auto-container">
        <div class="row clearfix">

            <!--Content Side-->
            <div class="content-side col-lg-8 col-md-8 col-sm-12">
                <div class="blog-classic">
                @if(isset($posts) && $posts->count()>0)

                    @foreach($posts as $item)
                        <!--News Block Three-->
                            <div class="news-block-three">
                                <div class="inner-box">
                                    <div class="image">
                                        <img src="{{$item->thumb}}" alt="{{$item->title}}" />
                                        <a class="overlay-link" href="/{{$locale}}{{$item->link_address}}"><span class="icon fa fa-link"></span></a>
                                    </div>
                                    <div class="lower-content">
                                        <h3><a href="/{{$locale}}{{$item->link_address}}">{{$item->title}}</a></h3>
                                        <div class="text">{{$item->excerpt}}</div>
                                        <ul class="post-meta">
                                            {{--                                    <li><span class="icon fa fa-comments-o"></span>Comments</li>--}}
                                            <li><span class="icon fa fa-user"></span>{{$item->author}}</li>
                                            <li><span class="icon fa fa-calendar"></span>{{$item->reg_date}}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                    <!--Styled Pagination-->
                        <ul class="styled-pagination text-center">
                            <li class="prev"><a href="/{{$posts->previousPageUrl()}}"><span class="fa fa-angle-left"></span></a></li>
                            @for($i=1;$i<=$posts->lastPage();$i++)

                                @if($i==$posts->currentPage())
                                    <li class="active">
                                        <a  class="active" href="{{$posts->url($i)}}">{{$i}} </a>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{$posts->url($i)}}">
                                            {{$i}}
                                        </a>
                                    </li>
                                @endif
                            @endfor
                            <li class="next"><a href="{{$posts->nextPageUrl()}}"><span class="fa fa-angle-right"></span></a></li>
                        </ul>
                        <!--End Styled Pagination-->
                    @endif
                </div>
            </div>

            @include("home::shared._post_sidebar",["categories"=>$categories])

        </div>
    </div>
</div>
<!--End Sidebar Page Container-->
