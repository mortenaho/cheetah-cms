@extends("admin.shared._AdminLayout",["title"=>"بازدید","AjaxToken"=>true])

@section("pageHeader")

    @include("admin.shared._PageHeader",
    ["pageTitle"=>"بازدید نمودار",
    "pageHeaderLinks"=>[
    ],
     "pageHeaderActive"=>"",
     "InsertLink"=>"/admin/statistics/create"
    ])

@endsection

@section("body")
    {!! AdminHelper::TempData("msg") !!}
{{--    @include("admin.statistics._list")--}}

        <!-- Content area -->
        <div class="content pt-0" id="statistic_details">

            <!-- Pies -->
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header header-elements-inline">
                            <h5 class="card-title">بازدید بر اساس مرورگرها</h5>
                            <div class="header-elements">
                                <div class="list-icons">
                                    <a class="list-icons-item" data-action="collapse"></a>
                                    <a class="list-icons-item" data-action="reload"></a>
                                    <a class="list-icons-item" data-action="remove"></a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="chart-container text-center">
                                <div class="d-inline-block" id="c3-pie-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header header-elements-inline">
                            <h5 class="card-title">بازدید بر اساس ابزارها</h5>
                            <div class="header-elements">
                                <div class="list-icons">
                                    <a class="list-icons-item" data-action="collapse"></a>
                                    <a class="list-icons-item" data-action="reload"></a>
                                    <a class="list-icons-item" data-action="remove"></a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="chart-container text-center">
                                <div class="d-inline-block" id="c3-donut-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /pies -->


            <!-- Bar chart -->
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">بازدید در شش ماه اخیر</h5>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                            <a class="list-icons-item" data-action="reload"></a>
                            <a class="list-icons-item" data-action="remove"></a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="chart-container">
                        <div class="chart" id="c3-bar-chart"></div>
                    </div>
                </div>
            </div>
            <!-- /bar chart -->


            <!-- Stacked bar chart -->
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">بازدید بر اساس گروهها </h5>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                            <a class="list-icons-item" data-action="reload"></a>
                            <a class="list-icons-item" data-action="remove"></a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="chart-container">
                        <div class="chart" id="c3-bar-stacked-chart"></div>
                    </div>
                </div>
            </div>
            <!-- /stacked bar chart -->


            <!-- Combined chart -->
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">بازدید براساس نوع محتوا</h5>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                            <a class="list-icons-item" data-action="reload"></a>
                            <a class="list-icons-item" data-action="remove"></a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="chart-container">
                        <div class="chart" id="c3-combined-chart"></div>
                    </div>
                </div>
            </div>
            <!-- /combined chart -->


            <!-- Scatter plot -->
{{--            <div class="card">--}}
{{--                <div class="card-header header-elements-inline">--}}
{{--                    <h5 class="card-title">آمار پراکندگی بازدید</h5>--}}
{{--                    <div class="header-elements">--}}
{{--                        <div class="list-icons">--}}
{{--                            <a class="list-icons-item" data-action="collapse"></a>--}}
{{--                            <a class="list-icons-item" data-action="reload"></a>--}}
{{--                            <a class="list-icons-item" data-action="remove"></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="card-body">--}}
{{--                    <div class="chart-container">--}}
{{--                        <div class="chart" id="c3-scatter-chart"></div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- /scatter plot -->--}}

        </div>
        <!-- /content area -->

@endsection
@push("script")

    <script src="/admin_assets/custom/custom_ordering.js"></script>
    <script src="/admin_assets/global_assets/js/plugins/visualization/d3/d3.min.js"></script>
    <script src="/admin_assets/global_assets/js/plugins/visualization/c3/c3.min.js"></script>

    <script src="/admin_assets/global_assets/assets/js/app.js"></script>
    <script src="/admin_assets/custom/forms/statistics.js"></script>
{{--    <script src="/admin_assets/global_assets/js/demo_charts/c3/c3_bars_pies.js"></script>--}}
@endpush
