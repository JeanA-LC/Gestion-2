@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
    <div class="bg-white rounded-xl shadow p-5">
        <p class="text-sm text-gray-500">Usuarios</p>
        <p class="text-3xl font-bold">1</p>
    </div>

    <div class="bg-white rounded-xl shadow p-5">
        <p class="text-sm text-gray-500">Interesados</p>
        <p class="text-3xl font-bold">0</p>
    </div>

    <div class="bg-white rounded-xl shadow p-5">
        <p class="text-sm text-gray-500">Postulaciones</p>
        <p class="text-3xl font-bold">0</p>
    </div>

    <div class="bg-white rounded-xl shadow p-5">
        <p class="text-sm text-gray-500">Asignaciones</p>
        <p class="text-3xl font-bold">0</p>
    </div>
</div>

<div class="mt-6 bg-white rounded-xl shadow p-6">
    <h3 class="text-lg font-semibold">Bienvenido, {{ auth()->user()->nombres }}</h3>
    <p class="text-gray-600 mt-2">
        Este es el panel administrativo del sistema.
    </p>
</div>

<pre>
ID: {{ auth()->id() }}

Usuario:
{{ auth()->user()->correo }}

Roles:
{{ auth()->user()->roles->pluck('nombre') }}
</pre>

@endsection