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