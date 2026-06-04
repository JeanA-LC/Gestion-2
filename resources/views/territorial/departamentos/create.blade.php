@extends('layouts.admin')

@section('title', 'Nuevo Departamento')

@section('content')

<div class="max-w-lg">
    <div class="flex items-center gap-2 mb-6">
        <a href="{{ route('departamentos.index') }}" class="text-gray-500 hover:text-gray-700">Departamentos</a>
        <span class="text-gray-400">/</span>
        <span class="font-medium">Nuevo</span>
    </div>

    <div class="bg-white rounded-xl shadow p-6">
        <form method="POST" action="{{ route('departamentos.store') }}">
            @csrf

            <div class="mb-4">
                <label class="block mb-1 font-medium">Nombre del departamento</label>
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
                <a href="{{ route('departamentos.index') }}" class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</div>

@endsection
