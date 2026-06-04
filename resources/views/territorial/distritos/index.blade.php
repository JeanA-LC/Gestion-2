@extends('layouts.admin')

@section('title', 'Distritos')

@section('content')

<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-5">
    <h1 class="text-lg sm:text-xl font-bold">Distritos</h1>
    <a href="{{ route('distritos.create') }}" class="bg-slate-900 text-white px-4 py-2 rounded hover:bg-slate-700">
        + Nuevo
    </a>
</div>

<div class="bg-white rounded-xl shadow overflow-hidden">
    <div class="overflow-x-auto">
    <table class="w-full text-sm">
        <thead class="bg-gray-100">
            <tr>
                <th class="text-left px-4 py-3 w-16">#</th>
                <th class="text-left px-4 py-3">Nombre</th>
                <th class="text-left px-4 py-3">Ubigeo</th>
                <th class="text-left px-4 py-3">Provincia</th>
                <th class="text-left px-4 py-3">Departamento</th>
                <th class="text-left px-4 py-3">Zonas</th>
                <th class="text-left px-4 py-3">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($distritos as $distrito)
                <tr class="border-t hover:bg-gray-50">
                    <td class="px-4 py-3 text-gray-400">{{ $distrito->id_distrito }}</td>
                    <td class="px-4 py-3 font-medium">{{ $distrito->nombre }}</td>
                    <td class="px-4 py-3">
                        <span class="font-mono text-xs bg-gray-100 px-2 py-1 rounded">
                            {{ $distrito->ubigeo }}
                        </span>
                    </td>
                    <td class="px-4 py-3">
                        <span class="px-2 py-1 rounded bg-blue-50 text-blue-700 text-xs font-medium">
                            {{ $distrito->provincia->nombre ?? '—' }}
                        </span>
                    </td>
                    <td class="px-4 py-3 text-gray-600 text-xs">
                        {{ $distrito->provincia->departamento->nombre ?? '—' }}
                    </td>
                    <td class="px-4 py-3">
                        <span class="px-2 py-1 rounded bg-slate-100 text-slate-700 text-xs">
                            {{ $distrito->zonas_count }}
                        </span>
                    </td>
                    <td class="px-4 py-3 space-x-3">
                        <a href="{{ route('distritos.edit', $distrito->id_distrito) }}"
                           class="text-blue-600 hover:underline">Editar</a>

                        <form action="{{ route('distritos.destroy', $distrito->id_distrito) }}"
                              method="POST" class="inline-block"
                              onsubmit="return confirm('¿Eliminar este distrito?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="px-4 py-6 text-center text-gray-500">
                        No hay distritos registrados.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    </div>
</div>

<div class="mt-4">
    {{ $distritos->links() }}
</div>

@endsection
