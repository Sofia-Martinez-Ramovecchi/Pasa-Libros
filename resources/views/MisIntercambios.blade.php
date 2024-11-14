@include('modales')

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Intercambios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script defer src="../js/ValorIntercambio.js"></script>
    <script defer src="../js/validaciones.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>



    <div class="container my-5">
    <h2 class="mb-4">Mis Intercambios</h2>

    <!-- Lista de intercambios -->
    <div class="list-group">
        <!-- Ejemplo de un intercambio pendiente -->
        <a href="#" class="list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">Intercambio con [Nombre del usuario]</h5>
                <small class="text-muted">Pendiente</small>
            </div>
            <p class="mb-1">Libro ofrecido: [Nombre del libro]</p>
            <p class="mb-1">Libro solicitado: [Nombre del libro]</p>
            <p class="mb-1">Usuario: [Nombre del usuario]</p>
            <small class="text-muted">Fecha: [Fecha de solicitud]</small>
            <div class="mt-2">
            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#valoracionModal">Valorar Intercambio</button>
            </div>
        </a><br>

        <!-- Ejemplo de un intercambio completado -->
        <a href="#" class="list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">Intercambio con [Nombre del usuario]</h5>
                <small class="text-success">Completado</small>
            </div>
            <p class="mb-1">Libro ofrecido: [Nombre del libro]</p>
            <p class="mb-1">Libro recibido: [Nombre del libro]</p>
            <p class="mb-1">Usuario: [Nombre del usuario]</p>
            <small class="text-muted">Fecha: [Fecha de intercambio]</small>
        </a><br>

        <!-- Ejemplo de un intercambio rechazado -->
        <a href="#" class="list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">Intercambio con [Nombre del usuario]</h5>
                <small class="text-danger">Rechazado</small>
            </div>
            <p class="mb-1">Libro ofrecido: [Nombre del libro]</p>
            <p class="mb-1">Libro solicitado: [Nombre del libro]</p>
            <p class="mb-1">Usuario: [Nombre del usuario]</p>
            <small class="text-muted">Fecha: [Fecha de rechazo]</small>
        </a><br>
    </div>
</div>

<!----------------- FOOTER  ------------------>
<footer class="bg-dark text-white text-center py-4">
    <div class="container p-4">
        <section class="mb-4">
            <a href="./InicioPL/InicioPL.php" class="btn btn-outline-light btn-floating m-1" role="button">Inicio</a>
            <a href="./InicioPL/InicioPL.php#categorias" class="btn btn-outline-light btn-floating m-1" role="button">Categorías</a>
        </section>
        <section class="mb-4">
            <p>Gracias por visitar nuestro sitio. Mantente conectado con nuestras redes sociales.</p>
        </section>
    </div>
    <p class="mb-0">PasaLibros © 2024 - Todos los derechos reservados</p>
</footer>



</body>
</html>
