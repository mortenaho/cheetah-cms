<div class="col-lg-12">


    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">لیست بازدیدها </h5>
            <div class="header-elements">
                <a href="/admin/visits/create" class="btn btn-success btn-labeled btn-labeled-left btn-lg" style="margin-left: 20px" ><b><i class="icon-plus-circle2"></i></b> محاسبه آمار</a>
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="reload"></a>
{{--                    <a class="list-icons-item" data-action="remove"></a>--}}
                </div>
            </div>
        </div>
        <div class="table-responsive">

            <table id="visits-table" class="table table-togglable table-hover media-library naw3-table">
                <thead>

                <tr>
                    <th>ردیف</th>
                    <th data-toggle="true">کد مطلب
                    </th>
                    <th data-hide="phone,tablet">IP
                    </th>
{{--                    <th data-hide="phone,tablet">مرورگر--}}
{{--                    </th>--}}
                    <th data-hide="phone,tablet">تاریخ
                    </th>
                    <th data-hide="phone,tablet">فعال
                    </th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                </tbody>

            </table>
        </div>

    </div>
</div>
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
