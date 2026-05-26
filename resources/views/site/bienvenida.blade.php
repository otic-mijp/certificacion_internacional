@extends('site.app')

@section('title', 'Bienvenido | Certificación Internacional MPPRIJP - VE')

@section('content')
    <div class="flex flex-col items-center justify-center bg-[#f8fafc] p-6 font-sans">

        <div class="text-center mb-10">
            <h1 class="text-4xl md:text-6xl font-extrabold text-slate-900 tracking-tight">
                Bienvenido, <span class="text-[#233C7E] capitalize">{{ $data->nombres }} <br>
                    {{ $data->primer_apellido }} {{ $data->segundo_apellido }}</span>
            </h1>
            <p class="text-slate-500 font-medium mt-4 text-lg">
                Sistema de Gestión de Certificación de Antecedentes Penales
            </p>
        </div>

        <div
            class="max-w-4xl w-full bg-white rounded-3xl shadow-[0_20px_50px_rgba(0,0,0,0.05)] border border-slate-100 overflow-hidden">

            @if (!$tiene_preguntas_seguridad)
                <div class="flex items-center gap-4 p-8 border-b border-slate-50 bg-red-50/50">
                    <div
                        class="w-12 h-12 bg-red-500 rounded-xl flex items-center justify-center text-white shadow-lg shadow-red-900/20">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z" />
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h2 class="text-xl font-bold text-red-800">Configuración Requerida</h2>
                        <p class="text-sm text-red-600 font-medium">Debe establecer sus preguntas de seguridad
                            <span class="underline">inmediatamente</span>.  Esto es indispensable para recuperar su información en el futuro.
                        </p>
                    </div>
                    <a href="{{ route('usuario.preguntas') }}"
                        class="px-6 py-3 bg-red-500 text-white text-sm font-bold uppercase tracking-wide rounded-xl shadow-lg hover:bg-red-600 transition-all active:scale-95">
                        Configurar Ahora
                    </a>
                </div>
            @endif

            <div class="flex items-center gap-4 p-8 border-b border-slate-50 bg-slate-50/50">
                <div
                    class="w-12 h-12 bg-[#233C7E] rounded-xl flex items-center justify-center text-white shadow-lg shadow-blue-900/20">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-xl font-bold text-slate-800">Información importante</h2>
                    <p class="text-sm text-slate-500 font-medium">Requisitos y restricciones del trámite</p>
                </div>
            </div>

            <div class="p-8 md:p-12">
                <div
                    class="group p-8 rounded-2xl border border-slate-100 bg-white hover:border-blue-100 hover:bg-blue-50/30 transition-all duration-300">
                    <div class="flex flex-col md:flex-row md:items-center gap-6">
                        <div
                            class="w-16 h-16 rounded-2xl bg-white flex items-center justify-center text-3xl shadow-sm border border-slate-50 group-hover:scale-110 transition-transform duration-300">
                            📊
                        </div>

                        <div class="flex-1">
                            <h3 class="text-xs font-black text-[#233C7E] uppercase tracking-[0.2em] mb-2">
                                Límites de Solicitud
                            </h3>
                            <p class="text-slate-600 leading-relaxed text-lg">
                                Horario: <span class="text-slate-900 font-bold underline decoration-blue-200 decoration-4 underline-offset-2">
                                    Lunes a viernes
                                </span>.
                                Límite de trámites <span class="text-slate-900 font-bold">3 trámites al mes</span> y
                                <span class="text-slate-900 font-bold">10 anuales</span>.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @if ($popupImg)
        <section id="modal-container" class="fixed inset-0 z-50 flex items-center justify-center p-4 opacity-0 pointer-events-none transition-opacity duration-500 ease-out">

            <div id="modal-backdrop" class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm"></div>

            <div id="modal-content"
                class="relative w-full max-w-lg bg-white rounded-3xl md:rounded-[40px] shadow-2xl overflow-hidden transform transition-all duration-500 ease-out scale-95 opacity-0">

                <div class="flex flex-col">
                    <img src="data:image/jpeg;base64,{{ base64_encode(is_resource($popupImg->imagen_data) ? stream_get_contents($popupImg->imagen_data) : $popupImg->imagen_data) }}" alt="Información Importante"
                        class="w-full h-auto object-cover max-h-[50vh] md:max-h-[600px]">

                    <div class="p-6 md:p-8 text-center">
                        <h3 class="text-base md:text-lg font-black text-slate-800 uppercase tracking-tighter mb-2">
                            Aviso Importante
                        </h3>
                        <p class="text-[11px] md:text-sm text-slate-500 mb-6 font-medium">
                            Lea detenidamente antes de continuar.
                        </p>

                        <button id="modal-confirm-button"
                            class="w-full cursor-pointer py-4 bg-[#233C7E] text-white text-[11px] font-black uppercase tracking-[0.2em] rounded-2xl shadow-lg active:scale-95 transition-all hover:bg-[#1a2d5f]">
                            Entendido, continuar
                        </button>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection
