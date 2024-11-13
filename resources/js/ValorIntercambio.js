document.addEventListener('DOMContentLoaded', function(){
    estrellas();

    document.getElementById('BtnValoracion').addEventListener('click', function(event){
        event.preventDefault();

        if(CampoVacio('opinion')){

            let form=document.getElementById('FormValorarIntercambio');
            setTimeout(function() {
                form.submit();  // Enviar el formulario después del retardo
            }, 1000); 

        }

    })

    document.getElementById('CancelarValoracionBtn').addEventListener('click', function(){
        cerrarModal('valoracionModal');
        location.reload();
    })
})

function estrellas(){
    const stars = document.querySelectorAll('#estrellas i');
    let rating = 0;

    stars.forEach(star => {
        star.addEventListener('mouseover', () => {
            const value = star.getAttribute('data-value');
            stars.forEach((s, index) => {
                if (index < value) {
                    s.classList.remove('text-muted');
                    s.classList.add('text-warning');
                } else {
                    s.classList.remove('text-warning');
                    s.classList.add('text-muted');
                }
            });
        });

        // Click: Fija el valor de la calificación
        star.addEventListener('click', () => {
            rating = star.getAttribute('data-value');
            stars.forEach((s, index) => {
                if (index < rating) {
                    s.classList.remove('text-muted');
                    s.classList.add('text-warning');
                } else {
                    s.classList.remove('text-warning');
                    s.classList.add('text-muted');
                }
            });
        });

        //  Si no se ha hecho clic, vuelve a la calificación anterior
        star.addEventListener('mouseout', () => {
            stars.forEach((s, index) => {
                if (index < rating) {
                    s.classList.remove('text-muted');
                    s.classList.add('text-warning');
                } else {
                    s.classList.remove('text-warning');
                    s.classList.add('text-muted');
                }
            });
        });
    });

}

function CampoVacio(idCampo) {
    let error = document.getElementById(idCampo);
    let inputValor = error.value.trim();
    let MensajeError = error.nextElementSibling;

    error.classList.remove('is-invalid');

    if (inputValor === '') {
        error.classList.add('is-invalid');
        if (MensajeError) {
           MensajeError.classList.add('is-invalid');
        }
        return false;
    }

    if (MensajeError) {
        MensajeError.innerHTML = '';  // Limpiar cualquier mensaje de error previo
    }
    return true;
}

function cerrarModal(idmodal){
    var modal = bootstrap.Modal.getInstance(document.getElementById(idmodal));
    modal.hide();
}