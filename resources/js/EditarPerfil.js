
document.addEventListener('DOMContentLoaded',function(){

   document.getElementById('btnGuardarCambiosPerfil').addEventListener('click', function(event){
        event.preventDefault();

            if (ValidarFormEditar()) {

                document.getElementById('headerColorInput').addEventListener('input', cambiarHeader());
                actualizarFotoPerfil();  //
                actualizarNombreUsuario('usuarioname');  //
                cerrarModal('editProfileModal');
                limpiarInpts('editarPerfilForm');
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
   });

    document.querySelectorAll('.btnCancelarModal').forEach(function(button) {
        button.addEventListener('click', function() {
            let modalID = this.getAttribute('data-modal');
            cerrarModal(modalID);
            location.reload();
        });
    });

});

///// -------- Validaciones form Publicar y Editar
function ValidarFormEditar(){
    let flag=true;

    if(!validarCampoVacio('usuarioname') || !ValidarCaracteres('usuarioname')){
        flag=false;
    }
    if(!validarCampoVacio('email') || !validarmail()){
        flag=false;
    }
    if(!validarCampoVacio('password') || !validarClave()){
        flag=false;
    }
    if(!validarCampoVacio('usuarioname')){
        flag=false;
    }
    if(!validarCampoVacio('profile_photo') || !validarFoto()){
        flag=false;
    }
    return flag;

}
function ValidarPublicacionNueva(){
    let flag=true;

    if(!validarCampoVacio('tituloLibro') || !ValidarCaracteres('tituloLibro')){
        flag=false;
        console.log('tituloLibro:' + flag);
    }
    if(!validarCampoVacio('autorLibro') || !ValidarCaracteres('autorLibro') || !sinnumeros('autorLibro')){
        flag=false;
        console.log('autorLibro:' + flag);
    }
    if(!validarCampoVacio('descripcionLibro')){
        flag=false;
        console.log('descripcionLibro:'+ flag);
    }
    if(!validarCampoVacio('imagenLibro')){
        flag=false;
        console.log('imagenLibro:' + flag);
    }
    if(!validarCampoVacio('VersionLibro')){
        flag=false;
        console.log('VersionLibro'+ flag);
    }
    if(!validarCampoVacio('EditorialLibro')){
        flag=false;
        console.log('EditorialLibro:' + flag);
    }
    if(!validarCampoVacio('CodigoInternacional')){
        flag=false;
        console.log('CodigoInternacional:' + flag);
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
    let inputValor = document.getElementById(idcampo).value;
    let error = document.getElementById(idcampo);

    let MensajeError = error.nextElementSibling;
    error.classList.remove('is-invalid');
    MensajeError.innerHTML = '';

    if (inputValor.length < 4) {
        MensajeError.innerHTML = 'Debe de tener mas de 4 carácteres';
       error.classList.add('is-invalid');
        return false;
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
    const profile_photo = document.getElementById("profile_photo").files[0];
    const imageError = document.getElementById("imageError");
    if (profile_photo && !profile_photo.type.startsWith('image/')) {
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

    // Expresión validar solo letras (incluyendo acentos y espacios)
    let soloLetras = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/;
    error.classList.remove('is-invalid');

    if (!soloLetras.test(inputValor)) {
        error.classList.add('is-invalid');
        MensajeError.innerHTML = "Solo se permiten letras y espacios.";
        return false;
    }

        error.classList.remove('is-invalid');
        MensajeError.innerHTML = "";

    return true;
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

function actualizarNombreUsuario(idcampo) {
    let NuevoNombre = document.getElementById(idcampo).value.trim();
    let nombre_usuarioviejo = document.getElementById('usuarioname');

    if (NuevoNombre !== '') {
        nombre_usuarioviejo.textContent = NuevoNombre;
    }
}


function actualizarFotoPerfil() {
    const profile_photoInput = document.getElementById('profile_photo');
    const profile_photo = document.querySelector('.perfil-img');

    if (profile_photoInput.files && profile_photoInput.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            profile_photo.src = e.target.result;
        }
        reader.readAsDataURL(profile_photoInput.files[0]);
    }
}



