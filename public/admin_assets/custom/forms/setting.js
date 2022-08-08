$(document).ready(function () {
    $(".persian-date-picker").persianDatepicker({
        formatDate: "YYYY/0M/0D"
    });

    let validationRules = {
        title: {
            required: true,
        },
        contact_info: {
            required: true,
        },
        site_name: {
            required: true,
        }
    };
    let validationMessages = {
        title: {
            required: "لطفا عنوان  را وارد کنید",
            minlength: "حد اقل طول کاراکتر ۱۰ تا میباشد"
        },
        email: {
            email: "ایمیل شما نامعتبر میباشد."
        },
        contact_info: {
            contact_info: "ایمیل سایت شما نامعتبر میباشد."
        },
        site_name: {
            required: "لطفا نام سایت را وارد کنید ",
        }
    };
    formValidation('validate', '#frmsetting', validationRules, validationMessages);


});
