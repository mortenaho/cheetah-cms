@extends("admin.shared._AdminLayout",["title"=>"ویرایش تماس با ما "])

@section("pageHeader")
    @include("admin.shared._PageHeader",
    ["pageTitle"=>"ویرایش تماس با ما ",
    "pageHeaderLinks"=>[
         ["title"=>" تماس با ما","link"=>"/admin/ContactUs"]
    ],
     "pageHeaderActive"=>",ویرایش تماس با ما"
    ])
@endsection

@section("body")
    <form id="frmContactUs" method="post" class="validate" action="/admin/ContactUs/{{$slider->id}}">
        <input name="_method" type="hidden" value="PUT">
        <div class="col-lg-8">
            <input name="id" type="hidden" value="{{$slider->id}}">
            {{csrf_field()}}
            <div class="panel panel-white">
                <div class="panel-heading">
                    <h5 class="panel-title"> ویرایش تماس با ما {{$slider->sub_title}}<a class="heading-elements-toggle"><i
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
                               placeholder=" عنوان گروه" required="required" value="{{$slider->title}}">
                        <label class="validation-error-label error" hidden="hidden" for="title"></label>

                    </div>
                    <div class="form-group">
                        <label>عنوان تماس با ما:</label>
                        <input value="{{$slider->sub_title}}" id="sub_title" name="sub_title" type="text"
                               class="form-control" minlength="10" required="required" placeholder=" عنوان  تماس با ما">
                        <label class="validation-error-label error" hidden="hidden" for="sub_title"></label>
                    </div>
                    <div class="form-group">
                        <label>آدرس اینترنتی :</label>
                        <input value="{{$slider->link}}" id="link" name="link" type="url" class="form-control"
                               placeholder=" آدرس اینترنتی">
                        <label class="validation-error-label error" hidden="hidden" for="link"></label>
                    </div>

                    <div class="form-group">
                        <label>توضیحات:</label>
                        <textarea name="description" class="form-control"
                                  placeholder=" توضیحات مختصر ">{{$slider->description}}</textarea>
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
                    <h5 class="panel-title"> افزودن تماس با ما <a class="heading-elements-toggle"><i
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
                        <label class="display-block">تصویر تماس با ما:</label>
                        <a data-naw3-file-type="image" data-naw3-set-to="photo"
                           class="btn btn-primary naw3-select-file">
                            <i class="fa fa-picture-o"></i> انتخاب فایل
                        </a>
                        <input value="{{$slider->photo}}" id="photo"
                               class="form-control" type="text" required="required" name="photo">

                        <label class="validation-error-label error" hidden="hidden" for="photo"></label>
                        {!! AdminHelper::helpBlock("image") !!}
                    </div>
                    <div class="form-group">
                        <label>وضعیت تماس با ما :</label>
                        <label>فعال :
                            <input @if($slider->status==1) checked="checked" @endif type="radio" name="status" class="styled" value="1" >
                        </label>
                        <label>غیر فعال :
                            <input @if($slider->status==0) checked="checked" @endif type="radio" name="status" class="styled" value="0">
                        </label>
                    </div>
                </div>
            </div>
        </div>

    </form>
@endsection
@push("script")
    <script src="/admin_assets/custom/forms/slider.js"></script>
    @include("admin.shared._show_error_validation",["errors"=>$errors])

@endpush
