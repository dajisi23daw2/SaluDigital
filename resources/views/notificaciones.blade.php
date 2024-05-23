<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - SaluDigital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .notification-btn {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Bienvenido a SaluDigital</h1>
        <p>Tu plataforma de salud digital para gestionar tus informes, resultados, vacunas y citas médicas de manera eficiente.</p>

        @if ($mostrarBoton)
            <button class="btn btn-primary notification-btn">Activar Notificaciones</button>
        @endif
    </div>
</body>
</html>
