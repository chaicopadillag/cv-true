$("#formNuevoExperiencia").validate({
    rules: {
        cargo: {
            required: true,
            minlength: 3
        },
        empresa: {
            required: true,
            minlength: 3
        },
        fecha_inicio: {
            required: true
        },
        fecha_fin: {
            required: true
        },
        descripcion: {
            required: true,
            minlength: 3
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
$("#formEditarExperiencia").validate({
    rules: {
        cargo: {
            required: true,
            minlength: 3
        },
        empresa: {
            required: true,
            minlength: 3
        },
        fecha_inicio: {
            required: true
        },
        fecha_fin: {
            required: true
        },
        descripcion: {
            required: true,
            minlength: 3
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
$(document).on('focus', '.datepicker', function() {
    $('.datepicker').parent().addClass('is-filled');
});