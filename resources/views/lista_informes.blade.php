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
                <h1 class="text-center mb-1 mt-1" style="font-size: 30px;">Lista de Informes</h1>
                </div>
                    <div class="card-body">
                        

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if($informes->isEmpty())
                            <p>No hay informes disponibles.</p>
                        @else
                            <ul>
                                @foreach($informes as $informe)
                                    <li>
                                        <div style="float: left; margin-right: 200px;">
                                            <strong>Título:</strong> {{ $informe->titulo }} <br>
                                            <strong>Descripción:</strong> {{ $informe->descripcion }} <br>
                                            <strong>Tipo de Informe:</strong> {{ $informe->tipo_informe }} <br>
                                            <strong>Centro Médico:</strong> {{ $informe->centro_medico }} <br>
                                            <strong>Usuario:</strong> {{ $informe->usuario->name }} <br>
                                            <strong>observaciones:</strong> {{ $informe->observaciones }} <br>
                                        </div>
                                        <div style="float: right;">
                                            <form action="{{ route('eliminar_informe', $informe->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger custom-btn4">
                                                    <i class="bi bi-trash3-fill" style="font-size: 1.5rem; color: black;"></i>
                                                </button>
                                            </form>

                                            <a href="{{ route('editar_informes', $informe->id) }}" class="btn btn-sm btn-success ml-2" style="background-color: #28a745;">
                                                <i class="bi bi-pencil-fill" style="font-size: 1.5rem; color: black;"></i>
                                            </a>


                                        </div>
                                        <div style="clear: both;"></div>
                                    </li>
                                    <hr>
                                @endforeach
                            </ul>
                        @endif

                        @if($informes->hasPages())
                            <div class="d-flex justify-content-center mt-4">
                                @if ($informes->previousPageUrl())
                                    <a href="{{ $informes->previousPageUrl() }}" class="custom-btn">
                                        <i class="bi bi-caret-left-fill"></i>
                                    </a>
                                @endif

                                @if ($informes->nextPageUrl())
                                    <a href="{{ $informes->nextPageUrl() }}" class="custom-btn">
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
                    <a href="{{ route('gestion_informes') }}" class="custom-btn" style="font-size: 15px;">
                        <i class="fas fa-arrow-left"></i> {{ __('Volver a gestión de informes') }}
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
