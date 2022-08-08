<div id="content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <ul class="blog-list">

                    @if(isset($posts) && $posts->count()>0)
                    <!-- COLUMNS 2 -->
                        @foreach($posts as $item)

                            <li>
                                <div class="post-content">
                                    <div class="post-image">
                                        <img src="{{$item->thumb}}" alt="{{$item->title}}"/>
                                    </div>


                                    <div class="date-box">
                                        <div class="day">{{$item->reg_date}}</div>
                                        <div class="month">{{$item->author}}</div>
                                    </div>

                                    <div class="post-text">
                                        <h3><a href="/{{$locale}}{{$item->link_address}}">{{$item->title}}</a></h3>
                                        <p>{{$item->excerpt}}</p>
                                    </div>

                                    <a href="/{{$locale}}{{$item->link_address}}" class="btn-more">ادامه</a>
                                </div>
                            </li>


                        @endforeach
                    @endif

                </ul>

                <div class="text-center">
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
            </div>
            <!-- GALLERY CONTENT END -->
            @include("home::shared._post_sidebar",["categories"=>$categories])
        </div>
    </div>
</div>
