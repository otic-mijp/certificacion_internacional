@extends('layouts.auth')

@section('content')
    <article class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-slate-50">
        <div
            class="w-full max-w-5xl bg-white shadow-2xl rounded-[2rem] overflow-hidden border border-slate-200 animate-fade-up">

            <section class="bg-emerald-50 px-8 py-10 text-center border-b border-emerald-100">
                <div class="inline-flex p-4 bg-white rounded-3xl shadow-sm mb-6">
                    <svg class="w-10 h-10 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h2 class="text-2xl font-black text-slate-800 tracking-tighter mb-2">
                    ¡Registro Exitoso!
                </h2>
                <p class="text-sm font-medium text-slate-500 leading-relaxed px-4">
                    Tome nota de sus datos de acceso. Le recomendamos cambiar su clave al iniciar sesión por primera vez.
                </p>
            </section>

            <section class="p-10 space-y-6">
                <div class="space-y-4">
                    <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100">
                        <span class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">
                            Correo Electrónico
                        </span>
                        <span class="text-lg font-bold text-slate-700 break-all">jesusvilla1203@gmail.com</span>
                    </div>

                    <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100 relative group">
                        <span class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">
                            Clave Temporal
                        </span>
                        <div class="flex items-center justify-between">
                            <span class="text-xl font-mono font-black text-[#233C7E] tracking-wider">qldSXKwd</span>
                            <button class="text-slate-400 hover:text-[#233C7E] transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <section class="pt-4 space-y-3">
                    <a href="/login"
                        class="flex items-center justify-center w-full py-5 bg-[#233C7E] text-white text-[11px] font-black uppercase tracking-[0.25em] rounded-2xl shadow-lg shadow-blue-900/20 hover:bg-slate-900 transition-all active:scale-95">
                        Ir al Inicio de Sesión
                    </a>
                </section>
            </section>
        </div>
        </article>
    @endsection
