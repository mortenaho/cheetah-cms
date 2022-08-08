var language = $("#language").val();

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

    };
    formValidation('validate', '#frmMenu', validationRules, validationMessages);


    $(document).on("keyup", "input[name='post_title']", function () {
        title = $(this).val();
        if (title.length > 2) {
            type = $(this).data("type");
            $("#spinner-" + type).css("display", "table-cell");
            getPost(title, type);
        }
    });

    $(document).on("click", "#cmb-pages", function () {
        link = $(this).val();
        title = $("#cmb-pages option:selected").text();
        if (link.length > 0 && title.length > 0) {
            $("input[name='link_address']").val(link);
            $("input[name='title']").val(title);
            $("input[name='link_address']").attr("readonly", "readonly");
        } else {
            $("input[name='link_address']").val("");
            $("input[name='title']").val("");
            $("input[name='link_address']").removeAttr("readonly");
        }
    });

    $(document).on("click", ".btn-delete-menu-item", function () {

        id = $(this).attr("data-menu-id");
        // Alert combination
        questionAlert('swal', 'هشدار', 'آیا از حذف این آیتم مطمئن هستید ؟', 'warning', 'بله', 'خیر')
            .then(function (result) {
                if (result === 'confirm') {
                    deleteItem(id, this);
                } else {
                    messageAlert('toast', '', 'عملیات لغو شد', 'error');
                }
            });
    });

    $(document).on("click", ".btn-edit-menu-item", function () {


        let id =$(this).attr("data-menu-id");
        var liElement =  $("li").find(`[data-menu-id='${id}']`);

        var menuItemLink =  $(liElement).attr("data-menu-link");

        var divElement =  $("div").find(`[data-menu-id='${id}']`);
        //loadingElement(divElement,true);
        var menuItemTitle =  divElement.children("span.editable-render-response").text();

        divElement.children("span.editable-render-response").html("<input type='text'  style='max-width: 200px;border: none;' value='" + menuItemTitle + "'/>" +
        "<i data-menu-id=\"" + id +  "\" class=\"icon-check2 pull-right text-primary  btn-update-menu-item\"></i>" +
            "<i data-menu-id=\"" + id +  "\" class=\"icon-close2 pull-right text-danger-600  btn-cancel-update-menu-item\"></i>"
        );
        //hide edit button
        divElement.children("i.btn-edit-menu-item").hide();
        //loadingElement(divElement,false);
    });

    $(document).on("click", ".btn-update-menu-item", function () {
        let id = $(this).attr("data-menu-id");
        var divElement =  $("div").find(`[data-menu-id='${id}']`);
        var spanElement =  $(this).parent("span.editable-render-response");
        var txt = spanElement.children("input").val();
        //loadingElement(divElement,true);
        var request = $.ajax({
            url: "/admin/menu/menu_edit_title",
            type: "POST",
            data: {pk:id,value: txt},
            dataType: "json"
        });

        request.done(function (res) {
            $(spanElement).html(txt);
            messageAlert('toast', '', 'عنوان منو با موفقیت بروز رسانی شد', 'success');
            //show edit button
            divElement.children("i.btn-edit-menu-item").show();
            //loadingElement(divElement,false);
        });

        request.fail(function (jqXHR, textStatus) {
            messageAlert('toast', 'title', "درخواست ناموفق بود", 'error');
            //show edit button
            divElement.children("i.btn-edit-menu-item").show();
            //loadingElement(divElement,false);
        });

    });

    $(document).on("click", ".btn-cancel-update-menu-item", function () {
        let id = $(this).attr("data-menu-id");
        var divElement =  $("div").find(`[data-menu-id='${id}']`);
        var spanElement =  $(this).parent("span.editable-render-response");
        var txt = spanElement.children("input").val();
        $(spanElement).html(txt);
        //show edit button
        divElement.children("i.btn-edit-menu-item").show();
    });

    $(document).on("click", ".chk-category-menu", function () {

        var title = $(this).data("title");
        var link = $(this).data("link");


        if ($(this).prop("checked")) {
            add_menu(title, 0, 0, link, language, 0);
        } else {

        }

    });

    $(document).on("click", "#btn-add-menu-link", function () {

        var title = $("input[name='title']").val();
        var link = $("input[name='link_address']").val();

        if (title.length > 0 && link.length > 0) {
            add_menu(title, 0, 0, link, language, 0);
        } else {
            messageAlert('toast', '', "لطفا عنوان یا نشانی را پر نمایید", 'error');
        }

    });

    var menu = $('ol.sortable').nestedSortable({
        toleranceElement: '> div',
        forcePlaceholderSize: true,
        items: 'li',
        handle: 'div',
        placeholder: 'sortable-placeholder',
        opacity: .6,
        revert: 250,
        tabSize: 20,
        helper: 'clone',
        tolerance: 'pointer',
        isTree: true,
        expandOnHover: 700,
        startCollapsed: false,
        excludeRoot: true,
        rootID: "root",
        start: function (event, ui) {
            var start_pos = ui.item.index();
            ui.item.data('start_pos', start_pos);
            ui.item.data('start_parent', $(ui.item).parent());

        },
        update: function (event, ui) {
            menu_order($('ol.sortable li'));
        }
    });

    // Initialize
    // $('.editable-render-response').editable({
    //     url: '/admin/menu/menu_edit_title',
    //     success: function(response) {
    //         if(response.status==="true")
    //             $(this).html(response.title);
    //
    //     },error:function ($data) {
    //
    //     }
    // });

});

function menu_add_item(link, parent, id, title, ordering) {
    // item = " <li data-menu-id='" + id + "' data-menu-ordering='" + ordering + "' data-id='" + parent + "' data-menu-link='" + link + "' data-menu-title='" + title + "'>\n" +
    //     "                            <div data-menu-id='" + id + "' class=\" panel panel-heading\"><i data-menu-id='" + id + "' class=\"icon-trash pull-right text-danger  btn-delete-menu-item\"></i><span   data-type='text' data-inputclass='form-control' data-pk='" + id + "' data-title='ویرایش عنوان منو'>" + title + "</span>" +
    //     "                            </div>\n" +
    //     "                        </li>";

   var item = " <li data-menu-id='"  + id  +  "' data-menu-ordering='"  + ordering  +  "' data-id='"  + parent  +  "' data-menu-link='"  + link  + "' data-menu-title='"  + title  +  "' class=\"mjs-nestedSortable-leaf\">\n" +
    "<div data-menu-id='"  + id  + "' class=\" panel panel-heading\"><i data-menu-id='"  + id  +  "' class=\"icon-trash pull-right text-danger  btn-delete-menu-item\"></i>" +
    "<i data-menu-id='"  + id  +  "' class=\"icon-pencil7 pull-right text-primary  btn-edit-menu-item\"></i>" +
    "<span class='editable-render-response'  data-type='text' data-input-class='form-control'  data-pk='"  + id  +  "' data-title='ویرایش عنوان منو'>"  + title  +  "</span>"  +
    "</div>\n" +
    "</li>";
    $('.sortable').append(item);
}

function menu_order(element) {
    var data = {};
    row=$(element).length;
    $(element).each(function () {
        if ($(this).parent().parent().data("menu-id") != null) {
            var parent = $(this).parent().parent().data("menu-id");
            data[row] = {
                id: $(this).attr("data-menu-id"),
                parent: parent,
                ordering: ($(this).index() + 1)
            };
            // console.log($(this).data("menu-title") + " : " + $(this).data("menu-id") + "- index - " + ($(this).index() + 1) + " parent=" + $(this).parent().parent().data("menu-id"));
        } else {

            // console.log($(this).data("menu-title") + " : " + $(this).data("menu-id") + "- index - " + ($(this).index() + 1) + " parent=" + "0");
            data[row] = {id: $(this).attr("data-menu-id"), parent: 0, ordering: ($(this).index()+1)};
        }
        row=row-1;

    });
    console.log(data);
    order_menu_request(data);
}

function getPost(title, type) {
    var request = $.ajax({
        url: "/admin/menu/get_post",
        type: "POST",
        data: {title: title, post_type: type},
        dataType: "json"
    });
    request.done(function (res) {
        $("#spinner-" + type).hide("slow");
        if (res.status === "true") {
            $("#load-in-" + type).html(res.html);
            $(".styled").uniform({
                radioClass: 'choice'
            });

        } else
            messageAlert('toast', '', "خطایی در انجام عملیات رخ داده است", 'error');
    });

    request.fail(function (jqXHR, textStatus) {
        $("#spinner-" + type).hide("slow");
        messageAlert('toast', '', "درخواست ناموفق بود", 'error');
    });
}

function add_menu(title, parent, id, link, lang, ordering) {
    loadingElement('#sortable_menu_list',true);
    var request = $.ajax({
        url: "/admin/menu/add_menu",
        type: "POST",
        data: {title: title, parent: parent, id: id, link_address: link, lang: lang, ordering: ordering},
        dataType: "json"
    });
    request.done(function (res) {
        loadingElement('#sortable_menu_list',false);
        if (res.status === "true") {
            menu_add_item(link, parent, res.id, title, res.ordering);
            $(".styled").uniform({
                radioClass: 'choice'
            });

        } else
            messageAlert('toast', '', "خطایی در انجام عملیات رخ داده است", 'error');
    });

    request.fail(function (jqXHR, textStatus) {
        loadingElement('#sortable_menu_list',false);
        messageAlert('toast', '', "درخواست ناموفق بود", 'error');
    });
}

function order_menu_request(data) {
    loadingElement("sortable_menu_list",true);
    // console.log(data);
    var request = $.ajax({
        url: "/admin/menu/order_menu",
        type: "POST",
        data: {data: data},
        dataType: "json"
    });
    request.done(function (res) {
        loadingElement("sortable_menu_list",false);
        if (res.status === "true") {
            // code
        } else
            messageAlert('toast', '', "خطایی در انجام عملیات رخ داده است", 'error');
    });

    request.fail(function (jqXHR, textStatus) {
        loadingElement("sortable_menu_list",false);
        messageAlert('toast', '', "درخواست ناموفق بود", 'error');
    });
}

function deleteItem(id, row) {
    console.log(row);
    loadingElement('#sortable_menu_list',true);
    var liElement =  $("li").find(`[data-menu-id='${id}']`);
    var request = $.ajax({
        url: "/admin/menu/" + id,
        type: "DELETE",
        data: {id: id},
        dataType: "json"
    });

    request.done(function (res) {
        loadingElement('#sortable_menu_list',false);
        if (res.status === "true") {

            messageAlert('toast', '', "عملیات حذف با موفقیت انجام شد", 'success');

            setTimeout(location.reload.bind(location), 500);
            //TODO change later
            //----------------------
            // $('#menuItem_' + id).remove();
            // var childs = $(liElement).parent().parent().children('ol').children('li');
            // if (childs.length > 0) {
            //     childs.each(function (i, e) {
            //         $(e).appendTo($('.sortable'));
            //     });
            // }
            //
            // console.log(liElement.parent());
            // $(liElement.parent()).remove();
            // menu_order($('ol.sortable li'));
            //---------------------

        } else {
            messageAlert('toast', '', res.msg, 'error');
        }
    });

    request.fail(function (jqXHR, textStatus) {
        loadingElement('#sortable_menu_list',false);
        messageAlert('toast', '', "درخواست ناموفق بود", 'error');
    });
}
