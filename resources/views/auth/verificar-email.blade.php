@extends('layouts.auth')

@section('content')
    ¡Hola!
    Por favor, verifica tu dirección de correo electrónico haciendo clic en el botón de abajo.
    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit" class="btn">
            Reenviar correo de verificación
        </button>
    </form>
@endsection
