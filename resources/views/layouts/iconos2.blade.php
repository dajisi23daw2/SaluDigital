@php
    $ruta_actual = \Request::url();
    $paginas = [
        'panel_control' => ['Inicio', 'fas fa-home'],
        'gestion_informes' => ['Informes', 'fas fa-file-medical'],
        'gestion_vacunas' => ['Vacunas', 'fas fa-syringe'],
        'gestion_citas' => ['Citas', 'far fa-calendar-alt'],
        'gestion_medicacion' => ['Medicación', 'fas fa-pills'],
        'gestion_diagnosticos' => ['Diagnósticos', 'fas fa-diagnoses'],
        'recibir_mensaje' => ['Mensajes', 'fas fa-envelope'],
    ];
@endphp


<div class="container-fluid mt-5">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block sidebar">
            <div class="sidebar-header">
                <img src="img/logo.png" alt="Logo" style="width: 100px; height: auto;">
            </div>
            <ul class="nav flex-column mt-4">
                @foreach($paginas as $pagina => [$nombre, $icono])
                    <li class="nav-item {{ str_contains($ruta_actual, $pagina) ? 'active' : '' }}">
                        <a class="nav-link text-white" href="{{ route($pagina) }}" style="font-size: 16px;">
                            <i class="{{ $icono }}"></i> {{ $nombre }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </nav>
        <main role="main" class="col-md-10 ml-sm-auto col-lg-10 px-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-10">

                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<style>
    .sidebar {
        background-color: #292929;
        color: #fff;
        height: 100vh;
        position: fixed;
        top: 0;
        left: 0;
        overflow-x: hidden;
        padding-top: 20px;
    }

    .sidebar-header {
        padding: 20px;
    }

    .nav-link {
        color: #fff;
        font-size: 16px;
    }

    .nav-link:hover {
        background-color: #576c7a;
        color: #000;
    }

    .nav-item.active .nav-link {
        background-color: #8e99af;
        color: #000;
    }
</style>
