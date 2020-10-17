$("#form_perfil").validate({
    rules: {
        name: {
            required: true,
            minlength: 3,
            maxlength: 30
        },
        apellidos: {
            required: true,
            minlength: 3,
            maxlength: 30
        },
        especialidad: {
            required: true,
            minlength: 6,
            maxlength: 30
        },
        direccion: {
            required: true,
            minlength: 10,
            maxlength: 100
        },
        telefono: {
            required: true,
            minlength: 6,
            maxlength: 20
        },
        ciudad: {
            required: true,
            minlength: 3,
            maxlength: 30
        },
        pais: {
            required: true,
            minlength: 3,
            maxlength: 30
        },
        genero: {
            required: true,
            number: true
        },
        edad: {
            required: true,
            number: true,
            minlength: 2,
            maxlength: 3
        },
        estado_civil: {
            required: true,
            minlength: 6,
            maxlength: 30
        },
        frase: {
            required: true,
            minlength: 10,
            maxlength: 50
        },
        resumen: {
            required: true,
            minlength: 30,
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