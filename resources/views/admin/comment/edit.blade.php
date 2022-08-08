@extends("admin.shared._AdminLayout",["title"=>"ویرایش نظرات "])

@section("pageHeader")
    @include("admin.shared._PageHeader",
    ["pageTitle"=>"ویرایش نظرات ",
    "pageHeaderLinks"=>[
         ["title"=>" نظراتر","link"=>"/admin/Comment"]
    ],
     "pageHeaderActive"=>",ویرایش نظراتر"
    ])
@endsection

@section("body")
    <form id="frmComment" method="post" class="validate" action="/admin/Comment/{{$comment->id}}">
        <input name="_method" type="hidden" value="PUT">
        <div class="col-lg-8">
            <input name="id" type="hidden" value="{{$comment->id}}">
            {{csrf_field()}}
            <div class="panel panel-white">
                <div class="panel-heading">
                    <h5 class="panel-title"> ویرایش نظرات {{$comment->sub_title}}<a class="heading-elements-toggle"><i
                                class="icon-more"></i></a></h5>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="collapse"></a></li>
                            <li><a data-action="reload"></a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label>عنوان گروه:</label>
                        <input minlength="5" id="title" name="title" type="text" class="form-control"
                               placeholder=" عنوان گروه" required="required" value="{{$comment->title}}">
                        <label class="validation-error-label error" hidden="hidden" for="title"></label>

                    </div>
                    <div class="form-group">
                        <label>عنوان نظرات:</label>
                        <input value="{{$comment->sub_title}}" id="sub_title" name="sub_title" type="text"
                               class="form-control" minlength="10" required="required" placeholder=" عنوان  نظراتر">
                        <label class="validation-error-label error" hidden="hidden" for="sub_title"></label>
                    </div>
                    <div class="form-group">
                        <label>آدرس اینترنتی :</label>
                        <input value="{{$comment->link}}" id="link" name="link" type="url" class="form-control"
                               placeholder=" آدرس اینترنتی">
                        <label class="validation-error-label error" hidden="hidden" for="link"></label>
                    </div>

                    <div class="form-group">
                        <label>توضیحات:</label>
                        <textarea name="description" class="form-control"
                                  placeholder=" توضیحات مختصر ">{{$comment->description}}</textarea>
                    </div>
                    <div class="text-left">
                        <button type="submit" class="btn btn-primary legitRipple"> ذخیره <i
                                class="icon-arrow-left13 position-right"></i></button>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-lg-4">

            <div class="panel panel-white">
                <div class="panel-heading">
                    <h5 class="panel-title"> افزودن نظرات <a class="heading-elements-toggle"><i
                                class="icon-more"></i></a></h5>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="collapse"></a></li>
                            <li><a data-action="reload"></a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="display-block">تصویر نظراتر:</label>
                        <a data-naw3-file-type="image" data-naw3-set-to="photo"
                           class="btn btn-primary naw3-select-file">
                            <i class="fa fa-picture-o"></i> انتخاب فایل
                        </a>
                        <input value="{{$comment->photo}}" id="photo"
                               class="form-control" type="text" required="required" name="photo">

                        <label class="validation-error-label error" hidden="hidden" for="photo"></label>
                        {!! AdminHelper::helpBlock("image") !!}
                    </div>
                    <div class="form-group">
                        <label>وضعیت نظراتر :</label>
                        <label>فعال :
                            <input @if($comment->status==1) checked="checked" @endif type="radio" name="status" class="styled" value="1" >
                        </label>
                        <label>غیر فعال :
                            <input @if($comment->status==0) checked="checked" @endif type="radio" name="status" class="styled" value="0">
                        </label>
                    </div>
                </div>
            </div>
        </div>

    </form>
@endsection
@push("script")
    <script src="/admin_assets/custom/forms/comment.js"></script>
    @include("admin.shared._show_error_validation",["errors"=>$errors])

@endpush
