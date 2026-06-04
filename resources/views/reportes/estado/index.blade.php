@extends('layouts.admin')

@section('title', 'Reportes de Campo')

@section('content')

<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-5">
    <h1 class="text-lg sm:text-xl font-bold">Reportes de Campo</h1>
    <a href="{{ route('reportes-estado.create') }}" class="bg-slate-900 text-white px-4 py-2 rounded hover:bg-slate-700">
        + Nuevo Reporte
    </a>
</div>

<div class="bg-white rounded-xl shadow overflow-hidden">
    <div class="overflow-x-auto">
    <table class="w-full text-sm">
        <thead class="bg-gray-100">
            <tr>
                <th class="text-left px-4 py-3">#</th>
                <th class="text-left px-4 py-3">Personero</th>
                <th class="text-left px-4 py-3">Estado General</th>
                <th class="text-left px-4 py-3">Observación</th>
                <th class="text-left px-4 py-3">Fecha</th>
                <th class="text-left px-4 py-3">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($reportes as $r)
                <tr class="border-t hover:bg-gray-50">
                    <td class="px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2">{{ $r->asignacion->postulacion->interesado->persona->apellidos ?? '—' }}, {{ $r->asignacion->postulacion->interesado->persona->nombres ?? '' }}</td>
                    <td class="px-4 py-2">
                        @if($r->estado_general === 'SIN_NOVEDAD')
                            <span class="px-2 py-1 rounded bg-green-100 text-green-700 text-xs">SIN_NOVEDAD</span>
                        @elseif($r->estado_general === 'OBSERVACION')
                            <span class="px-2 py-1 rounded bg-yellow-100 text-yellow-700 text-xs">OBSERVACION</span>
                        @elseif($r->estado_general === 'INCIDENCIA')
                            <span class="px-2 py-1 rounded bg-orange-100 text-orange-700 text-xs">INCIDENCIA</span>
                        @else
                            <span class="px-2 py-1 rounded bg-red-100 text-red-700 text-xs">CRITICO</span>
                        @endif
                    </td>
                    <td class="px-4 py-2 max-w-xs truncate">{{ $r->observacion ?? '—' }}</td>
                    <td class="px-4 py-2">{{ \Carbon\Carbon::parse($r->created_at)->format('d/m/Y H:i') }}</td>
                    <td class="px-4 py-2 space-x-2">
                        <a href="{{ route('reportes-estado.edit', $r->id_reporte_estado) }}" class="text-yellow-600 hover:underline">Editar</a>
                        <form action="{{ route('reportes-estado.destroy', $r->id_reporte_estado) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Eliminar este reporte?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-4 py-6 text-center text-gray-500">No hay reportes de campo registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    </div>
</div>

<div class="mt-4">
    {{ $reportes->links() }}
</div>

@endsection
