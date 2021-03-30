$(document).ready(function () {

    /**
     * Llamado a funciones
     * que cargan las tablas
     */

    loadTableVisitor();
    loadTableVisitas();

    /**
     * Botón para realizar
     * la busqueda de un visitante
     */

    $("body").on("click", "#btnSearch", function () {
        // variables
        let visitor_number = $.trim($("#SearchText").val());
        let token = $("meta[name='csrf-token']").attr("content");

        // boton para ver visitate
        $("#btnViewUser").hide();

        /* si la variable no viene vacia ejecuta la petición ajax =se la asignamos a "id" */
        if (visitor_number) {
            $.ajax({
                type: "GET",
                url: `/visitantes/${visitor_number}`,
                data: {
                    id: visitor_number,
                    _token: token,
                },
                /* si la respuesta es correcta, trajo un dato sin errores,  */
                success: function (response) {
                    /* si la respuesta no viene vacia muestra el boton del ojito */
                    if (response.length) {
                        $("#idVistanteHidden").val(response[0].id);
                        $("#btnViewUser").show();
                        // Mensaje informativo para el usuario
                        Toast.fire({
                            type: "success",
                            title: "El visitante ha sido ¡Encontrado!",
                        });
                    } else {
                        $("#btnViewUser").hide();
                        // Mensaje informativo para el usuario
                        Swal.fire({
                            type: "error",
                            title: "Error",
                            text: "El usuario no se encuentra registrado",
                            showCancelButton: true,
                            confirmButtonText: `Registrar!`,
                        }).then((result) => {
                            if (result.value) {
                                $("#modalCreateTitle").html(
                                    "Registro de nuevo visitante"
                                );
                                $("#modalCreate").modal("show");
                                $("#searchText2").val(
                                    $.trim($("#SearchText").val())
                                );

                            }
                        });
                        
                    }
                
                },
            });
        } else {
            // Mensaje informativo para el usuario
            Toast.fire({
                type: "error",
                title: "Debes ingresar la cédula",
            });
            document.getElementById("SearchText").style.borderColor = "#ed7677";
        }
    });

    /**
     * Botón view que muestra
     * la informacion del visitante
     */

    $("body").on("click", "#btnViewUser", function () {
        // variables
        let visitor_id = $.trim($("#idVistanteHidden").val());
        let visitor_number = $.trim($("#SearchText").val());
        let token = $("meta[name='csrf-token']").attr("content");

        // opciones modal
        $("#modalTitleShowUser").html(
            "Informacion visitante <span class='badge bg-success'>Entrada</span>"
        );
        $("#modalShowUser").modal("show");

        /* si la respuesta es correcta, trajo un dato sin errores,  */
        $.ajax({
            type: "GET",
            url: `/visitantes/${visitor_number}`,
            data: {
                id: visitor_number,
                _token: token,
            },
            success: function (response) {
                // recorremos los datos con un foreach
                response.forEach((data) => {
                    // se crea un elemento div
                    let element = document.createElement("div");
                    // se agrega a ese elemento los input con sus label\
                    element.innerHTML += `<input type="hidden" class="form-control" value="${data.id}" id="data_id" disabled>`;
                    element.innerHTML += `<label for="${data.empresa}">Empresa:</label><input type="text" name="${data.empresa}" class="form-control" value="${data.empresa}" disabled>`;
                    element.innerHTML += `<label for="${data.nombre}">Nombre:</label><input type="text" name="${data.nombre}" class="form-control" value="${data.nombre}" disabled>`;
                    element.innerHTML += `<label for="${data.apellido}">Apellido:</label><input type="text" name="${data.apellido}" class="form-control" value="${data.apellido}" disabled>`;
                    element.innerHTML += `<label for="${data.contacto}">Contacto:</label><input type="text" name="${data.contacto}" class="form-control" value="${data.contacto}" disabled>`;
                    element.innerHTML += `<label for="${data.rh}">RH:</label><input type="text" name="${data.rh}" class="form-control" value="${data.rh}" disabled>`;
                    element.innerHTML += `<label for="${data.eps}">EPS:</label><input type="text" name="${data.eps}" class="form-control" value="${data.eps}" disabled>`;
                    element.innerHTML += `<label for="${data.documento}">C.C:</label><input type="text" name="${data.documento}" class="form-control" value="${data.documento}" disabled>`;
                    element.innerHTML += `<label for="${data.t_visita}">Tipo de visitante:</label><input type="text" name="${data.t_visita}" class="form-control" value="${data.t_visita}" disabled>`;
                    // y agreamos todo eso al div con el id inputs
                    $("#inputs").append(element);
                });

                // Peticion para validar si existe la visita
                $.ajax({
                    type: "GET",
                    url: `/visitaComprobante/${visitor_id}`,
                    data: {
                        id: visitor_id,
                        _token: token,
                    },
                    success: function (data) {
                        let endElement = data.pop();
                        $("#idVistanteHidden").val(endElement.id);
                        const SALIDA = "salida";
                        const DATARETURN = endElement.tipo;
                        if (DATARETURN === SALIDA || DATARETURN == "") {
                            console.log("ok!");
                        } else {
                            $("#btnRegisterVisit").hide();
                            $("#btnRegisterExit").show();
                            $("#modalTitleShowUser").html(
                                "Informacion visitante <span class='badge bg-danger'>Salida</span>"
                            );
                        }
                    },
                });
            },
        });
    });

    /**
     * Botón que muestra
     * el modal de registra visita
     */

    $("body").on("click", "#btnRegisterVisit", function () {
        $("#modalRegisterVisitTitle").html("Registrar visita");
        $("#modalRegisterVisit").modal("show");

        $("#visitante_id").val($.trim($("#data_id").val()));
    });

    /**
     * Botón que guarda
     * la salida de una visita
     */

    $("body").on("click", "#btnRegisterExit", function () {
        let visitaId = $.trim($("#idVistanteHidden").val());
        let token = $("meta[name='csrf-token']").attr("content");

        $.ajax({
            type: "PUT",
            url: `visitas/${visitaId}`,
            data: {
                idVisita: visitaId,
                _token: token,
            },
            success: function (response) {
                Toast.fire({
                    type: "success",
                    title: response,
                });
                setTimeout(() => (location.href = "/"), 1500);
            },
        });
    });

    /**
     * Botón que muestra
     * select imagen si es true
     */

    $("#inputimagen").on("change", function () {
        let imagen = $.trim($("#inputimagen").val());
        const VALIDOR = "Si";

        if (imagen === VALIDOR) {
            $("#imputimg").show('slow');
            $("#textveh").show('slow');
            $("#inputveh").show('slow');
            $("#miniatura").show('slow');
            $("#miniaturaimg").show('slow');
            $("#info").show('slow');
        } else {
            $("#imputimg").hide('slow');
            $("#imputimg").val('');
            $("#textveh").hide('slow');
            $("#inputveh").hide('slow');
            $("#inputveh").val('');
            $("#miniatura").hide('slow');
            $("#miniaturaimg").hide('slow');
            $('#miniaturaimg').attr('src', '');
            $("#miniaturaimg").val('');
            $("#info").hide('slow');
        }
    });

    /**
     * Botón que muestra
     * campo serial si el usuario
     * trae pertenencias
     */

    $("#inputpertenencias").on("change", function () {
        let pertenencia = $.trim($("#inputpertenencias").val());
        const validate = "Ninguno";

        if (pertenencia === validate) {
            $("#textserial").hide('slow');
            $("#inputserial").hide('slow');
            $("#inputserial").val('');
        } else {
            $("#textserial").show();
            $("#inputserial").show();
        }
    });

    /**
     * Botón que carga la
     * imagen de un vehiculo
     */

    $("body").on("click", ".btnImagen", function () {

        let token = $("meta[name='csrf-token']").attr("content");
        let fila = $(this).closest("tr");
        let visita_id = parseInt(fila.find("td:eq(0)").text());

        $.ajax({
            type: "GET",
            url: `/visitas/${visita_id}`,
            data: {
                id: visita_id,
                _token: token,
            },
            success: function (respuesta) {
                respuesta.forEach((data) => {
                    console.log(data)
                    if (data.img_vehiculo !== null) {
                        let imagen = `<img src='${data.img_vehiculo}' class='img-thumbnail frounded float-start' width="400px" heigh="400px">`;
                        $("#imagenmodal").append(imagen);
                        $("#modalimagen").modal("show");
                        $("#modalTitleModalImage").html("Imagen del vehículo")
                    } else {
                        Toast.fire({
                            type: "error",
                            title: "No hay imagen registrada",
                        })
                    }
                });

            },
        });
    });

    /**
     * Input que carga la
     * imagen subida
     */

    $("#imputimg").change(function () {
        readImg(this);
    });
});


/**
 * Vizualizar la imagen en miniatura
 * 
 * @return void
 */

const readImg = (input) => {
    if (input.files[0]) {
        let reader = new FileReader();
        reader.onload = function (e) {
            $('#miniaturaimg').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

/**
 * Mensaje esquina superior derecha
 *
 * @return void
 */

const Toast = Swal.mixin({
    toast: true,
    position: "top",
    showConfirmButton: false,
    timer: 3000,
});

/**
 * Captura los datos para
 * luego ponerlos en la datatable
 *
 * @return void
 */

const loadTableVisitor = () => {
    $.get("/visitantes", (data) => {
        dataTableVisitor(data);
    }).fail(function () {
        console.log("Algo salio mal loadTableAVisit");
    });
};

/**
 * Realiza la carga
 * de los datos en la datatable
 *
 * @return void
 */

const dataTableVisitor = (data) => {
    $("#tableVisitor").DataTable({
        //Datos
        data: data,

        // Responsive
        responsive: true,

        // Ordenar por la primera columna
        aaSorting: [[ 0, "desc" ]],

        // Ocultar columna
        columnDefs: [
            { "visible": false, "targets": 0 }
        ],

        // Columnas que estan el la tabla
        columns: [
            { data: "created_at"},
            { data: "no_visitas" },
            { data: "empresa" },
            { data: "nombre" },
            { data: "apellido" },
            { data: "contacto" },
            { data: "rh" },
            { data: "eps" },
            { data: "documento" },
            
        ],

        //Para cambiar el lenguaje a español
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infroFiltered": "(Filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar: ",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "sProcessing": "Procesando...",
        }
    });
};

/**
 * Vizualizar la imagen en miniatura
 */
//  function readImg(input) {
//     if (input.files[0]) { 
//       var reader = new FileReader(); 
      
//       reader.onload = function(e) { 
//         $('#miniaturaimg').attr('src', e.target.result);
//         // console.log(e.target);
//       }
//       reader.readAsDataURL(input.files[0]);
//     } 
//   }
//   $("#imputimg").change(function() { 
//     readImg(this);
//   });

/**
 * Captura los datos para
 * luego ponerlos en la datatable
 *
 * @return void
 */
const loadTableVisitas = () => {
    $.get("/visitas", (data) => {
        datatableVisitas(data);
    }).fail(function () {
        console.log("Error en la tabla");
    });
};

/**
 * Realiza la carga
 * de los datos en la datatable
 *
 * @return void
 */
const datatableVisitas = (data) => {
    $("#tableVisitas").DataTable({
        //Datos
        data: data,

        responsive: true,
        scrollX: true,

        columnDefs: [
            { responsivePriority: 1, targets: 0 },
            { responsivePriority: 2, targets: -1 },
         
        ],

        // Ordenar por la columna
        aaSorting: [[ 0, "desc" ]],

        // Columnas que estan en la tabla
        columns: [
            { data: "id" },
            { data: "cantidadVisitas" },
            { data: "documentoVisitante" },
            {
                data: 'created_at', render: function (data, type, row) {
                    let oDate = new Date(data)
                    return `${oDate.getDate()}/${oDate.getMonth() + 1}/${oDate.getFullYear()}`
                }
            },
            { data: "reg_pertenencias" },
            { data: "serial" },
            { data: "sede" },
            { data: "motivo" },
            { data: "descripcion" },
            { data: "visita" },
            {
                data: "tipo", render: function (data, type, row) {
                    const exit = 'salida';
                    if (data === exit) {
                        return `<span class='badge bg-danger'>${data}</span>`
                    } else {
                        return `<span class='badge bg-success'>${data}</span>`
                    }
                }
            },
            { data: "tip_vehiculo" },
            {
                defaultContent:
                    "<div class='text-center'><button class='btn btn-danger btnImagen' style='background-color: #c31f1e;'><i class='fas fa-eye'></i></button></div>",
            },
        ],
     
        //Para cambiar el lenguaje a español
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infroFiltered": "(Filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar: ",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "sProcessing": "Procesando...",
        }
    });

    var checkbox1 = document.getElementById('checkbox1');
    $("body").on("change", "#checkbox1", function () {
        var checked = checkbox1.checked;
        if(checked){
            
            return false;
        }
    });
    var checkbox2 = document.getElementById('checkbox2');
    $("body").on("change", "#checkbox2", function () {
        var checked = checkbox2.checked;
        if(checked){
            
            return false;
        }
    });
    var checkbox3 = document.getElementById('checkbox3');
    $("body").on("change", "#checkbox3", function () {
        var checked = checkbox3.checked;
        if(checked){
            
            return false;
        }
    });
};

