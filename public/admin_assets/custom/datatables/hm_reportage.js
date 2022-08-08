$(document).ready(function () {
// set data to table
    var table = $("#hm_post-table").DataTable({
        'processing': true,
        'serverSide': true,
        'oLanguage': dataTable_lang,
        "preDrawCallback": function (settings) {
            loadingElement('#hm_post-table_wrapper', true);
        },
        'ajax': "/admin/dtAjaxData/hm_reportage",
        "aoColumnDefs": [{"bSortable": false, "aTargets": [0, 3]}],
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
                    return '  <a href="' + row.photo_address + '" data-popup="lightbox">' +
                        '<img src="' + row.photo_address + '" alt="" class="img-rounded img-preview">' +
                        '</a>';

                }
            },
            // {
            //     "mRender": function (data, type, row) {
            //         var statusTitle = row.status == 0 ? "غیر فعال" : "فعال";
            //         var statusClass = row.status == 0 ? "danger" : "success";
            //         return '<span data-id="' + row.id + '" data-sort="' + row.status + '" class="label label-' + statusClass + ' naw3-row-status">' + statusTitle + '</span>';
            //     },
            //
            // },
            {
                "mRender": function (data, type, row)
                {
                    var statusChecked = row.status === 0 ? "" : " checked ";

                    return '<input type="checkbox" onchange="changeStatusSwitch(' + "'" +  row.id + "'"  + ',this)"   data-on-text="فعال" ' +
                        '  data-off-text="غیر فعال"  class="switch" ' + statusChecked + ' /> ' ;
                },
            },

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
            loadingElement('#hm_post-table_wrapper', false);
        }
    });
//change Status
    $('.naw3-table tbody').on('click', 'tr .naw3-row-status', function () {
        var id = $(this).data("id");
        var row = $(this).find("tr");
        console.log(row);
        changeStatus(id)
    });

    function changeStatus(id)
    {
        var request = $.ajax({
            url: "/admin/hm_reportage/status/" + id,
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
    var loadElement =  $('#hm_post-table_wrapper');
    loadingElement(loadElement,true);
    var request = $.ajax({
        url: "/admin/hm_reportage/status/" + id,
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
