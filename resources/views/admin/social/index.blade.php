@extends("admin.shared._AdminLayout",["title"=>"شبکه اجتماعی","AjaxToken"=>true])

@section("pageHeader")

    @include("admin.shared._PageHeader",
    ["pageTitle"=>"شبکه اجتماعی",
    "pageHeaderLinks"=>[
    ],
     "pageHeaderActive"=>"شبکه اجتماعی",
     "InsertLink"=>"/admin/Social/create"
    ])
@endsection
@section("body")
    {!! AdminHelper::TempData("msg") !!}
    @include("admin.social._list")

@endsection
@push("script")
    <script src="/admin_assets/custom/datatables/social.js"></script>
    <script src="/admin_assets/custom/custom_ordering.js"></script>
@endpush
