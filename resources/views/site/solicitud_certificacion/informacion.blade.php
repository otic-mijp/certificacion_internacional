@extends('site.app')

@section('title', 'Informacion | Certificación Internacional MPPRIJP - VE')

@section('content')
    <div class="max-w-3xl mx-auto px-4 py-8 font-sans text-gray-700 antialiased">

        <!-- Título Principal -->
        <h2 class="text-3xl font-semibold text-gray-950 mb-6 tracking-tight">
            Why Laravel?
        </h2>

        <!-- Párrafo Introductorio -->
        <p class="text-lg leading-relaxed text-gray-600 mb-8">
            There are a variety of tools and frameworks available to you when building a web
            application. However, we believe Laravel is the best choice for building modern, full-stack web applications.
        </p>

        <!-- Subtítulo -->
        <h3 class="text-xl font-semibold text-gray-950 mb-4 tracking-tight">
            A Progressive Framework
        </h3>

        <!-- Cuerpo del Texto - Párrafo 1 (Con 1 enlace) -->
        <p class="text-lg leading-relaxed text-gray-600 mb-6">
            We like to call Laravel a "progressive" framework. By that, we mean that Laravel
            grows with you. If you're just taking your first steps into web development, Laravel's
            vast library of documentation, guides, and
            <a href="#" class="text-red-600 underline hover:text-red-700 transition-colors">video tutorials</a>
            will help you learn the ropes without becoming overwhelmed.
        </p>

        <!-- Cuerpo del Texto - Párrafo 2 (Con 3 enlaces) -->
        <p class="text-lg leading-relaxed text-gray-600">
            If you're a senior developer, Laravel gives you robust tools for
            <a href="#" class="text-red-600 underline hover:text-red-700 transition-colors">dependency injection</a>,
            <a href="#" class="text-red-600 underline hover:text-red-700 transition-colors">unit testing</a>,
            <a href="#" class="text-red-600 underline hover:text-red-700 transition-colors">queues</a>,
            and more. Laravel is fine-tuned for building professional web applications and ready to handle enterprise
            workloads.
        </p>

    </div>
@endsection
