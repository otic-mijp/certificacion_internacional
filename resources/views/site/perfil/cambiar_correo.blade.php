@extends('site.app')

@section('title', 'Seguridad - Cambio de Correo')

@section('content')
    <div class="flex items-center justify-center">
        <div class="max-w-md w-full rounded-3xl overflow-hidden border border-slate-100">
            <div class="bg-gradient-to-b from-slate-50 to-white px-8 pb-6 text-center">
                <div
                    class="inline-flex items-center justify-center w-16 h-16 bg-blue-50 rounded-2xl mb-4 transition-transform hover:scale-105 duration-300">
                    <svg class="w-8 h-8 text-[#233C7E]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.206" />
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-slate-800 tracking-tight">Cambio de Correo</h2>
                <p class="text-slate-500 text-sm mt-2">Actualiza tu dirección de contacto principal de forma segura.</p>
            </div>

            <form action="#" method="POST" class="px-8 pb-10 space-y-6">
                @csrf

                <div class="space-y-2">
                    <label class="text-xs font-semibold text-slate-400 uppercase tracking-wider ml-1">Correo Actual</label>
                    <div class="relative">
                        <input type="email" value="jesusvilla1203@gmail.com" readonly
                            class="w-full px-4 py-3 border border-slate-200 rounded-xl text-slate-400 font-medium cursor-not-allowed outline-none">
                        <div class="absolute inset-y-0 right-4 flex items-center">
                            <svg class="w-4 h-4 text-slate-300" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <hr class="border-slate-100">

                <div class="space-y-4">
                    <div class="space-y-2">
                        <label for="email" class="text-xs font-bold text-[#233C7E] uppercase tracking-wider ml-1">Nuevo
                            Correo</label>
                        <input type="email" id="email" name="email"  required placeholder="tu-nuevo@gmail.com"
                            class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-4 focus:ring-blue-500/10 focus:border-[#233C7E] transition-all outline-none placeholder:text-slate-300">
                    </div>

                    <div class="space-y-2">
                        <label for="email_confirmation"
                            class="text-xs font-bold text-slate-400 uppercase tracking-wider ml-1">Confirmar Correo</label>
                        <input type="email" id="email_confirmation" name="email_confirmation" required
                            placeholder="Repite tu correo"
                            class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-4 focus:ring-blue-500/10 focus:border-[#233C7E] transition-all outline-none placeholder:text-slate-300">
                    </div>
                </div>

                <div class="pt-2 space-y-3">
                    <button type="submit" id="email-submit-btn" disabled
                        class="w-full py-4 bg-slate-400 text-white text-sm font-bold uppercase tracking-widest rounded-xl shadow-lg transition-all opacity-70 cursor-not-allowed">
                        Actualizar Correo
                    </button>

                    <a href="javascript:history.back()"
                        class="block w-full text-center py-2 text-slate-400 text-xs font-semibold hover:text-slate-600 transition-colors">
                        Cancelar y volver
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
