document.addEventListener('DOMContentLoaded', function() {
    const books = document.querySelectorAll('.book-item');
    
    books.forEach(book => {
        book.addEventListener('click', function() {
            const title = this.querySelector('h3').textContent;
            const description = this.querySelector('p').textContent;
            const imageSrc = 'ruta_de_la_imagen'; // Reemplaza con la lógica adecuada para la portada del libro
            
            // Rellenar los datos en el modal
            document.getElementById('bookTitle').textContent = title;
            document.getElementById('bookDescription').textContent = description;
            document.getElementById('bookImage').src = imageSrc;
            
            // Mostrar el modal
            const bookModal = new bootstrap.Modal(document.getElementById('bookDetailsModal'));
            bookModal.show();
        });
    });
});
