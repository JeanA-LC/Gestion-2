@extends('layouts.admin')

@section('title', 'Detalle de Postulación')

@section('content')

<div class="flex items-center gap-2 mb-6">
    <a href="{{ route('postulaciones.index') }}" class="text-gray-500 hover:underline">Postulaciones</a>
    <span>/</span>
    <span>Detalle</span>
</div>

<div class="max-w-2xl space-y-4">

    {{-- Persona Card --}}
    <div class="bg-white rounded-xl shadow p-6">
        <div class="flex justify-between items-start mb-4">
            <h2 class="text-lg font-bold">Datos del Postulante</h2>
            <div class="flex gap-2">
                <a href="{{ route('postulaciones.edit', $postulacione->id_postulacion) }}"
                   class="bg-slate-900 text-white px-4 py-2 rounded hover:bg-slate-700 text-sm">Editar</a>
                <a href="{{ route('postulaciones.index') }}"
                   class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300 text-sm">Volver</a>
            </div>
        </div>
        <dl class="grid grid-cols-2 gap-4">
            <div>
                <dt class="text-xs text-gray-500 uppercase tracking-wide">DNI</dt>
                <dd class="mt-1 font-medium">{{ $postulacione->interesado->persona->dni ?? '—' }}</dd>
            </div>
            <div>
                <dt class="text-xs text-gray-500 uppercase tracking-wide">Nombres</dt>
                <dd class="mt-1 font-medium">{{ $postulacione->interesado->persona->nombres ?? '—' }}</dd>
            </div>
            <div>
                <dt class="text-xs text-gray-500 uppercase tracking-wide">Apellidos</dt>
                <dd class="mt-1 font-medium">{{ $postulacione->interesado->persona->apellidos ?? '—' }}</dd>
            </div>
            <div>
                <dt class="text-xs text-gray-500 uppercase tracking-wide">Teléfono</dt>
                <dd class="mt-1">{{ $postulacione->interesado->persona->telefono ?? '—' }}</dd>
            </div>
            <div>
                <dt class="text-xs text-gray-500 uppercase tracking-wide">Correo</dt>
                <dd class="mt-1">{{ $postulacione->interesado->persona->correo ?? '—' }}</dd>
            </div>
            <div>
                <dt class="text-xs text-gray-500 uppercase tracking-wide">Tipo de Actor</dt>
                <dd class="mt-1">{{ $postulacione->interesado->tipoActor->nombre ?? '—' }}</dd>
            </div>
        </dl>
    </div>

    {{-- Estado y Postulación --}}
    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="text-lg font-bold mb-4">Estado Actual</h2>
        <div class="mb-4">
            @if($postulacione->estado === 'APROBADO')
                <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm font-medium">APROBADO</span>
            @elseif($postulacione->estado === 'RECHAZADO')
                <span class="px-3 py-1 rounded-full bg-red-100 text-red-700 text-sm font-medium">RECHAZADO</span>
            @else
                <span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-sm font-medium">PENDIENTE</span>
            @endif
        </div>
        <dl class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <dt class="text-xs text-gray-500 uppercase tracking-wide">Disponibilidad</dt>
                <dd class="mt-1">{{ $postulacione->disponibilidad ?? '—' }}</dd>
            </div>
            <div>
                <dt class="text-xs text-gray-500 uppercase tracking-wide">Transporte Propio</dt>
                <dd class="mt-1">{{ $postulacione->transporte_propio ? 'Sí' : 'No' }}</dd>
            </div>
        </dl>
        @if($postulacione->experiencia)
        <div class="mb-4">
            <dt class="text-xs text-gray-500 uppercase tracking-wide">Experiencia</dt>
            <dd class="mt-1 text-sm">{{ $postulacione->experiencia }}</dd>
        </div>
        @endif

        {{-- Historial --}}
        @if($postulacione->historial && $postulacione->historial->count())
        <div class="mt-4">
            <h3 class="font-semibold text-sm mb-2">Historial de cambios</h3>
            <ul class="space-y-2">
                @foreach($postulacione->historial as $h)
                    <li class="border-l-2 border-slate-300 pl-3 text-sm">
                        <span class="font-medium">{{ $h->estado }}</span>
                        @if($h->observacion) — {{ $h->observacion }} @endif
                        <span class="text-gray-400 text-xs block">{{ \Carbon\Carbon::parse($h->created_at)->format('d/m/Y H:i') }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>

    {{-- Capacitaciones --}}
    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="text-lg font-bold mb-4">Capacitaciones</h2>
        @if($postulacione->capacitaciones && $postulacione->capacitaciones->count())
        <table class="w-full text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="text-left px-3 py-2">Nombre</th>
                    <th class="text-left px-3 py-2">Duración</th>
                    <th class="text-left px-3 py-2">Completada</th>
                </tr>
            </thead>
            <tbody>
                @foreach($postulacione->capacitaciones as $cap)
                <tr class="border-t">
                    <td class="px-3 py-2">{{ $cap->nombre }}</td>
                    <td class="px-3 py-2">{{ $cap->duracion_minutos }} min</td>
                    <td class="px-3 py-2">{{ $cap->pivot->completada ? 'Sí' : 'No' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
            <p class="text-gray-400 text-sm">Sin capacitaciones asignadas.</p>
        @endif
    </div>

    {{-- Evaluaciones --}}
    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="text-lg font-bold mb-4">Intentos de Evaluación</h2>
        @if($postulacione->intentosEvaluacion && $postulacione->intentosEvaluacion->count())
        <table class="w-full text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="text-left px-3 py-2">Evaluación</th>
                    <th class="text-left px-3 py-2">Nota</th>
                    <th class="text-left px-3 py-2">Aprobado</th>
                    <th class="text-left px-3 py-2">Fecha</th>
                </tr>
            </thead>
            <tbody>
                @foreach($postulacione->intentosEvaluacion as $intento)
                <tr class="border-t">
                    <td class="px-3 py-2">{{ $intento->evaluacion->nombre ?? '—' }}</td>
                    <td class="px-3 py-2">{{ $intento->nota }}</td>
                    <td class="px-3 py-2">
                        @if($intento->aprobado)
                            <span class="px-2 py-0.5 rounded bg-green-100 text-green-700 text-xs">Sí</span>
                        @else
                            <span class="px-2 py-0.5 rounded bg-red-100 text-red-700 text-xs">No</span>
                        @endif
                    </td>
                    <td class="px-3 py-2">{{ \Carbon\Carbon::parse($intento->created_at)->format('d/m/Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
            <p class="text-gray-400 text-sm">Sin intentos de evaluación.</p>
        @endif
    </div>

    {{-- Credencial --}}
    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="text-lg font-bold mb-2">Credencial</h2>
        @if($postulacione->credencial)
            <div class="flex items-center gap-3">
                @if($postulacione->credencial->estado === 'ACTIVA')
                    <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm">ACTIVA</span>
                @elseif($postulacione->credencial->estado === 'VENCIDA')
                    <span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-sm">VENCIDA</span>
                @else
                    <span class="px-3 py-1 rounded-full bg-red-100 text-red-700 text-sm">ANULADA</span>
                @endif
                <span class="text-sm text-gray-600">QR: {{ $postulacione->credencial->codigo_qr }}</span>
                <a href="{{ route('credenciales.show', $postulacione->credencial->id_credencial) }}"
                   class="text-blue-600 hover:underline text-sm">Ver credencial</a>
            </div>
        @else
            <p class="text-gray-400 text-sm">Sin credencial emitida.</p>
        @endif
    </div>

</div>

@endsection
