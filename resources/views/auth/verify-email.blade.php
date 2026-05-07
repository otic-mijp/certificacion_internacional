@extends('layouts.auth')

@section('content')
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-50">
        <div class="w-full sm:max-w-md mt-6 px-8 py-10 bg-white shadow-xl border border-gray-100 sm:rounded-2xl text-center">

            <!-- Icono sutil de correo -->
            <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-indigo-100 mb-6">
                <svg class="h-8 w-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
            </div>

            <h2 class="mb-3 text-2xl font-extrabold text-gray-900">
                Verifica tu cuenta
            </h2>

            <p class="mb-8 text-sm text-gray-600 leading-relaxed">
                Te hemos enviado un enlace de verificación. Si no lo has recibido, revisa tu carpeta de spam o solicita uno
                nuevo abajo.
            </p>

            <!-- Mensaje de éxito -->
            @if (session('status') == 'verification-link-sent')
                <div
                    class="mb-8 p-4 bg-emerald-50 border-l-4 border-emerald-400 text-emerald-800 text-sm rounded-r-md animate-pulse">
                    <span class="font-bold">¡Enviado!</span> Un nuevo enlace está en camino a tu correo.
                </div>
            @endif

            <div class="space-y-6">
                <!-- Botón Reenviar (Acción principal) -->
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit"
                        class="w-full inline-flex justify-center items-center px-5 py-3 bg-indigo-600 border border-transparent rounded-xl font-bold text-sm text-white hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-200 transition-all duration-200 shadow-lg shadow-indigo-100">
                        Reenviar enlace de verificación
                    </button>
                </form>

                <hr class="border-gray-100">

                <!-- Sección "No eres tú" (Acción secundaria) -->
                <div class="text-sm">
                    <p class="text-gray-500 mb-2 italic">¿Esa no es tu cuenta o te has equivocado?</p>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="font-semibold text-blue-600 hover:text-indigo-800 hover:underline transition-colors">
                            Presiona aqui y vuelve a intentarlo
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
