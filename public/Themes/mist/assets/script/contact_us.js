$("#frm_contact_us").submit(function (event) {
    event.preventDefault();

    if ($("#frm_contact_us").valid()) {

        $(this).parent().block({
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
        send_message($(this).serialize());
    }
});

$("#frm_contact_us").validate({
    errorClass: 'form_error_validation animated bounceIn',
    rules: {
        full_name: {
            required: true,
        },
        email: {
            required: true,
            email: true
        }, message: {
            required: true,
        }
    },
    messages: {
        full_name: {
            required: "لطفا نام و نام خانوادگی  را وارد کنید",
        }, email: {
            required: "لطفا ایمیل  را وارد کنید",
            email: "ایمیل شما معتبر نمی باشد",
        }, message: {
            required: "لطفا پیام  را وارد کنید",
        }
    }
});


function send_message(formData) {

    console.log(formData);
    var request = $.ajax({
        url: "/home/contact_us",
        type: "POST",
        data: formData,
        dataType: "json"
    });

    function clearForm() {
        $("#frm_contact_us").find('input,textarea').val('');

    }

    request.done(function (res) {
        if (res.status === "true") {
            Swal.fire({
                type: 'success',
                text: 'پیام شما با موفقیت ارسال شد.',
                confirmButtonText:"تایید"
            });

        } else {
            Swal.fire({
                type: 'error',
                text: 'خطایی در ارسال پیام رخ داده است لطفا دوباره تلاش کنید ',
                confirmButtonText:"تایید"
            });

        }
        clearForm();
        $("#frm_contact_us").parent().unblock();
    });

    request.fail(function (jqXHR, textStatus) {
        var err = jqXHR.responseText;
        err = $.parseJSON(err);
        var msg = "";
        for (var k in err.errors) {
            msg += "<label style='font-family:Tahoma' class='text-danger'>"+err.errors[k] + '</label><br>';
        }
        Swal.fire({
            type: 'error',
            html: msg,
            confirmButtonText:"تایید"
        });
        $("#frm_contact_us").parent().unblock();
    });
}

