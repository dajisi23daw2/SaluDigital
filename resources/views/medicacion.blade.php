@extends('layouts.app')
@include('layouts.header')
@include('layouts.iconos')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card mb-5">
                    <div class="card-header">
                        <h1 class="text-center mb-0" style="font-size: 30px;">Medicaciones</h1>
                    </div>

                    <div class="card-body">
                        <p class="text-center" style="font-size: 15px;">Aquí encontrarás una lista de todas las medicaciones.</p>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Descripción</th>
                                    <th scope="col">Fecha de Inicio</th>
                                    <th scope="col">Fecha de Fin</th>
                                    <th scope="col">Ver detalles</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($medicaciones as $medicacion)
                                    <tr>
                                        <td>{{ $medicacion->nombre }}</td>
                                        <td>{{ $medicacion->descripcion }}</td>
                                        <td>{{ $medicacion->fecha_inicio }}</td>
                                        <td>{{ $medicacion->fecha_fin }}</td>
                                        <td style="vertical-align: middle; text-align: center; font-size:20px; color: #8ebaf4">
                                            <a href="/medicacion/detalles_medicacion/{{ $medicacion->id }}">
                                                <i class="bi bi-eye-fill"></i>
                                            </a>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        @if($medicaciones->hasPages())
                            <div class="d-flex justify-content-center mt-4">
                                @if ($medicaciones->previousPageUrl())
                                    <a href="{{ $medicaciones->previousPageUrl() }}" class="custom-btn">
                                        <i class="bi bi-caret-left-fill"></i>
                                    </a>
                                @endif

                                @if ($medicaciones->nextPageUrl())
                                    <a href="{{ $medicaciones->nextPageUrl() }}" class="custom-btn">
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
@endsection
