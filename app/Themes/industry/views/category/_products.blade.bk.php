
<!--Solutions Page Section-->
<section class="solutions-page-section">
    <div class="auto-container">
        <div class="row clearfix">
        @if($posts!=null && count($posts)>0)
            @foreach($posts as $item)
                <?php
                $post_meta = ResToModel($item->post_meta);
                $price = $post_meta["price"];
                $discount = $post_meta["discount"];
                ?>
                <!--Services Block-->
                    <div class="services-block col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="upper-box">
                                <span class="icon flaticon-chemistry-class-flask-with-liquid-for-experimentation"></span>
                                <h3><a href="/{{$locale}}{{$item->link_address}}">{{$item->title}}</a></h3>
                            </div>
                            <div class="lower-box">
                                <div class="image">
                                    <img src="{{$item->thumb}}" alt="{{$item->title}}" />
                                    <div class="overlay-box">
                                        <div class="text"> {{$item->excerpt}}</div>
                                        <a href="/{{$locale}}{{$item->link_address}}" class="link-btn"><span class="fa fa-link"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

        </div>

        <!--Styled Pagination-->
        <ul class="styled-pagination text-center">
            <li class="prev"><a href="/{{$posts->previousPageUrl()}}"><span class="fa fa-angle-left"></span></a></li>
            @for($i=1;$i<=$posts->lastPage();$i++)

                @if($i==$posts->currentPage())
                    <li class="active">
                        <a  class="active" href="{{$posts->url($i)}}">{{$i}} </a>
                    </li>
                @else
                    <li>
                        <a href="{{$posts->url($i)}}">
                            {{$i}}
                        </a>
                    </li>
                @endif
            @endfor
            <li class="next"><a href="{{$posts->nextPageUrl()}}"><span class="fa fa-angle-right"></span></a></li>
        </ul>
        <!--End Styled Pagination-->
        @else
            <div class="row">
                <div class="alert alert-warning">
                    <h4>چیزی برای نمایش یافت نشد .</h4>
                    <a href="/" class="tm-button">بازگشت به صفحه اصلی</a>
                </div>
            </div>
        @endif
    </div>
</section>
<!--End Solutions Page Section-->

@push("script")
    <script src="{{theme_assets("assets/script/products.js")}}"></script>
@endpush
