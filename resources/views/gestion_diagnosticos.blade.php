@extends('layouts.app')
@include('layouts.header')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-2">
                @include('layouts.iconos2')
            </div>
            <div class="col-md-8">
            <div class="card mb-5 mt-3">
            <div class="card-header">
            <h1 class="text-center  mb-1 mt-1" style="font-size: 30px">Crear Diagnóstico</h1>
            </div>
                    <div class="card-body">

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('diagnosticos.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="problema_salud">Problema de Salud:</label>
                                <input type="text" class="form-control" id="problema_salud" name="problema_salud" required>
                            </div>
                            <div class="form-group">
                                <label for="centro">Centro:</label>
                                <select class="form-control" id="centro" name="centro" required>
                                    <option value="">Selecciona un hospital</option>
                                    @foreach ($hospitales as $hospital)
                                        <option value="{{ $hospital->name }}">{{ $hospital->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="fecha">Fecha:</label>
                                <input type="date" class="form-control" id="fecha" name="fecha" required>
                            </div>
                            <div class="form-group">
                                <label for="activo">Activo:</label>
                                <select class="form-control" id="activo" name="activo" required>
                                <option value="">Selecciona el estado</option>
                                    <option value="1">Sí</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="usuario_id">Usuario:</label>
                                <select class="form-control" id="usuario_id" name="usuario_id" required>
                                    <option value="">Selecciona un usuario</option>
                                    @foreach ($usuarios as $usuario)
                                        @if ($usuario->hasRole('user'))
                                            <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="text-center mt-4">
                                <button type="submit" class="custom-btn" style="font-size: 15px;">Crear Diagnóstico</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-3">
        <div class="row justify-content-end">
            <div class="col-md-6 d-flex justify-content-end">
                <div class="text-center">
                    <a href="{{ route('lista_diagnosticos') }}" class="custom-btn" style="font-size: 15px;">
                        Ir a lista de diágnosticos <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')
@endsection
