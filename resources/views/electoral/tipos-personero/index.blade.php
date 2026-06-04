@extends('layouts.admin')

@section('title', 'Tipos de Personero')

@section('content')

<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-5">
    <h1 class="text-lg sm:text-xl font-bold">Tipos de Personero</h1>
    <a href="{{ route('tipos-personero.create') }}" class="bg-slate-900 text-white px-4 py-2 rounded hover:bg-slate-700">
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
                <th class="text-left px-4 py-3">Nivel</th>
                <th class="text-left px-4 py-3">Descripción</th>
                <th class="text-left px-4 py-3">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($tipos as $t)
                <tr class="border-t hover:bg-gray-50">
                    <td class="px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2">{{ $t->nombre }}</td>
                    <td class="px-4 py-2">
                        <span class="px-2 py-1 rounded bg-slate-100 text-slate-700 text-xs">{{ $t->nivel_correspondiente }}</span>
                    </td>
                    <td class="px-4 py-2">{{ $t->descripcion ?? '—' }}</td>
                    <td class="px-4 py-2 space-x-2">
                        <a href="{{ route('tipos-personero.edit', $t->id_tipo_personero) }}" class="text-yellow-600 hover:underline">Editar</a>
                        <form action="{{ route('tipos-personero.destroy', $t->id_tipo_personero) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Eliminar este tipo de personero?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-4 py-6 text-center text-gray-500">No hay tipos de personero registrados.</td>
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
