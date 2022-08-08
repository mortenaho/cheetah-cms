@extends("home::shared.layout",
["title"=>"نمونه کار",
])


@section("breadcrumb")
    <div class="tm-breadcrumb-area tm-padding-section text-center" data-overlay="1"
         data-bgimage="{{$site->header_banner}}"
         style="background-image: url({{$site->header_banner}});">
        <div class="container">
            <div class="tm-breadcrumb">
                <h2 class="tm-breadcrumb-title">نمونه کارها</h2>
                <ul>
                    <li><a href="/">خانه</a></li>
                    <li>نمونه کار ها</li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section("body")
    <main class="main-content">

    @if(isset($portfolio)  && count($portfolio)>0)
        <!-- Our Portfolios -->
            <div class="tm-section portfolios-area bg-grey tm-padding-section">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-7 col-md-10 col-12">
                            <div class="tm-section-title text-center">
                                <h2>نمونه کارها</h2>
                                <span class="divider"><i class="fa fa-superpowers"></i></span>

                            </div>
                        </div>
                    </div>

                    <div class="tm-portfolio-buttons text-center">
                        <button data-filter="*" class="is-active">همه</button>
                        @foreach($portfolio as $item)
                            <button data-filter=".portfolio-filter-{{$item->id}}">{{$item->title}}</button>
                        @endforeach
                    </div>

                    <div class="row tm-portfolio-wrapper mt-30-reverse">
                    @foreach($portfolio as $item)
                        @foreach($item->posts as $post)
                            <!-- Portfolio Single -->
                                <div
                                    class="col-lg-4 col-md-6 col-12 tm-portfolio-item portfolio-filter-{{$post->category_id}} portfolio-filter-investment">
                                    <div class="tm-portfolio mt-30 wow fadeInUp">
                                        <div class="tm-portfolio-image">
                                            <img
                                                style="height: 220px;object-fit: cover;"
                                                src="{{$post->thumb}}"
                                                alt="{{$post->title}}">
                                            <ul class="tm-portfolio-actions">
                                                <li class="link-button">
                                                    <a href="{{$post->link_address}}"><i class="fa fa-link"></i></a>
                                                </li>
                                                <li class="zoom-button">
                                                    <a href="{{$post->thumb}}"><i
                                                            class="fa fa-search-plus"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="tm-portfolio-content">
                                            <h5><a href="{{$post->link_address}}">{{$post->title}}</a></h5>
                                            <h6><a href="">{{$item->title}}</a></h6>
                                        </div>
                                    </div>
                                </div>
                                <!--// Portfolio Single -->
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
            <!--// Our Portfolios -->
        @endif

    </main>
@endsection
@push("script")

@endpush
