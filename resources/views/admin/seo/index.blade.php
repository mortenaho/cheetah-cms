@extends("admin.shared._AdminLayout",["title"=>"تنظیمات سئو  "])

@section("pageHeader")
    @include("admin.shared._PageHeader",
    ["pageTitle"=>"تنظیمات سئو  ",
    "pageHeaderLinks"=>[],
     "pageHeaderActive"=>"تنظیمات سئو"
    ])
@endsection

@section("body")
    {!! AdminHelper::TempData("msg") !!}

    <form id="frmsetting" method="post" class="validate" action="/admin/seo/{{isset($model->id)?$model->id:1}}">
        <div class="row">
            <div class="col-lg-12">
                <input name="id" type="hidden" value="{{isset($model->id)?$model->id:1}}">
                {{csrf_field()}}
                <div class="card">

                    <div class="card-header header-elements-inline">
                        <h5 class="card-title"> تنظیمات سئو </h5>
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
                            <label> لینک الکسا:</label>
                            <textarea rows="5" minlength="5" id="alexa_link" name="alexa_link" class="form-control" style="direction: ltr !important;text-align: left !important;"
                                      placeholder=" درباره ما ">{{isset($model->alexa_link)?$model->alexa_link:""}}</textarea>
                            <label class="validation-error-label error" hidden="hidden" for="alexa_link"></label>
                        </div>

                        <div class="form-group">
                            <label> لینک آنالیز گوگل:</label>
                            <textarea rows="5" minlength="5" id="google_analytics" name="google_analytics" class="form-control" style="direction: ltr !important;text-align: left !important;"
                                      placeholder=" درباره ما ">{{isset($model->google_analytics)?$model->google_analytics:""}}</textarea>
                            <label class="validation-error-label error" hidden="hidden" for="google_analytics"></label>
                        </div>

                        <div class="form-group">
                            <label> شناسه آنالیز گوگل:</label>
                            <textarea  rows="5" minlength="5" id="gatracking_id" name="gatracking_id" class="form-control text-left" style="direction: ltr !important;text-align: left !important;"
                                      placeholder=" درباره ما ">{{isset($model->gatracking_id)?$model->gatracking_id:""}}</textarea>
                            <label class="validation-error-label error" hidden="hidden" for="gatracking_id"></label>
                        </div>
                        <div class="form-group">
                            <label>توضیحات سایت :</label>
                            <textarea minlength="5" rows="5" id="description" name="description"
                                      class="form-control"
                                      placeholder=" توضیحات سایت ">{{isset($model->description)?$model->description:""}}</textarea>
                            <label class="validation-error-label error" hidden="hidden" for="description"></label>
                        </div>


                        <div class="form-group">
                            <label> کلمات کلیدی :</label>
                            <input minlength="5" id="keywords" name="keywords" type="text"
                                   class="form-control tokenfield"
                                   placeholder=" کلمات کلیدی  " value="{{isset($model->keywords)?$model->keywords:""}}">
                            <label class="validation-error-label error" hidden="hidden" for="keywords"></label>
                        </div>


                        <div class="text-left">
                            <button type="submit" class="btn btn-primary legitRipple"> ذخیره <i
                                    class="icon-arrow-left13 position-right"></i></button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </form>
@endsection
@push("script")
    <script src="/admin_assets/custom/forms/seo.js"></script>
    @include("admin.shared._show_error_validation",["errors"=>$errors])

@endpush
