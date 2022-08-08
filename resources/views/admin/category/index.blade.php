@extends("admin.shared._AdminLayout",["title"=>"دسته بندی","AjaxToken"=>true])

@section("pageHeader")

    @include("admin.shared._PageHeader",
    ["pageTitle"=>"دسته بندی",
    "pageHeaderLinks"=>[
    ],
     "pageHeaderActive"=>"دسته بندی",
     "InsertLink"=>"/admin/category/create"
    ])
@endsection
@section("body")
    {!! AdminHelper::TempData("msg") !!}
    @include("admin.category._list")

@endsection
@push("script")
    <script>
        var  type="{{$type}}";
    </script>
    <script src="/admin_assets/custom/datatables/category.js"></script>

@endpush
