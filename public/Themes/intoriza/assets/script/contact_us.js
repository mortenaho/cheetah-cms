
$(document).ready(function () {
    //TODO handle validation
    // $("#frm_contact_us").validate({
    //     rules: {
    //         full_name: {
    //             required:true
    //         },
    //         email : {
    //             required:true,
    //             email: true
    //         },
    //         subject : {
    //             required:true
    //         },
    //         message: {
    //             required:true
    //         }
    //     },
    //     messages:{
    //         full_name: {
    //             required: "لطفا نام  را وارد کنید",
    //         },
    //         email: {
    //             required: "لطفا ایمیل را وارد کنید",
    //             email: "ایمیل شما معتبر نمی باشد",
    //         },
    //         subject: {
    //             required: "لطفا موضوع  را وارد کنید",
    //         },
    //         message: {
    //             required: "لطفا پیام را وارد نمایید ",
    //         }
    //     }
    // });


    $("#frm_contact_us").submit(function (event) {
        console.log(event);
        event.preventDefault();

        //if ($("#frm_contact_us").valid()) {
            send_message($(this).serialize());
        //}
    });

});


function send_message(formData) {
    loadingElement('.contact-message',true);
    console.log(formData);
    var request = $.ajax({
        url: "/home/contact_us",
        type: "POST",
        data: formData,
        dataType: "json"
    });

    function clearForm() {
        $("#full_name").val('');
        $("#email").val('');
        $("#subject").val('');
        $("#message").val('');
    }

    request.done(function (res) {
        loadingElement('.contact-message',false);



        if (res.status === "true") {
            Swal.fire({
                type: 'success',
                text: 'پیام شما با موفقیت ارسال شد',
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
        $('.validation-invalid-label').remove();
        $('.validation-valid-label').remove();


    });

    request.fail(function (jqXHR, textStatus) {
        loadingElement('.contact-message',false);
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

    });
}

