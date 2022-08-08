@extends("admin.shared._AdminLayout",["title"=>"افزودن فایل پیوست جدید"])

@section("pageHeader")
    @include("admin.shared._PageHeader",
    ["pageTitle"=>"افزودن فایل پیوست جدید",
    "pageHeaderLinks"=>[
         ["title"=>" فایل پیوست","link"=>"/admin/attachment"]
    ],
     "pageHeaderActive"=>"افزودن فایل پیوست"
    ])
@endsection

@section("body")

    <form id="frmattachment" method="post" class="validate" action="/admin/attachment">
        <div class="row">
            <div class="col-lg-8">
                <input name="type_id" type="hidden" value="{{$type_id}}">
                {{csrf_field()}}
                <div class="card">

                    <div class="card-header header-elements-inline">
                        <h5 class="card-title"> افزودن فایل پیوست</h5>
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
                                   placeholder=" عنوان " value="{{old("title")}}">
                            <label class="validation-error-label error" hidden="hidden" for="title"></label>

                        </div>
                        <div class="form-group">
                            <label>آدرس خارجی :</label>
                            <input id="link_address" name="link_address" type="text" class="form-control"
                                   placeholder=" آدرس خارجی " value="{{old("link_address")}}">
                            <label class="validation-error-label error" hidden="hidden" for="link_address"></label>

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
                        <h5 class="card-title"> افزودن فایل پیوست </h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>

                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="display-block"> فایل پیوست:</label>
                            <div class="thumb" style="min-height: 100px;">
                                <img id="img_file"
                                     src="/admin_assets/assets/images/placeholder.jpg"
                                     alt="">
                                <div class="caption-overflow">
										<span>
										<a data-naw3-file-type="file" data-naw3-set-to="file"
                                           class="btn btn-primary naw3-select-file legitRipple">
                            <i class="fa fa-picture-o"></i> انتخاب فایل
                        </a>
                                            <a
                                                data-naw3-file-type="file"
                                                data-naw3-set-to="file"
                                                class="btn btn-danger naw3-delete-file legitRipple">
                            <i class="fa fa-picture-o"></i> حذف فایل
                        </a>
                                        </span>
                                </div>
                            </div>

                            <input value="{{old("photo")}}" id="file"
                                   class="form-control" type="hidden" required="required" name="file">

                            <label class="validation-error-label error" hidden="hidden" for="file"></label>
                            {!! AdminHelper::helpBlock("image") !!}
                        </div>
                        <div class="form-group">
                            <label>وضعیت فایل پیوست :</label>
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
    @include("admin.shared._show_error_validation",["errors"=>$errors])

@endpush
