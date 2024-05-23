@extends('layouts.app')
@include('layouts.header')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SaluDigital - Página Principal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        .welcome-container {
            text-align: center;
            background-color: #ffffff;
            padding: 50px 30px;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
            margin: auto;
        }

        .welcome-container img.logo {
            width: 175px;
            margin-bottom: 20px;
        }

        .welcome-container h1 {
            font-size: 36px;
            color: #333;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .welcome-container p {
            font-size: 18px;
            color: #666;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <div class="welcome-container">
        <img src="img/logo.png" alt="Logo" class="logo">
        <h1>Bienvenido a SaluDigital</h1>
        <p>Inicia sesión para acceder a tu cuenta.</p>
        <a href="{{ route('login') }}" class="custom-btn">Iniciar Sesión</a>
    </div>
    @include('layouts.footer')
</body>
</html>
