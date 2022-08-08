@extends("admin.shared._AdminLayout",["title"=>"ویرایش اسلاید "])

@section("pageHeader")
    @include("admin.shared._PageHeader",
    ["pageTitle"=>"ویرایش اسلاید ",
    "pageHeaderLinks"=>[
         ["title"=>" اسلایدر","link"=>"/admin/Slider"]
    ],
     "pageHeaderActive"=>",ویرایش اسلایدر"
    ])
@endsection

@section("body")
    <form id="frmSlider" method="post" class="validate" action="/admin/Slider/{{$slider->id}}">
        <input name="_method" type="hidden" value="PUT">
        <div class="row">
            <div class="col-lg-8">
                <input name="id" type="hidden" value="{{$slider->id}}">
                {{csrf_field()}}

                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">ویرایش اسلایدر {{$slider->sub_title}}</h5>
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
                                   placeholder=" عنوان گروه" value="{{$slider->title}}">
                            <label class="validation-error-label error" hidden="hidden" for="title"></label>

                        </div>
                        <div class="form-group">
                            <label>عنوان اسلاید:</label>
                            <input value="{{$slider->sub_title}}" id="sub_title" name="sub_title" type="text"
                                   class="form-control" minlength="10" placeholder=" عنوان  اسلایدر">
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
                        <h5 class="card-title"> افزودن تصویر شاخص </h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="display-block">تصویر اسلایدر:</label>
                            <div class="thumb">
                                <img id="img_photo"
                                     src="{{isset($slider->photo)?"$slider->photo":"/admin_assets/assets/images/placeholder.jpg"}}"
                                     alt="">
                                <div class="caption-overflow">
										<span>
										<a data-naw3-file-type="image" data-naw3-set-to="photo"
                                           class="btn btn-primary naw3-select-file legitRipple">
                            <i class="fa fa-picture-o"></i> انتخاب فایل
                        </a>
                                            <a
                                                data-naw3-file-type="image"
                                                data-naw3-set-to="photo"
                                                class="btn btn-danger naw3-delete-file legitRipple">
                            <i class="fa fa-picture-o"></i> حذف فایل
                        </a>
                                        </span>
                                </div>
                            </div>
                            <input value="{{$slider->photo}}" id="photo"
                                   class="form-control" type="hidden" required="required" name="photo">

                            <label class="validation-error-label error" hidden="hidden" for="photo"></label>
                            {!! AdminHelper::helpBlock("image") !!}
                        </div>
                        <div class="form-group">
                            <label>وضعیت اسلایدر :</label>
                            <label>فعال :
                                <input @if($slider->status==1) checked="checked" @endif type="radio" name="status"
                                       class="styled" value="1">
                            </label>
                            <label>غیر فعال :
                                <input @if($slider->status==0) checked="checked" @endif type="radio" name="status"
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
    <script src="/admin_assets/custom/forms/slider.js"></script>
    @include("admin.shared._show_error_validation",["errors"=>$errors])

@endpush
