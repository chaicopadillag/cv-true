$("#form_registro").validate({
    rules: {
        name: {
            required: true,
            minlength: 3,
            maxlength: 30
        },
        email: {
            required: true,
            minlength: 3,
            maxlength: 30
        },
        password: {
            required: true,
            minlength: 8,
            maxlength: 30
        },
        password_confirmation: {
            required: true,
            minlength: 8,
            maxlength: 30
        }
    },
    highlight: function(element) {
        $(element).closest('.form-group').removeClass('has-success').addClass('has-danger');
        $(element).closest('.form-check').removeClass('has-success').addClass('has-danger');
    },
    success: function(element) {
        $(element).closest('.form-group').removeClass('has-danger').addClass('has-success');
        $(element).closest('.form-check').removeClass('has-danger').addClass('has-success');
    },
    errorPlacement: function(error, element) {
        $(element).closest('.form-group').append(error);
    }
});