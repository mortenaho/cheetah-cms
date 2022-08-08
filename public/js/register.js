// Setup module
// ------------------------------

var RegisterValidation = function() {


    //
    // Setup module components
    //

    // Uniform
    var _componentUniform = function() {
        if (!$().uniform) {
            console.warn('Warning - uniform.min.js is not loaded.');
            return;
        }

        // Initialize
        $('.form-input-styled').uniform();
    };

    // Validation config
    var _componentValidation = function() {
        if (!$().validate) {
            console.warn('Warning - validate.min.js is not loaded.');
            return;
        }

        // Initialize
        var validator = $('.form-validate').validate({
            ignore: 'input[type=hidden], .select2-search__field', // ignore hidden fields
            errorClass: 'validation-invalid-label',
            successClass: 'validation-valid-label',
            validClass: 'validation-valid-label',
            highlight: function(element, errorClass) {
                $(element).removeClass(errorClass);
            },
            unhighlight: function(element, errorClass) {
                $(element).removeClass(errorClass);
            },
            success: function(label) {
                label.addClass('validation-valid-label').text('صحیح است'); // remove to hide Success message
            },

            // Different components require proper error label placement
            errorPlacement: function(error, element) {

                // Unstyled checkboxes, radios
                if (element.parents().hasClass('form-check')) {
                    error.appendTo( element.parents('.form-check').parent() );
                }

                // Input with icons and Select2
                else if (element.parents().hasClass('form-group-feedback') || element.hasClass('select2-hidden-accessible')) {
                    error.appendTo( element.parent() );
                }

                // Input group, styled file input
                else if (element.parent().is('.uniform-uploader, .uniform-select') || element.parents().hasClass('input-group')) {
                    error.appendTo( element.parent().parent() );
                }

                // Other elements
                else {
                    error.insertAfter(element);
                }
            },
            rules: {
                email:{
                    required:true,
                    email: true
                },
                firstName: {
                    required:true,
                    minlength: 3
                },
                lastName: {
                    required:true,
                    minlength: 3
                },
                password: {
                    required:true,
                    minlength: 6
                }

            },
            messages: {
                email: {
                    required:  "نام کاربری را وارد نمایید",
                    email: "ایمیل نامعتبر می باشد",
                },
                firstName: {
                    required:  "نام  را وارد نمایید",
                    minlength: jQuery.validator.format("حداقل طول نام {0} می باشد")
                },
                lastName: {
                    required:  "نام خانوادگی را وارد نمایید",
                    minlength: jQuery.validator.format("حداقل طول نام خانوادگی {0} می باشد")
                },
                password: {
                    required: "کلمه عبور را وارد نمایید",
                    minlength: jQuery.validator.format("حداقل طول کلمه عبور {0} می باشد")
                }
            }
        });
    };


    //
    // Return objects assigned to module
    //

    return {
        init: function() {
            _componentUniform();
            _componentValidation();
        }
    }
}();


// Initialize module
// ------------------------------

document.addEventListener('DOMContentLoaded', function() {
     RegisterValidation.init();
});

$(document).ready(function () {


    $('#register_user').click(function(e){

        //Stop form submission & check the validation
        e.preventDefault();

        // Variable declaration
        var error = false;
        var firstName = $('#firstName').val();
        var lastName = $('#lastName').val();
        var email = $('#email').val();
        var phone = $('#phone').val();
        var password = $('#password').val();
        var rePassword = $('#rePassword').val();

        $('#firstName,#lastName,#email,#phone,#password,#rePassword').click(function(){
            $(this).removeClass("error_input");
        });

        // Form field validation
        if(firstName.length == 0){
            var error = true;
            $('#firstName').addClass("error_input");
        }else{
            $('#firstName').removeClass("error_input");
        }
        if(lastName.length == 0){
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

});

function register() {
    loadingElement('.register-form', true);
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
        loadingElement('.register-form', false);
       console.log(res);
        if (res.status === "true") {
            messageAlert('toast', '', 'عملیات با موفقیت انجام شد', 'success');
            window.location.replace("/fa/home/activate/" + res.hashId);
        } else {
            messageAlert('toast', '', res.message, 'error');
        }

        $('.validation-invalid-label').remove();
        $('.validation-valid-label').remove();


    });

    request.fail(function (jqXHR, textStatus) {
        loadingElement('.register-form', false);
        messageAlert('toast', '', 'خطایی در انجام عملیات رخ داده است', 'error');
    });
}

