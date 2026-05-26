@extends('layouts.auth')

@section('content')
    <div class="max-w-4xl mx-auto m-4 bg-white border border-slate-300 rounded-3xl md:rounded-[40px]  overflow-hidden">

        <div class="bg-slate-50 px-6 py-6 md:px-10 md:py-8 border-b border-slate-100">
            <div class="flex flex-col md:flex-row items-center gap-4 md:gap-6 text-center md:text-left">
                <div class="p-3 bg-[#233C7E] rounded-2xl shadow-lg shadow-blue-900/20">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-2xl md:text-3xl font-black text-slate-800 leading-tight tracking-tighter">
                        Requisitos y Normas
                    </h2>
                    <p class="text-sm md:text-lg font-medium text-[#233C7E] uppercase tracking-[0.1em] md:tracking-[0.15em]">
                        Solicitud de Certificación
                    </p>
                </div>
            </div>
        </div>

        <div class="p-6 md:p-10">
            <ul class="space-y-6 md:space-y-8">

                <li class="flex gap-4 md:gap-5 items-start">
                    <span class="flex-shrink-0 w-8 h-8 flex items-center justify-center rounded-full bg-slate-100 text-[#233C7E] text-sm font-black select-none">1</span>
                    <p class="text-slate-700 text-base md:text-lg leading-relaxed pt-0.5">
                        Verificar sus <strong class="text-slate-900 font-semibold">datos personales</strong> detalladamente
                        al momento de registrarse.
                    </p>
                </li>

                <li class="flex gap-4 md:gap-5 items-start">
                    <span class="flex-shrink-0 w-8 h-8 flex items-center justify-center rounded-full bg-slate-100 text-[#233C7E] text-sm font-black select-none">2</span>
                    <p class="text-slate-700 text-base md:text-lg leading-relaxed pt-0.5">
                        En caso de no recibir el correo de registro, verifique su carpeta de <strong
                            class="text-slate-900 font-semibold">correo no deseado (spam)</strong>.
                    </p>
                </li>

                <li class="flex gap-4 md:gap-5 items-start">
                    <span class="flex-shrink-0 w-8 h-8 flex items-center justify-center rounded-full bg-slate-100 text-[#233C7E] text-sm font-black select-none">3</span>
                    <div class="w-full pt-0.5">
                        <p class="text-slate-700 text-base md:text-lg font-medium mb-3">
                            La cantidad de solicitudes autorizadas <span class="font-semibold text-slate-900">es</span>:
                        </p>
                      
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 max-w-md">
                            <span class="px-4 py-2.5 bg-slate-900 text-white rounded-xl text-xs font-bold tracking-wider text-center shadow-sm">
                                TRES (3) AL MES
                            </span>
                            <span class="px-4 py-2.5 bg-slate-900 text-white rounded-xl text-xs font-bold tracking-wider text-center shadow-sm">
                                DIEZ (10) AL AÑO
                            </span>
                        </div>
                    </div>
                </li>

                <li
                    class="flex gap-4 md:gap-5 items-start p-4 md:p-5 bg-orange-50/70 rounded-2xl border border-orange-200 shadow-sm transition-all">
                    <span
                        class="flex-shrink-0 w-8 h-8 flex items-center justify-center rounded-full bg-orange-600 text-white text-sm font-black shadow-sm select-none">4</span>
                    <p class="text-orange-900 text-base md:text-lg font-bold tracking-tight pt-0.5">
                        Evite realizar su trámite a través de gestores o terceros.
                    </p>
                </li>
            </ul>
        </div>

        <div class="px-6 pb-8 md:px-10 md:pb-12">
            <a href="{{ url('/') }}"
                class="flex items-center justify-center gap-3 w-full py-4 md:py-5 bg-white border-2 border-slate-200 text-slate-500 text-xs md:text-sm font-black uppercase tracking-[0.15em] md:tracking-[0.25em] rounded-2xl md:rounded-[20px] shadow-sm hover:bg-slate-50 hover:text-slate-800 hover:border-slate-400 transition-all active:scale-[0.98]">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Volver al ingreso
            </a>
        </div>
    </div>
@endsection
