@extends('layouts.admin')
@section('title', 'Editar Link')
@section('content')

<div class="max-w-lg">
    <div class="flex items-center gap-2 mb-6 text-sm">
        <a href="{{ route('mis-links.index') }}" class="text-gray-500 hover:text-gray-700">Mis links</a>
        <span class="text-gray-300">/</span>
        <span class="font-medium text-gray-800">Editar</span>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <form method="POST" action="{{ route('mis-links.update', $misLink->id) }}">
            @csrf @method('PUT')

            <div class="mb-4">
                <label class="block mb-1 font-medium text-sm text-gray-700">Descripción</label>
                <input type="text" name="descripcion" value="{{ old('descripcion', $misLink->descripcion) }}"
                       class="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm outline-none focus:ring-2 focus:ring-blue-300"
                       placeholder="Descripción del link">
                @error('descripcion') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-5">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="hidden" name="activo" value="0">
                    <input type="checkbox" name="activo" value="1" {{ $misLink->activo ? 'checked' : '' }}
                           class="rounded">
                    <span class="text-sm font-medium text-gray-700">Link activo</span>
                </label>
                <p class="text-xs text-gray-400 mt-1 pl-6">Desactívalo para que nadie más pueda usarlo.</p>
            </div>

            <div class="flex gap-3">
                <button type="submit" class="bg-slate-900 text-white text-sm font-medium px-5 py-2.5 rounded-lg hover:bg-slate-700 transition">Guardar</button>
                <a href="{{ route('mis-links.index') }}" class="bg-gray-100 text-gray-700 text-sm font-medium px-5 py-2.5 rounded-lg hover:bg-gray-200 transition">Cancelar</a>
            </div>
        </form>
    </div>
</div>

@endsection
