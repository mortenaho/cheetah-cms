@extends("admin.shared._AdminLayout",["title"=>"مشتریان ما","AjaxToken"=>true])

@section("pageHeader")

    @include("admin.shared._PageHeader",
    ["pageTitle"=>"مشتریان ما",
    "pageHeaderLinks"=>[
    ],
     "pageHeaderActive"=>"مشتریان ما",
     "InsertLink"=>"/admin/customers/create"
    ])
@endsection
@section("body")
    {!! AdminHelper::TempData("msg") !!}
    @include("admin.customers._list")

@endsection
@push("script")
    <script src="/admin_assets/custom/datatables/customers.js"></script>
    <script src="/admin_assets/custom/ordering.js"></script>
@endpush
