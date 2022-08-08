@extends("admin.shared._AdminLayout",["title"=>"ویرایش محصول "])

@section("pageHeader")
    @include("admin.shared._PageHeader",
    ["pageTitle"=>"ویرایش محصول ",
    "pageHeaderLinks"=>[
         ["title"=>"  محصول","link"=>"/admin/product"]
    ],
     "pageHeaderActive"=>"ویرایش  محصول"
    ])
@endsection

@section("body")
    <?php
    $post_meta = collect($product->post_meta);
    $price = $post_meta->firstWhere("meta_key", "price")->meta_value;
    $discount = $post_meta->firstWhere("meta_key", "discount")->meta_value;
    ?>
    <form id="frmProduct" method="post" class="validate" action="/admin/product/{{$product->id}}">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="id" value="{{$product->id}}">
        <input type="hidden" name="ordering" value="{{$product->ordering}}">

        <div class="row">
            <div class="col-lg-8">
                {{csrf_field()}}
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title"> ویرایش محصول</h5>
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
                                   placeholder=" عنوان " required="required" value="{{$product->title}}">
                            <label class="validation-error-label error" hidden="hidden" for="title"></label>

                        </div>

                        <div class="form-group">
                        <textarea id="content" name="content" class="form-control"
                                  placeholder="">{{$product->content}}</textarea>
                            <label class="validation-error-label error" hidden="hidden" for="content"></label>

                        </div>

                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>قیمت:</label>
                                <input id="price" name="price" type="text" class="form-control"
                                       placeholder=" قیمت " value="{{$price}}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>تخفیف:</label>
                                <input id="discount" name="discount" type="text" class="form-control"
                                       placeholder=" تخفیف " value="{{$discount}}">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label>توضیحات:</label>
                            <textarea name="excerpt" maxlength="255" class="form-control maxlength"
                                      placeholder=" توضیحات مختصر ">{{$product->excerpt}}</textarea>
                        </div>
                    </div>

                </div>
                <div class="card">
                    <div class="card-header header-elements-inline">
                        کلمات کلیدی
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            @include("admin.post._meta_tag",["values"=>$product->keywords])
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
                        <div class="form-group">
                            <label>دسته بندی :</label>
                            @include("admin.product._category",["categories"=>$categories,"category_id"=>$product->category_id])

                        </div>
                        @if(language!=null)
                            <div class="form-group">
                                <label>زبان : </label>

                                <select name="language" id="language" class="form-control select" required="required">
                                    <option value="">انتخاب کنید</option>
                                    @foreach(language as $lang)
                                        <option
                                            @if($product->language===$lang["name"]) selected="selected"
                                            @endif value="{{$lang["name"]}}"> {{$lang["title"]}}</option>
                                    @endforeach
                                </select>
                                <label class="validation-error-label error" hidden="hidden" for="language"></label>

                            </div>
                        @endif
                        <div class="form-group">
                            <label>انتخاب وضعیت :</label>
                            <label>فعال :
                                <input @if($product->status===1)  checked="checked" @endif type="radio" name="status"
                                       class="styled" value="1">
                            </label>
                            <label>غیر فعال :
                                <input @if($product->status===0)  checked="checked" @endif type="radio" name="status"
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
                            <label class="display-block">تصویر شاخص محصول:</label>
                            <div class="thumb">
                                <img id="img_thumb"
                                     src="@if($product->thumb!=null) {{$product->thumb}} @else/admin_assets/assets/images/placeholder.jpg @endif"
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
                            <input value="{{$product->thumb}}" id="thumb"
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
    <script src="/admin_assets/custom/forms/product.js"></script>
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

