@extends('layouts.admin')

@section('title', 'Nuevo Reporte Final')

@section('content')

<div class="flex items-center gap-2 mb-6">
    <a href="{{ route('reportes-final.index') }}" class="text-gray-500 hover:underline">Reportes Finales</a>
    <span>/</span>
    <span>Nuevo</span>
</div>

<div class="max-w-xl">
    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="text-lg font-bold mb-4">Registrar Reporte Final</h2>

        <form action="{{ route('reportes-final.store') }}" method="POST">
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
                <label class="block mb-1 font-medium">Resumen <span class="text-red-500">*</span></label>
                <textarea name="resumen" rows="5" required
                    class="w-full border rounded px-3 py-2 @error('resumen') border-red-500 @enderror">{{ old('resumen') }}</textarea>
                @error('resumen') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Incidencias</label>
                <textarea name="incidencias" rows="3"
                    class="w-full border rounded px-3 py-2 @error('incidencias') border-red-500 @enderror">{{ old('incidencias') }}</textarea>
                @error('incidencias') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-6">
                <label class="block mb-1 font-medium">Archivo / Acta</label>
                <input type="text" name="archivo_acta" value="{{ old('archivo_acta') }}"
                    class="w-full border rounded px-3 py-2 @error('archivo_acta') border-red-500 @enderror"
                    placeholder="Ruta o nombre del archivo...">
                @error('archivo_acta') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex gap-3">
                <button type="submit" class="bg-slate-900 text-white px-4 py-2 rounded hover:bg-slate-700">
                    Guardar
                </button>
                <a href="{{ route('reportes-final.index') }}" class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</div>

@endsection
