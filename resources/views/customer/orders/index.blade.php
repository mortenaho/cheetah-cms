@extends("customer.shared._CustomerLayout",["title"=>"سفارشات","AjaxToken"=>true])

@section("pageHeader")

    @include("customer.shared._PageHeader",
    ["pageTitle"=>"سفارشات",
    "pageHeaderLinks"=>[
    ],
     "pageHeaderActive"=>"سفارشات",
     "InsertLink"=>"/customers/orders/create"
    ])

@endsection

@section("body")
    {!! AdminHelper::TempData("msg") !!}
    @include("customer.orders._list")

@endsection
@push("script")
    <script src="/js/customers/datatables/orders.js"></script>
    <script src="/admin_assets/custom/custom_ordering.js"></script>
@endpush
