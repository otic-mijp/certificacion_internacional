@extends('site.app')

@section('title', 'Solicitud de Certificación de Antecedentes Penales')

@section('content')
    <div class="max-w-5xl mx-auto bg-white rounded-3xl shadow-2xl shadow-slate-200/60 overflow-hidden border border-slate-200">

        {{-- Información del Titular (Solo lectura) --}}
        <div class="p-8 md:p-10 bg-slate-50/50">
            <div class="flex items-center gap-3 mb-8">
                <span class="flex items-center justify-center w-8 h-8 rounded-full bg-blue-600 text-[10px] font-black text-white shadow-lg shadow-blue-200">01</span>
                <h2 class="text-xs font-black text-slate-800 uppercase tracking-[0.2em] border-b-2 border-blue-600 pb-1">
                    Información del Titular
                </h2>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="space-y-2">
                    <label class="text-[10px] font-bold text-slate-400 uppercase ml-1 tracking-wider">Nombres</label>
                    <input type="text" value="{{ $data->nombres }}" readonly
                        class="w-full px-4 py-3 bg-white border border-slate-200 rounded-2xl text-sm font-semibold text-slate-600 cursor-not-allowed focus:outline-none shadow-sm">
                </div>

                <div class="space-y-2">
                    <label class="text-[10px] font-bold text-slate-400 uppercase ml-1 tracking-wider">Primer Apellido</label>
                    <input type="text" value="{{ $data->primer_apellido }}" readonly
                        class="w-full px-4 py-3 bg-white border border-slate-200 rounded-2xl text-sm font-semibold text-slate-600 cursor-not-allowed focus:outline-none shadow-sm">
                </div>

                <div class="space-y-2">
                    <label class="text-[10px] font-bold text-slate-400 uppercase ml-1 tracking-wider">Segundo Apellido</label>
                    <input type="text" value="{{ $data->segundo_apellido }}" readonly
                        class="w-full px-4 py-3 bg-white border border-slate-200 rounded-2xl text-sm font-semibold text-slate-600 cursor-not-allowed focus:outline-none shadow-sm">
                </div>

                <div class="space-y-2">
                    <label class="text-[10px] font-bold text-slate-400 uppercase ml-1 tracking-wider">Cédula de Identidad</label>
                    <input type="text" value="{{ $data->id_persona }}" readonly
                        class="w-full px-4 py-3 bg-white border border-slate-200 rounded-2xl text-sm font-semibold text-slate-600 cursor-not-allowed focus:outline-none shadow-sm">
                </div>

                <div class="sm:col-span-2 space-y-2">
                    <label class="text-[10px] font-bold text-slate-400 uppercase ml-1 tracking-wider">Correo Electrónico</label>
                    <input type="text" value="{{ auth()->user()->email }}" readonly
                        class="w-full px-4 py-3 bg-white border border-slate-200 rounded-2xl text-sm font-semibold text-slate-600 cursor-not-allowed focus:outline-none shadow-sm">
                </div>
            </div>
        </div>

        {{-- Formulario de Solicitud --}}
        <form action="{{ route('solicitud.store') }}" method="POST" class="p-8 md:p-10 border-t border-slate-100">
            @csrf

            {{-- Alerta de Error General (Capturado por el Try-Catch del Controlador) --}}
            @if($errors->has('error'))
                <div class="mb-8 flex items-center gap-4 p-4 bg-red-50 border-l-4 border-red-500 rounded-r-2xl shadow-sm">
                    <div class="flex-shrink-0 w-10 h-10 bg-red-100 rounded-full flex items-center justify-center">
                        <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xs font-black text-red-800 uppercase tracking-widest">Error de Procesamiento</h3>
                        <p class="text-xs text-red-600 font-medium">{{ $errors->first('error') }}</p>
                    </div>
                </div>
            @endif

            <div class="mb-12">
                <div class="flex items-center gap-3 mb-8">
                    <span class="flex items-center justify-center w-8 h-8 rounded-full bg-blue-600 text-[10px] font-black text-white shadow-lg shadow-blue-200">02</span>
                    <h2 class="text-xs font-black text-slate-800 uppercase tracking-[0.2em] border-b-2 border-blue-600 pb-1">
                        Selección del Trámite
                    </h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-10">

                    {{-- Motivo --}}
                    <div class="group space-y-2">
                        <label for="motivo" class="text-[10px] font-black text-slate-700 uppercase ml-1 tracking-widest group-focus-within:text-blue-600">
                            Motivo de Solicitud
                        </label>
                        <select id="motivo" name="motivo" required
                            class="w-full px-4 py-4 bg-slate-50 border @error('motivo') border-red-500 @else border-slate-200 @enderror rounded-2xl text-sm font-bold text-slate-800 focus:ring-4 focus:ring-blue-50 focus:border-blue-400 focus:bg-white transition-all outline-none appearance-none cursor-pointer">
                            <option value="" disabled {{ old('motivo') ? '' : 'selected' }}>Seleccione el motivo...</option>
                            @foreach ($motivos as $motivo)
                                <option value="{{ $motivo->id }}" {{ old('motivo') == $motivo->id ? 'selected' : '' }}>
                                    {{ $motivo->motivo }}
                                </option>
                            @endforeach
                        </select>
                        @error('motivo')
                            <p class="text-[10px] text-red-500 font-bold mt-1 ml-1 tracking-wide uppercase">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- País --}}
                    <div class="group space-y-2" id="custom-select-container">
                        <label for="pais_solicitud" class="text-[10px] font-black text-slate-700 uppercase ml-1 tracking-widest group-focus-within:text-blue-600">
                            País de Destino
                        </label>

                        <div class="relative">
                            <select id="pais_solicitud" name="pais" required class="hidden">
                                <option value="" disabled {{ old('pais') ? '' : 'selected' }}>Seleccione el país...</option>
                                @foreach ($paises as $pais)
                                    <option value="{{ $pais->id }}" {{ old('pais') == $pais->id ? 'selected' : '' }}>
                                        {{ $pais->nombre_oficial }}
                                    </option>
                                @endforeach
                            </select>

                            <div class="relative w-full">
                                <input type="text" id="custom-search-input" placeholder="Escriba para buscar país..."
                                    class="w-full pr-12 px-4 py-4 bg-slate-50 border @error('pais') border-red-500 @else border-slate-200 @enderror rounded-2xl text-sm font-bold text-slate-800 focus:ring-4 focus:ring-blue-50 focus:border-blue-400 focus:bg-white transition-all outline-none appearance-none cursor-pointer"
                                    autocomplete="off">

                                <span class="pointer-events-none absolute inset-y-0 right-4 flex items-center text-slate-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.939l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.27a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                    </svg>
                                </span>
                                <ul id="custom-options-list" class="absolute z-50 w-full mt-2 max-h-60 overflow-y-auto bg-white border border-slate-200 rounded-2xl shadow-xl hidden"></ul>
                            </div>
                        </div>
                        @error('pais')
                            <p class="text-[10px] text-red-500 font-bold mt-1 ml-1 tracking-wide uppercase">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="bg-blue-50/30 rounded-3xl border-2 border-dashed @error('desea_apostillar') border-red-200 bg-red-50/20 @else border-blue-100 @enderror p-6 md:p-8">
                        <div class="flex flex-col md:flex-row items-center justify-between gap-6">
                            <div class="space-y-1 text-center md:text-left">
                                <h4 class="text-sm font-black text-blue-900 uppercase tracking-tight">¿Desea apostillar?</h4>
                                <p class="text-[11px] text-blue-600/70 font-medium">Otorga validez legal internacional.</p>
                                @error('desea_apostillar')
                                    <p class="text-[10px] text-red-500 font-black uppercase mt-1 italic">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex bg-white p-1.5 rounded-2xl shadow-sm border border-blue-100">
                                <label class="relative flex-1">
                                    <input type="radio" name="desea_apostillar" value="si" required {{ old('desea_apostillar') == 'si' ? 'checked' : '' }} class="peer hidden">
                                    <span class="block px-8 py-2.5 rounded-xl text-[10px] font-black uppercase tracking-widest text-slate-400 cursor-pointer transition-all peer-checked:bg-blue-600 peer-checked:text-white">Sí</span>
                                </label>
                                <label class="relative flex-1">
                                    <input type="radio" name="desea_apostillar" value="no" {{ old('desea_apostillar', 'no') == 'no' ? 'checked' : '' }} class="peer hidden">
                                    <span class="block px-8 py-2.5 rounded-xl text-[10px] font-black uppercase tracking-widest text-slate-400 cursor-pointer transition-all peer-checked:bg-slate-800 peer-checked:text-white">No</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="space-y-6 pt-4">
                    <button type="submit" class="w-full md:w-auto px-12 py-5 bg-blue-900 hover:bg-blue-700 text-white text-[11px] font-black uppercase tracking-[0.25em] rounded-2xl transition-all active:scale-95 shadow-2xl shadow-blue-200 flex items-center justify-center gap-3">
                        Finalizar Solicitud
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </button>

                    <div class="flex justify-center border-t border-slate-50 pt-6">
                        <a href="#" class="group flex items-center gap-3 opacity-70 hover:opacity-100 transition-all">
                            <div class="bg-slate-100 p-2 rounded-lg group-hover:bg-blue-100 transition-colors">
                                <svg class="w-4 h-4 text-slate-500 group-hover:text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <span class="text-[10px] font-bold text-slate-500 uppercase tracking-widest">
                                ¿Trámite para menores de edad? <span class="text-blue-600 underline underline-offset-4 ml-1">Click aquí</span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection