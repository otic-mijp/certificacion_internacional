@extends('layouts.auth')

@section('content')
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-5xl bg-white shadow-2xl rounded-[2rem] overflow-hidden border border-slate-200">

            <!-- Encabezado -->
            <div class="bg-blue-900 px-8 py-10 flex flex-col md:flex-row justify-between items-center gap-4">
                <div>
                    <h3 class="text-3xl font-bold text-white tracking-tight">Registro de cuenta única</h3>
                    <p class="text-blue-300 text-sm font-medium mt-1">Complete sus datos para el acceso oficial al panel.</p>
                </div>
                <a href="{{ route('login') }}"
                    class="inline-flex items-center px-6 py-3 border border-transparent text-sm font-semibold rounded-xl text-blue-900 bg-white hover:bg-blue-50 transition-colors shadow-sm">
                    Ya tengo cuenta
                </a>
            </div>

            <form action="{{ route('registro.usuario.store') }}" method="POST" id="formulario-login" class="p-8 md:p-12 space-y-10">
                @csrf

                <input type="hidden" name="id_persona" value="{{ $persona['id_persona'] }}">

                <!-- SECCIÓN 1: Identidad -->
                <section class="space-y-6">
                    <div class="flex items-center gap-4">
                        <span
                            class="flex items-center justify-center w-8 h-8 rounded-full bg-blue-100 text-blue-700 font-bold text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Zm6-10.125a1.875 1.875 0 1 1-3.75 0 1.875 1.875 0 0 1 3.75 0Zm1.294 6.336a6.721 6.721 0 0 1-3.17.789 6.721 6.721 0 0 1-3.168-.789 3.376 3.376 0 0 1 6.338 0Z" />
                            </svg>
                        </span>
                        <h2 class="text-xl font-bold text-blue-900">Información de Identidad:</h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-12 gap-6 items-start">
                        <!-- Bloque Cédula -->
                        <div class="md:col-span-4 space-y-2">
                            <label for="cedula" class="block text-xs font-bold text-slate-700 mb-2 uppercase">Cédula de
                                identidad:</label>
                            <div class="flex shadow-sm">
                                <select style="pointer-events: none;" disabled tabindex="-1" id="cedula"
                                    class="rounded-l-xl bg-slate-700 text-slate-200 text-sm p-3 outline-none border-none">
                                    <option value="V" {{ $persona['letra_cedula'] == 'V' ? 'selected' : '' }}>V
                                    </option>
                                    <option value="E" {{ $persona['letra_cedula'] == 'E' ? 'selected' : '' }}>E
                                    </option>
                                </select>
                                <input type="text" value="{{ $persona['numero_cedula'] }}" readonly
                                    class="flex-1 rounded-r-xl border-slate-200 text-sm p-3 outline-none border bg-slate-50 text-slate-600 font-mono">
                            </div>
                            <div
                                class="flex items-center gap-2 text-emerald-600 bg-emerald-50 p-2 rounded-lg border border-emerald-100 mt-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
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
                                    <label for="email"
                                        class="block text-xs font-bold text-slate-700 mb-2 uppercase">Correo
                                        electrónico:</label>
                                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                                        placeholder="ejemplo@correo.com"
                                        class="w-full rounded-xl border-slate-200 text-sm p-3 focus:ring-2 focus:ring-blue-500 border outline-none">
                                    @error('email')
                                        <div class="text-red-500 text-center mt-1 text-xs">
                                            ¡Atención! {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="flex flex-col gap-1">
                                    <label for="email_confirmation"
                                        class="block text-xs font-bold text-slate-700 mb-2 uppercase">
                                        Confirmar correo:
                                    </label>
                                    <input type="email" id="email_confirmation" name="email_confirmation" value="{{ old('email_confirmation') }}"
                                        placeholder="Repita su correo" autocomplete="off"
                                        class="w-full rounded-xl border-slate-200 text-sm p-3 focus:ring-2 focus:ring-blue-500 border bg-slate-50/50 outline-none">

                                    <!-- Mensaje de aviso (inicialmente oculto) -->
                                    <p id="msg-no-paste" class="text-amber-600 text-[10px] font-bold uppercase mt-1 hidden">
                                        * Por seguridad, escriba el correo manualmente.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- SECCIÓN 2: Datos Adicionales -->
                <section class="grid grid-cols-1 md:grid-cols-4 gap-6 p-6 rounded-2xl border border-slate-200">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-2 uppercase">Fecha de nacimiento:</label>
                        <input type="date" value="{{ \Carbon\Carbon::parse($persona['fecha_nacimiento'])->format('Y-m-d') }}" disabled
                            class="w-full rounded-xl border-slate-200 text-sm p-3 border text-slate-500 bg-slate-100 cursor-not-allowed">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-2 uppercase">Sexo:</label>
                        <input type="hidden" value="{{ $persona['sexo'] }}">
                        <input type="text" disabled tabindex="-1" value="{{ $persona['sexo'] == 'M' ? 'Masculino' : 'Femenino' }}" class="w-full rounded-xl border-slate-200 text-sm p-3 border bg-slate-100 cursor-not-allowed text-slate-500">
                    </div>
                    <div>
                        <label for="telefono_celular" class="block text-xs font-bold text-slate-700 mb-2 uppercase">
                            Teléfono celular:
                        </label>
                        <!-- Cambiado type="tel" y placeholder internacional -->
                        <input type="tel" id="telefono_celular" name="telefono_celular"
                            value="{{ old('telefono_celular') }}" placeholder="+58 412 1234567"
                            class="w-full rounded-xl border-slate-200 text-sm p-3 focus:ring-2 focus:ring-blue-500 border outline-none">

                        @error('telefono_celular')
                            <div class="text-red-500 text-center mt-1 text-xs">
                                ¡Atención! {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div>
                        <label for="telefono_local" class="block text-xs font-bold text-slate-700 mb-2 uppercase">
                            Teléfono local:
                        </label>
                        <!-- Cambiado type="tel" y placeholder internacional -->
                        <input type="tel" id="telefono_local" name="telefono_local"
                            value="{{ old('telefono_local') }}" placeholder="+58 212 1234567"
                            class="w-full rounded-xl border-slate-200 text-sm p-3 focus:ring-2 focus:ring-blue-500 outline-none border">

                        @error('telefono_local')
                            <div class="text-red-500 text-center mt-1 text-xs">
                                ¡Atención! {{ $message }}
                            </div>
                        @enderror
                    </div>
                </section>

                <!-- SECCIÓN 3: Profesión y País -->

                <div id="group-profesion" class="custom-select-group relative">
                    <label for="buscador-profesion"
                        class="block text-sm font-semibold text-slate-700 mb-2 uppercase tracking-wide">
                        Profesión u oficio:
                    </label>
                    <input type="text" id="buscador-profesion"
                        class="buscador w-full rounded-xl border-slate-200 text-sm p-3 focus:ring-2 focus:ring-blue-500 border bg-white outline-none"
                        placeholder="Escriba para buscar..." autocomplete="off"
                        value="{{ old('profesion_id') ? Str::upper($profesiones->firstWhere('id', old('profesion_id'))->nombre ?? '') : '' }}">

                    <input type="hidden" name="profesion_id" class="input-real" value="{{ old('profesion_id') }}">

                    @error('profesion_id')
                        <div class="text-red-500 text-center mt-1 text-xs">
                            ¡Atención! {{ $message }}
                        </div>
                    @enderror

                    <div
                        class="lista hidden absolute z-50 w-full mt-1 bg-white border border-slate-200 rounded-xl shadow-xl max-h-60 overflow-y-auto">
                        @foreach ($profesiones as $profesion)
                            <div data-value="{{ $profesion->id }}"
                                class="opcion-item p-3 text-sm cursor-pointer hover:bg-blue-50 text-slate-600 border-b border-slate-50 last:border-none">
                                {{ Str::upper($profesion->nombre) }}
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- SECCIÓN 4: Ubicación Venezolana -->
                <section class="border-2 border-slate-200 rounded-[2rem] p-6 md:p-8 bg-white shadow-inner">
                    <div class="flex items-center gap-3 mb-8">
                        <div class="w-1.5 h-6 bg-blue-600 rounded-full"></div>
                        <h3 class="text-sm font-black text-blue-900 uppercase tracking-widest">Ubicación de Residencia
                            Venezolana:</h3>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                        <div class="relative custom-select-group" id="group-estado">
                            <label for="estado_id"
                                class="block text-[11px] font-black text-slate-400 uppercase mb-2 ml-1">Estado🌎:</label>
                            <input type="text" id="estado_id"
                                class="buscador w-full rounded-xl border-slate-200 text-sm p-3 focus:ring-2 focus:ring-blue-500 border bg-white outline-none"
                                placeholder="Seleccione..." autocomplete="off"
                                value="{{ old('estado_id') ? $estados->firstWhere('id', old('estado_id'))->nombre ?? '' : '' }}">

                            <input type="hidden" name="estado_id" class="input-real" value="{{ old('estado_id') }}">

                            @error('estado_id')
                                <div class="text-red-500 text-center mt-1 text-xs">
                                    ¡Atención! {{ $message }}
                                </div>
                            @enderror

                            <div
                                class="lista hidden absolute z-[100] w-full mt-1 bg-white border border-slate-200 rounded-xl shadow-2xl max-h-64 overflow-y-auto">
                                @foreach ($estados as $estado)
                                    <div class="opcion-item p-3 text-sm cursor-pointer hover:bg-blue-50 text-slate-600 border-b border-slate-50 last:border-none"
                                        data-value="{{ $estado->id }}">
                                        {{ mb_strtoupper($estado->nombre) }}
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="relative custom-select-group" id="group-municipio">
                            <label for="municipio_id"
                                class="block text-[11px] font-black text-slate-400 uppercase mb-2 ml-1">Municipio:</label>
                            <input type="text"
                                class="buscador w-full rounded-xl border-slate-200 text-sm p-3 focus:ring-2 focus:ring-blue-500 border bg-white outline-none"
                                placeholder="Seleccione..." autocomplete="off"
                                @if (!isset($municipioSeleccionado) || !$municipioSeleccionado) disabled @endif
                                value="{{ old('municipio_id') ? $municipios->firstWhere('id', old('municipio_id'))->nombre ?? '' : '' }}">

                            <input type="hidden" name="municipio_id" class="input-real"
                                value="{{ old('municipio_id') }}">

                            @error('municipio_id')
                                <div class="text-red-500 text-center mt-1 text-xs">
                                    ¡Atención! {{ $message }}
                                </div>
                            @enderror

                            <div
                                class="lista hidden absolute z-[100] w-full mt-1 bg-white border border-slate-200 rounded-xl shadow-2xl max-h-60 overflow-y-auto">
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
                            <label
                                class="block text-[11px] font-black text-slate-400 uppercase mb-2 ml-1">Parroquia:</label>

                            <input type="text"
                                class="buscador w-full rounded-xl border-slate-200 text-sm p-3 focus:ring-2 focus:ring-blue-500 border bg-white outline-none"
                                placeholder="Seleccione..." autocomplete="off" {{-- CAMBIO AQUÍ: Habilitar si hay old de municipio o parroquia --}}
                                @if (!old('municipio_id') && !old('parroquia_id')) disabled @endif
                                value="{{ old('parroquia_id') ? mb_strtoupper($parroquiaSeleccionada->nombre ?? '') : '' }}">

                            <input type="hidden" name="parroquia_id" class="input-real"
                                value="{{ old('parroquia_id') }}">

                            @error('parroquia_id')
                                <div class="text-red-500 text-center mt-1 text-xs">
                                    ¡Atención! {{ $message }}
                                </div>
                            @enderror

                            <div
                                class="lista hidden absolute z-[100] w-full mt-1 bg-white border border-slate-200 rounded-xl shadow-2xl max-h-60 overflow-y-auto">
                                <!-- Se llena vía JS -->
                            </div>
                        </div>
                    </div>

                    <div>
                        <label for="direccion"
                            class="block text-[11px] font-black text-slate-400 uppercase mb-2 ml-1">Dirección
                            detallada:</label>
                        <textarea rows="4" id="direccion" name="direccion"
                            class="w-full rounded-xl border-slate-200 p-4 text-sm focus:ring-2 focus:ring-blue-500 border resize-none transition-all outline-none"
                            placeholder="Av, Calle, Casa/Apto...">{{ old('direccion') }}</textarea>

                        @error('direccion')
                            <div class="text-red-500 text-center mt-1 text-xs">
                                ¡Atención! {{ $message }}
                            </div>
                        @enderror
                    </div>
                </section>

                <!-- SECCIÓN 5: Seguridad -->
                <section class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Nueva Contraseña -->
                        <div class="space-y-2">
                            <label for="clave_usuario"
                                class="block text-sm font-semibold text-slate-700 mb-2 uppercase tracking-wide">Nueva
                                Contraseña:</label>
                            <div class="relative">
                                <!-- Agregamos la clase 'input-password-group' para identificarlos -->
                                <input type="password" id="clave_usuario" name="contrasena" placeholder="********"
                                    class="input-password-group w-full rounded-xl border-slate-200 text-sm p-4 pr-12 focus:ring-2 border bg-slate-50 focus:bg-white transition-colors outline-none focus:ring-blue-500 @error('contrasena') border-red-500 @enderror">

                                <!-- Este botón controlará AMBOS inputs -->
                                <button type="button" id="toggle-all-passwords" tabindex="-1"
                                    class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 hover:text-blue-600 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5 toggle-icon">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.036 12.322a1.012 1.012 0 0 1 0-.644C3.301 8.844 7.218 6.25 12 6.25c4.781 0 8.699 2.601 9.964 5.428a1.012 1.012 0 0 1 0 .644c-1.265 2.827-5.183 5.428-12 5.428-4.782 0-8.699-2.601-9.965-5.428Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                </button>
                            </div>
                            @error('contrasena')
                                <p class="text-red-500 text-xs mt-1 font-medium ml-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Confirmar Contraseña -->
                        <div class="space-y-2">
                            <label for="confirmar_clave_usuario"
                                class="block text-sm font-semibold text-slate-700 mb-2 uppercase tracking-wide">Confirmar
                                Contraseña:</label>
                            <div class="relative">
                                <input type="password" id="confirmar_clave_usuario" name="contrasena_confirmation"
                                    placeholder="********"
                                    class="input-password-group w-full rounded-xl border-slate-200 text-sm p-4 focus:ring-2 border bg-slate-50 focus:bg-white transition-colors outline-none focus:ring-blue-500">
                            </div>
                        </div>
                    </div>

                    <!-- Botones -->
                    <div class="pt-10 flex flex-col md:flex-row justify-between items-center gap-4">

                        <!-- Grupo de Navegación (Izquierda) -->
                        <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">
                            <a href="{{ url('/') }}"
                                class="w-full sm:w-auto px-5 py-3.5 text-sm font-semibold text-blue-600 bg-blue-50 hover:bg-blue-100 rounded-xl transition-all text-center flex items-center justify-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                </svg>
                                Inicio
                            </a>

                            <a href="javascript:history.back()"
                                class="w-full sm:w-auto px-5 py-3.5 text-sm font-semibold text-slate-500 bg-slate-100 hover:bg-slate-200 rounded-xl transition-all text-center flex items-center justify-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                                </svg>
                                Volver
                            </a>
                        </div>

                        <!-- Grupo de Acción (Derecha) -->
                        <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">
                            <button type="button" id="btn-limpiar-formulario"
                                class="w-full cursor-pointer sm:w-auto px-5 py-3.5 text-sm font-semibold text-amber-600 bg-white border border-amber-200 hover:bg-amber-50 rounded-xl transition-all text-center flex items-center justify-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                                </svg>
                                Limpiar
                            </button>

                            <button type="submit"
                                class="w-full cursor-pointer sm:w-auto inline-flex items-center justify-center px-8 py-3.5 font-bold text-white bg-blue-600 rounded-xl hover:bg-blue-700 shadow-lg shadow-blue-200 transition-all transform hover:-translate-y-1 gap-2">
                                <span>Finalizar Registro</span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                            </button>
                        </div>

                    </div>
                </section>
            </form>
        </div>
    </div>
@endsection
