@extends('layouts.app')
@include('layouts.header')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow mb-5" style="background-color: #EAF0F9; border: 1px solid #8ebaf4;">
                <div class="card-header text-center" style="background-color: #8ebaf4; padding-top: 20px; padding-bottom: 13px;">
                    <h2>{{ __('Registro en SaluDigital') }}</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group">
                            <label for="name" class="font-weight-bold" style="font-size: 15px;">{{ __('Nombre') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="dni" class="font-weight-bold" style="font-size: 15px;">{{ __('DNI') }}</label>
                            <input id="dni" type="text" class="form-control @error('dni') is-invalid @enderror" name="dni" value="{{ old('dni') }}" required>
                            @error('dni')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="sexo" class="font-weight-bold" style="font-size: 15px;">{{ __('Sexo') }}</label>
                            <select id="sexo" class="form-control @error('sexo') is-invalid @enderror" name="sexo" required>
                                <option value="" disabled selected>Seleccione el sexo</option>
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                                <option value="X">Prefiero no decirlo</option>
                            </select>

                            @error('sexo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="fecha_nacimiento" class="font-weight-bold" style="font-size: 15px;">{{ __('Fecha de Nacimiento') }}</label>
                            <input id="fecha_nacimiento" type="date" class="form-control @error('fecha_nacimiento') is-invalid @enderror" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" required>
                            @error('fecha_nacimiento')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email" class="font-weight-bold" style="font-size: 15px;">{{ __('Correo Electrónico') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password" class="font-weight-bold" style="font-size: 15px;">{{ __('Contraseña') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="font-weight-bold" style="font-size: 15px;">{{ __('Confirmar Contraseña') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>

                        <div class="form-group text-center"> 
                            <button type="submit" class="custom-btn" style="margin-top: 15px; font-size: 20px; font-weight: normal;">
                                {{ __('Registrar') }}
                            </button>
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
                <a href="{{ route('login') }}" class="custom-btn" style="font-size: 15px;">
                    <i class="fas fa-arrow-left"></i> {{ __('Volver al inicio de sesión') }}
                </a>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')
@endsection
