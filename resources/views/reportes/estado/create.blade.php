@extends('layouts.admin')

@section('title', 'Nuevo Reporte de Campo')

@section('content')

<div class="flex items-center gap-2 mb-6">
    <a href="{{ route('reportes-estado.index') }}" class="text-gray-500 hover:underline">Reportes de Campo</a>
    <span>/</span>
    <span>Nuevo</span>
</div>

<div class="max-w-xl">
    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="text-lg font-bold mb-4">Registrar Reporte de Campo</h2>

        <form action="{{ route('reportes-estado.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block mb-1 font-medium">Asignación (Personero) <span class="text-red-500">*</span></label>
                <select name="id_asignacion" required
                    class="w-full border rounded px-3 py-2 @error('id_asignacion') border-red-500 @enderror">
                    <option value="">— Seleccionar Asignación —</option>
                    @foreach($asignaciones as $asignacion)
                        <option value="{{ $asignacion->id_asignacion }}" {{ old('id_asignacion') == $asignacion->id_asignacion ? 'selected' : '' }}>
                            {{ $asignacion->postulacion->interesado->persona->apellidos ?? '—' }}, {{ $asignacion->postulacion->interesado->persona->nombres ?? '' }}
                            — {{ $asignacion->nivel_asignacion }}
                        </option>
                    @endforeach
                </select>
                @error('id_asignacion') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Estado General <span class="text-red-500">*</span></label>
                <select name="estado_general" required
                    class="w-full border rounded px-3 py-2 @error('estado_general') border-red-500 @enderror">
                    <option value="">— Seleccionar Estado —</option>
                    <option value="SIN_NOVEDAD" {{ old('estado_general') === 'SIN_NOVEDAD' ? 'selected' : '' }}>SIN_NOVEDAD</option>
                    <option value="OBSERVACION" {{ old('estado_general') === 'OBSERVACION' ? 'selected' : '' }}>OBSERVACION</option>
                    <option value="INCIDENCIA" {{ old('estado_general') === 'INCIDENCIA' ? 'selected' : '' }}>INCIDENCIA</option>
                    <option value="CRITICO" {{ old('estado_general') === 'CRITICO' ? 'selected' : '' }}>CRITICO</option>
                </select>
                @error('estado_general') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-6">
                <label class="block mb-1 font-medium">Observación</label>
                <textarea name="observacion" rows="4"
                    class="w-full border rounded px-3 py-2 @error('observacion') border-red-500 @enderror">{{ old('observacion') }}</textarea>
                @error('observacion') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex gap-3">
                <button type="submit" class="bg-slate-900 text-white px-4 py-2 rounded hover:bg-slate-700">
                    Guardar
                </button>
                <a href="{{ route('reportes-estado.index') }}" class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</div>

@endsection
