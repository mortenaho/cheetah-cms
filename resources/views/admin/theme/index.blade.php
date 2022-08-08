@extends("admin.shared._AdminLayout",["title"=>trans("admin.siteTheme"),"AjaxToken"=>true])

@section("pageHeader")

    @include("admin.shared._PageHeader",
    ["pageTitle"=>trans("admin.siteTheme"),
    "pageHeaderLinks"=>[
    ],
     "pageHeaderActive"=>trans("admin.siteTheme"),
     "InsertLink"=>""
    ])
@endsection
@section("body")
    {!! AdminHelper::TempData("msg") !!}
    @include("admin.theme._list")

@endsection
@push("script")
    <script src="/admin_assets/custom/site_themes.js"></script>
<script>
    $(function() {

        // Switchery toggle
        var elems = Array.prototype.slice.call(document.querySelectorAll('.switch'));
        elems.forEach(function(html) {
            var switchery = new Switchery(html);
        });


        // Styled checkboxes/radios
        $('.styled').uniform();


        // Image lightbox
        $('[data-popup="lightbox"]').fancybox({
            padding: 3
        });

    });
</script>
@endpush
