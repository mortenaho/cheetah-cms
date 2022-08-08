@extends("home::shared.layout",
["title"=>"خدمات"
])

<main>
@section("breadcrumb")
    <!-- breadcrumb area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/{{$locale}}"> <i class="fa fa-home"></i>  خانه  </a></li>
                                <li class="breadcrumb-item active" aria-current="page">خدمات</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->
@endsection

@section("body")

    @if(isset($services) && count($services)>0)

        <!--  main wrapper start -->
        <div class="blog-main-wrapper section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title text-center">
                            <h3 class="title text-center">خدمات ما</h3>
                            <p class="sub-title-2 text-center"></p>
                        </div>
                        <div class="blog-item-wrapper">

                            <!-- blog item wrapper end -->
                            <div class="row mbn-30">
                                @foreach($services as $item)
                                <div class="col-md-3">
                                    <!-- blog post item start -->
                                    <div class="blog-post-item mb-30">
                                        <figure class="blog-thumb">
                                            <a href="/{{$locale}}{{$item->link_address}}">
                                                <img src="{{$item->thumb}}" alt="{{$item->title}}">
                                            </a>
                                        </figure>
                                        <div class="blog-content">
                                            <div class="blog-meta">
                                                <p><a href="/{{$locale}}{{$item->link_address}}">{{$item->title}}</a></p>
                                            </div>
                                            <h4 class="blog-title">
                                                <a href="/{{$locale}}{{$item->link_address}}">{{$item->excerpt}}</a>
                                            </h4>
                                        </div>
                                    </div>
                                    <!-- blog post item end -->
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--  main wrapper end -->
    @endif

@endsection

</main>


@push("script")
@endpush
