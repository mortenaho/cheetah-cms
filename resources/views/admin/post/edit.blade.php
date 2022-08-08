@extends("admin.shared._AdminLayout",["title"=>"ویرایش نوشته "])

@section("pageHeader")
    @include("admin.shared._PageHeader",
    ["pageTitle"=>"ویرایش نوشته ",
    "pageHeaderLinks"=>[
         ["title"=>"  نوشته","link"=>"/admin/post"]
    ],
     "pageHeaderActive"=>"ویرایش  نوشته"
    ])
@endsection

@section("body")
    <form id="frmPost" method="post" class="validate" action="/admin/post/{{$post->id}}">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="id" value="{{$post->id}}">
        <input type="hidden" name="ordering" value="{{$post->ordering}}">
        <div class="row">
            <div class="col-lg-8">
                {{csrf_field()}}
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title"> ویرایش نوشته</h5>
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
                                   placeholder=" عنوان " required="required" value="{{$post->title}}">
                            <label class="validation-error-label error" hidden="hidden" for="title"></label>

                        </div>

                        <div class="form-group">
                        <textarea id="content" name="content" class="form-control" rows="18"
                                  placeholder="">{{$post->content}}</textarea>
                            <label class="validation-error-label error" hidden="hidden" for="content"></label>

                        </div>

                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label>توضیحات:</label>
                            <textarea name="excerpt" maxlength="255" class="form-control maxlength"
                                      placeholder=" توضیحات مختصر ">{{$post->excerpt}}</textarea>
                        </div>
                    </div>

                </div>
                <div class="card">

                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">  کلمات کلیدی</h5>

                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            @include("admin.post._meta_tag",["values"=>$post->keywords])
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
                            @include("admin.post._category",["categories"=>$categories,"category_id"=>$post->category_id])
                            <label class="validation-error-label error" hidden="hidden" for="category_id"></label>

                        </div>
                        @if(language!=null)
                            <div class="form-group">
                                <label>زبان : </label>

                                <select name="language" id="language" class="form-control select" required="required">
                                    <option value="">انتخاب کنید</option>
                                    @foreach(language as $lang)
                                        <option
                                            @if($post->language===$lang["name"]) selected="selected"
                                            @endif value="{{$lang["name"]}}"> {{$lang["title"]}}</option>
                                    @endforeach
                                </select>
                                <label class="validation-error-label error" hidden="hidden" for="language"></label>

                            </div>
                        @endif
                        <div class="form-group">
                            <label>انتخاب وضعیت :</label>
                            <label>فعال :
                                <input @if($post->status===1)  checked="checked" @endif type="radio" name="status"
                                       class="styled" value="1">
                            </label>
                            <label>غیر فعال :
                                <input @if($post->status===0)  checked="checked" @endif type="radio" name="status"
                                       class="styled" value="0">
                            </label>
                        </div>
                        <div class="form-group">
                            <label>قابل نمایش برای اعضا :
                                <input @if($post->is_login===1)  checked="checked" @endif value="1" type="checkbox"
                                       name="is_login"
                                       class="styled">
                            </label>

                        </div>
                        <div class="form-group">
                            <label>نظرات فعال باشد :
                                <input @if($post->has_comment===1)  checked="checked" @endif value="1" type="checkbox"
                                       name="has_comment" class="styled">
                            </label>

                        </div>
                        <div class="form-group">
                            <label class="col-lg-12">قرار دادن رمز :
                                <input placeholder="رمز" type="password" name="password" class="form-control "
                                       value="{{$post->password}}">
                            </label>

                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="p-5">
                            <button type="submit" class="btn btn-success legitRipple"> ذخیره <i
                                    class="icon-arrow-left13 position-right"></i></button>
                            <a href="/admin/post" class="btn btn-primary btn-labeled btn-labeled-left btn-lg" style="margin-left: 20px" ><b><i class="icon-list2"></i></b>بر گشت به لیست</a>
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
                                <a class="list-icons-item" data-action="remove"></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="display-block">تصویر شاخص نوشته:</label>
                            <div class="thumb">
                                <img id="img_thumb"
                                     src="@if($post->thumb!=null) {{$post->thumb}} @else/admin_assets/assets/images/placeholder.jpg @endif"
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
                            <input value="{{$post->thumb}}" id="thumb"
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
    <script src="/admin_assets/custom/forms/post.js"></script>
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
@endpush

