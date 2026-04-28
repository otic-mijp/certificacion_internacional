@extends('site.app')

@section('title', 'Solicitud de Certificación de Antecedentes Penales')

@section('content')
    <div class="flex items-center justify-center p-2 md:p-6 bg-slate-50">
        <div class="max-w-5xl w-full">
            <div class="bg-white rounded-3xl shadow-sm border border-slate-200 overflow-hidden">
                <div class="bg-slate-50 px-6 py-5 border-b border-slate-100 flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <div class="p-2.5 bg-white border border-slate-200 rounded-xl shadow-sm text-slate-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-base font-black uppercase text-slate-800 tracking-tight">Nueva Solicitud</h1>
                            <p class="text-[11px] font-bold text-slate-400 uppercase tracking-[0.2em]">Registro de
                                Certificación</p>
                        </div>
                    </div>
                </div>
                <form action="#" method="POST" class="p-6 md:p-10">
                    @csrf
                    <div class="mb-10">
                        <div class="flex items-center gap-2 mb-6 border-b border-slate-100 pb-3">
                            <h2 class="text-xs font-black text-slate-600 uppercase tracking-[0.2em]">01. Información del
                                Titular</h2>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                            <div class="space-y-2">
                                <label
                                    class="text-[11px] font-black text-slate-600 uppercase ml-1 tracking-wider">Nombres</label>
                                <input type="text" value="Pedro Jose" readonly
                                    class="w-full px-4 py-3 bg-slate-50/80 border border-slate-200 rounded-xl text-sm font-bold text-slate-500 cursor-not-allowed outline-none">
                            </div>
                            <div class="space-y-2">
                                <label
                                    class="text-[11px] font-black text-slate-600 uppercase ml-1 tracking-wider">Apellidos</label>
                                <input type="text" value="Pérez Pérez" readonly
                                    class="w-full px-4 py-3 bg-slate-50/80 border border-slate-200 rounded-xl text-sm font-bold text-slate-500 cursor-not-allowed outline-none">
                            </div>
                            <div class="space-y-2">
                                <label
                                    class="text-[11px] font-black text-slate-600 uppercase ml-1 tracking-wider">Cédula</label>
                                <input type="text" value="V-00000000" readonly
                                    class="w-full px-4 py-3 bg-slate-50/80 border border-slate-200 rounded-xl text-sm font-bold text-slate-500 cursor-not-allowed outline-none">
                            </div>
                            <div class="space-y-2">
                                <label
                                    class="text-[11px] font-black text-slate-600 uppercase ml-1 tracking-wider">Correo</label>
                                <input type="text" value="usuario@ejemplo.com" readonly
                                    class="w-full px-4 py-3 bg-slate-50/80 border border-slate-200 rounded-xl text-sm font-bold text-slate-500 cursor-not-allowed outline-none">
                            </div>
                        </div>
                    </div>

                    <div class="mb-12">
                        <div class="flex items-center gap-2 mb-6 border-b border-slate-100 pb-3">
                            <h2 class="text-xs font-black text-slate-600 uppercase tracking-[0.2em]">02. Selección del
                                Trámite</h2>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-2">
                                <label for="motivo"
                                    class="text-[11px] font-black text-slate-700 uppercase ml-1 tracking-widest">Motivo de
                                    Solicitud</label>
                                <select id="motivo" name="motivo" required
                                    class="w-full px-4 py-3.5 bg-white border border-slate-300 rounded-xl text-sm font-bold text-slate-800 focus:ring-4 focus:ring-slate-100 focus:border-slate-400 transition-all outline-none">
                                    <option value="">Seleccione el motivo...</option>
                                    <option value="trabajo">Oferta de Trabajo</option>
                                    <option value="estudios">Estudios Internacionales</option>
                                </select>
                            </div>
                            <div class="space-y-2">
                                <label for="pais"
                                    class="text-[11px] font-black text-slate-700 uppercase ml-1 tracking-widest">País de
                                    Destino</label>
                                <select id="pais" name="pais" required
                                    class="w-full px-4 py-3.5 bg-white border border-slate-300 rounded-xl text-sm font-bold text-slate-800 focus:ring-4 focus:ring-slate-100 focus:border-slate-400 transition-all outline-none">
                                    <option value="">Seleccione el país...</option>
                                    <option value="españa">España</option>
                                    <option value="chile">Chile</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col gap-8 pt-8 border-t border-slate-100">
                        <div class="flex flex-col md:flex-row items-center justify-between gap-6">
                            <label class="flex items-center gap-3 cursor-pointer group">
                                <input type="checkbox" required
                                    class="w-6 h-6 rounded border-slate-300 text-slate-800 focus:ring-slate-200 transition-all">
                                <span
                                    class="text-xs font-black text-slate-500 uppercase tracking-tight group-hover:text-slate-700 transition-colors">
                                    He verificado que los datos son correctos
                                </span>
                            </label>

                            <button type="submit"
                                class="w-full md:w-auto px-12 py-4 bg-slate-800 hover:bg-slate-900 text-white text-xs font-black uppercase tracking-[0.25em] rounded-xl transition-all active:scale-95 shadow-xl shadow-slate-200">
                                Confirmar Solicitud
                            </button>
                        </div>

                        <div
                            class="bg-slate-200 p-4 rounded-2xl border border-slate-200 flex justify-center transition-all hover:bg-blue-50/50 hover:border-blue-100">
                            <a href="#" class="group flex items-center gap-3">
                                <div
                                    class="bg-white p-1.5 rounded-full shadow-sm border border-slate-200 group-hover:border-blue-200 transition-colors animate-pulse">
                                    <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>

                                <span
                                    class="text-[11px] font-black text-slate-500 uppercase tracking-wider group-hover:text-slate-700 transition-colors">
                                    ¿Requiere trámite para menores de edad?
                                    <span class="text-blue-600 decoration-2 underline underline-offset-4 ml-1">Haga clic
                                        aquí</span>
                                </span>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
