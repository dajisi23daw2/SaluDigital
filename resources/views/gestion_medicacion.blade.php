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
            <h1 class="text-center mb-1 mt-1" style="font-size: 30px">Gestión de Medicaciones</h1>
            </div>
                    <div class="card-body">
                        

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('gestion_medicacion.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción:</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                            </div>
                            <div class="form-group">
                                <label for="detalles">Detalles:</label>
                                <input type="text" class="form-control" id="detalles" name="detalles" required>
                            </div>
                            <div class="form-group">
                                <label for="fecha_inicio">Fecha de Inicio:</label>
                                <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" required>
                            </div>
                            <div class="form-group">
                                <label for="fecha_fin">Fecha de Fin:</label>
                                <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" required>
                            </div>
                            <div class="form-group">
                                <label for="usuario_id">Usuario:</label>
                                <select id="usuario_id" name="usuario_id" class="form-control" required>
                                    <option value="">Selecciona un usuario</option>
                                    @foreach ($usuarios as $usuario)
                                        @if ($usuario->hasRole('user'))
                                            <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="text-center mt-4">
                                <button type="submit" class="custom-btn">Crear Medicación</button>
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
                    <a href="{{ route('lista_medicacion') }}" class="custom-btn" style="font-size: 15px;">
                        Ir a lista de medicaciones <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')
@endsection
