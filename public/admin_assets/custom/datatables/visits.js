OrderUrl="visits";
$(document).ready(function () {
// set data to table
    var table = $("#visits-table").DataTable({
        'processing': true,
        "language": {
            processing: '<i class="icon-spinner4 spinner"></i><span class="text-semibold display-block">...</span>'
        },
        'serverSide': true,
        'oLanguage': dataTable_lang,
        "preDrawCallback": function( settings ) {
            loadingElement('#visits-table_wrapper',true);
        },
        'ajax': "/admin/dtAjaxData/visits",
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
            {"data": "post_id"},
            {"data": "user_ip"},
            {"data": "created_at"},
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
                        '<li data-id="' + row.id + '" class="btn btn-warning btn-icon btn-rounded legitRipple btn-show-details" data-href="/admin/visits/' + row.id + '/show"><a ><i class="icon-eye"></i></a></li>' +
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
            loadingElement('#visits-table_wrapper',false);
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
            url: "/admin/visits/status/" + id,
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
        getVisitDetails(id);
    });

    function getVisitDetails(id){

        loadingElement('#visits-table_wrapper',true);
        var request = $.ajax({
            url: "/admin/visits/details/"+ id,
            type: "post",
            data: {id: id},
            dataType: "json"
        });

        request.done(function (res) {
            loadingElement('#visits-table_wrapper',false);
            if (res.status === "true") {
                $(".modal-title").html('جزییات بازدید');
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
            loadingElement('#visits-table_wrapper',false);
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
            url: "/admin/visits/" + id,
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
    var loadElement =  $('#visits-table_wrapper');
    loadingElement(loadElement,true);
    var request = $.ajax({
        url: "/admin/visits/status/" + id,
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

