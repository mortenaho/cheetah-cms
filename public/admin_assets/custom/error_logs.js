var selectItem;
$(".btn-get-error").on("click", function (e) {
    var path = $(this).data("path");
    var row = $(this).data("row");
    selectItem = "item_" + row;
    loading(true);
    var request = $.ajax({
        url: "/admin/getErrors",
        type: "post",
        data: {path: path},
        dataType: "json"
    });


    request.done(function (res) {
        loading(false);
        if (res.status === "true") {
            $(".modal-title").html(res.title);
            $(".modal-body").html(res.html);
            $(".btn-error-delete").data("name", res.title);
            $(".btn-error-delete").data("row", row);
            $('#modal_large').modal({
                show: true
            });
        } else {
            messageAlert('toast', 'title', res.msg, 'error');
        }
    });

    request.fail(function (jqXHR, textStatus) {
        loading(false);
        messageAlert('toast', 'title', requestUnsuccessful, 'error');

    });
});


$(".btn-error-delete").on("click", function (e) {
    var name = $(this).data("name");
    var row = $(this).data("row");
    selectItem = "modal_large";
    loading(true);
    var request = $.ajax({
        url: "/admin/errorLog/delete",
        type: "post",
        data: {name: name, row: row},
        dataType: "json"
    });
    request.done(function (res) {
        loading(false);
        if (res.status === "true") {
            $('#modal_large').modal("hide");
            messageAlert('toast', 'title', res.msg, 'success');
            $("#item_" + row).fadeOut(500);
        } else {
            messageAlert('toast', 'title', res.msg, 'error');
        }
    });

    request.fail(function (jqXHR, textStatus) {
        loading(false);
        messageAlert('toast', 'title', requestUnsuccessful, 'error');

    });
});


function loading(isShow = true) {

    var light = $("#" + selectItem);

    if (isShow) {
        $(light).block({
            message: '<i class="icon-spinner spinner"></i>',
            overlayCSS: {
                backgroundColor: '#fff',
                opacity: 0.8,
                cursor: 'wait'
            },
            css: {
                border: 0,
                padding: 0,
                backgroundColor: 'none'
            }
        });

    } else {
        $(light).unblock();
    }

}

