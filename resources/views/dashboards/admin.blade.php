@extends('layouts.admin')
@section('title', 'Dashboard — Administrador')
@section('content')

{{-- Banner --}}
<div class="rounded-2xl bg-gradient-to-r from-slate-800 to-slate-600 text-white p-5 sm:p-6 mb-5 shadow-lg">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div class="min-w-0">
            <p class="text-slate-300 text-sm mb-1">Panel de Administración</p>
            <h2 class="text-xl sm:text-2xl font-bold truncate">{{ auth()->user()->nombres }} {{ auth()->user()->apellidos }}</h2>
            <p class="text-slate-300 text-sm mt-1">Superusuario · {{ now()->isoFormat('dddd, D [de] MMMM [de] YYYY') }}</p>
        </div>
        <div class="flex flex-wrap gap-2 shrink-0">
            <a href="{{ route('personas.create') }}" class="bg-white text-slate-800 px-3 py-2 rounded-lg text-xs sm:text-sm font-semibold hover:bg-slate-100 transition whitespace-nowrap">+ Persona</a>
            <a href="{{ route('postulaciones.create') }}" class="bg-blue-500 text-white px-3 py-2 rounded-lg text-xs sm:text-sm font-semibold hover:bg-blue-600 transition whitespace-nowrap">+ Postulación</a>
        </div>
    </div>
</div>

{{-- KPIs --}}
<div class="grid grid-cols-2 lg:grid-cols-4 gap-3 mb-5">
    @php
    $kpis = [
        ['Personas',      $stats['personas'],      'bg-slate-50 border-slate-200',   'text-slate-800',   'personas.index'],
        ['Interesados',   $stats['interesados'],   'bg-blue-50 border-blue-200',     'text-blue-800',    'interesados.index'],
        ['Postulaciones', $stats['postulaciones'], 'bg-amber-50 border-amber-200',   'text-amber-800',   'postulaciones.index'],
        ['Asignaciones',  $stats['asignaciones'],  'bg-indigo-50 border-indigo-200', 'text-indigo-800',  'asignaciones.index'],
    ];
    @endphp
    @foreach($kpis as $k)
    <a href="{{ route($k[4]) }}" class="border rounded-xl p-4 shadow-sm hover:shadow-md transition {{ $k[2] }}">
        <p class="text-xs font-semibold uppercase tracking-wide text-gray-500 mb-1">{{ $k[0] }}</p>
        <p class="text-2xl sm:text-3xl font-bold {{ $k[3] }}">{{ $k[1] }}</p>
    </a>
    @endforeach
</div>

{{-- Sub-stats --}}
<div class="grid grid-cols-3 gap-3 mb-5">
    <div class="bg-amber-50 border border-amber-200 rounded-xl p-3 sm:p-4 text-center shadow-sm">
        <p class="text-xl sm:text-2xl font-bold text-amber-700">{{ $stats['pendientes'] }}</p>
        <p class="text-xs text-amber-600 mt-0.5 font-medium">Pendientes</p>
    </div>
    <div class="bg-emerald-50 border border-emerald-200 rounded-xl p-3 sm:p-4 text-center shadow-sm">
        <p class="text-xl sm:text-2xl font-bold text-emerald-700">{{ $stats['aprobados'] }}</p>
        <p class="text-xs text-emerald-600 mt-0.5 font-medium">Aprobados</p>
    </div>
    <div class="bg-indigo-50 border border-indigo-200 rounded-xl p-3 sm:p-4 text-center shadow-sm">
        <p class="text-xl sm:text-2xl font-bold text-indigo-700">{{ $stats['credenciales'] }}</p>
        <p class="text-xs text-indigo-600 mt-0.5 font-medium">Credenciales</p>
    </div>
</div>

{{-- Actividad reciente --}}
<div class="grid grid-cols-1 xl:grid-cols-2 gap-4">

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="flex items-center justify-between px-4 sm:px-5 py-3 sm:py-4 border-b">
            <h4 class="font-semibold text-gray-800 text-sm sm:text-base">Últimas postulaciones</h4>
            <a href="{{ route('postulaciones.index') }}" class="text-xs text-blue-600 hover:underline whitespace-nowrap">Ver todas →</a>
        </div>
        <div class="divide-y divide-gray-50">
        @forelse($ultimasPostulaciones as $p)
        @php $ec = ['PENDIENTE'=>'bg-amber-100 text-amber-700','APROBADO'=>'bg-emerald-100 text-emerald-700','RECHAZADO'=>'bg-red-100 text-red-700']; @endphp
        <div class="flex items-center justify-between px-4 sm:px-5 py-3 hover:bg-gray-50 transition gap-2">
            <div class="flex items-center gap-3 min-w-0">
                <div class="w-8 h-8 rounded-full bg-slate-200 flex items-center justify-center text-xs font-bold text-slate-600 shrink-0">
                    {{ strtoupper(substr($p->interesado->persona->nombres ?? 'X',0,1)) }}
                </div>
                <div class="min-w-0">
                    <p class="text-sm font-medium text-gray-800 truncate">{{ $p->interesado->persona->apellidos ?? '—' }}, {{ $p->interesado->persona->nombres ?? '' }}</p>
                    <p class="text-xs text-gray-400">{{ $p->fecha_postulacion ? \Carbon\Carbon::parse($p->fecha_postulacion)->format('d/m/Y') : '—' }}</p>
                </div>
            </div>
            <span class="px-2 py-1 rounded-full text-xs font-semibold whitespace-nowrap {{ $ec[$p->estado] ?? 'bg-gray-100 text-gray-600' }}">{{ $p->estado }}</span>
        </div>
        @empty
        <div class="px-5 py-10 text-center text-sm text-gray-400">Sin postulaciones aún</div>
        @endforelse
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="flex items-center justify-between px-4 sm:px-5 py-3 sm:py-4 border-b">
            <h4 class="font-semibold text-gray-800 text-sm sm:text-base">Reportes de campo</h4>
            <a href="{{ route('reportes-estado.index') }}" class="text-xs text-blue-600 hover:underline whitespace-nowrap">Ver todos →</a>
        </div>
        <div class="divide-y divide-gray-50">
        @forelse($ultimosReportes as $r)
        @php $rc = ['SIN_NOVEDAD'=>'bg-emerald-100 text-emerald-700','OBSERVACION'=>'bg-amber-100 text-amber-700','INCIDENCIA'=>'bg-orange-100 text-orange-700','CRITICO'=>'bg-red-100 text-red-700']; @endphp
        <div class="flex items-center justify-between px-4 sm:px-5 py-3 hover:bg-gray-50 transition gap-2">
            <p class="text-sm text-gray-700 truncate min-w-0">{{ $r->asignacion->postulacion->interesado->persona->apellidos ?? '—' }}, {{ $r->asignacion->postulacion->interesado->persona->nombres ?? '' }}</p>
            <span class="px-2 py-1 rounded-full text-xs font-semibold whitespace-nowrap {{ $rc[$r->estado_general] ?? 'bg-gray-100 text-gray-600' }}">{{ str_replace('_',' ',$r->estado_general) }}</span>
        </div>
        @empty
        <div class="px-5 py-10 text-center text-sm text-gray-400">Sin reportes aún</div>
        @endforelse
        </div>
    </div>

</div>

@endsection
