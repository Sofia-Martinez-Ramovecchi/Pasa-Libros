document.addEventListener('DOMContentLoaded', function() {
  
    const books = document.querySelectorAll('.book-item');

    books.forEach(book => {
        const editButton = book.querySelector('.edit-button');
        
        editButton.addEventListener('click', function() {
            const title = book.querySelector('h3').textContent;
            const description = book.querySelector('.descripcion').textContent;
            const state = book.querySelector('.Estado').textContent;
            const editorial = book.querySelector('.Editorial').textContent;
            const author = book.querySelector('.Autor').textContent;
            const version = book.querySelector('.Version').textContent;
            const code = book.querySelector('.Codigo').textContent;


            // Rellenar los datos en el modal
            document.getElementById('bookTitle').textContent = title;
            document.getElementById('bookDescription').textContent = description;
            document.getElementById('bookState').textContent = state;
            document.getElementById('bookEditorial').textContent = editorial;
            document.getElementById('bookAuthor').textContent = author;
            document.getElementById('bookVersion').textContent = version;
            document.getElementById('bookCode').textContent = code;

            // Mostrar el modal
            const bookModal = new bootstrap.Modal(document.getElementById('ModalInfoLibro'));
            bookModal.show();
        });
    });

    let buscador = document.getElementById('BuscadorLibro');
    buscador.addEventListener('input', function() {
        let error = buscador;
        error.classList.remove('is-invalid');
        
        if (buscador.value.trim() === '') { // Verifica si el valor está vacío
            error.classList.add('is-invalid');
        }
    });

    document.getElementById('CerrarModalBtn').addEventListener('click', function(){
        cerrarModalLibros();
        location.reload();
    })
});

function cerrarModalLibros() {
    var modal = document.getElementById('ModalInfoLibro');
    var modalInstance = bootstrap.Modal.getOrCreateInstance(modal); // Crea o recupera la instancia
    if (modalInstance) {
        modalInstance.hide(); 
    } else {
        console.error('El modal no se pudo cerrar');
    }
}

