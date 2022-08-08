@extends("admin.shared._AdminLayout",["title"=>"تنظیمات حساب کاربری  "])

@section("pageHeader")
    @include("admin.shared._PageHeader",
    ["pageTitle"=>"تنظیمات حساب کاربری  ",
    "pageHeaderLinks"=>[],
     "pageHeaderActive"=>"تنظیمات"
    ])
@endsection
<style>
    .thumb-slide .caption {
        position: absolute;
        top: 0;
        bottom: 0;
        right: 0;
        color: #fff;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        z-index: 10;
        -webkit-transition: all 0.1s linear;
        -o-transition: all 0.1s linear;
        transition: all 0.1s linear;
    }

    .thumbnail .caption {
        padding: 17px;
        padding-top: 20px;
    }

    .thumb-rounded, .thumb-rounded img, .thumb-rounded .caption-overflow {
        border-radius: 50%;
    }

    .thumb {
        position: relative;
        display: block;
        text-align: center;
    }

    .thumbnail {
        border-width: 0;
        -webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
    }

    .thumbnail {
        display: block;
        padding: 3px;
        margin-bottom: 20px;
        line-height: 1.5384616;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 3px;
        -webkit-transition: border 0.2s ease-in-out;
        -o-transition: border 0.2s ease-in-out;
        transition: border 0.2s ease-in-out;
    }

    .legitRipple {
        position: relative;
        overflow: hidden;
        z-index: 0;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    .naw3-select-file {
        cursor: pointer;
        margin: auto;
    }
</style>
@section("body")
    {!! AdminHelper::TempData("msg") !!}
    <form id="frmprofile" method="post" class="validate" action="/admin/profile">
        <div class="row">
            <div class="col-lg-8">
                <input name="id" type="hidden" value="{{$model->id}}">
                {{csrf_field()}}
                <div class="card">


                    <div class="card-header header-elements-inline">
                        <h5 class="card-title"> تنظیمات حساب کاربری</h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                                {{--                                <a class="list-icons-item" data-action="remove"></a>--}}
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>نام :</label>
                                    <input id="first_name" name="first_name" type="text" class="form-control"
                                           placeholder=" نام " required="required"
                                           value="{{$model->first_name}}">
                                    <label class="validation-error-label error" hidden="hidden"
                                           for="first_name"></label>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>نام خانوادگی :</label>
                                    <input id="last_name" name="last_name" type="text" class="form-control"
                                           placeholder=" نام خانوادگی " required="required"
                                           value="{{$model->last_name}}">
                                    <label class="validation-error-label error" hidden="hidden" for="last_name"></label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>ایمیل :</label>
                            <input minlength="5" id="email" name="email" type="email" class="form-control"
                                   placeholder=" ایمیل   " value="{{$model->email}}">
                            <label class="validation-error-label error" hidden="hidden" for="email"></label>
                        </div>
                        <div class="text-left">
                            <button type="submit" class="btn btn-primary legitRipple"> ذخیره
                                <i class="icon-arrow-left13 position-right"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <!-- User thumbnail -->
                <div class="thumbnail">
                    <div class="thumb thumb-rounded thumb-slide">
                        <img
                            id="img_avatar"
                            src="{{$model->avatar}}" alt="">
                        <div class="caption">
                            <span>
                                <a data-naw3-file-type="image" data-naw3-set-to="avatar"
                                   class="btn bg-success-400 btn-icon btn-xs naw3-select-file"
                                   data-popup="lightbox"><i class="icon-plus2"></i></a>
                            </span>
                        </div>
                    </div>
                    <div class="caption text-center" style="">
                        <h6 class="text-semibold no-margin">{{$model->full_name}}
                            <small class="display-block">{{$model->username}} </small>
                            <input value="{{$model->avatar}}" id="avatar"
                                   class="form-control" type="hidden" name="avatar">
                        </h6>
                        <input value="{{$model->avatar}}" id="avatar"
                               class="form-control" type="hidden" name="avatar">

                        <label class="validation-error-label error" hidden="hidden" for="avatar"></label>

                    </div>
                </div>
                <!-- /user thumbnail -->


            </div>
        </div>
    </form>

    <form id="frmchangePassword" method="post" action="/admin/changePassword">
        <div class="row">
            <div class="col-lg-8">
                <input name="id" type="hidden" value="{{$model->id}}">
                {{csrf_field()}}
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">تغییر کلمه عبور</h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                                {{--                                <a class="list-icons-item" data-action="remove"></a>--}}
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>کلمه عبور فعلی:</label>
                                    <input id="current_password" name="current_password" type="password"
                                           class="form-control"
                                           placeholder=" کلمه عبور فعلی" required="required">
                                    <label class="validation-error-label error" hidden="hidden"
                                           for="current_password"></label>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>کلمه عبور جدید:</label>
                                    <input id="password" name="password" type="password" class="form-control"
                                           placeholder=" کلمه عبور " required="required"
                                    >
                                    <label class="validation-error-label error" hidden="hidden" for="password"></label>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>تکرار کلمه عبور :</label>
                                    <input id="password_confirmation" name="password_confirmation" type="password"
                                           class="form-control"
                                           placeholder=" تکرار کلمه عبور " required="required">
                                    <label class="validation-error-label error" hidden="hidden"
                                           for="password_confirmation"></label>
                                </div>
                            </div>
                        </div>

                        <div class="text-left">
                            <button type="submit" class="btn btn-primary legitRipple"> ذخیره
                                <i class="icon-arrow-left13 position-right"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@push("script")
    <script src="/admin_assets/custom/forms/profile.js"></script>
    @include("admin.shared._show_error_validation",["errors"=>$errors])

@endpush




