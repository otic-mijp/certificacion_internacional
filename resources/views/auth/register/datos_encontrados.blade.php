@extends('layouts.auth')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-slate-50 py-12 px-4 sm:px-6 lg:px-8">
        <div
            class="w-full max-w-5xl bg-white shadow-2xl shadow-slate-200 rounded-3xl overflow-hidden border border-slate-100">
            <div class="bg-blue-900 px-8 py-10 flex flex-col md:flex-row justify-between items-center gap-4">
                <div>
                    <h3 class="text-3xl font-bold text-white tracking-tight">
                        Registro de Cuenta Única
                    </h3>
                    <p class="text-blue-300 text-sm font-medium mt-1">
                        Complete sus datos para el acceso oficial al panel.
                    </p>
                </div>
                <a href="{{ route('login') }}"
                    class="inline-flex items-center px-6 py-3 border border-transparent text-sm font-semibold rounded-xl text-blue-900 bg-white hover:bg-blue-50 transition-colors shadow-sm">
                    Ya tengo cuenta
                </a>
            </div>
            <form action="#" method="POST" class="p-8 md:p-12 space-y-10">
                @csrf

                <section class="space-y-6">
                    <div class="flex items-center gap-4">
                        <span
                            class="flex items-center justify-center w-8 h-8 rounded-full bg-blue-100 text-blue-700 font-bold text-sm">1</span>
                        <h2 class="text-xl font-bold text-blue-900">Información de Identidad:</h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-12 gap-6 items-start">

                        <div class="md:col-span-4 space-y-2">
                            <label for="cedula" class="block text-sm font-semibold text-slate-700 mb-2">
                                Cédula de Identidad:
                            </label>
                            <div class="flex">
                                <select style="pointer-events: none;" readonly tabindex="-1" id="cedula"
                                    class="rounded-l-xl bg-slate-700 text-slate-200 text-sm p-3 outline-none border-none">
                                    <option value="V" {{ $persona->letra_cedula == 'V' ? 'selected' : '' }}>V</option>
                                    <option value="E" {{ $persona->letra_cedula == 'E' ? 'selected' : '' }}>E</option>
                                </select>
                                <input type="text" value="{{ $persona->numero_cedula }}" readonly
                                    class="flex-1 rounded-r-xl border-slate-200 text-sm p-3 focus:ring-0 outline-none border transition-all bg-slate-100 text-slate-600">
                            </div>

                            <div
                                class="flex items-center gap-2 text-emerald-600 bg-emerald-50 p-2 rounded-lg border border-emerald-100">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="text-[10px] font-bold uppercase tracking-wider">
                                    {{ $persona->nombres }} {{ $persona->primer_apellido }}
                                </span>
                            </div>
                        </div>

                        <div class="md:col-span-8">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                                <div class="flex flex-col gap-1">
                                    <label for="email" class="text-xs font-bold text-slate-700 px-1">Correo
                                        electrónico</label>
                                    <input type="email" id="email" name="correo_electronico"
                                        placeholder="ejemplo@correo.com" required
                                        pattern="[a-zA-Z0-9._%+\-]+@[a-zA-Z0-9.\-]+\.[a-zA-Z]{2,4}$"
                                        class="w-full rounded-xl border-slate-200 text-sm p-3 focus:ring-2 focus:ring-indigo-500 outline-none border transition-all bg-slate-50 focus:bg-white">
                                    <span id="error-email" class="hidden px-2 text-[11px] text-red-400 font-medium italic">
                                        Formato de correo no válido
                                    </span>
                                </div>

                                <div class="flex flex-col gap-1">
                                    <label for="email_confirmation" class="text-xs font-bold text-slate-700 px-1">Confirmar
                                        correo</label>
                                    <input type="email" id="email_confirmation" name="email_confirmation"
                                        placeholder="ejemplo@correo.com" required onpaste="return false"
                                        class="w-full rounded-xl border-slate-200 text-sm p-3 focus:ring-2 focus:ring-indigo-500 outline-none border transition-all bg-slate-50 focus:bg-white">
                                    <span id="error-confirm"
                                        class="hidden px-2 text-[11px] text-red-400 font-medium italic">
                                        Los correos no coinciden
                                    </span>
                                </div>
                            </div>
                        </div>

                    </div>
                </section>

                <section class="grid grid-cols-1 md:grid-cols-4 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Fecha de nacimiento:</label>
                        <input type="date"
                            value="{{ \Carbon\Carbon::parse($persona->fecha_nacimiento)->format('Y-m-d') }}" readonly
                            class="w-full rounded-xl border-slate-200 text-sm p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none border bg-slate-100">
                    </div>
                    <div>
                        <label for="sexo" class="block text-sm font-semibold text-slate-700 mb-2">Sexo:</label>
                        <input type="text" name="sexo" id="sexo" readonly tabindex="-1"
                            value="{{ $persona->sexo == 'M' ? 'Masculino' : ($persona->sexo == 'F' ? 'Femenino' : 'No definido') }}"
                            class="w-full rounded-xl border-slate-200 text-sm p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none border bg-slate-100">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Teléfono celular:</label>
                        <input type="text" name="telefono_celular" min="0" placeholder="04XX-XXXXXXX"
                            class="w-full rounded-xl border-slate-200 text-sm p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none border">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Teléfono local:</label>
                        <input type="text" name="telefono_local" min="0" placeholder="02XX-XXXXXXX"
                            class="w-full rounded-xl border-slate-200 text-sm p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none border">
                    </div>
                </section>

                <div id="group-profesion" class="custom-select-group relative">
                    <label for="buscador-profesion" class="block text-sm font-semibold text-slate-700 mb-2">
                        Profesión u oficio:
                    </label>
                    <input type="text" id="buscador-profesion"
                        class="buscador w-full rounded-xl border-slate-200 text-sm p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none border bg-white"
                        placeholder="Escriba para buscar profesión..." autocomplete="off">

                    <input type="hidden" name="profesion_id" class="input-real" value="{{ old('profesion_id') }}">
                    <div
                        class="lista hidden absolute z-50 w-full mt-1 bg-white border border-slate-200 rounded-xl shadow-lg max-height-60 overflow-y-auto">
                        @foreach ($profesiones as $profesion)
                            <div data-value="{{ $profesion->id }}"
                                class="opcion-item p-3 text-sm cursor-pointer hover:bg-blue-50 text-slate-600 border-b border-slate-50 last:border-0">
                                {{ Str::upper($profesion->nombre) }}
                            </div>
                        @endforeach

                        <div class="no-results hidden p-4 text-sm text-slate-400 italic text-center bg-slate-50">
                            No se encontró la profesión 🔍
                        </div>
                    </div>
                </div>

                <div class="relative custom-select-group" id="group-pais">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        País de ubicación actual🌎:
                    </label>

                    <div class="relative">
                        <input type="text"
                            class="buscador w-full rounded-xl border-slate-200 bg-white text-slate-700 text-sm p-3 pr-10 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none border shadow-sm transition-all cursor-pointer"
                            placeholder="Seleccione un país..." autocomplete="off">

                        <div class="absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none text-slate-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </div>

                    <div
                        class="lista hidden absolute z-[100] w-full mt-1 bg-white border border-slate-200 rounded-xl shadow-xl max-h-64 overflow-y-auto custom-scrollbar">
                        @foreach ($paises as $pais)
                            <div class="opcion-item p-3 text-sm cursor-pointer hover:bg-blue-50 text-slate-600 transition-colors border-b border-slate-50 last:border-0"
                                data-value="{{ $pais->id }}">
                                {{ $pais->nombre }}
                            </div>
                        @endforeach

                        <div
                            class="no-results hidden p-4 text-sm text-slate-400 italic text-center bg-slate-50 rounded-b-xl">
                            No se encontraron coincidencias 🔍
                        </div>
                    </div>

                    <input type="hidden" name="pais_id" class="input-real">
                </div>

                <section class="border-2 border-slate-100  rounded-3xl p-6 md:p-8 transition-all">
                    <div class="flex items-center gap-3 mb-8">
                        <div class="w-1.5 h-6 bg-blue-600 rounded-full"></div>
                        <h3 class="text-sm font-black text-blue-900 uppercase tracking-[0.2em]">
                            Ubicación de Residencia Venezolana:
                        </h3>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                        <div class="relative custom-select-group" id="group-estado">
                            <label class="block text-[11px] font-black text-slate-500 uppercase mb-2 ml-1 tracking-wider">
                                Estado🌎:
                            </label>
                            <div class="relative">
                                <input type="text"
                                    class="buscador w-full rounded-xl border-slate-200 bg-white text-slate-700 text-sm p-3 pr-10 focus:ring-2 focus:ring-blue-500 outline-none border shadow-sm transition-all"
                                    placeholder="Seleccione un estado..." autocomplete="off">
                            </div>
                            <div
                                class="lista hidden absolute z-[100] w-full mt-1 bg-white border border-slate-200 rounded-xl shadow-xl max-h-64 overflow-y-auto custom-scrollbar">
                                @foreach ($estados as $estado)
                                    <div class="opcion-item p-3 text-sm cursor-pointer hover:bg-blue-50 text-slate-600 border-b border-slate-50 last:border-0"
                                        data-value="{{ $estado->id }}">
                                        {{ mb_strtoupper($estado->nombre) }}
                                    </div>
                                @endforeach
                                <div class="no-results hidden p-4 text-sm text-slate-400 italic text-center bg-slate-50">
                                    No hay resultados 🔍</div>
                            </div>
                            <input type="hidden" name="estado_id" class="input-real">
                        </div>

                        <div class="relative custom-select-group" id="group-municipio">
                            <label
                                class="block text-[11px] font-black text-slate-500 uppercase mb-2 ml-1">Municipio:</label>
                            <input type="text"
                                class="buscador w-full rounded-xl border-slate-200 text-sm p-3 focus:ring-2 focus:ring-blue-500 outline-none border bg-gray-50 cursor-not-allowed"
                                placeholder="Seleccione municipio..." autocomplete="off" disabled>
                            <div
                                class="lista hidden absolute z-[100] w-full mt-1 bg-white border border-slate-200 rounded-xl shadow-xl max-h-60 overflow-y-auto custom-scrollbar">
                                <div class="no-results hidden p-4 text-sm text-slate-400 italic text-center">
                                    No hay resultados
                                </div>
                            </div>
                            <input type="hidden" name="municipio_id" class="input-real">
                        </div>

                        <div class="relative custom-select-group" id="group-parroquia">
                            <label
                                class="block text-[11px] font-black text-slate-500 uppercase mb-2 ml-1">Parroquia:</label>
                            <input type="text"
                                class="buscador w-full rounded-xl border-slate-200 text-sm p-3 focus:ring-2 focus:ring-blue-500 outline-none border bg-gray-50 cursor-not-allowed"
                                placeholder="Seleccione parroquia..." autocomplete="off" disabled>
                            <div
                                class="lista hidden absolute z-[100] w-full mt-1 bg-white border border-slate-200 rounded-xl shadow-xl max-h-60 overflow-y-auto custom-scrollbar">
                                <div class="no-results hidden p-4 text-sm text-slate-400 italic text-center">
                                    No hay resultados
                                </div>
                            </div>
                            <input type="hidden" name="parroquia_id" class="input-real">
                        </div>
                    </div>

                    <div>
                        <label class="block text-[11px] font-black text-slate-500 uppercase mb-2 ml-1">
                            Dirección de domicilio detallada:
                        </label>
                        <textarea rows="6" name="direccion"
                            class="w-full rounded-xl border-slate-200 bg-white text-slate-700 p-4 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none border shadow-sm resize-none transition-all"
                            placeholder="Ej: Urbanización, Calle, Número de casa o edificio, piso..."></textarea>
                    </div>
                </section>
                <section class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label for="password" class="block text-sm font-semibold text-slate-700 mb-2">
                                Nueva Contraseña:
                            </label>
                            <div class="relative group">
                                <input type="password" id="password" name="password" placeholder="********"
                                    class="w-full rounded-xl border-slate-200 text-sm p-4 pr-12 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none border transition-all bg-slate-50 focus:bg-white">
                                <button type="button"
                                    class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 hover:text-blue-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label for="password_confirmation" class="block text-sm font-semibold text-slate-700 mb-2">
                                Confirmar Contraseña:
                            </label>
                            <div class="relative group">
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    placeholder="********"
                                    class="w-full rounded-xl border-slate-200 text-sm p-4 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none border transition-all bg-slate-50 focus:bg-white">
                            </div>
                        </div>
                    </div>

                    <div
                        class="bg-gradient-to-r from-blue-50 to-blue-50 border-l-4 border-blue-500 p-4 rounded-r-xl flex items-start gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600 mt-0.5" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <p class="text-xs text-blue-800 leading-relaxed">
                            <span class="font-bold block mb-0.5">Requisitos de Seguridad:</span>
                            Mínimo 8 caracteres, incluyendo <span class="font-semibold text-blue-900">mayúsculas,
                                números</span> y símbolos especiales <span
                                class="bg-blue-100 px-1 rounded text-blue-700 font-mono">#$%&*-+</span>.
                        </p>
                    </div>

                    <div class="pt-6 flex flex-col sm:flex-row items-center gap-4">
                        <a href="javascript:history.back()"
                            class="w-full sm:w-auto px-8 py-4 text-sm font-semibold text-slate-600 hover:text-slate-800 bg-slate-100 hover:bg-slate-200 rounded-xl transition-all duration-200 flex items-center justify-center gap-2 group">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-5 h-5 transition-transform duration-200 group-hover:-translate-x-1"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 17l-5-5m0 0l5-5m-5 5h12" />
                            </svg>
                            <span>Volver atrás</span>
                        </a>

                        <button type="submit"
                            class="w-full relative inline-flex items-center justify-center gap-3 px-8 py-4 font-semibold text-white transition-all duration-200 bg-green-800 rounded-xl hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-600 shadow-sm active:scale-95 group">
                            <span>Finalizar Registro</span>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-5 h-5 transition-transform duration-200 group-hover:translate-x-1" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </button>
                    </div>
                </section>

            </form>
        </div>
    </div>
@endsection
