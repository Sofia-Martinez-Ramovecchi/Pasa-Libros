document.addEventListener('DOMContentLoaded', function () {

    document.getElementById('BtnGuardarCambiosLibro').addEventListener('click', function (event) {

        event.preventDefault();  // Prevenir el envío del formulario inmediato
        if (ValidarCambios()) {
            Swal.fire({
                position: "top-end",
                icon: "success",
                showConfirmButton: false,
                timer: 2000
            }).then(() => {
                document.getElementById('editarLibroForm').submit();  // Enviar el formulario después del SweetAlert
            });
        }
    });

    document.getElementById('BtnCancelarEditLibro').addEventListener('click', function(){
        cerrarModal('editarLibroModal');
        location.reload();
    })

    document.getElementById('btnEliminarPublicacion').addEventListener('click', function(){
        cerrarModal('EliminarPublicacionModal');
        location.reload();
    })

    let btnDenunciar = document.getElementById('BtnDenunciar');
    if (btnDenunciar) {
        btnDenunciar.addEventListener('click', mostrarModal);
    }

    document.querySelectorAll('input[name="optradio"]').forEach(function(radio) {
        radio.addEventListener('change', function() {
            let otroSeleccionado = document.getElementById('radio_otro').checked;
            let textarea = document.getElementById('otro_textarea');

            if (otroSeleccionado) {
                textarea.disabled = false; // Habilita el textarea
            } else {
                textarea.disabled = true;  // Deshabilita el textarea
                textarea.classList.remove('is-invalid'); 
                textarea.value = ''; 
            }
        });
    });

    document.getElementById('EnviarDenuncia').addEventListener('click', function(event) {
        event.preventDefault();

        let otroSeleccionado = document.getElementById('radio_otro').checked;
        let razones = document.getElementById('otro_textarea').value;
        let mensaje = document.getElementById('otro_textarea');
        let form = document.querySelector('form');
    
        if (otroSeleccionado) {
            if (razones.trim() === '') {
                mensaje.classList.add('is-invalid'); // Agrega la clase de error
                mensaje.nextElementSibling.innerHTML = 'Campo vacío';
            } else {
                mensaje.classList.remove('is-invalid'); 
                cerrarModal('DenunciarModal');
                form.submit(); // Enviar el formulario
                limpiarInputs()
            }
        }else{
            cerrarModal('DenunciarModal');
            form.submit(); // Enviar el formulario
            limpiarInputs()
        }
    });

    document.getElementById('CerrarDenuncia').addEventListener('click', function(){
        cerrarModal('DenunciarModal');
        location.reload();
    })
});


function ValidarCambios() {

    let bandera = true;

    if (!validarCampoVacio('tituloLibroEditar')) {
        bandera = false;
    }
    if (!validarCampoVacio('autorLibroEditar')) {
        bandera = false;
    }
    if (!validarCampoVacio('editorialEditar')) {
        bandera = false;
    }
    if (!validarCampoVacio('versionLibroEditar')) {
        bandera = false;
    }
    if (!validarCampoVacio('EditarcodigoInternacional')) {
        bandera = false;
    }
    if (!validarCampoVacio('imagenLibroEditar')) {
        bandera = false;
    }
    if (!validarCampoVacio('imagenLibroContraportadaEditar')) {
        bandera = false;
    }
    if (!validarCampoVacio('descripcionLibroEditar')) {
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
            console.error("No se encontró una instancia del modal.");
        }
    } else {
        console.error("El modal con ID " + idcampo + " no se encontró.");
    }
}


function mostrarModal() {
    const modal = new bootstrap.Modal(document.getElementById('DenunciarModal'));
    modal.show();
}

function limpiarInputs() {
    let radios = document.getElementsByName('optradio');
    radios.forEach(radio => radio.checked = false);
    
    document.getElementById('otro_textarea').value = '';
    document.getElementById('otro_textarea').classList.remove('is-invalid');
}


