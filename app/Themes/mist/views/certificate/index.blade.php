@extends("home::shared.layout",
["title"=>"گواهینامه ها"
])

@section("breadcrumb")
    <div class="page-header" >
        <div class="container">
            <h3 class="title">گواهینامه ها</h3>
        </div>
        <div class="breadcrumb-box">
            <div class="container">
                <ul class="breadcrumb">
                    <li>
                        <a href="/">خانه</a>
                    </li>
                    <li class="active">گواهینامه ها</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
@section("body")
    @if(isset($certificates) && count($certificates)>0)
        <section id="certificate" class="page-section">
            <div class="container">
                <div class="section-title">
                    <!-- Heading -->
                    <h2 class="title">گواهینامه های ما</h2>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            @foreach($certificates as $item)
                            <div class="col-sm-3">
                                <p class="text-center">
                                    <a href="{{$item->thumb}}" class="opacity" data-rel="prettyPhoto[portfolio]">
                                        <img src="{{$item->thumb}}" width="370" height="185" alt="" />
                                    </a>
                                </p>
                                <h5 class="bottom-margin-10">
                                    <a href="/{{$locale}}{{$item->link_address}}" class="black">{{$item->title}}</a>
                                </h5>
                                <p>{{$item->excerpt}}</p>
                                <a href="/{{$locale}}{{$item->link_address}}" class="btn btn-default">بیشتر بخوانید</a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--// Services Area -->
    @endif

@endsection

@push("script")
@endpush
