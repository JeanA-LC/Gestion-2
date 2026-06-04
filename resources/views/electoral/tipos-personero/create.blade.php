@extends('layouts.admin')

@section('title', 'Nuevo Tipo de Personero')

@section('content')

<div class="flex items-center gap-2 mb-6">
    <a href="{{ route('tipos-personero.index') }}" class="text-gray-500 hover:underline">Tipos de Personero</a>
    <span>/</span>
    <span>Nuevo</span>
</div>

<div class="max-w-xl">
    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="text-lg font-bold mb-4">Registrar Tipo de Personero</h2>

        <form action="{{ route('tipos-personero.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block mb-1 font-medium">Nombre <span class="text-red-500">*</span></label>
                <input type="text" name="nombre" value="{{ old('nombre') }}" required
                    class="w-full border rounded px-3 py-2 @error('nombre') border-red-500 @enderror">
                @error('nombre') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Nivel Correspondiente <span class="text-red-500">*</span></label>
                <select name="nivel_correspondiente" required
                    class="w-full border rounded px-3 py-2 @error('nivel_correspondiente') border-red-500 @enderror">
                    <option value="">— Seleccionar Nivel —</option>
                    <option value="PROVINCIA" {{ old('nivel_correspondiente') === 'PROVINCIA' ? 'selected' : '' }}>PROVINCIA</option>
                    <option value="DISTRITO" {{ old('nivel_correspondiente') === 'DISTRITO' ? 'selected' : '' }}>DISTRITO</option>
                    <option value="ZONA" {{ old('nivel_correspondiente') === 'ZONA' ? 'selected' : '' }}>ZONA</option>
                    <option value="CENTRO_VOTACION" {{ old('nivel_correspondiente') === 'CENTRO_VOTACION' ? 'selected' : '' }}>CENTRO_VOTACION</option>
                    <option value="MESA_SUFRAGIO" {{ old('nivel_correspondiente') === 'MESA_SUFRAGIO' ? 'selected' : '' }}>MESA_SUFRAGIO</option>
                </select>
                @error('nivel_correspondiente') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-6">
                <label class="block mb-1 font-medium">Descripción</label>
                <textarea name="descripcion" rows="3"
                    class="w-full border rounded px-3 py-2 @error('descripcion') border-red-500 @enderror">{{ old('descripcion') }}</textarea>
                @error('descripcion') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex gap-3">
                <button type="submit" class="bg-slate-900 text-white px-4 py-2 rounded hover:bg-slate-700">
                    Guardar
                </button>
                <a href="{{ route('tipos-personero.index') }}" class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</div>

@endsection
