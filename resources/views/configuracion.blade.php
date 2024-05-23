@extends('layouts.app')
@include('layouts.header')

@section('content')

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mb-5">
                <div class="card-header">
                    <h3 class="card-title">Detalles del Usuario</h3>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item"><strong>Nombre:</strong> {{ Auth::user()->name }}</li>
                        <li class="list-group-item"><strong>DNI:</strong> {{ Auth::user()->dni }}</li>
                        <li class="list-group-item"><strong>Sexo:</strong> {{ Auth::user()->sexo }}</li>
                        <li class="list-group-item"><strong>Fecha de Nacimiento:</strong> {{ Auth::user()->fecha_nacimiento }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-1">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow mb-2" style="background-color: #EAF0F9; border: 1px solid #8ebaf4;">
                <div class="card-header text-center" style="background-color: #8ebaf4; padding-top: 20px; padding-bottom: 13px;">
                    <h2>{{ __('Cambiar Contraseña') }}</h2>
                </div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('configuracion.cambiar_passwords') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="current_password" class="form-label">{{ __('Contraseña Actual') }}</label>
                            <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" required>
                            @error('current_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="new_password" class="form-label">{{ __('Nueva Contraseña') }}</label>
                            <input id="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" required>
                            @error('new_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="new-password_confirm" class="form-label">{{ __('Confirmar Nueva Contraseña') }}</label>
                            <input id="new-password_confirm" type="password" class="form-control" name="new_password_confirmation" required>
                        </div>

                        <div class="mb-3 text-center">
                            <button type="submit" class="custom-btn" style="font-size: 20px; font-weight: normal;">
                                {{ __('Cambiar Contraseña') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="text-center">
                <a href="{{ route('login') }}" class="custom-btn" style="font-size: 15px;">
                    <i class="fas fa-arrow-left"></i> {{ __('Volver al inicio') }}
                </a>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')
@endsection
