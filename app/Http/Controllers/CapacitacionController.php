<?php

namespace App\Http\Controllers;

use App\Models\Capacitacion;
use Illuminate\Http\Request;

class CapacitacionController extends Controller
{
    public function index()
    {
        $capacitaciones = Capacitacion::orderBy('nombre')->paginate(15);
        return view('capacitacion.index', compact('capacitaciones'));
    }

    public function create()
    {
        return view('capacitacion.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'            => 'required|string|max:200',
            'descripcion'       => 'nullable|string',
            'url_video'         => 'nullable|url|max:500',
            'duracion_minutos'  => 'nullable|integer|min:1',
        ]);
        Capacitacion::create($request->only('nombre','descripcion','url_video','duracion_minutos'));
        return redirect()->route('capacitaciones.index')->with('success', 'Capacitación registrada.');
    }

    public function edit(Capacitacion $capacitacione)
    {
        return view('capacitacion.edit', compact('capacitacione'));
    }

    public function update(Request $request, Capacitacion $capacitacione)
    {
        $request->validate([
            'nombre'           => 'required|string|max:200',
            'descripcion'      => 'nullable|string',
            'url_video'        => 'nullable|url|max:500',
            'duracion_minutos' => 'nullable|integer|min:1',
        ]);
        $capacitacione->update($request->only('nombre','descripcion','url_video','duracion_minutos'));
        return redirect()->route('capacitaciones.index')->with('success', 'Capacitación actualizada.');
    }

    public function destroy(Capacitacion $capacitacione)
    {
        $capacitacione->delete();
        return back()->with('success', 'Capacitación eliminada.');
    }
}
