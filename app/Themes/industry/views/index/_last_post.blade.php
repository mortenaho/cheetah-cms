@if(isset($last_post) && count($last_post)>0)
    <section class="news-section">
        <div class="auto-container">
            <!--Sec Title-->
            <div class="sec-title centered">
                <h4>{{trans('home.posts')}}</h4>
                <div class="separater"></div>
            </div>
            <div class="row clearfix">
                @if(isset($last_post[0]))
                <!--Column-->
                <div class="column col-lg-6 col-md-12 col-sm-12">
                    <div class="news-block">
                        <div class="inner-box">
                            <div class="image">
                                <a href="/{{$locale}}{{$last_post[0]->link_address}}"><img src="{{$last_post[0]->thumb}}" alt=""/></a>
                            </div>
                            <div class="lower-content">
                                <h6 ><a href="/{{$locale}}{{$last_post[0]->link_address}}">{{$last_post[0]->title}}</a></h6>
                                <div class="text">
                                    {{$last_post[0]->excerpt}}
                                </div>
                                <ul class="post-meta">
{{--                                    <li><span class="icon fa fa-comments-o"></span>Comments</li>--}}
{{--                                    <li><span class="icon fa fa-user"></span>Hasib Sharif</li>--}}
                                    <li>{{$last_post[0]->reg_date}} <span class="icon fa fa-calendar"></span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                <!--Column-->
                <div class="column col-lg-6 col-md-12 col-sm-12">

                    @if(isset($last_post[1]))
                    <div class="news-block-two">
                        <div class="inner-box">
                            <div class="row clearfix">
                                <div class="image-column col-lg-5 col-md-6 col-sm-12">
                                    <div class="image">
                                        <a href="/{{$locale}}{{$last_post[1]->link_address}}"><img src="{{$last_post[1]->thumb}}" alt="{{$last_post[1]->title}}"/></a>
                                    </div>
                                </div>
                                <div class="content-column col-lg-7 col-md-6 col-sm-12">
                                    <div class="inner-column">
                                        <h6><a href="/{{$locale}}{{$last_post[1]->link_address}}">{{$last_post[1]->title}}</a></h6>
                                        <div class="text">
                                            {{$last_post[1]->excerpt}}
                                        </div>
                                        <ul class="post-meta">
{{--                                            <li><span class="icon fa fa-comments-o"></span>Comments</li>--}}
{{--                                            <li><span class="icon fa fa-user"></span>Hasib Sharif</li>--}}
                                            <li> <span class="icon fa fa-calendar"></span> {{$last_post[1]->reg_date}} </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if(isset($last_post[2]))
                    <div class="news-block-two">
                        <div class="inner-box">
                            <div class="row clearfix">
                                <div class="image-column col-lg-5 col-md-6 col-sm-12">
                                    <div class="image">
                                        <a href="/{{$locale}}{{$last_post[2]->link_address}}"><img src="{{$last_post[2]->thumb}}" alt="{{$last_post[2]->title}}"/></a>
                                    </div>
                                </div>
                                <div class="content-column col-lg-7 col-md-6 col-sm-12">
                                    <div class="inner-column">
                                        <h6><a href="/{{$locale}}{{$last_post[2]->link_address}}">{{$last_post[2]->title}}</a>
                                        </h6>
                                        <div class="text">
                                            {{$last_post[2]->excerpt}}
                                        </div>
                                        <ul class="post-meta">
{{--                                            <li><span class="icon fa fa-comments-o"></span>Comments</li>--}}
{{--                                            <li><span class="icon fa fa-user"></span>Hasib Sharif</li>--}}
                                            <li> <span class="icon fa fa-calendar"></span> {{$last_post[2]->reg_date}} </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                </div>

            </div>
        </div>
    </section>
@endif
