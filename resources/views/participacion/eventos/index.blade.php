@extends('layouts.admin')

@section('title', 'Eventos')

@section('content')

<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-5">
    <h1 class="text-lg sm:text-xl font-bold">Eventos</h1>
    <a href="{{ route('eventos.create') }}" class="bg-slate-900 text-white px-4 py-2 rounded hover:bg-slate-700">
        + Nuevo Evento
    </a>
</div>

<div class="bg-white rounded-xl shadow overflow-hidden">
    <div class="overflow-x-auto">
    <table class="w-full text-sm">
        <thead class="bg-gray-100">
            <tr>
                <th class="text-left px-4 py-3">#</th>
                <th class="text-left px-4 py-3">Nombre</th>
                <th class="text-left px-4 py-3">Tipo</th>
                <th class="text-left px-4 py-3">Fecha Inicio</th>
                <th class="text-left px-4 py-3">Lugar</th>
                <th class="text-left px-4 py-3">Capacidad</th>
                <th class="text-left px-4 py-3">Participantes</th>
                <th class="text-left px-4 py-3">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($eventos as $e)
                <tr class="border-t hover:bg-gray-50">
                    <td class="px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2">{{ $e->nombre }}</td>
                    <td class="px-4 py-2">{{ $e->tipoEvento->nombre ?? '—' }}</td>
                    <td class="px-4 py-2">{{ $e->fecha_inicio ? \Carbon\Carbon::parse($e->fecha_inicio)->format('d/m/Y H:i') : '—' }}</td>
                    <td class="px-4 py-2">{{ $e->lugar ?? '—' }}</td>
                    <td class="px-4 py-2">{{ $e->capacidad ?? '—' }}</td>
                    <td class="px-4 py-2">{{ $e->participaciones_count ?? $e->participaciones->count() }}</td>
                    <td class="px-4 py-2 space-x-2">
                        <a href="{{ route('eventos.edit', $e->id_evento) }}" class="text-yellow-600 hover:underline">Editar</a>
                        <form action="{{ route('eventos.destroy', $e->id_evento) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Eliminar este evento?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="px-4 py-6 text-center text-gray-500">No hay eventos registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    </div>
</div>

<div class="mt-4">
    {{ $eventos->links() }}
</div>

@endsection
