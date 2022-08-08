@extends('admin.shared._AdminLayout',["title"=>trans("admin.dashboard"),"AjaxToken"=>true])

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
                            <i class="icon-eye-plus icon-3x text-indigo-400"></i>
                        </div>

                        <div class="media-body text-right">
                            <h3 class="font-weight-semibold mb-0">{{get_visit()}}</h3>
                            <span class="text-uppercase font-size-sm text-muted">کل بازدید</span>
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

        <div class="row">
            <div class="col-sm-6 col-xl-2">
                <div class="card card-body bg-danger-400 has-bg-image">

                    <div class="media">
                        <div class="media-body">
                            <a href="/admin/ContactUs"
                               class="btn btn-default btn-block btn-float btn-float-lg legitRipple">
                                <i class="icon-list2 icon-3x opacity-75"></i>
                                <span class="text-uppercase font-size-xs">دسته بندی</span>
                            </a>
                        </div>

                    </div>

                </div>
            </div>
            <div class="col-sm-6 col-xl-2">
                <div class="card card-body bg-success-400 has-bg-image">

                    <div class="media">
                        <div class="media-body">
                            <a href="/admin/post" class="btn btn-default btn-block btn-float btn-float-lg legitRipple">
                                <i class="icon-book2 icon-3x opacity-75"></i>
                                <span class="text-uppercase font-size-xs">نوشته ها</span>
                            </a>
                        </div>

                    </div>

                </div>
            </div>
            <div class="col-sm-6 col-xl-2">
                <div class="card card-body bg-purple-400 has-bg-image">

                    <div class="media">
                        <div class="media-body">
                            <a href="/admin/slider"
                               class="btn btn-default btn-block btn-float btn-float-lg legitRipple">
                                <i class="icon-gallery icon-3x opacity-75"></i>
                                <span class="text-uppercase font-size-xs">اسلایدر</span>
                            </a>
                        </div>

                    </div>

                </div>
            </div>
            <div class="col-sm-6 col-xl-2">
                <div class="card card-body bg-blue-400 has-bg-image">

                    <div class="media">
                        <div class="media-body">
                            <a href="/admin/social"
                               class="btn btn-default btn-block btn-float btn-float-lg legitRipple">
                                <i class="icon-people icon-3x opacity-75"></i>
                                <span class="text-uppercase font-size-xs">شبکه های اجتماعی</span>

                            </a>
                        </div>

                    </div>

                </div>
            </div>
            <div class="col-sm-6 col-xl-2">
                <div class="card card-body bg-warning-400 has-bg-image">

                    <div class="media">
                        <div class="media-body">
                            <a href="/admin/ContactUs"
                               class="btn btn-default btn-block btn-float btn-float-lg legitRipple">
                                <i class="icon-mail5 icon-3x opacity-75"></i>
                                <span class="text-uppercase font-size-xs">تماس با ما</span>
                            </a>
                        </div>

                    </div>

                </div>
            </div>
            <div class="col-sm-6 col-xl-2">
                <div class="card card-body bg-danger-400 has-bg-image">

                    <div class="media">
                        <div class="media-body">
                            <a href="/admin/comment"
                               class="btn btn-default btn-block btn-float btn-float-lg legitRipple">
                                <i class="icon-comments icon-3x opacity-75"></i>
                                <span class="text-uppercase font-size-xs">نظرات</span>
                            </a>
                        </div>

                    </div>

                </div>
            </div>

        </div>

        <div class=" row">
            @foreach(cache("site_plugin") as $item)


                <div class="col-sm-6 col-xl-3">
                    <div class="card card-body">
                        <div class="media">
                            <a href="/admin{{$item->link_address}}"
                               class="btn  btn-block btn-float btn-float-lg legitRipple">
                                <div class="mr-3 align-self-center">
                                    <i class="{{$item->icon}} icon-3x text-warning-400"></i>

                                    <span class="text-uppercase font-size-sm text-muted">{{$item->title}}</span>

                                </div>


                            </a>
                        </div>
                    </div>
                </div>



            @endforeach
        </div>
        <div class=" row">
            <div class="col-sm-6 col-xl-3">
                <div class="card card-body bg-purple-800 has-bg-image">
                    <div class="media">
                        <a href="/admin/plugin"
                           class="btn  btn-block btn-float btn-float-lg legitRipple">
                            <div class="mr-3 align-self-center">
                                <i class="icon-power-cord icon-3x text-white-50"></i>
                                <span class="text-uppercase font-size-sm text-muted">افزونه ها</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card card-body bg-danger-800 has-bg-image">
                    <div class="media">
                        <a href="/admin/errorLog"
                           class="btn  btn-block btn-float btn-float-lg legitRipple">
                            <div class="mr-3 align-self-center">
                                <i class="icon-alert icon-3x text-white-50"></i>
                                <span class="text-uppercase font-size-sm text-muted">مدیریت خطا</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card card-body bg-teal-800 has-bg-image">
                    <div class="media">
                        <a href="/admin/themes"
                           class="btn  btn-block btn-float btn-float-lg legitRipple">
                            <div class="mr-3 align-self-center">
                                <i class="icon-puzzle2 icon-3x text-white-50"></i>
                                <span class="text-uppercase font-size-sm text-muted">تغییر قالب</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card card-body bg-green-800 has-bg-image">
                    <div class="media">
                        <a href="/admin/setting"
                           class="btn  btn-block btn-float btn-float-lg legitRipple">
                            <div class="mr-3 align-self-center">
                                <i class="icon-cog icon-3x text-white-50"></i>
                                <span class="text-uppercase font-size-sm text-muted">تنظیمات</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push("script")
@endpush
