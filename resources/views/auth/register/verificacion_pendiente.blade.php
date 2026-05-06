@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verificación de Correo Electrónico') }}</div>

                <div class="card-body">
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">{{ __('¡Registro Exitoso!') }}</h4>
                        <p>{{ __('Hemos enviado un enlace de verificación a tu dirección de correo electrónico. Por favor, revisa tu bandeja de entrada y haz clic en el enlace para verificar tu cuenta.') }}</p>
                        <hr>
                        <p class="mb-0">{{ __('Si no encuentras el email, revisa tu carpeta de spam o solicita un nuevo enlace.') }}</p>
                    </div>

                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button type="submit" class="btn btn-primary">
                            {{ __('Reenviar Email de Verificación') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection