@extends('layouts.auth')

@section('content')
    <div class="max-w-md w-full bg-white p-8 rounded-lg shadow-lg text-center">
        <div class="mx-auto flex items-center justify-center h-20 w-20 rounded-full bg-green-100 mb-6">
            <svg class="h-10 w-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
        </div>
        <h2 class="text-2xl font-bold text-gray-800 mb-2">¡Información Almacenada!</h2>
        <p class="text-gray-600 mb-8">
            Tu registro se ha procesado exitosamente en el sistema de Cuenta Única. Ahora puedes acceder a tu panel.
        </p>
        <a href="{{ route('login') }}"
            class="inline-block w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-md transition duration-200 ease-in-out transform hover:scale-105 shadow-md">
            Ir al Inicio de Sesión
        </a>
    </div>
@endsection
