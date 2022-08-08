$(document).ready(function () {

    let validationRules = {

        to: {
            required: true,
        },
        message: {
            required: true,
        }
    };
    let validationMessages = {
        to: {
            required: "لطفا آدرس گیرنده را وارد کنید",
        },
        message: {
            required: "لطفا پیغام را بنویسید",
        }
    };
    formValidation('validate', '#frmMail', validationRules, validationMessages);


    $("#btnSendMail").on("click", function () {
        loading();
        $.post("/admin/comment/answer", $("#frmMail").serialize(), function (data) {

        })
            .done(function (data) {
                loading(false);
                if(data.status==="false")
                {
                    messageAlert('toast', '', 'خطایی درانجام عملیات رخ داده است', 'error');
                }
                else {
                    messageAlert('toast', '', 'پیام شما با موفقیت ارسال شده است', 'success');
                    successSendMail();
                }
            })
            .fail(function(jqXHR, textStatus, error) {
                loading(false);
                var err = jqXHR.responseText;
                err = $.parseJSON(err);
                for (var k in err.errors) {
                    new PNotify({
                        title: 'خطا !',
                        text: '' + err.errors[k] + '',
                        type: 'error',
                        addclass: "bg-danger"
                    });
                }
            })
            .always(function () {
                //  alert( "finished" );
            });


    });


});

function  successSendMail() {
    window.location.replace("/admin/comment");
}
