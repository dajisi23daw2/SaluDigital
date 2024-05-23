@extends('layouts.app')
@include('layouts.header')
@include('layouts.iconos')


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SaluDigital - Otros Servicios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        .service-card {
            border: 1px solid #ccc;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        .service-card-body {
            padding: 20px;
        }
        .service-card i {
            font-size: 3em;
            margin-bottom: 10px;
        }
        .service-card-title {
            font-size: 1.5em;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .service-card-description {
            font-size: 1.1em;
        }
    </style>
</head>
<body>
    <div class="container mt-3 mb-5">
        <div class="row">
            <div class="col-md-4">
                <div class="service-card">
                    <div class="service-card-body">
                        <i class="fas fa-heartbeat"></i>
                        <h3 class="service-card-title">Seguimiento de Salud</h3>
                        <p class="service-card-description">Mantén un registro detallado de tu salud y bienestar con nuestras herramientas de seguimiento personalizadas.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-card">
                    <div class="service-card-body">
                        <i class="fas fa-user-md"></i>
                        <h3 class="service-card-title">Consulta Virtual</h3>
                        <p class="service-card-description">Programa consultas médicas virtuales con nuestros profesionales de la salud desde la comodidad de tu hogar.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-card">
                    <div class="service-card-body">
                        <i class="fas fa-file-alt"></i>
                        <h3 class="service-card-title">Documentación Médica</h3>
                        <p class="service-card-description">Accede y administra fácilmente tu historial médico, informes y otros documentos importantes relacionados con tu salud.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer')
</body>
</html>
