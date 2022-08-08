$("#frm_comment").submit(function (event) {
    event.preventDefault();

    if ($("#frm_comment").valid()) {

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

$("#frm_comment").validate({
    errorClass: 'form_error_validation animated bounceIn',
    rules: {
        full_name: {
            required: true,
        },
        email: {
            required: true,
            email: true
        }, content: {
            required: true,
        }
    },
    messages: {
        full_name: {
            required: "لطفا نام و نام خانوادگی  را وارد کنید",
        }, email: {
            required: "لطفا ایمیل  را وارد کنید",
            email: "ایمیل شما معتبر نمی باشد",
        }, content: {
            required: "لطفا پیام  را وارد کنید",
        }
    }
});


function send_message(formData) {

    var request = $.ajax({
        url: "/home/comment",
        type: "POST",
        data: formData,
        dataType: "json"
    });

    function clearForm() {
        $("#frm_comment").find('input,textarea').val('');
        $('[name="post_id"]').val($('#post_id').val());
        $('[name="post_type"]').val($('#post_type').val());
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
        $("#frm_comment").parent().unblock();
        grecaptcha.reset();
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
        $("#frm_comment").parent().unblock();
        grecaptcha.reset();
    });
}

