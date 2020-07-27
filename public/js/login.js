$("#form_login").validate({
    rules: {
        email: {
            required: true,
            minlength: 3,
            maxlength: 30
        },
        password: {
            required: true
        }
    },
    highlight: function(element) {
        $(element)
            .closest(".form-group")
            .removeClass("has-success")
            .addClass("has-danger");
    },
    success: function(element) {
        $(element)
            .closest(".form-group")
            .removeClass("has-danger")
            .addClass("has-success");
    },
    errorPlacement: function(error, element) {
        $(element).append(error);
    }
});
