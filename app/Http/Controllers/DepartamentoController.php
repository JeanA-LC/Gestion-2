<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    public function index()
    {
        $departamentos = Departamento::withCount('provincias')->orderBy('nombre')->paginate(10);

        return view(
            'territorial.departamentos.index',
            compact('departamentos')
        );
    }

    public function create()
    {
        return view('territorial.departamentos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:100|unique:departamento,nombre'
        ]);

        Departamento::create([
            'nombre' => $request->nombre
        ]);

        return redirect()
            ->route('departamentos.index')
            ->with('success','Departamento registrado');
    }

    public function edit($id)
    {
        $departamento = Departamento::findOrFail($id);

        return view(
            'territorial.departamentos.edit',
            compact('departamento')
        );
    }

    public function update(Request $request, $id)
    {
        $departamento = Departamento::findOrFail($id);

        $request->validate([
            'nombre' =>
            'required|max:100|unique:departamento,nombre,' .
            $departamento->id_departamento .
            ',id_departamento'
        ]);

        $departamento->update([
            'nombre' => $request->nombre
        ]);

        return redirect()
            ->route('departamentos.index')
            ->with('success','Departamento actualizado');
    }

    public function destroy($id)
    {
        Departamento::findOrFail($id)->delete();

        return back()
            ->with('success','Departamento eliminado');
    }
}