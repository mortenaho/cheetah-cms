// Setup module
// ------------------------------

var ActivateValidation = function() {


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

                otpCode: {
                    required:true,
                    minlength: 4
                },
                hashId: {
                    required:true,
                    minlength: 3
                },
                phone: {
                    required:true,
                    minlength: 10
                }

            },
            messages: {

                otpCode: {
                    required:  "کد OTP  را وارد نمایید",
                    minlength: jQuery.validator.format("حداقل طول نام {0} می باشد")
                },

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
    ActivateValidation.init();
});

$(document).ready(function () {


    $('#activate_user').click(function(e){

        //Stop form submission & check the validation
        e.preventDefault();

        // Variable declaration
        var error = false;
        var hashId = $('#hashId').val();
        var otpCode = $('#otpCode').val();
        var phone = $('#phone').val();

        $('#hashId,#otpCode,#phone').click(function(){
            $(this).removeClass("error_input");
        });

        // Form field validation
        if(hashId.length == 0){
            var error = true;
            $('#hashId').addClass("error_input");
        }else{
            $('#hashId').removeClass("error_input");
        }

        if(otpCode.length == 0){
            var error = true;
            $('#otpCode').addClass("error_input");
        }else{
            $('#otpCode').removeClass("error_input");
        }

        if(phone.length == 0 ){
            var error = true;
            $('#phone').addClass("error_input");
        }else{
            $('#phone').removeClass("error_input");
        }

        // If there is no validation error, next to process the mail function
        if(error == false){
            validateCode();
        }
    });

});

function validateCode() {
    loadingElement('#register_section', true);
    let hashId = $('#hashId').val();
    let phone = $('#phone').val();
    let otp_code = $('#otpCode').val();

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

