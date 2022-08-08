<div class="col-lg-12">

    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">منو</h5>
            <div class="header-elements">
                <a href="/admin/customer/create" class="btn btn-success btn-labeled btn-labeled-left btn-lg"
                   style="margin-left: 20px"><b><i class="icon-plus-circle2"></i></b> افزودن</a>
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="reload"></a>
                    {{--                        <a class="list-icons-item" data-action="remove"></a>--}}
                </div>
            </div>
        </div>
        <div class="table-responsive">

            <table id="menu-table" class="table table-togglable table-hover media-library naw3-table">
                <thead>

                <tr>

                    <th data-toggle="true">زبان مورد نظر برای منو
                    </th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach(language as $item)
                    <tr>
                        <td>{{$item["title"]}}</td>
                        <td class="text-center sorting_disabled" style="width: 90px;"><a class="btn  btn-sm bg-blue-400"
                                                                                         href="/admin/menu/create?lang={{$item["name"]}}"><i
                                    class="icon-stack-plus"></i></a></td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>

    </div>
</div>
