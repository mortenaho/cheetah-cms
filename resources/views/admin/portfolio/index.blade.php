@extends("admin.shared._AdminLayout",["title"=>"نمونه کار","AjaxToken"=>true])

@section("pageHeader")

    @include("admin.shared._PageHeader",
    ["pageTitle"=>"نمونه کار",
    "pageHeaderLinks"=>[
    ],
     "pageHeaderActive"=>"نمونه کار",
     "InsertLink"=>"/admin/portfolio/create"
    ])
@endsection
@section("body")
    {!! AdminHelper::TempData("msg") !!}
    @include("admin.portfolio._list")

@endsection
@push("script")
    <script src="/admin_assets/custom/datatables/portfolio.js"></script>
    <script src="/admin_assets/custom/ordering.js"></script>

@endpush
