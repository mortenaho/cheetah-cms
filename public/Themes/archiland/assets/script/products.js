$(document).on("click", ".product_details", function (event) {
    id = $(this).data("pid");
    $("#product-box-" + id).block({
        message: '<i class="fa fa-spinner rotate-scale-up"></i>',
        overlayCSS: {
            backgroundColor: '#fff',
            opacity: 0.8,
            cursor: 'wait'
        },
        css: {
            border: 0,
            padding: 0,
            backgroundColor: 'none'
        }
    });
    send_message(id);
});


function send_message(id) {

    var request = $.ajax({
        url: "/home/product-details",
        type: "POST",
        data: {product_id: id},
        dataType: "json"
    });


    request.done(function (res) {
        if (res.status === "true") {
            $("#modal-load").html(res.html);
            $("#tm-product-quickview").modal("show");

        } else {
            Swal.fire({
                type: 'error',
                text: 'خطایی در ارسال پیام رخ داده است لطفا دوباره تلاش کنید ',
                confirmButtonText: "تایید"
            });

        }

        $("#product-box-" + id).unblock();
    });

    request.fail(function (jqXHR, textStatus) {
        var err = jqXHR.responseText;
        err = $.parseJSON(err);
        var msg = "";
        for (var k in err.errors) {
            msg += "<label style='font-family:Tahoma' class='text-danger'>" + err.errors[k] + '</label><br>';
        }
        Swal.fire({
            type: 'error',
            html: msg,
            confirmButtonText: "تایید"
        });
        $("#product-box-" + id).unblock();
    });
}

