<?php

namespace App\Http\Controllers;

use App\Models\Participacion;
use App\Models\Interesado;
use App\Models\Evento;
use Illuminate\Http\Request;

class ParticipacionController extends Controller
{
    public function index()
    {
        $participaciones = Participacion::with(['interesado.persona','evento'])
            ->orderByDesc('id_participacion')->paginate(15);
        return view('participacion.participaciones.index', compact('participaciones'));
    }

    public function create()
    {
        $interesados = Interesado::with('persona')->get();
        $eventos     = Evento::orderByDesc('fecha_inicio')->get();
        return view('participacion.participaciones.create', compact('interesados','eventos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_interesado'       => 'required|exists:interesado,id_interesado',
            'id_evento'           => 'required|exists:evento,id_evento',
            'tipo_contacto'       => 'nullable|string|max:100',
            'resultado'           => 'nullable|string|max:255',
            'nivel_participacion' => 'nullable|integer|min:1|max:10',
            'grado_incidencia'    => 'nullable|in:BAJO,MEDIO,ALTO',
            'observacion'         => 'nullable|string',
        ]);
        Participacion::create($request->only(
            'id_interesado','id_evento','tipo_contacto','resultado',
            'nivel_participacion','grado_incidencia','observacion'
        ));
        return redirect()->route('participaciones.index')->with('success', 'Participación registrada.');
    }

    public function edit(Participacion $participacione)
    {
        $interesados = Interesado::with('persona')->get();
        $eventos     = Evento::orderByDesc('fecha_inicio')->get();
        return view('participacion.participaciones.edit', [
            'participacion' => $participacione,
            'interesados'   => $interesados,
            'eventos'       => $eventos,
        ]);
    }

    public function update(Request $request, Participacion $participacione)
    {
        $request->validate([
            'tipo_contacto'       => 'nullable|string|max:100',
            'resultado'           => 'nullable|string|max:255',
            'nivel_participacion' => 'nullable|integer|min:1|max:10',
            'grado_incidencia'    => 'nullable|in:BAJO,MEDIO,ALTO',
            'observacion'         => 'nullable|string',
        ]);
        $participacione->update($request->only(
            'tipo_contacto','resultado','nivel_participacion','grado_incidencia','observacion'
        ));
        return redirect()->route('participaciones.index')->with('success', 'Participación actualizada.');
    }

    public function destroy(Participacion $participacione)
    {
        $participacione->delete();
        return back()->with('success', 'Participación eliminada.');
    }
}
