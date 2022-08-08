


<section class="section section-sm bg-default text-md-left">
    <div class="container">
        <div class="row row-70">
            <div class="col-lg-8">
            @if(isset($posts) && $posts->count()>0)
                <!-- COLUMNS 2 -->
                @foreach($posts as $item)
                    <!-- Post Classic-->
                        <article class="post post-classic">
                            <h5 class="post-classic-title" style="line-height: 1.6;"><a href="/{{$locale}}{{$item->link_address}}">{{$item->title}}</a> </h5>
                            <p>{{$item->excerpt}}</p>
                            <div class="post-classic-panel group-middle justify-content-start"><a class="badge badge-secondary" href="{{$item->thumb}}"> <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="16px" height="27px" viewbox="0 0 16 27" enable-background="new 0 0 16 27" xml:space="preserve">
              <path d="M0,0v6c4.142,0,7.5,3.358,7.5,7.5S4.142,21,0,21v6h16V0H0z"></path>
              </svg>
                                    <div>{{$item->category["title"]}}</div>
                                </a>
                                <div class="post-classic-comments"><span class="icon fa fa-comments-o"></span><a href="#">3</a></div>
                                <div class="post-classic-time"><span class="icon fa fa-clock-o"></span>
                                    <time datetime="{{$item->reg_date}}">{{$item->reg_date}}</time>
                                </div>
                                <div class="post-classic-author">توسط : <a href="#">{{$item->author}}</a></div>
                            </div>
                            <a class="post-classic-figure" href="/{{$locale}}{{$item->link_address}}"><img src="{{$item->thumb}}" alt="{{$item->title}}" width="770" height="430"/> </a> </article>


                        <!-- Post Classic-->
                    @endforeach
                @endif
                <div class="pagination-wrap">
                    <!-- Bootstrap Pagination-->
                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            <li class="page-item page-item-control disabled"><a class="page-link" href="{{$posts->previousPageUrl()}}" aria-label="Previous"><span class="icon" aria-hidden="true"></span></a></li>

                            @for($i=1;$i<=$posts->lastPage();$i++)

                                @if($i==$posts->currentPage())
                                    <li class="page-item active"><span class="page-link">{{$i}}</span></li>
                                @else
                                    <li class="page-item"><a class="page-link" href="{{$posts->url($i)}}"> {{$i}}</a></li>
                                @endif
                            @endfor

                            <li class="page-item page-item-control"><a class="page-link" href="{{$posts->nextPageUrl()}}" aria-label="Next"><span class="icon" aria-hidden="true"></span></a></li>
                        </ul>
                    </nav>
                </div>

            </div>
            <!-- GALLERY CONTENT END -->
            @include("home::shared._post_sidebar",["categories"=>$categories])

        </div>
    </div>
</section>
