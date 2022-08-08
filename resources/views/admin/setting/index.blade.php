@extends("admin.shared._AdminLayout",["title"=>"تنظیمات سایت  "])

@section("pageHeader")
    @include("admin.shared._PageHeader",
    ["pageTitle"=>"تنظیمات سایت  ",
    "pageHeaderLinks"=>[],
     "pageHeaderActive"=>"تنظیمات"
    ])
@endsection

@section("body")
    {!! AdminHelper::TempData("msg") !!}

    <form id="frmsetting" method="post" class="validate" action="/admin/setting/{{isset($model->id)?$model->id:1}}">
        <div class="row">
            <div class="col-lg-8">
                <input name="id" type="hidden" value="{{isset($model->id)?$model->id:1}}">
                {{csrf_field()}}
                <div class="card">

                    <div class="card-header header-elements-inline">
                        <h5 class="card-title"> تنظیمات سایت </h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                                {{--                                <a class="list-icons-item" data-action="remove"></a>--}}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>نام سایت :</label>
                                    <input minlength="5" id="site_name" name="site_name" type="text"
                                           class="form-control"
                                           placeholder=" نام سایت " required="required"
                                           value="{{isset($model->site_name)?$model->site_name:""}}">
                                    <label class="validation-error-label error" hidden="hidden" for="site_name"></label>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>عنوان سایت :</label>
                                    <input minlength="5" id="title" name="title" type="text" class="form-control"
                                           placeholder=" عنوان " required="required"
                                           value="{{isset($model->title)?$model->title:""}}">
                                    <label class="validation-error-label error" hidden="hidden" for="title"></label>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>ایمیل شخصی :</label>
                                    <input minlength="5" id="email" name="email" type="email" class="form-control"
                                           placeholder=" ایمیل شخصی  "
                                           value="{{isset($model->email)?$model->email:""}}">
                                    <label class="validation-error-label error" hidden="hidden" for="email"></label>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>ایمیل سایت :</label>
                                    <input minlength="5" id="contact_info" name="contact_info" type="email"
                                           class="form-control"
                                           placeholder=" ایمیل سایت "
                                           value="{{isset($model->contact_info)?$model->contact_info:""}}">
                                    <label class="validation-error-label error" hidden="hidden"
                                           for="contact_info"></label>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label> درباره ما :</label>
                            <textarea rows="5" minlength="5" id="about" name="about" class="form-control"
                                      placeholder=" درباره ما ">{{isset($model->about)?$model->about:""}}</textarea>
                            <label class="validation-error-label error" hidden="hidden" for="about"></label>
                        </div>

                        <div class="form-group">
                            <label>توضیحات سایت :</label>
                            <textarea minlength="5" rows="5" id="description" name="description"
                                      class="form-control"
                                      placeholder=" توضیحات سایت ">{{isset($model->description)?$model->description:""}}</textarea>
                            <label class="validation-error-label error" hidden="hidden" for="description"></label>
                        </div>


                        <div class="form-group">
                            <label> کلمات کلیدی :</label>
                            <input minlength="5" id="keywords" name="keywords" type="text"
                                   class="form-control tokenfield"
                                   placeholder=" کلمات کلیدی  " value="{{isset($model->keywords)?$model->keywords:""}}">
                            <label class="validation-error-label error" hidden="hidden" for="keywords"></label>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>رنگ پس زمینه هدر صفحه :</label>
                                    <input id="header_color" name="header_color" type="color" class="form-control"
                                           placeholder=" رنگ پس زمینه هدر صفحه " required="required"
                                           value="{{isset($model->header_color)?$model->header_color:""}}">

                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>رنگ پس زمینه پایین صفحه :</label>
                                    <input id="footer_color" name="footer_color" type="color" class="form-control"
                                           placeholder=" رنگ پس زمینه پایین صفحه " required="required"
                                           value="{{isset($model->footer_color)?$model->footer_color:""}}">

                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="display-block">بنر بالای صفحه :</label>

                                    <div class="thumb">
                                        <img id="img_header_banner"
                                             src="{{isset($model->header_banner)?"$model->header_banner":"/admin_assets/assets/images/placeholder.jpg"}}"
                                             alt="">
                                        <div class="caption-overflow">
										<span>
										<a data-naw3-file-type="image" data-naw3-set-to="header_banner"
                                           class="btn btn-primary naw3-select-file legitRipple">
                            <i class="fa fa-picture-o"></i> انتخاب فایل
                        </a>
                                            <a
                                                data-naw3-file-type="image"
                                                data-naw3-set-to="header_banner"
                                                class="btn btn-danger naw3-delete-file legitRipple">
                            <i class="fa fa-picture-o"></i> حذف فایل
                        </a>
                                        </span>
                                        </div>
                                    </div>

                                    <input value="{{isset($model->header_banner)?$model->header_banner:""}}"
                                           id="header_banner"
                                           class="form-control" type="hidden" name="header_banner">

                                    <label class="validation-error-label error" hidden="hidden"
                                           for="header_banner"></label>
                                    {!! AdminHelper::helpBlock("image") !!}
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="display-block">بنر پایین صفحه :</label>

                                    <div class="thumb">
                                        <img id="img_footer_banner"
                                             src="{{isset($model->footer_banner)?"$model->footer_banner":"/admin_assets/assets/images/placeholder.jpg"}}"
                                             alt="">
                                        <div class="caption-overflow">
										<span>
										<a data-naw3-file-type="image" data-naw3-set-to="footer_banner"
                                           class="btn btn-primary naw3-select-file legitRipple">
                            <i class="fa fa-picture-o"></i> انتخاب فایل
                        </a>
                                            <a
                                                data-naw3-file-type="image"
                                                data-naw3-set-to="footer_banner"
                                                class="btn btn-danger naw3-delete-file legitRipple">
                            <i class="fa fa-picture-o"></i> حذف فایل
                        </a>
                                        </span>
                                        </div>
                                    </div>

                                    <input value="{{isset($model->footer_banner)?$model->footer_banner:""}}"
                                           id="footer_banner"
                                           class="form-control" type="hidden" name="footer_banner">

                                    <label class="validation-error-label error" hidden="hidden"
                                           for="footer_banner"></label>
                                    {!! AdminHelper::helpBlock("image") !!}
                                </div>
                            </div>
                        </div>
                        <div class="text-left">
                            <button type="submit" class="btn btn-primary legitRipple"> ذخیره <i
                                    class="icon-arrow-left13 position-right"></i></button>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-4">

                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">تصاویر </h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="display-block">لوگو بالای صفحه :</label>

                            <div class="thumb">
                                <img id="img_header_logo"
                                     src="{{isset($model->header_logo)?"$model->header_logo":"/admin_assets/assets/images/placeholder.jpg"}}"
                                     alt="">
                                <div class="caption-overflow">
										<span>
										<a data-naw3-file-type="image" data-naw3-set-to="header_logo"
                                           class="btn btn-primary naw3-select-file legitRipple">
                            <i class="fa fa-picture-o"></i> انتخاب فایل
                        </a>
                                            <a
                                                data-naw3-file-type="image"
                                                data-naw3-set-to="header_logo"
                                                class="btn btn-danger naw3-delete-file legitRipple">
                            <i class="fa fa-picture-o"></i> حذف فایل
                        </a>
                                        </span>
                                </div>
                            </div>

                            <input value="{{isset($model->header_logo)?$model->header_logo:""}}" id="header_logo"
                                   class="form-control" type="hidden" name="header_logo">

                            <label class="validation-error-label error" hidden="hidden" for="header_logo"></label>
                            {!! AdminHelper::helpBlock("image") !!}
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="display-block">لوگو پایین صفحه:</label>
                            <div class="thumb">
                                <img id="img_footer_logo"
                                     src="{{isset($model->footer_logo)?"$model->footer_logo":"/admin_assets/assets/images/placeholder.jpg"}}"
                                     alt="">
                                <div class="caption-overflow">
										<span>
										<a data-naw3-file-type="image" data-naw3-set-to="footer_logo"
                                           class="btn btn-primary naw3-select-file legitRipple">
                            <i class="fa fa-picture-o"></i> انتخاب فایل
                        </a>
                                            <a
                                                data-naw3-file-type="image"
                                                data-naw3-set-to="footer_logo"
                                                class="btn btn-danger naw3-delete-file legitRipple">
                            <i class="fa fa-picture-o"></i> حذف فایل
                        </a>
                                        </span>
                                </div>
                            </div>
                            <input value="{{isset($model->footer_logo)?$model->footer_logo:""}}" id="footer_logo"
                                   class="form-control" type="hidden" name="footer_logo">

                            <label class="validation-error-label error" hidden="hidden" for="footer_logo"></label>
                            {!!  AdminHelper::helpBlock("image")!!}
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="display-block">لوگوی بالای مرورگر :</label>
                            <div class="thumb">
                                <img id="img_favicon"
                                     src="{{isset($model->favicon)?"$model->favicon":"/admin_assets/assets/images/placeholder.jpg"}}"
                                     alt="">
                                <div class="caption-overflow">
										<span>
										<a data-naw3-file-type="image" data-naw3-set-to="favicon"
                                           class="btn btn-primary naw3-select-file legitRipple">
                            <i class="fa fa-picture-o"></i> انتخاب فایل
                        </a>
                                            <a
                                                data-naw3-file-type="image"
                                                data-naw3-set-to="favicon"
                                                class="btn btn-danger naw3-delete-file legitRipple">
                            <i class="fa fa-picture-o"></i> حذف فایل
                        </a>
                                        </span>
                                </div>
                            </div>
                            <input value="{{isset($model->favicon)?$model->favicon:""}}" id="favicon"
                                   class="form-control" type="hidden" name="favicon">
                            <label class="validation-error-label error" hidden="hidden" for="favicon"></label>
                            {!!  AdminHelper::helpBlock("image")!!}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </form>
@endsection
@push("script")
    <script src="/admin_assets/custom/forms/setting.js"></script>
    @include("admin.shared._show_error_validation",["errors"=>$errors])

@endpush
