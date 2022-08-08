@extends('customer.shared._CustomerLayout',["title"=>trans("admin.dashboard"),"AjaxToken"=>true])

@section("body")
    <div class="content pt-0">
        <div class="row">
            <div class="col-sm-6 col-xl-3">
                <div class="card card-body">
                    <div class="media">
                        <div class="mr-3 align-self-center">
                            <i class="icon-book icon-3x text-success-400"></i>
                        </div>

                        <div class="media-body text-right">
                            <h3 class="font-weight-semibold mb-0">{{get_post_count("post")}}</h3>
                            <span class="text-uppercase font-size-sm text-muted">نوشته ها</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-3">
                <div class="card card-body">
                    <div class="media">
                        <div class="mr-3 align-self-center">
                            <i class="icon-cart icon-3x text-indigo-400"></i>
                        </div>

                        <div class="media-body text-right">
                            <h3 class="font-weight-semibold mb-0">100</h3>
                            <span class="text-uppercase font-size-sm text-muted">تعداد سفارشات</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-3">
                <div class="card card-body">
                    <div class="media">
                        <div class="mr-3 align-self-center">
                            <i class="icon-comments icon-3x text-blue-400"></i>
                        </div>

                        <div class="media-body text-right">
                            <h3 class="font-weight-semibold mb-0">{{get_count("comments",["status"=>0])}}</h3>
                            <span class="text-uppercase font-size-sm text-muted">نظرات</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-3">
                <div class="card card-body">
                    <div class="media">
                        <div class="mr-3 align-self-center">
                            <i class="icon-mail5 icon-3x text-danger-400"></i>
                        </div>

                        <div class="media-body text-right">
                            <h3 class="font-weight-semibold mb-0">{{get_count("contact_us",["status"=>0])}}</h3>
                            <span class="text-uppercase font-size-sm text-muted">تماس با ما</span>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
@push("script")
@endpush
