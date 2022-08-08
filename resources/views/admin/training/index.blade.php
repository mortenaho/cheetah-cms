@extends("admin.shared._AdminLayout",["title"=>"آموزش","AjaxToken"=>true])

@section("pageHeader")

    @include("admin.shared._PageHeader",
    ["pageTitle"=>"آموزش",
    "pageHeaderLinks"=>[
    ],
     "pageHeaderActive"=>"آموزش",
     "InsertLink"=>"/admin/training/create"
    ])
@endsection
@section("body")
    {!! AdminHelper::TempData("msg") !!}
    @include("admin.training._list")

@endsection
@push("script")
    <script src="/admin_assets/custom/datatables/training.js"></script>
    <script src="/admin_assets/custom/ordering.js"></script>
@endpush
