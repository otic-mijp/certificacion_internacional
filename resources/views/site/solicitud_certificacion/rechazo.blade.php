@extends('site.app')

@section('title', 'Verificar información usuario')

@section('content')
    <section
        class="bg-white rounded-[2.5rem] shadow-xl shadow-slate-200/50 border border-slate-200 overflow-hidden p-8 md:p-12 text-center max-w-2xl mx-auto my-8">
        <div
            class="w-16 h-16 bg-rose-100 rounded-full flex items-center justify-center text-rose-600 mx-auto mb-6 shadow-inner">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
        </div>

        <h3 class="text-lg font-black text-slate-800 uppercase tracking-tight mb-2">
            Ha ocurrido un inconveniente
        </h3>

        <p class="text-slate-500 text-xs font-semibold uppercase tracking-wider mb-6">
            Acción requerida por el usuario
        </p>



        <p class="text-slate-600 text-xs md:text-sm font-medium leading-relaxed max-w-md mx-auto mb-8 text-center px-4">
            Por favor, diríjase a la <span class="text-slate-800 font-black tracking-tight uppercase text-[11px] md:text-xs">
                Coordinación de Antecedentes Penales</span>
                Ubicada en el Distrito capital para recibir atención personalizada.
            <span class="block mt-2 text-slate-500 font-normal">
                Si desconoce su ubicación exacta, asista a la sede principal del
                <a target="_blank" href="https://maps.app.goo.gl/UWptEuSGqvLanmjTA" title="Ubicacion en mapa"
                    class="text-blue-600 font-black tracking-wide hover:underline animate-pulse">MPPRIJP</a> para mayor información.
            </span>
        </p>

    </section>
@endsection
