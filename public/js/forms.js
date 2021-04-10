$(document).ready(function () {
    
    /**
     * Metodo para validar
     * que solo admita letras
     *
     * @return void
     */

    $.validator.addMethod("alphabetsOnly", function (value, element) {
        return this.optional(element) || /^[a-zA-Z ]*$/.test(value)
    }, "Por favor ingresa solo letras.")

    /**
     * Metodo para validar
     * los digitos del telefono
     *
     * @return void
     */

    $.validator.addMethod("phoneCOL", function(phone_number, element) {
        phone_number = phone_number.replace(/\s+/g, "");
        return this.optional(element) || phone_number.length >= 7  &&
            phone_number.match(/^(\(\+?\d{2,3}\)[\*|\s|\-|\.]?(([\d][\*|\s|\-|\.]?){6})(([\d][\s|\-|\.]?){2})?|(\+?[\d][\s|\-|\.]?){7,8}(([\d][\s|\-|\.]?){2}(([\d][\s|\-|\.]?){2})?)?)$/);
    }, "Por favor, especifique un número de teléfono válido.");

    /**
     * Validacion para el 
     * formulario visitante
     *
     * @return void
     */

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
        messages: {
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
        submitHandler: function (form) {
            form.submit();
        }
    });

    /**
     * Validacion para el 
     * formulario visits
     *
     * @return void
    */

    $('#visitsForm').validate({
        rules: {
            reg_pertenencias: {
                required: true,
            },
            serial: {
                minlength: 3,
            },
            descripcion: {
                required: true,
                minlength: 10,
            },
            motivo: {
                required: true,
            },
            sede: {
                required: true,
            },
            tip_visitante: {
                required: true,
            },
            visita: {
                required: true,
                alphabetsOnly: true,
                minlength: 3,
                alphabetsOnly: true,
            },
            resp_visita: {
                required: true,
                alphabetsOnly: true,
                minlength: 3,
            },
            reg_vehiculo: {
                required: true,
                minlength: 10,
            },
            vehiculo: {
                required: true,
            },
            files: {
                accept: 'image/*',
                extension: 'JPG|JPEG|PNG|GIF|jpg|jpeg|png|gif',
            },
        },
        messages: {
            reg_pertenencias: {
                required: "Por favor seleccione una pertenencia.",
            },
            serial: {
                minlength: "Por favor introduzca al menos 3 caracteres.",
            },
            descripcion: {
                required: "Por favor introduzca una descripción.",
                minlength: "Por favor introduzca al menos 10 caracteres.",
            },
            motivo: {
                required: "Por favor introduzca una motivo.",
            },
            sede: {
                required: "Por favor seleccione una sede.",
            },
            tip_visitante: {
                required: "Por favor seleccione el tipo de visitante.",
            },
            visita: {
                required: "Por favor introduzca la visita.",
                minlength: "Por favor introduzca al menos 3 caracteres.",
                alphabetsOnly: "Por favor introduzca solo caracteres alfabéticos.",
            },
            resp_visita: {
                required: "Por favor introduzca el responsable de la visita.",
                minlength: "Por favor introduzca al menos 3 caracteres.",
            },
            reg_vehiculo: {
                required: "Por favor introduzca un registro del vehículo.",
                minlength: "Por favor introduzca al menos 10 caracteres.",
            },
            vehiculo: {
                required: "Por favor seleccione si tiene vehículo.",
            },
            files: {
                accept: "Solo se aceptan archivos tipo imagen",
                extension: "la imagen debe de tener extensión jpg, jpeg, png o gif",
            },
        },
        submitHandler: function (form) {
            form.submit();
        }
    });
});

/**
 * Validacion para 
 * el campos files
 *
 * @return void
*/

const validateFile = () => {
    let fileInput, fileRoute, fileType;

    fileInput = document.getElementById('imputimg');
    fileRoute = fileInput.value;
    fileType = /(.JPG|.JPEG|.PNG|.GIF|.jpg|.jpeg|.png|.gif)$/i;

    if (!fileType.exec(fileRoute)) {
        Toast.fire({
            type: "error",
            title: `Recuerda que el archivo debe de ser una imagen.`,
        });
        fileInput.value = '';
        return false;
    }

}
