@extends("admin.shared._AdminLayout",["title"=>"بازدید","AjaxToken"=>true])

@section("pageHeader")

    @include("admin.shared._PageHeader",
    ["pageTitle"=>"بازدید",
    "pageHeaderLinks"=>[
    ],
     "pageHeaderActive"=>"بازدید",
     "InsertLink"=>"/admin/visits/create"
    ])

@endsection

@section("body")
    {!! AdminHelper::TempData("msg") !!}
    @include("admin.visits._list")

@endsection
@push("script")
    <script src="/admin_assets/custom/datatables/visits.js"></script>
    <script src="/admin_assets/custom/custom_ordering.js"></script>
@endpush
