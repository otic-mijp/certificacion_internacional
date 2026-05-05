<!DOCTYPE html>
<html lang="es-ve">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reinicio de clave obligatorio | MPPRIJP</title>
    <link rel="icon" href="{{ asset('img/logo_pestana.png') }}" sizes="192x192" type="image/png">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body>
    <div class="min-h-screen bg-gray-50 flex flex-col justify-center items-center px-6">
        <div class="text-center">
            <!-- Código de error -->
            <h1 class="text-9xl font-black text-gray-200 tracking-widest">
                404
            </h1>

            <!-- Mensaje flotante -->
            <div
                class="bg-amber-500 px-2 text-sm rounded rotate-12 absolute transform -translate-y-20 translate-x-20 md:translate-x-32">
                Página no encontrada
            </div>

            <div class="mt-8">
                <h2 class="text-3xl font-bold text-gray-800 md:text-4xl">
                    ¡Vaya! Parece que te has perdido.
                </h2>

                <p class="mt-4 text-gray-500 text-lg">
                    La página que buscas no existe o ha sido movida a otra ubicación.
                </p>

                <!-- Botones de acción -->
                <div class="mt-10 flex flex-col sm:flex-row justify-center gap-4">
                    <button onclick="history.back()"
                        class="px-8 py-3 bg-white text-gray-700 border border-gray-300 font-semibold rounded-lg hover:bg-gray-50 transition-all active:scale-95 cursor-pointer">
                        Regresar
                    </button>
                </div>
            </div>
        </div>

        <!-- Decoración visual opcional -->
        <div class="mt-16 text-gray-400">
            <svg class="w-24 h-24 mx-auto opacity-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                    d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>
    </div>

</body>
</html>
