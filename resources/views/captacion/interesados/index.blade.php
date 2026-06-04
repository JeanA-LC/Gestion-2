@extends('layouts.admin')

@section('title', 'Interesados')

@section('content')

<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-5">
    <h1 class="text-lg sm:text-xl font-bold">Interesados</h1>
    <a href="{{ route('interesados.create') }}" class="bg-slate-900 text-white px-4 py-2 rounded hover:bg-slate-700">
        + Nuevo Interesado
    </a>
</div>

<div class="bg-white rounded-xl shadow overflow-hidden">
    <div class="overflow-x-auto">
    <table class="w-full text-sm">
        <thead class="bg-gray-100">
            <tr>
                <th class="text-left px-4 py-3">#</th>
                <th class="text-left px-4 py-3">Persona</th>
                <th class="text-left px-4 py-3">Tipo Actor</th>
                <th class="text-left px-4 py-3">Comité</th>
                <th class="text-left px-4 py-3">Fecha Registro</th>
                <th class="text-left px-4 py-3">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($interesados as $i)
                <tr class="border-t hover:bg-gray-50">
                    <td class="px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2">{{ $i->persona->apellidos }}, {{ $i->persona->nombres }}</td>
                    <td class="px-4 py-2">{{ $i->tipoActor->nombre }}</td>
                    <td class="px-4 py-2">{{ $i->comite->nombre ?? 'Sin comité' }}</td>
                    <td class="px-4 py-2">{{ \Carbon\Carbon::parse($i->created_at)->format('d/m/Y') }}</td>
                    <td class="px-4 py-2 space-x-2">
                        <a href="{{ route('interesados.show', $i->id_interesado) }}" class="text-blue-600 hover:underline">Ver</a>
                        <a href="{{ route('interesados.edit', $i->id_interesado) }}" class="text-yellow-600 hover:underline">Editar</a>
                        <form action="{{ route('interesados.destroy', $i->id_interesado) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Eliminar este interesado?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-4 py-6 text-center text-gray-500">No hay interesados registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    </div>
</div>

<div class="mt-4">
    {{ $interesados->links() }}
</div>

@endsection
