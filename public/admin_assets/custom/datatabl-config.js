
$(function () {

    // Setting datatable defaults
    $.extend($.fn.dataTable.defaults, {
        buttons: {
            buttons: [
                {
                    extend: 'copyHtml5',
                    className: 'btn btn-default',
                    text: '<i class=" icon-copy4" data-toggle="tooltip" title="کپی"></i> ',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                {
                    extend: 'excelHtml5',
                    className: 'btn btn-default',
                    text: '<i class="icon-file-excel" data-toggle="tooltip" title="فایل Excel"></i> ',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'print',
                    text: '<i class="icon-printer2" data-toggle="tooltip" title="چاپ"></i> ',
                    className: 'btn btn-default',
                    customize: function ( win ) {
                        $(win.document.body)
                            .css( 'font-size', '10pt' )
                            //.prepend(
                            //    '<img src="http://datatables.net/media/images/logo-fade.png" style="position:absolute; top:0; left:0;" />'
                            //);
 
                        $(win.document.body).find( 'table' )
                            .addClass( 'compact' )
                            .css( 'font-size', 'inherit' );
                    }
                
                },
                {
                    extend: 'colvis',
                    text: '<i class="icon-three-bars"></i> <span class="caret"></span>',
                    className: 'btn bg-blue btn-icon'
                }
            ]
        },
        autoWidth: false,
        responsive: true,
        "aaSorting": [
           // [0, "asc"]
        ],
        dom: '<"datatable-header"fBl><"datatable-scroll-wrap"t><"datatable-footer"ip>',
        language: {
            "sEmptyTable": "موردی برای نمایش یافت نشد",
            "sInfo": "نمایش _START_ تا _END_ از مجموع _TOTAL_ مورد",
            "sInfoEmpty": "موردی برای نمایش در دسترس نمی باشد",
            "sInfoFiltered": "(فیلتر شده از مجموع _MAX_ مورد)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "نمایش _MENU_ ",
            "sLoadingRecords": "درحال بارگذاری...",
            "sProcessing": "درحال پردازش...",
            "sSearch": "جستجو : ",
            "sZeroRecords": "موردی یافت نشد",
            "oPaginate": {
                "sFirst": "ابتدا",
                "sPrevious": "قبلی",
                "sNext": "بعدی",
                "sLast": "انتها"
            },
            "oAria": {
                "sSortAscending": ": مرتب سازی به صورت صعودی",
                "sSortDescending": ": مرتب سازی به صورت نزولی"
            }
        }
    });
});