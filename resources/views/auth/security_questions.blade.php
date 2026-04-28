@extends('layouts.auth')

@section('content')
    <div class="flex items-center justify-center">
        <div class="max-w-xl w-full bg-white border border-slate-200 rounded-[40px] shadow-2xl overflow-hidden">

            <div class=" px-8 py-10 text-center border-b border-slate-100">
                <div class="inline-flex p-4 bg-white rounded-3xl shadow-sm mb-6">
                    <svg class="w-10 h-10 text-[#233C7E]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
                <h2 class="text-2xl font-black text-slate-800 tracking-tighter mb-2">
                    Preguntas de Seguridad
                </h2>
                <p class="text-sm font-medium text-slate-500 leading-relaxed px-8">
                    Por favor, conteste las siguientes preguntas para validar su identidad y continuar con el proceso.
                </p>
            </div>

            <form action="#" method="POST" class="p-10 space-y-8">

                <div class="space-y-3"> <label for="pregunta1"
                        class="block text-[11px] font-black text-[#233C7E] uppercase tracking-[0.2em] ml-1">
                        1. Segundo apellido del padre
                    </label>
                    <input type="text" name="pregunta1" id="pregunta1" required placeholder="Escriba su respuesta aquí"
                        class="w-full px-6 py-4  border-2 border-slate-100 rounded-2xl text-slate-700 font-medium focus:outline-none focus:border-[#233C7E] focus:bg-white transition-all placeholder:text-slate-300">
                </div>

                <div class="space-y-3">
                    <label for="pregunta2"
                        class="block text-[11px] font-black text-[#233C7E] uppercase tracking-[0.2em] ml-1">
                        2. País que desea conocer
                    </label>
                    <input type="text" name="pregunta2" id="pregunta2" required placeholder="Escriba su respuesta aquí"
                        class="w-full px-6 py-4  border-2 border-slate-100 rounded-2xl text-slate-700 font-medium focus:outline-none focus:border-[#233C7E] focus:bg-white transition-all placeholder:text-slate-300">
                </div>

                <div class="pt-4 space-y-4">
                    <button type="submit"
                        class="w-full py-5 bg-[#233C7E] text-white text-[11px] font-black uppercase tracking-[0.25em] rounded-2xl shadow-lg shadow-blue-900/20 hover:bg-slate-900 transition-all active:scale-95">
                        Validar Respuestas
                    </button>

                    <a href="{{ route('recuperar.usuario') }}"
                        class="flex items-center justify-center gap-2 w-full py-4 bg-white border-2 border-slate-100 text-slate-400 text-[10px] font-black uppercase tracking-[0.2em] rounded-2xl hover: hover:text-slate-600 transition-all">
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
@endsection
