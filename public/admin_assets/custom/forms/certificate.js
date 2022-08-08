$(document).ready(function () {


    let validationRules = {
        title: {
            required: true,
        },
        language: {
            required: true,
        },
        content: {
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
        content: {
            required: "لطفا محتوا را پر نمایید ",
        }
    };
    formValidation('validate', '#frmCertificate', validationRules, validationMessages);

    // $("#frmCertificate").validate({
    //     ignore: "hidden",
    //     rules: {
    //         title: {
    //             required: true,
    //         },
    //         language: {
    //             required: true,
    //         },
    //         content: {
    //             required: true,
    //         }
    //     },
    //     messages: {
    //         title: {
    //             required: "لطفا عنوان  را وارد کنید",
    //         },
    //         language: {
    //             required: "لطفا زبان را انتخاب کنید",
    //         },
    //         content: {
    //             required: "لطفا محتوا را پر نمایید ",
    //         }
    //     }
    // });
});



