@extends('layouts.admin')

@section('title', 'Editar Persona')

@section('content')

<div class="flex items-center gap-2 mb-6">
    <a href="{{ route('personas.index') }}" class="text-gray-500 hover:underline">Personas</a>
    <span>/</span>
    <span>Editar</span>
</div>

<div class="max-w-xl">
    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="text-lg font-bold mb-4">Editar Persona</h2>

        <form action="{{ route('personas.update', $persona->id_persona) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block mb-1 font-medium">DNI <span class="text-red-500">*</span></label>
                <input type="text" name="dni" value="{{ old('dni', $persona->dni) }}" required
                    class="w-full border rounded px-3 py-2 @error('dni') border-red-500 @enderror">
                @error('dni') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Nombres <span class="text-red-500">*</span></label>
                <input type="text" name="nombres" value="{{ old('nombres', $persona->nombres) }}" required
                    class="w-full border rounded px-3 py-2 @error('nombres') border-red-500 @enderror">
                @error('nombres') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Apellidos <span class="text-red-500">*</span></label>
                <input type="text" name="apellidos" value="{{ old('apellidos', $persona->apellidos) }}" required
                    class="w-full border rounded px-3 py-2 @error('apellidos') border-red-500 @enderror">
                @error('apellidos') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Teléfono</label>
                <input type="text" name="telefono" value="{{ old('telefono', $persona->telefono) }}"
                    class="w-full border rounded px-3 py-2 @error('telefono') border-red-500 @enderror">
                @error('telefono') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Correo</label>
                <input type="email" name="correo" value="{{ old('correo', $persona->correo) }}"
                    class="w-full border rounded px-3 py-2 @error('correo') border-red-500 @enderror">
                @error('correo') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-6">
                <label class="block mb-1 font-medium">Dirección</label>
                <input type="text" name="direccion" value="{{ old('direccion', $persona->direccion) }}"
                    class="w-full border rounded px-3 py-2 @error('direccion') border-red-500 @enderror">
                @error('direccion') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex gap-3">
                <button type="submit" class="bg-slate-900 text-white px-4 py-2 rounded hover:bg-slate-700">
                    Actualizar
                </button>
                <a href="{{ route('personas.index') }}" class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</div>

@endsection
