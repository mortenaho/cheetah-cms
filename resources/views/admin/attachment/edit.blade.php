@extends("admin.shared._AdminLayout",["title"=>"ویرایش فایل پیوست "])

@section("pageHeader")
    @include("admin.shared._PageHeader",
    ["pageTitle"=>"ویرایش فایل پیوست ",
    "pageHeaderLinks"=>[
         ["title"=>" فایل پیوست","link"=>"/admin/attachment"]
    ],
     "pageHeaderActive"=>",ویرایش فایل پیوست"
    ])
@endsection

@section("body")
    <form id="frmattachment" method="post" class="validate" action="/admin/attachment/{{$attachment->id}}">
        <input name="_method" type="hidden" value="PUT">
        <div class="row">
            <div class="col-lg-8">
                <input name="id" type="hidden" value="{{$attachment->id}}">
                <input name="type_id" type="hidden" value="{{$attachment->type_id}}">

                {{csrf_field()}}
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title"> ویرایش فایل پیوست</h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                                {{--                                <a class="list-icons-item" data-action="remove"></a>--}}
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label>عنوان :</label>
                            <input id="title" name="title" type="text" class="form-control"
                                   placeholder=" عنوان " value="{{$attachment->title}}">
                            <label class="validation-error-label error" hidden="hidden" for="title"></label>

                        </div>
                        <div class="card-body">
                            <label>آدرس خارجی :</label>
                            <input id="link_address" name="link_address" type="text" class="form-control"
                                   placeholder=" آدرس خارجی " value="{{$attachment->link_address}}">
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
                        <h5 class="card-title"> ویرایش فایل پیوست </h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>

                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="display-block">تصویر فایل پیوست:</label>
                            <div class="thumb">
                                <img id="img_file"
                                     src="{{isset($attachment->file)?"$attachment->file":"/admin_assets/assets/images/placeholder.jpg"}}"
                                     alt="">
                                <div class="caption-overflow">
										<span>
										<a data-naw3-file-type="image" data-naw3-set-to="file"
                                           class="btn btn-primary naw3-select-file legitRipple">
                            <i class="fa fa-picture-o"></i> انتخاب فایل
                        </a>
                                            <a
                                                data-naw3-file-type="image"
                                                data-naw3-set-to="file"
                                                class="btn btn-danger naw3-delete-file legitRipple">
                            <i class="fa fa-picture-o"></i> حذف فایل
                        </a>
                                        </span>
                                </div>
                            </div>
                            <input value="{{$attachment->file}}" id="photo"
                                   class="form-control" type="hidden" required="required" name="file">

                            <label class="validation-error-label error" hidden="hidden" for="file"></label>
                            {!! AdminHelper::helpBlock("image") !!}
                        </div>
                        <div class="form-group">
                            <label>وضعیت فایل پیوست :</label>
                            <label>فعال :
                                <input @if($attachment->status==1) checked="checked" @endif type="radio" name="status"
                                       class="styled" value="1">
                            </label>
                            <label>غیر فعال :s
                                <input @if($attachment->status==0) checked="checked" @endif type="radio" name="status"
                                       class="styled" value="0">
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
