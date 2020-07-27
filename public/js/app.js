function ValidarFormulario(id) {
    $(id).validate({
        highlight: function(element) {
            $(element)
                .closest(".form-group")
                .removeClass("has-success")
                .addClass("has-danger");
            $(element)
                .closest(".form-check")
                .removeClass("has-success")
                .addClass("has-danger");
        },
        success: function(element) {
            $(element)
                .closest(".form-group")
                .removeClass("has-danger")
                .addClass("has-success");
            $(element)
                .closest(".form-check")
                .removeClass("has-danger")
                .addClass("has-success");
        },
        errorPlacement: function(error, element) {
            $(element)
                .closest(".form-group")
                .append(error);
        }
    });
}
$("input[type='file']").change(function() {
    let img = this.files[0];
    let nombreimg = $(this).attr("id");
    if (img["type"] != "image/jpeg" && img["type"] != "image/png") {
        $("input[type='file']").val("");
        swal({
            title: "No es una Imagen",
            text: "El archivo seleccionado no es una imagen!",
            type: "error",
            confirmButtonClass: "btn btn-danger",
            confirmButtonText: "Aceptar",
            buttonsStyling: false
        });
    } else if (img["size"] > 2000000) {
        $("input[type='file']").val("");
        swal({
            title: "Imagen muy pesado",
            text: "La imagen debe ser menor o igual a 2MB!",
            type: "error",
            confirmButtonClass: "btn btn-danger",
            confirmButtonText: "Aceptar",
            buttonsStyling: false
        });
    } else {
        let img_prev = new FileReader();
        img_prev.readAsDataURL(img);
        $(img_prev).on("load", function(e) {
            let src_img = e.target.result;
            $(".img_" + nombreimg).attr("src", src_img);
        });
    }
});
