$(document).ready(function () {

    let validationRules = {
        title: {
            required: true,
        },
        language: {
            required: true,
        },
        type: {
            required: true,
        },
        parent: {
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
        type: {
            required: "لطفا نوع دسته بندی را انتخاب کنید",
        },
        parent: {
            required: "لطفا دسته بندی راانتخاب کنید ",
        }
    };
    formValidation('validate', '#frmCategory', validationRules, validationMessages);

    getCategories($("#type").val());
    // $(document).on("click", "#type", function () {
    //     var select = $("#type option:selected");
    //     var value = select.val();
    //     if (value != null && value.length > 0)
    //         getCategories(select.val());
    //
    // });

    $(document).on("click", "#parent option", function () {
        console.log($(this).data("name"));
        //$(this).val($(this).data("name"));
    });

    function getCategories(type) {
        var request = $.ajax({
            url: "/admin/category/getByType/" + type,
            type: "GET",
            data: {type: type},
            dataType: "json"
        });
        request.done(function (res) {
            if (res.status === "true") {
                $("#category_select").html(res.html);
            } else
                admin_alert("خطایی در انجام عملیات رخ داده است", "error");
        });

        request.fail(function (jqXHR, textStatus) {
            admin_alert("درخواست ناموفق بود", "error");
        });
    }
});
