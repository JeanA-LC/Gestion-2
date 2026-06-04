@extends('layouts.admin')

@section('title', 'Nueva Capacitación')

@section('content')

<div class="flex items-center gap-2 mb-6">
    <a href="{{ route('capacitaciones.index') }}" class="text-gray-500 hover:underline">Capacitaciones</a>
    <span>/</span>
    <span>Nueva</span>
</div>

<div class="max-w-xl">
    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="text-lg font-bold mb-4">Registrar Capacitación</h2>

        <form action="{{ route('capacitaciones.store') }}" method="POST">
            @csrf

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
                <label class="block mb-1 font-medium">URL del Video</label>
                <input type="url" name="url_video" value="{{ old('url_video') }}"
                    class="w-full border rounded px-3 py-2 @error('url_video') border-red-500 @enderror"
                    placeholder="https://...">
                @error('url_video') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-6">
                <label class="block mb-1 font-medium">Duración (minutos)</label>
                <input type="number" name="duracion_minutos" value="{{ old('duracion_minutos') }}" min="1"
                    class="w-full border rounded px-3 py-2 @error('duracion_minutos') border-red-500 @enderror">
                @error('duracion_minutos') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex gap-3">
                <button type="submit" class="bg-slate-900 text-white px-4 py-2 rounded hover:bg-slate-700">
                    Guardar
                </button>
                <a href="{{ route('capacitaciones.index') }}" class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</div>

@endsection
