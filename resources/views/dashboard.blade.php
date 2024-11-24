@php
    use Illuminate\Support\Facades\Auth;
@endphp
@can('viewProfile', $usuario)

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Mi Perfil</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>

<div class="container-xl" id="Division">

    <!---------- CABEZERA PAGINA ----------------->
    <header>
        <div class="dropdown">
            <button class="btn btn-outline-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                Mi Perfil
            </button>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                <li>
                    <button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#editProfileModal">Editar Perfil</button>
                </li>
                <li>
                    <button class="dropdown-item" type="button" onclick="document.getElementById('logout-form').submit();">Cerrar Sesión</button>
                </li>
                <li>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">
                        Eliminar Cuenta
                    </button>
                </li>
            </ul>
        </div>
    </header>

    <!-- Contenido del perfil -->
    <div class="container-fluid text-center" id="DivFoto">
        <img id="FotoPerfil" src="{{ asset('storage/' . Auth::user()->profile_photo) }}" alt="Foto de perfil" class="img-fluid rounded-circle perfil-img">
    </div>



    <div id="descripcion" class="col text-center">
        <h1 class="profile-name">{{ Auth::user()->nombre_usuario }}</h1>

    </div>

    <!-- Formulario de Cierre de Sesión -->
    <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
        @csrf
    </form>

    <!-- Modal Eliminar Cuenta -->

    <div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteAccountModalLabel">Eliminar Cuenta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="delete-account-form" method="POST" action="{{ route('perfil.destroy') }}">
                        @csrf
                        @method('DELETE')
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <p>¿Estás seguro de que deseas eliminar tu cuenta? Esta acción no se puede deshacer.</p>
                        <button type="submit" class="btn btn-danger">Eliminar Cuenta</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <!-- ----------------- PUBLICACIONES Pagina------------- -->
    <div class="tab-content mt-4" id="myTabContent">
        <div class="tab-pane fade show active" id="publicaciones" role="tabpanel" aria-labelledby="publicaciones-tab">

            <!---------------- PUBLICAR LIBRO  ------------------>
            <div class="card my-3">
                <div class="card-body">
                    <button type="button" class="btn btn-light w-100 text-start" data-bs-toggle="modal" data-bs-target="#publicarLibroModalInicio">
                        ¿Qué libro quieres compartir hoy?
                    </button>
                </div>
            </div>

            <!---------------- PUBLICACIONES -------------------->
            <div class="card mb-3 position-relative">
                <div class="dropdown position-absolute EditarEliminar">
                    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        &#x22EE; <!-- Unicode para tres puntos verticales -->
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                        <li>
                            <button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#editPublicationModal">Editar Publicación</button>
                        </li>
                        <li>
                            <button class="dropdown-item text-danger" type="button">Eliminar Publicación</button>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Título del Libro</h5>
                    <p class="card-text">Descripción del libro.</p>
                </div>
            </div>
            <div class="card mb-3 position-relative">
                <div class="dropdown position-absolute EditarEliminar">
                    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        &#x22EE; <!-- Unicode para tres puntos verticales -->
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                        <li>
                            <button class="dropdown-item" type="button">Editar Publicación</button>
                        </li>
                        <li>
                            <button class="dropdown-item text-danger" type="button">Eliminar Publicación</button>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Título del Libro</h5>
                    <p class="card-text">Descripción del libro.</p>
                </div>
            </div>

            <!---------------- RESEÑAS PAGINA ----------------->
            <div class="tab-pane fade" id="reseñas" role="tabpanel" aria-labelledby="reseñas-tab">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Reseña de Usuario 1</h5>
                        <p class="card-text">Comentario del usuario sobre el libro.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<br>

<!----------------- FOOTER  ------------------>
<footer class="bg-dark text-white text-center py-4">
    <div class="container p-4">

        <section class="mb-4">
            <a href="{{ route('inicio') }}" class="btn btn-outline-light btn-floating m-1" role="button">Inicio</a>
            <a href="{{ route('categorias') }}#categorias" class="btn btn-outline-light btn-floating m-1" role="button">Categorías</a>
        </section>
        <section class="mb-4">
            <p>Gracias por visitar nuestro sitio. Mantente conectado con nuestras redes sociales.</p>
        </section>
    </div>
    <p class="mb-0">PasaLibros © 2024 - Todos los derechos reservados</p>
</footer>



<!-- Modal para publicar libro -->

<div class="modal fade" id="publicarLibroModalInicio" tabindex="-1" aria-labelledby="publicarLibroModalInicioLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Publicar un libro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="publicarLibroForm" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="mb-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tituloLibro" class="form-label">Título del Libro</label>
                                    <input type="text" class="form-control" id="tituloLibro" name="tituloLibro" placeholder="Escribe el título del libro" required>
                                    <div class="invalid-feedback">Por favor, ingresa un título.</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="autor" class="form-label">Autor</label>
                                    <input type="text" class="form-control" id="autor" name="autor" placeholder="Escribe el autor del libro" required>
                                    <div class="invalid-feedback">Por favor, ingresa el autor.</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="editorialLibro" class="form-label">Editorial</label>
                                    <input type="text" class="form-control" id="editorialLibro" name="editorialLibro" placeholder="Indique la editorial del libro" required>
                                    <div class="invalid-feedback">Por favor, ingresa la editorial.</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="versionLibro" class="form-label">Versión</label>
                                    <input type="text" class="form-control" id="versionLibro" name="versionLibro" placeholder="Escriba la versión del libro" required>
                                    <div class="invalid-feedback">Por favor, ingresa la versión.</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="codigoInternacional" class="form-label">Código Internacional</label>
                                    <input type="text" class="form-control" id="codigoInternacional" name="codigoInternacional" placeholder="Escribe el Código Internacional" required>
                                    <div class="invalid-feedback">Por favor, ingresa el código internacional.</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="photo" class="form-label">Subir portada del libro</label>
                                    <input class="form-control" type="file" id="photo" name="photo" multiple required>
                                    <div class="invalid-feedback">Por favor, sube la portada.</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="photoC" class="form-label">Contraportada (Opcional)</label>
                                    <input class="form-control" type="file" id="photoC" name="photoC">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="descripcionLibro" class="form-label">Descripción</label>
                                    <textarea class="form-control" id="descripcionLibro" name="description" rows="3" placeholder="Escribe una breve descripción del libro" required></textarea>
                                    <div class="invalid-feedback">Por favor, ingresa una descripción.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="cancelarLibro" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary" id="BtnPublicarLibro">Publicar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal para editar perfil con validaciones -->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProfileModalLabel">Editar Perfil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="EditarForm" method="POST" enctype="multipart/form-data" action="{{ route('perfil.patch') }}">
                    @csrf
                    @method('PATCH')
                    <!-- Nombre de Usuario -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre de usuario</label>
                        <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" placeholder="Nombre de usuario (opcional)" value="{{ old('nombre_usuario', auth()->user()->nombre_usuario) }}">
                        <small class="text-danger" id="errorUsername">Ingrese un nombre bien</small>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email (opcional)" autocomplete="email" value="{{ old('email', auth()->user()->email) }}">
                        <small class="text-danger" id="emailError"></small>
                    </div>

                    <!-- Contraseña -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña (opcional)" autocomplete="current-password">
                        <small class="text-danger" id="passwordError"></small>
                    </div>

                    <!-- Cambiar foto de perfil -->
                    <div class="mb-3">
                        <label for="profile_photo" class="form-label">Cambiar foto de perfil</label>
                        <input type="file" class="form-control" id="profile_photo" name="profile_photo" accept="image/*">
                        <small class="text-danger" id="imageError"></small>
                    </div>
                    <!-- Cambiar color de header -->
                    <div class="mb-3">
                        <label for="headerColorInput" class="form-label">Cambiar color de header</label>
                        <input type="color" class="form-control form-control-color" id="headerColorInput" name="headerColor" value="#ff0000">
                    </div>

                    <!-- Botones Guardar y Cancelar -->
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary" id="btnGuardarCambios">Guardar cambios</button>
                        <button type="button" id="btnCancelaEditar" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                    <div id="successMessage" class="alert alert-success d-none">Editado correctamente!</div>
                </form>
            </div>
        </div>
    </div>
</div>

@vite(['resources/css/EstiloPerfil.css', 'resources/js/form.js'])

</body>
</html>
@endcan
