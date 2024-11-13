<!-- Incluir el archivo modales.blade.php -->
@include('modales')


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario Perfil</title>
    <link rel="stylesheet" href="../css/UsuarioPerfil.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script defer src="../js/UsuarioPerfil.js"></script>
</head>
<body>
<div class="container-xl" id="Division">

    <!---------- CABEZERA PAGINA ----------------->
    <header>
        <div id="headerDiv" class="dynamic-header">
            <div class="container-fluid p-5 text-white d-flex flex-column flex-md-row justify-content-between align-items-center">
                <div class="col-md-2 text-center text-md-end ms-auto"></div>
            </div>
        </div><br>

        <div class="container-fluid text-center" id="DivFoto">
            <img id="FotoPerfil" src="https://cdn-icons-png.flaticon.com/512/3135/3135823.png" alt="Foto de perfil" class="img-fluid rounded-circle perfil-img">
        </div>

        <div id="descripcion" class="col text-center">
            <h3 id="nombre_usuarioPerfil">Mica</h3>
            <p>Se unió en --- de ---</p>
        </div><br>
    </header><br>

    <!--------------BARRA RESEÑAS/PUBLICACIONES-------------->
    <div id="ContenedorPublicaciones">
        <section>
            <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="publicaciones-tab" data-bs-toggle="tab" data-bs-target="#publicaciones" type="button" role="tab" aria-controls="publicaciones" aria-selected="true">Publicaciones</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="reseñas-tab" data-bs-toggle="tab" data-bs-target="#reseñas" type="button" role="tab" aria-controls="reseñas" aria-selected="false">Reseñas</button>
                </li>
            </ul>

            <!-- Contenido de las pestañas -->
            <div class="tab-content mt-4" id="myTabContent">
                <!-- Contenido de la pestaña Publicaciones -->
                <div class="tab-pane fade show active" id="publicaciones" role="tabpanel" aria-labelledby="publicaciones-tab">
                    <div class="card mb-3 position-relative">
                        <div class="dropdown position-absolute denunciar">
                            <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                &#x22EE; <!-- Unicode para tres puntos verticales -->
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                <li>
                                    <button class="dropdown-item BtnDenunciar" type="button">Denunciar publicación</button>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Título del Libro</h5>
                            <p class="card-text">Descripción del libro.</p>
                        </div>
                    </div>
                </div>


                <!-- Contenido de la pestaña Reseñas -->
                <div class="tab-pane fade" id="reseñas" role="tabpanel" aria-labelledby="reseñas-tab">
                    <div class="card mb-3 position-relative">
                        <div class="dropdown position-absolute denunciar" style="top: 10px; right: 10px;">
                            <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                &#x22EE;
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                <li>
                                    <!-- Agrego data-bs-toggle="modal" y data-bs-target="#DenunciarModal" -->
                                    <button class="dropdown-item BtnDenunciar" type="button" data-bs-toggle="modal" data-bs-target="#DenunciarModal">Denunciar</button>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Reseña de Usuario 1</h5>
                            <p class="card-text">Comentario del usuario sobre el libro.</p>
                        </div>
                    </div>
                </div>


            </div>
        </section>
    </div>

    <button type="button" class="btn btn-outline-secondary btn-lg" data-bs-toggle="modal" data-bs-target="#enviarMensajeModal" id="BtnMensaje">Enviar Mensaje</button><br>

    <!----------------- FOOTER  ------------------>
    <br><footer class="bg-dark text-white text-center py-4">
        <div class="container p-4">
            <!-- Sección de redes sociales -->
            <section class="mb-4">
                <section class="mb-4">
                    <a href="{{ route('inicio') }}" class="btn btn-outline-light btn-floating m-1" role="button">Inicio</a>
                    <a href="{{ route('categorias') }}#categorias" class="btn btn-outline-light btn-floating m-1" role="button">Categorías</a>
                </section>

            </section>
            <section class="mb-4">
                <p>Gracias por visitar nuestro sitio. Mantente conectado con nuestras redes sociales.</p>
            </section>
        </div>
        <p class="mb-0">PasaLibros © 2024 - Todos los derechos reservados</p>
    </footer>
</div>

</body>
</html>

