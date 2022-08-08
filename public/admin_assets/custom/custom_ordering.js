$('tbody').sortable({
    forcePlaceholderSize: true,
    classes: {
        "ui-sortable": "highlight"
    },
    start: function (event, ui) {
        index = ui.item.index();
        ordering = $(ui.item).data("ordering");
        ui.item.data('last_index', index);
        ui.item.data('last_order', ordering);
        $("tbody").find("tr").removeClass("m-sorted");
    },
    update: function (event, ui) {
        new_index = ui.item.index();
        last_index = ui.item.data('last_index');
        last_order = ui.item.data('last_order');
        if (last_index > new_index)//Down To Up
        {
            new_ordering = ($("tbody").find("tr").eq(new_index + 1).attr("data-ordering"));
            $("tbody").find("tr").eq(new_index).attr("data-ordering",new_ordering);
            $("tbody").find("tr").eq(new_index).addClass("m-sorted");
            for (var i=(parseInt(new_index)+1);i<=parseInt(last_index);i++)
            {
                m_order= $("tbody").find("tr").eq(i).attr("data-ordering");
                $("tbody").find("tr").eq(i).attr("data-ordering",(parseInt(m_order)+1));
                $("tbody").find("tr").eq(i).addClass("m-sorted");
            }
        }
        if (last_index < new_index)//Up To Down
        {
            new_ordering = ($("tbody").find("tr").eq(new_index- 1).attr("data-ordering"));
            $("tbody").find("tr").eq(new_index).attr("data-ordering",new_ordering);
            $("tbody").find("tr").eq(new_index).addClass("m-sorted");
            for (var i=(parseInt(last_index));i<parseInt(new_index);i++)
            {
                m_order= $("tbody").find("tr").eq(i).attr("data-ordering");
                $("tbody").find("tr").eq(i).attr("data-ordering",(parseInt(m_order)-1));
                $("tbody").find("tr").eq(i).addClass("m-sorted");
            }
        }
        saveOrdering();
    }
});
function saveOrdering() {
    data=[];
    $("tr.m-sorted").each(function () {
        data.push([$(this).attr("data-id"),$(this).attr("data-ordering")]);
    });
    orderings(data);
}

function orderings(data) {
    loadingElement("tbody",true);
    var position=data;
    var request = $.ajax({
        url: "/admin/customOrder/"+OrderUrl,
        type: "POST",
        data: {data:position},
        dataType: "json"
    });

    request.done(function (res) {
        console.log(res);
        loadingElement("tbody",false);
    });

    request.fail(function (jqXHR, textStatus) {
        admin_alert("Request unsuccessful", "error");
        loadingElement("tbody",false);
    });
}
