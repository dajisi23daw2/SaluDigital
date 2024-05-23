@extends('layouts.app')
@include('layouts.header')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-2">
                @include('layouts.iconos2')
            </div>
            <div class="col-md-10">
                <div class="card mb-5 mt-3">
                    <div class="card-header">
                        <h1 class="text-center mb-1 mt-1" style="font-size: 30px">Gestión de Citas</h1>
                    </div>
                    <div class="card-body">

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Hora</th>
                                    <th scope="col">Descripción</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($citas as $cita)
                                    <tr>
                                        <td>{{ $cita->id }}</td>
                                        <td>{{ $cita->fecha->format('Y-m-d') }}</td>
                                        <td>{{ $cita->hora }}</td>
                                        <td>{{ $cita->tipo }}</td>
                                        <td>{{ $cita->estado }}</td>
                                        <td>
                                            @if ($cita->estado != 'Aprobada')
                                                <form action="{{ route('citas.destroy2', $cita->id) }}" method="POST" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="custom-btn" style="color: black; background-color: #f34336">Cancelar</button>
                                                </form>

                                                <form action="{{ route('citas.aprobar', $cita->id) }}" method="POST" style="display: inline-block;">
                                                    @csrf
                                                    <button type="submit" class="custom-btn2" style="color: black; background-color: #8ebaf4">Aprobar</button>
                                                </form>
                                            @else
                                                <form action="{{ route('eliminar_cita', $cita->id) }}" method="POST" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger custom-btn4">
                                                        <i class="bi bi-trash3-fill" style="font-size: 1.5rem; color: black;"></i>
                                                    </button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        @if($citas->hasPages())
                            <div class="d-flex justify-content-center mt-4">
                                @if ($citas->previousPageUrl())
                                    <a href="{{ $citas->previousPageUrl() }}" class="custom-btn">
                                        <i class="bi bi-caret-left-fill"></i>
                                    </a>
                                @endif

                                @if ($citas->nextPageUrl())
                                    <a href="{{ $citas->nextPageUrl() }}" class="custom-btn">
                                        <i class="bi bi-caret-right-fill"></i>
                                    </a>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer')

    <style>
        .custom-btn2.1:hover {
            background-color: #d11507 !important;
        }
        .custom-btn2:hover {
            background-color: #7e9dbd !important;
        }
    </style>
@endsection
