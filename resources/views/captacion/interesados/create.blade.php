@extends('layouts.admin')

@section('title', 'Nuevo Interesado')

@section('content')

<div class="flex items-center gap-2 mb-6">
    <a href="{{ route('interesados.index') }}" class="text-gray-500 hover:underline">Interesados</a>
    <span>/</span>
    <span>Nuevo</span>
</div>

<div class="max-w-xl">
    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="text-lg font-bold mb-4">Registrar Interesado</h2>

        <form action="{{ route('interesados.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block mb-1 font-medium">Persona <span class="text-red-500">*</span></label>
                <select name="id_persona" required
                    class="w-full border rounded px-3 py-2 @error('id_persona') border-red-500 @enderror">
                    <option value="">— Seleccionar Persona —</option>
                    @foreach($personas as $p)
                        <option value="{{ $p->id_persona }}" {{ old('id_persona') == $p->id_persona ? 'selected' : '' }}>
                            {{ $p->apellidos }} {{ $p->nombres }} - DNI: {{ $p->dni }}
                        </option>
                    @endforeach
                </select>
                @error('id_persona') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Tipo de Actor <span class="text-red-500">*</span></label>
                <select name="id_tipo_actor" required
                    class="w-full border rounded px-3 py-2 @error('id_tipo_actor') border-red-500 @enderror">
                    <option value="">— Seleccionar Tipo —</option>
                    @foreach($tipos as $tipo)
                        <option value="{{ $tipo->id_tipo_actor }}" {{ old('id_tipo_actor') == $tipo->id_tipo_actor ? 'selected' : '' }}>
                            {{ $tipo->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('id_tipo_actor') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-6">
                <label class="block mb-1 font-medium">Comité</label>
                <select name="id_comite"
                    class="w-full border rounded px-3 py-2 @error('id_comite') border-red-500 @enderror">
                    <option value="">— Sin Comité —</option>
                    @foreach($comites as $comite)
                        <option value="{{ $comite->id_comite }}" {{ old('id_comite') == $comite->id_comite ? 'selected' : '' }}>
                            {{ $comite->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('id_comite') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex gap-3">
                <button type="submit" class="bg-slate-900 text-white px-4 py-2 rounded hover:bg-slate-700">
                    Guardar
                </button>
                <a href="{{ route('interesados.index') }}" class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</div>

@endsection
