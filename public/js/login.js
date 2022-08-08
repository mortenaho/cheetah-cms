$(document).ready(function () {

    $('#login_user').click(function(e){

        //Stop form submission & check the validation
        e.preventDefault();

        // Variable declaration
        var error = false;
        var username = $('#username').val();
        var password = $('#password').val();
        $('#password,#username').click(function(){
            $(this).removeClass("error_input");
        });

        // Form field validation

        if(username.length == 0 || username.indexOf('@') == '-1'){
            var error = true;
            $('#username').addClass("error_input");
        }else{
            $('#username').removeClass("error_input");
        }

        if(password.length == 0){
            var error = true;
            $('#password').addClass("error_input");
        }else{
            $('#password').removeClass("error_input");
        }
        // If there is no validation error, next to process the mail function
        if(error == false){
            login();
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
    loadingElement('.login-form', true);
    let userName = $('#username').val();
    let userPass = $('#password').val();
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
        loadingElement('.login-form', false);

        if (res.status === "true") {
            messageAlert('toast', '', 'عملیات با موفقیت انجام شد', 'success');
            window.location.replace("/");
        } else {
            console.log('login failed');
            messageAlert('toast', '', 'نام کاربری یا کلمه عبور اشتباه می باشد', 'error');
        }

        $('.validation-invalid-label').remove();
        $('.validation-valid-label').remove();


    });

    request.fail(function (jqXHR, textStatus) {
        loadingElement('.login-form', false);
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
