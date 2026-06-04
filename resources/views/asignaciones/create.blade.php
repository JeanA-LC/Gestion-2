@extends('layouts.admin')

@section('title', 'Nueva Asignación')

@section('content')

<div class="flex items-center gap-2 mb-6">
    <a href="{{ route('asignaciones.index') }}" class="text-gray-500 hover:underline">Asignaciones</a>
    <span>/</span>
    <span>Nueva</span>
</div>

<div class="max-w-xl">
    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="text-lg font-bold mb-4">Asignar Personero</h2>

        <form action="{{ route('asignaciones.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block mb-1 font-medium">Postulación Aprobada <span class="text-red-500">*</span></label>
                <select name="id_postulacion" required
                    class="w-full border rounded px-3 py-2 @error('id_postulacion') border-red-500 @enderror">
                    <option value="">— Seleccionar Postulante —</option>
                    @foreach($postulaciones as $p)
                        <option value="{{ $p->id_postulacion }}" {{ old('id_postulacion') == $p->id_postulacion ? 'selected' : '' }}>
                            {{ $p->interesado->persona->apellidos }} {{ $p->interesado->persona->nombres }}
                        </option>
                    @endforeach
                </select>
                @error('id_postulacion') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Tipo de Personero <span class="text-red-500">*</span></label>
                <select name="id_tipo_personero" required
                    class="w-full border rounded px-3 py-2 @error('id_tipo_personero') border-red-500 @enderror">
                    <option value="">— Seleccionar Tipo —</option>
                    @foreach($tiposPersonero as $tipo)
                        <option value="{{ $tipo->id_tipo_personero }}" {{ old('id_tipo_personero') == $tipo->id_tipo_personero ? 'selected' : '' }}>
                            {{ $tipo->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('id_tipo_personero') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Nivel de Asignación <span class="text-red-500">*</span></label>
                <select name="nivel_asignacion" required
                    class="w-full border rounded px-3 py-2 @error('nivel_asignacion') border-red-500 @enderror">
                    <option value="">— Seleccionar Nivel —</option>
                    <option value="PROVINCIA" {{ old('nivel_asignacion') === 'PROVINCIA' ? 'selected' : '' }}>PROVINCIA</option>
                    <option value="DISTRITO" {{ old('nivel_asignacion') === 'DISTRITO' ? 'selected' : '' }}>DISTRITO</option>
                    <option value="ZONA" {{ old('nivel_asignacion') === 'ZONA' ? 'selected' : '' }}>ZONA</option>
                    <option value="CENTRO_VOTACION" {{ old('nivel_asignacion') === 'CENTRO_VOTACION' ? 'selected' : '' }}>CENTRO_VOTACION</option>
                    <option value="MESA_SUFRAGIO" {{ old('nivel_asignacion') === 'MESA_SUFRAGIO' ? 'selected' : '' }}>MESA_SUFRAGIO</option>
                </select>
                @error('nivel_asignacion') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">ID de Referencia</label>
                <input type="number" name="id_referencia" value="{{ old('id_referencia') }}" min="1"
                    class="w-full border rounded px-3 py-2 @error('id_referencia') border-red-500 @enderror">
                <p class="text-gray-500 text-xs mt-1">ID del elemento según el nivel seleccionado (provincia, distrito, zona, centro de votación o mesa).</p>
                @error('id_referencia') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-6">
                <label class="block mb-1 font-medium">Observación</label>
                <input type="text" name="observacion" value="{{ old('observacion') }}"
                    class="w-full border rounded px-3 py-2 @error('observacion') border-red-500 @enderror">
                @error('observacion') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex gap-3">
                <button type="submit" class="bg-slate-900 text-white px-4 py-2 rounded hover:bg-slate-700">
                    Guardar
                </button>
                <a href="{{ route('asignaciones.index') }}" class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</div>

@endsection
