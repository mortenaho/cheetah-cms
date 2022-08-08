@extends("admin.shared._AdminLayout",["title"=>"مشتریان ما","AjaxToken"=>true])

@section("pageHeader")

    @include("admin.shared._PageHeader",
    ["pageTitle"=>"مشتریان ما",
    "pageHeaderLinks"=>[
    ],
     "pageHeaderActive"=>"مشتریان ما",
     "InsertLink"=>"/admin/customer/create"
    ])
@endsection
@section("body")
    {!! AdminHelper::TempData("msg") !!}
    @include("admin.customer._list")

@endsection
@push("script")
    <script src="/admin_assets/custom/datatables/customer.js"></script>
    <script src="/admin_assets/custom/ordering.js"></script>
@endpush
