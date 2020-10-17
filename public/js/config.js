$("#form_config").validate({
    rules: {
        url_usuario: {
            required: true,
            minlength: 3,
            maxlength: 20
        },
        cv: {
            required: true,
            number: true,
        },
        perfil_public: {
            required: true,
            number: true,
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
$(document).on("keyup", "#url_usuario", function() {
    let ruta_cat = $(this).val().toLocaleLowerCase();
    ruta_cat = ruta_cat.replace(/ /g, "");
    ruta_cat = ruta_cat.replace(/[á]/g, 'a');
    ruta_cat = ruta_cat.replace(/[é]/g, 'e');
    ruta_cat = ruta_cat.replace(/[í]/g, 'i');
    ruta_cat = ruta_cat.replace(/[ó]/g, 'o');
    ruta_cat = ruta_cat.replace(/[ú]/g, 'u');
    ruta_cat = ruta_cat.replace(/[ñ]/g, 'n');
    $("#url_usuario").val(ruta_cat);
    // let valor_ruta = $(this).val();
    // let validar_ruta = $(".validar_ruta");
    // for (let i = 0; i < validar_ruta.length; i++) {
    //     if ($(validar_ruta[i]).html() == valor_ruta) {
    //         $(".ruta").val("");
    //         notie.alert({
    //             type: 3,
    //             text: '<h4><b>Error con la Ruta</b></h4> Ya existe la ruta en la base de datos, elija otro',
    //             time: 7
    //         });
    //         $(".ruta").focus();
    //     }
    // }
});