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
    } else if (img["size"] > 1000000) {
        $("input[type='file']").val("");
        swal({
            title: "Imagen muy pesado",
            text: "La imagen debe ser menor o igual a 1MB!",
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