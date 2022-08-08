@extends("admin.shared._AdminLayout",["title"=>"افزودن اطلاعات تماس جدید"])

@section("pageHeader")
    @include("admin.shared._PageHeader",
    ["pageTitle"=>"افزودن اطلاعات تماس جدید",
    "pageHeaderLinks"=>[
         ["title"=>"  اطلاعات تماس","link"=>"/admin/contact_info"]
    ],
     "pageHeaderActive"=>"افزودن  اطلاعات تماس"
    ])
@endsection

@section("body")
    <form id="frmContactInfo" method="post" class="validate" action="/admin/contact_info">
        <div class="row">
            <div class="col-lg-8">
                {{csrf_field()}}
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title"> افزودن اطلاعات تماس</h5>
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
                        <textarea id="content" name="content" class="form-control"
                                  placeholder="">{{old("content")}}</textarea>
                            <label class="validation-error-label error" hidden="hidden" for="content"></label>

                        </div>

                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label> ایمیل :</label>
                                <input id="email" name="email" type="email" class="form-control"
                                       placeholder=" ایمیل " value="{{old("email")}}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>تلفن ثابت 1:</label>
                                <input id="tel_1" name="tel_1" type="text" class="form-control"
                                       placeholder=" تلفن ثابت 1 " value="{{old("tel_1")}}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>تلفن ثابت 2:</label>
                                <input id="tel_2" name="tel_2" type="text" class="form-control"
                                       placeholder=" تلفن ثابت  " value="{{old("tel_2")}}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>تلفن همراه:</label>
                                <input id="mobile" name="mobile" type="text" class="form-control"
                                       placeholder=" تلفن همراه " value="{{old("mobile")}}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>فکس :</label>
                                <input id="fax" name="fax" type="text" class="form-control"
                                       placeholder=" فکس " value="{{old("fax")}}">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>آدرس :</label>
                                <input id="address" name="address" type="text" class="form-control"
                                       placeholder=" آدرس " value="{{old("address")}}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>کد پستی :</label>
                                <input id="longitude" name="longitude" type="text" class="form-control"
                                       placeholder=" کد پستی " value="{{old("postal_code")}}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>طول جغرافیایی :</label>
                                <input id="longitude" name="longitude" type="text" class="form-control"
                                       placeholder=" طول جغرافیایی " value="{{old("longitude")}}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>عرض جغرافیایی :</label>
                                <input id="latitude" name="latitude" type="text" class="form-control"
                                       placeholder=" عرض جغرافیایی " value="{{old("latitude")}}">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">

                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">انتشار</h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                                {{--                                <a class="list-icons-item" data-action="remove"></a>--}}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

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
                            <label class="display-block">تصویر شاخص اطلاعات تماس:</label>
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
    <script src="/admin_assets/custom/forms/contact_info.js"></script>
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

