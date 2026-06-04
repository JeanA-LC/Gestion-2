@extends('layouts.admin')

@section('title', 'Detalle de Persona')

@section('content')

<div class="flex items-center gap-2 mb-6">
    <a href="{{ route('personas.index') }}" class="text-gray-500 hover:underline">Personas</a>
    <span>/</span>
    <span>{{ $persona->apellidos }}, {{ $persona->nombres }}</span>
</div>

<div class="max-w-xl">
    <div class="bg-white rounded-xl shadow p-6">
        <div class="flex justify-between items-start mb-6">
            <h2 class="text-lg font-bold">Datos de la Persona</h2>
            <div class="flex gap-2">
                <a href="{{ route('personas.edit', $persona->id_persona) }}"
                   class="bg-slate-900 text-white px-4 py-2 rounded hover:bg-slate-700 text-sm">
                    Editar
                </a>
                <a href="{{ route('personas.index') }}"
                   class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300 text-sm">
                    Volver
                </a>
            </div>
        </div>

        <dl class="grid grid-cols-1 gap-4">
            <div>
                <dt class="text-xs text-gray-500 uppercase tracking-wide">DNI</dt>
                <dd class="mt-1 font-medium">{{ $persona->dni }}</dd>
            </div>
            <div>
                <dt class="text-xs text-gray-500 uppercase tracking-wide">Nombres</dt>
                <dd class="mt-1 font-medium">{{ $persona->nombres }}</dd>
            </div>
            <div>
                <dt class="text-xs text-gray-500 uppercase tracking-wide">Apellidos</dt>
                <dd class="mt-1 font-medium">{{ $persona->apellidos }}</dd>
            </div>
            <div>
                <dt class="text-xs text-gray-500 uppercase tracking-wide">Teléfono</dt>
                <dd class="mt-1">{{ $persona->telefono ?? '—' }}</dd>
            </div>
            <div>
                <dt class="text-xs text-gray-500 uppercase tracking-wide">Correo</dt>
                <dd class="mt-1">{{ $persona->correo ?? '—' }}</dd>
            </div>
            <div>
                <dt class="text-xs text-gray-500 uppercase tracking-wide">Dirección</dt>
                <dd class="mt-1">{{ $persona->direccion ?? '—' }}</dd>
            </div>
        </dl>
    </div>
</div>

@endsection
