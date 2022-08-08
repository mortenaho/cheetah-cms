
var formValidator=null;
$(document).ready(function () {


    $('.styled').uniform();

    let validationRules = {

        email: {
            required: true,
            email: true
        },
        password: {
            required: true,
            minlength: 6
        }
    };
    let validationMessages = {

        email: {
            required:requiredUsername,
            email:invalidEmail
        },
        password: {
            required: requiredPasssword,
            minlength: jQuery.validator.format(minLengthPassword("{0}"))
        }

    };
    formValidator =  formValidation('validate', '#loginForm', validationRules, validationMessages);

    $("#loginForm").submit(function (event) {
        event.preventDefault();

        if ($("#loginForm").valid()) {

            userLogin($(this).serialize());
        }
    });

});


function userLogin(formData) {
    loadingElement('.login-form',true);
    console.log(formData);
    var request = $.ajax({
        url: "/login/admin",
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
        loadingElement('.login-form',false);

        if (res.status === "true") {
            messageAlert('toast', '', 'اطلاعات شما تایید شد . بزودی به پنل مدیریت هدایت خواهید شد', 'success');
            window.location.replace("/admin");
        } else {
            messageAlert('toast', '', res.message, 'error');
        }

        clearForm();
        $('.validation-invalid-label').remove();
        $('.validation-valid-label').remove();


    });

    request.fail(function (jqXHR, textStatus) {
        loadingElement('.login-form',false);
        console.log(jqXHR);
        messageAlert('toast', '', "درخواست ناموفق بود", 'error');

    });
}



