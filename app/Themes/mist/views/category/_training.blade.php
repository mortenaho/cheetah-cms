<main class="main-content">
    <section class="page-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-9 post-list">
                @if($posts!=null && count($posts)>0)
                    @foreach($posts as $item)
                        <!-- post -->
                            <div class="post-item clearfix">
                                <div class="post-image pull-right ">
{{--                                    <img src="{{$item->thumb}}" width="320" height="282" alt="" title=""--}}
{{--                                         style="margin-left:20px"/>--}}
                                    <i class="fa fa-code fa-2x"></i>
                                </div>
                                <h2 class="post-title">
                                    <a href="/{{$locale}}{{$item->link_address}}">{{$item->title}}</a>
                                </h2>
                                <div class="post-content">{{$item->excerpt}}</div>
                                <div class="post-meta">
                                    <!-- Author  -->
                                    <span class="author">
                                    <i class="fa fa-user"></i> {{$item->author}}</span>
                                    <!-- Meta Date -->

                                    <span class="time">
                                    <i class="fa fa-calendar"></i> {{$item->reg_date}}</span>
                                    <!-- Category -->
                                    <a href="/{{$locale}}{{$item->link_address}}">
                                    <span class="category pull-right">
                                    <i class="fa fa-link"></i> ادامه</span>
                                    </a>
                                </div>
                            </div>
                            <!-- post -->
                        @endforeach
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
                @include("home::shared._training_sidebar",["categories"=>$categories])

            </div>
    </section>
</main>
