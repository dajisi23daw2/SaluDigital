@extends('layouts.app')
@include('layouts.header')

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión Exitoso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .button2 {
            font-size: 20px;
            background-color: #6c757d;
        }
 
        .alert-custom {
            background-color: #DFF0D8;
            opacity: 0.6;
            color: #3C763D;
            padding: 15px;
            border: 1px solid #D6E9C6;
            border-radius: 4px;
            margin-bottom: 20px;
        }

        .alert.alert-warning {
            border: 1px solid #FFC107;
        }
        
        .alert.alert-success {
            border: 1px solid #28a745;
        }
    </style>
</head>
<body>
<div class="container" style="max-width: 500px; font-size: 17px;">
    <div class="alert alert-success text-center alert-custom" role="alert">
        <strong>¡Bienvenido, {{ Auth::user()->name }}! Has iniciado sesión correctamente.</strong>
    </div>
    <div class="alert alert-warning" role="alert">
        SaluDigital te facilita el acceso a la información que consta en tu historia clínica compartida de Cataluña y a otros registros donde se recopilan los datos y documentos generados en tu relación con el Sistema de Salud de Cataluña. También puedes acceder a trámites y servicios de salud digital de manera segura y confidencial. Puedes obtener más información sobre el marco legal vigente accediendo al Aviso legal.
    </div>

    <div class="d-flex justify-content-between align-items-center">
        <a href="{{ Auth::user()->hasRole('medico') ? route('panel_control') : route('home') }}" class="custom-btn" style="text-decoration: none;">Continuar</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="custom-btn2" style="text-decoration: none;">Salir</button>
        </form>
    </div>
</div>
@include('layouts.footer')
</body>
</html>
