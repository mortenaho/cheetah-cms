/* ------------------------------------------------------------------------------
 *
 *  # Login form with validation
 *
 *  Demo JS code for login_validation.html page
 *
 * ---------------------------------------------------------------------------- */


// Setup module
// ------------------------------

var LoginValidation = function() {


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
                username:{
                    email: true
                },
                password: {
                    minlength: 6
                }
            },
            messages: {
                username: {
                    required:  "نام کاربری را وارد نمایید",
                    email: "ایمیل نامعتبر می باشد",

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
    LoginValidation.init();
});


////Add this code in a separate file/script included after the validation plugin to override the messages, edit at will :)
// jQuery.extend(jQuery.validator.messages, {
//     required: "This field is required.",
//     remote: "Please fix this field.",
//     email: "Please enter a valid email address.",
//     url: "Please enter a valid URL.",
//     date: "Please enter a valid date.",
//     dateISO: "Please enter a valid date (ISO).",
//     number: "Please enter a valid number.",
//     digits: "Please enter only digits.",
//     creditcard: "Please enter a valid credit card number.",
//     equalTo: "Please enter the same value again.",
//     accept: "Please enter a value with a valid extension.",
//     maxlength: jQuery.validator.format("Please enter no more than {0} characters."),
//     minlength: jQuery.validator.format("Please enter at least {0} characters."),
//     rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characters long."),
//     range: jQuery.validator.format("Please enter a value between {0} and {1}."),
//     max: jQuery.validator.format("Please enter a value less than or equal to {0}."),
//     min: jQuery.validator.format("Please enter a value greater than or equal to {0}.")
// });
