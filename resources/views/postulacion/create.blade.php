@extends('layouts.admin')

@section('title', 'Nueva Postulación')

@section('content')

<div class="flex items-center gap-2 mb-6">
    <a href="{{ route('postulaciones.index') }}" class="text-gray-500 hover:underline">Postulaciones</a>
    <span>/</span>
    <span>Nueva</span>
</div>

<div class="max-w-xl">
    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="text-lg font-bold mb-4">Registrar Postulación</h2>

        <form action="{{ route('postulaciones.store') }}" method="POST">
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
                <label class="block mb-1 font-medium">Experiencia</label>
                <textarea name="experiencia" rows="4"
                    class="w-full border rounded px-3 py-2 @error('experiencia') border-red-500 @enderror">{{ old('experiencia') }}</textarea>
                @error('experiencia') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Disponibilidad</label>
                <input type="text" name="disponibilidad" value="{{ old('disponibilidad') }}"
                    class="w-full border rounded px-3 py-2 @error('disponibilidad') border-red-500 @enderror">
                @error('disponibilidad') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-6">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="transporte_propio" value="1" {{ old('transporte_propio') ? 'checked' : '' }}
                        class="rounded border-gray-300">
                    <span class="font-medium">Cuenta con transporte propio</span>
                </label>
                @error('transporte_propio') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex gap-3">
                <button type="submit" class="bg-slate-900 text-white px-4 py-2 rounded hover:bg-slate-700">
                    Guardar
                </button>
                <a href="{{ route('postulaciones.index') }}" class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</div>

@endsection
