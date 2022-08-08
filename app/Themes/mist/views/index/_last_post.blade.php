@if(isset($last_post) && count($last_post)>0)
    <!-- Blogs Area -->
{{--    <div class="tm-section blogs-area bg-white tm-padding-section">--}}
{{--        <div class="container">--}}
{{--            <div class="row justify-content-center">--}}
{{--                <div class="col-xl-6 col-lg-7 col-md-10 col-12">--}}
{{--                    <div class="tm-section-title text-center">--}}
{{--                        <h2>آخرین مطالب</h2>--}}
{{--                        <span class="divider"><i class="fa fa-gear"></i></span>--}}
{{--                        <p></p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="blog-slider-active tm-slider-arrow tm-slider-arrow-hovervisible">--}}
{{--            @foreach($last_post as $item)--}}
{{--                <!-- Single Blog -->--}}
{{--                    <div class="blog-slider-item">--}}
{{--                        <div class="tm-blog wow fadeInUp">--}}
{{--                            <div class="tm-blog-image">--}}
{{--                                <a href="{{$item->link_address}}">--}}
{{--                                    <img style="height: 250px;object-fit: cover;" src="{{$item->thumb}}"--}}
{{--                                         alt="{{$item->title}}">--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                            <div class="tm-blog-content main-page-blog-content">--}}
{{--                                <div class="tm-blog-meta">--}}
{{--                                            <span><i class="fa fa-user"></i>توسط<a--}}
{{--                                                    href="{{$item->link_address}}"> {{$item->author}} </a></span>--}}
{{--                                    <span><i class="fa fa-calendar-o"></i>{{$item->reg_date}}</span>--}}
{{--                                </div>--}}
{{--                                <h5><a href="{{$item->link_address}}">{{$item->title}}</a></h5>--}}
{{--                                <p>{{$item->excerpt}}</p>--}}
{{--                                <a href="{{$item->link_address}}" class="tm-readmore">ادامه مطلب...</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!--// Single Blog -->--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <!--// Blogs Area -->

    <section id="news" class="page-section">
        <div data-background="{{theme_assets("assets/img/sections/bg/bg-2.jpg")}}" class="image-bg content-in fixed" style="background-image: url(_img/sections/bg/bg-2.html);"></div>
        <div class="container text-center white">
            <div class="section-title" data-animation="fadeInUp">
                <h2 class="title">{{trans('home.posts')}}</h2>
            </div>
            <div class="row">
                <div class="owl-carousel navigation-1 opacity white text-left" data-pagination="false" data-items="4"
                     data-autoplay="true" data-navigation="true" data-animation="fadeInUp">
                    @foreach($last_post as $item)
                    <div class="col-sm-4 col-md-3 icons-hover-color bottom-xs-pad-20" >
                        <div class="image">
                            <!-- Image -->
                            <img src="{{$item->thumb}}" alt="" title="{{$item->title}}" width="270" height="270" />
                        </div>
                        <div class="description">
                            <!-- Post Title -->
                            <h4 class="post-title">
                                <a href="/{{$locale}}{{$item->link_address}}">{{$item->title}}</a>
                            </h4>
                            <!-- Text -->
                            <p>{{$item->excerpt}}</p>
                        </div>
                        <div class="meta">
                            <!-- Meta Date -->
                            <span class="time">
                                <i class="fa fa-calendar"></i> {{$item->reg_date}}</span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endif
