var selected_message = [];
$(document).on("click", "#btn_delete_mail", function () {
    // swal({
    //         title: "هشدار !",
    //         text: "آیا از حذف این آیتم مطمئن هستید ؟",
    //         type: "warning",
    //         showCancelButton: true,
    //         confirmButtonColor: "#EF5350",
    //         confirmButtonText: "بله",
    //         cancelButtonText: "خیر",
    //         closeOnConfirm: false,
    //         closeOnCancel: false,
    //         showLoaderOnConfirm: true
    //     },
    //     function (isConfirm) {
    //         if (isConfirm) {
    //             if (selected_message.length > 0) {
    //                 deleteItem(selected_message);
    //             }
    //         } else {
    //             swal({
    //                 title: "انصراف",
    //                 text: "اطلاعات شما امن شده است  :)",
    //                 confirmButtonColor: "#2196F3",
    //                 type: "error",
    //                 confirmButtonText: "بله"
    //             });
    //         }
    //     });

    questionAlert('swal', 'هشدار', 'آیا از حذف این آیتم مطمئن هستید ؟', 'warning', 'بله', 'خیر')
        .then(function (result) {
            if (result === 'confirm') {
                if (selected_message.length > 0) {
                    deleteItem(selected_message);
                }
            } else {
                messageAlert('toast', '', 'عملیات لغو شد', 'error');
            }
        });
});

$(document).on("click", "#checked_all", function () {

    if ($(this).find("div>span.checked").length !== 0) {
        $(".chk_mail").prop("checked", true);
        $("#btn_delete_mail").removeClass("hidden");
        $("tr").addClass("warning selected_message");
        selected_message = [];
        $(".selected_message").each(function (index) {
            var id = $(this).data("row");
            selected_message.push(id);
        });
    } else {
        $(".chk_mail").prop("checked", false);
        $("#btn_delete_mail").addClass("hidden");
        $("tr").removeClass("warning selected_message");
        selected_message = [];
    }

    $(".styled").uniform({
        radioClass: 'choice'
    });
});

$(document).on("click", ".chk_mail", function () {
    var id = $(this).data("row");
    var exist = jQuery.inArray(id, selected_message);
    if ($(this).prop("checked")) {
        if (exist === -1) {
            $("#tr_" + id).addClass("warning selected_message");
            selected_message.push(id);
        }
    } else {
        $("#tr_" + id).removeClass("warning selected_message");
        selected_message = jQuery.grep(selected_message, function (value) {
            return value != id;
        });
    }
    if (selected_message.length > 0)
        $("#btn_delete_mail").removeClass("hidden");
    else
        $("#btn_delete_mail").addClass("hidden");
});
$(document).on("keyup", "#search_message", function () {
    var data = $(this).val();

    getMail(data);
});

function deleteItem(ids) {
    var request = $.ajax({
        url: "/admin/ContactUs/" + ids,
        type: "DELETE",
        data: {ids: ids},
        dataType: "json"
    });

    request.done(function (res) {
        getMail(null);
    });

    request.fail(function (jqXHR, textStatus) {
        messageAlert('toast', '', 'درخواست ناموفق بود', 'error');
    });
}

function getMail(data) {
    var request = $.ajax({
        url: "/admin/contact_us/get",
        type: "POST",
        data: {data: data},
        dataType: "json"
    });

    request.done(function (res) {
        if (res.status === "true") {
            $("#data-load").html(res.html);
            $(".styled").uniform({
                radioClass: 'choice'
            });
            messageAlert('toast', '', 'عملیات با موفقیت انجام شد', 'success');
        } else {
            messageAlert('toast', '', 'خطایی درانجام عملیات رخ داده است', 'error');
        }
    });

    request.fail(function (jqXHR, textStatus) {
        messageAlert('toast', '', 'درخواست ناموفق بود', 'error');
    });
}
