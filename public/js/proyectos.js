$("#formNuevoProyecto").validate({
    rules: {
        titulo: {
            required: true,
            minlength: 3,
            maxlength: 50
        },
        foto: {
            required: true,
        },
        pagina_web: {
            required: true,
            url: true
        },
        lugar: {
            required: true,
            minlength: 3,
            maxlength: 30,
        },
        fecha: {
            required: true
        },
        descripcion: {
            required: true,
            minlength: 3,
            maxlength: 255
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
$("#formEditarProyecto").validate({
    rules: {
        titulo: {
            required: true,
            minlength: 3,
            maxlength: 50
        },
        pagina_web: {
            required: true,
            url: true
        },
        lugar: {
            required: true,
            minlength: 3,
            maxlength: 30,
        },
        fecha: {
            required: true
        },
        descripcion: {
            required: true,
            minlength: 3,
            maxlength: 255
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