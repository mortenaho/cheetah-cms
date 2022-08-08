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
                                <div class="panel panel-white">
                                    <div class="panel-heading">
                                        <h6 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse"
                                               data-parent="#accordion-controls"
                                               href="#accordion-controls-group-{{$item->name}}"
                                               aria-expanded="false">{{$item->title}}</a>


                                            <a class="heading-elements-toggle"><i class="icon-more"></i></a>
                                        </h6>

                                        <div class="heading-elements">
                                            <ul class="icons-list">
                                                <li><a data-action="add"><i class="icon-arrow-left8"></i></a></li>
                                                <li><a data-action="move" class="ui-sortable-handle"></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div id="accordion-controls-group-{{$item["name"]}}"
                                         class="panel-collapse collapse "
                                         aria-expanded="false" style="height: 0px;">
                                        <div class="panel-body">
                                            <div class="tabbable">
                                                <ul class="nav nav-tabs nav-tabs-basic">
                                                    <li class="active"><a href="#solid-tab1-{{$item["name"]}}"
                                                                          data-toggle="tab">دیدن همه</a></li>
                                                    <li><a href="#solid-tab2-{{$item["name"]}}"
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
                                                                       placeholder="عنوان ">
                                                            </div>
                                                        </div>
                                                        <div class="form-group" id="load-in-{{$item["name"]}}">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            @endforeach


                            <div class="card">
                                <div class="card-header">
                                    <h6 class="card-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion-controls"
                                           href="#accordion-controls-group-link"
                                           aria-expanded="false">پیوند های دلخواه</a>
                                        <a class="heading-elements-toggle"><i class="icon-more"></i></a></h6>

                                    <div class="heading-elements">
                                        <ul class="icons-list">
                                            <li><a data-action="move" class="ui-sortable-handle"></a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div id="accordion-controls-group-link" class="panel-collapse collapse"
                                     aria-expanded="false" style="height: 0px;">
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label>صفحه های ثابت:</label>
                                            <select name="pages" id="cmb-pages" class="bootstrap-select">
                                                <option value="">لینک دلخواه</option>
                                                <option value="/">خانه</option>
                                                <option value="/about-us">درباره ما</option>
                                                <option value="/contact-us">تماس با ما</option>
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
                    <div class="card-body" style="direction: ltr !important;text-align: left;">
                        {{--<p>گزینه&zwnj;های دلخواه خود را بکشید و مرتب کنید. برای دیدن گزینه&zwnj;های اضافی روی پیکان کنار هر--}}
                        {{--گزینه کلیک کنید.</p>--}}
                        <ol class="sortable ui-sortable mjs-nestedSortable-branch mjs-nestedSortable-expanded">

                            @include("admin.menu._menu",["menu"=>$menu])
                        </ol>
                    </div>
                </div>

            </div>
        </div>
    </form>


@endsection


<style>
    .mjs-nestedSortable-leaf {
        padding: 4px;
        border: 1px solid #aaa;
        margin: 4px;
    }

    .editable-render-response {
        margin-left: 10px !important;
    }

    .btn-delete-menu-item {
        margin-right: 10px;
    }
    .mjs-nestedSortable-branch{
        padding: 4px;
        border: 1px solid #aaa;
        margin: 4px;
    }

    .editable-click, a.editable-click, .editable-click:hover, a.editable-click:hover {
        border-bottom: 1px dashed #1E88E5;
    }
    .editable {
        background-color: transparent;
    }
</style>

@push("script")

    @include("admin.shared._show_error_validation",["errors"=>$errors])

    <script type="text/javascript" src="/plugin/jquery-ui.min.js"></script>
    <script type="text/javascript" src="/admin_assets/global_assets/js/plugins/forms/editable/editable.min.js"></script>
    <script type="text/javascript" src="/plugin/jquery-sortable.js"></script>
    <script type="text/javascript" src="/plugin/jquery.ui.nestedSortable.js"></script>
    <script type="text/javascript" src="/admin_assets/custom/forms/menu.js"></script>

@endpush

