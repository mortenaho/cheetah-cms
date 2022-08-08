@extends("admin.shared._AdminLayout",["title"=>"دسته بندی","AjaxToken"=>true])

@section("pageHeader")

    @include("admin.shared._PageHeader",
    ["pageTitle"=>"دسته بندی",
    "pageHeaderLinks"=>[
    ],
     "pageHeaderActive"=>"دسته بندی",
     "InsertLink"=>"/admin/ec/category/create"
    ])
@endsection
@section("body")
    {!! AdminHelper::TempData("msg") !!}
    @include("e_shopping::admin.category._list")


@endsection
@push("script")

    <script src="{{plugin_assets('e_shopping/public/js/admin/datatable/category.js')}}"></script>

@endpush
