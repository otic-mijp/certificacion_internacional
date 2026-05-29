@extends('layouts.auth')

@section('content')
    <!-- El contenedor ocupa todo el alto y centra la card -->
    <div class="min-h-[80vh] flex items-center justify-center p-4 bg-slate-50">

        <section class="w-full max-w-[400px]  rounded-[2rem] shadow-xl shadow-slate-200/60 border border-slate-300 p-6 sm:p-8 animate-fade-in-up">

            <div class="mb-6">
                <a href="{{ route('login') }}"
                    class="inline-flex items-center gap-2 text-slate-400 hover:text-[#233C7E] transition-colors group py-1">
                    <svg class="w-4 h-4 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7" />
                    </svg>
                    <span class="text-xs font-bold uppercase tracking-wider">Volver</span>
                </a>
            </div>

            <header class="mb-8">
                <h2 class="text-2xl font-black text-slate-800 tracking-tight leading-tight">Consulta</h2>
                <p class="text-sm text-slate-500 font-medium mt-1">Ingresa tu identificación para continuar</p>
            </header>

            <form action="{{ route('buscar.cedula') }}" method="post" class="space-y-6">
                @csrf

                <div class="space-y-2">
                    <label id="cedula-label" for="cedula"
                        class="text-xs font-bold text-slate-400 uppercase tracking-wider ml-1">
                        Número de Cédula
                    </label>

                    <div
                        class="flex items-center bg-slate-50 rounded-2xl p-1.5 border-2 @error('numero_cedula') border-red-400 bg-red-50/10 @else border-transparent focus-within:border-blue-500/30 focus-within:bg-white focus-within:shadow-md @enderror transition-all duration-300">

                        <div class="relative">
                            <select name="letra_cedula" aria-labelledby="cedula-label"
                                class="appearance-none bg-white border border-slate-200 text-[#233C7E] font-bold py-2.5 pl-4 pr-9 rounded-xl outline-none text-sm cursor-pointer hover:border-slate-300 focus:border-blue-500/50 transition-colors">
                                <option value="V" {{ old('letra_cedula') == 'V' ? 'selected' : '' }}>V</option>
                                <option value="E" {{ old('letra_cedula') == 'E' ? 'selected' : '' }}>E</option>
                            </select>
                            <div class="absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none text-slate-400">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path d="M19 9l-7 7-7-7" stroke-width="2.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </div>
                        </div>

                        <input type="text" id="cedula" name="numero_cedula" value="{{ old('numero_cedula') }}"
                            placeholder="Ej: 25123456"
                            class="flex-1 min-w-0 bg-transparent py-2.5 px-3 text-base font-bold text-slate-700 outline-none placeholder:text-slate-300 placeholder:font-normal"
                            maxlength="9" inputmode="numeric" autofocus required pattern="[0-9]+">
                    </div>

                    @error('numero_cedula')
                        <div class="flex items-center gap-2 px-1 py-1.5 animate-in fade-in slide-in-from-top-1" role="alert">
                            <p class="text-xs text-red-500 font-semibold tracking-tight text-justify">{{ $message }}</p>
                        </div>
                    @enderror
                </div>

                <button type="submit"
                    class="w-full cursor-pointer bg-[#233C7E] hover:bg-slate-900 text-white font-bold py-4 rounded-2xl transition-all active:scale-[0.98] shadow-lg shadow-blue-900/10 flex items-center justify-center gap-2.5 group">
                    <span class="text-xs uppercase tracking-wider">Verificar Datos</span>
                    <svg class="w-4 h-4 transition-transform group-hover:scale-110" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
            </form>
        </section>
    </div>
@endsection
