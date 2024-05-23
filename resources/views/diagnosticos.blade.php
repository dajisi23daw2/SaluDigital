@extends('layouts.app')
@include('layouts.header')
@include('layouts.iconos')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card mb-5">
                    <div class="card-header">
                        <h1 class="text-center mb-0" style="font-size: 30px;">Diagnósticos</h1>
                    </div>
                    <div class="card-body">
                        <p class="text-center" style="font-size: 15px;">Aquí encontrarás una lista de todos los diagnósticos.</p>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Problema de Salud</th>
                                    <th scope="col">Centro</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Activo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($diagnosticos as $diagnostico)
                                    <tr>
                                        <td>{{ $diagnostico->problema_salud }}</td>
                                        <td>{{ $diagnostico->centro }}</td>
                                        <td>{{ $diagnostico->fecha }}</td>
                                        <td>
                                            @if ($diagnostico->activo)
                                                <span class="badge bg-success">Sí</span>
                                            @else
                                                <span class="badge bg-secondary">No</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                            </div>
                                @if($diagnosticos->hasPages())
                                    <div class="d-flex justify-content-center mt-4">
                                        @if ($diagnosticos->previousPageUrl())
                                            <a href="{{ $diagnosticos->previousPageUrl() }}" class="custom-btn">
                                                <i class="bi bi-caret-left-fill"></i>
                                            </a>
                                        @endif

                                        @if ($diagnosticos->nextPageUrl())
                                            <a href="{{ $diagnosticos->nextPageUrl() }}" class="custom-btn">
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
    </div>
    @include('layouts.footer')
@endsection
