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
                    <div class="card-body">
                        <h1 class="text-center" style="font-size: 30px;">Editar Medicación</h1>

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('medicacion.update', $medicacion->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $medicacion->nombre }}" required>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción:</label>
                                <textarea class="form-control" id="descripcion" name="descripcion" required>{{ $medicacion->descripcion }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="detalles">Detalles:</label>
                                <textarea class="form-control" id="detalles" name="detalles" required>{{ $medicacion->detalles }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="fecha_inicio">Fecha de Inicio:</label>
                                <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" value="{{ $medicacion->fecha_inicio }}" required>
                            </div>
                            <div class="form-group">
                                <label for="fecha_fin">Fecha de Fin:</label>
                                <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" value="{{ $medicacion->fecha_fin }}" required>
                            </div>
                            <div class="form-group">
                                <label for="usuario_id">Usuario:</label>
                                <select class="form-control" id="usuario_id" name="usuario_id" required>
                                    <option value="">Selecciona un usuario</option>
                                    @foreach ($usuarios as $usuario)
                                        @if ($usuario->hasRole('user'))
                                            <option value="{{ $usuario->id }}" {{ $medicacion->usuario_id == $usuario->id ? 'selected' : '' }}>{{ $usuario->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="text-center mt-4">
                                <button type="submit" class="custom-btn" style="font-size: 15px;">Actualizar Medicación</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-3">
        <div class="row justify-content-end">
            <div class="col-md-10 d-flex justify-content-start">
                <div class="text-left">
                    <a href="{{ route('lista_medicacion') }}" class="custom-btn" style="font-size: 15px;">
                        <i class="fas fa-arrow-left"></i> {{ __('Volver a la lista de medicaciones') }}
                    </a>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')
@endsection
