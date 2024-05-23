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
                    <div class="card-body">
                        <h1 class="text-center mb-4" style="font-size: 30px;">Lista de Medicaciones</h1>

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if($medicaciones->isEmpty())
                            <p>No hay medicaciones disponibles.</p>
                        @else
                        <ul>
                                @foreach($medicaciones as $medicacion)
                                    <li>
                                        <div style="float: left; margin-right: 200px;">
                                            <strong>Nombre:</strong> {{ $medicacion->nombre }} <br>
                                            <strong>Descripción:</strong> {{ $medicacion->descripcion }} <br>
                                            <strong>Detalles:</strong> {{ $medicacion->detalles }} <br>
                                            <strong>Fecha inicial:</strong> {{ $medicacion->fecha_inicio }} <br>
                                            <strong>Fecha final:</strong> {{ $medicacion->fecha_fin }} <br>
                                            <strong>Usuario:</strong> {{ $medicacion->usuario->name }} <br>
                                        </div>
                                        <div style="float: right;">
                                            <form action="{{ route('eliminar_medicacion', $medicacion->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger custom-btn4">
                                                    <i class="bi bi-trash3-fill" style="font-size: 1.5rem; color: black;"></i>
                                                </button>
                                            </form>

                                            <a href="{{ route('editar_medicacion', $medicacion->id) }}" class="btn btn-sm btn-success ml-2" style="background-color: #28a745;">
                                                <i class="bi bi-pencil-fill" style="font-size: 1.5rem; color: black;"></i>
                                            </a>

                                        </div>
                                        <div style="clear: both;"></div>
                                    </li>
                                    <hr>
                                @endforeach
                            </ul>
                        @endif

                        @if($medicaciones->hasPages())
                            <div class="d-flex justify-content-center mt-4">
                                @if ($medicaciones->previousPageUrl())
                                    <a href="{{ $medicaciones->previousPageUrl() }}" class="custom-btn">
                                        <i class="bi bi-caret-left-fill"></i>
                                    </a>
                                @endif

                                @if ($medicaciones->nextPageUrl())
                                    <a href="{{ $medicaciones->nextPageUrl() }}" class="custom-btn">
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
                    <a href="{{ route('gestion_medicacion') }}" class="custom-btn" style="font-size: 15px;">
                        <i class="fas fa-arrow-left"></i> {{ __('Volver a gestión de medicación') }}
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
