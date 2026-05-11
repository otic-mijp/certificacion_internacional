@extends('layouts.auth')

@section('content')
    <div class="flex items-center justify-center p-6">
        <div class="max-w-md w-full bg-white border border-slate-300 rounded-[40px] overflow-hidden">
            <div class="px-8 py-10 text-center border-b border-slate-100">
                <div class="inline-flex p-4 bg-white rounded-3xl shadow-sm mb-6">
                    <svg class="w-10 h-10 text-[#233C7E]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 12a4 4 0 11-8 0 4 4 0 018 0zm0 0v4m0-4h4m-4 0H8" />
                    </svg>
                </div>
                <h2 class="text-2xl font-black text-slate-800 tracking-tighter mb-2">
                    Correo del Usuario
                </h2>
                <p class="text-sm font-medium text-slate-500 leading-relaxed px-4">
                    Las respuestas fueron validadas correctamente.
                </p>
            </div>

            <div class="px-10 py-10 text-center space-y-4">
                <p class="text-sm font-medium text-slate-500">El correo registrado es:</p>
                <p class="text-lg font-black text-slate-800 break-words">{{ $email ?? 'No disponible' }}</p>

                <a href="{{ route('login') }}"
                    class="inline-flex items-center justify-center gap-2 w-full py-4 bg-[#233C7E] text-white text-[11px] font-black uppercase tracking-[0.25em] rounded-2xl shadow-lg shadow-blue-900/20 hover:bg-slate-900 transition-all active:scale-95">
                    Volver al inicio
                </a>
            </div>
        </div>
    </div>
@endsection
