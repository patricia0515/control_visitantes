//validacion campo file formulario visitas

function validateFile() {
    let fileInput, fileRoute, fileType;

    fileInput = document.getElementById('imputimg');
    fileRoute = fileInput.value;
    fileType = /(.JPG|.JPEG|.PNG|.GIF)$/i;

    if (!fileType.exec(fileRoute)) {
        alert('Recuerda que el archivo debe de ser una imagen.');
        fileInput.value = '';
        return false;
    }

}
