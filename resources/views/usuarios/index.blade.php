@extends('layouts.admin')

@section('title', 'Usuarios')

@section('content')

<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-5">
    <h1 class="text-lg sm:text-xl font-bold">Usuarios</h1>
    <a href="{{ route('usuarios.create') }}" class="bg-slate-900 text-white px-4 py-2 rounded">
        Nuevo usuario
    </a>
</div>

<div class="bg-white rounded-xl shadow overflow-hidden">
    <div class="overflow-x-auto">
    <table class="w-full text-sm">
        <thead class="bg-gray-100">
            <tr>
                <th class="text-left px-4 py-3">Nombre</th>
                <th class="text-left px-4 py-3">Correo</th>
                <th class="text-left px-4 py-3">Zona</th>
                <th class="text-left px-4 py-3">Estado</th>
                <th class="text-left px-4 py-3">Roles</th>
                <th class="text-left px-4 py-3">Acciones</th>
            </tr>
        </thead>
        <tbody>

            @forelse($usuarios as $usuario)
                <tr class="border-t">
                    <td class="px-4 py-3">
                        {{ $usuario->nombres }} {{ $usuario->apellidos }}
                    </td>
                    <td class="px-4 py-3">{{ $usuario->correo }}</td>
                    <td class="px-4 py-3">
                        {{ $usuario->zona?->nombre ?? 'Sin zona' }}
                    </td>
                    <td class="px-4 py-3">
                        @if($usuario->estado)
                            <span class="px-2 py-1 rounded bg-green-100 text-green-700">Activo</span>
                        @else
                            <span class="px-2 py-1 rounded bg-red-100 text-red-700">Inactivo</span>
                        @endif
                    </td>
                    <td class="px-4 py-3">
                        {{ $usuario->roles->pluck('nombre')->join(', ') }}
                    </td>
                    <td class="px-4 py-3 space-x-2">
                        <a href="{{ route('usuarios.show', $usuario) }}" class="text-blue-600">Ver</a>
                        <a href="{{ route('usuarios.edit', $usuario) }}" class="text-yellow-600">Editar</a>

                        <form action="{{ route('usuarios.destroy', $usuario) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Desactivar este usuario?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600">Desactivar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-4 py-6 text-center text-gray-500">
                        No hay usuarios registrados.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    </div>
</div>



<div class="mt-4">
    {{ $usuarios->links() }}
</div>
@endsection
