@extends('layouts.app')
@include('layouts.header')
@include('layouts.iconos')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card mb-5">
                    <div class="card-header">
                        <h1 class="text-center mb-0" style="font-size: 30px;">Enviar Mensaje</h1>
                    </div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('enviar_mensaje') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="asunto" class="form-label">Asunto</label>
                                <input type="text" class="form-control" id="asunto" name="asunto" required>
                            </div>

                            <div class="mb-3">
                                <label for="descripcion" class="form-label">Mensaje</label>
                                <textarea class="form-control" id="descripcion" name="descripcion" rows="5" required></textarea>
                            </div>

                            <div class="d-flex justify-content-center">
                                <button type="submit" class="custom-btn">Enviar</button>
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
                    <a href="{{ route('ver_mensajes') }}" class="custom-btn" style="font-size: 15px;">
                        Ir a ver tus mensajes <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')
@endsection
