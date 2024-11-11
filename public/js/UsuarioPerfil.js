
document.addEventListener('DOMContentLoaded', function(){

   document.querySelectorAll('.BtnDenunciar').forEach(BtnDenunciar => {
        BtnDenunciar.addEventListener('click', function() {
            mostrarModal();
        });
    });

      // Control para habilitar/deshabilitar el textarea cuando se selecciona "Otro"
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
                location.reload();
            }
        }else{
            cerrarModal('DenunciarModal');
            form.submit(); // Enviar el formulario
            limpiarInputs()
            location.reload();
        }
    });
    
    document.getElementById('enviarMensajeBtn').addEventListener('click', function(event){
        event.preventDefault();
        let mensaje=document.getElementById('mensaje').value;
        let error=document.getElementById('mensaje');
        error.classList.remove('is-invalid');
        let formMensaje = document.getElementById('enviarMensajeForm');
       
        if(mensaje.trim() ===''){
            error.classList.add('is-invalid');
        }else{

            cerrarModal('enviarMensajeModal');
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "El mensaje ha sido enviado",
                showConfirmButton: false,
                timer: 1500
              });

              setTimeout(function() {
                formMensaje.submit();  // Enviar el formulario después del retardo
            }, 1500); 
        }

       
    });

    document.getElementById('CerrarDenuncia').addEventListener('click', function(){
        cerrarModal('DenunciarModal');
        location.reload();

    })
})

function mostrarModal() {
    const modal = new bootstrap.Modal(document.getElementById('DenunciarModal'));
    modal.show();
}

function cerrarModal(idmodal){
    var modal = bootstrap.Modal.getInstance(document.getElementById(idmodal));
    modal.hide();
}

function limpiarInputs() {
    let radios = document.getElementsByName('optradio');
    radios.forEach(radio => radio.checked = false);
    
    document.getElementById('otro_textarea').value = '';
    document.getElementById('otro_textarea').classList.remove('is-invalid');
}
