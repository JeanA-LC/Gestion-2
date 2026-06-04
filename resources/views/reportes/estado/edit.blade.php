@extends('layouts.admin')

@section('title', 'Editar Reporte de Campo')

@section('content')

<div class="flex items-center gap-2 mb-6">
    <a href="{{ route('reportes-estado.index') }}" class="text-gray-500 hover:underline">Reportes de Campo</a>
    <span>/</span>
    <span>Editar</span>
</div>

<div class="max-w-xl">
    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="text-lg font-bold mb-4">Editar Reporte de Campo</h2>

        {{-- Personero info (readonly) --}}
        <div class="mb-4 p-3 bg-gray-50 rounded border">
            <p class="text-xs text-gray-500 uppercase tracking-wide mb-1">Personero</p>
            <p class="font-medium">
                {{ $reportesEstado->asignacion->postulacion->interesado->persona->apellidos ?? '—' }},
                {{ $reportesEstado->asignacion->postulacion->interesado->persona->nombres ?? '' }}
            </p>
        </div>

        <form action="{{ route('reportes-estado.update', $reportesEstado->id_reporte_estado) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block mb-1 font-medium">Estado General <span class="text-red-500">*</span></label>
                <select name="estado_general" required
                    class="w-full border rounded px-3 py-2 @error('estado_general') border-red-500 @enderror">
                    <option value="">— Seleccionar Estado —</option>
                    <option value="SIN_NOVEDAD" {{ old('estado_general', $reportesEstado->estado_general) === 'SIN_NOVEDAD' ? 'selected' : '' }}>SIN_NOVEDAD</option>
                    <option value="OBSERVACION" {{ old('estado_general', $reportesEstado->estado_general) === 'OBSERVACION' ? 'selected' : '' }}>OBSERVACION</option>
                    <option value="INCIDENCIA" {{ old('estado_general', $reportesEstado->estado_general) === 'INCIDENCIA' ? 'selected' : '' }}>INCIDENCIA</option>
                    <option value="CRITICO" {{ old('estado_general', $reportesEstado->estado_general) === 'CRITICO' ? 'selected' : '' }}>CRITICO</option>
                </select>
                @error('estado_general') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-6">
                <label class="block mb-1 font-medium">Observación</label>
                <textarea name="observacion" rows="4"
                    class="w-full border rounded px-3 py-2 @error('observacion') border-red-500 @enderror">{{ old('observacion', $reportesEstado->observacion) }}</textarea>
                @error('observacion') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex gap-3">
                <button type="submit" class="bg-slate-900 text-white px-4 py-2 rounded hover:bg-slate-700">
                    Actualizar
                </button>
                <a href="{{ route('reportes-estado.index') }}" class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</div>

@endsection
