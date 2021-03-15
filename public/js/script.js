$(document).ready(function () {
    
    $("#btnViewUser").hide()    
    loadTableVisitor()
    loadTableVisitas()

  
    $('body').on('click', '#btnSearch', function () {

        let visitor_number = $.trim($('#SearchText').val()); 
        let token = $("meta[name='csrf-token']").attr("content");
    
        if (visitor_number) {
            $.ajax({
                type: "GET",
                url: `/visitantes/${visitor_number}`,
                data: { 
                    "id": visitor_number, 
                    "_token": token
                },
                success: function (response) {
                    if( response.length ) {
        
                        $("#btnViewUser").show();
        
                    }else {
                            $("#btnViewUser").hide();
                            Swal.fire({
                                type: 'error',
                                title: 'Error',
                                text: 'El usuario no se encuentra registrado',
                                showCancelButton: true,
                                confirmButtonText: `Registrar!`,
                            }).then((result) => {
                                if (result.value) {
                                    $('#modalCreateTitle').html('Registro de nuevo visitante')
                                    $('#modalCreate').modal('show')
                                }
                            })
                    }
                }
            })
        } 
    })


    $('body').on('click', '#btnViewUser', function () {
        $('#modalTitleShowUser').html('Informacion visitante')
        $('#modalShowUser').modal('show')
    })

    $('body').on('click', '#btnRegisterVisit', function () {


        $('#modalRegisterVisitTitle').html('Registrar visita')
        $('#modalRegisterVisit').modal('show')
    })

})


/**
 * Captura los datos para
 * luego ponerlos en la datatable
 *
 * @return void
*/

const loadTableVisitor = () => {

    $.get('/visitantes', ( data ) => {

        dataTableVisitor(data)

    }).fail( function() {
        console.log('Algo salio mal loadTableAVisit');
    })
}


/**
 * Realiza la carga
 * de los datos en la datatable
 *
 * @return void
*/

const dataTableVisitor = (data) => {

    $('#tableVisitor').DataTable({

        //Datos
        "data" : data,
        
        // Columnas que estan el la tabla
        "columns": [
            { "data": "visitas" },
            { "data": "empresa" },
            { "data": "nombre" },
            { "data": "apellido" },
            { "data": "contacto" },
            { "data": "rh" },
            { "data": "eps" },
            { "data": "documento" },
        ],

        //Para cambiar el lenguaje a español
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
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

}
const loadTableVisitas = () => {

    $.get('/visitas', ( data ) => {

        datatableVisitas(data)

    }).fail( function() {
        console.log('Error en la tabla');
    })
}

const datatableVisitas=(tablavisitas)=>{
    $('#tableVisitas').DataTable({

        //Datos
        "data" : tablavisitas,
        
        // Columnas que estan el la tabla
        "columns": [
            // { "data": "cedula" },
            // { "data": "fecha" },
            { "data": "reg_pertenencias" },
            { "data": "sede" },
            { "data": "descripcion" },
            { "data": "tip_visitante" },
            { "data": "serial" },
            { "data": "visita" },
            { "data": "motivo" },
            { "data": "resp_visita" },
            { "data": "vehiculo" },
            { "data": "reg_vehiculo" },
            // { "data": "imagen_vehiculo" },
            { "defaultContent": "<div class='text-center'><button class='btn btn-outline-info btnBorrar'><i class='fas fa-eye'></i></button></div>" }
        ],

        //Para cambiar el lenguaje a español
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
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

}

