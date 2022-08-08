$(document).on("click", ".btn_is_active", function () {
    id=$(this).data("id");
    is_active(id);
});

function is_active(id) {
    var request = $.ajax({
        url: "/admin/plugin/is_active/" + id,
        type: "POST",
        data: {id: id},
        dataType: "json"
    });

    request.done(function (res) {
        if (res.status === "true") {

            $("#tr_plugin_active_"+id).html(res.html);
        }
    });

    request.fail(function (jqXHR, textStatus) {
        admin_alert("درخواست ناموفق بود", "error");
    });
}
