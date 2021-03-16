$(document).ready(function () {
    $("#btnViewUser").hide();
    loadTableVisitor();

    $("body").on("click", "#btnSearch", function () {
        let visitor_number = $.trim($("#SearchText").val());
        let token = $("meta[name='csrf-token']").attr("content");

        /* Esta es una banderita para vr que trae la variable-se visualiza desde la consola del navegador */
        console.log(visitor_number);

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
                        $("#btnViewUser").show();
                    } else {
                        $("#btnViewUser").hide();
                        Swal.fire({
                            type: "error",
                            title: "Error",
                            text: "El usuario no se encuentra registrado",
                            showCancelButton: true,
                            confirmButtonText: `Registrar!`,
                        }).then((result) => {
                            if (result.value) {
                                // let visitor_number = $.trim($('#SearchText').val());
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
        }
    });

    $("body").on("click", "#btnViewUser", function () {
        let visitor_number = $.trim($("#SearchText").val());
        let token = $("meta[name='csrf-token']").attr("content");
        $("#modalTitleShowUser").html("Informacion visitante");
        $("#modalShowUser").modal("show");
        /* si la respuesta es correcta, trajo un dato sin errores,  */
        $.ajax({
            type: "GET",
            url: `/visitantes/${visitor_number}`,
            ddata: {
                id: visitor_number,
                _token: token,
            },
            success: function (response) {
                // recorremos los datos con un foreach
                response.forEach((data) => {
                    // se crea un elemento div
                    let element = document.createElement("div");
                    // se agrega a ese elemento los input con sus label
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
            },
        });
    });

    $("body").on("click", "#btnRegisterVisit", function () {
        $("#modalRegisterVisitTitle").html("Registrar visita");
        $("#modalRegisterVisit").modal("show");

        
    });
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

        // Columnas que estan el la tabla
        columns: [
            { data: "visitas" },
            { data: "empresa" },
            { data: "nombre" },
            { data: "apellido" },
            { data: "contacto" },
            { data: "rh" },
            { data: "eps" },
            { data: "documento" },
        ],

        //Para cambiar el lenguaje a español
        language: {
            lengthMenu: "Mostrar MENU registros",
            zeroRecords: "No se encontraron resultados",
            info:
                "Mostrando registros del START al END de un total de TOTAL registros",
            infroFiltered: "(Filtrado de un total de MAX registros)",
            sSearch: "Buscar: ",
            oPaginate: {
                sFirst: "Primero",
                sLast: "Último",
                sNext: "Siguiente",
                sPrevious: "Anterior",
            },
            sProcessing: "Procesando...",
        },
    });
};