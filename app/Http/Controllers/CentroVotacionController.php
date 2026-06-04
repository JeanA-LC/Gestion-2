<?php

namespace App\Http\Controllers;

use App\Models\CentroVotacion;
use App\Models\Zona;
use Illuminate\Http\Request;

class CentroVotacionController extends Controller
{
    public function index()
    {
        $centros = CentroVotacion::with('zona')->withCount('mesas')
            ->orderByDesc('id_centro_votacion')->paginate(15);
        return view('electoral.centros.index', compact('centros'));
    }

    public function create()
    {
        $zonas = Zona::orderBy('nombre')->get();
        return view('electoral.centros.create', compact('zonas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_zona'   => 'required|exists:zona,id_zona',
            'nombre'    => 'required|string|max:200',
            'direccion' => 'nullable|string|max:255',
            'latitud'   => 'nullable|numeric',
            'longitud'  => 'nullable|numeric',
        ]);
        CentroVotacion::create($request->only('id_zona','nombre','direccion','latitud','longitud'));
        return redirect()->route('centros-votacion.index')->with('success', 'Centro de votación registrado.');
    }

    public function edit(CentroVotacion $centrosVotacion)
    {
        $zonas = Zona::orderBy('nombre')->get();
        return view('electoral.centros.edit', compact('centrosVotacion','zonas'));
    }

    public function update(Request $request, CentroVotacion $centrosVotacion)
    {
        $request->validate([
            'id_zona'   => 'required|exists:zona,id_zona',
            'nombre'    => 'required|string|max:200',
            'direccion' => 'nullable|string|max:255',
            'latitud'   => 'nullable|numeric',
            'longitud'  => 'nullable|numeric',
        ]);
        $centrosVotacion->update($request->only('id_zona','nombre','direccion','latitud','longitud'));
        return redirect()->route('centros-votacion.index')->with('success', 'Centro de votación actualizado.');
    }

    public function destroy(CentroVotacion $centrosVotacion)
    {
        $centrosVotacion->delete();
        return back()->with('success', 'Centro de votación eliminado.');
    }
}
