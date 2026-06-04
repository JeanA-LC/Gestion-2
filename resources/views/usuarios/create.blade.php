@extends('layouts.admin')

@section('title', 'Nuevo usuario')

@section('content')
<h1 class="text-2xl font-bold mb-4">Crear usuario</h1>

<form action="{{ route('usuarios.store') }}" method="POST" class="bg-white rounded-xl shadow p-6">
    @include('usuarios._form', [
        'usuario' => null,
        'usuarioRoles' => [],
    ])
</form>
@endsection