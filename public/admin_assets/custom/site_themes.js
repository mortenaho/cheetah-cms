var selectTheme = "";
$(".chk_theme").on("click", function () {
    $current = this;

    $(this).attr("disabled", "disabled");
    let c_lblClass = "lbl_" + $(this).data("name");

    $("#" + c_lblClass + "").addClass("disabled");
    selectTheme = "theme_" + $(this).data("name");
    changeTheme($(this).data("name"));
    $(".chk_theme").each(function (index) {
        if ($current !== this) {
            $(this).prop("checked", false);
            $(this).removeAttr("disabled");
            let lblClass = "lbl_" + $(this).data("name");
            $("#" + lblClass + "").removeClass("disabled");

        }
    });
    $.uniform.update();
});

function changeTheme(name) {
    loading();
    var request = $.ajax({
        url: "/admin/theme/" + name,
        type: "post",
        data: {name: name},
        dataType: "json"
    });
    // request.success(function (res) {
    //     loading(false);
    // });

    request.done(function (res) {
        loading(false);
    });

    request.fail(function (jqXHR, textStatus) {
        admin_alert(requestUnsuccessful, "error");
        loading(false);
    });
}

function loading(isShow = true) {

    var light = $("#" + selectTheme);

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
