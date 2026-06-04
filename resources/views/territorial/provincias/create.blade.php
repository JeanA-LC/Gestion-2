@extends('layouts.admin')

@section('title', 'Nueva Provincia')

@section('content')

<div class="max-w-lg">
    <div class="flex items-center gap-2 mb-6">
        <a href="{{ route('provincias.index') }}" class="text-gray-500 hover:text-gray-700">Provincias</a>
        <span class="text-gray-400">/</span>
        <span class="font-medium">Nueva</span>
    </div>

    <div class="bg-white rounded-xl shadow p-6">
        <form method="POST" action="{{ route('provincias.store') }}">
            @csrf

            <div class="mb-4">
                <label class="block mb-1 font-medium">Departamento</label>
                <select name="id_departamento"
                        class="w-full border rounded px-3 py-2 @error('id_departamento') border-red-500 @enderror">
                    <option value="">Seleccionar...</option>
                    @foreach($departamentos as $dep)
                        <option value="{{ $dep->id_departamento }}"
                            {{ old('id_departamento') == $dep->id_departamento ? 'selected' : '' }}>
                            {{ $dep->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('id_departamento')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Nombre de la provincia</label>
                <input type="text" name="nombre" value="{{ old('nombre') }}"
                       class="w-full border rounded px-3 py-2 @error('nombre') border-red-500 @enderror"
                       placeholder="Ej: Lima">
                @error('nombre')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-3">
                <button type="submit" class="bg-slate-900 text-white px-4 py-2 rounded hover:bg-slate-700">
                    Guardar
                </button>
                <a href="{{ route('provincias.index') }}" class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</div>

@endsection
