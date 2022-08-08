$(document).ready(function () {
    $(".persian-date-picker").persianDatepicker({
        formatDate: "YYYY/0M/0D"
    });

    let validationRules = {
        keywords: {
            required: true,
        },
        description: {
            required: true,
        }
    };
    let validationMessages = {
        keywords: {
            required: "لطفا کلمات کلیدی  را وارد کنید",
            minlength: "حد اقل طول کاراکتر 10  تا میباشد"
        },
        description: {
            required: "لطفا شرح  را وارد کنید",
            minlength: "حد اقل طول کاراکتر 10  تا میباشد"
        }
    };
    formValidation('validate', '#frmsetting', validationRules, validationMessages);


});
