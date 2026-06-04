@extends('layouts.admin')

@section('title', 'Evaluaciones')

@section('content')

<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-5">
    <h1 class="text-lg sm:text-xl font-bold">Evaluaciones</h1>
    <a href="{{ route('evaluaciones.create') }}" class="bg-slate-900 text-white px-4 py-2 rounded hover:bg-slate-700">
        + Nueva Evaluación
    </a>
</div>

<div class="bg-white rounded-xl shadow overflow-hidden">
    <div class="overflow-x-auto">
    <table class="w-full text-sm">
        <thead class="bg-gray-100">
            <tr>
                <th class="text-left px-4 py-3">#</th>
                <th class="text-left px-4 py-3">Nombre</th>
                <th class="text-left px-4 py-3">Nota Mínima</th>
                <th class="text-left px-4 py-3">Intentos registrados</th>
                <th class="text-left px-4 py-3">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($evaluaciones as $e)
                <tr class="border-t hover:bg-gray-50">
                    <td class="px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2">{{ $e->nombre }}</td>
                    <td class="px-4 py-2">{{ $e->nota_minima }}</td>
                    <td class="px-4 py-2">{{ $e->intentos_count ?? $e->intentos->count() }}</td>
                    <td class="px-4 py-2 space-x-2">
                        <a href="{{ route('evaluaciones.show', $e->id_evaluacion) }}" class="text-blue-600 hover:underline">Ver</a>
                        <a href="{{ route('evaluaciones.edit', $e->id_evaluacion) }}" class="text-yellow-600 hover:underline">Editar</a>
                        <form action="{{ route('evaluaciones.destroy', $e->id_evaluacion) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Eliminar esta evaluación?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-4 py-6 text-center text-gray-500">No hay evaluaciones registradas.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    </div>
</div>

<div class="mt-4">
    {{ $evaluaciones->links() }}
</div>

@endsection
