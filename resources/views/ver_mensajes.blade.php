@extends('layouts.app')
@include('layouts.header')
@include('layouts.iconos')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card mb-5">
                <div class="card-header">
                    <h1 class="text-center mb-0" style="font-size: 30px;">Mis Mensajes</h1>
                </div>
                <div class="card-body">
                    <p class="text-center" style="font-size: 15px;">Aquí puedes ver todos los mensajes que has enviado.</p>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Asunto</th>
                                <th scope="col">Fecha de Envío</th>
                                <th scope="col">Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mensajes as $mensaje)
                                <tr>
                                    <td>{{ $mensaje->asunto }}</td>
                                    <td>{{ $mensaje->created_at->format('d/m/Y H:i') }}</td>
                                    <td>
                                        @if ($mensaje->estado == 'enviado')
                                            <span class="badge bg-primary">Enviado</span>
                                        @elseif ($mensaje->estado == 'leido')
                                            <span class="badge bg-success">Leído</span>
                                        @else
                                            <span class="badge bg-secondary">{{ ucfirst($mensaje->estado) }}</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                        <div class="d-flex justify-content-center mt-4">
                            @if($mensajes->hasPages())
                                @if ($mensajes->previousPageUrl())
                                    <a href="{{ $mensajes->previousPageUrl() }}" class="custom-btn mr-2">
                                        <i class="bi bi-caret-left-fill"></i>
                                    </a>
                                @endif

                                @if ($mensajes->nextPageUrl())
                                    <a href="{{ $mensajes->nextPageUrl() }}" class="custom-btn">
                                        <i class="bi bi-caret-right-fill"></i>
                                    </a>
                                @endif
                            @endif
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-3">
    <div class="row justify-content-start">
        <div class="col-md-6">
            <div class="text-left">
                <a href="{{ route('enviar_mensaje') }}" class="custom-btn" style="font-size: 15px;">
                    <i class="fas fa-arrow-left"></i> {{ __('Volver a mensajes') }}
                </a>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')
@endsection
