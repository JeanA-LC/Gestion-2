@extends('layouts.admin')

@section('title', 'Editar Zona')

@section('content')

<div class="max-w-lg">
    <div class="flex items-center gap-2 mb-6">
        <a href="{{ route('zonas.index') }}" class="text-gray-500 hover:text-gray-700">Zonas</a>
        <span class="text-gray-400">/</span>
        <span class="font-medium">Editar</span>
    </div>

    <div class="bg-white rounded-xl shadow p-6">
        <form method="POST" action="{{ route('zonas.update', $zona->id_zona) }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block mb-1 font-medium">Distrito</label>
                <select name="id_distrito"
                        class="w-full border rounded px-3 py-2 @error('id_distrito') border-red-500 @enderror">
                    <option value="">Seleccionar...</option>
                    @foreach($distritos as $distrito)
                        <option value="{{ $distrito->id_distrito }}"
                            {{ old('id_distrito', $zona->id_distrito) == $distrito->id_distrito ? 'selected' : '' }}>
                            {{ $distrito->nombre }}
                            — {{ $distrito->provincia->nombre ?? '?' }}
                            ({{ $distrito->provincia->departamento->nombre ?? '?' }})
                        </option>
                    @endforeach
                </select>
                @error('id_distrito')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Nombre de la zona</label>
                <input type="text" name="nombre"
                       value="{{ old('nombre', $zona->nombre) }}"
                       class="w-full border rounded px-3 py-2 @error('nombre') border-red-500 @enderror"
                       placeholder="Ej: Zona Norte">
                @error('nombre')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Tipo</label>
                <select name="tipo"
                        class="w-full border rounded px-3 py-2 @error('tipo') border-red-500 @enderror">
                    <option value="">Seleccionar...</option>
                    @foreach(['CENTRO_POBLADO', 'CASERIO', 'BARRIO', 'URBANIZACION', 'SECTOR'] as $tipo)
                        <option value="{{ $tipo }}"
                            {{ old('tipo', $zona->tipo) === $tipo ? 'selected' : '' }}>
                            {{ $tipo }}
                        </option>
                    @endforeach
                </select>
                @error('tipo')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">
                    Descripción <span class="text-gray-400 font-normal">(opcional)</span>
                </label>
                <textarea name="descripcion" rows="3"
                          class="w-full border rounded px-3 py-2 @error('descripcion') border-red-500 @enderror"
                          placeholder="Descripción breve de la zona...">{{ old('descripcion', $zona->descripcion) }}</textarea>
                @error('descripcion')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-3">
                <button type="submit" class="bg-slate-900 text-white px-4 py-2 rounded hover:bg-slate-700">
                    Actualizar
                </button>
                <a href="{{ route('zonas.index') }}" class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</div>

@endsection
