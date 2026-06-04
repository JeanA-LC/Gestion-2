@extends('layouts.admin')

@section('title', 'Nuevo Evento')

@section('content')

<div class="flex items-center gap-2 mb-6">
    <a href="{{ route('eventos.index') }}" class="text-gray-500 hover:underline">Eventos</a>
    <span>/</span>
    <span>Nuevo</span>
</div>

<div class="max-w-xl">
    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="text-lg font-bold mb-4">Registrar Evento</h2>

        <form action="{{ route('eventos.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block mb-1 font-medium">Tipo de Evento <span class="text-red-500">*</span></label>
                <select name="id_tipo_evento" required
                    class="w-full border rounded px-3 py-2 @error('id_tipo_evento') border-red-500 @enderror">
                    <option value="">— Seleccionar Tipo —</option>
                    @foreach($tipos as $tipo)
                        <option value="{{ $tipo->id_tipo_evento }}" {{ old('id_tipo_evento') == $tipo->id_tipo_evento ? 'selected' : '' }}>
                            {{ $tipo->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('id_tipo_evento') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Nombre <span class="text-red-500">*</span></label>
                <input type="text" name="nombre" value="{{ old('nombre') }}" required
                    class="w-full border rounded px-3 py-2 @error('nombre') border-red-500 @enderror">
                @error('nombre') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Descripción</label>
                <textarea name="descripcion" rows="3"
                    class="w-full border rounded px-3 py-2 @error('descripcion') border-red-500 @enderror">{{ old('descripcion') }}</textarea>
                @error('descripcion') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Fecha Inicio</label>
                <input type="datetime-local" name="fecha_inicio" value="{{ old('fecha_inicio') }}"
                    class="w-full border rounded px-3 py-2 @error('fecha_inicio') border-red-500 @enderror">
                @error('fecha_inicio') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Fecha Fin</label>
                <input type="datetime-local" name="fecha_fin" value="{{ old('fecha_fin') }}"
                    class="w-full border rounded px-3 py-2 @error('fecha_fin') border-red-500 @enderror">
                @error('fecha_fin') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Lugar</label>
                <input type="text" name="lugar" value="{{ old('lugar') }}"
                    class="w-full border rounded px-3 py-2 @error('lugar') border-red-500 @enderror">
                @error('lugar') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-6">
                <label class="block mb-1 font-medium">Capacidad</label>
                <input type="number" name="capacidad" value="{{ old('capacidad') }}" min="1"
                    class="w-full border rounded px-3 py-2 @error('capacidad') border-red-500 @enderror">
                @error('capacidad') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex gap-3">
                <button type="submit" class="bg-slate-900 text-white px-4 py-2 rounded hover:bg-slate-700">
                    Guardar
                </button>
                <a href="{{ route('eventos.index') }}" class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</div>

@endsection
