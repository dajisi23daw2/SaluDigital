@extends('layouts.app')
@include('layouts.header')
@include('layouts.iconos')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card mb-5">
                    <div class="card-header">
                        <h1 class="text-center mb-0" style="font-size: 30px;">Informes</h1>
                    </div>
                    <div class="card-body">
                        <p class="text-center" style="font-size: 15px;">Aquí encontrarás una lista de todos los informes disponibles.</p>
                        <div class="row mb-4">
                            <form id="filtroForm" action="{{ route('filtrar_informes') }}" method="GET">
                                <div class="col-md-6">
                                    <h2>Desde</h2>
                                    <input type="date" class="form-control" name="fecha_desde" id="fecha_desde" onchange="submitForm()">
                                </div>
                                <div class="col-md-6">
                                    <h2>Hasta</h2>
                                    <input type="date" class="form-control" name="fecha_hasta" id="fecha_hasta" onchange="submitForm()">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="tipo_informe">Tipo de Informe:</label>
                                    <select id="tipo_informe" name="tipo_informe" class="form-control" onchange="submitForm()">
                                        <option value="">Selecciona el tipo de informe</option>
                                        <option value="Informe de Historial Clínico">Informe de Historial Clínico</option>
                                        <option value="Informe de Resultados de Laboratorio">Informe de Resultados de Laboratorio</option>
                                        <option value="Informe de Consulta Especializada">Informe de Consulta Especializada</option>
                                        <option value="Informe de Alta Hospitalaria">Informe de Alta Hospitalaria</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="centro_medico">Centro Médico:</label>
                                    <select id="centro_medico" name="centro_medico" class="form-control" onchange="submitForm()">
                                        <option value="">Selecciona el centro médico</option>
                                        @foreach ($hospitales as $hospital)
                                            <option value="{{ $hospital->name }}">{{ $hospital->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </form>
                        </div>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Titulo</th>
                                        <th>Tipo de Informe</th>
                                        <th>Centro Médico</th>
                                        <th>Fecha de Creación</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($informes as $informe)
                                        <tr>
                                            <td>{{ $informe->titulo }}</td>
                                            <td>{{ $informe->tipo_informe }}</td>
                                            <td>{{ $informe->centro_medico }}</td>
                                            <td>{{ $informe->created_at->format('d/m/Y') }}</td>
                                            <td><a href="{{ route('descargar_informe', ['id' => $informe->id]) }}"><i style="font-size:20px" class="bi bi-download"></i></a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                            @if($informes->hasPages())
                                <div class="d-flex justify-content-center mt-4">
                                    @if ($informes->previousPageUrl())
                                        <a href="{{ $informes->previousPageUrl() }}" class="custom-btn">
                                            <i class="bi bi-caret-left-fill"></i>
                                        </a>
                                    @endif

                                    @if ($informes->nextPageUrl())
                                        <a href="{{ $informes->nextPageUrl() }}" class="custom-btn">
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

    <script>
        function submitForm() {
            document.getElementById("filtroForm").submit();
        }
    </script>

    @include('layouts.footer')
@endsection
