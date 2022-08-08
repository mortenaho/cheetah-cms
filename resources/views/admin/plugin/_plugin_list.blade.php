<div class="card">

        <div class="card-header header-elements-inline">
            <h5 class="card-title">لیست افزونه های نصب شده</h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="reload"></a>
                    {{--                                <a class="list-icons-item" data-action="remove"></a>--}}
                </div>
            </div>
        </div>
        <div class="card-body">

    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr class="bg-blue">
                <th>#</th>
                <th>نام افزونه</th>
                <th>وضعیت</th>
            </tr>
            </thead>
            <tbody>
            <?php $row = 1;?>
            @foreach($plugins as $item)
                <?php
                if ($item->is_active === 1) {
                    $style = "success";
                    $title = "فعال";
                    $icon="checkmark";
                } else {
                    $style = "danger";
                    $title = "غیر فعال";
                    $icon="cross2";
                }
                ?>
                <tr id="tr_plugin_{{$item->id}}">
                    <td>{{$row}}</td>
                    <td>{{$item->title}}</td>
                    <td id="tr_plugin_active_{{$item->id}}">
                        <button data-id="{{$item->id}}" type="button" class="btn btn-{{$style}} btn_is_active btn-rounded legitRipple"><i
                                class="icon-{{$icon}} position-left"></i> {{$title}}
                        </button>
                    </td>
                    <?php $row++;?>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    </div>
</div>
