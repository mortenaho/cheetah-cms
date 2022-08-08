@extends("admin.shared._AdminLayout",["title"=>"افزودن منو جدید","AjaxToken"=>true])

@section("pageHeader")
    @include("admin.shared._PageHeader",
    ["pageTitle"=>"افزودن منو جدید",
    "pageHeaderLinks"=>[
         ["title"=>"  منو","link"=>"/admin/menu"]
    ],
     "pageHeaderActive"=>"افزودن  منو"
    ])
@endsection

@section("body")

    <form id="frmMenu" method="post" class="validate" action="/admin/menu">
        <div class="row">
            <div class="col-lg-4">
                {{csrf_field()}}

                <input type="hidden" id="language" value="{{$_GET["lang"]}}">
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title"> افزودن گزینه‌های منو </h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                                {{--                                <a class="list-icons-item" data-action="remove"></a>--}}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="panel-group accordion-sortable content-group-lg ui-sortable"
                             id="accordion-controls">
                            @foreach($types as $item)
                                <div class="card">
                                    <div class="card-header header-elements-inline">
                                        <h5 class="card-title">
                                            <a class="collapsed" data-toggle="collapse"
                                               data-parent="#accordion-controls"
                                               href="#accordion-controls-group-{{$item->name}}"
                                               aria-expanded="false">{{$item->title}}</a>

                                            <a class="heading-elements-toggle"><i class="icon-more"></i></a>
                                        </h5>
                                        <div class="header-elements">
                                            <div class="list-icons">
                                                <a data-action="add"><i class="icon-arrow-left8"></i></a>
                                                <a data-action="move" class="ui-sortable-handle"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="accordion-controls-group-{{$item["name"]}}"
                                         class="card card-collapse collapse "
                                         aria-expanded="false" style="height: 0px;">
                                        <div class="card-body">

                                                <ul class="nav nav-tabs nav-tabs-basic">
                                                    <li class="nav-item">
                                                        <a class="nav-link rounded-top active" href="#solid-tab1-{{$item["name"]}}"
                                                           data-toggle="tab">دیدن همه</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link rounded-top" href="#solid-tab2-{{$item["name"]}}"
                                                           data-toggle="tab">جستجو</a>
                                                    </li>
                                                </ul>
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="solid-tab1-{{$item["name"]}}">
                                                        <div class="form-group">
                                                            @include("admin.menu._category",["post_type"=>$item["name"],"language"=>"$_GET[lang]"])
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="solid-tab2-{{$item["name"]}}">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                            <span id="spinner-{{$item["name"]}}" style="display: none"
                                                                  class="input-group-addon"> <i
                                                                    class="icon-spinner6 spinner position-left"></i></span>
                                                                <input type="text" data-type="{{$item["name"]}}"
                                                                       id="post_title" name="post_title"
                                                                       class="form-control"
                                                                       placeholder="عنوان " />
                                                            </div>
                                                        </div>
                                                        <div class="form-group" id="load-in-{{$item["name"]}}">

                                                        </div>
                                                    </div>
                                                </div>



                                        </div>
                                    </div>
                                </div>
                            @endforeach


                            <div class="card">

                                <div class="card-header header-elements-inline">

                                    <h5 class="card-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion-controls"
                                           href="#accordion-controls-group-link"
                                           aria-expanded="false">پیوند های دلخواه</a>
                                        <a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
                                    <div class="header-elements">
                                        <div class="list-icons">
                                            <a data-action="move" class="ui-sortable-handle"></a>
                                        </div>
                                    </div>
                                </div>
                                <div id="accordion-controls-group-link" class="panel-collapse collapse"
                                     aria-expanded="false" style="height: 0px;">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>صفحه های ثابت:</label>
                                            <select name="pages" id="cmb-pages" class="bootstrap-select form-control">
                                                <option value="">لینک دلخواه</option>
                                                <option value="/">خانه</option>
                                                <option value="/about-us">درباره ما</option>
                                                <option value="/contact-us">تماس با ما</option>
                                                <option value="/shop">فروشگاه</option>
                                                @foreach(post_type as $item)
                                                    <option value="{{$item["link"]}}">{{$item["title"]}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>عنوان پیوند:</label>
                                            <input type="text" id="title" name="title" class="form-control"
                                                   placeholder="عنوان پیوند">
                                        </div>

                                        <div class="form-group">
                                            <label>نشانی:</label>
                                            <input dir="ltr" type="text" class="form-control" id="link_address"
                                                   name="link_address" placeholder="http://www.naw3.com" value="">
                                            <label class="validation-error-label error" hidden="hidden"
                                                   for="link_address"></label>

                                        </div>
                                        <button id="btn-add-menu-link" type="button"
                                                class="btn btn-primary legitRipple"><i
                                                class="icon-add"></i>
                                            افزودن به منو
                                        </button>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-8">

                <div class="card">

                    <div class="card-header header-elements-inline">
                        <h5 class="card-title"> ساختار منو </h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                                {{--                                <a class="list-icons-item" data-action="remove"></a>--}}
                            </div>
                        </div>
                    </div>
                    <div class="card-body" id="sortable_menu_list" style="direction: ltr !important;text-align: left;">
                        {{--<p>گزینه&zwnj;های دلخواه خود را بکشید و مرتب کنید. برای دیدن گزینه&zwnj;های اضافی روی پیکان کنار هر--}}
                        {{--گزینه کلیک کنید.</p>--}}
                        <ol class="sortable ui-sortable mjs-nestedSortable-branch mjs-nestedSortable-expanded">

                            @include("admin.menu._menu",["menu"=>$menu])
                        </ol>
                    </div>
                    <div class="card-footer text-center">
                        <button type="button" onclick="saveMenu();" class="btn btn-success legitRipple">  <i
                                class="icon-floppy-disk position-right mr-2"></i>ذخیره</button>
                        <a href="/admin/menu" class="btn bg-pink-400">
                            <i class="icon-close2 btn-danger mr-2"></i>
                            لغو
                        </a>
                    </div>

                </div>

            </div>
        </div>
    </form>


@endsection


<style>
    .mjs-nestedSortable-leaf {
        padding: 4px;
        /*border: 1px solid #aaa;*/
        margin: 4px;

    }
    .mjs-nestedSortable-leaf > .panel-heading,.mjs-nestedSortable-expanded >.panel-heading {
       background-color: #0c4f7c;
    }
    .editable-render-response {
        margin-left: 10px !important;
        color: #fff8f8;
    }

    .btn-delete-menu-item {
        margin-right: 10px;
        margin-left: 10px;
    }

    .mjs-nestedSortable-branch {
        padding: 4px;
        /*border: 1px solid #aaa;*/
        margin: 4px;
    }

    .editable-click, a.editable-click, .editable-click:hover, a.editable-click:hover {
        border-bottom: 1px dashed #1E88E5;
    }

    .editable {
        background-color: transparent;
    }

    .panel-heading {
        position: relative;
        padding-top: 10px;
        padding-bottom: 10px;
        border-top-left-radius: 3px;
        border-top-right-radius: 3px;
    }
    .panel {
        margin-bottom: 10px;
        border-width: 0;
        color: #333333;
        -webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
    }
</style>

@push("script")

    @include("admin.shared._show_error_validation",["errors"=>$errors])
    <script type="text/javascript" src="/plugin/jquery-ui.min.js"></script>
    <script type="text/javascript" src="/plugin/jquery-sortable.js"></script>
    <script type="text/javascript" src="/plugin/jquery.ui.nestedSortable.js"></script>
    <script type="text/javascript" src="/admin_assets/global_assets/js/plugins/forms/editable/editable.min.js"></script>
    <script type="text/javascript" src="/admin_assets/custom/forms/menu_temp.js"></script>


@endpush

