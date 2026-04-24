<!DOCTYPE html>
<html lang="es-ve">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', '| Sigesap') </title>
     @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 min-h-screen flex flex-col">

    @include('site.partials.header')

    @include('site.partials.navbar')

    <main class="flex-grow container mx-auto px-4 py-8 md:py-12">
        @yield('content')
    </main>

    @include('site.partials.footer')

    @stack('scripts')
</body>
</html>