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
            <h1 class="text-center mb-1 mt-1" style="font-size: 30px;">Gestión de Vacunas</h1>
            </div>
                    <div class="card-body">
                        

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('gestion_vacunas.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>
                            <div class="form-group">
                                <label for="motivo">Motivo:</label>
                                <input type="text" class="form-control" id="motivo" name="motivo" required>
                            </div>
                            <div class="form-group">
                                <label for="nombre_comercial">Nombre Comercial:</label>
                                <input type="text" class="form-control" id="nombre_comercial" name="nombre_comercial" required>
                            </div>
                            <div class="form-group">
                                <label for="lote">Lote:</label>
                                <input type="text" class="form-control" id="lote" name="lote" required>
                            </div>
                            <div class="form-group">
                                <label for="centro_administracion">Centro de Administración:</label>
                                <select class="form-control" id="centro_administracion" name="centro_administracion" required>
                                    <option value="">Selecciona un hospital</option>
                                    @foreach ($hospitales as $hospital)
                                        <option value="{{ $hospital->name }}">{{ $hospital->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="via_administracion">Vía de Administración:</label>
                                <input type="text" class="form-control" id="via_administracion" name="via_administracion" required>
                            </div>
                            <div class="form-group">
                                <label for="localizacion_anatomica">Localización Anatómica:</label>
                                <input type="text" class="form-control" id="localizacion_anatomica" name="localizacion_anatomica" required>
                            </div>
                            <div class="form-group">
                                <label for="origen_informacion">Origen de la Información:</label>
                                <input type="text" class="form-control" id="origen_informacion" name="origen_informacion" required>
                            </div>

                            <div class="form-group">
                                <label for="fecha">Fecha de Administración:</label>
                                <input type="date" class="form-control" id="fecha" name="fecha" required>
                            </div>

                            <div class="form-group">
                                <label for="user_id">Usuario:</label>
                                <select id="user_id" name="user_id" class="form-control" required>
                                    <option value="">Selecciona un usuario</option>
                                    @foreach ($usuarios as $usuario)
                                        @if ($usuario->hasRole('user'))
                                            <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="text-center mt-4">
                                <button type="submit" class="custom-btn">Crear Vacuna</button>
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
                    <a href="{{ route('lista_vacunas') }}" class="custom-btn" style="font-size: 15px;">
                        Ir a lista de vacunas <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')
@endsection
