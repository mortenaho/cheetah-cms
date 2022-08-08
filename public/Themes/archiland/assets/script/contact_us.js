
$(document).ready(function () {
    $('#send_message').click(function(e){

        //Stop form submission & check the validation
        e.preventDefault();

        // Variable declaration
        var error = false;
        var name = $('#full_name').val();
        var email = $('#email').val();
        var subject = $('#subject').val();
        var message = $('#message').val();

        $('#full_name,#email,#subject,#message').click(function(){
            $(this).removeClass("error_input");
        });

        // Form field validation
        if(name.length == 0){
            var error = true;
            $('#full_name').addClass("error_input");
        }else{
            $('#full_name').removeClass("error_input");
        }
        if(email.length == 0 || email.indexOf('@') == '-1'){
            var error = true;
            $('#email').addClass("error_input");
        }else{
            $('#email').removeClass("error_input");
        }
        if(subject.length == 0){
            var error = true;
            $('#subject').addClass("error_input");
        }else{
            $('#subject').removeClass("error_input");
        }
        if(message.length == 0){
            var error = true;
            $('#message').addClass("error_input");
        }else{
            $('#message').removeClass("error_input");
        }

        // If there is no validation error, next to process the mail function
        if(error == false){
            send_message($("#contact_form").serialize());
        }
    });


    // $("#contact_form").submit(function (event) {
    //     console.log(event);
    //     event.preventDefault();
    //
    //     //if ($("#frm_contact_us").valid()) {
    //         send_message($(this).serialize());
    //     //}
    // });

});


function send_message(formData) {
    loadingElement('#contact_form',true);
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
        loadingElement('#contact_form',false);



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
        loadingElement('#contact_form',false);
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

