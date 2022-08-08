@extends("home::shared.layout",
["title"=>"دانلودها"
])

@section("breadcrumb")
    <div class="page-header" >
        <div class="container">
            <h1 class="title">دانلودها</h1>
        </div>
        <div class="breadcrumb-box">
            <div class="container">
                <ul class="breadcrumb">
                    <li>
                        <a href="/">خانه</a>
                    </li>
                    <li class="active">دانلودها</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
@section("body")
    @if(isset($posts) && count($posts)>0)
        <section class="page-section">
            <div class="container shop text-center">
                <div class="row">
                    @if($posts!=null && count($posts)>0)
                        @foreach($posts as $item)
                            <!-- post -->
                                <div class="post-item clearfix">
                                    <div class="post-image pull-right ">
                                        <img src="{{$item->thumb}}" width="320" height="282" alt="{{$item->title}}"
                                             title="{{$item->title}}"
                                             style="margin-left:20px"/>

                                    </div>
                                    <h2 class="post-title">
                                        <a href="/{{$locale}}{{$item->link_address}}">{{$item->title}}</a>
                                    </h2>
                                    <div class="post-content">{{$item->excerpt}}</div>
                                    <div class="post-meta">
                                        <!-- Author  -->
                                        <span class="author">
                                    <i class="fa fa-user"></i> {{$item->author}}</span>
                                        <!-- Meta Date -->

                                        <span class="time">
                                    <i class="fa fa-calendar"></i> {{$item->reg_date}}</span>
                                        <!-- Category -->
                                        <a href="/{{$locale}}{{$item->link_address}}">
                                    <span class="category pull-right btn btn-success">
                                    <i class="fa fa-download"> </i> ادامه و دانلود </span>
                                        </a>
                                    </div>
                                </div>
                                <!-- post -->
                            @endforeach
                            <div class="row">
                                <div class="col-md-12">
                                    <nav class="navbar-right">
                                        <ul class="pagination">
                                            <li>
                                                <a href="{{$posts->previousPageUrl()}}">
                                                    <span aria-hidden="true"><i class="fa fa-angle-left"></i></span>
                                                </a>
                                            </li>
                                            @for($i=1;$i<=$posts->lastPage();$i++)

                                                @if($i==$posts->currentPage())
                                                    <li class="active">
                                                        <a href="{{$posts->url($i)}}">{{$i}}
                                                            <span class="sr-only">(current)</span>
                                                        </a>
                                                    </li>
                                                @else
                                                    <li>
                                                        <a href="{{$posts->url($i)}}">
                                                            {{$i}}
                                                        </a>
                                                    </li>

                                                @endif
                                            @endfor
                                            <li>
                                                <a href="{{$posts->nextPageUrl()}}">
                                                    <span aria-hidden="true"><i class="fa fa-angle-right"></i></span>
                                                </a>
                                            </li>

                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <!-- pagination -->
                    @else
                        <div class="row">
                            <div class="alert alert-warning">
                                <h2> مشکلی پیش آمده است</h2>
                                <h4>چیزی برای نمایش یافت نشد .</h4>
                                <a href="/" class="tm-button">بازگشت به صفحه اصلی</a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </section>
        <!-- page-section -->
    @endif
@endsection

@push("script")
    <script src="{{theme_assets("assets/script/downloads.js")}}"></script>
@endpush
