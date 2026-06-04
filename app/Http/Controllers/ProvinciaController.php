<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Provincia;
use App\Http\Requests\ProvinciaRequest;
use Illuminate\Http\Request;

class ProvinciaController extends Controller
{
    public function index()
    {
        $provincias = Provincia::with('departamento')
            ->withCount('distritos')
            ->orderBy('id_provincia')
            ->paginate(15);

        return view('territorial.provincias.index', compact('provincias'));
    }

    public function create()
    {
        $departamentos = Departamento::orderBy('nombre')->get();
        return view('territorial.provincias.create', compact('departamentos'));
    }

    public function store(ProvinciaRequest $request)
    {
        Provincia::create($request->validated());

        return redirect()
            ->route('provincias.index')
            ->with('success', 'Provincia registrada correctamente.');
    }

    public function edit($id)
    {
        $provincia = Provincia::findOrFail($id);
        $departamentos = Departamento::orderBy('nombre')->get();

        return view('territorial.provincias.edit', compact('provincia', 'departamentos'));
    }

    public function update(ProvinciaRequest $request, $id)
    {
        Provincia::findOrFail($id)->update($request->validated());

        return redirect()
            ->route('provincias.index')
            ->with('success', 'Provincia actualizada correctamente.');
    }

    public function destroy($id)
    {
        Provincia::findOrFail($id)->delete();

        return back()->with('success', 'Provincia eliminada.');
    }
}
