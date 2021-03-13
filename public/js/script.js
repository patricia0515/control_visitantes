$(document).ready(function () {




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
<<<<<<< HEAD


=======
        
>>>>>>> 57359d13c0debb075a999ed934862b9a042f2fe7
        $('#modalRegisterVisitTitle').html('Registrar visita')
        $('#modalRegisterVisit').modal('show')
    })

})

