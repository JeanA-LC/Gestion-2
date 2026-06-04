@extends('layouts.admin')

@section('title', 'Nueva Mesa de Sufragio')

@section('content')

<div class="flex items-center gap-2 mb-6">
    <a href="{{ route('mesas-sufragio.index') }}" class="text-gray-500 hover:underline">Mesas de Sufragio</a>
    <span>/</span>
    <span>Nueva</span>
</div>

<div class="max-w-xl">
    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="text-lg font-bold mb-4">Registrar Mesa de Sufragio</h2>

        <form action="{{ route('mesas-sufragio.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block mb-1 font-medium">Centro de Votación <span class="text-red-500">*</span></label>
                <select name="id_centro_votacion" required
                    class="w-full border rounded px-3 py-2 @error('id_centro_votacion') border-red-500 @enderror">
                    <option value="">— Seleccionar Centro —</option>
                    @foreach($centros as $centro)
                        <option value="{{ $centro->id_centro_votacion }}" {{ old('id_centro_votacion') == $centro->id_centro_votacion ? 'selected' : '' }}>
                            {{ $centro->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('id_centro_votacion') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Código de Mesa <span class="text-red-500">*</span></label>
                <input type="text" name="codigo_mesa" value="{{ old('codigo_mesa') }}" required
                    class="w-full border rounded px-3 py-2 @error('codigo_mesa') border-red-500 @enderror">
                @error('codigo_mesa') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-6">
                <label class="block mb-1 font-medium">Número de Electores</label>
                <input type="number" name="electores" value="{{ old('electores') }}" min="0"
                    class="w-full border rounded px-3 py-2 @error('electores') border-red-500 @enderror">
                @error('electores') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex gap-3">
                <button type="submit" class="bg-slate-900 text-white px-4 py-2 rounded hover:bg-slate-700">
                    Guardar
                </button>
                <a href="{{ route('mesas-sufragio.index') }}" class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</div>

@endsection
