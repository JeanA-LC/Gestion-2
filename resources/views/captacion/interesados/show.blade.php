@extends('layouts.admin')

@section('title', 'Detalle de Interesado')

@section('content')

<div class="flex items-center gap-2 mb-6">
    <a href="{{ route('interesados.index') }}" class="text-gray-500 hover:underline">Interesados</a>
    <span>/</span>
    <span>{{ $interesado->persona->apellidos }}, {{ $interesado->persona->nombres }}</span>
</div>

<div class="max-w-2xl space-y-4">

    {{-- Persona Card --}}
    <div class="bg-white rounded-xl shadow p-6">
        <div class="flex justify-between items-start mb-4">
            <h2 class="text-lg font-bold">Datos de la Persona</h2>
            <a href="{{ route('interesados.edit', $interesado->id_interesado) }}"
               class="bg-slate-900 text-white px-4 py-2 rounded hover:bg-slate-700 text-sm">
                Editar
            </a>
        </div>
        <dl class="grid grid-cols-2 gap-4">
            <div>
                <dt class="text-xs text-gray-500 uppercase tracking-wide">DNI</dt>
                <dd class="mt-1 font-medium">{{ $interesado->persona->dni }}</dd>
            </div>
            <div>
                <dt class="text-xs text-gray-500 uppercase tracking-wide">Nombres</dt>
                <dd class="mt-1 font-medium">{{ $interesado->persona->nombres }}</dd>
            </div>
            <div>
                <dt class="text-xs text-gray-500 uppercase tracking-wide">Apellidos</dt>
                <dd class="mt-1 font-medium">{{ $interesado->persona->apellidos }}</dd>
            </div>
            <div>
                <dt class="text-xs text-gray-500 uppercase tracking-wide">Teléfono</dt>
                <dd class="mt-1">{{ $interesado->persona->telefono ?? '—' }}</dd>
            </div>
            <div>
                <dt class="text-xs text-gray-500 uppercase tracking-wide">Correo</dt>
                <dd class="mt-1">{{ $interesado->persona->correo ?? '—' }}</dd>
            </div>
        </dl>
    </div>

    {{-- Interesado Info --}}
    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="text-lg font-bold mb-4">Información de Captación</h2>
        <dl class="grid grid-cols-2 gap-4">
            <div>
                <dt class="text-xs text-gray-500 uppercase tracking-wide">Tipo de Actor</dt>
                <dd class="mt-1 font-medium">{{ $interesado->tipoActor->nombre }}</dd>
            </div>
            <div>
                <dt class="text-xs text-gray-500 uppercase tracking-wide">Comité</dt>
                <dd class="mt-1">{{ $interesado->comite->nombre ?? 'Sin comité' }}</dd>
            </div>
            <div>
                <dt class="text-xs text-gray-500 uppercase tracking-wide">Fecha de Registro</dt>
                <dd class="mt-1">{{ \Carbon\Carbon::parse($interesado->created_at)->format('d/m/Y H:i') }}</dd>
            </div>
            <div>
                <dt class="text-xs text-gray-500 uppercase tracking-wide">Estado de Postulación</dt>
                <dd class="mt-1">
                    @if($interesado->postulacion)
                        @php $estado = $interesado->postulacion->estado; @endphp
                        @if($estado === 'APROBADO')
                            <span class="px-2 py-1 rounded bg-green-100 text-green-700 text-xs">APROBADO</span>
                        @elseif($estado === 'RECHAZADO')
                            <span class="px-2 py-1 rounded bg-red-100 text-red-700 text-xs">RECHAZADO</span>
                        @else
                            <span class="px-2 py-1 rounded bg-yellow-100 text-yellow-700 text-xs">PENDIENTE</span>
                        @endif
                    @else
                        <span class="text-gray-400 text-xs">Sin postulación</span>
                    @endif
                </dd>
            </div>
        </dl>
    </div>

    <div>
        <a href="{{ route('interesados.index') }}" class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300 text-sm">
            Volver al listado
        </a>
    </div>
</div>

@endsection
