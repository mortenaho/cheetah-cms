$(document).ready(function () {
    $('#register_user').click(function(e){

        //Stop form submission & check the validation
        e.preventDefault();

        // Variable declaration
        var error = false;
        var first_name = $('#firstName').val();
        var last_name = $('#lastName').val();
        var email = $('#email').val();
        var phone = $('#phone').val();
        var password = $('#password').val();
        var rePassword = $('#rePassword').val();

        $('#first_name,#last_name,#email,#phone,#password,#rePassword').click(function(){
            $(this).removeClass("error_input");
        });

        // Form field validation
        if(first_name.length == 0){
            var error = true;
            $('#firstName').addClass("error_input");
        }else{
            $('#firstName').removeClass("error_input");
        }
        if(last_name.length == 0){
            var error = true;
            $('#lastName').addClass("error_input");
        }else{
            $('#lastName').removeClass("error_input");
        }
        if(email.length == 0 || email.indexOf('@') == '-1'){
            var error = true;
            $('#email').addClass("error_input");
        }else{
            $('#email').removeClass("error_input");
        }
        if(phone.length == 0){
            var error = true;
            $('#phone').addClass("error_input");
        }else{
            $('#phone').removeClass("error_input");
        }
        if(password.length == 0){
            var error = true;
            $('#password').addClass("error_input");
        }else{
            $('#password').removeClass("error_input");
        }
        if(rePassword.length == 0){
            var error = true;
            $('#rePassword').addClass("error_input");
        }else{
            $('#rePassword').removeClass("error_input");
        }

        if(rePassword !== password){
            var error = true;
            messageAlert('toast', '', 'کلمه عبور با تکرار آن برابر نیست', 'error');
        }
        // If there is no validation error, next to process the mail function
        if(error == false){
            register();
        }
    });

    $('#mobile_number_activate').click(function(e){

        //Stop form submission & check the validation
        e.preventDefault();

        // Variable declaration
        var error = false;

        var otp = $('#otp_code').val();
        var phone = $('#phone').val();


        $('#phone,#otp_code').click(function(){
            $(this).removeClass("error_input");
        });


        if(phone.length == 0){
            var error = true;
            $('#phone').addClass("error_input");
        }else{
            $('#phone').removeClass("error_input");
        }
        if(otp.length == 0){
            var error = true;
            $('#otp_code').addClass("error_input");
        }else{
            $('#otp_code').removeClass("error_input");
        }

        // If there is no validation error, next to process the mail function
        if(error == false){
            validateCode();
        }
    });

    $('#resend_activation_code').click(function(e){

        //Stop form submission & check the validation
        e.preventDefault();

        // Variable declaration
        var error = false;
        var phone = $('#phone').val();


        $('#phone').click(function(){
            $(this).removeClass("error_input");
        });


        if(phone.length == 0){
            var error = true;
            $('#phone').addClass("error_input");
        }else{
            $('#phone').removeClass("error_input");
        }

        // If there is no validation error, next to process the mail function
        if(error == false){
            resendCode();
        }
    });
});

function login() {
    loadingElement('#login_section', true);
    let userName = $('#userName').val();
    let userPass = $('#userPass').val();
    var request = $.ajax({
        url: "/home/login",
        type: "POST",
        data: {
            "_token": $('input[name=_token]').val(),
            "email": userName,
            "password": userPass
        },
        dataType: "json"
    });

    request.done(function (res) {
        loadingElement('#login_section', false);

        if (res.status === "true") {
            messageAlert('toast', '', 'عملیات با موفقیت انجام شد', 'success');
            window.location.replace("/");
        } else {
            messageAlert('toast', '', 'خطایی در انجام عملیات رخ داده است', 'error');
        }

        $('.validation-invalid-label').remove();
        $('.validation-valid-label').remove();


    });

    request.fail(function (jqXHR, textStatus) {
        loadingElement('#login_section', false);
        messageAlert('toast', '', 'خطایی در انجام عملیات رخ داده است', 'error');
    });
}

function register() {
    loadingElement('#register_section', true);
    let firstName = $('#firstName').val();
    let lastName = $('#lastName').val();
    let email = $('#email').val();
    let phone = $('#phone').val();
    let address = $('#address').val();
    let postal_code = $('#postal_code').val();
    let password = $('#password').val();
    let rePassword = $('#rePassword').val();

    var request = $.ajax({
        url: "/home/register",
        type: "POST",
        data: {
            "_token": $('input[name=_token]').val(),
            "first_name": firstName,
            "last_name": lastName,
            "email": email,
            "mobile": phone,
            "address": address,
            "postal_code": postal_code,
            "password": password,
            "rePassword": rePassword,
        },
        dataType: "json"
    });

    request.done(function (res) {
        loadingElement('#register_section', false);

        if (res.status === "true") {
            messageAlert('toast', '', 'عملیات با موفقیت انجام شد', 'success');
            $('#user_activation').fadeIn(300);
        } else {
            messageAlert('toast', '', res.message, 'error');
        }

        $('.validation-invalid-label').remove();
        $('.validation-valid-label').remove();


    });

    request.fail(function (jqXHR, textStatus) {
        loadingElement('#register_section', false);
        messageAlert('toast', '', 'خطایی در انجام عملیات رخ داده است', 'error');
    });
}

function validateCode() {
    loadingElement('#register_section', true);

    let phone = $('#phone').val();
    let otp_code = $('#otp_code').val();

    var request = $.ajax({
        url: "/home/validateCode",
        type: "POST",
        data: {
            "_token": $('input[name=_token]').val(),

            "mobile": phone,
            "otp": otp_code,
        },
        dataType: "json"
    });

    request.done(function (res) {
        loadingElement('#register_section', false);

        if (res.status === "true") {
            messageAlert('toast', '', 'عملیات با موفقیت انجام شد', 'success');
            //window.location.replace("/");
        } else {
            messageAlert('toast', '', res.message, 'error');
        }

        $('.validation-invalid-label').remove();
        $('.validation-valid-label').remove();


    });

    request.fail(function (jqXHR, textStatus) {
        loadingElement('#register_section', false);
        messageAlert('toast', '', 'خطایی در انجام عملیات رخ داده است', 'error');
    });
}

function resendCode() {
    loadingElement('#register_section', true);

    let phone = $('#phone').val();

    var request = $.ajax({
        url: "/home/resendCode",
        type: "POST",
        data: {
            "_token": $('input[name=_token]').val(),
            "mobile": phone
        },
        dataType: "json"
    });

    request.done(function (res) {
        loadingElement('#register_section', false);

        if (res.status === "true") {
            messageAlert('toast', '', 'عملیات با موفقیت انجام شد', 'success');
        } else {
            messageAlert('toast', '', res.message, 'error');
        }

        $('.validation-invalid-label').remove();
        $('.validation-valid-label').remove();


    });

    request.fail(function (jqXHR, textStatus) {
        loadingElement('#register_section', false);
        messageAlert('toast', '', 'خطایی در انجام عملیات رخ داده است', 'error');
    });
}
