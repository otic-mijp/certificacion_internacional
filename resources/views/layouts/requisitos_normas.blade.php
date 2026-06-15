@extends('layouts.auth')

@section('content')
    <div
        class="max-w-4xl mx-auto m-6 bg-white border border-slate-100 rounded-3xl md:rounded-[32px] shadow-xl shadow-slate-200/50 overflow-hidden">

        <div class="bg-gradient-to-b from-slate-50 to-white px-6 py-6 md:px-10 md:py-8 border-b border-slate-100">
            <div class="flex flex-col md:flex-row items-center gap-4 md:gap-5 text-center md:text-left">
                <div class="p-3 bg-[#233C7E] rounded-2xl shadow-lg shadow-blue-900/10 text-white">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-2xl md:text-3xl font-black text-slate-800 tracking-tight">
                        Requisitos y normas
                    </h2>
                    <p class="text-xs md:text-sm font-bold text-[#233C7E] uppercase tracking-[0.15em] mt-0.5">
                        Solicitud de Certificación
                    </p>
                </div>
            </div>
        </div>

        <div class="p-6 md:p-10">
            <ul class="space-y-6 md:space-y-8">

                {{-- 1. Datos Personales --}}
                <li class="flex gap-4 md:gap-5 items-start">
                    <span
                        class="flex-shrink-0 w-8 h-8 flex items-center justify-center rounded-full bg-blue-50 text-[#233C7E] text-xs font-black select-none">1</span>
                    <p class="text-slate-600 text-sm md:text-base leading-relaxed pt-1">
                        Verificar sus <strong class="text-slate-900 font-semibold">datos personales</strong> detalladamente
                        al momento de registrarse.
                    </p>
                </li>

                {{-- 2. Correo de Registro / Spam --}}
                <li class="flex gap-4 md:gap-5 items-start">
                    <span
                        class="flex-shrink-0 w-8 h-8 flex items-center justify-center rounded-full bg-blue-50 text-[#233C7E] text-xs font-black select-none">2</span>
                    <p class="text-slate-600 text-sm md:text-base leading-relaxed pt-1">
                        En caso de no recibir el correo de registro, verifique su carpeta de <strong
                            class="text-slate-900 font-semibold">correo no deseado (spam)</strong>.
                    </p>
                </li>

                {{-- 3. Límites de solicitud --}}
                <li class="flex gap-4 md:gap-5 items-start">
                    <span
                        class="flex-shrink-0 w-8 h-8 flex items-center justify-center rounded-full bg-blue-50 text-[#233C7E] text-xs font-black select-none">3</span>
                    <div class="w-full pt-1">
                        <p class="text-slate-600 text-sm md:text-base font-medium mb-3">
                            La cantidad de solicitudes autorizadas es:
                        </p>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 max-w-xl">
                            <div
                                class="px-4 py-2.5 bg-slate-50 border border-slate-200 text-slate-700 rounded-xl text-[10px] font-bold tracking-wider text-center shadow-sm">
                                ⚠️ UNO (1) AL DÍA
                            </div>
                            <div
                                class="px-4 py-2.5 bg-slate-50 border border-slate-200 text-slate-700 rounded-xl text-[10px] font-bold tracking-wider text-center shadow-sm">
                                📅 TRES (3) AL MES
                            </div>
                            <div
                                class="px-4 py-2.5 bg-slate-50 border border-slate-200 text-slate-700 rounded-xl text-[10px] font-bold tracking-wider text-center shadow-sm">
                                📊 DIEZ (10) AL AÑO
                            </div>
                        </div>
                    </div>
                </li>

                {{-- 4. Costo del Trámite --}}
                <li class="flex gap-4 md:gap-5 items-start">
                    <span
                        class="flex-shrink-0 w-8 h-8 flex items-center justify-center rounded-full bg-blue-50 text-[#233C7E] text-xs font-black select-none">4</span>
                    <p class="text-slate-600 text-sm md:text-base leading-relaxed pt-1">
                        Este trámite es <strong class="text-emerald-600 font-semibold uppercase tracking-wide">totalmente
                            gratuito</strong>.
                    </p>
                </li>

                {{-- 5. No reconoce el correo --}}
                <li class="flex gap-4 md:gap-5 items-start">
                    <span
                        class="flex-shrink-0 w-8 h-8 flex items-center justify-center rounded-full bg-blue-50 text-[#233C7E] text-xs font-black select-none">5</span>
                    <div class="w-full pt-1">
                        <p class="text-slate-600 text-sm md:text-base leading-relaxed">
                            Si no reconoce o no tiene acceso al correo que le muestra el sistema, debe realizar un <strong
                                class="text-slate-900 font-semibold">reseteo de usuario</strong>, para lo cual deberá
                            asistir personalmente a la oficina principal.
                        </p>
                        <div
                            class="mt-3 p-3.5 bg-slate-50 border border-slate-100 rounded-xl max-w-2xl text-slate-500 text-xs md:text-sm leading-relaxed flex items-start gap-2">
                            <svg class="w-4 h-4 text-slate-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor"
                                stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span><strong class="text-slate-700 font-medium">Ubicación:</strong> Piso 5 del Edificio París,
                                Plaza La Candelaria, Municipio Libertador, Distrito capital.</span>
                        </div>
                    </div>
                </li>

                {{-- 6. No puede asistir en persona --}}
                <li class="flex gap-4 md:gap-5 items-start">
                    <span
                        class="flex-shrink-0 w-8 h-8 flex items-center justify-center rounded-full bg-blue-50 text-[#233C7E] text-xs font-black select-none">6</span>
                    <div class="w-full pt-1">
                        <p class="text-slate-600 text-sm md:text-base leading-relaxed mb-3">
                            Si no puede asistir personalmente a la oficina principal, podrá acudir un <strong
                                class="text-slate-900 font-semibold">familiar directo</strong> (Madre, Padre, Hijo o Hermano)
                            consignando los siguientes requisitos:
                        </p>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                            <div class="p-3 bg-slate-50/60 border border-slate-100 rounded-xl flex gap-2 items-start">
                                <svg class="w-4 h-4 text-[#233C7E] mt-0.5 flex-shrink-0" fill="none"
                                    stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="text-xs text-slate-600 leading-tight">Copia de la Cédula del <strong
                                        class="font-medium text-slate-800">titular</strong> de la cuenta.</span>
                            </div>
                            <div class="p-3 bg-slate-50/60 border border-slate-100 rounded-xl flex gap-2 items-start">
                                <svg class="w-4 h-4 text-[#233C7E] mt-0.5 flex-shrink-0" fill="none"
                                    stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="text-xs text-slate-600 leading-tight">Copia de la Cédula del <strong
                                        class="font-medium text-slate-800">familiar</strong> autorizado.</span>
                            </div>
                            <div class="p-3 bg-slate-50/60 border border-slate-100 rounded-xl flex gap-2 items-start">
                                <svg class="w-4 h-4 text-[#233C7E] mt-0.5 flex-shrink-0" fill="none"
                                    stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="text-xs text-slate-600 leading-tight">Copia legible de la <strong
                                        class="font-medium text-slate-800">Partida de Nacimiento</strong>.</span>
                            </div>
                        </div>
                    </div>
                </li>

                {{-- Alerta final de Gestores (Se mantiene abajo por jerarquía de prevención) --}}
                <li
                    class="flex gap-4 md:gap-5 items-start p-4 md:p-5 bg-rose-50/60 rounded-2xl border border-rose-100 shadow-sm">
                    <span
                        class="flex-shrink-0 w-8 h-8 flex items-center justify-center rounded-full bg-rose-600 text-white text-xs font-black shadow-sm select-none">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </span>
                    <p class="text-rose-900 text-sm md:text-base font-bold tracking-tight pt-1">
                        Evite realizar su trámite a través de gestores o terceros ajenos a la institución.
                    </p>
                </li>

            </ul>
        </div>

        <div class="px-6 pb-8 md:px-10 md:pb-10">
            <a href="{{ url('/') }}"
                class="flex items-center justify-center gap-2.5 w-full py-4 bg-slate-50 border border-slate-200 text-slate-500 text-xs font-bold uppercase tracking-[0.15em] rounded-xl shadow-sm hover:bg-slate-900 hover:text-white hover:border-slate-900 transition-all duration-200 active:scale-[0.99]">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Volver al ingreso
            </a>
        </div>
    </div>
@endsection
