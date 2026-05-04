@extends('site.app')

@section('title', 'Seguridad - Cambio de Correo')

@section('content')
    <div class="flex items-center justify-center p-4">
        <div
            class="max-w-4xl w-full rounded-3xl overflow-hidden border border-slate-200 bg-white shadow-xl flex flex-col md:flex-row">

            {{-- Lado Izquierdo: Información y Estado Actual --}}
            <div
                class="md:w-5/12 bg-gradient-to-b from-slate-50 to-white p-8 border-b md:border-b-0 md:border-r border-slate-100 flex flex-col justify-center">
                <div class="text-center md:text-left">
                    <div
                        class="inline-flex items-center justify-center w-14 h-14 bg-blue-50 rounded-2xl mb-4 transition-transform hover:scale-105 duration-300">
                        <svg class="w-7 h-7 text-[#233C7E]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.206" />
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-slate-800 tracking-tight">Cambio de Correo</h2>
                    <p class="text-slate-500 text-sm mt-2 mb-6">Actualiza tu dirección de contacto principal de forma
                        segura.</p>
                </div>

                @if (session('success'))
                    <div
                        class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl mb-6 text-sm animate-bounce">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="space-y-2">
                    <label class="text-xs font-semibold text-slate-400 uppercase tracking-wider ml-1">Correo Registrado
                        actualmente</label>
                    <div class="relative">
                        <input type="email" value="{{ auth()->user()->email }}" readonly id="current_email"
                            class="w-full px-4 py-3 border border-slate-200 rounded-xl text-slate-400 font-medium cursor-not-allowed outline-none bg-slate-50/50">
                        <div class="absolute inset-y-0 right-4 flex items-center">
                            <svg class="w-4 h-4 text-slate-300" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Lado Derecho: Formulario --}}
            <div class="md:w-7/12 p-8 md:p-10 flex flex-col justify-center">
                <form action="{{ route('usuario.email.update') }}" method="POST" class="space-y-5">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 gap-5">
                        {{-- Nuevo Correo --}}
                        <div class="space-y-2">
                            <label for="email-update"
                                class="text-xs font-bold text-[#233C7E] uppercase tracking-wider ml-1">
                                Nueva Dirección de Correo:
                            </label>
                            <input type="email" id="email-update" name="email" required value="{{ old('email') }}"
                                placeholder="tu-nuevo@correo.com"
                                class="w-full px-4 py-3 border @error('email') border-red-500 @else border-slate-200 @enderror rounded-xl focus:ring-4 focus:ring-blue-500/10 focus:border-[#233C7E] transition-all outline-none placeholder:text-slate-300">
                            @error('email')
                                <p class="text-red-500 text-[11px] mt-1 ml-1 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Confirmación de Correo --}}
                        <div class="space-y-2">
                            <label for="email_confirmation-update"
                                class="text-xs font-bold text-[#233C7E] uppercase tracking-wider ml-1">
                                Confirmar nueva dirección:
                            </label>
                            <input type="email" id="email_confirmation-update" value="{{ old('email_confirmation') }}"
                                name="email_confirmation" required placeholder="Repite tu correo para confirmar"
                                class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-4 focus:ring-blue-500/10 focus:border-[#233C7E] transition-all outline-none placeholder:text-slate-300">
                            <p id="paste-error" class="hidden text-red-500 text-xs font-medium ml-1 animate-pulse">
                                ⚠️ Por seguridad, escribe el correo manualmente.
                            </p>
                        </div>
                    </div>

                    {{-- Nota de validación --}}
                    <div class="flex items-start gap-3 px-4 py-3 bg-blue-50/50 rounded-xl border border-blue-100">
                        <svg class="w-5 h-5 text-[#233C7E] mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <p class="text-[11px] font-medium text-slate-600 leading-normal">
                            <span class="text-[#233C7E] font-bold uppercase tracking-wider text-[10px]">Importante:</span>
                            Ambos campos deben ser idénticos. Esto evita errores de escritura que podrían bloquear tu
                            acceso.
                        </p>
                    </div>

                    <div class="pt-4 flex flex-col sm:flex-row gap-3">

                        <button type="submit" id="email-submit-btn-update" disabled
                            class="flex-1 py-4 bg-slate-400 text-white text-xs font-bold uppercase tracking-widest rounded-xl shadow-lg transition-all opacity-70 cursor-not-allowed order-2 sm:order-1">
                            Actualizar Ahora
                        </button>

                        <a href="{{ route('usuario.perfil') }}"
                            class="flex items-center justify-center gap-2 px-8 py-4 bg-slate-50 hover:bg-slate-100 text-slate-500 text-[11px] font-bold uppercase tracking-[0.2em] rounded-xl border border-slate-200 transition-all active:scale-95">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            Volver
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
