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
                        <h1 class="text-center mb-1 mt-1" style="font-size: 30px;">Editar Informe</h1>
                    </div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('informes.update', $informe->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="titulo">Título:</label>
                                <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $informe->titulo }}" required>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción:</label>
                                <textarea class="form-control" id="descripcion" name="descripcion" required>{{ $informe->descripcion }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="tipo_informe">Tipo de Informe:</label>
                                <input type="text" class="form-control" id="tipo_informe" name="tipo_informe" value="{{ $informe->tipo_informe }}" required>
                            </div>
                            <div class="form-group">
                                <label for="centro_medico">Centro de administración:</label>
                                <select class="form-control" id="centro_medico" name="centro_medico" required>
                                    @foreach ($hospitales as $hospital)
                                        <option value="{{ $hospital->name }}" {{ $informe->centro_medico == $hospital->name ? 'selected' : '' }}>{{ $hospital->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="usuario_id">Usuario:</label>
                                <select class="form-control" id="usuario_id" name="usuario_id" required>
                                    <option value="">Selecciona un usuario</option>
                                    @foreach ($usuarios as $usuario)
                                        @if ($usuario->hasRole('user'))
                                            <option value="{{ $usuario->id }}" {{ $informe->usuario_id == $usuario->id ? 'selected' : '' }}>{{ $usuario->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="observaciones">observaciones:</label>
                                <textarea class="form-control" id="observaciones" name="observaciones" required>{{ $informe->observaciones }}</textarea>
                            </div>

                            <div class="text-center mt-4">
                                <button type="submit" class="custom-btn" style="font-size: 15px;">Actualizar Informe</button>
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
                <a href="{{ route('lista_informes') }}" class="custom-btn" style="font-size: 15px;">
                    <i class="fas fa-arrow-left"></i> {{ __('Volver a la lista de informes') }}
                </a>
            </div>
        </div>
    </div>

    @include('layouts.footer')
@endsection
