<?php

namespace App\Http\Controllers;

use App\Models\TipoPersonero;
use Illuminate\Http\Request;

class TipoPersoneroController extends Controller
{
    public function index()
    {
        $tipos = TipoPersonero::orderBy('nombre')->paginate(15);
        return view('electoral.tipos-personero.index', compact('tipos'));
    }

    public function create()
    {
        return view('electoral.tipos-personero.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'                 => 'required|string|max:100|unique:tipo_personero,nombre',
            'nivel_correspondiente'  => 'required|in:PROVINCIA,DISTRITO,ZONA,CENTRO_VOTACION,MESA_SUFRAGIO',
            'descripcion'            => 'nullable|string',
        ]);
        TipoPersonero::create($request->only('nombre','nivel_correspondiente','descripcion'));
        return redirect()->route('tipos-personero.index')->with('success', 'Tipo de personero creado.');
    }

    public function edit(TipoPersonero $tiposPersonero)
    {
        return view('electoral.tipos-personero.edit', compact('tiposPersonero'));
    }

    public function update(Request $request, TipoPersonero $tiposPersonero)
    {
        $request->validate([
            'nombre'                => 'required|string|max:100|unique:tipo_personero,nombre,'.$tiposPersonero->id_tipo_personero.',id_tipo_personero',
            'nivel_correspondiente' => 'required|in:PROVINCIA,DISTRITO,ZONA,CENTRO_VOTACION,MESA_SUFRAGIO',
            'descripcion'           => 'nullable|string',
        ]);
        $tiposPersonero->update($request->only('nombre','nivel_correspondiente','descripcion'));
        return redirect()->route('tipos-personero.index')->with('success', 'Tipo de personero actualizado.');
    }

    public function destroy(TipoPersonero $tiposPersonero)
    {
        $tiposPersonero->delete();
        return back()->with('success', 'Tipo de personero eliminado.');
    }
}
