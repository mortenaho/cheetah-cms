@extends("admin.shared._AdminLayout",["title"=>"ویرایش دسته بندی جدید"])

@section("pageHeader")
    @include("admin.shared._PageHeader",
    ["pageTitle"=>"ویرایش دسته بندی جدید",
    "pageHeaderLinks"=>[
         ["title"=>"  دسته بندی","link"=>"/admin/category"]
    ],
     "pageHeaderActive"=>"ویرایش  دسته بندی"
    ])
@endsection

@section("body")
    <form id="frmCategory" method="post" class="validate" action="/admin/ec/category/{{$category->id}}">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="id" value="{{$category->id}}">
        <input type="hidden" name="ordering" value="{{$category->ordering}}">
        <div class="row">
            <div class="col-lg-8">
                {{csrf_field()}}
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title"> ویرایش دسته بندی</h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                                {{--                                <a class="list-icons-item" data-action="remove"></a>--}}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
{{--                        <div class="form-group">--}}
{{--                            <label> نوع دسته بندی : </label>--}}
{{--                            <select name="type" id="type" class="form-control " required="required">--}}
{{--                                <option value="">انتخاب کنید</option>--}}
{{--                                @foreach(post_type as $item)--}}
{{--                                    <option @if($category->type===$item["name"]) selected="selected"--}}
{{--                                            @endif value="{{$item["name"]}}"> {{$item["title"]}}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                            <label class="validation-error-label error" hidden="hidden" for="type"></label>--}}

{{--                        </div>--}}

                        <div class="form-group">
                            <label>عنوان :</label>
                            <input id="title" name="title" type="text" class="form-control"
                                   placeholder=" عنوان " required="required" value="{{$category->title}}">
                            <label class="validation-error-label error" hidden="hidden" for="title"></label>
                        </div>
                        <div class="form-group">
                            <label>مادر دسته :</label>
                            <div id="category_select">
                                {!! $htmlCategory !!}
                            </div>
                        </div>
                        {{--@if(language!=null)--}}
                            {{--<div class="form-group">--}}
                                {{--<label>زبان :</label>--}}
                                {{--<select name="language" id="language" class="form-control " required="required">--}}
                                    {{--<option value="">انتخاب کنید</option>--}}
                                    {{--@foreach(language as $lang)--}}
                                        {{--<option @if($category->language===$lang["name"]) selected="selected"--}}
                                                {{--@endif value="{{$lang["name"]}}"> {{$lang["title"]}}</option>--}}
                                    {{--@endforeach--}}
                                {{--</select>--}}
                                {{--<label class="validation-error-label error" hidden="hidden" for="language"></label>--}}
                            {{--</div>--}}
                        {{--@endif--}}
                        <div class="form-group">
                            <label>توضیحات:</label>
                            <textarea name="description" class="form-control"
                                      placeholder=" توضیحات مختصر ">{{$category->description}}</textarea>
                        </div>
                        <div class="text-left">
                            <button type="submit" class="btn btn-success legitRipple"> ذخیره <i
                                    class="icon-floppy-disk position-right"></i></button>
                            <a href="/admin/ec/category" class="btn btn-primary legitRipple"> بازگشت به لیست <i
                                    class="icon-list position-right"></i></a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-4">

                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">  ویرایش آیکون </h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>

                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="display-block">آیکون دسته بندی:</label>
                            <div class="thumb">
                                <img id="img_icon"
                                     src="@if($category->icon!=null) {{$category->icon}} @else /admin_assets/assets/images/placeholder.jpg @endif"
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
                            <input value="{{$category->icon}}" id="icon"
                                   class="form-control" type="hidden" name="icon">

                            <label class="validation-error-label error" hidden="hidden" for="icon"></label>
                            {!! AdminHelper::helpBlock("image") !!}
                        </div>
                        <div class="form-group">
                            <label>انتخاب وضعیت :</label>
                            <label>فعال :
                                <input @if($category->status===1) checked="checked" @endif type="radio" name="status"
                                       class="styled" value="1">
                            </label>
                            <label>غیر فعال :
                                <input @if($category->status===0) checked="checked" @endif type="radio" name="status"
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
    <script src="/admin_assets/custom/forms/category.js"></script>
    @include("admin.shared._show_error_validation",["errors"=>$errors])
@endpush

