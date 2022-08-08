@extends("admin.shared._AdminLayout",["title"=>"گالری","AjaxToken"=>true])

@section("pageHeader")

    <?php  $link_insert = "/admin/gallery/create";
    if ($parent > 0)
        $link_insert = $link_insert . "/$parent"
    ?>
    @include("admin.shared._PageHeader",
    ["pageTitle"=>"گالری",
    "pageHeaderLinks"=>[
    ],
     "pageHeaderActive"=>"گالری",
     "InsertLink"=>"$link_insert"
    ])



@endsection

@section("body")
    {!! AdminHelper::TempData("msg") !!}
    @include("admin.gallery._list",
    ["InsertLink"=>"$link_insert"]
)

@endsection
@push("script")
    <script type="text/javascript">
        var param ={{$parent}};
    </script>
    <script src="/admin_assets/custom/datatables/gallery.js"></script>
    <script src="/admin_assets/custom/custom_ordering.js"></script>
@endpush
