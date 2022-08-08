$(document).ready(function () {


//change Status

//delete row
    $('.naw3-table tbody').on('click', 'tr', function () {
        var id = $(this).children(".naw3-btn-delete-row").data("id");
        var table = $("#slider-table").DataTable();
        var row = this;
        console.log(row);
        // Setup
        var notice = new PNotify({
            title: warning,
            text: '<p>'+qDeleteRor+'</p>',
            hide: false,
            type: 'mori-confirm',
            addclass: 'pnotify-center pnotify-confirm',
            confirm: {
                confirm: true,
                buttons: [
                    {
                        text:ok,
                        addClass: 'btn btn-sm btn-primary'
                    },
                    {
                        text: cancel,
                        addClass: 'btn btn-sm btn-link'
                    }
                ]
            },
            buttons: {
                closer: false,
                sticker: false
            },
            history: {
                history: false
            },

        });

        // On confirm
        notice.get().on('pnotify.confirm', function () {
            deleteItem(id, row);
        });

        // On cancel
        notice.get().on('pnotify.cancel', function () {

        });
    });

    function deleteItem(id, row) {
        var table = $("#slider-table").DataTable();
        var mrow = table.row(row).remove();
      //  table.rows().draw();
        console.log(mrow);
        // var request = $.ajax({
        ////     url: "/admin/Slider/"+id,
        //     type: "DELETE",
        //     data: {id : id},
        //     dataType: "json"
        // });
        //
        // request.done(function(res) {
        //    var table= $("#slider-table").DataTable();
        //
        //    console.log(table.row(row).data());
        // });
        //
        // request.fail(function(jqXHR, textStatus) {
        //     alert( "Request failed: " + textStatus );
        //     noty({
        //         text:"درخواست ناموفق بود"+ textStatus,
        //         type:"error",
        //         layout: 'topCenter',
        //     })
        // });
    }

});
