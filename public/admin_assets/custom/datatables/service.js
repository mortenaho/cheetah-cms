$(document).ready(function () {

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
            url: "/admin/service/" + id,
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

    // set data to table
    var table = $("#service-table").DataTable({
        'processing': true,
        'serverSide': true,
        'oLanguage': dataTable_lang,
        "preDrawCallback": function (settings) {
            loadingElement('#service-table_wrapper', true);
        },
        'ajax': "/admin/dtAjaxData/service",
        "fnCreatedRow": function (nRow, aData, iDataIndex) {
            $(nRow).attr('data-ordering', aData["ordering"]);
            $(nRow).attr('data-id', aData["id"]);

        },
        "aoColumnDefs": [{"bSortable": false, "aTargets": [0, 3, 4, 5]}],
        "columns": [
            {
                "render": function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            {"data": "title"},
            {"data": "reg_date"},
            {
                "mRender": function (data, type, row) {
                    return '  <a href="' + row.thumb + '" data-popup="lightbox">' +
                        '<img src="' + row.thumb + '" alt="" class="img-rounded img-preview">' +
                        '</a>';
                }
            },
            {
                "mRender": function (data, type, row) {
                    var statusChecked = row.status === 0 ? "" : " checked ";
                    var featuredChecked = row.featured === 0 ? "" : " checked ";

                    return '<input type="checkbox" onchange="changeStatusSwitch(' + row.id + ',this)"   data-on-text="فعال" ' +
                        '  data-off-text="غیر فعال"  class="switch" ' + statusChecked + ' /> ' +
                        ' <input type="checkbox" onchange="changeFeaturedSwitch(' + row.id + ')" class="switch"  data-on-text="ويژه" data-off-text="معمولی"  ' + featuredChecked + ' />';
                },
            },
            {
                "mRender": function (data, type, row) {
                    return '<ul class="icons-list">' +
                        '<li class="btn btn-primary btn-icon btn-rounded  legitRipple"><a href="/admin/service/' + row.id + '/edit" class="text-white"><i class="icon-pencil7"></i></a></li>' +
                        '<li  data-id="' + row.id + '" class="btn btn-danger btn-icon btn-rounded legitRipple naw3-btn-delete-row"><a><i class="icon-trash"></i></a></li>' +
                        '</ul>';
                },
            }
        ],
        'initComplete': function () {

        },
        "drawCallback": function (settings) {
            $("input.switch:checkbox").each(function (index, element) {
                var init = new Switchery(element, {
                    size: 'small', color: '#477FC5', secondaryColor: '#CCCCCC'
                    , onText: 'فعال',
                    offText: 'غیر فعال',
                });
            });

            $(".styled").uniform({
                radioClass: 'choice'
            });
            loadingElement('#service-table_wrapper', false);
        }
    });

    //change Status
    $('.naw3-table tbody').on('click', 'tr .naw3-row-status', function () {
        var id = $(this).data("id");
        var row = $(this).find("tr");
        changeStatus(id)
    });

    function changeStatus(id) {
        var request = $.ajax({
            url: "/admin/service/status/" + id,
            type: "POST",
            data: {id: id},
            dataType: "json"
        });

        request.done(function (res) {
            table.rows().draw();
        });

        request.fail(function (jqXHR, textStatus) {
            messageAlert('toast', 'title', "درخواست ناموفق بود", 'error');
        });
    }

    $('.naw3-table tbody').on('click', 'tr .naw3-row-featured', function () {
        var id = $(this).data("id");
        var row = $(this).find("tr");
        changeFeatured(id)
    });

    function changeFeatured(id) {
        var request = $.ajax({
            url: "/admin/service/featured/" + id,
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



});

function changeStatusSwitch(id) {
    console.log(id);
    var loadElement = $('#service-table_wrapper');
    loadingElement(loadElement, true);
    var request = $.ajax({
        url: "/admin/service/status/" + id,
        type: "POST",
        data: {id: id},
        dataType: "json"
    });

    request.done(function (res) {
        console.log(res);
        loadingElement(loadElement, false);
        //table.rows().draw();
    });

    request.fail(function (jqXHR, textStatus) {
        messageAlert('toast', 'title', "درخواست ناموفق بود", 'error');
    });
}

function changeFeaturedSwitch(id) {
    var loadElement = $('#service-table_wrapper');
    loadingElement(loadElement, true);
    var request = $.ajax({
        url: "/admin/service/featured/" + id,
        type: "POST",
        data: {id: id},
        dataType: "json"
    });

    request.done(function (res) {
        console.log(res);
        loadingElement(loadElement, false);
        //table.rows().draw();
    });

    request.fail(function (jqXHR, textStatus) {
        messageAlert('toast', 'title', "درخواست ناموفق بود", 'error');
    });
}




