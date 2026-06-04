@extends('layouts.admin')
@section('title', 'Mis Links de Invitación')
@section('content')

<div class="flex items-center justify-between mb-6">
    <div>
        <h1 class="text-xl font-bold text-gray-800">Mis links de invitación</h1>
        <p class="text-sm text-gray-500 mt-0.5">Genera links únicos para que simpatizantes se registren automáticamente bajo tu coordinación.</p>
    </div>
    <a href="{{ route('mis-links.create') }}"
       class="inline-flex items-center gap-2 bg-slate-900 hover:bg-slate-700 text-white text-sm font-medium px-4 py-2.5 rounded-lg transition">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/>
        </svg>
        Nuevo link
    </a>
</div>

@if($links->isEmpty())
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-12 text-center">
    <svg class="w-12 h-12 text-gray-200 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/>
    </svg>
    <p class="text-gray-500 font-medium">No tienes links generados aún</p>
    <a href="{{ route('mis-links.create') }}" class="text-blue-600 text-sm hover:underline mt-1 block">Generar mi primer link</a>
</div>
@else

<div class="space-y-3">
    @foreach($links as $link)
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
        <div class="flex items-start justify-between gap-4">
            <div class="flex-1 min-w-0">
                <div class="flex items-center gap-2 mb-1">
                    @if($link->activo)
                        <span class="w-2 h-2 rounded-full bg-emerald-500 shrink-0"></span>
                        <span class="text-xs font-semibold text-emerald-700">Activo</span>
                    @else
                        <span class="w-2 h-2 rounded-full bg-gray-400 shrink-0"></span>
                        <span class="text-xs font-semibold text-gray-500">Inactivo</span>
                    @endif
                    <span class="text-gray-300">·</span>
                    <span class="text-xs text-gray-400">{{ \Carbon\Carbon::parse($link->created_at)->format('d/m/Y H:i') }}</span>
                    <span class="text-gray-300">·</span>
                    <span class="text-xs font-medium text-blue-700">{{ $link->interesados_count }} registros</span>
                </div>

                @if($link->descripcion)
                <p class="text-sm font-medium text-gray-800 mb-2">{{ $link->descripcion }}</p>
                @endif

                {{-- URL copyable --}}
                <div class="flex items-center gap-2">
                    <div class="flex-1 bg-gray-50 border border-gray-200 rounded-lg px-3 py-2 text-xs font-mono text-gray-600 truncate">
                        {{ route('registro.show', $link->token) }}
                    </div>
                    <button onclick="navigator.clipboard.writeText('{{ route('registro.show', $link->token) }}').then(()=>alert('¡Link copiado!'))"
                            class="shrink-0 bg-slate-800 hover:bg-slate-700 text-white text-xs px-3 py-2 rounded-lg transition flex items-center gap-1">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-2M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"/></svg>
                        Copiar
                    </button>
                    <a href="{{ route('registro.show', $link->token) }}" target="_blank"
                       class="shrink-0 text-blue-600 hover:text-blue-800 text-xs px-3 py-2 rounded-lg border border-blue-200 hover:bg-blue-50 transition">
                        Previsualizar
                    </a>
                </div>
            </div>

            <div class="flex items-center gap-2 shrink-0">
                <a href="{{ route('mis-links.edit', $link->id) }}"
                   class="p-2 rounded-lg text-gray-500 hover:bg-gray-100 transition" title="Editar">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                </a>
                <form action="{{ route('mis-links.destroy', $link->id) }}" method="POST" class="inline-block"
                      onsubmit="return confirm('¿Eliminar este link? Los registros existentes no se perderán.')">
                    @csrf @method('DELETE')
                    <button class="p-2 rounded-lg text-red-500 hover:bg-red-50 transition" title="Eliminar">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="mt-4">{{ $links->links() }}</div>

@endif

@endsection
