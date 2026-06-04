<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUsuarioRequest;
use App\Http\Requests\UpdateUsuarioRequest;
use App\Models\Rol;
use App\Models\User;
use App\Models\Zona;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = User::with(['roles', 'zona'])
            ->orderByDesc('id_usuario')
            ->paginate(10);

        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        $roles = Rol::orderBy('nombre')->get();
        $zonas = Zona::orderBy('nombre')->get();

        return view('usuarios.create', compact('roles', 'zonas'));
    }

    public function store(StoreUsuarioRequest $request)
    {
        DB::transaction(function () use ($request) {
            $usuario = User::create([
                'nombres' => $request->nombres,
                'apellidos' => $request->apellidos,
                'correo' => $request->correo,
                'password' => Hash::make($request->password),
                'telefono' => $request->telefono,
                'id_zona' => $request->id_zona,
                'estado' => $request->boolean('estado'),
            ]);

            $usuario->roles()->sync($request->roles ?? []);
        });

        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario creado correctamente.');
    }

    public function show(User $usuario)
    {
        $usuario->load(['roles', 'zona']);

        return view('usuarios.show', compact('usuario'));
    }

    public function edit(User $usuario)
    {
        $usuario->load('roles');
        $roles = Rol::orderBy('nombre')->get();
        $zonas = Zona::orderBy('nombre')->get();

        return view('usuarios.edit', compact('usuario', 'roles', 'zonas'));
    }

    public function update(UpdateUsuarioRequest $request, User $usuario)
    {
        DB::transaction(function () use ($request, $usuario) {
            $data = [
                'nombres' => $request->nombres,
                'apellidos' => $request->apellidos,
                'correo' => $request->correo,
                'telefono' => $request->telefono,
                'id_zona' => $request->id_zona,
                'estado' => $request->boolean('estado'),
            ];

            if ($request->filled('password')) {
                $data['password'] = Hash::make($request->password);
            }

            $usuario->update($data);
            $usuario->roles()->sync($request->roles ?? []);
        });

        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario actualizado correctamente.');
    }

    public function destroy(User $usuario)
    {
        $usuario->update(['estado' => false]);

        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario desactivado correctamente.');
    }
}