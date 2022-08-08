@extends("admin.shared._AdminLayout",["title"=>"گواهینامه ها","AjaxToken"=>true])

@section("pageHeader")

    @include("admin.shared._PageHeader",
    ["pageTitle"=>"گواهینامه ها",
    "pageHeaderLinks"=>[
    ],
     "pageHeaderActive"=>"گواهینامه ها",
     "InsertLink"=>"/admin/certificate/create"
    ])
@endsection
@section("body")
    {!! AdminHelper::TempData("msg") !!}
    @include("admin.certificate._list")

@endsection
@push("script")
    <script src="/admin_assets/custom/datatables/certificate.js"></script>
    <script src="/admin_assets/custom/ordering.js"></script>
@endpush
