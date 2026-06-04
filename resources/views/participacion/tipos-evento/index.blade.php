@extends('layouts.admin')

@section('title', 'Tipos de Evento')

@section('content')

<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-5">
    <h1 class="text-lg sm:text-xl font-bold">Tipos de Evento</h1>
    <a href="{{ route('tipo-evento.create') }}" class="bg-slate-900 text-white px-4 py-2 rounded hover:bg-slate-700">
        + Nuevo Tipo
    </a>
</div>

<div class="bg-white rounded-xl shadow overflow-hidden">
    <div class="overflow-x-auto">
    <table class="w-full text-sm">
        <thead class="bg-gray-100">
            <tr>
                <th class="text-left px-4 py-3">#</th>
                <th class="text-left px-4 py-3">Nombre</th>
                <th class="text-left px-4 py-3">Descripción</th>
                <th class="text-left px-4 py-3">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($tipos as $t)
                <tr class="border-t hover:bg-gray-50">
                    <td class="px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2">{{ $t->nombre }}</td>
                    <td class="px-4 py-2">{{ $t->descripcion ?? '—' }}</td>
                    <td class="px-4 py-2 space-x-2">
                        <a href="{{ route('tipo-evento.edit', $t->id_tipo_evento) }}" class="text-yellow-600 hover:underline">Editar</a>
                        <form action="{{ route('tipo-evento.destroy', $t->id_tipo_evento) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Eliminar este tipo de evento?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="px-4 py-6 text-center text-gray-500">No hay tipos de evento registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    </div>
</div>

<div class="mt-4">
    {{ $tipos->links() }}
</div>

@endsection
