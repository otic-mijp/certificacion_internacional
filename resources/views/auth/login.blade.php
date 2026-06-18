@extends('layouts.auth')

@section('content')
    <div class="w-full flex flex-col">
        <main class="flex-grow flex flex-col items-center justify-center px-4 py-8">
            <div
                class="w-full max-w-4xl bg-white rounded-3xl md:rounded-[40px] shadow-[0_32px_64px_-12px_rgba(0,0,0,0.08)] overflow-hidden flex flex-col md:flex-row border border-gray-50">
                <div
                    class="w-full md:w-5/12 bg-[#233C7E] p-8 md:p-12 text-white flex flex-col justify-between relative overflow-hidden">
                    <div class="absolute -left-20 w-64 h-64 bg-white/10 rounded-full blur-3xl hidden sm:block"></div>

                    <div class="relative z-10">
                        <span class="text-[9px] md:text-[10px] font-black uppercase tracking-[0.4em] opacity-60">
                            Portal Oficial
                        </span>
                        <h1 class="text-2xl md:text-3xl font-light leading-tight mt-4 md:mt-6 tracking-tight">
                            Certificación de <br class="hidden md:block">
                            <span class="font-bold text-cyan-100">Antecedentes</span>
                            Penales
                        </h1>

                        <div class="mt-5">
                            <a href="http://172.16.11.83/validacionInter/" target="_blank" rel="noopener noreferrer"
                                class="inline-flex items-center gap-2 text-xs font-semibold text-cyan-200 hover:text-white bg-white/5 hover:bg-white/10 border border-white/10 px-4 py-2 rounded-xl transition-all shadow-sm group">
                                Valide su trámite en línea aquí.
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor"
                                    class="w-3.5 h-3.5 transform group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-transform">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                                </svg>
                            </a>
                        </div>
                    </div>

                    <div class="relative z-10 border-t border-white/10 pt-6 mt-8 md:mt-0 md:pt-8">
                        <p class="text-[10px] font-medium text-cyan-50/70 leading-relaxed uppercase tracking-widest">
                            Trámites <br class="hidden md:block"> Internacionales
                        </p>
                    </div>
                </div>

                <div class="w-full md:w-7/12 p-6 md:p-16 relative bg-white">

                    <div class="absolute top-6 right-6 md:top-8 md:right-10 z-20">
                        <a href="{{ route('consulta.cedula') }}"
                            class="text-[10px] font-bold uppercase tracking-widest text-cyan-700 hover:text-black transition-all border-b-2 border-cyan-100 hover:border-black pb-1 whitespace-nowrap">
                            Registrarse
                        </a>
                    </div>

                    <header class="mb-8 md:mb-12 mt-8 md:mt-0">
                        <h2 class="text-[10px] md:text-xs font-black uppercase tracking-[0.3em] text-gray-400 mb-2">
                            Acceso a usuarios
                        </h2>
                        <div class="h-1 w-8 bg-black"></div>
                    </header>

                    <form method="POST" action="{{ route('login') }}" class="space-y-8 md:space-y-10">
                        @csrf

                        <div class="space-y-1">
                            <label for="email"
                                class="text-[9px] font-black {{ $errors->has('email') ? 'text-red-500' : 'text-gray-400' }} uppercase tracking-widest ml-1 transition-colors">
                                Correo Electrónico
                            </label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" required
                                autofocus placeholder="usuario@correo.gob.ve" autocomplete="off"
                                class="w-full bg-transparent border-b {{ $errors->has('email') ? 'border-red-500' : 'border-gray-400' }} py-2 md:py-3 px-1 text-sm focus:outline-none focus:border-cyan-500 transition-all placeholder:text-gray-400">
                            @error('email')
                                <p class="text-[11px] text-red-500 font-bold mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-1">
                            <label for="password"
                                class="text-[9px] font-black {{ $errors->has('password') ? 'text-red-500' : 'text-gray-400' }} uppercase tracking-widest ml-1 transition-colors">
                                Contraseña
                            </label>
                            <input type="password" name="password" id="password" required placeholder="••••••••"
                                autocomplete="off"
                                class="w-full bg-transparent border-b {{ $errors->has('password') ? 'border-red-500' : 'border-gray-400' }} py-2 md:py-3 px-1 text-sm focus:outline-none focus:border-cyan-500 transition-all placeholder:text-gray-400">
                            @error('password')
                                <p class="text-[11px] text-red-500 font-bold mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-2 flex flex-col items-start justify-center">
                            <label
                                class="text-[9px] font-black {{ $errors->has('g-recaptcha-response') ? 'text-red-500' : 'text-gray-400' }} uppercase tracking-widest ml-1">
                                Verificación de Seguridad
                            </label>

                            <div class="transform scale-90 origin-left sm:scale-100">
                                {!! NoCaptcha::display() !!}
                            </div>

                            @error('g-recaptcha-response')
                                <p class="text-[11px] text-red-500 font-bold mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex flex-col gap-6">
                            <div class="flex flex-col sm:flex-row gap-3 w-full">
                                <button type="submit"
                                    class="group relative w-full cursor-pointer inline-flex items-center justify-center px-10 py-3.5 bg-green-800 text-white text-[11px] font-bold uppercase tracking-[0.2em] rounded-full overflow-hidden transition-all hover:scale-105 active:scale-95 shadow-xl shadow-black/10">
                                    <span class="relative z-10">Entrar</span>
                                    <div
                                        class="absolute inset-0 bg-white/10 translate-y-full group-hover:translate-y-0 transition-transform">
                                    </div>
                                </button>

                                <button type="reset"
                                    class="group relative border border-gray-300 w-full cursor-pointer inline-flex items-center justify-center px-10 py-3.5 bg-white text-black text-[11px] font-bold uppercase tracking-[0.2em] rounded-full overflow-hidden transition-all hover:scale-105 active:scale-95">
                                    <span class="relative z-10">Limpiar</span>
                                </button>
                            </div>

                            <div class="flex flex-col gap-3 text-center md:text-left">
                                <a href="{{ route('recuperar.clave') }}"
                                    class="text-[9px] text-gray-400 hover:text-cyan-600 uppercase tracking-widest font-bold transition-colors">
                                    ¿Olvidó su clave de acceso?
                                </a>
                                <a href="{{ route('recuperar.usuario') }}"
                                    class="text-[9px] text-gray-400 hover:text-cyan-600 uppercase tracking-widest font-bold transition-colors">
                                    ¿Olvidó sus datos?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <a href="{{ route('requisitos') }}"
                class="mt-8 inline-flex items-center gap-2 px-4 py-2 text-xs md:text-sm font-bold text-slate-700 uppercase tracking-wide border-b-2 border-transparent hover:text-[#233C7E] hover:border-[#233C7E] transition-all duration-300 group">
                <svg class="w-5 h-5 text-slate-500 group-hover:text-[#233C7E] transition-colors" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                    </path>
                </svg>
                Requisitos y normas
            </a>
        </main>
    </div>

    @if ($popupImg)
        <section id="modal-container"
            class="fixed inset-0 z-50 flex items-center justify-center p-4 opacity-0 pointer-events-none transition-opacity duration-500 ease-out">
            <div id="modal-backdrop" class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm"></div>
            <div id="modal-content"
                class="relative w-full max-w-lg bg-white rounded-3xl md:rounded-[40px] shadow-2xl overflow-hidden transform transition-all duration-500 ease-out scale-95 opacity-0">
                <div class="flex flex-col">

                    <div
                        class="w-full bg-slate-50 flex items-center justify-center overflow-hidden max-h-[40vh] md:max-h-[450px]">
                        <img src="data:image/jpeg;base64,{{ base64_encode(is_resource($popupImg->imagen_data) ? stream_get_contents($popupImg->imagen_data) : $popupImg->imagen_data) }}"
                            alt="Información importante" class="w-full h-full object-contain">
                    </div>

                    <div class="p-6 md:p-8 text-center">
                        <h3 class="text-base md:text-lg font-black text-slate-800 uppercase tracking-tighter mb-2">Aviso
                            Importante</h3>
                        <p class="text-[11px] md:text-sm text-slate-500 mb-6 font-medium">Lea detenidamente antes de
                            continuar.</p>
                        <button id="modal-confirm-button"
                            class="w-full cursor-pointer py-4 bg-[#233C7E] text-white text-[11px] font-black uppercase tracking-[0.2em] rounded-2xl shadow-lg active:scale-95 transition-all hover:bg-[#1a2d5f]">
                            Entendido, continuar
                        </button>
                    </div>
                </div>
            </div>
        </section>
    @endif
    @push('scripts')
        {!! NoCaptcha::renderJs() !!}
    @endpush
@endsection
