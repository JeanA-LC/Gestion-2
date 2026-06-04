@extends('layouts.admin')
@section('title', 'Mi Perfil')
@section('content')

<div class="max-w-lg mx-auto text-center py-12">
    <div class="w-20 h-20 rounded-full bg-blue-100 flex items-center justify-center mx-auto mb-4">
        <svg class="w-10 h-10 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
        </svg>
    </div>
    <h2 class="text-2xl font-bold text-gray-800 mb-2">Bienvenido, {{ $user->nombres }}</h2>
    <p class="text-gray-500 mb-6">Estás registrado como <strong>Simpatizante</strong> en el sistema.</p>
    <div class="bg-blue-50 border border-blue-200 rounded-xl p-5 text-left text-sm text-blue-800">
        <p class="font-semibold mb-2">¿Qué sigue?</p>
        <ul class="space-y-1 list-disc pl-4">
            <li>Un coordinador revisará tu solicitud de participación.</li>
            <li>Si eres seleccionado, recibirás capacitaciones y evaluaciones.</li>
            <li>Al aprobar, podrás ser designado como personero electoral.</li>
        </ul>
    </div>
</div>

@endsection
