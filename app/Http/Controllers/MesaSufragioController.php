<?php

namespace App\Http\Controllers;

use App\Models\MesaSufragio;
use App\Models\CentroVotacion;
use Illuminate\Http\Request;

class MesaSufragioController extends Controller
{
    public function index()
    {
        $mesas = MesaSufragio::with('centroVotacion.zona')
            ->orderByDesc('id_mesa')->paginate(15);
        return view('electoral.mesas.index', compact('mesas'));
    }

    public function create()
    {
        $centros = CentroVotacion::orderBy('nombre')->get();
        return view('electoral.mesas.create', compact('centros'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_centro_votacion' => 'required|exists:centro_votacion,id_centro_votacion',
            'codigo_mesa'        => 'nullable|string|max:20|unique:mesa_sufragio,codigo_mesa',
            'electores'          => 'nullable|integer|min:0',
        ]);
        MesaSufragio::create($request->only('id_centro_votacion','codigo_mesa','electores'));
        return redirect()->route('mesas-sufragio.index')->with('success', 'Mesa registrada.');
    }

    public function edit(MesaSufragio $mesasSufragio)
    {
        $centros = CentroVotacion::orderBy('nombre')->get();
        return view('electoral.mesas.edit', compact('mesasSufragio','centros'));
    }

    public function update(Request $request, MesaSufragio $mesasSufragio)
    {
        $request->validate([
            'id_centro_votacion' => 'required|exists:centro_votacion,id_centro_votacion',
            'codigo_mesa'        => 'nullable|string|max:20|unique:mesa_sufragio,codigo_mesa,'.$mesasSufragio->id_mesa.',id_mesa',
            'electores'          => 'nullable|integer|min:0',
        ]);
        $mesasSufragio->update($request->only('id_centro_votacion','codigo_mesa','electores'));
        return redirect()->route('mesas-sufragio.index')->with('success', 'Mesa actualizada.');
    }

    public function destroy(MesaSufragio $mesasSufragio)
    {
        $mesasSufragio->delete();
        return back()->with('success', 'Mesa eliminada.');
    }
}
