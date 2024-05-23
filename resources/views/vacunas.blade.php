@extends('layouts.app')
@include('layouts.header')
@include('layouts.iconos')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card mb-5">
                <div class="card-header">
                <h1 class="text-center mb-0" style="font-size: 30px;">Vacunas</h1>
                </div>
                    <div class="card-body">
                    
                    <p class="text-center" style="font-size: 15px;">Aquí encontrarás una lista de todas las vacunas disponibles.</p>
                        <div class="mb-4">
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Fecha</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($vacunas as $vacuna)
                                        <tr>
                                            <td>{{ $vacuna->nombre }}</td>
                                            <td>{{ $vacuna->fecha }}</td>
                                            <td>
                                                <button id="boton_{{ $vacuna->id }}" class="btn btn-ink vacuna-motivo" style="color: #8ebaf4" onclick="mostrarDetalles('{{ $vacuna->id }}')">
                                                    <i id="icono_{{ $vacuna->id }}" class="fas fa-plus"></i>
                                                </button>
                                                <div id="detalles_{{ $vacuna->id }}" class="detalles_vacuna" style="display: none;">
                                                    <ul class="list-unstyled">
                                                        <li><strong>Nom comercial:</strong> {{ $vacuna->nombre_comercial }}</li>
                                                        <li><strong>Lot:</strong> {{ $vacuna->lote }}</li>
                                                        <li><strong>Centre d'administració:</strong> {{ $vacuna->centro_administracion }}</li>
                                                        <li><strong>Via:</strong> {{ $vacuna->via_administracion }}</li>
                                                        <li><strong>Localització anatòmica:</strong> {{ $vacuna->localizacion_anatomica }}</li>
                                                        <li><strong>Origen de la informació:</strong> {{ $vacuna->origen_informacion }}</li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                                @if($vacunas->hasPages())
                                    <div class="d-flex justify-content-center mt-4">
                                        @if ($vacunas->previousPageUrl())
                                            <a href="{{ $vacunas->previousPageUrl() }}" class="custom-btn">
                                                <i class="bi bi-caret-left-fill"></i>
                                            </a>
                                        @endif

                                        @if ($vacunas->nextPageUrl())
                                            <a href="{{ $vacunas->nextPageUrl() }}" class="custom-btn">
                                                <i class="bi bi-caret-right-fill"></i>
                                            </a>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer')
@endsection

<script>
    function mostrarDetalles(id) {
        const detalles = document.getElementById('detalles_' + id);
        const boton = document.getElementById('boton_' + id);
        if (detalles.style.display === 'block') {
            detalles.style.display = 'none';
            boton.innerHTML = '<i id="icono_' + id + '" class="fas fa-plus"></i>';
        } else {
            detalles.style.display = 'block';
            boton.innerHTML = '<i id="icono_' + id + '" class="fas fa-minus"></i>';
        }
    }
</script>
