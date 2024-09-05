<!DOCTYPE html>
<html>
<head>
    <title>Aviso Importante</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #87CEEB; /* Celeste cielo */
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #F4A6A6; /* Rosa viejo */
            border: 2px solid #D8000C;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            text-align: center;
        }
        h2 {
            color: #D8000C;
        }
        p {
            margin: 10px 0;
        }
        .details {
            background-color: #FFF;
            border-radius: 5px;
            padding: 10px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Aviso Importante</h2>
    <p>Hola,</p>
    <p>Hemos detectado que tu mensaje contiene lenguaje inapropiado o información personal. Queremos recordarte que nuestra comunidad valora el respeto y la privacidad de todos los usuarios.</p>
    <p>Por favor, evita el uso de insultos y no compartas información personal en tus mensajes.</p>
    <div class="details">
        <p><strong>Detalles del análisis:</strong></p>
        <p><strong>Respuesta:</strong> {{ $response }}</p>
        <p><strong>Flags:</strong> {{ $flagResponse }}</p>
    </div>
    <p>¡Gracias por tu comprensión y por ayudarnos a mantener un ambiente seguro y amigable para todos!</p>
    <p>Atentamente,<br>El equipo de [Nombre de la Aplicación]</p>
</div>
</body>
</html>
