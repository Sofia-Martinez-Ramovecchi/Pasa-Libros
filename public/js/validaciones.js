document.addEventListener('DOMContentLoaded', function () {

    document.getElementById('BtnPublicarLibro2').addEventListener('click', function (event) {

        event.preventDefault();  // Prevenir el envío del formulario inmediato
        if (ValidarCambios()) {
            Swal.fire({
                position: "top-end",
                icon: "success",
                showConfirmButton: false,
                timer: 1000
            }).then(() => {
                // Cerrar el modal solo después de la alerta
                cerrarModal('publicarLibroModalInicio');
                // Enviar el formulario
                document.getElementById('publicarLibroForm2').submit();
            });
        }
    });

    document.getElementById('cancelarLibro2').addEventListener('click', function(){
        cerrarModal('publicarLibroModalInicio');
        location.reload();
    })

});


function ValidarCambios() {

    let bandera = true;

    if (!validarCampoVacio('tituloLibro2')) {
        bandera = false;
    }
    if (!validarCampoVacio('autorLibro2')) {
        bandera = false;
    }
    if (!validarCampoVacio('EditorialLibro2')) {
        bandera = false;
    }
    if (!validarCampoVacio('VersionLibro2')) {
        bandera = false;
    }
    if (!validarCampoVacio('InternacionalCodigo2')) {
        bandera = false;
    }
    if (!validarCampoVacio('imagenLibro2')) {
        bandera = false;
    }
    if (!validarCampoVacio('LibroContraportada2')) {
        bandera = false;
    }
    if (!validarCampoVacio('descripcionLibro2')) {
        bandera = false;
    }
    return bandera;
}

function validarCampoVacio(idCampo) {
    let error = document.getElementById(idCampo);
    let inputValor = error.value.trim();
    let MensajeError = error.nextElementSibling;

    error.classList.remove('is-invalid');

    if (inputValor === '') {
        error.classList.add('is-invalid');
        if (MensajeError) {
            MensajeError.innerHTML = 'Campo vacío';
        }
        return false;
    }

    if (MensajeError) {
        MensajeError.innerHTML = '';  // Limpiar cualquier mensaje de error previo
    }
    return true;
}
function cerrarModal(idcampo) {  
    const modalElement = document.getElementById(idcampo);
    if (modalElement) {
        const modal = bootstrap.Modal.getInstance(modalElement);
        if (modal) {
            modal.hide();
        } else {
            // Si no hay instancia, crear una nueva y cerrar
            const newModal = new bootstrap.Modal(modalElement);
            newModal.hide();
        }
    } else {
        console.error("El modal con ID " + idcampo + " no se encontró.");
    }
}



