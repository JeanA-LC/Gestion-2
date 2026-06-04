@extends('layouts.admin')

@section('title', 'Personas')

@section('content')

<div class="flex items-center justify-between mb-6">
    <div>
        <h1 class="text-xl font-bold text-gray-800">Personas</h1>
        <p class="text-sm text-gray-500 mt-0.5">Ciudadanos registrados en el sistema</p>
    </div>
    <a href="{{ route('personas.create') }}"
       class="inline-flex items-center gap-2 bg-slate-900 hover:bg-slate-700 text-white text-sm font-medium px-4 py-2.5 rounded-lg transition">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
        </svg>
        Nueva Persona
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="px-5 py-3 border-b border-gray-100 flex items-center justify-between bg-gray-50">
        <span class="text-xs font-semibold text-gray-500 uppercase tracking-wide">
            {{ $personas->total() }} registros
        </span>
        <a href="{{ route('interesados.create') }}" class="text-xs text-blue-600 hover:underline">
            Registrar como interesado →
        </a>
    </div>

    <table class="w-full text-sm">
        <thead>
            <tr class="text-xs font-semibold text-gray-500 uppercase tracking-wide bg-gray-50 border-b border-gray-100">
                <th class="px-5 py-3 text-left">Persona</th>
                <th class="px-5 py-3 text-left">DNI</th>
                <th class="px-5 py-3 text-left">Contacto</th>
                <th class="px-5 py-3 text-left">Dirección</th>
                <th class="px-5 py-3 text-right">Acciones</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
            @forelse($personas as $p)
            <tr class="hover:bg-slate-50 transition-colors">
                <td class="px-5 py-3">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-slate-200 flex items-center justify-center font-bold text-slate-600 text-xs shrink-0">
                            {{ strtoupper(substr($p->nombres, 0, 1)) }}{{ strtoupper(substr($p->apellidos, 0, 1)) }}
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800">{{ $p->apellidos }}, {{ $p->nombres }}</p>
                        </div>
                    </div>
                </td>
                <td class="px-5 py-3">
                    <span class="font-mono bg-gray-100 px-2 py-0.5 rounded text-xs text-gray-700">{{ $p->dni }}</span>
                </td>
                <td class="px-5 py-3 text-gray-600">
                    @if($p->telefono)
                    <p class="text-xs flex items-center gap-1">
                        <svg class="w-3 h-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        {{ $p->telefono }}
                    </p>
                    @endif
                    @if($p->correo)
                    <p class="text-xs text-blue-600 mt-0.5">{{ $p->correo }}</p>
                    @endif
                    @if(!$p->telefono && !$p->correo)
                    <span class="text-gray-400 text-xs">—</span>
                    @endif
                </td>
                <td class="px-5 py-3 text-gray-500 text-xs max-w-xs truncate">{{ $p->direccion ?? '—' }}</td>
                <td class="px-5 py-3 text-right">
                    <div class="flex items-center justify-end gap-1">
                        <a href="{{ route('personas.show', $p->id_persona) }}"
                           class="p-1.5 rounded-lg text-gray-500 hover:bg-gray-100 hover:text-gray-700 transition" title="Ver">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                        </a>
                        <a href="{{ route('personas.edit', $p->id_persona) }}"
                           class="p-1.5 rounded-lg text-blue-600 hover:bg-blue-50 transition" title="Editar">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                        </a>
                        <form action="{{ route('personas.destroy', $p->id_persona) }}" method="POST"
                              class="inline-block" onsubmit="return confirm('¿Eliminar a {{ $p->nombres }}?')">
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
                <td colspan="5" class="px-5 py-16 text-center">
                    <svg class="w-12 h-12 text-gray-200 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    <p class="text-gray-500 font-medium">No hay personas registradas</p>
                    <a href="{{ route('personas.create') }}" class="text-blue-600 text-sm hover:underline mt-1 block">Registrar primera persona</a>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">{{ $personas->links() }}</div>

@endsection
