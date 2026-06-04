@extends('layouts.admin')

@section('title', 'Credenciales')

@section('content')

<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-5">
    <h1 class="text-lg sm:text-xl font-bold">Credenciales</h1>
</div>

{{-- Emitir nueva credencial --}}
<div class="bg-white rounded-xl shadow p-6 mb-6 max-w-xl">
    <h2 class="text-base font-bold mb-4">Emitir Nueva Credencial</h2>
    <form action="{{ route('credenciales.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block mb-1 font-medium">Postulación Aprobada <span class="text-red-500">*</span></label>
            <select name="id_postulacion" required
                class="w-full border rounded px-3 py-2 @error('id_postulacion') border-red-500 @enderror">
                <option value="">— Seleccionar Postulación —</option>
                @foreach($postulaciones as $p)
                    <option value="{{ $p->id_postulacion }}" {{ old('id_postulacion') == $p->id_postulacion ? 'selected' : '' }}>
                        {{ $p->interesado->persona->apellidos ?? '—' }}, {{ $p->interesado->persona->nombres ?? '' }}
                    </option>
                @endforeach
            </select>
            @error('id_postulacion') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Fecha de Emisión <span class="text-red-500">*</span></label>
            <input type="date" name="fecha_emision" value="{{ old('fecha_emision') }}" required
                class="w-full border rounded px-3 py-2 @error('fecha_emision') border-red-500 @enderror">
            @error('fecha_emision') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Fecha de Vencimiento <span class="text-red-500">*</span></label>
            <input type="date" name="fecha_vencimiento" value="{{ old('fecha_vencimiento') }}" required
                class="w-full border rounded px-3 py-2 @error('fecha_vencimiento') border-red-500 @enderror">
            @error('fecha_vencimiento') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="bg-slate-900 text-white px-4 py-2 rounded hover:bg-slate-700">
            Emitir Credencial
        </button>
    </form>
</div>

{{-- Listado --}}
<div class="bg-white rounded-xl shadow overflow-hidden">
    <div class="overflow-x-auto">
    <table class="w-full text-sm">
        <thead class="bg-gray-100">
            <tr>
                <th class="text-left px-4 py-3">#</th>
                <th class="text-left px-4 py-3">Persona</th>
                <th class="text-left px-4 py-3">Código QR</th>
                <th class="text-left px-4 py-3">Estado</th>
                <th class="text-left px-4 py-3">Emisión</th>
                <th class="text-left px-4 py-3">Vencimiento</th>
                <th class="text-left px-4 py-3">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($credenciales as $c)
                <tr class="border-t hover:bg-gray-50">
                    <td class="px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2">{{ $c->postulacion->interesado->persona->apellidos ?? '—' }}, {{ $c->postulacion->interesado->persona->nombres ?? '' }}</td>
                    <td class="px-4 py-2 font-mono text-xs">{{ $c->codigo_qr }}</td>
                    <td class="px-4 py-2">
                        @if($c->estado === 'ACTIVA')
                            <span class="px-2 py-1 rounded bg-green-100 text-green-700 text-xs">ACTIVA</span>
                        @elseif($c->estado === 'VENCIDA')
                            <span class="px-2 py-1 rounded bg-yellow-100 text-yellow-700 text-xs">VENCIDA</span>
                        @else
                            <span class="px-2 py-1 rounded bg-red-100 text-red-700 text-xs">ANULADA</span>
                        @endif
                    </td>
                    <td class="px-4 py-2">{{ $c->fecha_emision ? \Carbon\Carbon::parse($c->fecha_emision)->format('d/m/Y') : '—' }}</td>
                    <td class="px-4 py-2">{{ $c->fecha_vencimiento ? \Carbon\Carbon::parse($c->fecha_vencimiento)->format('d/m/Y') : '—' }}</td>
                    <td class="px-4 py-2">
                        <a href="{{ route('credenciales.show', $c->id_credencial) }}" class="text-blue-600 hover:underline">Ver</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="px-4 py-6 text-center text-gray-500">No hay credenciales emitidas.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    </div>
</div>

<div class="mt-4">
    {{ $credenciales->links() }}
</div>

@endsection
