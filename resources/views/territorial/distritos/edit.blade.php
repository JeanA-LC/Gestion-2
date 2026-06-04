@extends('layouts.admin')

@section('title', 'Editar Distrito')

@section('content')

<div class="max-w-lg">
    <div class="flex items-center gap-2 mb-6">
        <a href="{{ route('distritos.index') }}" class="text-gray-500 hover:text-gray-700">Distritos</a>
        <span class="text-gray-400">/</span>
        <span class="font-medium">Editar</span>
    </div>

    <div class="bg-white rounded-xl shadow p-6">
        <form method="POST" action="{{ route('distritos.update', $distrito->id_distrito) }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block mb-1 font-medium">Provincia</label>
                <select name="id_provincia"
                        class="w-full border rounded px-3 py-2 @error('id_provincia') border-red-500 @enderror">
                    <option value="">Seleccionar...</option>
                    @foreach($provincias as $provincia)
                        <option value="{{ $provincia->id_provincia }}"
                            {{ old('id_provincia', $distrito->id_provincia) == $provincia->id_provincia ? 'selected' : '' }}>
                            {{ $provincia->nombre }}
                            ({{ $provincia->departamento->nombre ?? '?' }})
                        </option>
                    @endforeach
                </select>
                @error('id_provincia')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Nombre del distrito</label>
                <input type="text" name="nombre"
                       value="{{ old('nombre', $distrito->nombre) }}"
                       class="w-full border rounded px-3 py-2 @error('nombre') border-red-500 @enderror"
                       placeholder="Ej: Miraflores">
                @error('nombre')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Ubigeo <span class="text-gray-400 font-normal">(6 dígitos)</span></label>
                <input type="text" name="ubigeo"
                       value="{{ old('ubigeo', $distrito->ubigeo) }}"
                       class="w-full border rounded px-3 py-2 font-mono @error('ubigeo') border-red-500 @enderror"
                       placeholder="Ej: 150101" maxlength="6">
                @error('ubigeo')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-3">
                <button type="submit" class="bg-slate-900 text-white px-4 py-2 rounded hover:bg-slate-700">
                    Actualizar
                </button>
                <a href="{{ route('distritos.index') }}" class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</div>

@endsection
