$(document).ready(function () {

    let validationRules = {
        title: {
            required: true,
        },
        icon: {
            required: true,
        },
        link: {
            required: true,
        }
    };
    let validationMessages = {
        title: {
            required: "لطفا عنوان  را وارد کنید",
        },
        icon: {
            required: "لطفا یک تصویر را برای شبکه اجتماعی انتخاب کنید",
        },
        link: {
            required: "لطفا آدرس  را وارد کنید",
            url: "لطفا آدرس اینترنتی را درست وارد کنید"
        }
    };
    formValidation('validate', '#frmSocial', validationRules, validationMessages);

});
