@extends('site.app')

@section('title', 'Solicitud de Certificación de Antecedentes Penales')

@section('content')
    <article class="max-w-6xl mx-auto px-4 py-8">
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
            <div>
                <h2 class="text-2xl font-black text-slate-800 tracking-tight uppercase">Mis Trámites</h2>
                <p class="text-slate-500 text-xs font-bold uppercase tracking-widest mt-1">Historial y Descargas</p>
            </div>
        </div>

        <section class="bg-white rounded-[2.5rem] shadow-xl shadow-slate-200/50 border border-slate-200 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50/50 border-b border-slate-200">
                            <th class="px-6 py-5 text-[10px] font-black text-slate-600 uppercase tracking-[0.2em]">Nro.
                                Trámite</th>
                            <th class="px-6 py-5 text-[10px] font-black text-slate-600 uppercase tracking-[0.2em]">Estatus
                            </th>
                            <th class="px-6 py-5 text-[10px] font-black text-slate-600 uppercase tracking-[0.2em]">Fecha
                            </th>
                            <th class="px-6 py-5 text-[10px] font-black text-slate-600 uppercase tracking-[0.2em]">
                                Documentos</th>
                            <th class="px-6 py-5 text-[10px] font-black text-slate-600 uppercase tracking-[0.2em]">
                                Observación</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        <tr class="hover:bg-slate-50/50 transition-colors group">
                            <td class="px-6 py-5">
                                <span class="text-xs font-bold text-slate-700 tracking-tight">10220267663079</span>
                            </td>
                            <td class="px-6 py-5">
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full bg-green-100 text-green-700 text-[10px] font-black uppercase tracking-wide">
                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Aprobado
                                </span>
                            </td>
                            <td class="px-6 py-5">
                                <span class="text-xs font-medium text-slate-500">2026-04-23</span>
                            </td>
                            <td class="px-6 py-5">
                                <div class="flex items-center gap-2">
                                    <a href="#"
                                        class="flex items-center gap-1.5 px-3 py-1.5 bg-blue-50 text-[#233C7E] rounded-lg text-[10px] font-bold uppercase transition-all hover:bg-[#233C7E] hover:text-white group-hover:shadow-md">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                        </svg>
                                        Comprobante
                                    </a>
                                    <a href="#"
                                        class="flex items-center gap-1.5 px-3 py-1.5 bg-slate-100 text-slate-700 rounded-lg text-[10px] font-bold uppercase transition-all hover:bg-slate-800 hover:text-white">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                        </svg>
                                        Certificado
                                    </a>
                                </div>
                            </td>
                            <td class="px-6 py-5">
                                <span class="text-[10px] font-bold text-slate-400 italic">No aplica</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
        <section class="mt-8 p-6 bg-blue-50 rounded-[2rem] border border-blue-100 flex gap-4 shadow-sm">
            <div class="text-2xl">💡</div>
            <div>
                <h4 class="text-xs font-black text-[#274294] uppercase tracking-[0.1em] mb-2">
                    Nota Importante para la Impresión
                </h4>
                <ul
                    class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-1 text-[11px] text-slate-600 font-medium list-disc ml-4">
                    <li>Papel Bond Blanco (Tamaño Carta)</li>
                    <li>Impresión en Escala de Grises</li>
                    <li>Hoja limpia, sin arrugas ni enmiendas</li>
                    <li>Sin tachaduras ni marcas adicionales</li>
                </ul>
            </div>
        </section>
    </article>
@endsection
