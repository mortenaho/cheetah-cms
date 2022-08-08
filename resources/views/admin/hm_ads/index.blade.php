@extends("admin.shared._AdminLayout",["title"=>trans("admin.ads"),"AjaxToken"=>true])

@section("pageHeader")

    @include("admin.shared._PageHeader",
    ["pageTitle"=>trans("admin.adsList"),
    "pageHeaderLinks"=>[
    ],
     "pageHeaderActive"=>trans("admin.ads"),

    ])



@endsection

@section("body")
    {!! AdminHelper::TempData("msg") !!}
    @include("admin.hm_ads._list")

@endsection
@push("script")
    <script src="/admin_assets/custom/datatables/hm_ads.js"></script>
@endpush
