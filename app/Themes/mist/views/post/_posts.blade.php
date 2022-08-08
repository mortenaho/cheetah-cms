
<!-- page-header -->
<section class="page-section">
    <div class="container">
        <div class="col-sm-12 col-md-9">
            @if(isset($posts) && $posts->count()>0)
                <div class="row">
                @foreach($posts as $item)
                    <div class="col-sm-6 col-md-6" >
                        <div class="post-item" style="height: 500px;">
                            <div class="post-image">
                                <img src="{{$item->thumb}}" width="500" height="300" alt=""
                                     title="{{$item->title}}"/>
                            </div>
                            <h2 class="post-title">
                                <a href="/{{$locale}}{{$item->link_address}}">{{$item->title}}</a>
                            </h2>
                            <div class="post-content">
                                {{$item->excerpt}}
                            </div>
                            <div class="post-meta">
                                <!-- Author  -->
                                <span class="author">
                                <i class="fa fa-user"></i> {{$item->author}}</span>
                                <!-- Meta Date -->

                                <span class="time">
                                <i class="fa fa-calendar"></i> {{$item->reg_date}}</span>
                                <!-- Category -->


                                <a href="">
                                              <span class="category pull-right">
                                     <i class="fa fa-heart"></i> ادامه
                                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- post -->
                @endforeach
                </div>
                <div class="row">
                        <div class="col-md-12">
                            <nav class="navbar-right">
                                <ul class="pagination">
                                    <li>
                                        <a href="{{$posts->previousPageUrl()}}">
                                            <span aria-hidden="true"><i class="fa fa-angle-left"></i></span>
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
                                        <a href="{{$posts->nextPageUrl()}}">
                                            <span aria-hidden="true"><i class="fa fa-angle-right"></i></span>
                                        </a>
                                    </li>

                                </ul>
                            </nav>
                        </div>
                    </div>
                <!-- pagination -->
            @endif
        </div>
        @include("home::shared._post_sidebar",["categories"=>$categories])
    </div>
</section>
