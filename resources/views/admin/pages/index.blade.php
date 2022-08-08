@extends("admin.shared._AdminLayout",["title"=>"برگه","AjaxToken"=>true])

@section("pageHeader")

    @include("admin.shared._PageHeader",
    ["pageTitle"=>"برگه ها",
    "pageHeaderLinks"=>[
    ],
     "pageHeaderActive"=>"برگه ها",
     "InsertLink"=>"/admin/pages/create"
    ])
@endsection
@section("body")
    {!! AdminHelper::TempData("msg") !!}
    @include("admin.pages._list")

@endsection
@push("script")
    <script src="/admin_assets/custom/datatables/pages.js"></script>
    <script src="/admin_assets/custom/ordering.js"></script>

@endpush
