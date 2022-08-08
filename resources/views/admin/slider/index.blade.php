@extends("admin.shared._AdminLayout",["title"=>"اسلایدر","AjaxToken"=>true])

@section("pageHeader")

    @include("admin.shared._PageHeader",
    ["pageTitle"=>"اسلایدر",
    "pageHeaderLinks"=>[
    ],
     "pageHeaderActive"=>"اسلایدر",
     "InsertLink"=>"/admin/Slider/create"
    ])

@endsection

@section("body")
    {!! AdminHelper::TempData("msg") !!}
    @include("admin.slider._list")

@endsection
@push("script")
    <script src="/admin_assets/custom/datatables/slider.js"></script>
    <script src="/admin_assets/custom/custom_ordering.js"></script>
@endpush
