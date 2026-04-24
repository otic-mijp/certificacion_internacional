<nav class="bg-[#1e293b] sticky top-0 z-40 shadow-xl border-b border-slate-700">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex items-center justify-between py-2">

            <div class="flex items-center gap-1 overflow-x-auto whitespace-nowrap no-scrollbar">
                <a href="{{ route('usuario.bienvenida') }}"
                    class="flex items-center gap-2 px-4 py-2 rounded-xl text-[10px] font-black uppercase tracking-[0.15em] transition-all {{ request()->is('/') ? 'bg-[#233C7E] text-white shadow-lg' : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    Inicio
                </a>

                <a href="/solicitud"
                    class="flex items-center gap-2 px-4 py-2 rounded-xl text-[10px] font-black uppercase tracking-[0.15em] transition-all {{ request()->is('solicitud*') ? 'bg-[#233C7E] text-white shadow-lg' : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Nueva Solicitud
                </a>

                <a href="/mis-tramites"
                    class="flex items-center gap-2 px-4 py-2 rounded-xl text-[10px] font-black uppercase tracking-[0.15em] transition-all {{ request()->is('mis-tramites*') ? 'bg-[#233C7E] text-white shadow-lg' : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                    Mis Trámites
                </a>
            </div>

            <div class="flex items-center gap-2 ml-4">
                <a href="{{ route('usuario.perfil') }}"
                    class="flex items-center gap-2 px-4 py-2 rounded-xl text-[10px] font-black uppercase tracking-[0.15em] transition-all {{ request()->is('perfil*') ? 'bg-slate-700 text-white' : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    Perfil
                </a>

                <div class="w-px h-4 bg-slate-700 mx-1 hidden md:block"></div>

                <a href="{{ route('logout') }}"
                    class="px-4 py-2 text-red-400 text-[10px] font-black uppercase tracking-[0.15em] rounded-xl hover:bg-red-500/10 transition-all cursor-pointer"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Cerrar Sesión
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
            </div>

        </div>
    </div>
</nav>
