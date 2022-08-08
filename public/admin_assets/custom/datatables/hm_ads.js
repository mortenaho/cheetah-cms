$(document).ready(function () {
// set data to table
    var table = $("#hm_ads-table").DataTable({
        'processing': true,
        'serverSide': true,
        'oLanguage': dataTable_lang,
        "preDrawCallback": function( settings ) {
            loadingElement('#hm_ads-table_wrapper',true);
        },
        'ajax': "/admin/dtAjaxData/hm_ads",
        "aoColumnDefs": [{"bSortable": false, "aTargets": [0,2,3]}],
        "columns": [
            {
                "render": function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            {"data": "title"},
            {
                "mRender": function (data, type, row) {
                    return '  <a href="' + row.photo_address + '" data-popup="lightbox">' +
                        '<img src="' + row.photo_address + '" alt="" class="img-rounded img-preview">' +
                        '</a>';

                }
            },
            {
                "mRender": function (data, type, row)
                {
                    var statusChecked = row.status === 0 ? "" : " checked ";
                    return '<input type="checkbox"  disabled  data-on-text="فعال" ' +
                        '  data-off-text="غیر فعال"  class="switch" ' + statusChecked + ' /> ' ;
                },
            },

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
            loadingElement('#hm_ads-table_wrapper',false);
        }
    });

});

