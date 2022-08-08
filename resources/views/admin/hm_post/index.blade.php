@extends("admin.shared._AdminLayout",["title"=>trans("admin.admin.posts"),"AjaxToken"=>true])

@section("pageHeader")

    @include("admin.shared._PageHeader",
    ["pageTitle"=>trans("admin.posts"),
    "pageHeaderLinks"=>[
    ],
     "pageHeaderActive"=>trans("admin.posts"),

    ])



@endsection

@section("body")
    {!! AdminHelper::TempData("msg") !!}
    @include("admin.hm_post._list")

@endsection
@push("script")
    <script src="/admin_assets/custom/datatables/hm_post.js"></script>
@endpush
