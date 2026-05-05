@extends('layouts.auth')

@section('content')
    <div class=" flex items-center justify-center p-6">
        <div class="max-w-md w-full bg-white border border-slate-200 rounded-[40px] shadow-2xl overflow-hidden">

            <div class="px-8 py-10 text-center border-b border-slate-100">
                <div class="inline-flex p-4 bg-white rounded-3xl shadow-sm mb-6">
                    <svg class="w-10 h-10 text-[#233C7E]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                    </svg>
                </div>
                <h2 class="text-2xl font-black text-slate-800 tracking-tighter mb-2">
                    Consultar Registro
                </h2>
                <p class="text-sm font-medium text-slate-500 leading-relaxed px-4">
                    Ingrese su número de cédula para verificar su información en el sistema.
                </p>
            </div>

            <form action="#" method="POST" class="p-10 space-y-6">
                <div class="max-w-sm">
                    <label for="cedula"
                        class="block text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] mb-2 ml-1">
                        Número de Cédula
                    </label>

                    <div
                        class="group relative flex items-center border-2 border-slate-100 rounded-2xl bg-slate-50 focus-within:border-[#233C7E] focus-within:bg-white transition-all duration-200">
                        <div class="relative flex items-center">
                            <select name="letra_cedula"
                                class="appearance-none bg-transparent pl-4 pr-8 py-4 text-slate-700 font-bold text-lg focus:outline-none cursor-pointer z-10">
                                <option value="v">V</option>
                                <option value="e">E</option>
                            </select>
                            <div class="absolute right-2 pointer-events-none">
                                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>

                        <div class="h-8 w-[1px] bg-slate-200"></div>

                        <input type="text" name="cedula" id="cedula" required placeholder="00000000" autofocus
                            class="w-full px-4 py-4 bg-transparent text-slate-700 font-bold text-lg focus:outline-none placeholder:text-slate-300">
                    </div>
                </div>

                <button type="submit"
                    class="w-full py-5 bg-[#233C7E] text-white text-[11px] font-black uppercase tracking-[0.25em] rounded-2xl shadow-lg shadow-blue-900/20 hover:bg-slate-900 transition-all active:scale-95">
                    Verificar Identidad
                </button>
            </form>

            <div class="px-10 pb-10 text-center">
                <a href="javascript:history.back()"
                    class="text-xs font-bold text-slate-400 uppercase tracking-widest hover:text-[#233C7E] transition-colors">
                    ← Volver al inicio
                </a>
            </div>

        </div>
    </div>
@endsection
