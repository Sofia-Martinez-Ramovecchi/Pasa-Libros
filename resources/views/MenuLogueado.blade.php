
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css">
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<link rel="stylesheet" href="./InicioPL/EstiloInicio.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


<style>
    #map { height: 500px; width: 100%; }
</style>


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
                    <button type="button" class="btn btn-link me-3" aria-label="Publicar libro" data-bs-toggle="modal" data-bs-target="#publicarLibroModalInicio">
                        <i class="fas fa-plus"></i>
                    </button>
                    <!-- Icono de perfil con dropdown -->
                    <div class="dropdown">
                        <button class="btn btn-link dropdown-toggle" type="button" id="perfilDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user"></i> Mi Perfil
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="perfilDropdown">
                            <li><a class="dropdown-item" href="../../PerfilVistas/Perfil.php">Ver Perfil</a></li>
                            <li><a class="dropdown-item" href="MisIntercambios.blade.php">Mis Intercambios</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Cerrar Sesión</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>





