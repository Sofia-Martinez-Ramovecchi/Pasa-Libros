<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PasaLibros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="Bienvenida.css">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="#">PasaLibros</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <a href="#" class="btn btn-outline-light me-2">Iniciar Sesión</a>
                <a href="#" class="btn btn-light">Registrarse</a>
            </div>
        </div>
    </nav>


    <div class="container-center">
        <h1 class="mb-3">PasaLibros</h1>
        <p class="tagline">Un mundo de libros esperando ser compartido</p>

        
        <div class="login-form">
            <form>
                <h3 class="mb-3">Inicia sesión para continuar</h3>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">@</span>
                    <input type="text" class="form-control" placeholder="Nombre de usuario" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-violet">Iniciar Sesión</button>
                </div>

            </form>
        </div>
    </div>

    <footer>
        <p class="mb-0">© 2024 PasaLibros - Todos los derechos reservados</p>
        <p class="small">Síguenos en 
            <a href="#" class="text-white text-decoration-none">Instagram</a> | 
            <a href="#" class="text-white text-decoration-none">Facebook</a>
        </p>
    </footer>

</body>
</html>
