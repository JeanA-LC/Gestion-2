<?php

namespace App\Http\Controllers;

use App\Models\Distrito;
use App\Models\Provincia;
use App\Http\Requests\DistritoRequest;
use Illuminate\Http\Request;

class DistritoController extends Controller
{
    public function index()
    {
        $distritos = Distrito::with('provincia.departamento')
            ->withCount('zonas')
            ->orderBy('id_distrito')
            ->paginate(15);

        return view('territorial.distritos.index', compact('distritos'));
    }

    public function create()
    {
        $provincias = Provincia::with('departamento')->orderBy('nombre')->get();
        return view('territorial.distritos.create', compact('provincias'));
    }

    public function store(DistritoRequest $request)
    {
        Distrito::create($request->validated());

        return redirect()
            ->route('distritos.index')
            ->with('success', 'Distrito registrado correctamente.');
    }

    public function edit($id)
    {
        $distrito = Distrito::findOrFail($id);
        $provincias = Provincia::with('departamento')->orderBy('nombre')->get();

        return view('territorial.distritos.edit', compact('distrito', 'provincias'));
    }

    public function update(Request $request, $id)
    {
        $distrito = Distrito::findOrFail($id);

        $request->validate([
            'id_provincia' => 'required|exists:provincia,id_provincia',
            'nombre'       => 'required|string|max:100',
            'ubigeo'       => 'required|string|max:6|unique:distrito,ubigeo,' . $distrito->id_distrito . ',id_distrito',
        ]);

        $distrito->update($request->only('id_provincia', 'nombre', 'ubigeo'));

        return redirect()
            ->route('distritos.index')
            ->with('success', 'Distrito actualizado correctamente.');
    }

    public function destroy($id)
    {
        Distrito::findOrFail($id)->delete();

        return back()->with('success', 'Distrito eliminado.');
    }
}
