@extends("admin.shared._AdminLayout",["title"=>"دانلود","AjaxToken"=>true])

@section("pageHeader")

    @include("admin.shared._PageHeader",
    ["pageTitle"=>"دانلود",
    "pageHeaderLinks"=>[
    ],
     "pageHeaderActive"=>"دانلود",
     "InsertLink"=>"/admin/download/create"
    ])
@endsection
@section("body")
    {!! AdminHelper::TempData("msg") !!}
    @include("admin.download._list")

@endsection
@push("script")
    <script src="/admin_assets/custom/datatables/download.js"></script>
    <script src="/admin_assets/custom/ordering.js"></script>

@endpush
