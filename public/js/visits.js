
$(document).ready(function () {
    visited($('#frm_visit').serialize());
});

function visited(formData) {

    console.log(formData);

    var request = $.ajax({
        url: "/home/visit",
        type: "POST",
        data: formData,
        dataType: "json"
    });

    request.done(function (res) {
        if (res.status === "true") {
            console.log('true');
        } else {
            console.log('false');
        }
    });

    request.fail(function (jqXHR, textStatus) {
        var err = jqXHR.responseText;
        err = $.parseJSON(err);
        var msg = "";
        for (var k in err.errors) {
            msg += "<label style='font-family:Tahoma' class='text-danger'>" + err.errors[k] + '</label><br>';
        }
        $("#frm_visit").parent().unblock();
    });
}

