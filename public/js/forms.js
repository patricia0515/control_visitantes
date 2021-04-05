$(document).ready(function () {

    $.validator.addMethod("alphabetsOnly", function (value, element) {
        return this.optional(element) || /^[a-zA-Z ]*$/.test(value)
    }, "Por favor ingresa solo letras.")

    $.validator.addMethod("phoneCOL", function(phone_number, element) {
        phone_number = phone_number.replace(/\s+/g, "");
        return this.optional(element) || phone_number.length >= 7  &&
            phone_number.match(/^(\(\+?\d{2,3}\)[\*|\s|\-|\.]?(([\d][\*|\s|\-|\.]?){6})(([\d][\s|\-|\.]?){2})?|(\+?[\d][\s|\-|\.]?){7,8}(([\d][\s|\-|\.]?){2}(([\d][\s|\-|\.]?){2})?)?)$/);
    }, "Por favor, especifique un número de teléfono válido.");

    // Validacion formulario crear visita
    $("#basic-form").validate({
        
        rules: {
            empresa: {
                required: true,
                minlength: 3
            },
            nombre: {
                required: true,
                alphabetsOnly: true,
                minlength: 3
            },
            apellido: {
                required: true,
                alphabetsOnly: true,
                minlength: 3
            },
            contacto: {
                required: true,
                number: true,
                phoneCOL: true,
            },
            rh: {
                required: true
            },
            eps: {
                required: true
            },
            t_visita: {
                required: true
            },
            politica_confidencialidad: {
                required: true
            },
            proteccion_datos: {
                required: true
            },
            seguridad_salud_trabajo: {
                required: true
            }

        },
        messages : {
            empresa: {
                required: "Por favor introduzca una empresa.",
                minlength: "Por favor introduzca al menos 3 caracteres."
            },
            nombre: {
                required: "Por favor introduzca un nombre.",
                minlength: "Por favor introduzca al menos 3 caracteres."
            },
            apellido: {
                required: "Por favor introduzca un apellido.",
                minlength: "Por favor introduzca al menos 3 caracteres."
            },
            contacto: {
                required: "Por favor introduzca un télefono.", 
                number: "Por favor ingrese un número valido.",
            },
            rh: {
                required: "Por favor seleccione un RH."
            },
            eps: {
                required: "Por favor seleccione una EPS."
            },
            t_visita: {
                required: "Por favor seleccione un tipo de visitante."
            },
            politica_confidencialidad: "Este campo es requerido."
            ,
            proteccion_datos: {
                required: "Este campo es requerido."
            },
            seguridad_salud_trabajo: {
                required: "Este campo es requerido."
            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });

});

//validacion formulario visitas

function validate() {
    let file = document.getElementById('visitante_id').value;

    if (file.lenght > 0 || file.lenght == '') {
        alert('Debes de seleccionar un archivo que sea tipo imagen.');
        return false;
    }
    return true;
}

// return true;