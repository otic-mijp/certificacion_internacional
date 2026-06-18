<!DOCTYPE html>
<html lang="es-ve" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mantenimiento en curso - Error 503</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex h-full flex-col bg-slate-50 font-sans text-slate-900 antialiased dark:bg-slate-900 dark:text-slate-100">
    <div class="mx-auto flex w-full max-auto max-w-7xl flex-1 flex-col justify-center px-6 lg:px-8">
        <div class="flex justify-center text-indigo-600 dark:text-indigo-400">
            <svg class="h-24 w-24 animate-pulse" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M11.42 15.17 17.25 21A1.75 1.75 0 1 0 19.75 18.5l-5.83-5.83m-2.5 2.5a2.5 2.5 0 1 1-3.5-3.5 2.5 2.5 0 0 1 3.5 3.5ZM16.5 7.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M6 12.75a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM6 18.75a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM6 6.75a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM21 6.75a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM21 12.75a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12 3a.75.75 0 0 1 .75.75v1.5a.75.75 0 0 1-1.5 0v-1.5A.75.75 0 0 1 12 3Z" />
            </svg>
        </div>

        <div class="py-8 text-center">
            <p class="text-base font-semibold tracking-wide text-indigo-600 uppercase dark:text-indigo-400">Error 503
            </p>

            <h1 class="mt-4 text-4xl font-extrabold tracking-tight sm:text-5xl">Estamos mejorando el sitio</h1>

            <p class="mt-6 text-base leading-7 text-slate-600 dark:text-slate-400 max-w-md mx-auto">
                En este momento estamos realizando tareas de mantenimiento programado. No te preocupes, volveremos a
                estar en línea muy pronto.
            </p>

            <div class="mt-10 flex items-center justify-center gap-x-6">
                <a href="javascript:history.back()" class="text-sm font-semibold hover:text-indigo-500 transition-colors border p-5 rounded-xl">
                    Volver
                </a>
            </div>
        </div>
    </div>

    <footer class="w-full text-center py-6 text-sm text-slate-400 dark:text-slate-600">
        <p>Ministerio del Poder Popular para las Relaciones Interiores Justicia y Paz - Venezuela {{ now()->year }}</p>
    </footer>

</body>

</html>
