@extends('site.app')

@section('title', 'Perfil usuario')

@section('content')
    <div class="max-w-5xl mx-auto animate-fade-in">
        <div class="mb-10 flex flex-col md:flex-row md:items-end justify-between gap-4">
            <div>
                <h2 class="text-5xl font-black text-[#233C7E] tracking-tighter uppercase">Mi Perfil</h2>
                <p class="text-lg text-slate-500 font-medium italic">Gestione su información personal y seguridad.</p>
            </div>
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-emerald-50 border border-emerald-100 rounded-2xl">
                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                <span class="text-[10px] font-black text-emerald-700 uppercase tracking-widest">Usuario Activo</span>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <div class="lg:col-span-1 space-y-6">
                <div class="bg-white border border-slate-200 rounded-[40px] shadow-xl p-8 text-center">
                    <div class="relative inline-block mb-6">
                        <div
                            class="w-32 h-32 bg-slate-100 rounded-[32px] flex items-center justify-center border-4 border-slate-50 shadow-inner">
                            <svg class="w-16 h-16 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <div class="absolute -bottom-2 -right-2 bg-[#233C7E] p-2 rounded-xl shadow-lg">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"
                                    stroke-width="2" />
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-xl font-black text-slate-800 uppercase tracking-tight">Pedro perez</h3>
                    <p class="text-sm font-bold text-[#233C7E] tracking-widest uppercase">V-12.345.678</p>
                </div>

                <div class="bg-slate-900 rounded-[32px] p-8 text-white">
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-4">¿Necesita Ayuda?</p>
                    <p class="text-sm leading-relaxed mb-6 text-slate-300">Si desea corregir algún dato personal, debe
                        dirigirse a la sede principal de la institución.</p>
                    <a href="#"
                        class="block w-full py-3 bg-white/10 hover:bg-white/20 rounded-xl text-center text-[10px] font-black uppercase tracking-widest transition-all">Soporte
                        Técnico</a>
                </div>
            </div>

            <div class="lg:col-span-2 space-y-8">
                <div class="bg-white border border-slate-200 rounded-[40px] shadow-2xl overflow-hidden">
                    <div class="bg-slate-50 px-10 py-6 border-b border-slate-100">
                        <h4 class="text-sm font-black text-slate-800 uppercase tracking-[0.2em]">Datos Registrados</h4>
                    </div>
                    <div class="p-10">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div>
                                <label
                                    class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Correo
                                    Principal</label>
                                <p class="text-lg font-bold text-slate-700">pperez@gmail.com</p>
                            </div>
                            <div>
                                <label
                                    class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Fecha
                                    de Registro</label>
                                <p class="text-lg font-bold text-slate-700">24 de Abril, 2024</p>
                            </div>
                            <div>
                                <label
                                    class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Pregunta
                                    de Seguridad 1</label>
                                <p class="text-lg font-bold text-slate-700 italic text-slate-500">¿Segundo apellido del
                                    padre?</p>
                            </div>
                            <div>
                                <label
                                    class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Pregunta
                                    de Seguridad 2</label>
                                <p class="text-lg font-bold text-slate-700 italic text-slate-500">¿País que desea conocer?
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white border border-slate-200 rounded-[40px] shadow-xl overflow-hidden">
                    <div class="p-10 flex flex-col md:flex-row items-center justify-between gap-6">
                        <div class="flex items-center gap-4 text-center md:text-left">
                            <div class="p-4 bg-red-50 text-red-500 rounded-2xl">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-black text-slate-800">Seguridad de la Cuenta</h4>
                                <p class="text-sm text-slate-500">Cambie su contraseña periódicamente.</p>
                            </div>
                        </div>
                        <button
                            class="w-full md:w-auto px-10 py-4 bg-[#233C7E] text-white text-[11px] font-black uppercase tracking-[0.2em] rounded-2xl hover:bg-slate-900 transition-all shadow-lg shadow-blue-900/20">
                            Cambiar Contraseña
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
