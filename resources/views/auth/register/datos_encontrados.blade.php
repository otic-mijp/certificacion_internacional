@extends('layouts.auth')

@section('content')
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-5xl bg-white shadow-2xl rounded-[2rem] overflow-hidden border border-slate-200">
            
            <!-- Encabezado -->
            <div class="bg-blue-900 px-8 py-10 flex flex-col md:flex-row justify-between items-center gap-4">
                <div>
                    <h3 class="text-3xl font-bold text-white tracking-tight">Registro de Cuenta Única</h3>
                    <p class="text-blue-300 text-sm font-medium mt-1">Complete sus datos para el acceso oficial al panel.</p>
                </div>
                <a href="{{ route('login') }}"
                    class="inline-flex items-center px-6 py-3 border border-transparent text-sm font-semibold rounded-xl text-blue-900 bg-white hover:bg-blue-50 transition-colors shadow-sm">
                    Ya tengo cuenta 
                </a>
            </div>

            <form action="{{ route('registro.usuario.store') }}" method="POST" class="p-8 md:p-12 space-y-10">
                @csrf

                <input type="hidden" name="cedula" value="{{ $persona['numero_cedula'] }}">
                <input type="hidden" name="nombres" value="{{ $persona['nombres'] }}">
                <input type="hidden" name="primer_apellido" value="{{ $persona['primer_apellido'] }}">
                <input type="hidden" name="segundo_apellido" value="{{ $persona['segundo_apellido'] ?? '' }}">
                <input type="hidden" name="letra_cedula" value="{{ $persona['letra_cedula'] }}">

                <!-- SECCIÓN 1: Identidad -->
                <section class="space-y-6">
                    <div class="flex items-center gap-4">
                        <span class="flex items-center justify-center w-8 h-8 rounded-full bg-blue-100 text-blue-700 font-bold text-sm">1</span>
                        <h2 class="text-xl font-bold text-blue-900">Información de Identidad:</h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-12 gap-6 items-start">
                        <!-- Bloque Cédula -->
                        <div class="md:col-span-4 space-y-2">
                            <label for="cedula" class="block text-xs font-bold text-slate-700 mb-2 uppercase">Cédula de identidad:</label>
                            <div class="flex shadow-sm">
                                <select style="pointer-events: none;" readonly tabindex="-1" id="cedula"
                                    class="rounded-l-xl bg-slate-700 text-slate-200 text-sm p-3 outline-none border-none">
                                    <option value="V" {{ $persona['letra_cedula'] == 'V' ? 'selected' : '' }}>V</option>
                                    <option value="E" {{ $persona['letra_cedula'] == 'E' ? 'selected' : '' }}>E</option>
                                </select>
                                <input type="text" value="{{ $persona['numero_cedula'] }}" readonly
                                    class="flex-1 rounded-r-xl border-slate-200 text-sm p-3 outline-none border bg-slate-50 text-slate-600 font-mono">
                            </div>
                            <div class="flex items-center gap-2 text-emerald-600 bg-emerald-50 p-2 rounded-lg border border-emerald-100 mt-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                <span class="text-[10px] font-bold uppercase tracking-wider">
                                    {{ $persona['nombres'] }} {{ $persona['primer_apellido'] }}
                                </span>
                            </div>
                        </div>

                        <!-- Bloque Email -->
                        <div class="md:col-span-8">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div class="flex flex-col gap-1">
                                    <label for="email" class="block text-xs font-bold text-slate-700 mb-2 uppercase">Correo electrónico:</label>
                                    <input type="email" id="email" name="correo_electronico"
                                        value="{{ old('correo_electronico') }}" placeholder="ejemplo@correo.com"
                                        class="w-full rounded-xl border-slate-200 text-sm p-3 focus:ring-2 focus:ring-blue-500 border @error('correo_electronico') border-red-500 @enderror">
                                    @error('correo_electronico')
                                        <span class="px-2 text-[11px] text-red-500 mt-1">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="flex flex-col gap-1">
                                    <label for="email_confirmation" class="block text-xs font-bold text-slate-700 mb-2 uppercase">Confirmar correo:</label>
                                    <input type="email" id="email_confirmation" 
                                        name="correo_electronico_confirmation" placeholder="Repita su correo"
                                        class="w-full rounded-xl border-slate-200 text-sm p-3 focus:ring-2 focus:ring-blue-500 border bg-slate-50/50">
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- SECCIÓN 2: Datos Adicionales -->
                <section class="grid grid-cols-1 md:grid-cols-4 gap-6 p-6 rounded-2xl border border-slate-100">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-2 uppercase">Fecha de nacimiento:</label>
                        <input type="date" name="fecha_nacimiento"
                            value="{{ \Carbon\Carbon::parse($persona['fecha_nacimiento'])->format('Y-m-d') }}" readonly
                            class="w-full rounded-xl border-slate-200 text-sm p-3 border text-slate-500 bg-slate-100 cursor-not-allowed">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-2 uppercase">Sexo:</label>
                        <input type="hidden" name="sexo" value="{{ $persona['sexo'] }}">
                        <input type="text" readonly tabindex="-1"
                            value="{{ $persona['sexo'] == 'M' ? 'Masculino' : 'Femenino' }}"
                            class="w-full rounded-xl border-slate-200 text-sm p-3 border bg-slate-100 cursor-not-allowed text-slate-500">
                    </div>
                    <div>
                        <label for="telefono_celular" class="block text-xs font-bold text-slate-700 mb-2 uppercase">Teléfono celular:</label>
                        <input type="number" id="telefono_celular" name="telefono_celular"
                            value="{{ old('telefono_celular') }}" placeholder="04XX"
                            class="w-full rounded-xl border-slate-200 text-sm p-3 focus:ring-2 focus:ring-blue-500 border @error('telefono_celular') border-red-500 @enderror">
                    </div>
                    <div>
                        <label for="telefono_local" class="block text-xs font-bold text-slate-700 mb-2 uppercase">Teléfono local:</label>
                        <input type="number" id="telefono_local" name="telefono_local"
                            value="{{ old('telefono_local') }}" placeholder="02XX"
                            class="w-full rounded-xl border-slate-200 text-sm p-3 focus:ring-2 focus:ring-blue-500 border">
                    </div>
                </section>

                <!-- SECCIÓN 3: Profesión y País -->
             
                <div id="group-profesion" class="custom-select-group relative">
                    <label for="buscador-profesion" class="block text-sm font-semibold text-slate-700 mb-2 uppercase tracking-wide">Profesión u oficio:</label>
                    <input type="text" id="buscador-profesion"
                        class="buscador w-full rounded-xl border-slate-200 text-sm p-3 focus:ring-2 border bg-white @error('profesion_id') border-red-500 @enderror"
                        placeholder="Escriba para buscar..." autocomplete="off"
                        value="{{ old('profesion_id') ? Str::upper($profesiones->firstWhere('id', old('profesion_id'))->nombre ?? '') : '' }}">
                    <input type="hidden" name="profesion_id" class="input-real" value="{{ old('profesion_id') }}">
                    <div class="lista hidden absolute z-50 w-full mt-1 bg-white border border-slate-200 rounded-xl shadow-xl max-h-60 overflow-y-auto">
                        @foreach ($profesiones as $profesion)
                            <div data-value="{{ $profesion->id }}"
                                class="opcion-item p-3 text-sm cursor-pointer hover:bg-blue-50 text-slate-600 border-b border-slate-50 last:border-none">
                                {{ Str::upper($profesion->nombre) }}
                            </div>
                        @endforeach
                    </div>
                </div>
               
                <!-- SECCIÓN 4: Ubicación Venezolana -->
                <section class="border-2 border-slate-100 rounded-[2rem] p-6 md:p-8 bg-white shadow-inner">
                    <div class="flex items-center gap-3 mb-8">
                        <div class="w-1.5 h-6 bg-blue-600 rounded-full"></div>
                        <h3 class="text-sm font-black text-blue-900 uppercase tracking-widest">Ubicación de Residencia Venezolana:</h3>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                        <div class="relative custom-select-group" id="group-estado">
                            <label for="estado_id" class="block text-[11px] font-black text-slate-400 uppercase mb-2 ml-1">Estado🌎:</label>
                            <input type="text" id="estado_id"
                                class="buscador w-full rounded-xl border-slate-200 text-sm p-3 focus:ring-2 border bg-white @error('estado_id') border-red-500 @enderror"
                                placeholder="Seleccione..." autocomplete="off"
                                value="{{ old('estado_id') ? $estados->firstWhere('id', old('estado_id'))->nombre ?? '' : '' }}">
                            <input type="hidden" name="estado_id" class="input-real" value="{{ old('estado_id') }}">
                            <div class="lista hidden absolute z-[100] w-full mt-1 bg-white border border-slate-200 rounded-xl shadow-2xl max-h-64 overflow-y-auto">
                                @foreach ($estados as $estado)
                                    <div class="opcion-item p-3 text-sm cursor-pointer hover:bg-blue-50 text-slate-600 border-b border-slate-50 last:border-none"
                                        data-value="{{ $estado->id }}">
                                        {{ mb_strtoupper($estado->nombre) }}
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="relative custom-select-group" id="group-municipio">
                            <label for="municipio_id" class="block text-[11px] font-black text-slate-400 uppercase mb-2 ml-1">Municipio:</label>
                            <input type="text"
                                class="buscador w-full rounded-xl border-slate-200 text-sm p-3 focus:ring-2 border @if (isset($municipioSeleccionado) && $municipioSeleccionado) bg-white @else bg-slate-50 cursor-not-allowed @endif"
                                placeholder="Seleccione..." autocomplete="off"
                                @if (!isset($municipioSeleccionado) || !$municipioSeleccionado) disabled @endif
                                value="{{ old('municipio_id') ? $municipios->firstWhere('id', old('municipio_id'))->nombre ?? '' : '' }}">
                            <input type="hidden" name="municipio_id" class="input-real" value="{{ old('municipio_id') }}">
                            <div class="lista hidden absolute z-[100] w-full mt-1 bg-white border border-slate-200 rounded-xl shadow-2xl max-h-60 overflow-y-auto">
                                @if (isset($municipios) && $municipios->count() > 0)
                                    @foreach ($municipios as $municipio)
                                        <div class="opcion-item p-3 text-sm cursor-pointer hover:bg-blue-50 text-slate-600"
                                            data-value="{{ $municipio->id }}">
                                            {{ mb_strtoupper($municipio->nombre) }}
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="relative custom-select-group" id="group-parroquia">
                            <label class="block text-[11px] font-black text-slate-400 uppercase mb-2 ml-1">Parroquia:</label>
                            <input type="text"
                                class="buscador w-full rounded-xl border-slate-200 text-sm p-3 focus:ring-2 border @if (old('parroquia_id')) bg-white @else bg-slate-50 cursor-not-allowed @endif"
                                placeholder="Seleccione..." autocomplete="off"
                                @if (!old('parroquia_id')) disabled @endif value="">
                            <input type="hidden" name="parroquia_id" class="input-real" value="{{ old('parroquia_id') }}">
                            <div class="lista hidden absolute z-[100] w-full mt-1 bg-white border border-slate-200 rounded-xl shadow-2xl max-h-60 overflow-y-auto">
                                <!-- Se llena vía JS -->
                            </div>
                        </div>
                    </div>

                    <div>
                        <label for="direccion" class="block text-[11px] font-black text-slate-400 uppercase mb-2 ml-1">Dirección detallada:</label>
                        <textarea rows="4" id="direccion" name="direccion"
                            class="w-full rounded-xl border-slate-200 p-4 text-sm focus:ring-2 border resize-none transition-all @error('direccion') border-red-500 @enderror" 
                            placeholder="Av, Calle, Casa/Apto...">{{ old('direccion') }}</textarea>
                    </div>
                </section>

                <!-- SECCIÓN 5: Seguridad -->
                <section class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label for="password" class="block text-sm font-semibold text-slate-700 mb-2 uppercase tracking-wide">Nueva Contraseña:</label>
                            <input type="password" id="password" name="contrasena" placeholder="********"
                                class="w-full rounded-xl border-slate-200 text-sm p-4 focus:ring-2 border bg-slate-50 focus:bg-white transition-colors @error('contrasena') border-red-500 @enderror">
                        </div>
                        <div class="space-y-2">
                            <label for="password_confirmation" class="block text-sm font-semibold text-slate-700 mb-2 uppercase tracking-wide">Confirmar Contraseña:</label>
                            <input type="password" id="password_confirmation" name="contrasena_confirmation" placeholder="********"
                                class="w-full rounded-xl border-slate-200 text-sm p-4 border bg-slate-50 focus:bg-white transition-colors">
                        </div>
                    </div>

                    <!-- Botones -->
                    <div class="pt-10 flex flex-col sm:flex-row justify-center items-center gap-4">
                        <a href="javascript:history.back()"
                            class="w-full sm:w-auto px-8 py-4 text-sm font-semibold text-slate-500 bg-slate-100 hover:bg-slate-200 rounded-xl transition-all text-center">
                            Volver atrás
                        </a>
                        <button type="submit"
                            class="w-full sm:w-auto inline-flex items-center justify-center px-10 py-4 font-bold text-white bg-blue-600 rounded-xl hover:bg-blue-700 shadow-lg shadow-blue-200 transition-all transform hover:-translate-y-1">
                            Finalizar Registro
                        </button>
                    </div>
                </section>
            </form>
        </div>
    </div>
@endsection