@extends('layouts.app')
@include('layouts.header')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow mb-5" style="background-color: #EAF0F9; border: 1px solid #8ebaf4">
                <div class="card-header text-center" style="background-color: #8ebaf4; padding-top: 20px; padding-bottom: 13px;">
                    <h2>{{ __('Acceder a SaluDigital') }}</h2>
                </div>
                
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <label for="dni" class="font-weight-bold" style="font-size: 15px;">{{ __('DNI') }}</label>
                            <input id="dni" type="dni" class="form-control @error('dni') is-invalid @enderror" name="dni" value="{{ old('dni') }}" required autocomplete="dni" autofocus>
                            @error('dni')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password" class="font-weight-bold" style="font-size: 15px; padding-top: 10px">{{ __('Contraseña') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('Recuérdame') }}
                            </label>
                        </div>

                        <div class="form-group text-center"> 
                            <button type="submit" class="custom-btn" style="font-size: 20px; font-weight: normal;">
                                {{ __('Acceder') }}
                            </button>
                        </div>

                        @if (Route::has('password.request'))
                            <div class="text-center" style="margin-top: 8px;">
                                <a class="btn btn-link" href="{{ route('password.request') }}" style="color: #3A8DE9; font-size: 15px;">
                                    {{ __('He olvidado mi contraseña') }}
                                </a>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')
@endsection
