@extends("admin.shared._AdminLayout",["title"=>"خدمات","AjaxToken"=>true])

@section("pageHeader")

    @include("admin.shared._PageHeader",
    ["pageTitle"=>"خدمات",
    "pageHeaderLinks"=>[
    ],
     "pageHeaderActive"=>"خدمات",
     "InsertLink"=>"/admin/service/create"
    ])
@endsection
@section("body")
    {!! AdminHelper::TempData("msg") !!}
    @include("admin.service._list")

@endsection
@push("script")
    <script src="/admin_assets/custom/datatables/service.js"></script>
    <script src="/admin_assets/custom/ordering.js"></script>
@endpush
