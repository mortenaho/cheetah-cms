@extends("admin.shared._AdminLayout",["title"=>"درباره ما","AjaxToken"=>true])

@section("pageHeader")

    @include("admin.shared._PageHeader",
    ["pageTitle"=>"درباره ما",
    "pageHeaderLinks"=>[
    ],
     "pageHeaderActive"=>"درباره ما",
     "InsertLink"=>"/admin/about_us/create"
    ])
@endsection
@section("body")
    {!! AdminHelper::TempData("msg") !!}
    @include("admin.about_us._list")

@endsection
@push("script")
    <script src="/admin_assets/custom/datatables/about_us.js"></script>

@endpush
