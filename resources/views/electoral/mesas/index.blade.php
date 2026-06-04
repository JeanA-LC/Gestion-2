@extends('layouts.admin')

@section('title', 'Mesas de Sufragio')

@section('content')

<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-5">
    <h1 class="text-lg sm:text-xl font-bold">Mesas de Sufragio</h1>
    <a href="{{ route('mesas-sufragio.create') }}" class="bg-slate-900 text-white px-4 py-2 rounded hover:bg-slate-700">
        + Nueva Mesa
    </a>
</div>

<div class="bg-white rounded-xl shadow overflow-hidden">
    <div class="overflow-x-auto">
    <table class="w-full text-sm">
        <thead class="bg-gray-100">
            <tr>
                <th class="text-left px-4 py-3">#</th>
                <th class="text-left px-4 py-3">Código Mesa</th>
                <th class="text-left px-4 py-3">Centro de Votación</th>
                <th class="text-left px-4 py-3">Zona</th>
                <th class="text-left px-4 py-3">Electores</th>
                <th class="text-left px-4 py-3">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($mesas as $m)
                <tr class="border-t hover:bg-gray-50">
                    <td class="px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2 font-mono">{{ $m->codigo_mesa }}</td>
                    <td class="px-4 py-2">{{ $m->centroVotacion->nombre ?? '—' }}</td>
                    <td class="px-4 py-2">{{ $m->centroVotacion->zona->nombre ?? '—' }}</td>
                    <td class="px-4 py-2">{{ $m->electores ?? '—' }}</td>
                    <td class="px-4 py-2 space-x-2">
                        <a href="{{ route('mesas-sufragio.edit', $m->id_mesa) }}" class="text-yellow-600 hover:underline">Editar</a>
                        <form action="{{ route('mesas-sufragio.destroy', $m->id_mesa) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Eliminar esta mesa?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-4 py-6 text-center text-gray-500">No hay mesas registradas.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    </div>
</div>

<div class="mt-4">
    {{ $mesas->links() }}
</div>

@endsection
