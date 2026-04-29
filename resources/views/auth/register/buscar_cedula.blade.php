@extends('layouts.auth')

@section('content')
    <section class="w-full max-w-xl mx-auto px-4">
        <div class="bg-white rounded-[40px] shadow-2xl shadow-slate-200/50 border border-slate-400 p-10 mt-10">
            <section class="flex justify-between items-start mb-10">
                <div>
                    <h3 class="text-[13px] font-black text-slate-400 uppercase tracking-[0.4em] mb-2">
                        Consulta de Identidad
                    </h3>
                    <div class="h-1.5 w-12 bg-[#233C7E] rounded-full"></div>
                </div>

                <a href="{{ route('login') }}" class="flex items-center gap-2 text-slate-400 hover:text-[#233C7E] transition-colors group">
                    <svg class="w-4 h-4 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M15 19l-7-7 7-7" />
                    </svg>
                    <span class="text-[11px] font-black uppercase tracking-widest">Volver</span>
                </a>
            </section>
            <form action="{{ route('consulta.cedula') }}" method="POST" class="space-y-8">
                @csrf
                <section class="space-y-4">
                    <label for="cedula" class="text-xs font-black text-slate-600 uppercase tracking-widest ml-1">
                        Número de Cédula de Identidad
                    </label>
                    <section class="flex flex-col sm:flex-row items-stretch gap-3 p-2.5 bg-slate-50 rounded-[28px] border-2 transition-all {{ $errors->has('numero_cedula') ? 'border-red-200 bg-red-50/30' : 'border-transparent focus-within:border-[#233C7E]/10 focus-within:bg-white focus-within:shadow-xl' }}">
                        <div class="flex items-center flex-1">
                            <select name="letra_cedula" class="bg-white text-base font-bold text-slate-700 py-4 px-5 rounded-2xl shadow-sm outline-none cursor-pointer border transition-all {{ $errors->has('letra_cedula') ? 'border-red-500' : 'border-slate-100 hover:border-slate-200' }}">
                                <option value="V" {{ old('letra_cedula') == 'V' ? 'selected' : '' }}>V</option>
                                <option value="E" {{ old('letra_cedula') == 'E' ? 'selected' : '' }}>E</option>
                            </select>
                            <input type="text" id="cedula" name="numero_cedula" value="{{ old('numero_cedula') }}" placeholder="Ej. 12345678" class="w-full bg-transparent py-4 px-5 text-lg font-bold text-slate-800 outline-none placeholder:text-slate-300 tracking-[0.1em]" maxlength="9">
                        </div>

                        <button type="submit" class="bg-[#233C7E] hover:bg-slate-900 text-white px-8 py-4 rounded-[20px] transition-all active:scale-95 shadow-lg shadow-blue-900/30 flex items-center justify-center gap-3 group min-w-[160px]">
                            <span class="font-bold uppercase tracking-wider text-xs">Consultar</span>
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                <path d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396 1.414-1.414-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8 3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6z" />
                            </svg>
                        </button>
                    </section>
                    <section class="flex flex-col sm:flex-row justify-between items-center gap-4 px-2">
                        @error('numero_cedula')
                            <div class="flex items-center gap-2 text-red-600 bg-red-50 py-2 px-4 rounded-full border border-red-100">
                                <span class="w-2 h-2 bg-red-600 rounded-full animate-pulse"></span>
                                <p class="text-[11px] font-bold uppercase tracking-tight">{{ $message }}</p>
                            </div>
                        @else
                            <p class="text-[11px] text-slate-400 italic font-medium">
                                * Ingrese solo números sin puntos ni guiones.
                            </p>
                        @enderror
                    </section>
                </section>
            </form>
        </div>
    </section>
@endsection
