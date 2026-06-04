@extends('layouts.admin')

@section('title', 'Centros de Votación')

@section('content')

<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-5">
    <h1 class="text-lg sm:text-xl font-bold">Centros de Votación</h1>
    <a href="{{ route('centros-votacion.create') }}" class="bg-slate-900 text-white px-4 py-2 rounded hover:bg-slate-700">
        + Nuevo Centro
    </a>
</div>

<div class="bg-white rounded-xl shadow overflow-hidden">
    <div class="overflow-x-auto">
    <table class="w-full text-sm">
        <thead class="bg-gray-100">
            <tr>
                <th class="text-left px-4 py-3">#</th>
                <th class="text-left px-4 py-3">Nombre</th>
                <th class="text-left px-4 py-3">Zona</th>
                <th class="text-left px-4 py-3">Dirección</th>
                <th class="text-left px-4 py-3">Mesas</th>
                <th class="text-left px-4 py-3">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($centros as $c)
                <tr class="border-t hover:bg-gray-50">
                    <td class="px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2">{{ $c->nombre }}</td>
                    <td class="px-4 py-2">{{ $c->zona->nombre ?? '—' }}</td>
                    <td class="px-4 py-2">{{ $c->direccion ?? '—' }}</td>
                    <td class="px-4 py-2">{{ $c->mesas_count ?? $c->mesas->count() }}</td>
                    <td class="px-4 py-2 space-x-2">
                        <a href="{{ route('centros-votacion.edit', $c->id_centro_votacion) }}" class="text-yellow-600 hover:underline">Editar</a>
                        <form action="{{ route('centros-votacion.destroy', $c->id_centro_votacion) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Eliminar este centro de votación?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-4 py-6 text-center text-gray-500">No hay centros de votación registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    </div>
</div>

<div class="mt-4">
    {{ $centros->links() }}
</div>

@endsection
