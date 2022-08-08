@extends("admin.shared._AdminLayout",["title"=>"افزودن برگه جدید"])

@section("pageHeader")
    @include("admin.shared._PageHeader",
    ["pageTitle"=>"افزودن برگه جدید",
    "pageHeaderLinks"=>[
         ["title"=>"  برگه","link"=>"/admin/pages"]
    ],
     "pageHeaderActive"=>"افزودن  برگه"
    ])
@endsection

@section("body")
    <form id="frmPage" method="post" class="validate" action="/admin/pages">
        <div class="row">
            <div class="col-lg-8">
                {{csrf_field()}}
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title"> افزودن برگه</h5>
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
                                   placeholder=" عنوان " required="required" value="{{old("title")}}">
                            <label class="validation-error-label error" hidden="hidden" for="title"></label>
                        </div>
                        <div class="form-group">
                        <textarea id="content" name="content" class="form-control" rows="14"
                                  placeholder="">{{old("content")}}</textarea>
                            <label class="validation-error-label error" hidden="hidden" for="content"></label>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>عنوان قالب:</label>
                                <input id="template" name="template" type="text" class="form-control" style="direction: ltr;text-align: left"
                                       placeholder=" عنوان قالب " value="{{old("template")}}">
                            </div>
                        </div>

                    </div>

                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label>توضیحات:</label>
                            <textarea name="excerpt" maxlength="255" class="form-control maxlength"
                                      placeholder=" توضیحات مختصر ">{{old("excerpt")}}</textarea>
                        </div>
                    </div>

                </div>
                <div class="card">
                    <div class="card-header header-elements-inline">
                        کلمات کلیدی
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            @include("admin.post._meta_tag")
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
                                <a class="list-icons-item" data-action="remove"></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        {{--                        <div class="form-group">--}}
                        {{--                            <label>دسته بندی :</label>--}}
                        {{--                            {!! $htmlCategory !!}--}}
                        {{--                            <label class="validation-error-label error" hidden="hidden" for="category_id"></label>--}}

                        {{--                        </div>--}}

                        <div class="form-group">
                            <label>محتوای برگه:</label>

                            <textarea name="page_content" maxlength="1024" class="form-control maxlength" rows="6"
                                      placeholder="محتوای برگه ">{{old("page_content")}}</textarea>
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
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="p-5">
                            <button type="submit" class="btn btn-primary legitRipple"> ذخیره <i
                                    class="icon-arrow-left13 position-right"></i></button>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title"> افزودن تصویر شاخص </h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                                <a class="list-icons-item" data-action="remove"></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="display-block">تصویر شاخص برگه:</label>
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
        </div>

    </form>
@endsection
@push("script")

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

    </script>
    <script src="/admin_assets/custom/forms/page.js"></script>
@endpush

