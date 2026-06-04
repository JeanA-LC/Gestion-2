<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\TipoEvento;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function index()
    {
        $eventos = Evento::with('tipoEvento')->withCount('participaciones')
            ->orderByDesc('id_evento')->paginate(15);
        return view('participacion.eventos.index', compact('eventos'));
    }

    public function create()
    {
        $tipos = TipoEvento::orderBy('nombre')->get();
        return view('participacion.eventos.create', compact('tipos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_tipo_evento' => 'required|exists:tipo_evento,id_tipo_evento',
            'nombre'         => 'required|string|max:200',
            'descripcion'    => 'nullable|string',
            'fecha_inicio'   => 'nullable|date',
            'fecha_fin'      => 'nullable|date|after_or_equal:fecha_inicio',
            'lugar'          => 'nullable|string|max:255',
            'capacidad'      => 'nullable|integer|min:1',
        ]);
        Evento::create($request->only('id_tipo_evento','nombre','descripcion','fecha_inicio','fecha_fin','lugar','capacidad'));
        return redirect()->route('eventos.index')->with('success', 'Evento registrado.');
    }

    public function show(Evento $evento)
    {
        $evento->load(['tipoEvento','participaciones.interesado.persona']);
        return view('participacion.eventos.show', compact('evento'));
    }

    public function edit(Evento $evento)
    {
        $tipos = TipoEvento::orderBy('nombre')->get();
        return view('participacion.eventos.edit', compact('evento','tipos'));
    }

    public function update(Request $request, Evento $evento)
    {
        $request->validate([
            'id_tipo_evento' => 'required|exists:tipo_evento,id_tipo_evento',
            'nombre'         => 'required|string|max:200',
            'descripcion'    => 'nullable|string',
            'fecha_inicio'   => 'nullable|date',
            'fecha_fin'      => 'nullable|date|after_or_equal:fecha_inicio',
            'lugar'          => 'nullable|string|max:255',
            'capacidad'      => 'nullable|integer|min:1',
        ]);
        $evento->update($request->only('id_tipo_evento','nombre','descripcion','fecha_inicio','fecha_fin','lugar','capacidad'));
        return redirect()->route('eventos.index')->with('success', 'Evento actualizado.');
    }

    public function destroy(Evento $evento)
    {
        $evento->delete();
        return back()->with('success', 'Evento eliminado.');
    }
}
