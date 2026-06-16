@extends('site.app')

@section('title', 'Listado de certificaciones de Antecedentes Penales')

@section('content')
    @php
        use Carbon\Carbon;
    @endphp

    <article class="max-w-6xl mx-auto px-4 py-8">
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
            <div>
                <h2 class="text-2xl font-black text-slate-800 tracking-tight uppercase">Mis Trámites</h2>
                <p class="text-slate-500 text-xs font-bold uppercase tracking-widest mt-1">Historial y Descargas</p>
            </div>
        </div>

        <section class="bg-white rounded-3xl shadow-xl shadow-slate-100/80 border border-slate-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50/70 border-b border-slate-200/80 text-slate-500">
                            <th class="px-6 py-4.5 text-[10px] font-bold uppercase tracking-[0.15em]">Nro. Trámite</th>
                            <th class="px-6 py-4.5 text-[10px] font-bold uppercase tracking-[0.15em]">Estatus</th>
                            <th class="px-6 py-4.5 text-[10px] font-bold uppercase tracking-[0.15em]">Fecha</th>
                            <th class="px-6 py-4.5 text-[10px] font-bold uppercase tracking-[0.15em]">Documentos</th>
                            <th class="px-6 py-4.5 text-[10px] font-bold uppercase tracking-[0.15em]">Apostilla</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-slate-700">
                        @foreach ($listado_tramites as $tramite)
                            <tr class="hover:bg-slate-50/40 transition-colors duration-200">

                                {{-- Nro. Trámite --}}
                                <td class="px-6 py-4.5">
                                    <span class="text-xs font-semibold font-mono text-slate-800 tracking-tight">
                                        {{ $tramite->num_tramite }}
                                    </span>
                                </td>

                                {{-- Estatus --}}
                                <td class="px-6 py-4.5">
                                    @if ($tramite->id_estatus === 1)
                                        <span
                                            class="inline-flex items-center px-2.5 py-1 rounded-full bg-blue-50 text-blue-700 text-[10px] font-bold uppercase tracking-wide">
                                            <span class="w-1.5 h-1.5 rounded-full bg-blue-500 mr-1.5 animate-pulse"></span>
                                            Iniciado
                                        </span>
                                    @elseif ($tramite->id_estatus === 2 || $tramite->id_estatus === 4)
                                        <span
                                            class="inline-flex items-center px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-700 text-[10px] font-bold uppercase tracking-wide">
                                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 mr-1.5"></span>
                                            Procesado
                                        </span>
                                    @elseif ($tramite->id_estatus === 3)
                                        <span
                                            class="inline-flex items-center px-2.5 py-1 rounded-full bg-rose-50 text-rose-700 text-[10px] font-bold uppercase tracking-wide">
                                            <span class="w-1.5 h-1.5 rounded-full bg-rose-500 mr-1.5"></span>
                                            Rechazado
                                        </span>
                                    @endif
                                </td>

                                {{-- Fecha (Tooltip aislado del TR) --}}
                                <td class="px-6 py-4.5">
                                    <div class="relative inline-block group/fecha cursor-help">
                                        <span
                                            class="text-xs font-medium text-slate-500 border-b border-dotted border-slate-300 hover:text-slate-700 transition-colors pb-0.5">
                                            {{ $tramite->created_at->translatedFormat('d \d\e F \d\e Y, h:i A') }}
                                        </span>

                                        <span
                                            class="absolute bottom-full left-1/2 -translate-x-1/2 mb-2.5 hidden group-hover/fecha:flex flex-col items-center pointer-events-none z-10 transition-all duration-200">
                                            <div
                                                class="bg-slate-900/95 backdrop-blur-sm text-white text-[10px] py-1.5 px-3 rounded-lg shadow-xl shadow-slate-900/10 whitespace-nowrap tracking-wide font-medium">
                                                Horario Caracas / Venezuela
                                            </div>
                                            <div class="w-2 h-2 bg-slate-900/95 rotate-45 -mt-1"></div>
                                        </span>
                                    </div>
                                </td>

                                <td class="px-6 py-4.5">

                                    <a target="_blank" href="{{ route('solicitud.pdf.comprobante', $tramite->num_tramite) }}"
                                        class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-slate-100 text-slate-800 rounded-lg text-[10px] font-bold uppercase tracking-wide transition-all duration-200 hover:bg-slate-900 hover:text-white hover:shadow-md hover:shadow-slate-900/10">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.2"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                        </svg>
                                        Comprobante
                                    </a>

                                    @if ($tramite->id_estatus === 3)
                                        <span
                                            class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-slate-50 text-slate-400 rounded-lg text-[10px] font-bold uppercase tracking-wide select-none">
                                            No disponible
                                        </span>
                                    @elseif ($tramite->created_at->addMonths(3)->isFuture())
                                        <a target="_blank" href="{{ route('solicitud.pdf', $tramite->num_tramite) }}"
                                            class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-slate-100 text-slate-800 rounded-lg text-[10px] font-bold uppercase tracking-wide transition-all duration-200 hover:bg-slate-900 hover:text-white hover:shadow-md hover:shadow-slate-900/10">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.2"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                            </svg>
                                            Certificado
                                        </a>
                                    @else
                                        <span
                                            class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-amber-50 text-amber-700 rounded-lg text-[10px] font-bold uppercase tracking-wide">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.2"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 6v6m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            Caducado
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4.5">
                                    @if ($tramite->apostilla)
                                        <span
                                            class="inline-flex items-center px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-700 text-[10px] font-bold uppercase tracking-wide">
                                            Solicitada
                                        </span>
                                    @else
                                        <span
                                            class="inline-flex items-center px-2.5 py-1 rounded-full bg-slate-100 text-slate-500 text-[10px] font-bold uppercase tracking-wide">
                                            No solicitada
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>

        {{-- Paginación limpia fuera del contenedor overflow --}}
        @if ($listado_tramites->hasPages())
            <div class="mt-5 px-2">
                {{ $listado_tramites->links() }}
            </div>
        @endif
        <section class="mt-8 p-6 bg-blue-50 rounded-[2rem] border border-blue-100 flex gap-4 shadow-sm">
            <div class="text-2xl select-none">💡</div>
            <div class="w-full">
                <h4 class="text-xs font-black text-[#274294] uppercase tracking-[0.1em] mb-2">
                    Nota Importante para la Impresión
                </h4>
                <ul
                    class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-1 text-[11px] text-slate-600 font-medium list-disc ml-4">
                    <li>Papel Bond Blanco (Tamaño Carta)</li>
                    <li>Impresión a <strong class="font-bold text-[#274294]">escala de grises o color (opcional)</strong>
                    </li>
                    <li>Hoja limpia, sin arrugas ni enmiendas</li>
                    <li>Sin tachaduras ni marcas adicionales</li>
                </ul>
            </div>
        </section>
    </article>
@endsection
