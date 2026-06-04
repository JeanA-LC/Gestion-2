@extends('layouts.admin')

@section('title', 'Detalle usuario')

@section('content')
<div class="bg-white rounded-xl shadow p-6 space-y-3">
    <h1 class="text-2xl font-bold">
        {{ $usuario->nombres }} {{ $usuario->apellidos }}
    </h1>

    <p><strong>Correo:</strong> {{ $usuario->correo }}</p>
    <p><strong>Teléfono:</strong> {{ $usuario->telefono ?? 'No registrado' }}</p>
    <p><strong>Zona:</strong> {{ $usuario->zona?->nombre ?? 'Sin zona' }}</p>
    <p><strong>Estado:</strong> {{ $usuario->estado ? 'Activo' : 'Inactivo' }}</p>
    <p><strong>Roles:</strong> {{ $usuario->roles->pluck('nombre')->join(', ') }}</p>

    <a href="{{ route('usuarios.index') }}" class="inline-block mt-4 bg-gray-300 px-4 py-2 rounded">
        Volver
    </a>
</div>
@endsection