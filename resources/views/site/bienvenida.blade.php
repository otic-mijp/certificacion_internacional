@extends('site.app')

@section('title', 'Bienvenido')

@section('content')
    <div class="max-w-4xl mx-auto">
        <h2 class="text-4xl font-black text-[#233C7E] mb-6">BIENVENIDO</h2>
        
        <div class="bg-white p-8 rounded-[30px] shadow-xl border border-slate-200">
            <p class="text-slate-600">Este es el contenido dinámico de la página...</p>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        console.log('Página cargada correctamente');
    </script>
@endpush