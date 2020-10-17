$("#formRedesSociales").validate({
    rules: {
        pagina_web: {
            url: true,
            maxlength: 100,
        },
        linkedin: {
            required: true,
            url: true,
            maxlength: 100,
        },
        facebook: {
            required: true,
            url: true,
            maxlength: 100,
        },
        instagram: {
            required: true,
            url: true,
            maxlength: 100,
        },
        twitter: {
            url: true,
            maxlength: 100,
        },
        tumblr: {
            url: true,
            maxlength: 100,
        },
        pinterest: {
            url: true,
            maxlength: 100,
        },
        spotify: {
            url: true,
            maxlength: 100,
        },
        tiktok: {
            url: true,
            maxlength: 100,
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
        $('.error').addClass('ml-3');
    }
});