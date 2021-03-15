$(document).ready(function () {

    loadTableVisitor();


    $('body').on('click', '#btnSearch', function () {
        Swal.fire({
            type: 'error',
            title: 'Error',
            text: 'El usuario no se encuentra registrado',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: `Registrar!`,
        }).then((result) => {
            if (result.value) {
                $('#modalCreateTitle').html('Registro de nuevo visitante')
                $('#modalCreate').modal('show')
            } else {
                Swal.fire('Changes are not saved', '', 'info')
            }
        })

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

