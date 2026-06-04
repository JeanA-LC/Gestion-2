@extends('layouts.admin')

@section('title', 'Postulaciones')

@section('content')

@php
$aprobados  = \App\Models\PostulacionPersonero::where('estado','APROBADO')->count();
$pendientes = \App\Models\PostulacionPersonero::where('estado','PENDIENTE')->count();
$rechazados = \App\Models\PostulacionPersonero::where('estado','RECHAZADO')->count();
@endphp

<div class="flex items-center justify-between mb-6">
    <div>
        <h1 class="text-xl font-bold text-gray-800">Postulaciones a Personero</h1>
        <p class="text-sm text-gray-500 mt-0.5">Gestión del proceso de selección</p>
    </div>
    <a href="{{ route('postulaciones.create') }}"
       class="inline-flex items-center gap-2 bg-slate-900 hover:bg-slate-700 text-white text-sm font-medium px-4 py-2.5 rounded-lg transition">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
        </svg>
        Nueva Postulación
    </a>
</div>

<div class="grid grid-cols-2 md:grid-cols-4 gap-3 mb-6">
    <div class="bg-white border border-gray-100 rounded-xl p-4 shadow-sm text-center">
        <p class="text-2xl font-bold text-gray-800">{{ $postulaciones->total() }}</p>
        <p class="text-xs text-gray-500 mt-0.5">Total</p>
    </div>
    <div class="bg-amber-50 border border-amber-100 rounded-xl p-4 shadow-sm text-center">
        <p class="text-2xl font-bold text-amber-700">{{ $pendientes }}</p>
        <p class="text-xs text-amber-600 mt-0.5">Pendientes</p>
    </div>
    <div class="bg-emerald-50 border border-emerald-100 rounded-xl p-4 shadow-sm text-center">
        <p class="text-2xl font-bold text-emerald-700">{{ $aprobados }}</p>
        <p class="text-xs text-emerald-600 mt-0.5">Aprobados</p>
    </div>
    <div class="bg-red-50 border border-red-100 rounded-xl p-4 shadow-sm text-center">
        <p class="text-2xl font-bold text-red-700">{{ $rechazados }}</p>
        <p class="text-xs text-red-500 mt-0.5">Rechazados</p>
    </div>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <table class="w-full text-sm">
        <thead>
            <tr class="text-xs font-semibold text-gray-500 uppercase tracking-wide bg-gray-50 border-b">
                <th class="px-5 py-3 text-left">Postulante</th>
                <th class="px-5 py-3 text-left">Disponibilidad</th>
                <th class="px-5 py-3 text-center">Transporte</th>
                <th class="px-5 py-3 text-left">Estado</th>
                <th class="px-5 py-3 text-left">Fecha</th>
                <th class="px-5 py-3 text-right">Acciones</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
            @forelse($postulaciones as $p)
            @php
                $ec = [
                    'PENDIENTE' => 'bg-amber-100 text-amber-700',
                    'APROBADO'  => 'bg-emerald-100 text-emerald-700',
                    'RECHAZADO' => 'bg-red-100 text-red-700',
                ];
                $e = $ec[$p->estado] ?? 'bg-gray-100 text-gray-600';
            @endphp
            <tr class="hover:bg-slate-50 transition-colors">
                <td class="px-5 py-3">
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-full bg-slate-200 flex items-center justify-center text-xs font-bold text-slate-600 shrink-0">
                            {{ strtoupper(substr($p->interesado->persona->nombres ?? 'X', 0, 1)) }}{{ strtoupper(substr($p->interesado->persona->apellidos ?? '', 0, 1)) }}
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800">
                                {{ $p->interesado->persona->apellidos ?? '—' }}, {{ $p->interesado->persona->nombres ?? '' }}
                            </p>
                            <p class="text-xs text-gray-400">DNI: {{ $p->interesado->persona->dni ?? '—' }}</p>
                        </div>
                    </div>
                </td>
                <td class="px-5 py-3 text-gray-600 text-xs">{{ $p->disponibilidad ?? '—' }}</td>
                <td class="px-5 py-3 text-center">
                    @if($p->transporte_propio)
                        <span class="text-emerald-600 font-bold" title="Tiene transporte">✓</span>
                    @else
                        <span class="text-gray-300">—</span>
                    @endif
                </td>
                <td class="px-5 py-3">
                    <span class="px-2.5 py-1 rounded-full text-xs font-semibold {{ $e }}">{{ $p->estado }}</span>
                </td>
                <td class="px-5 py-3 text-xs text-gray-500">
                    {{ $p->fecha_postulacion ? \Carbon\Carbon::parse($p->fecha_postulacion)->format('d/m/Y') : '—' }}
                </td>
                <td class="px-5 py-3 text-right">
                    <div class="flex items-center justify-end gap-1">
                        <a href="{{ route('postulaciones.show', $p->id_postulacion) }}"
                           class="p-1.5 rounded-lg text-gray-500 hover:bg-gray-100 transition" title="Ver">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                        </a>
                        <a href="{{ route('postulaciones.edit', $p->id_postulacion) }}"
                           class="p-1.5 rounded-lg text-blue-600 hover:bg-blue-50 transition" title="Editar">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                        </a>
                        <form action="{{ route('postulaciones.destroy', $p->id_postulacion) }}" method="POST"
                              class="inline-block" onsubmit="return confirm('¿Eliminar esta postulación?')">
                            @csrf @method('DELETE')
                            <button class="p-1.5 rounded-lg text-red-500 hover:bg-red-50 transition" title="Eliminar">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="px-5 py-16 text-center">
                    <svg class="w-12 h-12 text-gray-200 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    <p class="text-gray-500 font-medium">No hay postulaciones registradas</p>
                    <a href="{{ route('postulaciones.create') }}" class="text-blue-600 text-sm hover:underline mt-1 block">Registrar primera postulación</a>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
<div class="mt-4">{{ $postulaciones->links() }}</div>

@endsection
