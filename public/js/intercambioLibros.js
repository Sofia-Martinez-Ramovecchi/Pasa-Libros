document.addEventListener('DOMContentLoaded', function() {
    // Configuración de Alertify
    configureAlertify();

    // Manejadores para los checkboxes de "Más Libros"
    document.getElementById('MasLibrosSolicitante').addEventListener('change', function() {
        MostrarLibros('masLibrosDivSolicitante', this.checked);
    });

    document.getElementById('MasLibrosOfertante').addEventListener('change', function() {
        MostrarLibros('masLibrosDivOfertante', this.checked);
    });

    // Manejador para el botón de enviar solicitud
    document.getElementById('BtnEnviarSolicitud').addEventListener('click', function(event) {
        event.preventDefault(); // Prevenir el envío inmediato

        // Validación de selects
        if (solicitante() && ofertante()) {
            MostrarMensajeExitoso();
            setTimeout(() => {
                var form = document.getElementById('IntercambioForm');
                form.submit(); 
                cerrarModal(); 
            }, 1000); 
        }
    });

    document.getElementById('cancelarIntercambio').addEventListener('click', function() {
        cerrarModal();
        location.reload();
      });
});

// Configuración de Alertify
function configureAlertify() {
    if (typeof alertify !== 'undefined') {
        alertify.set('notifier', 'position', 'top-right');
        alertify.set('notifier', 'delay', 3);
    } else {
        console.error('Alertify no está definido.');
    }
}


function MostrarMensajeExitoso() {
    if (typeof alertify !== 'undefined') {
        alertify.success('Solicitud enviada con éxito'); // Cambiado para usar alertify.success
    
    }
}

function cerrarModal() {
    var modal = document.getElementById('SolicitarIntercambio'); // Cambia 'miModal' al ID de tu modal
    var modalInstance = bootstrap.Modal.getInstance(modal);
    if (modalInstance) {
        modalInstance.hide(); // Cerrar el modal
    } else {
        console.error('El modal no se pudo cerrar');
    }
}

function MostrarLibros(divId, isChecked) {
    var div = document.getElementById(divId); 
    if (isChecked) {
        div.classList.remove('d-none'); 
    } else {
        div.classList.add('d-none'); 
    }
}

// Validación del select de solicitante
function solicitante() {
    let selectSolicitante = document.getElementById('SelectLibrosSolicitante');
    let selectValue = selectSolicitante.value;

    selectSolicitante.classList.remove('is-invalid');
    if (selectValue === '') {
        selectSolicitante.classList.add('is-invalid');
        selectSolicitante.nextElementSibling.innerHTML = 'Select vacío';
        return false;
    } 
    return true;
}


function ofertante() {
    let selectOfertante = document.getElementById('LibrosOfertante');
    let selectValue = selectOfertante.value;

    selectOfertante.classList.remove('is-invalid');
    if (selectValue === '') {
        selectOfertante.classList.add('is-invalid');
        selectOfertante.nextElementSibling.innerHTML = 'Select vacío';
        return false;
    } 
    return true;
}
