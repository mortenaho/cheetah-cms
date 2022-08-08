@extends("admin.shared._AdminLayout",["title"=>"نظرات","AjaxToken"=>true])

@section("pageHeader")

    @include("admin.shared._PageHeader",
    ["pageTitle"=>"نظرات",
    "pageHeaderLinks"=>[
    ],
     "pageHeaderActive"=>"نظرات",
     "InsertLink"=>null
    ])
@endsection

@section("body")

    {!! AdminHelper::TempData("msg") !!}
    <div id="data-load">
        @include("admin.comment._list",["comment"=>$comment])
    </div>

@endsection
@push("script")
    <script src="/admin_assets/custom/comment.js"></script>
    <script>
        $("body").addClass("sidebar-main-hidden has-detached-left");
    </script>

@endpush
