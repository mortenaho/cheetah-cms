@extends("admin.shared._AdminLayout",["title"=>"مشتریان ما","AjaxToken"=>true])

@section("pageHeader")

    @include("admin.shared._PageHeader",
    ["pageTitle"=>"مشتریان ما",
    "pageHeaderLinks"=>[
    ],
     "pageHeaderActive"=>"مشتریان ما",
     "InsertLink"=>"/admin/client/create"
    ])
@endsection
@section("body")
    {!! AdminHelper::TempData("msg") !!}
    @include("admin.client._list")

@endsection
@push("script")
    <script src="/admin_assets/custom/datatables/client.js"></script>
    <script src="/admin_assets/custom/ordering.js"></script>
@endpush
