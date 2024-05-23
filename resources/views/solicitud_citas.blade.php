@extends('layouts.app')
@include('layouts.header')
@include('layouts.iconos')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card mb-5">
                <div class="card-header">
                    <h1 class="text-center" style="font-size: 30px;">Solicitud de Citas y Consultas</h1>
                </div>
                <div class="card-body">
                    @if(session('error'))
                        <div class="alert alert-danger mt-3">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if(session('success'))
                        <div class="alert alert-success mt-3">
                            {{ session('success') }}
                        </div>
                    @endif
                    <h2 style="font-size: 15px;">Citas programadas:</h2>
                    @if(count($citas) > 0)
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Tipo</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($citas as $cita)
                            <tr>
                                <td>{{ date('d/m/Y', strtotime($cita->fecha)) }}</td>
                                <td>{{ date('H:i', strtotime($cita->hora)) }}</td>
                                <td>{{ $cita->tipo }}</td>
                                <td>{{ $cita->estado }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <p>No hay citas.</p>
                    @endif

                    @if(count($citas) <= 0)
                        <form action="{{ route('citas.store') }}" method="POST" class="mb-4">
                            @csrf
                            <div class="mb-3">
                                <label for="tipo_cita" class="form-label">Tipo de cita</label>
                                <select name="tipo_cita" id="tipo_cita" class="form-select" required>
                                <option value="">Selecciona el tipo de cita</option>
                                    @foreach($tiposCitas as $tipoCita)
                                        <option value="{{ $tipoCita->nombre }}">{{ $tipoCita->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="fecha" class="form-label">Fecha de la cita</label>
                                <input type="date" class="form-control" id="fecha" name="fecha" required>
                            </div>

                            <div class="mb-3">
                                <label for="hora" class="form-label">Hora de la cita</label>
                                <select class="form-select" id="hora" name="hora" required>
                                <option value="">Selecciona la hora de su solicitud</option>
                                    @for ($hour = 8; $hour <= 20; $hour++)
                                        @for ($minute = 0; $minute < 60; $minute += 15)
                                            @php
                                                $formatted_hour = str_pad($hour, 2, '0', STR_PAD_LEFT);
                                                $formatted_minute = str_pad($minute, 2, '0', STR_PAD_LEFT);
                                            @endphp
                                            @if ($hour == 20 && $minute == 0)
                                                <option value="{{ $formatted_hour }}:{{ $formatted_minute }}">{{ $formatted_hour }}:{{ $formatted_minute }}</option>
                                            @else
                                                <option value="{{ $formatted_hour }}:{{ $formatted_minute }}">{{ $formatted_hour }}:{{ $formatted_minute }}</option>
                                            @endif
                                        @endfor
                                    @endfor
                                </select>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="custom-btn">Solicitar Cita</button>
                            </div>
                        </form>
                    @else
                        @if ($citas[0]->estado != 'Aprobada')
                            <form action="{{ route('citas.destroy', $citas[0]->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="d-grid gap-2">
                                    <button type="submit" class="custom-btn4">Cancelar Cita</button>
                                </div>
                            </form>
                        @endif
                    @endif

                    <div class="mt-4">
                        <a href="{{ route('citas') }}" class="custom-btn3">Atrás</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')
@endsection
