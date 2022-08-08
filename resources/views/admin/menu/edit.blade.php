@extends("admin.shared._AdminLayout",["title"=>"ویرایش منو جدید"])

@section("pageHeader")
    @include("admin.shared._PageHeader",
    ["pageTitle"=>"ویرایش منو جدید",
    "pageHeaderLinks"=>[
         ["title"=>"  منو","link"=>"/admin/menu"]
    ],
     "pageHeaderActive"=>"ویرایش  منو"
    ])
@endsection

@section("body")
    <form id="frmMenu" method="post" class="validate" action="/admin/menu/{{$menu->id}}">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="id" value="{{$menu->id}}">
        <input type="hidden" name="ordering" value="{{$menu->ordering}}">
        <div class="col-lg-8">
            {{csrf_field()}}
            <div class="panel panel-white">
                <div class="panel-heading">
                    <h5 class="panel-title"> ویرایش منو جدید<a class="heading-elements-toggle"><i
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
                        <label> نوع منو  : </label>

                        <select name="type" id="type" class="form-control " required="required">
                            <option value="">انتخاب کنید</option>
                            @foreach(post_type as $item)
                                <option @if($menu->type===$item["name"]) selected="selected" @endif value="{{$item["name"]}}"> {{$item["title"]}}</option>
                            @endforeach
                        </select>
                        <label class="validation-error-label error" hidden="hidden" for="type"></label>

                    </div>

                    <div class="form-group">
                        <label>عنوان :</label>
                        <input id="title" name="title" type="text" class="form-control"
                               placeholder=" عنوان " required="required" value="{{$menu->title}}">
                        <label class="validation-error-label error" hidden="hidden" for="title"></label>
                    </div>
                    <div class="form-group">
                        <label>مادر دسته :</label>
                        <div id="menu_select">
                            {!! $htmlMenu !!}
                        </div>
                    </div>
                    @if(language!=null)
                        <div class="form-group">
                            <label>زبان :</label>
                            <select name="language" id="language" class="form-control "  required="required">
                                <option value="">انتخاب کنید</option>
                                @foreach(language as $lang)
                                    <option @if($menu->language===$lang["name"]) selected="selected" @endif value="{{$lang["name"]}}"> {{$lang["title"]}}</option>
                                @endforeach
                            </select>
                            <label class="validation-error-label error" hidden="hidden" for="language"></label>
                        </div>
                    @endif
                    <div class="form-group">
                        <label>توضیحات:</label>
                        <textarea name="description" class="form-control"
                                  placeholder=" توضیحات مختصر ">{{$menu->description}}</textarea>
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
                    <h5 class="panel-title"> ویرایش آیکون <a class="heading-elements-toggle"><i
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
                        <label class="display-block">آیکون منو:</label>
                        <div class="thumb">
                            <img id="img_icon"
                                 src="@if($menu->icon!=null) {{$menu->icon}} @else /admin_assets/assets/images/placeholder.jpg @endif"
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
                        <input value="{{$menu->icon}}" id="icon"
                               class="form-control" type="hidden"  name="icon">

                        <label class="validation-error-label error" hidden="hidden" for="icon"></label>
                        {!! AdminHelper::helpBlock("image") !!}
                    </div>
                    <div class="form-group">
                        <label>انتخاب وضعیت :</label>
                        <label>فعال :
                            <input @if($menu->status===1) checked="checked" @endif type="radio" name="status" class="styled" value="1" >
                        </label>
                        <label>غیر فعال :
                            <input @if($menu->status===0) checked="checked" @endif type="radio" name="status" class="styled" value="0">
                        </label>
                    </div>
                </div>
            </div>
        </div>

    </form>
@endsection
@push("script")
    <script src="/admin_assets/custom/forms/menu_temp.js"></script>
    @include("admin.shared._show_error_validation",["errors"=>$errors])
@endpush

