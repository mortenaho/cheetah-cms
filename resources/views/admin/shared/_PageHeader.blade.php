
<div class="page-header page-header-light">
{{--    <div class="page-header-content header-elements-md-inline">--}}
{{--        <div class="page-title d-flex">--}}
{{--            <h4>--}}
{{--                <a href="{{URL::previous()}}">--}}
{{--                    <i class="icon-arrow-right6 mr-2"></i> <span class="font-weight-semibold">  {{$pageTitle}} </span>--}}
{{--                </a>--}}
{{--            </h4>--}}
{{--            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>--}}
{{--        </div>--}}

{{--        <div class="header-elements d-none">--}}
{{--            <div class="d-flex justify-content-center">--}}

{{--                @isset($InsertLink)--}}
{{--                    <a href="{{$InsertLink}}" style="min-width: 150px" class="btn bg-blue-400 btn-link  full-width btn-labeled btn-rounded legitRipple"><b>--}}
{{--                            <i class="icon-plus-circle2"></i></b> {{trans("admin.add")}}</a>--}}
{{--                @endisset--}}
{{--                <a href="#" class="btn btn-link btn-float text-default"><i--}}
{{--                        class="icon-bars-alt text-primary"></i><span>آمار</span></a>--}}
{{--                <a href="#" class="btn btn-link btn-float text-default"><i--}}
{{--                        class="icon-calculator text-primary"></i> <span>فاکتورها</span></a>--}}
{{--                <a href="#" class="btn btn-link btn-float text-default"><i--}}
{{--                        class="icon-calendar5 text-primary"></i> <span>تست</span></a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">


                    <a href="/admin" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> {{trans('admin.mainPage')}}</a>
                    @isset($pageHeaderLinks)
                        @foreach($pageHeaderLinks as $pageLink)
                            <a href="{{$pageLink['link']}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>{{$pageLink['title']}}</a>
                        @endforeach

                    @endisset

                    @isset($pageHeaderActive)
                        <span class="breadcrumb-item active">{{$pageHeaderActive}}</span>
                    @endisset




            </div>

            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

        <div class="header-elements d-none">
            <div class="breadcrumb justify-content-center">
{{--                <a href="#" class="breadcrumb-elements-item">--}}
{{--                    <i class="icon-comment-discussion mr-2"></i>--}}
{{--                    راهنما--}}
{{--                </a>--}}

                <div class="breadcrumb-elements-item dropdown p-0">
                    <a href="#" class="breadcrumb-elements-item dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-gear mr-2"></i>
                        تنظیمات
                    </a>

                    <div class="dropdown-menu">
{{--                        <a href="#" class="dropdown-item"><i class="icon-user-lock"></i> Account security</a>--}}
{{--                        <a href="#" class="dropdown-item"><i class="icon-statistics"></i> Analytics</a>--}}
{{--                        <a href="#" class="dropdown-item"><i class="icon-accessibility"></i> Accessibility</a>--}}
                        <div class="dropdown-divider"></div>
                        <a href="/admin/setting" class="dropdown-item"><i class="icon-gear"></i> تنظیمات </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
