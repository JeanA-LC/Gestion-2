@extends('layouts.admin')

@section('title', 'Reporte Final')

@section('content')

<div class="flex items-center gap-2 mb-6">
    <a href="{{ route('reportes-final.index') }}" class="text-gray-500 hover:underline">Reportes Finales</a>
    <span>/</span>
    <span>Detalle</span>
</div>

<div class="max-w-2xl space-y-4">

    {{-- Header --}}
    <div class="bg-white rounded-xl shadow p-6">
        <div class="flex justify-between items-start mb-4">
            <h2 class="text-lg font-bold">Reporte Final de Personero</h2>
            <div class="flex gap-2">
                <a href="{{ route('reportes-final.edit', $reportesFinal->id_reporte_final) }}"
                   class="bg-slate-900 text-white px-4 py-2 rounded hover:bg-slate-700 text-sm">Editar</a>
                <a href="{{ route('reportes-final.index') }}"
                   class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300 text-sm">Volver</a>
            </div>
        </div>

        {{-- Personero info --}}
        <dl class="grid grid-cols-2 gap-4">
            <div>
                <dt class="text-xs text-gray-500 uppercase tracking-wide">Personero</dt>
                <dd class="mt-1 font-semibold">
                    {{ $reportesFinal->asignacion->postulacion->interesado->persona->apellidos ?? '—' }},
                    {{ $reportesFinal->asignacion->postulacion->interesado->persona->nombres ?? '' }}
                </dd>
            </div>
            <div>
                <dt class="text-xs text-gray-500 uppercase tracking-wide">DNI</dt>
                <dd class="mt-1">{{ $reportesFinal->asignacion->postulacion->interesado->persona->dni ?? '—' }}</dd>
            </div>
            <div>
                <dt class="text-xs text-gray-500 uppercase tracking-wide">Nivel Asignación</dt>
                <dd class="mt-1">
                    <span class="px-2 py-1 rounded bg-slate-100 text-slate-700 text-xs">{{ $reportesFinal->asignacion->nivel_asignacion ?? '—' }}</span>
                </dd>
            </div>
            <div>
                <dt class="text-xs text-gray-500 uppercase tracking-wide">Fecha</dt>
                <dd class="mt-1">{{ \Carbon\Carbon::parse($reportesFinal->created_at)->format('d/m/Y H:i') }}</dd>
            </div>
        </dl>
    </div>

    {{-- Resumen --}}
    <div class="bg-white rounded-xl shadow p-6">
        <h3 class="font-bold mb-3">Resumen</h3>
        <p class="text-sm leading-relaxed text-gray-700 whitespace-pre-line">{{ $reportesFinal->resumen }}</p>
    </div>

    {{-- Incidencias --}}
    @if($reportesFinal->incidencias)
    <div class="bg-white rounded-xl shadow p-6">
        <h3 class="font-bold mb-3">Incidencias</h3>
        <p class="text-sm leading-relaxed text-gray-700 whitespace-pre-line">{{ $reportesFinal->incidencias }}</p>
    </div>
    @endif

    {{-- Archivo Acta --}}
    @if($reportesFinal->archivo_acta)
    <div class="bg-white rounded-xl shadow p-6">
        <h3 class="font-bold mb-3">Archivo / Acta</h3>
        <p class="text-sm text-gray-700">{{ $reportesFinal->archivo_acta }}</p>
    </div>
    @endif

</div>

@endsection
