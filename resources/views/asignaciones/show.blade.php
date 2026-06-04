@extends('layouts.admin')

@section('title', 'Detalle de Asignación')

@section('content')

<div class="flex items-center gap-2 mb-6">
    <a href="{{ route('asignaciones.index') }}" class="text-gray-500 hover:underline">Asignaciones</a>
    <span>/</span>
    <span>Detalle</span>
</div>

<div class="max-w-2xl space-y-4">

    {{-- Personero Info --}}
    <div class="bg-white rounded-xl shadow p-6">
        <div class="flex justify-between items-start mb-4">
            <h2 class="text-lg font-bold">Datos del Personero</h2>
            <div class="flex gap-2">
                <a href="{{ route('asignaciones.edit', $asignacione->id_asignacion) }}"
                   class="bg-slate-900 text-white px-4 py-2 rounded hover:bg-slate-700 text-sm">Editar</a>
                <a href="{{ route('asignaciones.index') }}"
                   class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300 text-sm">Volver</a>
            </div>
        </div>
        <dl class="grid grid-cols-2 gap-4">
            <div>
                <dt class="text-xs text-gray-500 uppercase tracking-wide">Nombre</dt>
                <dd class="mt-1 font-medium">
                    {{ $asignacione->postulacion->interesado->persona->apellidos ?? '—' }},
                    {{ $asignacione->postulacion->interesado->persona->nombres ?? '' }}
                </dd>
            </div>
            <div>
                <dt class="text-xs text-gray-500 uppercase tracking-wide">DNI</dt>
                <dd class="mt-1">{{ $asignacione->postulacion->interesado->persona->dni ?? '—' }}</dd>
            </div>
            <div>
                <dt class="text-xs text-gray-500 uppercase tracking-wide">Teléfono</dt>
                <dd class="mt-1">{{ $asignacione->postulacion->interesado->persona->telefono ?? '—' }}</dd>
            </div>
            <div>
                <dt class="text-xs text-gray-500 uppercase tracking-wide">Correo</dt>
                <dd class="mt-1">{{ $asignacione->postulacion->interesado->persona->correo ?? '—' }}</dd>
            </div>
        </dl>
    </div>

    {{-- Assignment Info --}}
    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="text-lg font-bold mb-4">Datos de la Asignación</h2>
        <dl class="grid grid-cols-2 gap-4">
            <div>
                <dt class="text-xs text-gray-500 uppercase tracking-wide">Tipo de Personero</dt>
                <dd class="mt-1 font-medium">{{ $asignacione->tipoPersonero->nombre ?? '—' }}</dd>
            </div>
            <div>
                <dt class="text-xs text-gray-500 uppercase tracking-wide">Nivel</dt>
                <dd class="mt-1">
                    <span class="px-2 py-1 rounded bg-slate-100 text-slate-700 text-xs">{{ $asignacione->nivel_asignacion }}</span>
                </dd>
            </div>
            <div>
                <dt class="text-xs text-gray-500 uppercase tracking-wide">ID Referencia</dt>
                <dd class="mt-1">{{ $asignacione->id_referencia ?? '—' }}</dd>
            </div>
            <div>
                <dt class="text-xs text-gray-500 uppercase tracking-wide">Estado</dt>
                <dd class="mt-1">
                    @if($asignacione->estado === 'CONFIRMADO')
                        <span class="px-2 py-1 rounded bg-green-100 text-green-700 text-xs">CONFIRMADO</span>
                    @elseif($asignacione->estado === 'RECHAZADO')
                        <span class="px-2 py-1 rounded bg-red-100 text-red-700 text-xs">RECHAZADO</span>
                    @elseif($asignacione->estado === 'FINALIZADO')
                        <span class="px-2 py-1 rounded bg-gray-100 text-gray-700 text-xs">FINALIZADO</span>
                    @else
                        <span class="px-2 py-1 rounded bg-blue-100 text-blue-700 text-xs">ASIGNADO</span>
                    @endif
                </dd>
            </div>
            @if($asignacione->observacion)
            <div class="col-span-2">
                <dt class="text-xs text-gray-500 uppercase tracking-wide">Observación</dt>
                <dd class="mt-1 text-sm">{{ $asignacione->observacion }}</dd>
            </div>
            @endif
        </dl>
    </div>

    {{-- Reportes de Estado (campo) --}}
    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="text-lg font-bold mb-4">Reportes de Campo</h2>
        @if($asignacione->reportesEstado && $asignacione->reportesEstado->count())
            <ul class="space-y-3">
                @foreach($asignacione->reportesEstado as $reporte)
                    <li class="border-l-2 border-slate-300 pl-3">
                        <div class="flex items-center gap-2 mb-1">
                            @if($reporte->estado_general === 'SIN_NOVEDAD')
                                <span class="px-2 py-0.5 rounded bg-green-100 text-green-700 text-xs">SIN_NOVEDAD</span>
                            @elseif($reporte->estado_general === 'OBSERVACION')
                                <span class="px-2 py-0.5 rounded bg-yellow-100 text-yellow-700 text-xs">OBSERVACION</span>
                            @elseif($reporte->estado_general === 'INCIDENCIA')
                                <span class="px-2 py-0.5 rounded bg-orange-100 text-orange-700 text-xs">INCIDENCIA</span>
                            @else
                                <span class="px-2 py-0.5 rounded bg-red-100 text-red-700 text-xs">CRITICO</span>
                            @endif
                            <span class="text-xs text-gray-400">{{ \Carbon\Carbon::parse($reporte->created_at)->format('d/m/Y H:i') }}</span>
                        </div>
                        @if($reporte->observacion)
                            <p class="text-sm text-gray-600">{{ $reporte->observacion }}</p>
                        @endif
                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-gray-400 text-sm">Sin reportes de campo.</p>
        @endif
    </div>

    {{-- Reporte Final --}}
    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="text-lg font-bold mb-4">Reporte Final</h2>
        @if($asignacione->reporteFinal)
            <dl class="space-y-3">
                <div>
                    <dt class="text-xs text-gray-500 uppercase tracking-wide">Resumen</dt>
                    <dd class="mt-1 text-sm">{{ $asignacione->reporteFinal->resumen }}</dd>
                </div>
                @if($asignacione->reporteFinal->incidencias)
                <div>
                    <dt class="text-xs text-gray-500 uppercase tracking-wide">Incidencias</dt>
                    <dd class="mt-1 text-sm">{{ $asignacione->reporteFinal->incidencias }}</dd>
                </div>
                @endif
                @if($asignacione->reporteFinal->archivo_acta)
                <div>
                    <dt class="text-xs text-gray-500 uppercase tracking-wide">Archivo Acta</dt>
                    <dd class="mt-1 text-sm">{{ $asignacione->reporteFinal->archivo_acta }}</dd>
                </div>
                @endif
            </dl>
        @else
            <p class="text-gray-400 text-sm">Sin reporte final.</p>
        @endif
    </div>

</div>

@endsection
