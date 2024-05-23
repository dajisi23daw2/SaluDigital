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
                        <h1 class="text-center mb-1 mt-1" style="font-size: 30px;">Gestión de Informes</h1>
                    </div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('guardar_informe') }}">
                            @csrf

                            <div class="form-group">
                                <label for="titulo">Título del informe:</label>
                                <input type="text" id="titulo" name="titulo" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="descripcion">Descripción:</label>
                                <textarea id="descripcion" name="descripcion" class="form-control" rows="3" required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="tipo_informe">Tipo de Informe:</label>
                                <select id="tipo_informe" name="tipo_informe" class="form-control" required>
                                    <option value="">Selecciona el tipo de informe</option>
                                    <option value="Informe de Historial Clínico">Informe de Historial Clínico</option>
                                    <option value="Informe de Resultados de Laboratorio">Informe de Resultados de Laboratorio</option>
                                    <option value="Informe de Consulta Especializada">Informe de Consulta Especializada</option>
                                    <option value="Informe de Alta Hospitalaria">Informe de Alta Hospitalaria</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="centro_medico">Centro Médico:</label>
                                <select id="centro_medico" name="centro_medico" class="form-control">
                                    <option value="">Selecciona el centro médico</option>
                                    @foreach ($hospitales as $hospital)
                                        <option value="{{ $hospital->id }}">{{ $hospital->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="usuario">Usuario:</label>
                                <select id="usuario" name="usuario_id" class="form-control" required>
                                    <option value="">Selecciona un usuario</option>
                                    @foreach ($usuarios as $usuario)
                                        @if ($usuario->hasRole('user'))
                                            <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="observaciones">observaciones:</label>
                                <textarea id="observaciones" name="observaciones" class="form-control" rows="3" required></textarea>
                            </div>

                            <div class="text-center mt-4">
                                <button type="submit" class="custom-btn">Crear Informe</button>
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
                <div>
                    <a href="{{ route('lista_informes') }}" class="custom-btn" style="font-size: 15px;">
                        Ir a lista de informes <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')
@endsection
