<div class="col-lg-12">

    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">نوشته ها</h5>
            <div class="header-elements">
                <a href="/admin/post/create" class="btn btn-success btn-labeled btn-labeled-left btn-lg" style="margin-left: 20px" ><b><i class="icon-plus-circle2"></i></b> افزودن</a>
                <a href="/admin/category/post" class="btn btn-primary btn-labeled btn-labeled-left btn-lg" style="margin-left: 20px" ><b><i class="icon-folder"></i></b> دسته بندی</a>
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="reload"></a>
{{--                    <a class="list-icons-item" data-action="remove"></a>--}}
                </div>
            </div>
        </div>
        {{csrf_field()}}
        <div class="table-responsive">

            <table id="post-table" class="table table-togglable table-hover media-library naw3-table">
                <thead>

                <tr>
                    <th>ردیف</th>
                    <th>تاریخ
                    </th>
                    <th>عنوان
                    </th>
                    <th>تصویر
                    </th>
                    <th> فعال / ویژه
                    </th>
                    <th style="min-width: 160px!important;"> عملیات</th>
                </tr>
                </thead>
                <tbody>
                </tbody>

            </table>
        </div>

    </div>
</div>

