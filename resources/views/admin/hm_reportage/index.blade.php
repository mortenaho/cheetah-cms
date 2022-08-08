@extends("admin.shared._AdminLayout",["title"=>trans("admin.repo"),"AjaxToken"=>true])

@section("pageHeader")

    @include("admin.shared._PageHeader",
    ["pageTitle"=>trans("admin.reportage"),
    "pageHeaderLinks"=>[
    ],
     "pageHeaderActive"=>trans("admin.reportage"),

    ])
@endsection

@section("body")
    {!! AdminHelper::TempData("msg") !!}
    @include("admin.hm_reportage._list")

@endsection
@push("script")
    <script src="/admin_assets/custom/datatables/hm_reportage.js"></script>
@endpush
