@extends("admin.shared._AdminLayout",["title"=>"نوشته","AjaxToken"=>true])

@section("pageHeader")

    @include("admin.shared._PageHeader",
    ["pageTitle"=>"نوشته",
    "pageHeaderLinks"=>[
    ],
     "pageHeaderActive"=>"نوشته",
     "InsertLink"=>"/admin/post/create"
    ])
@endsection
@section("body")
    {!! AdminHelper::TempData("msg") !!}
    @include("admin.post._list")

@endsection
@push("script")
    <script src="/admin_assets/custom/datatables/post.js"></script>
@endpush
