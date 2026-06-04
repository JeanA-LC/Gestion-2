@extends('layouts.admin')

@section('title', 'Nueva Participación')

@section('content')

<div class="flex items-center gap-2 mb-6">
    <a href="{{ route('participaciones.index') }}" class="text-gray-500 hover:underline">Participaciones</a>
    <span>/</span>
    <span>Nueva</span>
</div>

<div class="max-w-xl">
    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="text-lg font-bold mb-4">Registrar Participación</h2>

        <form action="{{ route('participaciones.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block mb-1 font-medium">Interesado <span class="text-red-500">*</span></label>
                <select name="id_interesado" required
                    class="w-full border rounded px-3 py-2 @error('id_interesado') border-red-500 @enderror">
                    <option value="">— Seleccionar Interesado —</option>
                    @foreach($interesados as $interesado)
                        <option value="{{ $interesado->id_interesado }}" {{ old('id_interesado') == $interesado->id_interesado ? 'selected' : '' }}>
                            {{ $interesado->persona->apellidos }} {{ $interesado->persona->nombres }}
                        </option>
                    @endforeach
                </select>
                @error('id_interesado') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Evento <span class="text-red-500">*</span></label>
                <select name="id_evento" required
                    class="w-full border rounded px-3 py-2 @error('id_evento') border-red-500 @enderror">
                    <option value="">— Seleccionar Evento —</option>
                    @foreach($eventos as $evento)
                        <option value="{{ $evento->id_evento }}" {{ old('id_evento') == $evento->id_evento ? 'selected' : '' }}>
                            {{ $evento->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('id_evento') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Tipo de Contacto</label>
                <input type="text" name="tipo_contacto" value="{{ old('tipo_contacto') }}"
                    class="w-full border rounded px-3 py-2 @error('tipo_contacto') border-red-500 @enderror">
                @error('tipo_contacto') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Resultado</label>
                <input type="text" name="resultado" value="{{ old('resultado') }}"
                    class="w-full border rounded px-3 py-2 @error('resultado') border-red-500 @enderror">
                @error('resultado') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Nivel de Participación (1-10)</label>
                <input type="number" name="nivel_participacion" value="{{ old('nivel_participacion') }}" min="1" max="10"
                    class="w-full border rounded px-3 py-2 @error('nivel_participacion') border-red-500 @enderror">
                @error('nivel_participacion') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Grado de Incidencia <span class="text-red-500">*</span></label>
                <select name="grado_incidencia" required
                    class="w-full border rounded px-3 py-2 @error('grado_incidencia') border-red-500 @enderror">
                    <option value="">— Seleccionar —</option>
                    <option value="BAJO" {{ old('grado_incidencia') === 'BAJO' ? 'selected' : '' }}>BAJO</option>
                    <option value="MEDIO" {{ old('grado_incidencia') === 'MEDIO' ? 'selected' : '' }}>MEDIO</option>
                    <option value="ALTO" {{ old('grado_incidencia') === 'ALTO' ? 'selected' : '' }}>ALTO</option>
                </select>
                @error('grado_incidencia') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-6">
                <label class="block mb-1 font-medium">Observación</label>
                <textarea name="observacion" rows="3"
                    class="w-full border rounded px-3 py-2 @error('observacion') border-red-500 @enderror">{{ old('observacion') }}</textarea>
                @error('observacion') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex gap-3">
                <button type="submit" class="bg-slate-900 text-white px-4 py-2 rounded hover:bg-slate-700">
                    Guardar
                </button>
                <a href="{{ route('participaciones.index') }}" class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</div>

@endsection
