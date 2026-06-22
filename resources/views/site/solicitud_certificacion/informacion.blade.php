@extends('site.app')

@section('title', 'Informacion | Certificación Internacional MPPRIJP - VE')

@section('content')
    <div class="max-w-3xl mx-auto px-4  font-sans antialiased text-gray-700">

        <!-- CABECERA: INFORMACIÓN -->
        <div class="flex items-center gap-4  bg-slate-50">
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

        <!-- TARJETA: HORARIOS Y LÍMITES -->
        <div class="p-4 sm:p-8 md:p-12 max-w-2xl mx-auto">
            <div
                class="group p-5 sm:p-8 rounded-2xl border border-slate-200 bg-white hover:border-blue-100 hover:bg-blue-50/30 transition-all duration-300 shadow-sm">
                <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4 sm:gap-6">

                    <div
                        class="w-14 h-14 sm:w-16 sm:h-16 rounded-2xl bg-slate-50 flex items-center justify-center text-2xl sm:text-3xl shadow-sm group-hover:scale-110 transition-transform duration-300 shrink-0">
                        📊
                    </div>

                    <div class="flex-1 text-slate-600 leading-relaxed text-sm sm:text-base md:text-lg w-full">
                        <p class="font-bold text-slate-800 text-base sm:text-lg mb-2 sm:mb-1">Límite de trámites:</p>

                        <ul class="list-disc pl-5 text-slate-600 space-y-1.5 sm:space-y-1">
                            <li><span class="text-slate-900 font-semibold">Por día:</span> Máximo 1 trámite.</li>
                            <li><span class="text-slate-900 font-semibold">Al mes:</span> Hasta 3 trámites.</li>
                            <li><span class="text-slate-900 font-semibold">Al año:</span> Hasta 10 trámites.</li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>

        <!-- SECCIÓN: APOSTILLA -->
        <section id="apostilla" class="mb-12 scroll-mt-6">
            <h3 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">
                Trámite de Apostilla
            </h3>
            <div class="text-base md:text-lg leading-relaxed text-gray-600">
                <p class="mb-4 text-gray-700">
                    Si requiere que su documento tenga validez internacional, asegúrese de seguir estos pasos al realizar su
                    solicitud:
                </p>
                <ul class="list-disc pl-5 space-y-3">
                    <li>
                        Seleccione <strong class="text-gray-950 font-semibold">SÍ</strong> en la opción <span
                            class="italic font-medium text-gray-800">"¿Desea apostillar?"</span> para activar el proceso
                        institucional.
                    </li>
                    <li>
                        Una vez procesada, la apostilla se enviará automáticamente a su correo electrónico en un plazo de
                        <strong class="text-gray-950 font-semibold">XX días hábiles</strong>.
                    </li>
                </ul>
            </div>
        </section>

        <hr class="border-gray-200 my-8" />

        <!-- SECCIÓN: CASOS ESPECIALES / INCIDENCIAS -->
        <section class="space-y-6">
            <h3 class="text-2xl font-bold text-gray-900 tracking-tight">
                Casos Especiales y Soporte
            </h3>

            <!-- Tarjeta de Incidencia: Error del Sistema -->
            <div class="bg-rose-50/60 border border-rose-200 rounded-xl p-5 md:p-6">
                <div class="flex items-start gap-3">
                    <svg class="w-6 h-6 text-rose-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                    <div>
                        <h4 class="text-lg font-semibold text-rose-900 mb-2">
                            ¿Aparece el mensaje "Ha ocurrido un inconveniente"?
                        </h4>
                        <p class="text-sm md:text-base text-rose-800 leading-relaxed">
                            Si el sistema muestra este error al intentar generar el certificado, debe acudir presencialmente
                            a la <strong class="font-semibold text-rose-950">Coordinación de Antecedentes Penales</strong>
                            para gestionar su solicitud de manera directa.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Tarjeta: Menores de Edad -->
            <div class="bg-amber-50/60 border border-amber-200 rounded-xl p-5 md:p-6">
                <div class="flex items-start gap-3">
                    <svg class="w-6 h-6 text-amber-600 shrink-0 mt-0.5" fill="none" stroke="currentColor"
                        stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 009 11a13.916 13.916 0 00-1.743-6.942m4.366 11.657c1.744-2.772 2.753-6.054 2.753-9.571s-1.009-6.799-2.753-9.571m0 19.142a15.921 15.921 0 003.44-2.04l.054-.09M12 11V3c1.933 0 3.5 1.567 3.5 3.5S13.933 10 12 11z" />
                    </svg>
                    <div>
                        <h4 class="text-lg font-semibold text-amber-900 mb-2">
                            Solicitud para Menores de Edad
                        </h4>
                        <p class="text-sm md:text-base text-amber-800 leading-relaxed mb-4">
                            Para tramitar el certificado de un menor de edad, el representante debe dirigirse a la <strong
                                class="font-semibold text-amber-950">Coordinación de Antecedentes Penales</strong>
                            presentando los siguientes requisitos:
                        </p>

                        <!-- Lista de requisitos -->
                        <ul class="list-disc pl-5 space-y-1.5 text-sm md:text-base text-amber-900 mb-4 font-medium">
                            <li>Cédula o partida de nacimiento del menor.</li>
                            <li>Cédula del representante legal.</li>
                            <li>Carta explicativa.</li>
                        </ul>

                        <!-- Nota de ubicación unificada -->
                        <p class="text-xs md:text-sm text-amber-700 italic border-t border-amber-200/60 pt-3 mt-2">
                            Nota: Si desconoce la ubicación exacta de esta oficina, puede asistir a la sede principal del
                            MPPRIJP para recibir orientación y mayor información.
                        </p>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection
