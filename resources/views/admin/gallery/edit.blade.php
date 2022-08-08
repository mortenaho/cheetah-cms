@extends("admin.shared._AdminLayout",["title"=>"ویرایش تصویر "])

@section("pageHeader")
    @include("admin.shared._PageHeader",
    ["pageTitle"=>"ویرایش تصویر ",
    "pageHeaderLinks"=>[
         ["title"=>" گالری","link"=>"/admin/gallery"]
    ],
     "pageHeaderActive"=>",ویرایش گالری"
    ])
@endsection

@section("body")
    <form id="frmgallery" method="post" class="validate" action="/admin/gallery/{{$gallery->id}}">
        <input name="_method" type="hidden" value="PUT">
        <div class="row">
            <div class="col-lg-8">
                <input type="hidden" name="parent" value="{{$gallery->parent}}">
                <input name="id" type="hidden" value="{{$gallery->id}}">
                {{csrf_field()}}
                <div class="card">

                    <div class="card-header header-elements-inline">
                        <h5 class="card-title"> ویرایش تصویر {{$gallery->sub_title}}</h5>
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
                            <input minlength="5" id="title" name="title" type="text" class="form-control"
                                   placeholder=" عنوان " required="required" value="{{$gallery->title}}">
                            <label class="validation-error-label error" hidden="hidden" for="title"></label>

                        </div>


                        <div class="form-group">
                            <label>توضیحات:</label>
                            <textarea name="excerpt" class="form-control"
                                      placeholder=" توضیحات مختصر ">{{$gallery->excerpt}}</textarea>
                        </div>
                        @if(language!=null)
                            <div class="form-group">
                                <label>زبان : </label>

                                <select name="language" id="language" class="form-control select" required="required">
                                    <option value="">انتخاب کنید</option>
                                    @foreach(language as $lang)
                                        <option
                                            @if($gallery->language===$lang["name"]) selected="selected"
                                            @endif value="{{$lang["name"]}}"> {{$lang["title"]}}</option>
                                    @endforeach
                                </select>
                                <label class="validation-error-label error" hidden="hidden" for="language"></label>

                            </div>
                        @endif
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
                        <h5 class="card-title"> ویرایش تصویر</h5>
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
                            <label class="display-block">تصویر گالری:</label>
                            <div class="thumb">
                                <img id="img_thumb"
                                     src="{{isset($gallery->thumb)?"$gallery->thumb":"/admin_assets/assets/images/placeholder.jpg"}}"
                                     alt="">
                                <div class="caption-overflow">
										<span>
										<a data-naw3-file-type="image" data-naw3-set-to="thumb"
                                           class="btn btn-primary naw3-select-file legitRipple">
                            <i class="fa fa-picture-o"></i> انتخاب فایل
                        </a>
                                            <a
                                                data-naw3-file-type="image"
                                                data-naw3-set-to="thumb"
                                                class="btn btn-danger naw3-delete-file legitRipple">
                            <i class="fa fa-picture-o"></i> حذف فایل
                        </a>
                                        </span>
                                </div>
                            </div>
                            <input value="{{$gallery->thumb}}" id="thumb"
                                   class="form-control" type="hidden" required="required" name="thumb">

                            <label class="validation-error-label error" hidden="hidden" for="thumb"></label>
                            {!! AdminHelper::helpBlock("image") !!}
                        </div>
                        <div class="form-group">
                            <label>وضعیت گالری :</label>
                            <label>فعال :
                                <input @if($gallery->status==1) checked="checked" @endif type="radio" name="status"
                                       class="styled" value="1">
                            </label>
                            <label>غیر فعال :
                                <input @if($gallery->status==0) checked="checked" @endif type="radio" name="status"
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
    <script src="/admin_assets/custom/forms/gallery.js"></script>
    @include("admin.shared._show_error_validation",["errors"=>$errors])

@endpush
