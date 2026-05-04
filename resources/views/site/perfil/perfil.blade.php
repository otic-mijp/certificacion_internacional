@extends('site.app')

@section('title', 'Perfil usuario')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 animate-fade-in">

        <a href="{{ route('usuario.clave') }}"
            class="group relative bg-white border border-slate-200 rounded-[40px] p-8 shadow-xl hover:shadow-2xl transition-all hover:-translate-y-2 overflow-hidden">
            <div
                class="absolute top-0 right-0 w-24 h-24 bg-blue-50 rounded-bl-[80px] transition-colors group-hover:bg-[#233C7E]/10">
            </div>

            <div class="relative z-10">
                <div
                    class="inline-flex p-4 bg-slate-50 text-[#233C7E] rounded-3xl mb-6 group-hover:bg-[#233C7E] group-hover:text-white transition-all">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                    </svg>
                </div>
                <h3 class="text-xl font-black text-slate-800 uppercase tracking-tighter mb-2">Cambio de Clave</h3>
                <p class="text-sm font-medium text-slate-500 leading-relaxed">
                    Actualice su contraseña siguiendo los requisitos de seguridad del sistema.
                </p>
                <div class="mt-6 flex items-center gap-2 text-[10px] font-black text-[#233C7E] uppercase tracking-widest">
                    Gestionar clave
                    <svg class="w-4 h-4 transform group-hover:translate-x-2 transition-transform" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M13 7l5 5m0 0l-5 5m5-5H6" stroke-width="3" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </div>
            </div>
        </a>

        <a href="{{ route('usuario.email') }}"
            class="group relative bg-white border border-slate-200 rounded-[40px] p-8 shadow-xl hover:shadow-2xl transition-all hover:-translate-y-2 overflow-hidden">
            <div
                class="absolute top-0 right-0 w-24 h-24 bg-orange-50 rounded-bl-[80px] transition-colors group-hover:bg-orange-100">
            </div>

            <div class="relative z-10">
                <div
                    class="inline-flex p-4 bg-slate-50 text-orange-600 rounded-3xl mb-6 group-hover:bg-orange-600 group-hover:text-white transition-all">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.206" />
                    </svg>
                </div>
                <h3 class="text-xl font-black text-slate-800 uppercase tracking-tighter mb-2">Cambio de Correo</h3>
                <p class="text-sm font-medium text-slate-500 leading-relaxed">
                    Modifique su dirección de contacto. Recuerde usar exclusivamente Gmail.
                </p>
                <div class="mt-6 flex items-center gap-2 text-[10px] font-black text-orange-600 uppercase tracking-widest">
                    Actualizar correo
                    <svg class="w-4 h-4 transform group-hover:translate-x-2 transition-transform" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M13 7l5 5m0 0l-5 5m5-5H6" stroke-width="3" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </div>
            </div>
        </a>

        <a href="{{ route('usuario.preguntas') }}"
            class="group relative bg-white border border-slate-200 rounded-[40px] p-8 shadow-xl hover:shadow-2xl transition-all hover:-translate-y-2 overflow-hidden">
            <div
                class="absolute top-0 right-0 w-24 h-24 bg-emerald-50 rounded-bl-[80px] transition-colors group-hover:bg-emerald-100">
            </div>

            <div class="relative z-10">
                <div
                    class="inline-flex p-4 bg-slate-50 text-emerald-600 rounded-3xl mb-6 group-hover:bg-emerald-600 group-hover:text-white transition-all">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-black text-slate-800 uppercase tracking-tighter mb-2">Preguntas Secretas</h3>
                <p class="text-sm font-medium text-slate-500 leading-relaxed">
                    Configure o valide sus preguntas para recuperar el acceso a su cuenta.
                </p>
                <div class="mt-6 flex items-center gap-2 text-[10px] font-black text-emerald-600 uppercase tracking-widest">
                    Configurar preguntas
                    <svg class="w-4 h-4 transform group-hover:translate-x-2 transition-transform" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M13 7l5 5m0 0l-5 5m5-5H6" stroke-width="3" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </div>
            </div>
        </a>

    </div>
@endsection
