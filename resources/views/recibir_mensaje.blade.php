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
                    <h1 class="text-center mb-1 mt-1" style="font-size: 30px;">Buzón de Entrada</h1>
                </div>

                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif

                    @foreach($mensajes as $mensaje)
                    <div class="message-container mb-4">
                        <div class="message-header">
                            <div class="message-sender">
                                <i class="fas fa-user-circle fa-2x mr-2"></i>
                                <span class="sender-name">{{ $mensaje->usuario ? $mensaje->usuario->name : 'Usuario Desconocido' }}</span>
                            </div>
                            <div class="message-date">
                                {{ $mensaje->created_at->format('d M Y, H:i') }}
                            </div>
                        </div>
                        <div class="message-body">
                            <div class="message-content">
                                <p class="message-subject">Asunto: {{ $mensaje->asunto }}</p>
                                <p class="message-text">{{ $mensaje->descripcion }}</p>
                            </div>
                            <div class="message-actions">
                                @if ($mensaje->estado == 'recibido')
                                <form action="{{ route('marcar_como_leido', $mensaje->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-success ml-2" style="background-color: #28a745;">
                                        <i class="bi bi-check" style="font-size: 1.5rem; color: black;"></i>
                                    </button>
                                </form>
                                @endif
                                <form action="{{ route('eliminar_mensaje', $mensaje->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger custom-btn4">
                                        <i class="bi bi-trash3-fill" style="font-size: 1.5rem; color: black;"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <hr>
                    @endforeach

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
@include('layouts.footer')
@endsection

<style>
    .btn-success:hover {
        background-color: #218838 !important;
    }

    .message-container {
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 15px;
        background-color: #f9f9f9;
    }

    .message-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
    }

    .message-sender {
        display: flex;
        align-items: center;
    }

    .message-sender .sender-name {
        font-weight: bold;
        margin-right: 10px;
    }

    .message-date {
        font-size: 14px;
        color: #777;
    }

    .message-body {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
    }

    .message-content {
        flex: 1;
    }

    .message-subject {
        font-weight: bold;
        margin-bottom: 5px;
    }

    .message-actions {
        display: flex;
        flex-direction: column;
        align-items: flex-end;
    }

    .message-actions form {
        margin-top: 10px;
    }
</style>
