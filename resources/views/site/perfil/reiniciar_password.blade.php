@extends('site.app')

@section('title', 'Seguridad - Cambio de Clave')

@section('content')
    <div class="bg-slate-50 flex items-center justify-center p-4">
        <div class="max-w-4xl w-full bg-white rounded-[3rem] shadow-2xl shadow-slate-200/60 overflow-hidden border border-slate-400">
            <div class="flex flex-col lg:flex-row">
                <div class="lg:w-5/12 bg-slate-50 p-8 md:p-12 border-b lg:border-b-0 lg:border-r border-slate-100">
                    <div class="inline-flex p-4 bg-white rounded-3xl shadow-sm mb-6">
                        <svg class="w-8 h-8 text-[#233C7E]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                        </svg>
                    </div>
                    <h2 class="text-2xl font-black text-slate-800 tracking-tighter uppercase mb-4">Seguridad</h2>
                    <p class="text-sm font-medium text-slate-500 leading-relaxed mb-8">
                        Su nueva contraseña debe cumplir con los estándares de seguridad establecidos.
                    </p>
                    @if (session('status'))
                        <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 text-xs font-bold rounded-2xl">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="space-y-3">
                        <h3 class="text-[12px] font-black text-[#233C7E] uppercase tracking-[0.2em] mb-4">Requisitos mínimos</h3>

                        <div id="req-length" class="flex items-start gap-3 group transition-opacity duration-300">
                            <div class="icon-container mt-1 w-5 h-5 rounded-full bg-white border-2 border-slate-200 flex items-center justify-center transition-all">
                                <div class="dot w-1.5 h-1.5 rounded-full bg-slate-200"></div>
                            </div>
                            <div>
                                <p class="text-xs font-bold text-slate-400 label-text transition-colors">8 a 15 caracteres</p>
                            </div>
                        </div>
                        <div id="req-caps" class="flex items-start gap-3 group">
                            <div class="icon-container mt-1 w-5 h-5 rounded-full bg-white border-2 border-slate-200 flex items-center justify-center transition-all">
                                <div class="dot w-1.5 h-1.5 rounded-full bg-slate-200"></div>
                            </div>
                            <div>
                                <p class="text-xs font-bold text-slate-400 label-text transition-colors">Mayúsculas y Minúsculas.</p>
                            </div>
                        </div>
                        <div id="req-special" class="flex items-start gap-3 group">
                            <div class="icon-container mt-1 w-5 h-5 rounded-full bg-white border-2 border-slate-200 flex items-center justify-center transition-all">
                                <div class="dot w-1.5 h-1.5 rounded-full bg-slate-200"></div>
                            </div>
                            <div>
                                <p class="text-xs font-bold text-slate-400 label-text transition-colors">Carácter especial</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:w-7/12 p-8 md:p-12 self-center">
                    <form action="{{ route('usuario.clave.update') }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT') 
                        <div class="space-y-2">
                            <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest ml-1">Clave Actual:</label>
                            <div class="relative">
                                <input type="password" name="current_password" id="current_password" required class="w-full px-5 py-4 bg-white border-2 @error('current_password') border-red-500 @else border-slate-300 @enderror rounded-2xl focus:border-[#233C7E] focus:ring-4 focus:ring-blue-500/10 outline-none transition-all pr-12 text-slate-700">
                                <button type="button" tabindex="-1" class="toggle-password-btn absolute inset-y-0 right-4 flex items-center text-slate-400 hover:text-[#233C7E]" data-input-id="current_password">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                                </button>
                            </div>
                            @error('current_password')
                                <p class="text-[12px] text-red-500 font-bold ml-1 text-center">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="space-y-2">
                                <label class="block text-[11px] font-black text-[#233C7E] uppercase tracking-widest ml-1">
                                    Nueva clave:
                                </label>
                                <div class="relative">
                                    <input type="password" name="password" id="password" required class="w-full px-5 py-4 bg-white border-2 @error('password') border-red-500 @else border-slate-300 @enderror rounded-2xl focus:border-[#233C7E] focus:ring-4 focus:ring-blue-500/10 outline-none transition-all pr-12 text-slate-700">
                                    <button type="button" tabindex="-1" class="toggle-password-btn absolute inset-y-0 right-4 flex items-center text-slate-400 hover:text-[#233C7E]" data-input-id="password">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                                    </button>
                                </div>
                                @error('password')
                                    <p class="text-[13px] text-red-500 font-bold ml-1 text-center">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="space-y-2">
                                <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest ml-1">
                                    Confirmar Nueva:
                                </label>
                                <div class="relative">
                                    <input type="password" name="password_confirmation" id="password_confirmation" required class="w-full px-5 py-4 bg-white border-2 border-slate-300 rounded-2xl focus:border-[#233C7E] focus:ring-4 focus:ring-blue-500/10 outline-none transition-all pr-12 text-slate-700">
                                    <button type="button" tabindex="-1" class="toggle-password-btn absolute inset-y-0 right-4 flex items-center text-slate-400 hover:text-[#233C7E]" data-input-id="password_confirmation">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="pt-6 border-t border-slate-100 flex flex-col sm:flex-row gap-4">
                            <a href="{{ route('usuario.perfil') }}" class="flex items-center justify-center gap-2 px-8 py-4 bg-slate-50 hover:bg-slate-100 text-slate-500 text-[11px] font-bold uppercase tracking-[0.2em] rounded-xl border border-slate-200 transition-all active:scale-95">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
                                Volver
                            </a>
                            <button type="submit" id="submit-btn" class="flex-1 py-5 bg-[#233C7E] text-white text-[11px] font-black uppercase tracking-[0.25em] rounded-2xl shadow-xl shadow-blue-900/20 transition-all active:scale-95">
                                Actualizar Ahora
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection