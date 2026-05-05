@extends('site.app')

@section('title', 'Registro - Configurar Seguridad')

@section('content')
    <div class="bg-slate-50 flex items-center justify-center p-4">
        <div
            class="max-w-6xl w-full bg-white rounded-[3rem] overflow-hidden border border-slate-400">

            <div class="flex flex-col lg:flex-row">
                <!-- PANEL IZQUIERDO: Preguntas Actuales -->
                <div class="lg:w-1/3 bg-slate-50 p-8 md:p-12 border-b lg:border-b-0 lg:border-r border-slate-200">
                    <div class="inline-flex p-3 bg-white rounded-2xl shadow-sm mb-6">
                        <svg class="w-6 h-6 me-2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        Preguntas actuales:
                    </div>

                    <h3 class="text-xl font-bold text-slate-800 mb-2">Configuración Actual</h3>
                    <p class="text-sm text-slate-500 mb-8">Estos son los datos que tienes registrados actualmente en el
                        sistema.</p>

                    <div class="space-y-6">
                        @forelse($user->respuestasSeguridad as $index => $respuesta)
                            <div
                                class="relative pl-6 border-l-2 {{ $index == 0 ? 'border-blue-200' : 'border-slate-200' }}">
                                <span
                                    class="absolute -left-[9px] top-0 w-4 h-4 {{ $index == 0 ? 'bg-blue-500' : 'bg-slate-300' }} rounded-full border-4 border-slate-50"></span>
                                <p
                                    class="text-[10px] font-black {{ $index == 0 ? 'text-blue-600' : 'text-slate-400' }} uppercase tracking-widest mb-1">
                                    Pregunta {{ $index + 1 }}
                                </p>
                                <p class="text-sm font-bold text-slate-700">{{ $respuesta->pregunta->pregunta }}</p>
                                <p class="text-xs text-slate-400 mt-1 italic">********</p>
                            </div>
                        @empty
                            <div class="p-4 bg-blue-50 border border-blue-100 rounded-2xl mb-3">
                                <p class="text-xs text-blue-600 font-medium italic">Aún no has configurado tus preguntas.
                                </p>
                            </div>
                        @endforelse
                    </div>
                    <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-4 text-center">
                        <p class="text-sm text-yellow-700">
                            <span class="font-bold">Advertencia:</span>
                            Si ha olvidado las respuestas, por favor actualice nuevamente sus preguntas y las respuestas de
                            las mismas.
                        </p>
                    </div>
                </div>

                <!-- PANEL DERECHO: Formulario de Actualización -->
                <div class="lg:w-2/3 p-8 md:p-12">
                    <div class="mb-10 text-center">
                        <h2 class="text-2xl font-black text-slate-800 tracking-tighter uppercase">Actualizar Seguridad</h2>
                        <p class="text-sm font-medium text-slate-400 mt-1">
                            Establece nuevas preguntas de seguridad.
                        </p>
                    </div>

                    {{-- Alerta de Éxito --}}
                    @if (session('success'))
                        <div
                            class="mb-6 p-4 bg-emerald-50 border border-emerald-100 text-emerald-600 rounded-2xl text-sm font-bold animate-pulse">
                            ✅ {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('usuario.preguntas.update') }}" method="POST" class="space-y-8">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <!-- Columna de Preguntas -->
                            <div class="space-y-6">
                                <!-- Pregunta 1 -->
                                <div class="space-y-3">
                                    <label
                                        class="block text-[10px] font-black text-[#233C7E] uppercase tracking-widest ml-1">Pregunta
                                        1:</label>
                                    <select name="pregunta_1_id"
                                        class="w-full px-4 py-4 bg-slate-50 border-2 rounded-2xl text-sm font-bold text-slate-700 outline-none transition-all 
                                        {{ $errors->has('pregunta_1_id') ? 'border-red-500 ring-4 ring-red-500/5' : 'border-slate-400 focus:border-[#233C7E]' }}">
                                        <option value="" selected disabled>Seleccione...</option>
                                        @foreach ($preguntas_disponibles as $pregunta)
                                            <option value="{{ $pregunta->id }}"
                                                {{ old('pregunta_1_id') == $pregunta->id ? 'selected' : '' }}>
                                                {{ $pregunta->pregunta }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('pregunta_1_id')
                                        <p class="text-[11px] text-red-500 font-bold mt-1 ml-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Pregunta 2 -->
                                <div class="space-y-3">
                                    <label
                                        class="block text-[10px] font-black text-[#233C7E] uppercase tracking-widest ml-1">
                                        Nueva Pregunta 2
                                    </label>
                                    <select name="pregunta_2_id"
                                        class="w-full px-4 py-4 bg-slate-50 border-2 rounded-2xl text-sm font-bold text-slate-700 outline-none transition-all 
                                        {{ $errors->has('pregunta_2_id') ? 'border-red-500 ring-4 ring-red-500/5' : 'border-slate-400 focus:border-[#233C7E]' }}">
                                        <option value="" selected disabled>Seleccione...</option>
                                        @foreach ($preguntas_disponibles as $pregunta)
                                            <option value="{{ $pregunta->id }}"
                                                {{ old('pregunta_2_id') == $pregunta->id ? 'selected' : '' }}>
                                                {{ $pregunta->pregunta }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('pregunta_2_id')
                                        <p class="text-[11px] text-red-500 font-bold mt-1 ml-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Columna de Respuestas -->
                            <div class="space-y-6">
                                <!-- Respuesta 1 -->
                                <div class="space-y-3">
                                    <label
                                        class="block text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">
                                        Nueva Respuesta 1
                                    </label>
                                    <input type="text" name="respuesta_1" value="{{ old('respuesta_1') }}"
                                        placeholder="Defina su respuesta"
                                        class="w-full px-6 py-4 bg-slate-50 border-2 rounded-2xl outline-none transition-all  {{ $errors->has('respuesta_1') ? 'border-red-500 bg-red-50' : 'border-slate-400 focus:bg-white focus:border-[#233C7E]' }}">
                                    @error('respuesta_1')
                                        <p class="text-[11px] text-red-500 font-bold mt-1 ml-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Respuesta 2 -->
                                <div class="space-y-3">
                                    <label
                                        class="block text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Nueva
                                        Respuesta 2</label>
                                    <input type="text" name="respuesta_2" value="{{ old('respuesta_2') }}"
                                        placeholder="Defina su respuesta"
                                        class="w-full px-6 py-4 bg-slate-50 border-2 rounded-2xl outline-none transition-all 
                                        {{ $errors->has('respuesta_2') ? 'border-red-500 bg-red-50' : 'border-slate-400 focus:bg-white focus:border-[#233C7E]' }}">
                                    @error('respuesta_2')
                                        <p class="text-[11px] text-red-500 font-bold mt-1 ml-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="pt-6 flex flex-col md:flex-row gap-4">
                            <a href="{{ route('usuario.perfil') }}"
                                class="flex items-center justify-center gap-2 px-8 py-4 bg-slate-50 hover:bg-slate-100 text-slate-500 text-[11px] font-bold uppercase tracking-[0.2em] rounded-xl border border-slate-200 transition-all active:scale-95">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                </svg>
                                Volver
                            </a>
                            <button type="submit"
                                class="flex-1 py-5 bg-[#233C7E] text-white text-[11px] font-black uppercase tracking-[0.2em] rounded-2xl shadow-xl hover:bg-slate-900 transition-all active:scale-[0.97]">
                                Guardar Cambios de Seguridad
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
