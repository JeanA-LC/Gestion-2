@extends('layouts.admin')

@section('title', 'Editar Participación')

@section('content')

<div class="flex items-center gap-2 mb-6">
    <a href="{{ route('participaciones.index') }}" class="text-gray-500 hover:underline">Participaciones</a>
    <span>/</span>
    <span>Editar</span>
</div>

<div class="max-w-xl">
    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="text-lg font-bold mb-4">Editar Participación</h2>

        {{-- Readonly info --}}
        <div class="mb-4 p-3 bg-gray-50 rounded border">
            <p class="text-xs text-gray-500 uppercase tracking-wide mb-1">Interesado</p>
            <p class="font-medium">{{ $participacion->interesado->persona->apellidos ?? '—' }}, {{ $participacion->interesado->persona->nombres ?? '' }}</p>
        </div>

        <div class="mb-4 p-3 bg-gray-50 rounded border">
            <p class="text-xs text-gray-500 uppercase tracking-wide mb-1">Evento</p>
            <p class="font-medium">{{ $participacion->evento->nombre ?? '—' }}</p>
        </div>

        <form action="{{ route('participaciones.update', $participacion->id_participacion) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block mb-1 font-medium">Tipo de Contacto</label>
                <input type="text" name="tipo_contacto" value="{{ old('tipo_contacto', $participacion->tipo_contacto) }}"
                    class="w-full border rounded px-3 py-2 @error('tipo_contacto') border-red-500 @enderror">
                @error('tipo_contacto') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Resultado</label>
                <input type="text" name="resultado" value="{{ old('resultado', $participacion->resultado) }}"
                    class="w-full border rounded px-3 py-2 @error('resultado') border-red-500 @enderror">
                @error('resultado') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Nivel de Participación (1-10)</label>
                <input type="number" name="nivel_participacion" value="{{ old('nivel_participacion', $participacion->nivel_participacion) }}" min="1" max="10"
                    class="w-full border rounded px-3 py-2 @error('nivel_participacion') border-red-500 @enderror">
                @error('nivel_participacion') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Grado de Incidencia <span class="text-red-500">*</span></label>
                <select name="grado_incidencia" required
                    class="w-full border rounded px-3 py-2 @error('grado_incidencia') border-red-500 @enderror">
                    <option value="">— Seleccionar —</option>
                    <option value="BAJO" {{ old('grado_incidencia', $participacion->grado_incidencia) === 'BAJO' ? 'selected' : '' }}>BAJO</option>
                    <option value="MEDIO" {{ old('grado_incidencia', $participacion->grado_incidencia) === 'MEDIO' ? 'selected' : '' }}>MEDIO</option>
                    <option value="ALTO" {{ old('grado_incidencia', $participacion->grado_incidencia) === 'ALTO' ? 'selected' : '' }}>ALTO</option>
                </select>
                @error('grado_incidencia') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-6">
                <label class="block mb-1 font-medium">Observación</label>
                <textarea name="observacion" rows="3"
                    class="w-full border rounded px-3 py-2 @error('observacion') border-red-500 @enderror">{{ old('observacion', $participacion->observacion) }}</textarea>
                @error('observacion') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex gap-3">
                <button type="submit" class="bg-slate-900 text-white px-4 py-2 rounded hover:bg-slate-700">
                    Actualizar
                </button>
                <a href="{{ route('participaciones.index') }}" class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</div>

@endsection
