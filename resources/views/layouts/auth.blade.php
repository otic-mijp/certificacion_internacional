<!DOCTYPE html>
<html lang="es-ve">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificación internacional | MPPRIJP</title>
    <link rel="icon" href="{{ asset('img/logo_pestana.png') }}" sizes="192x192" type="image/png">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="min-h-screen flex flex-col font-sans antialiased bg-slate-50 text-slate-900">
    <header class="bg-white/90 backdrop-blur-md fixed top-0 w-full z-50 border-b border-gray-100 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-center">
            <div class="w-full max-w-[1200px]">
                <img src="{{ asset('img/banner.png') }}" alt="Gobierno"
                    class="w-full h-auto opacity-95 transition-all hover:opacity-100 mx-auto
                            height-adaptive"
                    style="height: clamp(60px, 10vw, 120px); object-fit: contain;">
            </div>
        </div>
    </header>

    <main class="flex-grow flex items-center justify-center pt-24 md:pt-40 pb-12 px-4">
        <div class="w-full max-w-7xl mx-auto">
            @yield('content')
        </div>
    </main>

    @include('layouts.components.footer')

</body>
</html>
