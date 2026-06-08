@extends('site.app')

@section('title', 'Informacion | Certificación Internacional MPPRIJP - VE')

@section('content')
    <div class="max-w-3xl mx-auto px-4 py-12 font-sans antialiased text-gray-700">

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
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                        </path>
                    </svg>
                    <div>
                        <h4 class="text-lg font-semibold text-rose-900 mb-2">
                            ¿Aparece el mensaje "Ha ocurrido un inconveniente"?
                        </h4>
                        <p class="text-sm md:text-base text-rose-850 leading-relaxed">
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
                            d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 009 11a13.916 13.916 0 00-1.743-6.942m4.366 11.657c1.744-2.772 2.753-6.054 2.753-9.571s-1.009-6.799-2.753-9.571m0 19.142a15.921 15.921 0 003.44-2.04l.054-.09M12 11V3c1.933 0 3.5 1.567 3.5 3.5S13.933 10 12 11z">
                        </path>
                    </svg>
                    <div>
                        <h4 class="text-lg font-semibold text-amber-900 mb-2">
                            Solicitud para Menores de Edad
                        </h4>
                        <p class="text-sm md:text-base text-amber-850 leading-relaxed mb-4">
                            Para tramitar el certificado de un menor de edad, el representante debe dirigirse a la <strong
                                class="font-semibold text-amber-950">Coordinación de Antecedentes Penales</strong>
                            presentando los siguientes requisitos:
                        </p>

                        <!-- Lista de requisitos limpia -->
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
