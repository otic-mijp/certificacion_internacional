<!DOCTYPE html>
<html lang="es-ve">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error 500</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 flex items-center justify-center min-h-screen font-sans antialiased">

    <div
        class="max-w-md w-full px-6 py-8 bg-white rounded-2xl shadow-xl shadow-slate-200/80 border border-slate-100 text-center transition-all transform hover:scale-[1.01]">

        <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-rose-50 text-rose-600 mb-6">
            <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
            </svg>
        </div>

        <span class="text-xs font-semibold uppercase tracking-widest text-rose-600 bg-rose-50 px-2.5 py-1 rounded-full">
            Error 500
        </span>

        <h1 class="text-2xl font-bold text-slate-800 mt-4 mb-2">
            Algo salió mal en el servidor
        </h1>

        <p class="text-slate-600 text-sm leading-relaxed mb-8 px-2">
            Estamos experimentando dificultades técnicas temporales. Nuestro equipo ya ha sido notificado y está
            trabajando para solucionarlo lo antes posible.
        </p>

        <div class="flex flex-col sm:flex-row gap-3 justify-center">
            <a href="{{ route('solicitud.listado') }}"
                class="inline-flex items-center justify-center px-4 py-2.5 text-sm font-medium text-white bg-rose-600 rounded-xl hover:bg-rose-700 focus:outline-hidden focus:ring-2 focus:ring-offset-2 focus:ring-rose-600 transition-colors order-1 sm:order-2 shadow-sm">
                Volver al Inicio
            </a>
        </div>

    </div>

</body>

</html>
