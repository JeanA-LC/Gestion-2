@extends('layouts.admin')

@section('title', 'Editar Centro de Votación')

@section('content')

<div class="flex items-center gap-2 mb-6">
    <a href="{{ route('centros-votacion.index') }}" class="text-gray-500 hover:underline">Centros de Votación</a>
    <span>/</span>
    <span>Editar</span>
</div>

<div class="max-w-xl">
    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="text-lg font-bold mb-4">Editar Centro de Votación</h2>

        <form action="{{ route('centros-votacion.update', $centrosVotacion->id_centro_votacion) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block mb-1 font-medium">Zona <span class="text-red-500">*</span></label>
                <select name="id_zona" required
                    class="w-full border rounded px-3 py-2 @error('id_zona') border-red-500 @enderror">
                    <option value="">— Seleccionar Zona —</option>
                    @foreach($zonas as $zona)
                        <option value="{{ $zona->id_zona }}" {{ old('id_zona', $centrosVotacion->id_zona) == $zona->id_zona ? 'selected' : '' }}>
                            {{ $zona->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('id_zona') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Nombre <span class="text-red-500">*</span></label>
                <input type="text" name="nombre" value="{{ old('nombre', $centrosVotacion->nombre) }}" required
                    class="w-full border rounded px-3 py-2 @error('nombre') border-red-500 @enderror">
                @error('nombre') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Dirección</label>
                <input type="text" name="direccion" value="{{ old('direccion', $centrosVotacion->direccion) }}"
                    class="w-full border rounded px-3 py-2 @error('direccion') border-red-500 @enderror">
                @error('direccion') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Latitud</label>
                <input type="number" name="latitud" value="{{ old('latitud', $centrosVotacion->latitud) }}" step="any"
                    class="w-full border rounded px-3 py-2 @error('latitud') border-red-500 @enderror">
                @error('latitud') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-6">
                <label class="block mb-1 font-medium">Longitud</label>
                <input type="number" name="longitud" value="{{ old('longitud', $centrosVotacion->longitud) }}" step="any"
                    class="w-full border rounded px-3 py-2 @error('longitud') border-red-500 @enderror">
                @error('longitud') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex gap-3">
                <button type="submit" class="bg-slate-900 text-white px-4 py-2 rounded hover:bg-slate-700">
                    Actualizar
                </button>
                <a href="{{ route('centros-votacion.index') }}" class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</div>

@endsection
