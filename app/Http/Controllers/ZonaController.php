<?php

namespace App\Http\Controllers;

use App\Models\Zona;
use App\Models\Distrito;
use App\Http\Requests\ZonaRequest;
use Illuminate\Http\Request;

class ZonaController extends Controller
{
    public function index()
    {
        $zonas = Zona::with('distrito.provincia.departamento')
            ->orderBy('id_zona')
            ->paginate(15);

        return view('territorial.zonas.index', compact('zonas'));
    }

    public function create()
    {
        $distritos = Distrito::with('provincia.departamento')->orderBy('nombre')->get();
        return view('territorial.zonas.create', compact('distritos'));
    }

    public function store(ZonaRequest $request)
    {
        Zona::create($request->validated());

        return redirect()
            ->route('zonas.index')
            ->with('success', 'Zona registrada correctamente.');
    }

    public function edit($id)
    {
        $zona = Zona::findOrFail($id);
        $distritos = Distrito::with('provincia.departamento')->orderBy('nombre')->get();

        return view('territorial.zonas.edit', compact('zona', 'distritos'));
    }

    public function update(ZonaRequest $request, $id)
    {
        Zona::findOrFail($id)->update($request->validated());

        return redirect()
            ->route('zonas.index')
            ->with('success', 'Zona actualizada correctamente.');
    }

    public function destroy($id)
    {
        Zona::findOrFail($id)->delete();

        return back()->with('success', 'Zona eliminada.');
    }
}
