$(document).ready(function () {
    $("#frmCategory").validate({
        ignore: "hidden",
        rules: {
            title: {
                required: true,
            },
            parent: {
                required: true,
            }
        },
        messages: {
            title: {
                required: "لطفا عنوان  را وارد کنید",
            },
            parent: {
                required: "لطفا دسته بندی را انتخاب کنید ",
            }
        }
    });



    $(document).on("click", "#parent option", function () {
        console.log($(this).data("name"));
        //$(this).val($(this).data("name"));
    });

});
