@extends("admin.shared._AdminLayout",["title"=>"فایل پیوست","AjaxToken"=>true])

@section("pageHeader")

    @include("admin.shared._PageHeader",
    ["pageTitle"=>"فایل پیوست",
    "pageHeaderLinks"=>[
    ],
     "pageHeaderActive"=>"فایل پیوست",
     "InsertLink"=>"/admin/attachment/create/$type_id"
    ])



@endsection

@section("body")
    {!! AdminHelper::TempData("msg") !!}
    <input type="hidden" name="type_id" value="{{$type_id}}">
    @include("admin.attachment._list")

@endsection
@push("script")
    <script src="/admin_assets/custom/datatables/attachment.js"></script>
    <script src="/admin_assets/custom/custom_ordering.js"></script>
@endpush
