
$(document).ready(function () {

});

function addToCart(id) {
    loadingElement('#shop_form',true);

    var request = $.ajax({
        url: "/home/cart",
        type: "POST",
        data: {
            "_token": $('input[name=_token]').val(),
            "id":id
        },
        dataType: "json"
    });

    request.done(function (res) {
        loadingElement('#shop_form',false);

        if (res.status === "true") {
            // Swal.fire({
            //     type: 'success',
            //     text: 'محصول با موفقیت به سبد خرید شما',
            //     confirmButtonText:"تایید"
            // });
            messageAlert('toast', '', 'عملیات با موفقیت انجام شد', 'success');
            $('#cart_items_count').html(res.cart_items);
        } else {
            // Swal.fire({
            //     type: 'error',
            //     text: 'خطایی در سیستم رخ داده است لطفا دوباره تلاش کنید ',
            //     confirmButtonText:"تایید"
            // });
            messageAlert('toast', '', 'خطایی در انجام عملیات رخ داده است', 'error');

        }

        $('.validation-invalid-label').remove();
        $('.validation-valid-label').remove();


    });

    request.fail(function (jqXHR, textStatus) {
        loadingElement('#shop_form',false);
        // var err = jqXHR.responseText;
        // err = $.parseJSON(err);
        // var msg = "";
        // for (var k in err.errors) {
        //     msg += "<label style='font-family:Tahoma' class='text-danger'>"+err.errors[k] + '</label><br>';
        // }
        // Swal.fire({
        //     type: 'error',
        //     html: msg,
        //     confirmButtonText:"تایید"
        // });
        messageAlert('toast', '', 'خطایی در انجام عملیات رخ داده است', 'error');
    });
}

function removeFromCart(id) {
    loadingElement('#shop_form',true);

    var request = $.ajax({
        url: "/home/cart_delete",
        type: "POST",
        data: {
            "_token": $('input[name=_token]').val(),
            "id":id
        },
        dataType: "json"
    });

    request.done(function (res) {
        loadingElement('#shop_form',false);

        if (res.status === "true") {
            messageAlert('toast', '', 'عملیات با موفقیت انجام شد', 'success');
            $('#row_' + id).fadeOut(300);
            $('#cart_items_count').html(res.cart_items);
            $('#total_price').html(res.total_price);
        } else {

            messageAlert('toast', '', 'خطایی در انجام عملیات رخ داده است', 'error');

        }

        $('.validation-invalid-label').remove();
        $('.validation-valid-label').remove();


    });

    request.fail(function (jqXHR, textStatus) {
        loadingElement('#shop_form',false);
        messageAlert('toast', '', 'خطایی در انجام عملیات رخ داده است', 'error');
    });
}

function updateCart(id,op) {
    loadingElement('#shop_form',true);
    var qty = $('#qty_' + id).val();
    if(op===1){qty++}
    if(op===-1){qty--}
    if(qty< 0){qty=0;}
    console.log(qty);
    var request = $.ajax({
        url: "/home/cart_update",
        type: "POST",
        data: {
            "_token": $('input[name=_token]').val(),
            "id":id,
            "qty":qty
        },
        dataType: "json"
    });

    request.done(function (res) {
        loadingElement('#shop_form',false);

        if (res.status === "true") {
            messageAlert('toast', '', 'عملیات با موفقیت انجام شد', 'success');
            $('#cart_items_count').html(res.cart_items);
            $('#item_total_price_' + id).html(res.item_total_price);
            $('#total_price').html(res.total_price);
        } else {

            messageAlert('toast', '', 'خطایی در انجام عملیات رخ داده است', 'error');

        }

        $('.validation-invalid-label').remove();
        $('.validation-valid-label').remove();


    });

    request.fail(function (jqXHR, textStatus) {
        loadingElement('#shop_form',false);
        messageAlert('toast', '', 'خطایی در انجام عملیات رخ داده است', 'error');
    });
}

function checkOut() {
    loadingElement('#checkout_box',true);
    var request = $.ajax({
        url: "/home/checkout",
        type: "POST",
        data: {
            "_token": $('input[name=_token]').val()
        },
        dataType: "json"
    });

    request.done(function (res) {
        loadingElement('#checkout_box',false);

        if (res.status === "true") {
            messageAlert('toast', '', 'عملیات با موفقیت انجام شد', 'success');
            console.log(res.id);
            setTimeout(function() {
                window.location.replace(res.redirect);
            }, 2000);
        } else if(res.login ==="false")  {
            messageAlert('toast', '', "لطفا ابتدا وارد سیستم شوید", 'warning');
            setTimeout(function() {
                window.location.replace(res.redirect);
            }, 2000);
        }
        else{
            messageAlert('toast', '', 'خطایی در انجام عملیات رخ داده است', 'error');
        }

        $('.validation-invalid-label').remove();
        $('.validation-valid-label').remove();

    });

    request.fail(function (jqXHR, textStatus) {
        loadingElement('#checkout_box',false);
        messageAlert('toast', '', 'خطایی در انجام عملیات رخ داده است', 'error');
    });
}
