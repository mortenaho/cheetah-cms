
$(document).ready(function () {

    // let validationRules = {
    //     full_name: {
    //         required: true,
    //     },
    //     email: {
    //         required: true,
    //         email: true
    //     },
    //     message: {
    //         required: true,
    //     }
    // };
    // let validationMessages = {
    //     full_name: {
    //         required: "لطفا نام  را وارد کنید",
    //     },
    //     email: {
    //         required: "لطفا ایمیل را وارد کنید",
    //         email: "ایمیل شما معتبر نمی باشد",
    //     },
    //     message: {
    //         required: "لطفا پیام را پر نمایید ",
    //     }
    // };
    // formValidator =  formValidation('validate', '#frm_contact_us', validationRules, validationMessages);
    //
    // $("#frm_contact_us").submit(function (event) {
    //     event.preventDefault();
    //
    //     if ($("#frm_contact_us").valid()) {
    //
    //         send_message($(this).serialize());
    //     }
    // });

});

function getPortfolioDetails(pId){
    console.log(pId);
    var request = $.ajax({
        url: "/home/portfolio-details",
        type: "POST",
        data: {p_id: pId},
        dataType: "json"
    });

    request.done(function (res) {
        if (res.status === "true") {
            $("#item_details").html(res.html);
            $("#quick_view").modal("show");

            $('.product-large-slider').slick({
                fade: true,
                arrows: false,
                speed: 1000,
                asNavFor: '.pro-nav'
            });

            // product details slider nav active
            $('.pro-nav').slick({
                slidesToShow: 4,
                asNavFor: '.product-large-slider',
                centerMode: true,
                speed: 1000,
                centerPadding: 0,
                focusOnSelect: true,
                prevArrow: '<button type="button" class="slick-prev"><i class="lnr lnr-chevron-right"></i></button>',
                nextArrow: '<button type="button" class="slick-next"><i class="lnr lnr-chevron-left"></i></button>',
                responsive: [{
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 3,
                    }
                }]
            });

        } else {
                console.log('server error...');
        }

    });

    request.fail(function (jqXHR, textStatus) {
        var err = jqXHR.responseText;
        err = $.parseJSON(err);
        var msg = "";
        for (var k in err.errors) {
            msg += "<label style='font-family:Tahoma' class='text-danger'>" + err.errors[k] + '</label><br>';
        }
        console.log(msg);

    });
}
