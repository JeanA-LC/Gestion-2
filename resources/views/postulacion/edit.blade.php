@extends('layouts.admin')

@section('title', 'Editar Postulación')

@section('content')

<div class="flex items-center gap-2 mb-6">
    <a href="{{ route('postulaciones.index') }}" class="text-gray-500 hover:underline">Postulaciones</a>
    <span>/</span>
    <span>Editar</span>
</div>

<div class="max-w-xl">
    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="text-lg font-bold mb-4">Editar Postulación</h2>

        {{-- Persona info (readonly) --}}
        <div class="mb-4 p-3 bg-gray-50 rounded border">
            <p class="text-xs text-gray-500 uppercase tracking-wide mb-1">Postulante</p>
            <p class="font-medium">{{ $postulacione->interesado->persona->apellidos ?? '—' }}, {{ $postulacione->interesado->persona->nombres ?? '' }}</p>
        </div>

        <form action="{{ route('postulaciones.update', $postulacione->id_postulacion) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block mb-1 font-medium">Estado <span class="text-red-500">*</span></label>
                <select name="estado" required
                    class="w-full border rounded px-3 py-2 @error('estado') border-red-500 @enderror">
                    <option value="PENDIENTE" {{ old('estado', $postulacione->estado) === 'PENDIENTE' ? 'selected' : '' }}>PENDIENTE</option>
                    <option value="APROBADO" {{ old('estado', $postulacione->estado) === 'APROBADO' ? 'selected' : '' }}>APROBADO</option>
                    <option value="RECHAZADO" {{ old('estado', $postulacione->estado) === 'RECHAZADO' ? 'selected' : '' }}>RECHAZADO</option>
                </select>
                @error('estado') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Experiencia</label>
                <textarea name="experiencia" rows="4"
                    class="w-full border rounded px-3 py-2 @error('experiencia') border-red-500 @enderror">{{ old('experiencia', $postulacione->experiencia) }}</textarea>
                @error('experiencia') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Disponibilidad</label>
                <input type="text" name="disponibilidad" value="{{ old('disponibilidad', $postulacione->disponibilidad) }}"
                    class="w-full border rounded px-3 py-2 @error('disponibilidad') border-red-500 @enderror">
                @error('disponibilidad') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="transporte_propio" value="1" {{ old('transporte_propio', $postulacione->transporte_propio) ? 'checked' : '' }}
                        class="rounded border-gray-300">
                    <span class="font-medium">Cuenta con transporte propio</span>
                </label>
                @error('transporte_propio') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-6">
                <label class="block mb-1 font-medium">Observación (historial)</label>
                <textarea name="observacion" rows="3"
                    class="w-full border rounded px-3 py-2 @error('observacion') border-red-500 @enderror"
                    placeholder="Añadir nota al historial de cambio de estado...">{{ old('observacion') }}</textarea>
                @error('observacion') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex gap-3">
                <button type="submit" class="bg-slate-900 text-white px-4 py-2 rounded hover:bg-slate-700">
                    Actualizar
                </button>
                <a href="{{ route('postulaciones.index') }}" class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</div>

@endsection
