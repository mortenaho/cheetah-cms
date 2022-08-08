@extends("admin.shared._AdminLayout",["title"=>"افزودن دسته بندی جدید"])

@section("pageHeader")
    @include("admin.shared._PageHeader",
    ["pageTitle"=>"افزودن دسته بندی جدید",
    "pageHeaderLinks"=>[
         ["title"=>"  دسته بندی","link"=>"/admin/category"]
    ],
     "pageHeaderActive"=>"افزودن  دسته بندی"
    ])
@endsection

@section("body")
    <form id="frmCategory" method="post" class="validate" action="/admin/category">
        <div class="row">
            <div class="col-lg-8">
                {{csrf_field()}}
                <div class="card">

                    <div class="card-header header-elements-inline">
                        <h5 class="card-title"> افزودن دسته بندی</h5>
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
                            <input type="hidden" name="type" id="type" value="{{$type}}"/>
{{--                            <label>نوع دسته بندی :</label>--}}
{{--                           --}}
{{--                            <select name="type" id="type" class="form-control " required="required">--}}
{{--                                <option value="">انتخاب کنید</option>--}}
{{--                                @foreach($types as $item)s--}}
{{--                                <option value="{{$item["name"]}}"> {{$item["title"]}}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                            <label class="validation-error-label error" hidden="hidden" for="type"></label>--}}

                        </div>

                        <div class="form-group">
                            <label>عنوان :</label>
                            <input id="title" name="title" type="text" class="form-control"
                                   placeholder=" عنوان " required="required" value="{{old("title")}}">
                            <label class="validation-error-label error" hidden="hidden" for="title"></label>

                        </div>


                        <div class="form-group">
                            <label>مادر دسته :</label>
                            <div id="category_select">

                            </div>

                        </div>
                        @if(language!=null)
                            <div class="form-group">
                                <label>زبان : </label>

                                <select name="language" id="language" class="form-control  " required="required">
                                    <option value="">انتخاب کنید</option>
                                    @foreach(language as $lang)
                                        <option value="{{$lang["name"]}}"> {{$lang["title"]}}</option>
                                    @endforeach
                                </select>
                                <label class="validation-error-label error" hidden="hidden" for="language"></label>

                            </div>
                        @endif
                        <div class="form-group">
                            <label>توضیحات:</label>
                            <textarea name="description" class="form-control"
                                      placeholder=" توضیحات مختصر ">{{old("description")}}</textarea>
                        </div>
                        <div class="text-left">
                            <button type="submit" class="btn btn-success legitRipple"> ذخیره <i
                                    class="icon-floppy-disk position-right"></i></button>
                            <a href="/admin/category/{{$type}}" class="btn btn-primary legitRipple"> بازگشت به لیست <i
                                    class="icon-list position-right"></i></a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">  افزودن آیکون </h5>
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
                                     src="/admin_assets/assets/images/placeholder.jpg"
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
                            <input value="{{old("icon")}}" id="icon"
                                   class="form-control" type="hidden" name="icon">

                            <label class="validation-error-label error" hidden="hidden" for="icon"></label>
                            {!! AdminHelper::helpBlock("image") !!}
                        </div>
                        <div class="form-group">
                            <label>انتخاب وضعیت :</label>
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
    <script src="/admin_assets/custom/forms/category.js"></script>
    @include("admin.shared._show_error_validation",["errors"=>$errors])
@endpush

