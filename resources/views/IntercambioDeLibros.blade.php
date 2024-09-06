
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publicaciones de Libros</title>
    <link rel="stylesheet" href="{{ asset('css/intercambiolibrosstyle.css') }}"></head>
<body>
<div class="container">
    <h1>PASA LIBROS</h1>

    <div class="post">
        <h2>MARIA ★★★</h2>
        <p><strong>Libros:</strong> La materia oscura, Harry Potter</p>
        <textarea placeholder="Escribe una oferta..."></textarea>
        <button>Ofertar</button>
    </div>

    <div class="post">
        <h2>SOFIA ★★★★</h2>
        <p><strong>Libros:</strong> Viaje al centro de la Tierra</p>
        <textarea placeholder="Escribe una oferta..."></textarea>
        <button>Ofertar</button>
    </div>

    <div class="post">
        <h2>PEDRO ★</h2>
        <p><strong>Libros:</strong> El mundo de Sofía</p>

        <form class="post" action="{{ route('publicaciones.store') }}" method="POST">
            @csrf
            <textarea class="post" name="message" placeholder="Escribe una oferta..."></textarea>
            <button type="submit">Ofertar</button>
        </form>

        @if (isset($response) && $response)
            <p class="violation">❗Estas seguro de comentar eso, podría ser contra las normas de la aplicación.</p>
        @endif

    </div>
</div>
</body>
</html>
