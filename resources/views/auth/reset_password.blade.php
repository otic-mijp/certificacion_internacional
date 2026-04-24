@extends('layouts.auth')

@section('content')
    <section class="flex items-center justify-center p-4 md:p-6">
        <div
            class="max-w-md w-full bg-white border border-slate-200 rounded-3xl md:rounded-[40px] shadow-2xl overflow-hidden">

            <section class="px-6 py-8 md:px-8 md:py-10 text-center border-b border-slate-100">
                <div
                    class="inline-flex p-3 md:p-4 bg-white rounded-2xl md:rounded-3xl shadow-sm mb-4 md:mb-6 border border-slate-50">
                    <svg class="w-8 h-8 md:w-10 md:h-10 text-[#233C7E]" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <h2 class="text-xl md:text-2xl font-black text-slate-800 tracking-tighter mb-2">
                    Recuperar Contraseña
                </h2>
                <p class="text-xs md:text-sm font-medium text-slate-500 leading-relaxed px-2 md:px-4">
                    Ingrese el correo electrónico registrado para enviarle las instrucciones de recuperación.
                </p>
            </section>

            <form action="#" method="POST" class="p-6 md:p-10 space-y-6">
                @csrf
                <div>
                    <label for="email"
                        class="block text-[10px] md:text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] mb-3 ml-1">
                        Correo Electrónico
                    </label>
                    <div class="relative">
                        <input type="email" name="email" id="email" required placeholder="ejemplo@correo.com"
                            class="w-full px-5 py-3 md:px-6 md:py-4 border-2 border-slate-100 rounded-xl md:rounded-2xl text-slate-700 font-medium focus:outline-none focus:border-[#233C7E] focus:bg-white transition-all placeholder:text-slate-300 text-sm md:text-base">
                    </div>
                </div>

                <button type="submit"
                    class="w-full cursor-pointer py-4 md:py-5 bg-[#233C7E] text-white text-[10px] md:text-[11px] font-black uppercase tracking-[0.2em] md:tracking-[0.25em] rounded-xl md:rounded-2xl shadow-lg shadow-blue-900/20 hover:bg-slate-900 hover:shadow-none transition-all active:scale-95">
                    Enviar enlace
                </button>
            </form>

            <div class="px-6 pb-8 md:px-10 md:pb-10 text-center">
                <a href="{{ url('/') }}"
                    class="text-[10px] md:text-xs font-bold text-slate-400 uppercase tracking-widest hover:text-[#233C7E] transition-colors inline-flex items-center gap-2">
                    <span>←</span> Volver al inicio
                </a>
            </div>
        </div>
    </section>
@endsection
