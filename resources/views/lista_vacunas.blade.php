@extends('layouts.app')
@include('layouts.header')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-2">
                @include('layouts.iconos2')
            </div>
            <div class="col-md-8">
                <div class="card mb-5 mt-3">
                    <div class="card-header">
                        <h1 class="text-center mb-1 mt-1" style="font-size: 30px;">Lista de Vacunas</h1>
                    </div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if($vacunas->isEmpty())
                            <p>No hay vacunas disponibles.</p>
                        @else
                            <ul>
                                @foreach($vacunas as $vacuna)
                                    <li>
                                        <div style="float: left; margin-right: 200px;">
                                            <strong>Nombre:</strong> {{ $vacuna->nombre }} <br>
                                            <strong>Fecha:</strong> {{ $vacuna->fecha }} <br>
                                            <strong>Nombre comercial:</strong> {{ $vacuna->nombre_comercial }} <br>
                                            <strong>Motivo:</strong> {{ $vacuna->motivo }} <br>
                                            <strong>Lote:</strong> {{ $vacuna->lote }} <br>
                                            <strong>Centro de administración:</strong> {{ $vacuna->centro_administracion }} <br>
                                            <strong>Vía administración:</strong> {{ $vacuna->via_administracion }} <br>
                                            <strong>Localización anatómica:</strong> {{ $vacuna->localizacion_anatomica }} <br>
                                            <strong>Origen información:</strong> {{ $vacuna->origen_informacion }} <br>
                                            <strong>Usuario:</strong> {{ $vacuna->usuario->name }} <br>
                                        </div>
                                        <div style="float: right;">
                                            <form action="{{ route('eliminar_vacuna', $vacuna->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger custom-btn4">
                                                    <i class="bi bi-trash3-fill" style="font-size: 1.5rem; color: black;"></i>
                                                </button>
                                            </form>
                                            <a href="{{ route('editar_vacunas', $vacuna->id) }}" class="btn btn-sm btn-success ml-2" style="background-color: #28a745;">
                                                <i class="bi bi-pencil-fill" style="font-size: 1.5rem; color: black;"></i>
                                            </a>
                                        </div>
                                        <div style="clear: both;"></div>
                                    </li>
                                    <hr>
                                @endforeach
                            </ul>
                        @endif

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

    <div class="container mt-3">
        <div class="row justify-content-end">
            <div class="col-md-10 d-flex justify-content-start">
                <div class="text-left">
                    <a href="{{ route('gestion_vacunas') }}" class="custom-btn" style="font-size: 15px;">
                        <i class="fas fa-arrow-left"></i> {{ __('Volver a gestión de vacunas') }}
                    </a>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')
@endsection

<style>
    .btn-success:hover {
        background-color: #218838 !important;
    }
</style>
