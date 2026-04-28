<nav class="bg-[#2a59a6] backdrop-blur-md sticky top-0 z-50 shadow-2xl border-b border-slate-700/50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex items-center h-16">

            <div class="md:hidden flex items-center mr-auto">
                <button id="mobile-menu-button"
                    class="p-2 rounded-xl text-slate-200 hover:bg-slate-800 transition-all outline-none">
                    <svg id="icon-open" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg id="icon-close" class="hidden h-6 w-6" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div class="hidden md:flex items-center gap-1 flex-1">
                <a href="{{ route('usuario.bienvenida') }}"
                   class="flex items-center gap-2 px-4 py-2.5 rounded-xl text-[10.9px] font-black uppercase tracking-[0.15em] transition-all duration-300 
                          {{ request()->routeIs('usuario.bienvenida') ? 'bg-[#274294] text-white shadow-lg shadow-blue-900/20' : 'text-slate-300 hover:text-white hover:bg-slate-800' }}">
                    <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    Inicio
                </a>

                <a href="{{ route('solicitud.certificado') }}"
                    class="flex items-center gap-2 px-4 py-2.5 rounded-xl text-[10.9px] font-black uppercase tracking-[0.15em] transition-all duration-300
                    {{ request()->routeIs('solicitud.certificado') ? 'bg-[#274294] text-white shadow-lg shadow-blue-900/20' : 'text-slate-300 hover:text-white hover:bg-slate-800' }}">
                    <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Nueva Solicitud
                </a>

                <a href="{{ route('solicitud.listado') }}"
                    class="flex items-center gap-2 px-4 py-2.5 rounded-xl text-[10.9px] font-black uppercase tracking-[0.15em] transition-all duration-300 {{ request()->routeIs('solicitud.listado') ? 'bg-[#274294] text-white shadow-lg shadow-blue-900/20' : 'text-slate-300 hover:text-white hover:bg-slate-800' }}">
                    <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                    </svg>
                    Mis Trámites
                </a>
            </div>

            <div class="flex items-center gap-3 md:border-l md:border-slate-700/50 md:pl-4">
                <a href="{{ route('usuario.perfil') }}" class="text-slate-200 hover:text-white transition-colors"
                    title="Mi Perfil">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </a>

                <button onclick="document.getElementById('logout-form').submit();"
                    class="cursor-pointer p-2 rounded-lg bg-red-500/10 text-red-400 hover:bg-red-500 hover:text-white transition-all"
                    title="Cerrar Sesión">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div id="mobile-menu" class="hidden md:hidden bg-[#1e293b] border-t border-slate-700 animate-fade-in-down">
        <div class="px-4 py-6 space-y-3">
            <a href="{{ route('usuario.bienvenida') }}"
                class="block px-4 py-3 rounded-xl text-[10.9px] font-black uppercase tracking-widest {{ request()->is('/') ? 'bg-[#274294] text-white' : 'text-slate-200' }}">Inicio</a>
            <a href="{{ route('solicitud.certificado') }}"
                class="block px-4 py-3 rounded-xl text-[10.9px] font-black uppercase tracking-widest {{ request()->is('solicitud*') ? 'bg-[#274294] text-white' : 'text-slate-200' }}">Nueva
                Solicitud</a>
            <a href="{{ route('solicitud.listado') }}"
                class="block px-4 py-3 rounded-xl text-[10.9px] font-black uppercase tracking-widest {{ request()->is('mis-tramites*') ? 'bg-[#274294] text-white' : 'text-slate-200' }}">Mis
                Trámites</a>
        </div>
    </div>
</nav>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>
