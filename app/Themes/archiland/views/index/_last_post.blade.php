@if(isset($last_post) && count($last_post)>0)


    <!-- OUR BLOG START -->
    <div class="section-full small-device bg-white p-t80 p-b40">
        <div class="container">
            <!-- TITLE START -->
            <div class="section-head text-center">
                <div class="wt-separator-outer separator-center">
                    <div class="wt-separator">
                  <span class="text-primary text-uppercase sep-line-one">
                      {{trans('home.posts')}}
                  </span>
                    </div>
                </div>
                <h3></h3>
            </div>
            <!-- TITLE END -->
            <!-- TITLE START -->

            <!-- IMAGE CAROUSEL START -->
            <div class="section-content">
                <div class="row">
                    @foreach($last_post as $item)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="blog-post latest-blog-1 date-style-1">
                                <div class="wt-post-media wt-img-effect zoom-slow">
                                    <a href="javascript:;" >
                                        <img  src="{{$item->thumb}}"   alt="{{$item->title}}" />
                                    </a>
                                </div>
                                <div class="wt-post-info">
                                    <div class="post-date"><strong>{{$item->reg_date}} </strong></div>
                                    <div class="wt-post-title">
                                        <h4 class="post-title">
                                            <a href="#">{{$item->title}}</a>
                                        </h4>
                                    </div>
                                    <div class="wt-post-text">
                                        <p>
                                            {{$item->excerpt}}
                                        </p>
                                    </div>
                                    <div class="wt-post-meta">
                                        <ul class="clearfix">

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <!-- OUR BLOG END -->
@endif
