@extends("admin.shared._AdminLayout",["title"=>"ویرایش دانلود "])

@section("pageHeader")
    @include("admin.shared._PageHeader",
    ["pageTitle"=>"ویرایش دانلود ",
    "pageHeaderLinks"=>[
         ["title"=>"  دانلود","link"=>"/admin/download"]
    ],
     "pageHeaderActive"=>"ویرایش  دانلود"
    ])
@endsection
<?php
$post_meta = collect($download->post_meta);

$project = isset($post_meta) && count($post_meta) > 0 ? $post_meta->firstWhere("meta_key", "project")->meta_value : "";
$customer = isset($post_meta) && count($post_meta) > 0 ? $post_meta->firstWhere("meta_key", "customer")->meta_value : "";
$start_date = isset($post_meta) && count($post_meta) > 0 ? $post_meta->firstWhere("meta_key", "start_date")->meta_value : "";
$end_date = isset($post_meta) && count($post_meta) > 0 ? $post_meta->firstWhere("meta_key", "end_date")->meta_value : "";
$project_status = isset($post_meta) && count($post_meta) > 0 ? $post_meta->firstWhere("meta_key", "project_status")->meta_value : "";
?>
@section("body")
    <form id="frmdownload" method="post" class="validate" action="/admin/download/{{$download->id}}">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="id" value="{{$download->id}}">
        <input type="hidden" name="ordering" value="{{$download->ordering}}">
        <div class="row">
            <div class="col-lg-8">
                {{csrf_field()}}
                <div class="card">


                    <div class="card-header header-elements-inline">
                        <h5 class="card-title"> ویرایش دانلود </h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                                {{--                                <a class="list-icons-item" data-action="remove"></a>--}}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="form-group">
                            <label>عنوان :</label>
                            <input id="title" name="title" type="text" class="form-control"
                                   placeholder=" عنوان " required="required" value="{{$download->title}}">
                            <label class="validation-error-label error" hidden="hidden" for="title"></label>

                        </div>

                        <div class="form-group">
                        <textarea id="content" name="content" class="form-control"
                                  placeholder="">{{$download->content}}</textarea>
                            <label class="validation-error-label error" hidden="hidden" for="content"></label>

                        </div>

                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>پروژه :</label>
                                    <input id="project" name="project" type="text" class="form-control"
                                           placeholder=" پروژه " value="{{$project}}">
                                    <label class="validation-error-label error" hidden="hidden" for="project"></label>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>مشتری :</label>
                                    <input id="customer" name="customer" type="text" class="form-control"
                                           placeholder=" مشتری " value="{{$customer}}">
                                    <label class="validation-error-label error" hidden="hidden" for="customer"></label>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>تاریخ شروع :</label>
                                    <input id="start_date" name="start_date" type="text" class="form-control"
                                           placeholder=" تاریخ شروع " value="{{$start_date}}">
                                    <label class="validation-error-label error" hidden="hidden"
                                           for="start_date"></label>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>تاریخ پایان :</label>
                                    <input id="end_date" name="end_date" type="text" class="form-control"
                                           placeholder=" تاریخ پایان " value="{{$end_date}}">
                                    <label class="validation-error-label error" hidden="hidden" for="end_date"></label>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label>توضیحات:</label>
                            <textarea name="excerpt" maxlength="255" class="form-control maxlength"
                                      placeholder=" توضیحات مختصر ">{{$download->excerpt}}</textarea>
                        </div>
                    </div>

                </div>

            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title"> انتشار </h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>دسته بندی :</label>
                            @include("admin.download._category",["categories"=>$categories,"category_id"=>$download->category_id])

                        </div>
                        @if(language!=null)
                            <div class="form-group">
                                <label>زبان : </label>

                                <select name="language" id="language" class="form-control select" required="required">
                                    <option value="">انتخاب کنید</option>
                                    @foreach(language as $lang)
                                        <option
                                            @if($download->language===$lang["name"]) selected="selected"
                                            @endif value="{{$lang["name"]}}"> {{$lang["title"]}}</option>
                                    @endforeach
                                </select>
                                <label class="validation-error-label error" hidden="hidden" for="language"></label>

                            </div>
                        @endif
                        <div class="form-group">
                            <label>وضعیت پروژه :</label>
                            <select class="form-control select" name="project_status">
                                <option @if($project_status==="کامل") selected @endif value="کامل">کامل</option>
                                <option @if($project_status==="در حال ساخت") selected @endif value="در حال ساخت">در حال
                                    ساخت
                                </option>
                                <option @if($project_status==="معلق") selected @endif value="معلق">معلق</option>
                            </select>

                            <label class="validation-error-label error" hidden="hidden" for="end_date"></label>

                        </div>
                        <div class="form-group">
                            <label>انتخاب وضعیت :</label>
                            <label>فعال :
                                <input @if($download->status===1)  checked="checked" @endif type="radio" name="status"
                                       class="styled" value="1">
                            </label>
                            <label>غیر فعال :
                                <input @if($download->status===0)  checked="checked" @endif type="radio" name="status"
                                       class="styled" value="0">
                            </label>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="p-5">
                            <button type="submit" class="btn btn-primary legitRipple"> ذخیره <i
                                    class="icon-arrow-left13 position-right"></i></button>
                        </div>

                    </div>
                </div>
                <div class="card">

                    <div class="card-header header-elements-inline">
                        <h5 class="card-title"> ویرایش تصویر شاخص </h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="display-block">تصویر شاخص دانلود:</label>
                            <div class="thumb">
                                <img id="img_thumb"
                                     src="@if($download->thumb!=null) {{$download->thumb}} @else/admin_assets/assets/images/placeholder.jpg @endif"
                                     alt="">
                                <div class="caption-overflow">
										<span>
										<a data-naw3-file-type="image" data-naw3-set-to="thumb"
                                           class="btn btn-primary naw3-select-file legitRipple">
                            <i class="fa fa-picture-o"></i> انتخاب فایل</a>
                                            <a
                                                data-naw3-file-type="image"
                                                data-naw3-set-to="thumb"
                                                class="btn btn-danger naw3-delete-file legitRipple">
                            <i class="fa fa-picture-o"></i> حذف فایل
                        </a>
                                        </span>
                                </div>
                            </div>
                            <input value="{{$download->thumb}}" id="thumb"
                                   class="form-control" type="hidden" name="thumb">
                            {!! AdminHelper::helpBlock("image") !!}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </form>
@endsection
@push("style")
    <link rel="stylesheet" href="/plugin/persianDatePicker/persianDatepicker-default.css">
@endpush
@push("script")
    <script src="/plugin/persianDatePicker/persianDatepicker.min.js"></script>
    <script src="/admin_assets/custom/forms/download.js"></script>

    @include("admin.shared._show_error_validation",["errors"=>$errors])
    <script type="text/javascript" src="/admin_assets/ckeditor/ckeditor.js"></script>
    <script>

        var options = {
            language: 'fa',
            filebrowserImageBrowseUrl: '/filemanager?type=Images',
            filebrowserImageUploadUrl: '/filemanager/upload?type=Images&_token={{csrf_token()}}',
            filebrowserBrowseUrl: '/filemanager?type=Files',
            filebrowserUploadUrl: '/filemanager/upload?type=Files&_token={{csrf_token()}}'
        };
        var editor = CKEDITOR.replace("content", options);

        editor.on('change', function (evt) {
            // getData() returns CKEditor's HTML content.
            console.log('Total bytes: ' + evt.editor.getData().length);
            $("#content").val(evt.editor.getData());
        });
        $("#start_date,#end_date").persianDatepicker();
    </script>
@endpush

