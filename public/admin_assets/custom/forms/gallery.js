$(document).ready(function () {

    let validationRules = {
        title: {
            minlength: 5
        },
        photo: {
            required: true
        }
    };
    let validationMessages = {
        title: {
            minlength: "شما باید بیشتر از ۵ کاراکتر بنویسید"
        },
        photo: {
            required: "لطفا یک تصویر را برای گالری انتخاب کنید",
        }
    };
    formValidation('validate', '#frmGallery', validationRules, validationMessages);
});
