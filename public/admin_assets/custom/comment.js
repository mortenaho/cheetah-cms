var selected_message = [];
$(document).on("click", "#btn_delete_mail", function () {
    loadingElement('.table-responsive',true);
    // Alert combination
    questionAlert('swal', 'هشدار', 'آیا از حذف این آیتم مطمئن هستید ؟', 'warning', 'بله', 'خیر')
        .then(function (result) {
            if (result === 'confirm') {
                deleteItem(selected_message);
            } else {
                loadingElement('.table-responsive',false);
                messageAlert('toast', '', 'عملیات لغو شد', 'error');
            }
        });
});



$(document).on("click", "#checked_all", function () {
    // $(".chk_mail").toggle(this.checked);
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
            $("#tr_"+id).addClass("warning selected_message");
            selected_message.push(id);
        }
    } else {
        $("#tr_"+id).removeClass("warning selected_message");
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
    console.log(ids);
    loadingElement('.table-responsive',true);
    var request = $.ajax({
        url: "/admin/comment/" + ids,
        type: "DELETE",
        data: {ids: ids},
        dataType: "json"
    });

    request.done(function (res) {
        loadingElement('.table-responsive',false);
        console.log(res.status);
       if(res.status=="true") {
           getMail(null);
       }else{
           messageAlert('toast', '', 'خطایی درانجام عملیات رخ داده است', 'error');
       }

    });

    request.fail(function (jqXHR, textStatus) {
        loadingElement('.table-responsive',false);
        messageAlert('toast', '', 'درخواست ناموفق بود', 'error');
    });
}

function getMail(data) {
    var request = $.ajax({
        url: "/admin/comment/get",
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
