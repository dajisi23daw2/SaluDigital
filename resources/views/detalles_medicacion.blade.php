@extends('layouts.app')
@include('layouts.header')
@include('layouts.iconos')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card mb-5">
                    <div class="card-header">
                        <h1 class="text-center mb-0" style="font-size: 30px;">Detalles de Medicación</h1>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <p>{{ $medicacion->detalles }}</p>
                            </div>
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
                    <a href="{{ route('medicacion') }}" class="custom-btn" style="font-size: 15px;">
                        <i class="fas fa-arrow-left"></i> {{ __('Volver a medicaciones') }}
                    </a>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')
@endsection
