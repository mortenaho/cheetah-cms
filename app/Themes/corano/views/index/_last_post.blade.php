@if(isset($last_post) && count($last_post)>0)
    <!-- latest blog area start -->
    <section class="latest-blog-area section-padding pt-2">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- section title start -->
                    <div class="section-title text-center">
                        <h3 class="title text-center">آخرین مطالب</h3>
                        <p class="sub-title-2 text-center">آخرین مطالب درج شده در سایت</p>
                    </div>
                    <!-- section title start -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="blog-carousel-active slick-row-10 slick-arrow-style">

                    @foreach($last_post as $item)
                        <!-- blog post item start -->
                        <div class="blog-post-item">
                            <figure class="blog-thumb">
                                <a href="/{{$locale}}{{$item->link_address}}">
                                    <img src="{{$item->thumb}}" alt="{{$item->title}}">
                                </a>
                            </figure>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <p>{{$item->reg_date}} | <a href="#">{{$item->author}}</a></p>
                                </div>
                                <h5 class="blog-title">
                                    <a href="/{{$locale}}{{$item->link_address}}">C{{$item->title}}</a>
                                </h5>
                            </div>
                        </div>
                        <!-- blog post item end -->
                    @endforeach


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- latest blog area end -->
@endif

