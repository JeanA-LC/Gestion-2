<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    public function index()
    {
        $personas = Persona::orderByDesc('id_persona')->paginate(15);
        return view('personas.index', compact('personas'));
    }

    public function create()
    {
        return view('personas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'dni'       => 'required|string|size:8|unique:persona,dni',
            'nombres'   => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'telefono'  => 'nullable|string|max:20',
            'correo'    => 'nullable|email|max:150',
            'direccion' => 'nullable|string|max:255',
        ]);

        Persona::create($request->only('dni','nombres','apellidos','telefono','correo','direccion'));

        return redirect()->route('personas.index')->with('success', 'Persona registrada.');
    }

    public function show(Persona $persona)
    {
        $persona->load(['interesados.tipoActor', 'historialActorPolitico.tipoActor']);
        return view('personas.show', compact('persona'));
    }

    public function edit(Persona $persona)
    {
        return view('personas.edit', compact('persona'));
    }

    public function update(Request $request, Persona $persona)
    {
        $request->validate([
            'dni'       => 'required|string|size:8|unique:persona,dni,'.$persona->id_persona.',id_persona',
            'nombres'   => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'telefono'  => 'nullable|string|max:20',
            'correo'    => 'nullable|email|max:150',
            'direccion' => 'nullable|string|max:255',
        ]);

        $persona->update($request->only('dni','nombres','apellidos','telefono','correo','direccion'));

        return redirect()->route('personas.index')->with('success', 'Persona actualizada.');
    }

    public function destroy(Persona $persona)
    {
        $persona->delete();
        return back()->with('success', 'Persona eliminada.');
    }
}
