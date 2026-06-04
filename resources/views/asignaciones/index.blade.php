@extends('layouts.admin')

@section('title', 'Asignaciones')

@section('content')

<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-5">
    <h1 class="text-lg sm:text-xl font-bold">Personeros Asignados</h1>
    <a href="{{ route('asignaciones.create') }}" class="bg-slate-900 text-white px-4 py-2 rounded hover:bg-slate-700">
        + Asignar
    </a>
</div>

<div class="bg-white rounded-xl shadow overflow-hidden">
    <div class="overflow-x-auto">
    <table class="w-full text-sm">
        <thead class="bg-gray-100">
            <tr>
                <th class="text-left px-4 py-3">#</th>
                <th class="text-left px-4 py-3">Personero</th>
                <th class="text-left px-4 py-3">Tipo Personero</th>
                <th class="text-left px-4 py-3">Nivel Asignación</th>
                <th class="text-left px-4 py-3">Estado</th>
                <th class="text-left px-4 py-3">Fecha</th>
                <th class="text-left px-4 py-3">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($asignaciones as $a)
                <tr class="border-t hover:bg-gray-50">
                    <td class="px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2">{{ $a->postulacion->interesado->persona->apellidos ?? '—' }}, {{ $a->postulacion->interesado->persona->nombres ?? '' }}</td>
                    <td class="px-4 py-2">{{ $a->tipoPersonero->nombre ?? '—' }}</td>
                    <td class="px-4 py-2">
                        <span class="px-2 py-1 rounded bg-slate-100 text-slate-700 text-xs">{{ $a->nivel_asignacion }}</span>
                    </td>
                    <td class="px-4 py-2">
                        @if($a->estado === 'CONFIRMADO')
                            <span class="px-2 py-1 rounded bg-green-100 text-green-700 text-xs">CONFIRMADO</span>
                        @elseif($a->estado === 'RECHAZADO')
                            <span class="px-2 py-1 rounded bg-red-100 text-red-700 text-xs">RECHAZADO</span>
                        @elseif($a->estado === 'FINALIZADO')
                            <span class="px-2 py-1 rounded bg-gray-100 text-gray-700 text-xs">FINALIZADO</span>
                        @else
                            <span class="px-2 py-1 rounded bg-blue-100 text-blue-700 text-xs">ASIGNADO</span>
                        @endif
                    </td>
                    <td class="px-4 py-2">{{ \Carbon\Carbon::parse($a->created_at)->format('d/m/Y') }}</td>
                    <td class="px-4 py-2 space-x-2">
                        <a href="{{ route('asignaciones.show', $a->id_asignacion) }}" class="text-blue-600 hover:underline">Ver</a>
                        <a href="{{ route('asignaciones.edit', $a->id_asignacion) }}" class="text-yellow-600 hover:underline">Editar</a>
                        <form action="{{ route('asignaciones.destroy', $a->id_asignacion) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Eliminar esta asignación?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="px-4 py-6 text-center text-gray-500">No hay asignaciones registradas.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    </div>
</div>

<div class="mt-4">
    {{ $asignaciones->links() }}
</div>

@endsection
