@extends('layouts.app')
@include('layouts.header')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow mb-5" style="background-color: #EAF0F9; border: 1px solid #8ebaf4;">
                <div class="card-header text-center" style="background-color: #8ebaf4; padding-top: 20px; padding-bottom: 13px;">
                    <h2>{{ __('Registro Completo') }}</h2>
                </div>

                <div class="card-body">
                    <p class="lead">¡Felicidades! Has completado exitosamente el registro en SaluDigital.</p>
                    <p>Ahora puedes empezar a disfrutar de todas las funcionalidades de nuestra plataforma.</p>
                    <p>¿Deseas iniciar sesión ahora?</p>
                    <a href="{{ route('login') }}" class="custom-btn" style="font-size: 20px; font-weight: normal">Iniciar sesión</a>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')
@endsection

@section('styles')
<style>
    .custom-btn {
        background-color: #8ebaf4;
        border-radius: 10px;
        color: black;
        border: none;
        padding: 10px 25px;
        text-decoration: none;
        display: inline-block;
        text-align: center;
    }
    .custom-btn:hover {
        background-color: #7e9dbd;
    }
</style>
@endsection
