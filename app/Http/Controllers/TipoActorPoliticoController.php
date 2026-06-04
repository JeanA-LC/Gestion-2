<?php

namespace App\Http\Controllers;

use App\Models\TipoActorPolitico;
use Illuminate\Http\Request;

class TipoActorPoliticoController extends Controller
{
    public function index()
    {
        $tipos = TipoActorPolitico::withCount('historiales')->orderBy('nombre')->paginate(15);
        return view('politica.tipos-actor.index', compact('tipos'));
    }

    public function create()
    {
        return view('politica.tipos-actor.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'      => 'required|string|max:100|unique:tipo_actor_politico,nombre',
            'descripcion' => 'nullable|string',
        ]);
        TipoActorPolitico::create($request->only('nombre', 'descripcion'));
        return redirect()->route('tipo-actor-politico.index')->with('success', 'Tipo de actor creado.');
    }

    public function edit(TipoActorPolitico $tipoActorPolitico)
    {
        return view('politica.tipos-actor.edit', compact('tipoActorPolitico'));
    }

    public function update(Request $request, TipoActorPolitico $tipoActorPolitico)
    {
        $request->validate([
            'nombre'      => 'required|string|max:100|unique:tipo_actor_politico,nombre,'.$tipoActorPolitico->id_tipo_actor.',id_tipo_actor',
            'descripcion' => 'nullable|string',
        ]);
        $tipoActorPolitico->update($request->only('nombre', 'descripcion'));
        return redirect()->route('tipo-actor-politico.index')->with('success', 'Tipo de actor actualizado.');
    }

    public function destroy(TipoActorPolitico $tipoActorPolitico)
    {
        $tipoActorPolitico->delete();
        return back()->with('success', 'Tipo de actor eliminado.');
    }
}
