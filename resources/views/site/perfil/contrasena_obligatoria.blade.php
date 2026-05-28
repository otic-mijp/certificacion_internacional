<!DOCTYPE html>
<html lang="es-ve" class="h-full bg-slate-50">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reinicio de clave obligatorio | MPPRIJP</title>
    <link rel="icon" href="{{ asset('img/logo_pestana.png') }}" sizes="192x192" type="image/png">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="min-h-full flex flex-col text-slate-800 antialiased">

    <!-- HEADER INSTITUCIONAL -->
    <header class="bg-white border-b border-slate-200 shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 py-4 flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="flex flex-col sm:flex-row items-center gap-4 text-center sm:text-left">
                <img src="{{ asset('img/logo_banner.png') }}" alt="Logo Institucional" loading="lazy"
                    class="h-14 w-auto object-contain flex-shrink-0">
                <div class="hidden sm:block h-8 w-px bg-slate-200"></div>
                <div>
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">República Bolivariana de
                        Venezuela</p>
                    <h1 class="text-lg md:text-xl font-extrabold text-[#233C7E] uppercase tracking-tight">
                        Certificación de Antecedentes Penales
                    </h1>
                </div>
            </div>

            <!-- CERRAR SESIÓN UBICADO EN HEADER -->
            <form method="POST" action="{{ route('logout') }}" class="flex-shrink-0">
                @csrf
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"
                    class="inline-flex items-center gap-2 px-4 py-2 bg-slate-100 hover:bg-red-50 border border-slate-200 hover:border-red-200 rounded-xl font-semibold text-xs text-slate-600 hover:text-red-600 uppercase tracking-wider transition-all duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    Cerrar Sesión
                </a>
            </form>
        </div>
    </header>

    <!-- CONTENEDOR PRINCIPAL -->
    <main class="flex-1 flex items-center justify-center p-4 md:p-8">
        <div class="max-w-4xl w-full bg-white rounded-3xl shadow-xl border border-slate-100 overflow-hidden">

            <!-- ALERTA DE ATENCIÓN INTEGRADA AL INICIO -->
            <div class="bg-amber-50 border-b border-amber-200 p-4 sm:p-6 flex items-start gap-4">
                <div class="flex-shrink-0 p-2 bg-amber-100 rounded-xl text-amber-600">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 15c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-sm font-bold text-amber-900 uppercase tracking-wide">¡Atención Requerida!</h3>
                    <p class="mt-1 text-sm text-amber-700 leading-relaxed">
                        El reinicio de contraseña es <span
                            class="font-bold text-red-600 underline decoration-2">obligatorio</span> para poder
                        continuar en el sistema. Hasta que no realice la actualización, no tendrá acceso a las demás
                        funciones.
                    </p>
                </div>
            </div>

            <div class="flex flex-col lg:flex-row">
                <!-- PANEL IZQUIERDO: REQUISITOS -->
                <div class="lg:w-5/12 p-6 sm:p-8 bg-slate-50/50 border-b lg:border-b-0 lg:border-r border-slate-100">
                    <div class="inline-flex p-3 bg-blue-50 border border-blue-100 rounded-2xl text-[#233C7E] mb-5">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                        </svg>
                    </div>

                    <h2 class="text-xl font-extrabold text-slate-800 uppercase tracking-tight mb-2">Seguridad de la
                        Clave</h2>
                    <p class="text-xs font-medium text-slate-500 leading-relaxed mb-6">Su nueva contraseña debe cumplir
                        estrictamente con las siguientes políticas:</p>

                    @if (session('status'))
                        <div
                            class="mb-5 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs font-semibold rounded-xl">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="space-y-3">
                        <h3 class="text-[11px] font-bold text-[#233C7E] uppercase tracking-widest mb-3">Requisitos
                            mínimos</h3>

                        <!-- Requisito 1 -->
                        <div id="req-length"
                            class="flex items-center gap-3 bg-white p-3 rounded-xl border border-slate-200/60 shadow-sm">
                            <div
                                class="icon-container w-5 h-5 rounded-full bg-slate-100 flex items-center justify-center flex-shrink-0">
                                <div class="dot w-1.5 h-1.5 rounded-full bg-slate-400"></div>
                            </div>
                            <span class="text-xs font-semibold text-slate-600">8 a 15 caracteres</span>
                        </div>

                        <!-- Requisito 2 -->
                        <div id="req-caps"
                            class="flex items-center gap-3 bg-white p-3 rounded-xl border border-slate-200/60 shadow-sm">
                            <div
                                class="icon-container w-5 h-5 rounded-full bg-slate-100 flex items-center justify-center flex-shrink-0">
                                <div class="dot w-1.5 h-1.5 rounded-full bg-slate-400"></div>
                            </div>
                            <span class="text-xs font-semibold text-slate-600">Mayúsculas y Minúsculas</span>
                        </div>

                        <!-- Requisito 3 -->
                        <div id="req-special"
                            class="flex items-center gap-3 bg-white p-3 rounded-xl border border-slate-200/60 shadow-sm">
                            <div
                                class="icon-container w-5 h-5 rounded-full bg-slate-100 flex items-center justify-center flex-shrink-0">
                                <div class="dot w-1.5 h-1.5 rounded-full bg-slate-400"></div>
                            </div>
                            <span class="text-xs font-semibold text-slate-600">Al menos 1 carácter especial</span>
                        </div>
                    </div>
                </div>

                <!-- PANEL DERECHO: FORMULARIO -->
                <div class="lg:w-7/12 p-6 sm:p-8 md:p-10">
                    <form action="{{ route('usuario.clave.obligatoria.update') }}" method="POST" class="space-y-5">
                        @csrf
                        @method('PUT')

                        <!-- Clave Actual -->
                        <div class="space-y-1.5">
                            <label class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider">
                                Clave Temporal Actual:
                            </label>
                            <div class="relative">
                                <input type="password" name="current_password" id="current_password" required
                                    class="w-full px-4 py-3.5 bg-slate-50 border-2 @error('current_password') border-red-400 focus:border-red-500 focus:ring-red-100 @else border-slate-200 focus:border-[#233C7E] focus:ring-blue-100 @enderror rounded-xl focus:ring-4 outline-none transition-all pr-12 text-sm font-medium text-slate-700">
                                <button type="button" tabindex="-1"
                                    class="toggle-password-btn absolute inset-y-0 right-0 pr-4 flex items-center text-slate-400 hover:text-[#233C7E]"
                                    data-input-id="current_password">
                                    <svg class="w-5 h-5 eye-icon" fill="none" stroke="currentColor" stroke-width="2"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>
                            </div>
                            @error('current_password')
                                <p class="text-xs text-red-500 font-medium mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Nueva Clave e Input de Confirmación Grid -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <!-- Nueva Clave -->
                            <div class="space-y-1.5">
                                <label class="block text-[11px] font-bold text-[#233C7E] uppercase tracking-wider">
                                    Nueva clave:
                                </label>
                                <div class="relative">
                                    <input type="password" name="password" id="password" required
                                        class="w-full px-4 py-3.5 bg-slate-50 border-2 @error('password') border-red-400 focus:border-red-500 focus:ring-red-100 @else border-slate-200 focus:border-[#233C7E] focus:ring-blue-100 @enderror rounded-xl focus:ring-4 outline-none transition-all pr-12 text-sm font-medium text-slate-700">
                                    <button type="button" tabindex="-1"
                                        class="toggle-password-btn absolute inset-y-0 right-0 pr-4 flex items-center text-slate-400 hover:text-[#233C7E]"
                                        data-input-id="password">
                                        <svg class="w-5 h-5 eye-icon" fill="none" stroke="currentColor"
                                            stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </button>
                                </div>
                                @error('password')
                                    <p class="text-xs text-red-500 font-medium mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Confirmar Clave -->
                            <div class="space-y-1.5">
                                <label class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider">
                                    Confirmar Nueva:
                                </label>
                                <div class="relative">
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                        required
                                        class="w-full px-4 py-3.5 bg-slate-50 border-2 border-slate-200 focus:border-[#233C7E] focus:ring-4 focus:ring-blue-100 rounded-xl outline-none transition-all pr-12 text-sm font-medium text-slate-700">
                                    <button type="button" tabindex="-1"
                                        class="toggle-password-btn absolute inset-y-0 right-0 pr-4 flex items-center text-slate-400 hover:text-[#233C7E]"
                                        data-input-id="password_confirmation">
                                        <svg class="w-5 h-5 eye-icon" fill="none" stroke="currentColor"
                                            stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- BOTONES DE ACCIÓN -->
                        <div class="pt-4 border-t border-slate-100 flex flex-col sm:flex-row gap-3">
                            <a href="{{ route('usuario.perfil') }}"
                                class="flex items-center justify-center gap-2 px-6 py-3.5 bg-white hover:bg-slate-50 text-slate-600 text-xs font-bold uppercase tracking-wider rounded-xl border border-slate-200 shadow-sm transition-all active:scale-98">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                </svg>
                                Volver al Perfil
                            </a>
                            <button type="submit" id="submit-btn"
                                class="flex-1 py-3.5 bg-[#233C7E] hover:bg-[#1a2f64] text-white text-xs font-bold uppercase tracking-widest rounded-xl shadow-lg shadow-blue-950/10 transition-all hover:shadow-xl active:scale-98">
                                Actualizar Contraseña
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <!-- FOOTER INSTITUCIONAL OPCIONAL -->
    <footer class="text-center">
        <p class="text-[9px] text-black-900 uppercase tracking-[0.5em] font-medium">
            Ministerio del Poder Popular para Relaciones Interiores, Justicia y Paz
        </p>
    </footer>


</body>
</html>
