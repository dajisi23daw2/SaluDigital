@php
    $ruta_actual = \Request::route()->getName();
    $paginas = [
        'home' => ['Inicio', 'fas fa-home'],
        'informes' => ['Informes', 'fas fa-file-medical'],
        'vacunas' => ['Vacunas', 'fas fa-syringe'],
        'citas' => ['Citas', 'far fa-calendar-alt'],
        'medicacion' => ['Medicación', 'fas fa-pills'],
        'diagnosticos' => ['Diagnósticos', 'fas fa-diagnoses'],
        'enviar_mensaje' => ['Mensajes', 'fas fa-envelope'],
    ];
@endphp

<div class="container mt-0">
    <div class="row justify-content-center">
        @foreach($paginas as $pagina => [$nombre, $icono])
            <div class="col-md-1 mb-5">
                <div class="icon-box text-center {{ str_contains($ruta_actual, $pagina) ? 'selected' : '' }}">
                    <a href="{{ route($pagina) }}" class="icon-box-inner d-flex align-items-center justify-content-center">
                        <i class="{{ $icono }}"></i>
                    </a>
                </div>
                <div class="text-center mt-2">{{ $nombre }}</div>
            </div>
        @endforeach
    </div>
</div>

<style>
    .icon-box {
        background-color: #bbc0c5;
        border-radius: 12px;
        padding: 20px;
        transition: background-color 0.3s ease;
    }

    .icon-box:hover {
        background-color: #8ebaf4;
    }

    .icon-box.selected {
        background-color: #8ebaf4;
    }

    .icon-box-inner {
        color: #fff;
        text-decoration: none;
    }

    .icon-box-inner i {
        font-size: 30px;
    }

    .text-center {
        text-align: center;
        font-size: 14px;
    }
</style>