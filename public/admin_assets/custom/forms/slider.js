$(document).ready(function () {
    $(".persian-date-picker").persianDatepicker({
        formatDate: "YYYY/0M/0D"
    });

    let validationRules = {
        title: {
            required: true,
        },
        photo: {
            required: true,
        }
    };
    let validationMessages = {
        title: {
            minlength: "شما باید بیشتر از ۵ کاراکتر بنویسید"
        },
        sub_title: {
            minlength: "شما باید بیشتر از ۱۰ کاراکتر بنویسید"
        },
        photo: {
            required: "لطفا یک تصویر را برای اسلایدر انتخاب کنید",
        },
        link: {
            url: "لطفا آدرس اینترنتی را درست وارد کنید"
        }
    };
    formValidation('validate', '#frmSlider', validationRules, validationMessages);
});
