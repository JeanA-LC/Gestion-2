@extends('layouts.admin')

@section('title', 'Departamentos')

@section('content')

<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-5">
    <h1 class="text-lg sm:text-xl font-bold">Departamentos</h1>
    <a href="{{ route('departamentos.create') }}" class="bg-slate-900 text-white px-4 py-2 rounded hover:bg-slate-700">
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
                <th class="text-left px-4 py-3">Provincias</th>
                <th class="text-left px-4 py-3">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($departamentos as $d)
                <tr class="border-t hover:bg-gray-50">
                    <td class="px-4 py-3 text-gray-400">{{ $d->id_departamento }}</td>
                    <td class="px-4 py-3 font-medium">{{ $d->nombre }}</td>
                    <td class="px-4 py-3">
                        <span class="px-2 py-1 rounded bg-slate-100 text-slate-700 text-xs">
                            {{ $d->provincias_count }}
                        </span>
                    </td>
                    <td class="px-4 py-3 space-x-3">
                        <a href="{{ route('departamentos.edit', $d->id_departamento) }}"
                           class="text-blue-600 hover:underline">Editar</a>

                        <form action="{{ route('departamentos.destroy', $d->id_departamento) }}"
                              method="POST" class="inline-block"
                              onsubmit="return confirm('¿Eliminar este departamento?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="px-4 py-6 text-center text-gray-500">
                        No hay departamentos registrados.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    </div>
</div>

<div class="mt-4">
    {{ $departamentos->links() }}
</div>

@endsection
