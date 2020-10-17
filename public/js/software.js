$("#formSoftware").validate({
    rules: {
        softwares: {
            required: true,
            minlength: 3,
            maxlength: 500,
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
$(document).on('keyup', '.form-control', function() {
    const tags = $('.primary-badge').children('.tag');
    for (let i = 0; i < tags.length; i++) {
        let softwares = tags[i].textContent.toLocaleUpperCase();
        softwares = softwares.replace(/ /g, '');
        let tag_new = $(this).val().toLocaleUpperCase();
        tag_new = tag_new.replace(/ /g, '');
        if (softwares == tag_new) {
            $(this).val('');
            swal({
                title: "Software repetido",
                buttonsStyling: false,
                confirmButtonClass: "btn btn-success"
            }).catch(swal.noop);
            break;
        }
    }
});