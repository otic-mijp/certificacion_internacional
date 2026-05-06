@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifica tu dirección de correo electrónico') }}</div>

                <div class="card-body">
                    <p>{{ __('Antes de continuar, por favor verifica tu dirección de correo electrónico haciendo clic en el enlace que te hemos enviado.') }}</p>

                    <p>{{ __('Si no recibiste el email, estaremos encantados de enviarte otro.') }}</p>

                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf

                        <div class="mb-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Reenviar Email de Verificación') }}
                            </button>
                        </div>

                        <div class="mb-4">
                            <a href="{{ route('logout') }}" class="btn btn-link">
                                {{ __('Cerrar Sesión') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection