@extends('layouts.admin')

@section('title', 'Editar Comité')

@section('content')

<div class="flex items-center gap-2 mb-6">
    <a href="{{ route('comites.index') }}" class="text-gray-500 hover:underline">Comités</a>
    <span>/</span>
    <span>Editar</span>
</div>

<div class="max-w-xl">
    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="text-lg font-bold mb-4">Editar Comité</h2>

        <form action="{{ route('comites.update', $comite->id_comite) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block mb-1 font-medium">Nombre <span class="text-red-500">*</span></label>
                <input type="text" name="nombre" value="{{ old('nombre', $comite->nombre) }}" required
                    class="w-full border rounded px-3 py-2 @error('nombre') border-red-500 @enderror">
                @error('nombre') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Zona</label>
                <select name="id_zona"
                    class="w-full border rounded px-3 py-2 @error('id_zona') border-red-500 @enderror">
                    <option value="">— Seleccionar Zona —</option>
                    @foreach($zonas as $zona)
                        <option value="{{ $zona->id_zona }}" {{ old('id_zona', $comite->id_zona) == $zona->id_zona ? 'selected' : '' }}>
                            {{ $zona->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('id_zona') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Responsable</label>
                <input type="text" name="responsable" value="{{ old('responsable', $comite->responsable) }}"
                    class="w-full border rounded px-3 py-2 @error('responsable') border-red-500 @enderror">
                @error('responsable') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-6">
                <label class="block mb-1 font-medium">Observación</label>
                <textarea name="observacion" rows="3"
                    class="w-full border rounded px-3 py-2 @error('observacion') border-red-500 @enderror">{{ old('observacion', $comite->observacion) }}</textarea>
                @error('observacion') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex gap-3">
                <button type="submit" class="bg-slate-900 text-white px-4 py-2 rounded hover:bg-slate-700">
                    Actualizar
                </button>
                <a href="{{ route('comites.index') }}" class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</div>

@endsection
