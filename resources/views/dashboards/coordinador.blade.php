@extends('layouts.admin')
@section('title', 'Mi Panel — Coordinador')
@section('content')

{{-- Banner coordinador --}}
<div class="rounded-2xl bg-gradient-to-r from-blue-800 to-blue-600 text-white p-6 mb-6 flex items-center justify-between shadow-lg">
    <div>
        <p class="text-blue-200 text-sm mb-1">Panel del Coordinador</p>
        <h2 class="text-2xl font-bold">{{ $user->nombres }} {{ $user->apellidos }}</h2>
        <p class="text-blue-200 text-sm mt-1">{{ now()->isoFormat('dddd, D [de] MMMM [de] YYYY') }}</p>
    </div>
    <div class="hidden md:flex flex-col gap-2 text-right">
        <a href="{{ route('mis-links.create') }}"
           class="bg-white text-blue-800 px-4 py-2 rounded-lg text-sm font-semibold hover:bg-blue-50 transition flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>
            Generar link de invitación
        </a>
        <a href="{{ route('personas.create') }}"
           class="bg-blue-500 text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-blue-400 transition">
            + Registrar simpatizante
        </a>
    </div>
</div>

{{-- KPIs coordinador --}}
<div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
    <div class="bg-white border border-gray-100 rounded-xl p-5 shadow-sm text-center">
        <p class="text-3xl font-bold text-blue-700">{{ $misInteresados }}</p>
        <p class="text-xs text-gray-500 mt-1 font-medium">Mis Simpatizantes</p>
    </div>
    <div class="bg-white border border-gray-100 rounded-xl p-5 shadow-sm text-center">
        <p class="text-3xl font-bold text-indigo-700">{{ $misLinks }}</p>
        <p class="text-xs text-gray-500 mt-1 font-medium">Links generados</p>
    </div>
    <div class="bg-white border border-gray-100 rounded-xl p-5 shadow-sm text-center">
        <p class="text-3xl font-bold text-emerald-700">{{ $totalReferidos }}</p>
        <p class="text-xs text-gray-500 mt-1 font-medium">Registros vía link</p>
    </div>
    <div class="bg-amber-50 border border-amber-200 rounded-xl p-5 shadow-sm text-center">
        <p class="text-3xl font-bold text-amber-700">{{ $postulacionesPendientes }}</p>
        <p class="text-xs text-amber-600 mt-1 font-medium">Postulaciones pendientes</p>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-4">

    {{-- Mis simpatizantes recientes --}}
    <div class="lg:col-span-2 bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="flex items-center justify-between px-5 py-4 border-b">
            <h4 class="font-semibold text-gray-800">Mis simpatizantes captados</h4>
            <a href="{{ route('interesados.index') }}" class="text-xs text-blue-600 hover:underline">Ver todos →</a>
        </div>
        <div class="divide-y divide-gray-50">
        @forelse($ultimosInteresados as $i)
        <div class="flex items-center justify-between px-5 py-3 hover:bg-gray-50 transition">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-xs font-bold text-blue-700">
                    {{ strtoupper(substr($i->persona->nombres ?? 'X',0,1)) }}
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-800">{{ $i->persona->apellidos ?? '—' }}, {{ $i->persona->nombres ?? '' }}</p>
                    <p class="text-xs text-gray-400">{{ $i->persona->dni ?? '' }} · {{ $i->tipoActor->nombre ?? '' }}</p>
                </div>
            </div>
            <div class="flex items-center gap-1">
                @if($i->id_link_invitacion)
                <span class="px-2 py-0.5 rounded-full bg-indigo-100 text-indigo-700 text-xs">Referido</span>
                @endif
                <a href="{{ route('interesados.show', $i->id_interesado) }}" class="p-1 text-gray-400 hover:text-gray-600">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>
        </div>
        @empty
        <div class="px-5 py-10 text-center">
            <p class="text-sm text-gray-400">Aún no has captado simpatizantes.</p>
            <a href="{{ route('mis-links.create') }}" class="text-blue-600 text-sm hover:underline mt-1 block">Generar link de invitación</a>
        </div>
        @endforelse
        </div>
    </div>

    {{-- Panel de acciones rápidas --}}
    <div class="space-y-3">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
            <h4 class="font-semibold text-gray-800 mb-4">Acciones rápidas</h4>
            <div class="space-y-2">
                @php
                $acciones = [
                    ['Mis links de invitación','mis-links.index',   'bg-indigo-50 text-indigo-700 border-indigo-200'],
                    ['Registrar persona',       'personas.create',   'bg-slate-50 text-slate-700 border-slate-200'],
                    ['Nuevo interesado',        'interesados.create','bg-blue-50 text-blue-700 border-blue-200'],
                    ['Ver postulaciones',       'postulaciones.index','bg-amber-50 text-amber-700 border-amber-200'],
                    ['Asignar personeros',      'asignaciones.create','bg-emerald-50 text-emerald-700 border-emerald-200'],
                    ['Emitir credencial',       'credenciales.index', 'bg-violet-50 text-violet-700 border-violet-200'],
                ];
                @endphp
                @foreach($acciones as $a)
                <a href="{{ route($a[1]) }}"
                   class="flex items-center justify-between w-full border rounded-lg px-3 py-2.5 text-sm font-medium transition hover:opacity-80 {{ $a[2] }}">
                    {{ $a[0] }}
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
                @endforeach
            </div>
        </div>
    </div>

</div>

@endsection
