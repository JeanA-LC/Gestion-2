@extends('layouts.admin')

@section('title', 'Editar usuario')

@section('content')
<h1 class="text-2xl font-bold mb-4">Editar usuario</h1>

<form action="{{ route('usuarios.update', $usuario) }}" method="POST" class="bg-white rounded-xl shadow p-6">
    @method('PUT')
    @include('usuarios._form', [
        'usuario' => $usuario,
        'usuarioRoles' => $usuario->roles->pluck('id_rol')->toArray(),
    ])
</form>
@endsection