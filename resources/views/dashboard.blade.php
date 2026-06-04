@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
@php
use App\Models\Persona;
use App\Models\Interesado;
use App\Models\PostulacionPersonero;
use App\Models\AsignacionPersonero;
use App\Models\Credencial;
use App\Models\ReporteEstado;
use App\Models\Evento;

$totalPersonas      = Persona::count();
$totalInteresados   = Interesado::count();
$totalPostulaciones = PostulacionPersonero::count();
$aprobados          = PostulacionPersonero::where('estado','APROBADO')->count();
$pendientes         = PostulacionPersonero::where('estado','PENDIENTE')->count();
$rechazados         = PostulacionPersonero::where('estado','RECHAZADO')->count();
$credenciales       = Credencial::where('estado','ACTIVA')->count();
$asignaciones       = AsignacionPersonero::count();
$asigConfirmados    = AsignacionPersonero::where('estado','CONFIRMADO')->count();
@endphp

{{-- BANNER DE BIENVENIDA --}}
<div class="rounded-2xl bg-gradient-to-r from-slate-800 to-slate-600 text-white p-6 mb-6 flex items-center justify-between shadow-lg">
    <div>
        <p class="text-slate-300 text-sm mb-1">Bienvenido de nuevo</p>
        <h2 class="text-2xl font-bold">{{ auth()->user()->nombres }} {{ auth()->user()->apellidos }}</h2>
        <p class="text-slate-300 text-sm mt-1">
            {{ auth()->user()->roles->pluck('nombre')->join(' · ') }}
            &nbsp;·&nbsp; {{ now()->isoFormat('dddd, D [de] MMMM [de] YYYY') }}
        </p>
    </div>
    <div class="hidden md:flex gap-3">
        <a href="{{ route('personas.create') }}"
           class="bg-white text-slate-800 px-4 py-2 rounded-lg text-sm font-semibold hover:bg-slate-100 transition">
            + Registrar Persona
        </a>
        <a href="{{ route('postulaciones.create') }}"
           class="bg-blue-500 text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-blue-600 transition">
            + Nueva Postulación
        </a>
    </div>
</div>

{{-- KPI CARDS --}}
<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-6">

    <a href="{{ route('personas.index') }}"
       class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 hover:shadow-md transition group">
        <div class="flex items-start justify-between">
            <div>
                <p class="text-xs font-medium text-gray-500 uppercase tracking-wide">Personas</p>
                <p class="text-3xl font-bold text-gray-800 mt-1">{{ $totalPersonas }}</p>
                <p class="text-xs text-gray-400 mt-1">registradas en el sistema</p>
            </div>
            <div class="bg-slate-100 group-hover:bg-slate-200 rounded-lg p-2 transition">
                <svg class="w-6 h-6 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
            </div>
        </div>
    </a>

    <a href="{{ route('interesados.index') }}"
       class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 hover:shadow-md transition group">
        <div class="flex items-start justify-between">
            <div>
                <p class="text-xs font-medium text-gray-500 uppercase tracking-wide">Interesados</p>
                <p class="text-3xl font-bold text-blue-700 mt-1">{{ $totalInteresados }}</p>
                <p class="text-xs text-gray-400 mt-1">captados para participar</p>
            </div>
            <div class="bg-blue-50 group-hover:bg-blue-100 rounded-lg p-2 transition">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
            </div>
        </div>
    </a>

    <a href="{{ route('postulaciones.index') }}"
       class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 hover:shadow-md transition group">
        <div class="flex items-start justify-between">
            <div>
                <p class="text-xs font-medium text-gray-500 uppercase tracking-wide">Postulaciones</p>
                <p class="text-3xl font-bold text-yellow-600 mt-1">{{ $totalPostulaciones }}</p>
                <div class="flex gap-2 mt-1">
                    <span class="text-xs text-green-600 font-medium">{{ $aprobados }} aprobados</span>
                    <span class="text-xs text-gray-300">·</span>
                    <span class="text-xs text-yellow-600 font-medium">{{ $pendientes }} pendientes</span>
                </div>
            </div>
            <div class="bg-yellow-50 group-hover:bg-yellow-100 rounded-lg p-2 transition">
                <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
            </div>
        </div>
    </a>

    <a href="{{ route('asignaciones.index') }}"
       class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 hover:shadow-md transition group">
        <div class="flex items-start justify-between">
            <div>
                <p class="text-xs font-medium text-gray-500 uppercase tracking-wide">Asignaciones</p>
                <p class="text-3xl font-bold text-indigo-700 mt-1">{{ $asignaciones }}</p>
                <p class="text-xs text-gray-400 mt-1">{{ $asigConfirmados }} confirmados · {{ $credenciales }} credenciales</p>
            </div>
            <div class="bg-indigo-50 group-hover:bg-indigo-100 rounded-lg p-2 transition">
                <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                </svg>
            </div>
        </div>
    </a>

</div>

{{-- BARRA DE PROGRESO DEL EMBUDO --}}
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6">
    <div class="flex items-center justify-between mb-4">
        <h3 class="font-semibold text-gray-800">Embudo de personeros</h3>
        <span class="text-xs text-gray-400">Ciclo completo de captación a asignación</span>
    </div>
    <div class="flex items-end gap-1 h-24 mb-3">
        @php
        $etapas = [
            ['Personas',      $totalPersonas,      '#64748b'],
            ['Interesados',   $totalInteresados,   '#3b82f6'],
            ['Postulaciones', $totalPostulaciones,  '#f59e0b'],
            ['Aprobados',     $aprobados,           '#10b981'],
            ['Credenciales',  $credenciales,        '#6366f1'],
            ['Asignados',     $asignaciones,        '#0f172a'],
        ];
        $max = max(array_column($etapas, 1)) ?: 1;
        @endphp
        @foreach($etapas as $etapa)
        @php $pct = $max > 0 ? max(4, round(($etapa[1]/$max)*100)) : 4; @endphp
        <div class="flex-1 flex flex-col items-center gap-1">
            <span class="text-xs font-bold text-gray-700">{{ $etapa[1] }}</span>
            <div class="w-full rounded-t-lg transition-all"
                 style="height: {{ $pct }}%; background-color: {{ $etapa[2] }}; min-height: 8px;"></div>
        </div>
        @endforeach
    </div>
    <div class="flex gap-1">
        @foreach($etapas as $etapa)
        <div class="flex-1 text-center">
            <span class="text-xs text-gray-500">{{ $etapa[0] }}</span>
        </div>
        @endforeach
    </div>
</div>

{{-- PIPELINE: FLUJO DEL SISTEMA --}}
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6">
    <h3 class="font-semibold text-gray-800 mb-5">Acceso rápido por etapa del proceso</h3>
    <div class="flex flex-wrap gap-2">
        @php
        $pipeline = [
            [1,  'Persona',       'personas.index',         'bg-gray-50  border-gray-300  text-gray-700',  'hover:border-gray-500'],
            [2,  'Interesado',    'interesados.index',       'bg-blue-50  border-blue-300  text-blue-800',  'hover:border-blue-500'],
            [3,  'Participación', 'participaciones.index',   'bg-violet-50 border-violet-300 text-violet-800','hover:border-violet-500'],
            [4,  'Postulación',   'postulaciones.index',     'bg-amber-50 border-amber-300 text-amber-800', 'hover:border-amber-500'],
            [5,  'Capacitación',  'capacitaciones.index',    'bg-orange-50 border-orange-300 text-orange-800','hover:border-orange-500'],
            [6,  'Evaluación',    'evaluaciones.index',      'bg-rose-50  border-rose-300  text-rose-800',  'hover:border-rose-500'],
            [7,  'Credencial',    'credenciales.index',      'bg-emerald-50 border-emerald-300 text-emerald-800','hover:border-emerald-500'],
            [8,  'Asignación',    'asignaciones.index',      'bg-indigo-50 border-indigo-300 text-indigo-800','hover:border-indigo-500'],
            [9,  'Reporte Campo', 'reportes-estado.index',   'bg-teal-50  border-teal-300  text-teal-800',  'hover:border-teal-500'],
            [10, 'Reporte Final', 'reportes-final.index',    'bg-slate-50 border-slate-400 text-slate-800', 'hover:border-slate-600'],
        ];
        @endphp
        @foreach($pipeline as $step)
        <a href="{{ route($step[2]) }}"
           class="flex items-center gap-2 border rounded-lg px-3 py-2 text-sm font-medium transition {{ $step[3] }} {{ $step[4] }}">
            <span class="flex items-center justify-center w-5 h-5 rounded-full bg-white border text-xs font-bold shadow-sm">{{ $step[0] }}</span>
            {{ $step[1] }}
        </a>
        @if(!$loop->last)
        <span class="self-center text-gray-300 font-bold select-none">›</span>
        @endif
        @endforeach
    </div>
</div>

{{-- ACTIVIDAD RECIENTE --}}
<div class="grid grid-cols-1 lg:grid-cols-2 gap-4">

    {{-- Últimas postulaciones --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="flex items-center justify-between px-5 py-4 border-b">
            <h4 class="font-semibold text-gray-800">Últimas postulaciones</h4>
            <a href="{{ route('postulaciones.index') }}"
               class="text-xs text-blue-600 hover:text-blue-800 font-medium flex items-center gap-1">
               Ver todas
               <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
        </div>
        @php $ultimas = PostulacionPersonero::with('interesado.persona')->latest('id_postulacion')->limit(6)->get(); @endphp
        <div class="divide-y divide-gray-50">
        @forelse($ultimas as $p)
        <div class="flex items-center justify-between px-5 py-3 hover:bg-gray-50 transition">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-full bg-slate-200 flex items-center justify-center text-xs font-bold text-slate-600">
                    {{ strtoupper(substr($p->interesado->persona->nombres ?? 'X', 0, 1)) }}
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-800">
                        {{ $p->interesado->persona->apellidos ?? '—' }},
                        {{ $p->interesado->persona->nombres ?? '' }}
                    </p>
                    <p class="text-xs text-gray-400">{{ $p->fecha_postulacion ? \Carbon\Carbon::parse($p->fecha_postulacion)->format('d/m/Y') : '—' }}</p>
                </div>
            </div>
            @php
                $ec = ['PENDIENTE'=>'bg-amber-100 text-amber-700','APROBADO'=>'bg-emerald-100 text-emerald-700','RECHAZADO'=>'bg-red-100 text-red-700'];
                $e = $ec[$p->estado] ?? 'bg-gray-100 text-gray-600';
            @endphp
            <span class="px-2.5 py-1 rounded-full text-xs font-semibold {{ $e }}">{{ $p->estado }}</span>
        </div>
        @empty
        <div class="px-5 py-10 text-center">
            <svg class="w-10 h-10 text-gray-200 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
            <p class="text-sm text-gray-400">Sin postulaciones aún</p>
            <a href="{{ route('postulaciones.create') }}" class="text-xs text-blue-500 hover:underline mt-1 block">Registrar primera postulación</a>
        </div>
        @endforelse
        </div>
    </div>

    {{-- Últimos reportes de campo --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="flex items-center justify-between px-5 py-4 border-b">
            <h4 class="font-semibold text-gray-800">Reportes de campo recientes</h4>
            <a href="{{ route('reportes-estado.index') }}"
               class="text-xs text-blue-600 hover:text-blue-800 font-medium flex items-center gap-1">
               Ver todos
               <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
        </div>
        @php $reportes = ReporteEstado::with('asignacion.postulacion.interesado.persona')->latest('fecha_reporte')->limit(6)->get(); @endphp
        <div class="divide-y divide-gray-50">
        @forelse($reportes as $r)
        @php
            $rc = [
                'SIN_NOVEDAD' => ['bg-emerald-100 text-emerald-700', '✓'],
                'OBSERVACION' => ['bg-amber-100 text-amber-700',    '⚠'],
                'INCIDENCIA'  => ['bg-orange-100 text-orange-700',  '!'],
                'CRITICO'     => ['bg-red-100 text-red-700',        '✕'],
            ];
            $rd = $rc[$r->estado_general] ?? ['bg-gray-100 text-gray-600', '?'];
        @endphp
        <div class="flex items-center justify-between px-5 py-3 hover:bg-gray-50 transition">
            <div class="flex items-center gap-3">
                <span class="w-8 h-8 rounded-full flex items-center justify-center text-sm font-bold {{ $rd[0] }}">
                    {{ $rd[1] }}
                </span>
                <div>
                    <p class="text-sm font-medium text-gray-800">
                        {{ $r->asignacion->postulacion->interesado->persona->apellidos ?? '—' }},
                        {{ $r->asignacion->postulacion->interesado->persona->nombres ?? '' }}
                    </p>
                    <p class="text-xs text-gray-400 truncate max-w-44">{{ $r->observacion ?? 'Sin observación' }}</p>
                </div>
            </div>
            <div class="text-right">
                <span class="px-2 py-1 rounded-full text-xs font-semibold {{ $rd[0] }}">{{ str_replace('_',' ',$r->estado_general) }}</span>
                <p class="text-xs text-gray-400 mt-0.5">{{ \Carbon\Carbon::parse($r->fecha_reporte)->format('d/m H:i') }}</p>
            </div>
        </div>
        @empty
        <div class="px-5 py-10 text-center">
            <svg class="w-10 h-10 text-gray-200 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
            <p class="text-sm text-gray-400">Sin reportes registrados</p>
        </div>
        @endforelse
        </div>
    </div>

</div>

@endsection
