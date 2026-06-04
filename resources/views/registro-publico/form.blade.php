<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Simpatizante — Gestión Personeros</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-slate-100 to-blue-50 min-h-screen flex items-center justify-center p-4">

<div class="w-full max-w-lg">

    {{-- Header --}}
    <div class="text-center mb-8">
        <div class="w-14 h-14 rounded-2xl bg-blue-600 flex items-center justify-center mx-auto mb-4 shadow-lg">
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
            </svg>
        </div>
        <h1 class="text-2xl font-bold text-gray-800">Registro de Simpatizante</h1>
        <p class="text-gray-500 text-sm mt-1">
            Invitado por
            <strong class="text-blue-700">
                {{ $link->coordinador->nombres ?? '' }} {{ $link->coordinador->apellidos ?? '' }}
            </strong>
        </p>
    </div>

    {{-- Banner info --}}
    <div class="bg-blue-50 border border-blue-200 rounded-xl p-4 mb-5 text-sm text-blue-800 flex items-start gap-3">
        <svg class="w-5 h-5 shrink-0 mt-0.5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
        </svg>
        <p>Al completar este formulario, quedarás registrado como simpatizante. Un coordinador se pondrá en contacto contigo para continuar el proceso.</p>
    </div>

    {{-- Formulario --}}
    <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-7">
        <form method="POST" action="{{ route('registro.store', $link->token) }}">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        DNI <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="dni" value="{{ old('dni') }}" required maxlength="8"
                           class="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm font-mono focus:ring-2 focus:ring-blue-300 focus:border-blue-400 outline-none @error('dni') border-red-400 @enderror"
                           placeholder="12345678">
                    @error('dni') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Teléfono</label>
                    <input type="text" name="telefono" value="{{ old('telefono') }}"
                           class="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm focus:ring-2 focus:ring-blue-300 focus:border-blue-400 outline-none"
                           placeholder="999 999 999">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Nombres <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="nombres" value="{{ old('nombres') }}" required
                           class="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm focus:ring-2 focus:ring-blue-300 focus:border-blue-400 outline-none @error('nombres') border-red-400 @enderror"
                           placeholder="Juan Carlos">
                    @error('nombres') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Apellidos <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="apellidos" value="{{ old('apellidos') }}" required
                           class="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm focus:ring-2 focus:ring-blue-300 focus:border-blue-400 outline-none @error('apellidos') border-red-400 @enderror"
                           placeholder="García López">
                    @error('apellidos') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Correo electrónico</label>
                <input type="email" name="correo" value="{{ old('correo') }}"
                       class="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm focus:ring-2 focus:ring-blue-300 focus:border-blue-400 outline-none @error('correo') border-red-400 @enderror"
                       placeholder="correo@ejemplo.com">
                @error('correo') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-1">Dirección</label>
                <input type="text" name="direccion" value="{{ old('direccion') }}"
                       class="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm focus:ring-2 focus:ring-blue-300 focus:border-blue-400 outline-none"
                       placeholder="Jr. Los Pinos 123, Huánuco">
            </div>

            <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm py-3 rounded-xl transition shadow-sm">
                Registrarme como simpatizante
            </button>

            <p class="text-xs text-gray-400 text-center mt-3">
                Tus datos serán usados únicamente para el proceso electoral. Son confidenciales.
            </p>
        </form>
    </div>

</div>

</body>
</html>
