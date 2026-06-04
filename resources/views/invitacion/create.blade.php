@extends('layouts.admin')
@section('title', 'Nuevo Link de Invitación')
@section('content')

<div class="max-w-lg">
    <div class="flex items-center gap-2 mb-6 text-sm">
        <a href="{{ route('mis-links.index') }}" class="text-gray-500 hover:text-gray-700">Mis links</a>
        <span class="text-gray-300">/</span>
        <span class="font-medium text-gray-800">Nuevo link</span>
    </div>

    <div class="bg-blue-50 border border-blue-200 rounded-xl p-4 mb-6 text-sm text-blue-800">
        <p class="font-semibold mb-1">¿Cómo funciona?</p>
        <p>Al generar un link, obtendrás una URL única que puedes compartir con ciudadanos interesados. Cuando se registren a través de ese link, quedarán automáticamente vinculados a ti como su coordinador de referencia.</p>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <form method="POST" action="{{ route('mis-links.store') }}">
            @csrf

            <div class="mb-5">
                <label class="block mb-1.5 font-medium text-gray-700 text-sm">
                    Descripción del link
                    <span class="text-gray-400 font-normal">(opcional)</span>
                </label>
                <input type="text" name="descripcion" value="{{ old('descripcion') }}"
                       class="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm focus:ring-2 focus:ring-blue-300 focus:border-blue-400 outline-none @error('descripcion') border-red-400 @enderror"
                       placeholder="Ej: Campaña zona norte — Junio 2026">
                @error('descripcion')
                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
                <p class="text-xs text-gray-400 mt-1">Ayuda a identificar para qué campaña o zona es este link.</p>
            </div>

            <div class="flex gap-3">
                <button type="submit"
                        class="bg-slate-900 hover:bg-slate-700 text-white text-sm font-medium px-5 py-2.5 rounded-lg transition">
                    Generar link
                </button>
                <a href="{{ route('mis-links.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-medium px-5 py-2.5 rounded-lg transition">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</div>

@endsection
