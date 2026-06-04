<?php

namespace App\Http\Controllers;

use App\Models\ComiteBase;
use App\Models\Zona;
use Illuminate\Http\Request;

class ComiteBaseController extends Controller
{
    public function index()
    {
        $comites = ComiteBase::with('zona')->orderByDesc('id_comite')->paginate(15);
        return view('politica.comites.index', compact('comites'));
    }

    public function create()
    {
        $zonas = Zona::orderBy('nombre')->get();
        return view('politica.comites.create', compact('zonas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'      => 'required|string|max:150',
            'id_zona'     => 'nullable|exists:zona,id_zona',
            'responsable' => 'nullable|string|max:150',
            'observacion' => 'nullable|string',
        ]);
        ComiteBase::create($request->only('nombre','id_zona','responsable','observacion'));
        return redirect()->route('comites.index')->with('success', 'Comité registrado.');
    }

    public function edit(ComiteBase $comite)
    {
        $zonas = Zona::orderBy('nombre')->get();
        return view('politica.comites.edit', compact('comite', 'zonas'));
    }

    public function update(Request $request, ComiteBase $comite)
    {
        $request->validate([
            'nombre'      => 'required|string|max:150',
            'id_zona'     => 'nullable|exists:zona,id_zona',
            'responsable' => 'nullable|string|max:150',
            'observacion' => 'nullable|string',
        ]);
        $comite->update($request->only('nombre','id_zona','responsable','observacion'));
        return redirect()->route('comites.index')->with('success', 'Comité actualizado.');
    }

    public function destroy(ComiteBase $comite)
    {
        $comite->delete();
        return back()->with('success', 'Comité eliminado.');
    }
}
