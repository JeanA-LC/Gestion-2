@extends('layouts.admin')

@section('title', 'Zonas')

@section('content')

<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-5">
    <h1 class="text-lg sm:text-xl font-bold">Zonas</h1>
    <a href="{{ route('zonas.create') }}" class="bg-slate-900 text-white px-4 py-2 rounded hover:bg-slate-700">
        + Nueva
    </a>
</div>

<div class="bg-white rounded-xl shadow overflow-hidden">
    <div class="overflow-x-auto">
    <table class="w-full text-sm">
        <thead class="bg-gray-100">
            <tr>
                <th class="text-left px-4 py-3 w-16">#</th>
                <th class="text-left px-4 py-3">Nombre</th>
                <th class="text-left px-4 py-3">Tipo</th>
                <th class="text-left px-4 py-3">Distrito</th>
                <th class="text-left px-4 py-3">Provincia / Dpto.</th>
                <th class="text-left px-4 py-3">Descripción</th>
                <th class="text-left px-4 py-3">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($zonas as $zona)
                <tr class="border-t hover:bg-gray-50">
                    <td class="px-4 py-3 text-gray-400">{{ $zona->id_zona }}</td>
                    <td class="px-4 py-3 font-medium">{{ $zona->nombre }}</td>
                    <td class="px-4 py-3">
                        @php
                            $colores = [
                                'CENTRO_POBLADO' => 'bg-indigo-100 text-indigo-700',
                                'CASERIO'        => 'bg-green-100 text-green-700',
                                'BARRIO'         => 'bg-blue-100 text-blue-700',
                                'URBANIZACION'   => 'bg-yellow-100 text-yellow-700',
                                'SECTOR'         => 'bg-orange-100 text-orange-700',
                            ];
                            $color = $colores[$zona->tipo] ?? 'bg-gray-100 text-gray-700';
                        @endphp
                        <span class="px-2 py-1 rounded text-xs font-medium {{ $color }}">
                            {{ $zona->tipo }}
                        </span>
                    </td>
                    <td class="px-4 py-3">
                        <span class="px-2 py-1 rounded bg-blue-50 text-blue-700 text-xs font-medium">
                            {{ $zona->distrito->nombre ?? '—' }}
                        </span>
                    </td>
                    <td class="px-4 py-3 text-gray-500 text-xs">
                        {{ $zona->distrito->provincia->nombre ?? '—' }}
                        / {{ $zona->distrito->provincia->departamento->nombre ?? '—' }}
                    </td>
                    <td class="px-4 py-3 text-gray-500 max-w-xs truncate">
                        {{ $zona->descripcion ?? '—' }}
                    </td>
                    <td class="px-4 py-3 space-x-3">
                        <a href="{{ route('zonas.edit', $zona->id_zona) }}"
                           class="text-blue-600 hover:underline">Editar</a>

                        <form action="{{ route('zonas.destroy', $zona->id_zona) }}"
                              method="POST" class="inline-block"
                              onsubmit="return confirm('¿Eliminar esta zona?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="px-4 py-6 text-center text-gray-500">
                        No hay zonas registradas.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    </div>
</div>

<div class="mt-4">
    {{ $zonas->links() }}
</div>

@endsection
