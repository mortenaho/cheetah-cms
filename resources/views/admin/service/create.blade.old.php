@extends("admin.shared._AdminLayout",["title"=>"افزودن خدمات جدید"])

@section("pageHeader")
    @include("admin.shared._PageHeader",
    ["pageTitle"=>"افزودن خدمات جدید",
    "pageHeaderLinks"=>[
         ["title"=>"  خدمات","link"=>"/admin/service"]
    ],
     "pageHeaderActive"=>"افزودن  خدمات"
    ])
@endsection

@section("body")
    <form id="frmService" method="post"  class="validate" action="/admin/service">
        <div class="col-lg-8">
            {{csrf_field()}}
            <div class="panel panel-white">
                <div class="panel-heading">
                    <h5 class="panel-title"> افزودن خدمات جدید<a class="heading-elements-toggle"><i
                                class="icon-more"></i></a></h5>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="collapse"></a></li>
                            <li><a data-action="reload"></a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel-body">

                    <div class="form-group">
                        <label>عنوان :</label>
                        <input id="title" name="title" type="text" class="form-control"
                               placeholder=" عنوان " required="required" value="{{old("title")}}">
                        <label class="validation-error-label error" hidden="hidden" for="title"></label>

                    </div>

                    <div class="form-group">
                        <textarea id="content" name="content" class="form-control"
                                  placeholder="">{{old("content")}}</textarea>
                        <label class="validation-error-label error" hidden="hidden" for="content"></label>

                    </div>

                </div>
            </div>
            <div class="panel panel-white">
                <div class="panel-body">
                    <div class="form-group">
                        <label>توضیحات:</label>
                        <textarea name="excerpt" maxlength="255" class="form-control maxlength"
                                  placeholder=" توضیحات مختصر ">{{old("excerpt")}}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="panel panel-white">
                <div class="panel-heading">
                    <h5 class="panel-title"> انتشار<a class="heading-elements-toggle"><i
                                class="icon-more"></i></a></h5>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="collapse"></a></li>
                            <li><a data-action="reload"></a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label>دسته بندی :</label>
                        {!! $htmlCategory !!}
                        <label class="validation-error-label error" hidden="hidden" for="category_id"></label>

                    </div>
                    @if(language!=null)
                        <div class="form-group">
                            <label>زبان : </label>

                            <select name="language" id="language" class="form-control select" required="required">
                                <option value="">انتخاب کنید</option>
                                @foreach(language as $lang)
                                    <option value="{{$lang["name"]}}"> {{$lang["title"]}}</option>
                                @endforeach
                            </select>
                            <label class="validation-error-label error" hidden="hidden" for="language"></label>

                        </div>
                    @endif
                    <div class="form-group">
                        <label>انتخاب وضعیت :</label>
                        <label>فعال :
                            <input type="radio" name="status" class="styled" value="1" checked="checked">
                        </label>
                        <label>غیر فعال :
                            <input type="radio" name="status" class="styled" value="0">
                        </label>
                    </div>

                </div>
                <div class="panel-footer ">
                    <div class="p-5">
                        <button type="submit" class="btn btn-primary legitRipple"> ذخیره <i
                                class="icon-arrow-left13 position-right"></i></button>
                    </div>

                </div>
            </div>
            <div class="panel panel-white">
                <div class="panel-heading">
                    <h5 class="panel-title"> افزودن تصویر شاخص <a class="heading-elements-toggle"><i
                                class="icon-more"></i></a></h5>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="collapse"></a></li>
                            <li><a data-action="reload"></a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="display-block">تصویر شاخص خدمات:</label>
                        <div class="thumb">
                            <img id="img_thumb"
                                 src="/admin_assets/assets/images/placeholder.jpg"
                                 alt="">
                            <div class="caption-overflow">
										<span>
										<a data-naw3-file-type="image" data-naw3-set-to="thumb"
                                           class="btn btn-primary naw3-select-file legitRipple">
                            <i class="fa fa-picture-o"></i> انتخاب فایل
                        </a>
                                            <a
                                                data-naw3-file-type="image"
                                                data-naw3-set-to="thumb"
                                                class="btn btn-danger naw3-delete-file legitRipple">
                            <i class="fa fa-picture-o"></i> حذف فایل
                        </a>
                                        </span>
                            </div>
                        </div>
                        <input value="{{old("icon")}}" id="thumb"
                               class="form-control" type="hidden" name="thumb">


                        {!! AdminHelper::helpBlock("image") !!}
                    </div>
                </div>
            </div>
        </div>


    </form>
@endsection
@push("script")
    <script src="/admin_assets/custom/forms/service.js"></script>
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
     var editor=   CKEDITOR.replace("content", options);

        editor.on( 'change', function( evt ) {
            // getData() returns CKEditor's HTML content.
            console.log( 'Total bytes: ' + evt.editor.getData().length );
            $("#content").val(evt.editor.getData());
        });

    </script>
@endpush

