<?php

namespace App\Http\Controllers;

use App\Models\Evaluacion;
use App\Models\PostulacionPersonero;
use App\Models\IntentoEvaluacion;
use Illuminate\Http\Request;

class EvaluacionController extends Controller
{
    public function index()
    {
        $evaluaciones = Evaluacion::orderBy('nombre')->paginate(15);
        return view('evaluacion.index', compact('evaluaciones'));
    }

    public function create()
    {
        return view('evaluacion.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'       => 'nullable|string|max:200',
            'descripcion'  => 'nullable|string',
            'nota_minima'  => 'nullable|numeric|min:0|max:20',
        ]);
        Evaluacion::create($request->only('nombre','descripcion','nota_minima'));
        return redirect()->route('evaluaciones.index')->with('success', 'Evaluación registrada.');
    }

    public function show(Evaluacion $evaluacione)
    {
        $evaluacione->load('intentos.postulacion.interesado.persona');
        $postulaciones = PostulacionPersonero::with('interesado.persona')
            ->where('estado', 'APROBADO')->get();
        return view('evaluacion.show', compact('evaluacione','postulaciones'));
    }

    public function edit(Evaluacion $evaluacione)
    {
        return view('evaluacion.edit', compact('evaluacione'));
    }

    public function update(Request $request, Evaluacion $evaluacione)
    {
        $request->validate([
            'nombre'      => 'nullable|string|max:200',
            'descripcion' => 'nullable|string',
            'nota_minima' => 'nullable|numeric|min:0|max:20',
        ]);
        $evaluacione->update($request->only('nombre','descripcion','nota_minima'));
        return redirect()->route('evaluaciones.index')->with('success', 'Evaluación actualizada.');
    }

    public function destroy(Evaluacion $evaluacione)
    {
        $evaluacione->delete();
        return back()->with('success', 'Evaluación eliminada.');
    }
}
