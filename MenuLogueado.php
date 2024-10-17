<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <script defer src="./InicioPL/InicioPL.js"></script>
    
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css">
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>


    <style>
        #map { height: 500px; width: 100%; }
    </style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./InicioPL/EstiloInicio.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
 
</head>
<body>

    <header>
        <div class="container-lg" id="headerDiv">
            <div class="row align-items-center p-3">
                <div id="Logo" class="col-sm-3 text-start">
                    <h3>PasaLibros</h3>
                </div>
                <!------- buscador ----->
                <div class="col-md-6 d-flex justify-content-center">
                    <div class="input-group" id="search-bar">
                        <label for="BuscadorLibro" class="visually-hidden">Buscar libros</label>
                        <input id="BuscadorLibro" type="text" class="form-control" placeholder="Buscar libros..." aria-label="Buscar libros...">
                        <span class="input-group-text">
                            <i class="fas fa-search"></i>
                        </span>
                        <div class="invalid-feedback"></div>
                    </div>                    
                </div>
                <nav class="col-sm-3 text-end d-flex justify-content-end align-items-center">
                    <!-- Icono de notificaciones -->
                    <button type="button" class="btn btn-link me-3" aria-label="Notificaciones">
                        <i class="fas fa-bell"></i>
                    </button>
                    
                    <!-- Icono de ubicación -->
                    <button type="button" class="btn btn-link me-3" aria-label="Ubicación" data-bs-toggle="modal" data-bs-target="#ubicacionModal" id="btnUbicacion">
                        <i class="fas fa-map-marker-alt"></i>
                    </button>

                    <!-- Icono para publicar un libro -->
                    <button type="button" class="btn btn-link me-3" aria-label="Publicar libro" data-bs-toggle="modal" data-bs-target="#publicarLibroModal">
                        <i class="fas fa-plus"></i>
                    </button>
                    <!-- Icono de perfil con dropdown -->
                    <div class="dropdown">
                        <button class="btn btn-link dropdown-toggle" type="button" id="perfilDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user"></i> Mi Perfil
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="perfilDropdown">
                            <li><a class="dropdown-item" href="./PerfilVistas/Perfil.html">Ver Perfil</a></li>
                            <li><a class="dropdown-item" href="#">Mis Intercambios</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Cerrar Sesión</a></li>
                        </ul>
                    </div>
                </nav>                
            </div>
        </div>
    </header>


    <div class="modal fade" id="publicarLibroModal" tabindex="-1" aria-labelledby="publicarLibroLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="publicarLibroLabel">Publicar un libro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="publicarLibroForm">
                        <div class="mb-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="tituloLibro" class="form-label">Título del Libro</label>
                                        <input type="text" class="form-control" id="tituloLibro" placeholder="Escribe el título del libro" required>
                                        <div class="invalid-feedback">Por favor, ingresa un título.</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="autorLibro" class="form-label">Autor</label>
                                        <input type="text" class="form-control" id="autorLibro" placeholder="Escribe el autor del libro" required>
                                        <div class="invalid-feedback">Por favor, ingresa el autor.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="EditorialLibro" class="form-label">Editorial</label>
                                        <input type="text" class="form-control" name="EditorialLibro" id="EditorialLibro" placeholder="Indique la editorial del libro" required>
                                        <div class="invalid-feedback">Por favor, ingresa la editorial.</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="VersionLibro" class="form-label">Versión</label>
                                        <input type="text" class="form-control" name="VersionLibro" id="VersionLibro" placeholder="Escriba la versión del libro" required>
                                        <div class="invalid-feedback">Por favor, ingresa la versión.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="CodigoInternacional" class="form-label">Código Internacional</label>
                                        <input type="text" class="form-control" name="CodigoInternacional" id="CodigoInternacional" placeholder="Escribe el Código Internacional" required>
                                        <div class="invalid-feedback">Por favor, ingresa el código internacional.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="imagenLibro" class="form-label">Subir portada del libro</label>
                                        <input class="form-control" type="file" id="imagenLibro" required>
                                        <div class="invalid-feedback">Por favor, sube la portada.</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="imagenLibroContraportada" class="form-label">Contraportada (Opcional)</label>
                                        <input class="form-control" type="file" id="imagenLibroContraportada">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="descripcionLibro" class="form-label">Descripción</label>
                                        <textarea class="form-control" id="descripcionLibro" rows="3" placeholder="Escribe una breve descripción del libro" required></textarea>
                                        <div class="invalid-feedback">Por favor, ingresa una descripción.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="BtnPublicarLibro">Publicar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para mostrar el mapa -->
        <div class="modal fade" id="ubicacionModal" tabindex="-1" aria-labelledby="ubicacionModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ubicacionModalLabel">Ubicación</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                       <?php require __DIR__.'/mapa.php'; ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>


</body>
</html>