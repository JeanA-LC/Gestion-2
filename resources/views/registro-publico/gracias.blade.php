<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>¡Registro exitoso! — Gestión Personeros</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-slate-100 to-emerald-50 min-h-screen flex items-center justify-center p-4">

<div class="w-full max-w-md text-center">
    <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-10">

        <div class="w-16 h-16 rounded-full bg-emerald-100 flex items-center justify-center mx-auto mb-5">
            <svg class="w-9 h-9 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
        </div>

        <h1 class="text-2xl font-bold text-gray-800 mb-2">¡Registro exitoso!</h1>
        <p class="text-gray-500 text-sm mb-5">
            Quedaste registrado como simpatizante bajo la coordinación de
            <strong class="text-gray-700">
                {{ $link->coordinador->nombres ?? '' }} {{ $link->coordinador->apellidos ?? '' }}
            </strong>.
        </p>

        <div class="bg-emerald-50 border border-emerald-200 rounded-xl p-4 text-left text-sm text-emerald-800 mb-6">
            <p class="font-semibold mb-2">¿Qué sigue?</p>
            <ul class="space-y-1.5">
                <li class="flex items-start gap-2">
                    <span class="text-emerald-500 font-bold mt-0.5">1.</span>
                    Un coordinador revisará tu información en las próximas horas.
                </li>
                <li class="flex items-start gap-2">
                    <span class="text-emerald-500 font-bold mt-0.5">2.</span>
                    Si eres seleccionado, recibirás capacitaciones para convertirte en personero.
                </li>
                <li class="flex items-start gap-2">
                    <span class="text-emerald-500 font-bold mt-0.5">3.</span>
                    Al aprobar las evaluaciones, obtendrás tu credencial y serás asignado a un centro electoral.
                </li>
            </ul>
        </div>

        <p class="text-xs text-gray-400">Puedes cerrar esta ventana. Gracias por tu participación.</p>
    </div>
</div>

</body>
</html>
