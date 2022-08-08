@extends("admin.shared._AdminLayout",["title"=>trans("admin.siteErrors"),"AjaxToken"=>true])

@section("pageHeader")

    @include("admin.shared._PageHeader",
    ["pageTitle"=>trans("admin.siteErrors"),
    "pageHeaderLinks"=>[
    ],
     "pageHeaderActive"=>trans("admin.siteErrors"),

    ])
@endsection

@section("body")
    {!! AdminHelper::TempData("msg") !!}
    @include("admin.error_log._list",["logs"=>$logFiles])


    <!-- Large modal -->
    <div id="modal_large" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div style="overflow: scroll;max-height: 500px;" class="modal-body">

                </div>

                <div class="modal-footer" style="margin-top: 20px;">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">بستن</button>
                    <button data-name="" type="button" class="btn btn-danger btn-error-delete">حذف</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /large modal -->
@endsection
@push("script")
    <script src="/admin_assets/custom/error_logs.js"></script>
@endpush
