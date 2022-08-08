@extends("admin.shared._AdminLayout",["title"=>trans("admin.contact_us"),"AjaxToken"=>true])

@section("pageHeader")

    @include("admin.shared._PageHeader",
    ["pageTitle"=>trans("admin.contact_us"),
    "pageHeaderLinks"=>[
    ],
     "pageHeaderActive"=>trans("admin.contact_us"),
     "InsertLink"=>null
    ])
@endsection

@section("body")

    {!! AdminHelper::TempData("msg") !!}
    <div id="data-load">
        @include("admin.contact_us._list",["contacts"=>$contacts])
    </div>

@endsection
@push("script")
    <script src="/admin_assets/custom/contact_us.js"></script>
    <script>
        $("body").addClass("sidebar-main-hidden has-detached-left");
    </script>

@endpush
