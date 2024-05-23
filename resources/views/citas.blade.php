@extends('layouts.app')
@include('layouts.header')
@include('layouts.iconos')

@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-10">
                <div class="card mb-5">
                <div class="card-header">
                <h1 class="text-center mb-0" style="font-size: 30px;">Citas</h1>
                </div>
                    <div class="card-body">
                        <div class="row mb-4 justify-content-center">
                        
                        <p class="text-center" style="font-size: 15px;">Solicita una cita con los profesionales de tu equipo de atención primaria seleccionando el motivo que más se ajuste a tu necesidad. Consulta tus citas para visitas y pruebas, así como la información sobre listas de espera.</p>
                            <div class="col-md-4 d-flex align-items-center justify-content-center mb-4" style="margin-top: 45px;">
                                <a href="{{ route('solicitud_citas') }}" class="btn btn-primary rounded-pill text-white d-flex justify-content-center align-items-center hover-bg-color" style=" background-color: #8ebaf4; width: 220px; height: 130px;">
                                    <i class="fas fa-calendar-plus fa-3x me-2" style="color: white;"></i>
                                    <span style="color: black; font-size:15px">Hacer una solicitud</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer')

    <style>
        .btn-primary:hover {
            background-color: #7e9dbd !important;
        }
    </style>
@endsection
