

$(document).ready(function () {

    let validationRulesPassword = {
        current_password: {
            required: true,
        },
        password: {
            required: true,
        },
        password_confirmation: {
            required: true,
        }
    };
    let validationMessagesPassword = {
        current_password: {
            required: "لطفا کلمه عبور فعلی را وارد کنید",
            minlength:"حد اقل طول کلمه عبور فعلی ۶ تا میباشد",
        },
        password: {
            required: "لطفا کلمه عبور را وارد کنید",
            minlength:"حد اقل طول کلمه عبور ۶ تا میباشد",
        },
        password_confirmation:{
            required: "لطفا  تکرار کلمه عبور را وارد کنید",
            minlength:"حد اقل طول تکرار کلمه عبور ۶ تا میباشد",
            equalTo:"#password",
        },
        last_name: {
            required: "لطفا نام خانوادگی را وارد کنید",

        },
        email: {
            email: "ایمیل شما نامعتبر میباشد."
        },
    };
    formValidation('validate', '#frmchangePassword', validationRulesPassword, validationMessagesPassword);

    let validationRulesProfile = {
        first_name: {
            required: true,
        },
        last_name: {
            required: true,
        },
        email: {
            required: true,
        }
    };
    let validationMessagesProfile = {
        first_name: {
            required: "لطفا نام  را وارد کنید",

        },
        last_name: {
            required: "لطفا نام خانوادگی  را وارد کنید",

        },
        email: {
            required: "ایمیل  را وارد کنید",
            email: "ایمیل شما نامعتبر میباشد."
        },
    };
    formValidation('validate', '#frmprofile', validationRulesProfile, validationMessagesProfile);

});
