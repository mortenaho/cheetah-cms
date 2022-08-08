@extends("admin.shared._AdminLayout",["title"=>"اطلاعات تماس","AjaxToken"=>true])

@section("pageHeader")

    @include("admin.shared._PageHeader",
    ["pageTitle"=>"اطلاعات تماس",
    "pageHeaderLinks"=>[
    ],
     "pageHeaderActive"=>"اطلاعات تماس",
     "InsertLink"=>"/admin/contact_info/create"
    ])
@endsection
@section("body")
    {!! AdminHelper::TempData("msg") !!}
    @include("admin.contact_info._list")

@endsection
@push("script")
    <script src="/admin_assets/custom/datatables/contact_info.js"></script>

@endpush
