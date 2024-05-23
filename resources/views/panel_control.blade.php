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
        body {
            background-color: #f8f9fa;
        }

        .panel-item {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            height: 200px;
            border-radius: 10px;
            margin-bottom: 20px;
            text-decoration: none;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .panel-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .icon {
            font-size: 3em;
            margin-bottom: 10px;
            color: #fff;
            transition: color 0.3s ease;
        }

        .title {
            font-size: 1.2em;
            color: #000;
            font-weight: bold;
            margin-bottom: 5px;
            transition: color 0.3s ease;
        }

        .description {
            font-size: 14px;
            color: #000;
            text-align: center;
            transition: color 0.3s ease;
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
    </style>
</head>
<body>
    <div class="container mt-3 mb-5">
    <h1 class="text-center mb-4">¡Bienvenido al Panel de Control de SaluDigital, {{ Auth::user()->name }}!</h1>
        <p class="lead text-center">Tu plataforma de salud digital para gestionar tus informes, resultados, vacunas, diagnósticos, medicación y solicitar citas médicas de manera eficiente.</p>
        <div class="row justify-content-center mt-5">
            <div class="col-md-4">
                <a href="{{ route('gestion_informes') }}" class="panel-item blue-bg">
                    <i class="fas fa-file-medical icon"></i>
                    <div class="title">Informes y Resultados</div>
                    <div class="description">Administra tus informes médicos y resultados de análisis.</div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('gestion_vacunas') }}" class="panel-item green-bg">
                    <i class="fas fa-syringe icon"></i>
                    <div class="title">Vacunas</div>
                    <div class="description">Consulta y registra tus vacunas.</div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('gestion_citas') }}" class="panel-item yellow-bg">
                    <i class="far fa-calendar-alt icon"></i>
                    <div class="title">Citas</div>
                    <div class="description">Programa y gestiona tus citas médicas.</div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('gestion_medicacion') }}" class="panel-item purple-bg">
                    <i class="fas fa-pills icon"></i>
                    <div class="title">Medicación</div>
                    <div class="description">Lleva un registro de tu medicación.</div>
                </a>
            </div>
            <div class="col-md-4 mb-5">
                <a href="{{ route('gestion_diagnosticos') }}" class="panel-item orange-bg">
                    <i class="fas fa-diagnoses icon"></i>
                    <div class="title">Diagnósticos</div>
                    <div class="description">Consulta tus diagnósticos médicos.</div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('recibir_mensaje') }}" class="panel-item pink-bg">
                    <i class="fas fa-envelope icon"></i>
                    <div class="title">Mensajes</div>
                    <div class="description">Gestiona mensajes recibidos.</div>
                </a>
            </div>
        </div>
    </div>
    @include('layouts.footer')
</body>
</html>

