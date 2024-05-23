<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SaluDigital - Página Principal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    
    <style>
        .card {
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
        }
        .navbar-app-blade {
            background-color: #8ebaf4;
        }
        .navbar-app-blade .nav-link {
            color: #fff !important;
            margin-right: 15px;
        }
        .navbar-app-blade .nav-link:hover {
            color: #ccc !important;
        }
        #header {
            font-size: 20px;
        }
        body {
            display: none;
        }
        .custom-btn {
            background-color: #8ebaf4;
            font-size: 15px;
            border-radius: 10px;
            color: black;
            border: none;
            padding: 10px 25px;
            text-decoration: none;
        }
        .custom-btn:hover {
            background-color: #7e9dbd;
        }
        .custom-btn2 {
            background-color: #ced4da;
            border-radius: 10px;
            font-size: 15px;
            color: black;
            border: none;
            padding: 10px 25px;
            text-decoration: none;
        }
        .custom-btn2:hover {
            background-color: #a6aeb6;
        }
        .custom-btn3 { 
            background-color: #bbc0c5;
            border-radius: 10px;
            color: black;
            font-size: 15px;
            border: none;
            padding: 10px 25px;
            text-decoration: none;
        }
        .custom-btn3:hover {
            background-color: #999999;
        }
        .custom-btn4 { 
            background-color: #f34336;
            border-radius: 10px;
            color: black;
            font-size: 15px;
            border: none;
            padding: 10px 25px;
            text-decoration: none;
        }
        .custom-btn4:hover {
            background-color: #d11507;
        }
        .hover-bg-color:hover {
           background-color: #8ebaf4 !important;
        }
        .navbar-app-blade .nav-link.register-link {
            color: #000 !important;
            font-size: 16px;
        }
        .navbar-app-blade .nav-link.dropdown-toggle.user-name {
            color: #000 !important;
        }
    </style>
</head>
<body>
<div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm navbar-app-blade">
            <div class="container">
            <a id="header" class="navbar-brand" href="{{ Auth::check() && Auth::user()->hasRole('medico') ? url('/panel_control') : url('/home') }}">
                SaluDigital
            </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        @guest
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link register-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle user-name" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item hover-bg-color" href="{{ route('configuracion') }}" style="transition: background-color 0.3s;">
                                    {{ __('Configuración') }}
                                </a>
                                <a class="dropdown-item hover-bg-color" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();" style="transition: background-color 0.3s;">
                                    {{ __('Cerrar sesión') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        document.body.style.display = "block";
    </script>
</body>
</html>