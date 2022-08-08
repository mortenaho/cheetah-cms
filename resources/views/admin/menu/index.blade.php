@extends("admin.shared._AdminLayout",["title"=>"منو","AjaxToken"=>true])

@section("pageHeader")

    @include("admin.shared._PageHeader",
    ["pageTitle"=>"منو",
    "pageHeaderLinks"=>[
    ],
     "pageHeaderActive"=>"منو",
     "InsertLink"=>"/admin/menu/create"
    ])
@endsection
@section("body")
    {!! AdminHelper::TempData("msg") !!}
    @include("admin.menu._list")

@endsection


@push("style")
    <link href="/admin_assets/global_assets/plugins/menu/bs-iconpicker/css/bootstrap-iconpicker.min.css" rel="stylesheet">
@endpush
@push("script")
    {{--<script src="/admin_assets/custom/datatables/menu.js"></script>--}}
    <script src='/admin_assets/global_assets/plugins/menu/bs-iconpicker/js/iconset/iconset-fontawesome-4.7.0.min.js'></script>
    <script src='/admin_assets/global_assets/plugins/menu/bs-iconpicker/js/bootstrap-iconpicker.js'></script>
    <script src='/admin_assets/global_assets/plugins/menu/jquery-menu-editor.min.js'></script>

    <script>
        jQuery(document).ready(function () {
            // menu items
            var strjson = [{"href":"http://home.com","icon":"fa fa-home","text":"Home", "target": "_top", "title": "My Home"},{"icon":"fa fa-bar-chart-o","text":"Opcion2"},{"icon":"fa fa-cloud-upload","text":"Opcion3"},{"icon":"fa fa-crop","text":"Opcion4"},{"icon":"fa fa-flask","text":"Opcion5"},{"icon":"fa fa-map-marker","text":"Opcion6"},{"icon":"fa fa-search","text":"Opcion7","children":[{"icon":"fa fa-plug","text":"Opcion7-1","children":[{"icon":"fa fa-filter","text":"Opcion7-1-1"}]}]}];
            //icon picker options
            var iconPickerOptions = {searchText: 'Buscar...', labelHeader: '{0} de {1} Pags.'};
            //sortable list options
            var sortableListOptions = {
                placeholderCss: {'background-color': 'cyan'}
            };

            var editor = new MenuEditor('myEditor', {listOptions: sortableListOptions, iconPicker: iconPickerOptions, labelEdit: 'Edit'});
            editor.setForm($('#frmEdit'));
            editor.setUpdateButton($('#btnUpdate'));

            $('#btnReload').on('click', function () {
                editor.setData(strjson);
            });

            $('#btnOut').on('click', function () {
                var str = editor.getString();
                $("#out").text(str);
            });

            $("#btnUpdate").click(function(){
                editor.update();
            });

            $('#btnAdd').click(function(){
                editor.add();
            });
        });
    </script>
@endpush
