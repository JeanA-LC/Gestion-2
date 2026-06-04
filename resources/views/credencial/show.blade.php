@extends('layouts.admin')

@section('title', 'Detalle de Credencial')

@section('content')

<div class="flex items-center gap-2 mb-6">
    <a href="{{ route('credenciales.index') }}" class="text-gray-500 hover:underline">Credenciales</a>
    <span>/</span>
    <span>Detalle</span>
</div>

<div class="max-w-md">
    <div class="bg-white rounded-xl shadow p-6">
        <div class="flex justify-between items-start mb-6">
            <h2 class="text-lg font-bold">Credencial de Personero</h2>
            <a href="{{ route('credenciales.index') }}" class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300 text-sm">
                Volver
            </a>
        </div>

        {{-- Estado badge --}}
        <div class="mb-6 text-center">
            @if($credencial->estado === 'ACTIVA')
                <span class="px-4 py-2 rounded-full bg-green-100 text-green-700 font-semibold text-sm">ACTIVA</span>
            @elseif($credencial->estado === 'VENCIDA')
                <span class="px-4 py-2 rounded-full bg-yellow-100 text-yellow-700 font-semibold text-sm">VENCIDA</span>
            @else
                <span class="px-4 py-2 rounded-full bg-red-100 text-red-700 font-semibold text-sm">ANULADA</span>
            @endif
        </div>

        <dl class="space-y-4">
            <div>
                <dt class="text-xs text-gray-500 uppercase tracking-wide">Persona</dt>
                <dd class="mt-1 font-semibold text-lg">
                    {{ $credencial->postulacion->interesado->persona->apellidos ?? '—' }},
                    {{ $credencial->postulacion->interesado->persona->nombres ?? '' }}
                </dd>
            </div>
            <div>
                <dt class="text-xs text-gray-500 uppercase tracking-wide">DNI</dt>
                <dd class="mt-1 font-medium">{{ $credencial->postulacion->interesado->persona->dni ?? '—' }}</dd>
            </div>
            <div>
                <dt class="text-xs text-gray-500 uppercase tracking-wide">Código QR</dt>
                <dd class="mt-1 font-mono text-sm bg-gray-50 px-3 py-2 rounded border">{{ $credencial->codigo_qr }}</dd>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <dt class="text-xs text-gray-500 uppercase tracking-wide">Fecha de Emisión</dt>
                    <dd class="mt-1">{{ $credencial->fecha_emision ? \Carbon\Carbon::parse($credencial->fecha_emision)->format('d/m/Y') : '—' }}</dd>
                </div>
                <div>
                    <dt class="text-xs text-gray-500 uppercase tracking-wide">Fecha de Vencimiento</dt>
                    <dd class="mt-1">{{ $credencial->fecha_vencimiento ? \Carbon\Carbon::parse($credencial->fecha_vencimiento)->format('d/m/Y') : '—' }}</dd>
                </div>
            </div>
        </dl>
    </div>
</div>

@endsection
