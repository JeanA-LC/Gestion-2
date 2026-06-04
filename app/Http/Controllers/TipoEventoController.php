<?php

namespace App\Http\Controllers;

use App\Models\TipoEvento;
use Illuminate\Http\Request;

class TipoEventoController extends Controller
{
    public function index()
    {
        $tipos = TipoEvento::withCount('eventos')->orderBy('nombre')->paginate(15);
        return view('participacion.tipos-evento.index', compact('tipos'));
    }

    public function create()
    {
        return view('participacion.tipos-evento.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'      => 'required|string|max:100|unique:tipo_evento,nombre',
            'descripcion' => 'nullable|string|max:255',
        ]);
        TipoEvento::create($request->only('nombre','descripcion'));
        return redirect()->route('tipo-evento.index')->with('success', 'Tipo de evento creado.');
    }

    public function edit(TipoEvento $tipoEvento)
    {
        return view('participacion.tipos-evento.edit', compact('tipoEvento'));
    }

    public function update(Request $request, TipoEvento $tipoEvento)
    {
        $request->validate([
            'nombre'      => 'required|string|max:100|unique:tipo_evento,nombre,'.$tipoEvento->id_tipo_evento.',id_tipo_evento',
            'descripcion' => 'nullable|string|max:255',
        ]);
        $tipoEvento->update($request->only('nombre','descripcion'));
        return redirect()->route('tipo-evento.index')->with('success', 'Tipo de evento actualizado.');
    }

    public function destroy(TipoEvento $tipoEvento)
    {
        $tipoEvento->delete();
        return back()->with('success', 'Tipo de evento eliminado.');
    }
}
