$(document).ready(function () {

    let validationRules = {
        title: {
            required: true,
        },
        language: {
            required: true,
        },
        thumb: {
            required: true,
        }
    };
    let validationMessages = {
        title: {
            required: "لطفا عنوان  را وارد کنید",
        },
        language: {
            required: "لطفا زبان را انتخاب کنید",
        },
        thumb: {
            required: "لطفا تصویر را انتخاب کنید",
        }
    };
    formValidation('validate', '#frmClient', validationRules, validationMessages);

});
