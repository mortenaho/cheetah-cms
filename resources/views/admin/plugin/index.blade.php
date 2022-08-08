@extends('admin.shared._AdminLayout',["title"=>"افزونه ها","AjaxToken"=>true])
@section("pageHeader")

    @include("admin.shared._PageHeader",
    ["pageTitle"=>"افزونه ها",
    "pageHeaderLinks"=>[
    ],
     "pageHeaderActive"=>"افزونه ها"

    ])
@endsection

@section("body")
    <div class="col-md-12">
        <div class="card">
            <div class="card-header header-elements-inline">
                <a class="text-white" href="{{url()->previous()}}"><i
                        class="icon-arrow-right6 position-left"></i></a>
                <h6 class="card-title">افزونه ها</h6>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="reload"></a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <ul class="nav nav-tabs">
                    <li class="nav-item"><a href="#basic-tab1" class="nav-link active" data-toggle="tab">نصب شده ها</a></li>
                    <li class="nav-item"><a href="#basic-tab2" class="nav-link" data-toggle="tab">جدید ترینها</a></li>

                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade active show" id="basic-tab1">
                        @include("admin.plugin._plugin_list",["plugins"=>$plugins])
                    </div>

                    <div class="tab-pane fade" id="basic-tab2">

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="#" class="text-default">
                                        <i class="icon-power-cord mr-2"></i>
                                        هیچ چیز جدیدی وجود ندارد
                                    </a>
                                </h5>

                                <p class="mb-3">برای افزودن پلاگین جدید مراحل زیر را انجام دهسد</p>

                                <ul class="list list-unstyled mb-0">
                                    <li>
                                        <i class="icon-checkmark-circle text-success mr-2"></i>
                                        افزودن به جدول پلاگین
                                    </li>
                                    <li>
                                        <i class="icon-checkmark-circle text-success mr-2"></i>
                                       ایجاد اسکریپتهای دیتابیس
                                    </li>
                                    <li>
                                        <i class="icon-checkmark-circle text-success mr-2"></i>
                                        طراحی فرمهای مربوطه در پنل ادمین
                                    </li>
                                    <li>
                                        <i class="icon-checkmark-circle text-success mr-2"></i>
                                        طراحی در قسمت قالبها
                                    </li>
                                </ul>
                            </div>

                            <div class="card-footer border-light text-center">
                                <a href="#" class="btn bg-pink-400">
                                    <i class="icon-bubbles8 mr-2"></i>
                                    افزودن
                                </a>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

@endsection

@push("script")
    <script src="/admin_assets/custom/site_plugin.js"></script>
@endpush
