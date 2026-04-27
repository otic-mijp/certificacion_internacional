@extends('site.app')

@section('title', 'Registro - Configurar Seguridad')

@section('content')
<div class="bg-slate-50 flex items-center justify-center p-4">
    <div class="max-w-6xl w-full bg-white rounded-[3rem] shadow-2xl shadow-slate-200/60 overflow-hidden border border-slate-100">
        
        <div class="flex flex-col lg:flex-row">
            <div class="lg:w-1/3 bg-slate-50 p-8 md:p-12 border-b lg:border-b-0 lg:border-r border-slate-100">
                <div class="inline-flex p-3 bg-white rounded-2xl shadow-sm mb-6">
                    <svg class="w-6 h-6 me-2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Preguntas actuales:
                </div>
                <h3 class="text-xl font-bold text-slate-800 mb-2">Configuración Actual</h3>
                <p class="text-sm text-slate-500 mb-8">Estos son los datos que tienes registrados actualmente en el sistema.</p>

                <div class="space-y-6">
                    <div class="relative pl-6 border-l-2 border-blue-200">
                        <span class="absolute -left-[9px] top-0 w-4 h-4 bg-blue-500 rounded-full border-4 border-slate-50"></span>
                        <p class="text-[10px] font-black text-blue-600 uppercase tracking-widest mb-1">Pregunta 1</p>
                        <p class="text-sm font-bold text-slate-700">¿Nombre de su primera mascota?</p>
                        <p class="text-xs text-slate-400 mt-1 italic italic">********</p>
                    </div>

                    <div class="relative pl-6 border-l-2 border-slate-200">
                        <span class="absolute -left-[9px] top-0 w-4 h-4 bg-slate-300 rounded-full border-4 border-slate-50"></span>
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Pregunta 2</p>
                        <p class="text-sm font-bold text-slate-700">¿Ciudad donde nació su madre?</p>
                        <p class="text-xs text-slate-400 mt-1 italic">********</p>
                    </div>
                </div>
            </div>

            <div class="lg:w-2/3 p-8 md:p-12">
                <div class="mb-10">
                    <h2 class="text-2xl font-black text-slate-800 tracking-tighter uppercase">Actualizar Seguridad</h2>
                    <p class="text-sm font-medium text-slate-400 mt-1">Complete los campos para establecer nuevas preguntas.</p>
                </div>

                <form action="#" method="POST" class="space-y-8">
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="space-y-6">
                            <div class="space-y-3">
                                <label class="block text-[10px] font-black text-[#233C7E] uppercase tracking-widest ml-1">Nueva Pregunta 1</label>
                                <select name="pregunta_1_id" required
                                    class="w-full px-4 py-4 bg-slate-50 border-2 border-slate-100 rounded-2xl text-sm font-bold text-slate-700 focus:ring-4 focus:ring-blue-500/5 focus:border-[#233C7E] outline-none transition-all">
                                    <option value="">Seleccione...</option>
                                    <option value="1">Nombre de su primera mascota</option>
                                    </select>
                            </div>

                            <div class="space-y-3">
                                <label class="block text-[10px] font-black text-[#233C7E] uppercase tracking-widest ml-1">Nueva Pregunta 2</label>
                                <select name="pregunta_2_id" required
                                    class="w-full px-4 py-4 bg-slate-50 border-2 border-slate-100 rounded-2xl text-sm font-bold text-slate-700 focus:ring-4 focus:ring-blue-500/5 focus:border-[#233C7E] outline-none transition-all">
                                    <option value="">Seleccione...</option>
                                    <option value="4">Color favorito de su infancia</option>
                                    </select>
                            </div>
                        </div>

                        <div class="space-y-6">
                            <div class="space-y-3">
                                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Nueva Respuesta 1</label>
                                <input type="text" name="respuesta_1" required placeholder="Defina su respuesta"
                                    class="w-full px-6 py-4 bg-slate-50 border-2 border-slate-100 rounded-2xl focus:bg-white focus:border-[#233C7E] outline-none transition-all">
                            </div>

                            <div class="space-y-3">
                                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Nueva Respuesta 2</label>
                                <input type="text" name="respuesta_2" required placeholder="Defina su respuesta"
                                    class="w-full px-6 py-4 bg-slate-50 border-2 border-slate-100 rounded-2xl focus:bg-white focus:border-[#233C7E] outline-none transition-all">
                            </div>
                        </div>
                    </div>

                    <div class="pt-6 flex flex-col md:flex-row gap-4">
                        <button type="submit"
                            class="flex-1 py-5 bg-[#233C7E] text-white text-[11px] font-black uppercase tracking-[0.2em] rounded-2xl shadow-xl shadow-blue-900/20 hover:bg-slate-900 transition-all active:scale-[0.97]">
                            Guardar Cambios de Seguridad
                        </button>
                        <a href="javascript:history.back()"
                            class="flex items-center justify-center px-10 py-5 text-slate-400 text-[10px] font-black uppercase tracking-widest hover:text-slate-600 transition-all">
                            Descartar
                        </a>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection