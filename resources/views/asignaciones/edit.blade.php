@extends('layouts.admin')

@section('title', 'Editar Asignación')

@section('content')

<div class="flex items-center gap-2 mb-6">
    <a href="{{ route('asignaciones.index') }}" class="text-gray-500 hover:underline">Asignaciones</a>
    <span>/</span>
    <span>Editar</span>
</div>

<div class="max-w-xl">
    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="text-lg font-bold mb-4">Editar Asignación</h2>

        {{-- Personero info (readonly) --}}
        <div class="mb-4 p-3 bg-gray-50 rounded border">
            <p class="text-xs text-gray-500 uppercase tracking-wide mb-1">Personero</p>
            <p class="font-medium">{{ $asignacione->postulacion->interesado->persona->apellidos ?? '—' }}, {{ $asignacione->postulacion->interesado->persona->nombres ?? '' }}</p>
            <p class="text-sm text-gray-500">{{ $asignacione->tipoPersonero->nombre ?? '' }} — Nivel: {{ $asignacione->nivel_asignacion }}</p>
        </div>

        <form action="{{ route('asignaciones.update', $asignacione->id_asignacion) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block mb-1 font-medium">Estado <span class="text-red-500">*</span></label>
                <select name="estado" required
                    class="w-full border rounded px-3 py-2 @error('estado') border-red-500 @enderror">
                    <option value="ASIGNADO" {{ old('estado', $asignacione->estado) === 'ASIGNADO' ? 'selected' : '' }}>ASIGNADO</option>
                    <option value="CONFIRMADO" {{ old('estado', $asignacione->estado) === 'CONFIRMADO' ? 'selected' : '' }}>CONFIRMADO</option>
                    <option value="RECHAZADO" {{ old('estado', $asignacione->estado) === 'RECHAZADO' ? 'selected' : '' }}>RECHAZADO</option>
                    <option value="FINALIZADO" {{ old('estado', $asignacione->estado) === 'FINALIZADO' ? 'selected' : '' }}>FINALIZADO</option>
                </select>
                @error('estado') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-6">
                <label class="block mb-1 font-medium">Observación</label>
                <input type="text" name="observacion" value="{{ old('observacion', $asignacione->observacion) }}"
                    class="w-full border rounded px-3 py-2 @error('observacion') border-red-500 @enderror">
                @error('observacion') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex gap-3">
                <button type="submit" class="bg-slate-900 text-white px-4 py-2 rounded hover:bg-slate-700">
                    Actualizar
                </button>
                <a href="{{ route('asignaciones.index') }}" class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</div>

@endsection
