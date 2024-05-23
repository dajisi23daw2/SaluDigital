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
                        <h1 class="text-center mb-4" style="font-size: 30px;">Lista de Diágnosticos</h1>

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if($diagnosticos->isEmpty())
                            <p>No hay diágnosticos disponibles.</p>
                        @else
                            <ul>
                                @foreach($diagnosticos as $diagnostico)
                                    <li>
                                        <div style="float: left; margin-right: 200px;">
                                            <strong>Problema de salud:</strong> {{ $diagnostico->problema_salud }} <br>
                                            <strong>Centro:</strong> {{ $diagnostico->centro }} <br>
                                            <strong>Fecha:</strong> {{ $diagnostico->fecha }} <br>
                                            <strong>Activo:</strong> {{ $diagnostico->activo ? 'Sí' : 'No' }} <br>
                                            <strong>Usuario:</strong> {{ $diagnostico->usuario->name }} <br>
                                        </div>
                                        <div style="float: right;">
                                            <form action="{{ route('eliminar_diagnosticos', $diagnostico->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger custom-btn4">
                                                    <i class="bi bi-trash3-fill" style="font-size: 1.5rem; color: black;"></i>
                                                </button>
                                            </form>
                                            
                                            <a href="{{ route('editar_diagnostico', $diagnostico->id) }}" class="btn btn-sm btn-success ml-2" style="background-color: #28a745;">
                                                <i class="bi bi-pencil-fill" style="font-size: 1.5rem; color: black;"></i>
                                            </a>
                                        </div>
                                        <div style="clear: both;"></div>
                                    </li>
                                    <hr>
                                @endforeach
                            </ul>
                        @endif

                        @if($diagnosticos->hasPages())
                            <div class="d-flex justify-content-center mt-4">
                                @if ($diagnosticos->previousPageUrl())
                                    <a href="{{ $diagnosticos->previousPageUrl() }}" class="custom-btn">
                                        <i class="bi bi-caret-left-fill"></i>
                                    </a>
                                @endif

                                @if ($diagnosticos->nextPageUrl())
                                    <a href="{{ $diagnosticos->nextPageUrl() }}" class="custom-btn">
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
                    <a href="{{ route('gestion_diagnosticos') }}" class="custom-btn" style="font-size: 15px;">
                        <i class="fas fa-arrow-left"></i> {{ __('Volver a gestión de diágnosticos') }}
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
