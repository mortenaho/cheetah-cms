<!-- blog main wrapper start -->
<div class="blog-main-wrapper section-padding">
    <div class="container">
        <div class="row">

            @include("home::shared._post_sidebar",["categories"=>$categories])
            <div class="col-lg-9 order-1">
                <div class="blog-item-wrapper">
                @if(isset($posts) && $posts->count()>0)
                    <!-- blog item wrapper end -->
                        <div class="row mbn-30">
                            @foreach($posts as $item)
                                <div class="col-md-6">
                                    <!-- blog post item start -->
                                    <div class="blog-post-item mb-30">
                                        <figure class="blog-thumb">
                                            <a href="/{{$locale}}{{$item->link_address}}">
                                                <img src="{{$item->thumb}}" alt="{{$item->title}}">
                                            </a>
                                        </figure>
                                        <div class="blog-content">
                                            <div class="blog-meta">
                                                <p>{{$item->reg_date}} | <a href="#">{{$item->author}}</a></p>
                                            </div>
                                            <h4 class="blog-title">
                                                <a href="/{{$locale}}{{$item->link_address}}">{{$item->title}}</a>
                                            </h4>
                                        </div>
                                    </div>
                                    <!-- blog post item end -->
                                </div>
                            @endforeach
                        </div>
                        <!-- blog item wrapper end -->

                        <!-- start pagination area -->
                        <div class="paginatoin-area text-center">
                            <ul class="pagination-box">
                                <li><a class="previous" href="{{$posts->previousPageUrl()}}"><i
                                            class="pe-7s-angle-left"></i></a>
                                </li>

                                @for($i=1;$i<=$posts->lastPage();$i++)
                                    @if($i==$posts->currentPage())
                                        <li class="active"><a href="{{$posts->url($i)}}">{{$i}}</a></li>
                                    @else
                                        <li><a href="{{$posts->url($i)}}">{{$i}}</a></li>
                                    @endif


                                @endfor
                                <li><a class="next" href="{{$posts->nextPageUrl()}}"><i
                                            class="pe-7s-angle-right"></i></a></li>
                            </ul>
                        </div>

                        <!-- end pagination area -->
                    @else
                        <div class="row mbn-30">
                            <div class="col-md-12">
                                <h4>چیزی برای نمایش وجو ندارد</h4>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
