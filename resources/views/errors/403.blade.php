<!DOCTYPE html>
<html lang="es-ve">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso Restringido - Error 403</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 flex items-center justify-center min-h-screen font-sans antialiased">
    <div class="max-w-md w-full px-6 py-8 bg-white rounded-2xl shadow-xl shadow-slate-200/80 border border-slate-100 text-center transition-all transform hover:scale-[1.01]">
        <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-amber-50 text-amber-500 mb-6">
            <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
            </svg>
        </div>
        <span class="text-xs font-semibold uppercase tracking-widest text-amber-600 bg-amber-50 px-2.5 py-1 rounded-full">
            Error 403
        </span>
        <h1 class="text-2xl font-bold text-slate-800 mt-4 mb-2">
            Acceso Restringido
        </h1>

        <p class="text-slate-600 text-sm leading-relaxed mb-8 px-2">
            {{ $exception->getMessage() ?: 'No tienes permisos para acceder a este recurso.' }}
        </p>

        <div class="flex flex-col sm:flex-row gap-3 justify-center">
            <a href="{{ route('solicitud.listado') }}"
                class="inline-flex items-center justify-center px-4 py-2.5 text-sm font-medium text-slate-700 bg-white border border-slate-200 rounded-xl hover:bg-slate-50 focus:outline-hidden focus:ring-2 focus:ring-offset-2 focus:ring-slate-500 transition-colors order-2 sm:order-1">
                <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                </svg>
                Regresar
            </a>
        </div>

        <div class="mt-8 pt-6 border-t border-slate-100 text-xs text-slate-400">
            Si crees que esto es un error, contacta al soporte de la plataforma.
        </div>
    </div>

</body>
</html>
