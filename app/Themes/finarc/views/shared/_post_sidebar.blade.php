<?php
$posts = post_get::get_last_post(10);
?>


<div class="col-lg-4">

    <div class="post-sidebar post-sidebar-inset">
        <div class="row row-lg row-60">
            <div class="col-sm-6 col-lg-12">
                <div class="post-sidebar-item">

                    <form class="finarc-search form-search form-post-search" action="https://www.google.com" method="GET">
                        <div class="form-wrap">
                            <label class="form-label" for="search-form">جستجو</label>
                            <input class="form-input" id="search-form" type="text" name="s" autocomplete="off">
                            <button class="button-search fl-bigmug-line-search74" type="submit"></button>
                        </div>
                    </form>
                </div>
                <div class="post-sidebar-item">
                    <h5>دسته بندیها</h5>
                    <div class="post-sidebar-item-inset">
                        <ul class="list list-categories">
                            <li><a class="active" href="/{{$locale}}/posts">همه دسته بندیها</a></li>
                                        @foreach($categories as $item)
                                            <li><a href="/{{$locale}}/category/{{$item->id}}/{{$item->url_slug}}">{{$item->title}}</a></li>
                                        @endforeach

                        </ul>
                    </div>
                </div>
                <div class="post-sidebar-item">
                    <h5>پستهای اخیر</h5>
                    <div class="post-sidebar-item-inset">


                        @foreach($posts as $item)
                             <article class="post post-minimal"><a class="post-minimal-figure" href="b/{{$locale}}{{$item->link_address}}"><img src="{{$item->thumb}}" alt="{{$item->title}}" width="232" height="138"/></a>
                                <p class="post-minimal-title"><a href="/{{$locale}}{{$item->link_address}}">{{$item->title}}</a></p>
                            </article>
                        @endforeach
                    </div>
                </div>
            </div>
{{--            <div class="col-sm-6 col-lg-12">--}}
{{--                <div class="post-sidebar-item">--}}
{{--                    <h5>Comments</h5>--}}
{{--                    <div class="post-sidebar-item-inset">--}}
{{--                        <!-- Quote Minimal-->--}}
{{--                        <article class="quote-minimal">--}}
{{--                            <div class="quote-minimal-text">--}}
{{--                                <p class="q">Glos barbatus accola est. Bi-color, clemens particulas.</p>--}}
{{--                            </div>--}}
{{--                            <h6 class="quote-minimal-cite">Jessica Brown on<span class="quote-minimal-source"><a href="#">How to Pick floors</a></span></h6>--}}
{{--                        </article>--}}
{{--                        <!-- Quote Minimal-->--}}
{{--                        <article class="quote-minimal">--}}
{{--                            <div class="quote-minimal-text">--}}
{{--                                <p class="q">Mirabilis, teres elogiums solite resuscitabo de superbus!</p>--}}
{{--                            </div>--}}
{{--                            <h6 class="quote-minimal-cite">Adam Williams on<span class="quote-minimal-source"><a href="#">Best laminate flooring trends</a></span></h6>--}}
{{--                        </article>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="post-sidebar-item">--}}
{{--                    <h5>Popular tags</h5>--}}
{{--                    <div class="post-sidebar-item-inset">--}}
{{--                        <div class="group-xs group-middle justify-content-start"><a class="badge badge-white" href="#"> <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="16px" height="27px" viewbox="0 0 16 27" enable-background="new 0 0 16 27" xml:space="preserve">--}}
{{--                      <path d="M0,0v6c4.142,0,7.5,3.358,7.5,7.5S4.142,21,0,21v6h16V0H0z"></path>--}}
{{--                      </svg>--}}
{{--                                <div>Flooring</div>--}}
{{--                            </a><a class="badge badge-white" href="#"> <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="16px" height="27px" viewbox="0 0 16 27" enable-background="new 0 0 16 27" xml:space="preserve">--}}
{{--                      <path d="M0,0v6c4.142,0,7.5,3.358,7.5,7.5S4.142,21,0,21v6h16V0H0z"></path>--}}
{{--                      </svg>--}}
{{--                                <div>Tips</div>--}}
{{--                            </a><a class="badge badge-white" href="#"> <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="16px" height="27px" viewbox="0 0 16 27" enable-background="new 0 0 16 27" xml:space="preserve">--}}
{{--                      <path d="M0,0v6c4.142,0,7.5,3.358,7.5,7.5S4.142,21,0,21v6h16V0H0z"></path>--}}
{{--                      </svg>--}}
{{--                                <div>Stone</div>--}}
{{--                            </a><a class="badge badge-white" href="#"> <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="16px" height="27px" viewbox="0 0 16 27" enable-background="new 0 0 16 27" xml:space="preserve">--}}
{{--                      <path d="M0,0v6c4.142,0,7.5,3.358,7.5,7.5S4.142,21,0,21v6h16V0H0z"></path>--}}
{{--                      </svg>--}}
{{--                                <div>Trends</div>--}}
{{--                            </a><a class="badge badge-white" href="#"> <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="16px" height="27px" viewbox="0 0 16 27" enable-background="new 0 0 16 27" xml:space="preserve">--}}
{{--                      <path d="M0,0v6c4.142,0,7.5,3.358,7.5,7.5S4.142,21,0,21v6h16V0H0z"></path>--}}
{{--                      </svg>--}}
{{--                                <div>News</div>--}}
{{--                            </a> </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="post-sidebar-item">--}}
{{--                    <h5>Newsletter</h5>--}}
{{--                    <div class="post-sidebar-item-inset">--}}
{{--                        <!-- RD Mailform-->--}}
{{--                        <form class="finarc-form finarc-mailform" data-form-output="form-output-global" data-form-type="subscribe" method="post" action="#">--}}
{{--                            <div class="form-wrap">--}}
{{--                                <input class="form-input" id="subscribe-form-4-email" type="email" name="email" data-constraints="@Email @Required">--}}
{{--                                <label class="form-label" for="subscribe-form-4-email">Enter Your E-mail</label>--}}
{{--                            </div>--}}
{{--                            <div class="form-button">--}}
{{--                                <button class="button button-block button-primary button-pipaluk" type="submit">Subscribe</button>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
</div>
