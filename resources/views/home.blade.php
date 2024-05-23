@extends('layouts.app')
@include('layouts.header')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SaluDigital - Página Principal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        .icon-text {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            height: 250px;
            border-radius: 40px;
            margin-bottom: 20px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .icon-text i {
            font-size: 4em;
            margin-bottom: 15px;
            border-radius: 50%;
            padding: 10px;
        }

        .blue-bg {
            background-color: #9ec3f4;
        }

        .green-bg {
            background-color: #a3e8b6;
        }

        .yellow-bg {
            background-color: #f9f871;
        }

        .purple-bg {
            background-color: #d8b3e8;
        }

        .orange-bg {
            background-color: #f5cba7;
        }

        .pink-bg {
            background-color: #f3a0b5;
        }

        .blue-bg:hover {
            background-color: #6a9ed4;
        }

        .green-bg:hover {
            background-color: #74b88e;
        }

        .yellow-bg:hover {
            background-color: #e3d14a;
        }

        .purple-bg:hover {
            background-color: #b57bb7;
        }

        .orange-bg:hover {
            background-color: #d4a282;
        }

        .pink-bg:hover {
            background-color: #d98192;
        }

        .white-icon {
            color: #fff;
        }

        .white-text {
            color: #000;
            font-size: 17px;
        }
    </style>
</head>
<body>
    <div class="mb-5">
        <div class="container mt-1">
            <h1 class="text-center">¡Bienvenido a SaluDigital, {{ Auth::user()->name }}!</h1>
            <p class="lead text-center">Tu plataforma de salud digital para gestionar tus informes, resultados, vacunas, diagnósticos, medicación y solicitar citas médicas de manera eficiente.</p>
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-3">
                        <a href="{{ route('informes') }}" class="icon-text blue-bg">
                            <i class="fas fa-file-medical white-icon" aria-hidden="true"></i>
                            <span class="white-text"><strong>Informes y Resultados</strong></span>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('vacunas') }}" class="icon-text green-bg">
                            <i class="fas fa-syringe white-icon" aria-hidden="true"></i>
                            <span class="white-text"><strong>Vacunas</strong></span>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('citas') }}" class="icon-text yellow-bg">
                            <i class="far fa-calendar-alt white-icon" aria-hidden="true"></i>
                            <span class="white-text"><strong>Citas</strong></span>
                        </a>
                    </div>
                </div>
                <div class="row mt-3 justify-content-center">
                    <div class="col-md-3">
                        <a href="{{ route('medicacion') }}" class="icon-text purple-bg">
                            <i class="fas fa-pills white-icon" aria-hidden="true"></i>
                            <span class="white-text"><strong>Medicación</strong></span>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('diagnosticos') }}" class="icon-text orange-bg">
                            <i class="fas fa-diagnoses white-icon" aria-hidden="true"></i>
                            <span class="white-text"><strong>Diagnósticos</strong></span>
                        </a>
                    </div>
                    <div class="col-md-3 mb-5">
                    <a href="{{ route('enviar_mensaje') }}" class="icon-text pink-bg">
                        <i class="fas fa-envelope white-icon" aria-hidden="true"></i>
                        <span class="white-text"><strong>Mensajes</strong></span>
                    </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer')
</body>
</html>
