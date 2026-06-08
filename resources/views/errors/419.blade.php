<!DOCTYPE html>
<html lang="es-ve">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sesión Expirada - Error 419</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 flex items-center justify-center min-h-screen font-sans antialiased">
    <div
        class="max-w-md w-full px-6 py-8 bg-white rounded-2xl shadow-xl shadow-slate-200/80 border border-slate-100 text-center transition-all transform hover:scale-[1.01]">

        <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-blue-50 text-blue-600 mb-6">
            <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>

        <span class="text-xs font-semibold uppercase tracking-widest text-blue-600 bg-blue-50 px-2.5 py-1 rounded-full">
            Error 419
        </span>

        <h1 class="text-2xl font-bold text-slate-800 mt-4 mb-2">
            La sesión ha expirado
        </h1>

        <p class="text-slate-600 text-sm leading-relaxed mb-8 px-2">
            Por razones de seguridad, tu sesión se cerró automáticamente tras un periodo de inactividad. Por favor,
            vuelve a iniciar sesión o recarga la página.
        </p>

        <div class="flex flex-col gap-3 justify-center">
            <button onclick="window.location.reload();"
                class="inline-flex items-center justify-center px-4 py-2.5 text-sm font-medium text-white bg-blue-600 rounded-xl hover:bg-blue-700 focus:outline-hidden focus:ring-2 focus:ring-offset-2 focus:ring-blue-600 transition-colors shadow-sm cursor-pointer">
                <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                </svg>
                Actualizar Página
            </button>

            <a href="{{ url('/login') }}"
                class="inline-flex items-center justify-center px-4 py-2.5 text-sm font-medium text-slate-700 bg-white border border-slate-200 rounded-xl hover:bg-slate-50 focus:outline-hidden focus:ring-2 focus:ring-offset-2 focus:ring-slate-500 transition-colors">
                Ir al Login
            </a>
        </div>

        <div class="mt-8 pt-6 border-t border-slate-100 text-xs text-slate-400">
            Los datos del formulario que no se hayan guardado podrían haberse perdido.
        </div>
    </div>

</body>

</html>
