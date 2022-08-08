@extends("admin.shared._AdminLayout",["title"=>"محصول","AjaxToken"=>true])

@section("pageHeader")

    @include("admin.shared._PageHeader",
    ["pageTitle"=>"محصول",
    "pageHeaderLinks"=>[
    ],
     "pageHeaderActive"=>"محصول",
     "InsertLink"=>"/admin/product/create"
    ])
@endsection
@section("body")
    {!! AdminHelper::TempData("msg") !!}
    @include("admin.product._list")

@endsection
@push("script")
    <script src="/admin_assets/custom/datatables/product.js"></script>
    <script src="/admin_assets/custom/ordering.js"></script>

@endpush
