/*======== Formualrio de Contacto ========*/
$("#frm-contacto").validate({
    submitHandler: function (form) {
        $.ajax({
            type: "POST",
            url: "send_contacto.php",
            data: $(form).serialize(),
            success: function (data) {
                $('#respta').html(data)
            },
        });
        $('.panel__confirmacion').addClass('active__panel__confirmacion');
        $("#btn-limpiar").trigger("click");
        return false;
    },
    rules: {
        Nombre: {
            required: true
        },
        Empresa: {
            required: true
        },
        Email: {
            required: true,
            email: true
        },
        Telefono: {
            required: true,
            number: true
        }
    },
    errorPlacement: function (label, element) {
        label.addClass('mt-2 text-danger');
        label.insertAfter(element);
    },
    highlight: function (element, errorClass) {
        $(element).parent().addClass('has-danger');
        $(element).addClass('form-control-danger');
    }
});

/*======== Formualrio de Cotización de Presupuesto ========*/
$("#form-presupuesto").validate({
    submitHandler: function (form) {
        $.ajax({
            type: "POST",
            url: "sendPresupuesto.php",
            data: $(form).serialize(),
            success: function (data) {
                $('#respta').html(data);
                console.log(data)
            },
        });
        $('.panel__confirmacion').addClass('active__panel__confirmacion');
        return false;
    },
    rules: {
        nombres_p: {
            required: true
        },
        apellidos_p: {
            required: true
        },
        email_p: {
            required: true,
            email: true
        },
        telefono_p: {
            required: true,
            number: true
        },
        fecha_deseada_mudanza_p: {
            required: true
        }
    }
});

/*======== Formualrio de Cotización de Presupuesto ========*/
// $("#form-presupuesto").validate({
//     submitHandler: function (form) {
//         $.ajax({
//             type: "POST",
//             url: "sendPresupuesto.php",
//             data: $(form).serialize(),
//             success: function (data) {
//                 $('#respta').html(data)
//             },
//         });
//         $('.panel__confirmacion').addClass('active__panel__confirmacion');
//         return false;
//     },
//     rules: {
//         Nombre: {
//             required: true
//         },
//         Apellidos: {
//             required: true
//         },
//         Email: {
//             required: true,
//             email: true
//         },
//         Telefono: {
//             required: true,
//             number: true
//         },
//         Movil: {
//             required: true,
//             number: true
//         },
//         fecha_deseada_mudanza: {
//             required: true
//         }
//     },
//     errorPlacement: function (label, element) {
//         label.addClass('mt-2 text-danger');
//         label.insertAfter(element);
//     },
//     highlight: function (element, errorClass) {
//         $(element).parent().addClass('has-danger');
//         $(element).addClass('form-control-danger');
//     }
// });