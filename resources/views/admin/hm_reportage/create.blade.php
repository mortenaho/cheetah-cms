@extends("admin.shared._AdminLayout",["title"=>"افزودن نوشته جدید"])

@section("pageHeader")
    @include("admin.shared._PageHeader",
    ["pageTitle"=>"افزودن نوشته جدید",
    "pageHeaderLinks"=>[
         ["title"=>" نوشته","link"=>"HMPost"]
    ],
     "pageHeaderActive"=>"افزودن نوشته"
    ])
@endsection

@section("body")



    <form id="frmPost" method="post" class="validate" action="/admin/Post">
        {{csrf_field()}}
        <div class="row">
            <div class="col-lg-8">

                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title"> افزودن رپرتاژ</h5>
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
                            <label>عنوان گروه:</label>
                            <input minlength="5" id="title" name="title" type="text" class="form-control"
                                   placeholder=" عنوان گروه" required="required" value="{{old("title")}}">
                            <label class="validation-error-label error" hidden="hidden" for="title"></label>

                        </div>
                        <div class="form-group">
                            <label>عنوان نوشته:</label>
                            <input value="{{old("sub_title")}}" id="sub_title" name="sub_title" type="text"
                                   class="form-control" minlength="10" required="required" placeholder=" عنوان  نوشته">
                            <label class="validation-error-label error" hidden="hidden" for="sub_title"></label>
                        </div>
                        <div class="form-group">
                            <label>آدرس اینترنتی :</label>
                            <input value="{{old("link")}}" id="link" name="link" type="url" class="form-control"
                                   placeholder=" آدرس اینترنتی">
                            <label class="validation-error-label error" hidden="hidden" for="link"></label>
                        </div>

                        <div class="form-group">
                            <label>توضیحات:</label>
                            <textarea name="description" class="form-control"
                                      placeholder=" توضیحات مختصر ">{{old("description")}}</textarea>
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
                        <h5 class="card-title"> افزودن رپرتاژ</h5>
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
                            <label class="display-block">تصویر نوشته:</label>
                            <a data-naw3-file-type="image" data-naw3-set-to="photo"
                               class="btn btn-primary naw3-select-file">
                                <i class="fa fa-picture-o"></i> انتخاب فایل
                            </a>
                            <input value="{{old("photo")}}" id="photo"
                                   class="form-control" type="text" required="required" name="photo">

                            <label class="validation-error-label error" hidden="hidden" for="photo"></label>
                            {!! AdminHelper::helpBlock("image") !!}
                        </div>
                        <div class="form-group">
                            <label>وضعیت نوشته :</label>
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
    <script src="/admin_assets/custom/forms/hm_post.js"></script>
    @include("admin.shared._show_error_validation",["errors"=>$errors])

@endpush
