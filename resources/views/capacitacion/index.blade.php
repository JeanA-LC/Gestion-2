@extends('layouts.admin')

@section('title', 'Capacitaciones')

@section('content')

<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-5">
    <h1 class="text-lg sm:text-xl font-bold">Capacitaciones</h1>
    <a href="{{ route('capacitaciones.create') }}" class="bg-slate-900 text-white px-4 py-2 rounded hover:bg-slate-700">
        + Nueva Capacitación
    </a>
</div>

<div class="bg-white rounded-xl shadow overflow-hidden">
    <div class="overflow-x-auto">
    <table class="w-full text-sm">
        <thead class="bg-gray-100">
            <tr>
                <th class="text-left px-4 py-3">#</th>
                <th class="text-left px-4 py-3">Nombre</th>
                <th class="text-left px-4 py-3">Duración (minutos)</th>
                <th class="text-left px-4 py-3">URL Video</th>
                <th class="text-left px-4 py-3">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($capacitaciones as $c)
                <tr class="border-t hover:bg-gray-50">
                    <td class="px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2">{{ $c->nombre }}</td>
                    <td class="px-4 py-2">{{ $c->duracion_minutos ?? '—' }}</td>
                    <td class="px-4 py-2">
                        @if($c->url_video)
                            <a href="{{ $c->url_video }}" target="_blank" class="text-blue-600 hover:underline">Ver video</a>
                        @else
                            —
                        @endif
                    </td>
                    <td class="px-4 py-2 space-x-2">
                        <a href="{{ route('capacitaciones.edit', $c->id_capacitacion) }}" class="text-yellow-600 hover:underline">Editar</a>
                        <form action="{{ route('capacitaciones.destroy', $c->id_capacitacion) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Eliminar esta capacitación?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-4 py-6 text-center text-gray-500">No hay capacitaciones registradas.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    </div>
</div>

<div class="mt-4">
    {{ $capacitaciones->links() }}
</div>

@endsection
