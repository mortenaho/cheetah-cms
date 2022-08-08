@extends("admin.shared._AdminLayout",["title"=>"ویرایش تبلیغات "])

@section("pageHeader")
    @include("admin.shared._PageHeader",
    ["pageTitle"=>"ویرایش تبلیغات ",
    "pageHeaderLinks"=>[
         ["title"=>" تبلیغاتر","link"=>"HMAds"]
    ],
     "pageHeaderActive"=>",ویرایش تبلیغاتر"
    ])
@endsection

@section("body")
    <form id="frmAds" method="ads" class="validate" action="/admin/Ads/{{$ads->id}}">
        <input name="_method" type="hidden" value="PUT">
        <div class="row">
            <div class="col-lg-8">
                <input name="id" type="hidden" value="{{$ads->id}}">
                {{csrf_field()}}
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title"> ویرایش تبلیغات ویرایش تبلیغات {{$ads->sub_title}}</h5>
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
                                   placeholder=" عنوان گروه" required="required" value="{{$ads->title}}">
                            <label class="validation-error-label error" hidden="hidden" for="title"></label>

                        </div>
                        <div class="form-group">
                            <label>عنوان تبلیغات:</label>
                            <input value="{{$ads->sub_title}}" id="sub_title" name="sub_title" type="text"
                                   class="form-control" minlength="10" required="required"
                                   placeholder=" عنوان  تبلیغاتر">
                            <label class="validation-error-label error" hidden="hidden" for="sub_title"></label>
                        </div>
                        <div class="form-group">
                            <label>آدرس اینترنتی :</label>
                            <input value="{{$ads->link}}" id="link" name="link" type="url" class="form-control"
                                   placeholder=" آدرس اینترنتی">
                            <label class="validation-error-label error" hidden="hidden" for="link"></label>
                        </div>

                        <div class="form-group">
                            <label>توضیحات:</label>
                            <textarea name="description" class="form-control"
                                      placeholder=" توضیحات مختصر ">{{$ads->description}}</textarea>
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
                        <h5 class="card-title"> افزودن تبلیغات</h5>
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
                            <label class="display-block">تصویر تبلیغاتر:</label>
                            <a data-naw3-file-type="image" data-naw3-set-to="photo"
                               class="btn btn-primary naw3-select-file">
                                <i class="fa fa-picture-o"></i> انتخاب فایل
                            </a>
                            <input value="{{$ads->photo}}" id="photo"
                                   class="form-control" type="text" required="required" name="photo">

                            <label class="validation-error-label error" hidden="hidden" for="photo"></label>
                            {!! AdminHelper::helpBlock("image") !!}
                        </div>
                        <div class="form-group">
                            <label>وضعیت تبلیغاتر :</label>
                            <label>فعال :
                                <input @if($ads->status==1) checked="checked" @endif type="radio" name="status"
                                       class="styled" value="1">
                            </label>
                            <label>غیر فعال :
                                <input @if($ads->status==0) checked="checked" @endif type="radio" name="status"
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
    <script src="/admin_assets/custom/forms/hm_ads.js"></script>
    @include("admin.shared._show_error_validation",["errors"=>$errors])

@endpush
