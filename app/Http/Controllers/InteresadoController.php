<?php

namespace App\Http\Controllers;

use App\Models\Interesado;
use App\Models\Persona;
use App\Models\TipoActorPolitico;
use App\Models\ComiteBase;
use App\Models\Usuario;
use Illuminate\Http\Request;

class InteresadoController extends Controller
{
    public function index()
    {
        $interesados = Interesado::with(['persona','tipoActor','comite'])
            ->orderByDesc('id_interesado')->paginate(15);
        return view('captacion.interesados.index', compact('interesados'));
    }

    public function create()
    {
        $personas   = Persona::orderBy('apellidos')->get();
        $tipos      = TipoActorPolitico::orderBy('nombre')->get();
        $comites    = ComiteBase::orderBy('nombre')->get();
        return view('captacion.interesados.create', compact('personas','tipos','comites'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_persona'     => 'required|exists:persona,id_persona|unique:interesado,id_persona',
            'id_tipo_actor'  => 'required|exists:tipo_actor_politico,id_tipo_actor',
            'id_comite'      => 'nullable|exists:comite_base,id_comite',
        ]);

        Interesado::create([
            'id_persona'    => $request->id_persona,
            'id_usuario'    => auth()->id(),
            'id_tipo_actor' => $request->id_tipo_actor,
            'id_comite'     => $request->id_comite,
        ]);

        return redirect()->route('interesados.index')->with('success', 'Interesado registrado.');
    }

    public function show(Interesado $interesado)
    {
        $interesado->load(['persona','tipoActor','comite','usuario',
            'postulacion','participaciones.evento']);
        return view('captacion.interesados.show', compact('interesado'));
    }

    public function edit(Interesado $interesado)
    {
        $tipos   = TipoActorPolitico::orderBy('nombre')->get();
        $comites = ComiteBase::orderBy('nombre')->get();
        return view('captacion.interesados.edit', compact('interesado','tipos','comites'));
    }

    public function update(Request $request, Interesado $interesado)
    {
        $request->validate([
            'id_tipo_actor' => 'required|exists:tipo_actor_politico,id_tipo_actor',
            'id_comite'     => 'nullable|exists:comite_base,id_comite',
        ]);
        $interesado->update($request->only('id_tipo_actor','id_comite'));
        return redirect()->route('interesados.index')->with('success', 'Interesado actualizado.');
    }

    public function destroy(Interesado $interesado)
    {
        $interesado->delete();
        return back()->with('success', 'Interesado eliminado.');
    }
}
