
<!-- SECTION CONTENT START -->
<div class="section-full small-device  p-t80 p-b50 bg-gray">
    <div class="container">
    @if(isset($portfolio)  && count($portfolio)>0)
        <!-- PAGINATION START -->
            <div class="filter-wrap p-b30 text-center">
                <ul class="filter-navigation masonry-filter text-uppercase" style="direction: rtl;">
                    <li class="active"><a data-filter="*" data-hover="نمایش همه" href="#">نمایش همه</a></li>
                    @foreach($portfolio as $item)

                        <li><a data-filter=".cat-{{$item->id}}" data-hover="{{$item->title}}"
                               href="javascript:;">{{$item->title}}</a></li>
                    @endforeach

                </ul>
            </div>
            <!-- PAGINATION END -->
            <!-- GALLERY CONTENT START -->
            <div class="portfolio-wrap mfp-gallery work-grid row clearfix">
            @foreach($portfolio as $item)
                @foreach($item->posts as $post)
                    <!-- COLUMNS 1 -->
                        <div class="masonry-item cat-{{$post->category_id}}  col-md-4 col-sm-6 m-b30">
                            <div class="wt-box">
                                <div class="work-hover-grid">
                                    <img src="{{$post->thumb}}" alt=""/>
                                    <div class="work-hover-discription">
                                        <h4>{{$post->title}}</h4>
                                        <h5>{{$post->excerpt}} </h5>
                                    </div>
                                    <a href="/{{$locale}}{{$post->link_address}}"></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforeach

            </div>
        @endif
    </div>
</div>

@push("script")
    <script src="{{theme_assets("assets/script/products.js")}}"></script>
@endpush
