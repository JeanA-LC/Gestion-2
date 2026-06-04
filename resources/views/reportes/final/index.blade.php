@extends('layouts.admin')

@section('title', 'Reportes Finales')

@section('content')

<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-5">
    <h1 class="text-lg sm:text-xl font-bold">Reportes Finales</h1>
    <a href="{{ route('reportes-final.create') }}" class="bg-slate-900 text-white px-4 py-2 rounded hover:bg-slate-700">
        + Nuevo Reporte Final
    </a>
</div>

<div class="bg-white rounded-xl shadow overflow-hidden">
    <div class="overflow-x-auto">
    <table class="w-full text-sm">
        <thead class="bg-gray-100">
            <tr>
                <th class="text-left px-4 py-3">#</th>
                <th class="text-left px-4 py-3">Personero</th>
                <th class="text-left px-4 py-3">Resumen</th>
                <th class="text-left px-4 py-3">Fecha</th>
                <th class="text-left px-4 py-3">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($reportes as $r)
                <tr class="border-t hover:bg-gray-50">
                    <td class="px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2">{{ $r->asignacion->postulacion->interesado->persona->apellidos ?? '—' }}, {{ $r->asignacion->postulacion->interesado->persona->nombres ?? '' }}</td>
                    <td class="px-4 py-2 max-w-xs truncate">{{ \Illuminate\Support\Str::limit($r->resumen, 80) }}</td>
                    <td class="px-4 py-2">{{ \Carbon\Carbon::parse($r->created_at)->format('d/m/Y H:i') }}</td>
                    <td class="px-4 py-2 space-x-2">
                        <a href="{{ route('reportes-final.show', $r->id_reporte_final) }}" class="text-blue-600 hover:underline">Ver</a>
                        <a href="{{ route('reportes-final.edit', $r->id_reporte_final) }}" class="text-yellow-600 hover:underline">Editar</a>
                        <form action="{{ route('reportes-final.destroy', $r->id_reporte_final) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Eliminar este reporte final?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-4 py-6 text-center text-gray-500">No hay reportes finales registrados.</td>
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
