@extends("admin.shared._AdminLayout",["title"=>"افزودن شکبه اجتماعی جدید"])

@section("pageHeader")
    @include("admin.shared._PageHeader",
    ["pageTitle"=>"افزودن شبکه اجتماعی جدید",
    "pageHeaderLinks"=>[
         ["title"=>"  شبکه اجتماعی","link"=>"/admin/Social"]
    ],
     "pageHeaderActive"=>"افزودن  شبکه اجتماعی"
    ])
@endsection

@section("body")
    <form id="frmSocial" method="post" class="validate" action="/admin/Social">

        <div class="row">
            <div class="col-lg-8">
                {{csrf_field()}}

                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title"> افزودن شبکه اجتماعی جدید</h5>
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
                            <label>آدرس اینترنتی :</label>
                            <input required="required" value="{{old("link")}}" id="link" name="link" type="url"
                                   class="form-control"
                                   placeholder=" آدرس اینترنتی">
                            <label class="validation-error-label error" hidden="hidden" for="link"></label>
                        </div>

                        <div class="form-group">
                            <label>توضیحات:</label>
                            <textarea name="description" class="form-control"
                                      placeholder=" توضیحات مختصر ">{{old("description")}}</textarea>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="p-5">
                                <button type="submit" class="btn btn-primary legitRipple"> ذخیره <i
                                        class="icon-arrow-left13 position-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-4">

                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title"> افزودن آیکون </h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="display-block">آیکون شبکه اجتماعی:</label>
                            <div class="thumb">
                                <img id="img_icon"
                                     src="/admin_assets/assets/images/placeholder.jpg"
                                     alt="">
                                <div class="caption-overflow">
										<span>
										<a data-naw3-file-type="image" data-naw3-set-to="icon"
                                           class="btn btn-primary naw3-select-file legitRipple">
                            <i class="fa fa-picture-o"></i> انتخاب فایل
                        </a>
                                            <a
                                                data-naw3-file-type="image"
                                                data-naw3-set-to="icon"
                                                class="btn btn-danger naw3-delete-file legitRipple">
                            <i class="fa fa-picture-o"></i> حذف فایل
                        </a>
                                        </span>
                                </div>
                            </div>
                            <input value="{{old("icon")}}" id="icon"
                                   class="form-control" type="hidden" required="required" name="icon">

                            <label class="validation-error-label error" hidden="hidden" for="icon"></label>
                            {!! AdminHelper::helpBlock("image") !!}
                        </div>
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
                </div>
            </div>
        </div>

    </form>
@endsection
@push("script")
    <script src="/admin_assets/custom/forms/social.js"></script>
    @include("admin.shared._show_error_validation",["errors"=>$errors])
@endpush
