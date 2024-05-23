@extends('layouts.app')
@include('layouts.header')
@include('layouts.iconos2')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-5">
                    <div class="card-body">
                        <h1 class="text-center mb-4">Editar Diagnóstico</h1>

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('diagnosticos.update', $diagnostico->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="problema_salud">Problema de Salud:</label>
                                <input type="text" class="form-control" id="problema_salud" name="problema_salud" value="{{ $diagnostico->problema_salud }}" required>
                            </div>
                            <div class="form-group">
                                <label for="centro">Centro:</label>
                                <select class="form-control" id="centro" name="centro" required>
                                    <option value="">Selecciona un hospital</option>
                                    @foreach ($hospitales as $hospital)
                                        <option value="{{ $hospital->name }}" {{ $diagnostico->centro == $hospital->name ? 'selected' : '' }}>{{ $hospital->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="fecha">Fecha:</label>
                                <input type="date" class="form-control" id="fecha" name="fecha" value="{{ $diagnostico->fecha }}" required>
                            </div>
                            <div class="form-group">
                                <label for="activo">Activo:</label>
                                <select class="form-control" id="activo" name="activo" required>
                                    <option value="1" {{ $diagnostico->activo == 1 ? 'selected' : '' }}>Sí</option>
                                    <option value="0" {{ $diagnostico->activo == 0 ? 'selected' : '' }}>No</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="usuario_id">Usuario:</label>
                                <select class="form-control" id="usuario_id" name="usuario_id" required>
                                    <option value="">Selecciona un usuario</option>
                                    @foreach ($usuarios as $usuario)
                                        @if ($usuario->hasRole('user'))
                                            <option value="{{ $usuario->id }}" {{ $diagnostico->usuario_id == $usuario->id ? 'selected' : '' }}>{{ $usuario->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="text-center mt-4">
                                <button type="submit" class="custom-btn" style="font-size: 15px;">Actualizar Diagnóstico</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-3">
        <div class="row justify-content-start">
            <div class="col-md-6">
                <div class="text-left">
                    <a href="{{ route('lista_diagnosticos') }}" class="custom-btn" style="font-size: 15px;">
                        <i class="fas fa-arrow-left"></i> {{ __('Volver a la lista de diagnósticos') }}
                    </a>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')
@endsection
