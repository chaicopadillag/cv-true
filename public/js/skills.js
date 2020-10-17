$(document).ready(function() {
    let slider = document.getElementById("sliderNivel");
    noUiSlider.create(slider, {
        start: [$("#nivel").val()],
        connect: [!0, !1],
        tooltips: [true],
        range: {
            min: 0,
            max: 100
        }
    });
    slider.noUiSlider.on("update", function(values, handle) {
        let value = values[handle];
        $("#nivel").val(value);
    });
});
$("#formNuevoHabilidad").validate({
    rules: {
        habilidad: {
            required: true,
            minlength: 3,
            maxlength: 30
        },
        nivel: {
            required: true,
            number: true,
            minlength: 1,
            maxlength: 100
        },
        descripcion: {
            required: true,
            minlength: 10,
            maxlength: 1000
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
$("#formeditarHabilidad").validate({
    rules: {
        habilidad: {
            required: true,
            minlength: 3,
            maxlength: 50
        },
        nivel: {
            required: true,
            number: true,
            min: 1,
            max: 100
        },
        descripcion: {
            required: true,
            minlength: 10,
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