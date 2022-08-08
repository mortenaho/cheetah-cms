@extends("admin.shared._AdminLayout",["title"=>"ویرایش نوشته "])

@section("pageHeader")
    @include("admin.shared._PageHeader",
    ["pageTitle"=>"ویرایش نوشته ",
    "pageHeaderLinks"=>[
         ["title"=>" نوشتهر","link"=>"HMPost"]
    ],
     "pageHeaderActive"=>",ویرایش نوشتهر"
    ])
@endsection

@section("body")
    <form id="frmPost" method="post" class="validate" action="/admin/Post/{{$post->id}}">
        <input name="_method" type="hidden" value="PUT">
        <div class="row">
            <div class="col-lg-8">
                <input name="id" type="hidden" value="{{$post->id}}">
                {{csrf_field()}}
                <div class="card">

                    <div class="card-header header-elements-inline">
                        <h5 class="card-title"> افزودن نوشته{{$post->sub_title}}</h5>
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
                                   placeholder=" عنوان گروه" required="required" value="{{$post->title}}">
                            <label class="validation-error-label error" hidden="hidden" for="title"></label>

                        </div>
                        <div class="form-group">
                            <label>عنوان نوشته:</label>
                            <input value="{{$post->sub_title}}" id="sub_title" name="sub_title" type="text"
                                   class="form-control" minlength="10" required="required" placeholder=" عنوان  نوشتهر">
                            <label class="validation-error-label error" hidden="hidden" for="sub_title"></label>
                        </div>
                        <div class="form-group">
                            <label>آدرس اینترنتی :</label>
                            <input value="{{$post->link}}" id="link" name="link" type="url" class="form-control"
                                   placeholder=" آدرس اینترنتی">
                            <label class="validation-error-label error" hidden="hidden" for="link"></label>
                        </div>

                        <div class="form-group">
                            <label>توضیحات:</label>
                            <textarea name="description" class="form-control"
                                      placeholder=" توضیحات مختصر ">{{$post->description}}</textarea>
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
                        <h5 class="card-title"> افزودن نوشته</h5>
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
                            <label class="display-block">تصویر نوشتهر:</label>
                            <a data-naw3-file-type="image" data-naw3-set-to="photo"
                               class="btn btn-primary naw3-select-file">
                                <i class="fa fa-picture-o"></i> انتخاب فایل
                            </a>
                            <input value="{{$post->photo}}" id="photo"
                                   class="form-control" type="text" required="required" name="photo">

                            <label class="validation-error-label error" hidden="hidden" for="photo"></label>
                            {!! AdminHelper::helpBlock("image") !!}
                        </div>
                        <div class="form-group">
                            <label>وضعیت نوشتهر :</label>
                            <label>فعال :
                                <input @if($post->status==1) checked="checked" @endif type="radio" name="status"
                                       class="styled" value="1">
                            </label>
                            <label>غیر فعال :
                                <input @if($post->status==0) checked="checked" @endif type="radio" name="status"
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
    <script src="/admin_assets/custom/forms/hm_post.js"></script>
    @include("admin.shared._show_error_validation",["errors"=>$errors])

@endpush
