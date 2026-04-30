@extends('layouts.auth')

@section('content')
    <div class="max-w-md mx-auto bg-white rounded-2xl shadow-2xl overflow-hidden border border-gray-100">
        <div class="h-2 bg-gradient-to-r from-green-400 to-blue-500"></div>

        <div class="p-10 text-center">
            <div class="relative mx-auto flex items-center justify-center h-24 w-24 mb-8">
                <div class="absolute inset-0 rounded-full bg-green-100 animate-ping opacity-20"></div>
                <div
                    class="relative flex items-center justify-center h-20 w-20 rounded-full bg-green-50 border-2 border-green-100 shadow-inner">
                    <svg class="h-10 w-10 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
            </div>

            <h2 class="text-3xl font-extrabold text-gray-900 tracking-tight mb-3">
                ¡Bienvenido!
            </h2>
            <p class="text-gray-500 leading-relaxed mb-10">
                Tu registro de <span class="font-semibold text-gray-700">usuario</span> ha sido procesado. Ingresa al login
                e incia sesión con correo y contraseña.
            </p>

            <a href="{{ route('login') }}"
                class="group relative inline-flex items-center justify-center w-full px-8 py-4 font-bold text-white transition-all duration-200 bg-blue-600 font-pj rounded-xl focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-600 hover:bg-blue-700 shadow-lg shadow-blue-200 active:scale-95">
                Ingresar
                <svg class="w-5 h-5 ml-2 transition-transform duration-200 group-hover:translate-x-1" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6">
                    </path>
                </svg>
            </a>
        </div>
    </div>
@endsection
