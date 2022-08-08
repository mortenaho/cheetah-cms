$(document).ready(function () {

    let validationRules = {
        title: {
            required: true,
        },
        language: {
            required: true,
        },
        category_id: {
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
        category_id: {
            required: "لطفا  دسته بندی را انتخاب کنید",
        },
        content: {
            required: "لطفا محتوا را پر نمایید ",
        }
    };
    formValidation('validate', '#frmPost', validationRules, validationMessages);

    $(document).on("click", "#", function () {
        var select = $("#type option:selected");
        var value = select.val();
        if (value != null && value.length > 0)
            getCategories(select.val());

    });

    $(document).on("click", "#parent option", function () {
        console.log($(this).data("name"));
        //$(this).val($(this).data("name"));
    });


    // Use Bloodhound engine
    var engine = new Bloodhound({
        local: [
            {value: 'red'},
            {value: 'blue'},
            {value: 'green'} ,
            {value: 'yellow'},
            {value: 'violet'},
            {value: 'brown'},
            {value: 'purple'},
            {value: 'black'},
            {value: 'white'}
        ],
        datumTokenizer: function(d) {
            return Bloodhound.tokenizers.whitespace(d.value);
        },
        queryTokenizer: Bloodhound.tokenizers.whitespace
    });

    // Initialize engine
    engine.initialize();

    // Initialize tokenfield
    $(".tagsinput-typeahead").tokenfield({
        typeahead: [null, {
            displayKey: 'value',
            source: engine.ttAdapter()
        }]
    });

});
