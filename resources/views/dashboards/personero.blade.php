@extends('layouts.admin')
@section('title', 'Mi Panel — Personero')
@section('content')

<div class="rounded-2xl bg-gradient-to-r from-emerald-800 to-emerald-600 text-white p-6 mb-6 shadow-lg">
    <p class="text-emerald-200 text-sm mb-1">Panel del Personero Electoral</p>
    <h2 class="text-2xl font-bold">{{ $user->nombres }} {{ $user->apellidos }}</h2>
    <p class="text-emerald-200 text-sm mt-1">{{ now()->isoFormat('dddd, D [de] MMMM [de] YYYY') }}</p>
</div>

@if($asignaciones->isEmpty())
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-10 text-center">
    <svg class="w-14 h-14 text-gray-200 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
    </svg>
    <p class="text-gray-600 font-medium text-lg mb-1">Sin asignación activa</p>
    <p class="text-gray-400 text-sm">Un coordinador aún no te ha asignado a un centro de votación o mesa.</p>
</div>
@else

<div class="space-y-4">
    @foreach($asignaciones as $asig)
    @php
        $estadoColor = [
            'ASIGNADO'   => 'bg-amber-100 text-amber-700 border-amber-200',
            'CONFIRMADO' => 'bg-emerald-100 text-emerald-700 border-emerald-200',
            'RECHAZADO'  => 'bg-red-100 text-red-700 border-red-200',
            'FINALIZADO' => 'bg-gray-100 text-gray-700 border-gray-200',
        ][$asig->estado] ?? 'bg-gray-100 text-gray-600 border-gray-200';
    @endphp
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="flex items-center justify-between px-6 py-4 border-b bg-gray-50">
            <div>
                <p class="font-semibold text-gray-800">{{ $asig->tipoPersonero->nombre ?? 'Personero' }}</p>
                <p class="text-xs text-gray-500">
                    Nivel: <strong>{{ $asig->nivel_asignacion }}</strong>
                    · Referencia ID: <strong>#{{ $asig->id_referencia }}</strong>
                </p>
            </div>
            <span class="px-3 py-1 rounded-full text-xs font-semibold border {{ $estadoColor }}">
                {{ $asig->estado }}
            </span>
        </div>

        <div class="px-6 py-4 flex flex-wrap gap-3">
            <a href="{{ route('reportes-estado.create') }}?asignacion={{ $asig->id_asignacion }}"
               class="inline-flex items-center gap-2 bg-amber-500 hover:bg-amber-600 text-white text-sm font-medium px-4 py-2 rounded-lg transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                Enviar reporte de campo
            </a>
            <a href="{{ route('reportes-final.create') }}?asignacion={{ $asig->id_asignacion }}"
               class="inline-flex items-center gap-2 bg-slate-700 hover:bg-slate-800 text-white text-sm font-medium px-4 py-2 rounded-lg transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                Enviar reporte final
            </a>
            <a href="{{ route('asignaciones.show', $asig->id_asignacion) }}"
               class="inline-flex items-center gap-2 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-medium px-4 py-2 rounded-lg transition">
                Ver detalle
            </a>
        </div>

        {{-- Últimos reportes de esta asignación --}}
        @if($asig->reportesEstado->count() > 0)
        <div class="px-6 pb-4">
            <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">Reportes enviados</p>
            <div class="space-y-1">
                @foreach($asig->reportesEstado->take(3) as $rep)
                @php $rc = ['SIN_NOVEDAD'=>'text-emerald-600','OBSERVACION'=>'text-amber-600','INCIDENCIA'=>'text-orange-600','CRITICO'=>'text-red-600']; @endphp
                <div class="flex items-center gap-2 text-xs text-gray-600">
                    <span class="font-semibold {{ $rc[$rep->estado_general] ?? 'text-gray-500' }}">{{ str_replace('_',' ',$rep->estado_general) }}</span>
                    <span class="text-gray-300">·</span>
                    <span>{{ \Carbon\Carbon::parse($rep->fecha_reporte)->format('d/m H:i') }}</span>
                    @if($rep->observacion)
                    <span class="text-gray-400 truncate max-w-xs">— {{ $rep->observacion }}</span>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
    @endforeach
</div>

@endif

@endsection
