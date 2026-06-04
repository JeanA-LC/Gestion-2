@extends('layouts.admin')

@section('title', 'Participaciones')

@section('content')

<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-5">
    <h1 class="text-lg sm:text-xl font-bold">Participaciones</h1>
    <a href="{{ route('participaciones.create') }}" class="bg-slate-900 text-white px-4 py-2 rounded hover:bg-slate-700">
        + Nueva Participación
    </a>
</div>

<div class="bg-white rounded-xl shadow overflow-hidden">
    <div class="overflow-x-auto">
    <table class="w-full text-sm">
        <thead class="bg-gray-100">
            <tr>
                <th class="text-left px-4 py-3">#</th>
                <th class="text-left px-4 py-3">Persona</th>
                <th class="text-left px-4 py-3">Evento</th>
                <th class="text-left px-4 py-3">Grado Incidencia</th>
                <th class="text-left px-4 py-3">Fecha</th>
                <th class="text-left px-4 py-3">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($participaciones as $p)
                <tr class="border-t hover:bg-gray-50">
                    <td class="px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2">{{ $p->interesado->persona->apellidos ?? '—' }}, {{ $p->interesado->persona->nombres ?? '' }}</td>
                    <td class="px-4 py-2">{{ $p->evento->nombre ?? '—' }}</td>
                    <td class="px-4 py-2">
                        @if($p->grado_incidencia === 'ALTO')
                            <span class="px-2 py-1 rounded bg-red-100 text-red-700 text-xs">ALTO</span>
                        @elseif($p->grado_incidencia === 'MEDIO')
                            <span class="px-2 py-1 rounded bg-yellow-100 text-yellow-700 text-xs">MEDIO</span>
                        @else
                            <span class="px-2 py-1 rounded bg-green-100 text-green-700 text-xs">BAJO</span>
                        @endif
                    </td>
                    <td class="px-4 py-2">{{ \Carbon\Carbon::parse($p->created_at)->format('d/m/Y') }}</td>
                    <td class="px-4 py-2 space-x-2">
                        <a href="{{ route('participaciones.edit', $p->id_participacion) }}" class="text-yellow-600 hover:underline">Editar</a>
                        <form action="{{ route('participaciones.destroy', $p->id_participacion) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Eliminar esta participación?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-4 py-6 text-center text-gray-500">No hay participaciones registradas.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    </div>
</div>

<div class="mt-4">
    {{ $participaciones->links() }}
</div>

@endsection
