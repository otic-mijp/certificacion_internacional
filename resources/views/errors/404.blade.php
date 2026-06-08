<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página no encontrada - Error 404</title>
     @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 flex items-center justify-center min-h-screen font-sans antialiased">

    <div class="max-w-md w-full px-6 py-8 bg-white rounded-2xl shadow-xl shadow-slate-200/80 border border-slate-100 text-center transition-all transform hover:scale-[1.01]">
        
        <span class="text-xs font-semibold uppercase tracking-widest text-indigo-600 bg-indigo-50 px-2.5 py-1 rounded-full">
            Error 404
        </span>

        <h1 class="text-2xl font-bold text-slate-800 mt-4 mb-2">
            Página no encontrada
        </h1>

        <p class="text-slate-600 text-sm leading-relaxed mb-8 px-2">
            Lo sentimos, la página que estás buscando no existe, ha sido eliminada o cambió de dirección.
        </p>

        <div class="flex flex-col sm:flex-row gap-3 justify-center">
            <a href=" javascript:history.back() " class="inline-flex items-center justify-center px-4 py-2.5 text-sm font-medium text-slate-700 bg-white border border-slate-200 rounded-xl hover:bg-slate-50 focus:outline-hidden focus:ring-2 focus:ring-offset-2 focus:ring-slate-500 transition-colors order-2 sm:order-1">
                <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                </svg>
                Regresar
            </a>
        </div>
    </div>
</body>
</html>