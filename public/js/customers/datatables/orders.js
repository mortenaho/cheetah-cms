OrderUrl="orders";
$(document).ready(function () {
// set data to table
    var table = $("#orders-table").DataTable({
        'processing': true,
        "language": {
            processing: '<i class="icon-spinner4 spinner"></i><span class="text-semibold display-block">...</span>'
        },
        'serverSide': true,
        'oLanguage': dataTable_lang,
        "preDrawCallback": function( settings ) {
            loadingElement('#orders-table_wrapper',true);
        },
        'ajax': "/customer/dtAjaxData/orders",
        "aoColumnDefs": [{"bSortable": false, "aTargets": [0, 3, 4, 5]}],
        "fnCreatedRow": function (nRow, aData, iDataIndex) {
            $(nRow).attr('data-ordering', aData["ordering"]);
            $(nRow).attr('data-id', aData["id"]);
        },
        "columns": [
            {
                "render": function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            {"data": "description"},
            // {"data": "total_price"},
            {
                "mRender": function (data, type, row)
                {
                    return (row.total_price).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                },
            },
            {"data": "register_date"},
            {
                "mRender": function (data, type, row)
                {
                    var statusChecked = row.status === 0 ? "" : " checked ";

                    return '<input type="checkbox" onchange="changeStatusSwitch(' + row.id  + ',this)"   data-on-text="فعال" ' +
                        '  data-off-text="غیر فعال"  class="switch" ' + statusChecked + ' /> ' ;
                },
            },
            {
                "mRender": function (data, type, row) {
                    return '<ul class="icons-list">' +
                        '<li data-id="' + row.id + '" class="btn btn-warning btn-icon btn-rounded legitRipple btn-show-details" ><a ><i class="icon-eye"></i></a></li>' +
                        '<li  data-id="' + row.id + '" class="btn btn-danger btn-icon btn-rounded legitRipple naw3-btn-delete-row"><a><i class="icon-trash"></i></a></li>' +
                        '</ul>';
                },
            }
        ],
        'initComplete': function () {

        },
        "drawCallback": function( settings ) {
            $("input.switch:checkbox").each(function (index,element) {
                var init = new Switchery(element, {
                    size: 'small', color: '#477FC5', secondaryColor: '#CCCCCC'
                    , onText: 'فعال',
                    offText: 'غیر فعال',
                });
            });

            $(".styled").uniform({
                radioClass: 'choice'
            });
            loadingElement('#orders-table_wrapper',false);
        }
    });

    //change Status
    $('.naw3-table tbody').on('click', 'tr .naw3-row-status', function () {
        var id = $(this).data("id");
        var row = $(this).find("tr");
        console.log(row);
        changeStatus(id)
    });

    function changeStatus(id) {
        var request = $.ajax({
            url: "/customer/orders/status/" + id,
            type: "POST",
            data: {id: id},
            dataType: "json"
        });

        request.done(function (res) {
            console.log(res);
            table.rows().draw();
        });

        request.fail(function (jqXHR, textStatus) {
            messageAlert('toast', 'title', "درخواست ناموفق بود", 'error');
        });
    }

    $('.naw3-table tbody').on('click', 'tr .btn-show-details', function () {
        var id = $(this).data("id");
        var row = $(this).find("tr");
        console.log(row);
        getOrderDetails(id);
    });

    function getOrderDetails(id){

        loadingElement('#orders-table_wrapper',true);
        var request = $.ajax({
            url: "/customer/orders/details/"+ id,
            type: "post",
            data: {id: id},
            dataType: "json"
        });

        request.done(function (res) {
            loadingElement('#orders-table_wrapper',false);
            if (res.status === "true") {
                $(".modal-title").html('جزییات سفارش');
                $(".modal-body").html(res.html);
                // $(".btn-error-delete").data("name", res.title);
                // $(".btn-error-delete").data("row", row);
                $('#modal_large').modal({
                    show: true
                });
            } else {
                messageAlert('toast', 'title', res.msg, 'error');
            }
        });

        request.fail(function (jqXHR, textStatus) {
            loadingElement('#orders-table_wrapper',false);
            messageAlert('toast', 'title', requestUnsuccessful, 'error');

        });
    }

    //delete row
    $('.naw3-table tbody').on('click', 'tr .naw3-btn-delete-row', function () {
        var id = $(this).data("id");
        var row = $(this).find("tr");

        // Alert combination
        questionAlert('swal', 'هشدار', 'آیا از حذف این آیتم مطمئن هستید ؟', 'warning', 'بله', 'خیر')
            .then(function (result) {
                if (result === 'confirm') {
                    deleteItem(id, row);
                } else {
                    messageAlert('toast', '', 'عملیات لغو شد', 'error');
                }
            });

    });

    function deleteItem(id, row) {
        var request = $.ajax({
            url: "/customer/orders/" + id,
            type: "DELETE",
            data: {id: id},
            dataType: "json"
        });

        request.done(function (res) {
            if (res.status === "true") {
                var mrow = table.row(row).remove();
                table.rows().draw();
                messageAlert('toast', 'title', 'عملیات حذف با موفقیت انجام شد', 'success');
            } else {
                messageAlert('toast', 'title', res.msg, 'error');
            }
        });

        request.fail(function (jqXHR, textStatus) {
            messageAlert('toast', 'title', "درخواست ناموفق بود", 'error');
        });
    }
});

function changeStatusSwitch(id) {
    console.log(id);
    var loadElement =  $('#orders-table_wrapper');
    loadingElement(loadElement,true);
    var request = $.ajax({
        url: "/customer/orders/status/" + id,
        type: "POST",
        data: {id: id},
        dataType: "json"
    });

    request.done(function (res) {
        console.log(res);
        loadingElement(loadElement,false);
        //table.rows().draw();
    });

    request.fail(function (jqXHR, textStatus) {
        messageAlert('toast', 'title', "درخواست ناموفق بود", 'error');
    });
}

