@extends('layouts.auth')

@section('content')
    <div
        class="max-w-4xl mx-auto m-4 bg-white border border-slate-200 rounded-3xl md:rounded-[40px] shadow-2xl overflow-hidden">

        <div class="bg-slate-50 px-6 py-6 md:px-10 md:py-8 border-b border-slate-100">
            <div class="flex flex-col md:flex-row items-center gap-4 md:gap-6 text-center md:text-left">
                <div class="p-3 bg-[#233C7E] rounded-2xl shadow-lg shadow-blue-900/20">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-2xl md:text-3xl font-black text-slate-800 leading-tight tracking-tighter">
                        Requisitos y Normas
                    </h2>
                    <p
                        class="text-sm md:text-lg font-medium text-[#233C7E] uppercase tracking-[0.1em] md:tracking-[0.15em]">
                        Solicitud de Certificación
                    </p>
                </div>
            </div>
        </div>

        <div class="p-6 md:p-10">
            <ul class="space-y-6 md:space-y-8">
                <li class="flex gap-4 md:gap-5 items-start">
                    <span
                        class="flex-shrink-0 w-8 h-8 flex items-center justify-center rounded-full bg-slate-100 text-[#233C7E] text-sm font-black">1</span>
                    <p class="text-slate-700 text-base md:text-lg leading-relaxed">
                        Verificar sus <strong class="text-slate-900">datos personales</strong> detalladamente al momento de
                        registrarse.
                    </p>
                </li>

                <li class="flex gap-4 md:gap-5 items-start">
                    <span
                        class="flex-shrink-0 w-8 h-8 flex items-center justify-center rounded-full bg-slate-100 text-[#233C7E] text-sm font-black">2</span>
                    <p class="text-slate-700 text-base md:text-lg leading-relaxed">
                        En caso de no recibir el correo, verifique su carpeta de <strong
                            class="text-slate-900">spam</strong>.
                    </p>
                </li>

                <li class="flex gap-4 md:gap-5 items-start">
                    <span
                        class="flex-shrink-0 w-8 h-8 flex items-center justify-center rounded-full bg-slate-100 text-[#233C7E] text-sm font-black">3</span>
                    <p class="text-slate-700 text-base md:text-lg leading-relaxed">
                        Debe realizar la solicitud solo si es requerido por algún ente u organismo internacional.
                    </p>
                </li>

                <li class="flex gap-4 md:gap-5 items-start">
                    <span
                        class="flex-shrink-0 w-8 h-8 flex items-center justify-center rounded-full bg-slate-100 text-[#233C7E] text-sm font-black">4</span>
                    <div class="w-full">
                        <p class="text-slate-700 text-base md:text-lg font-medium mb-4">La cantidad de solicitudes
                            autorizadas son:</p>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                            <span
                                class="px-4 py-2 bg-slate-900 text-white rounded-xl text-[10px] md:text-xs font-black tracking-widest border border-slate-700 text-center">UNO
                                (1) DIARIO</span>
                            <span
                                class="px-4 py-2 bg-slate-900 text-white rounded-xl text-[10px] md:text-xs font-black tracking-widest border border-slate-700 text-center">TRES
                                (3) AL MES</span>
                            <span
                                class="px-4 py-2 bg-slate-900 text-white rounded-xl text-[10px] md:text-xs font-black tracking-widest border border-slate-700 text-center">DIEZ
                                (10) AL AÑO</span>
                        </div>
                    </div>
                </li>

                <li
                    class="flex gap-4 md:gap-5 items-start p-4 md:p-6 bg-orange-50 rounded-2xl md:rounded-[24px] border-2 border-orange-100">
                    <span
                        class="flex-shrink-0 w-8 h-8 flex items-center justify-center rounded-full bg-orange-500 text-white text-sm font-black shadow-md">5</span>
                    <p class="text-orange-800 text-base md:text-lg font-black uppercase tracking-tight italic">
                        Evite realizar su trámite a través de gestores.
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
                Volver al panel
            </a>
        </div>
    </div>
@endsection
