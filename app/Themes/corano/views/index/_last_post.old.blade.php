@if(isset($last_post) && count($last_post)>0)
    <!-- Blogs Area -->
    <div class="tm-section blogs-area bg-white tm-padding-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-7 col-md-10 col-12">
                    <div class="tm-section-title text-center">
                        <h2>آخرین مطالب</h2>
                        <span class="divider"><i class="fa fa-gear"></i></span>
                        <p></p>
                    </div>
                </div>
            </div>
            <div class="blog-slider-active tm-slider-arrow tm-slider-arrow-hovervisible">
            @foreach($last_post as $item)
                <!-- Single Blog -->
                    <div class="blog-slider-item">
                        <div class="tm-blog wow fadeInUp">
                            <div class="tm-blog-image">
                                <a href="{{$item->link_address}}">
                                    <img style="height: 250px;object-fit: cover;" src="{{$item->thumb}}"
                                         alt="{{$item->title}}">
                                </a>
                            </div>
                            <div class="tm-blog-content main-page-blog-content">
                                <div class="tm-blog-meta">
                                            <span><i class="fa fa-user"></i>توسط<a
                                                    href="{{$item->link_address}}"> {{$item->author}} </a></span>
                                    <span><i class="fa fa-calendar-o"></i>{{$item->reg_date}}</span>
                                </div>
                                <h5><a href="{{$item->link_address}}">{{$item->title}}</a></h5>
                                <p>{{$item->excerpt}}</p>
                                <a href="{{$item->link_address}}" class="tm-readmore">ادامه مطلب...</a>
                            </div>
                        </div>
                    </div>
                    <!--// Single Blog -->
                @endforeach
            </div>
        </div>
    </div>
    <!--// Blogs Area -->
@endif
