

// Accordion component sorting
$(".accordion-sortable").sortable({
    connectWith: '.accordion-sortable',
    items: '.panel',
    helper: 'original',
    cursor: 'move',
    handle: '[data-action=move]',
    revert: 100,
    containment: '.content-wrapper',
    forceHelperSize: true,
    placeholder: 'sortable-placeholder',
    forcePlaceholderSize: true,
    tolerance: 'pointer',
    start: function (e, ui) {
        ui.placeholder.height(ui.item.outerHeight());
    }
});


// Collapsible component sorting
$(".collapsible-sortable").sortable({
    connectWith: '.collapsible-sortable',
    items: '.panel',
    helper: 'original',
    cursor: 'move',
    handle: '[data-action=move]',
    revert: 100,
    containment: '.content-wrapper',
    forceHelperSize: true,
    placeholder: 'sortable-placeholder',
    forcePlaceholderSize: true,
    tolerance: 'pointer',
    start: function (e, ui) {
        ui.placeholder.height(ui.item.outerHeight());
    }
});


$(".styled, .multiselect-container input").uniform({
    radioClass: 'choice'
});

$(".chk-select-rows").on("click", function () {

    if ($(this).is(":checked")) {
        console.log("yes");
    } else
        console.log("no");
});


//
// // file upload
var lfm = function (options, cb) {

    var route_prefix = (options && options.prefix) ? options.prefix : '/filemanager';

    window.open('/filemanager' + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
    window.SetUrl = cb;
}

$(".naw3-select-file").click(function () {

    var inputName = $(this).data("naw3-set-to");
    var type = $(this).data("naw3-file-type");
    lfm({type: type, prefix: 'filemanager'}, function (url, path) {
        $("input[name='" + inputName + "']").val(path);
        if (type === "image") {
            $("#img_" + inputName).attr("src", path);
        }
    });
});

$(".naw3-delete-file").click(function () {

    var inputName = $(this).data("naw3-set-to");
    var type = $(this).data("naw3-file-type");
    $("input[name='" + inputName + "']").val("");
    if (type === "image") {
        $("#img_" + inputName).attr("src", "/admin_assets/assets/images/placeholder.jpg");
    }
});

$(function () {
    $('.tokenfield').tokenfield();

// Button with spinner
    Ladda.bind('.btn-ladda-spinner', {
        dataSpinnerSize: 16,
        timeout: 2000
    });
    $('.maxlength').maxlength();


});



