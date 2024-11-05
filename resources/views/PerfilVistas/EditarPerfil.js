

document.addEventListener('DOMContentLoaded',function(){
   
   document.getElementById('btnGuardarCambios').addEventListener('click', function(event){
        event.preventDefault();
        
            if (ValidarFormEditar()) {
            
                document.getElementById('headerColorInput').addEventListener('input', cambiarHeader());
                actualizarFotoPerfil();  //
                actualizarNombreUsuario('username');  //
                /*/ Espera 500ms antes de enviar el formulario
                setTimeout(function () {
                    document.getElementById('EditarForm').submit();  // Envía el formulario
                }, 500);*/
                cerrarModal('editProfileModal');
                limpiarInpts('EditarForm');  
            }
    });

   document.getElementById('BtnPublicarLibro').addEventListener('click', function(event){
        event.preventDefault();
        let bandera=ValidarPublicacionNueva();
        console.log(bandera);
        if(bandera){
            limpiarInpts('publicarLibroForm'); 
            cerrarModal('publicarLibroModal');
        }
   })

    document.querySelectorAll('.btnCancelarModal').forEach(function(button) {
        button.addEventListener('click', function() {
            let formularioID = this.getAttribute('data-form');  // Obtener el ID del formulario desde data-form
            let modalID = this.getAttribute('data-modal');  // Obtener el ID del modal desde data-modal

            limpiarInpts(formularioID);  // Limpiar el formulario correspondiente
            cerrarModal(modalID);  // Cerrar el modal correspondiente
        });
    });


});

///// -------- Validaciones form Publicar y Editar 
function ValidarFormEditar(){
    let flag=true;

    if(!validarCampoVacio('username') || !ValidarCaracteres('username')){
        flag=false;
    }
    if(!validarCampoVacio('email') || !validarmail()){
        flag=false;
    }
    if(!validarCampoVacio('password') || !validarClave()){
        flag=false;
    }
    if(!validarCampoVacio('username')){
        flag=false;
    }
    if(!validarCampoVacio('profileImage') || !validarFoto()){
        flag=false;
    }
    return flag;

}
function ValidarPublicacionNueva(){
    let flag=true;

    if(!validarCampoVacio('tituloLibro') || !ValidarCaracteres('tituloLibro')){
        flag=false;
    }
    if(!validarCampoVacio('autorLibro') || !ValidarCaracteres('autorLibro') || !sinnumeros('autorLibro')){
        flag=false;
    }
    if(!validarCampoVacio('descripcionLibro')){
        flag=false;
    }
    if(!validarCampoVacio('imagenLibro')){
        flag=false;
    }
    if(!validarCampoVacio('VersionLibro')){
         flag=false;
    }
    if(!validarCampoVacio('EditorialLibro')){
         flag=false;
    }
    if(!validarCampoVacio('CodigoInternacional')){
         flag=false;
    }
 
   return flag;
}

// Validación de formulario en JavaScript
  function validarCampoVacio(idCampo) {
    let inputValor = document.getElementById(idCampo).value.trim();
    let error = document.getElementById(idCampo);
    let MensajeError = error.nextElementSibling;  // div con 'invalid-feedback'

    error.classList.remove('is-invalid');

    if (inputValor === '') {
        error.classList.add('is-invalid');
        MensajeError.innerHTML = 'Campo vacío';
        error.nextElementSibling.innerHTML='campo vacío';
        return false;
    }
    MensajeError.innerHTML = '';  // Limpiar cualquier mensaje de error previo
    return true;
}
function ValidarCaracteres(idcampo){
    let nombreUsuario = document.getElementById(idcampo).value;
    let ErrorMensaje = document.getElementById(idcampo);
    if (nombreUsuario.length < 4) {
        ErrorMensaje.textContent = "El nombre de usuario debe tener al menos 4 caracteres";
       return false;
    } else {
        ErrorMensaje.textContent = "";
    }
    return true;

}
function validarmail(){
    let email = document.getElementById("email").value;
    let Error = document.getElementById("emailError");
    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (email && !emailPattern.test(email)) {
        Error.textContent = "El formato del correo electrónico no es válido";
      return false;
    } else {
        Error.textContent = "";
    }
    return true;
}
function validarClave(){

    let Clave = document.getElementById("password").value;
    let Error = document.getElementById("passwordError");
    if (Clave && Clave.length < 6) {
        Error.textContent = "La contraseña debe tener al menos 6 caracteres";
        return false;
    } else {
      passwordError.textContent = "";
    }
    return true;
}
function validarFoto(){
    
    // Validación de la imagen de perfil
    const profileImage = document.getElementById("profileImage").files[0];
    const imageError = document.getElementById("imageError");
    if (profileImage && !profileImage.type.startsWith('image/')) {
      imageError.textContent = "El archivo seleccionado no es una imagen válida";
      return false;
    } else {
      imageError.textContent = "";
    }
    return true;
}
function sinnumeros(idcampo) {
    let inputValor = document.getElementById(idcampo).value.trim();
    let error = document.getElementById(idcampo);
    let MensajeError = error.nextElementSibling;  // div con 'invalid-feedback'

    // Expresión regular para validar solo letras (incluyendo acentos y espacios)
    let soloLetras = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/;

    
    error.classList.remove('is-invalid');

    // Validar si el valor contiene solo letras
    if (!soloLetras.test(inputValor)) {
       
        error.classList.add('is-invalid');
        MensajeError.textContent = "Solo se permiten letras y espacios.";
    } else {
      
        error.classList.remove('is-invalid');
        MensajeError.textContent = "";
    }
}

//Actualizar la foto de perfil, Nombre y header
function actualizarFotoPerfil() {
    const profileImageInput = document.getElementById('profileImage');
    const profileImage = document.querySelector('.perfil-img');  // Imagen actual en la página

    if (profileImageInput.files && profileImageInput.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            profileImage.src = e.target.result;  // Cambia la imagen de perfil al cargar la nueva
        }
        reader.readAsDataURL(profileImageInput.files[0]);
    }
}
function actualizarNombreUsuario(idcampo) {
    let NuevoNombre = document.getElementById(idcampo).value.trim();  // Toma el valor del input del nombre de usuario
    let nombreviejo = document.getElementById('nombrePerfil');  // El h3 donde aparece el nombre de usuario

    if (nombreviejo !== '') {
        nombreviejo.textContent = NuevoNombre;  // Actualiza el texto del h3 con el nuevo nombre
    }
}
function cambiarHeader() {
    let headerColor = document.getElementById('headerColorInput').value;
    let headerDiv = document.getElementById('headerDiv');

   headerDiv.style.backgroundColor = headerColor;
}

//// funciones de los forms
function cerrarModal(idcampo){
    // Cierra el modal después de confirmar
    const modal = bootstrap.Modal.getInstance(document.getElementById(idcampo)); 
    modal.hide(); // Cierra el modal

}
function limpiarInpts(formId){
  // Limpia todos los campos del formulario
  let form = document.getElementById(formId);
  form.reset();  // Resetea el formulario
}

