<?php

namespace App\Http\Controllers;

use App\Models\PostulacionPersonero;
use App\Models\Interesado;
use App\Models\HistorialPostulacion;
use Illuminate\Http\Request;

class PostulacionPersoneroController extends Controller
{
    public function index()
    {
        $postulaciones = PostulacionPersonero::with('interesado.persona')
            ->orderByDesc('id_postulacion')->paginate(15);
        return view('postulacion.index', compact('postulaciones'));
    }

    public function create()
    {
        $interesados = Interesado::with('persona')
            ->doesntHave('postulacion')
            ->get();
        return view('postulacion.create', compact('interesados'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_interesado'   => 'required|exists:interesado,id_interesado|unique:postulacion_personero,id_interesado',
            'experiencia'     => 'nullable|string',
            'disponibilidad'  => 'nullable|string|max:100',
            'transporte_propio' => 'nullable|boolean',
        ]);

        $postulacion = PostulacionPersonero::create([
            'id_interesado'    => $request->id_interesado,
            'experiencia'      => $request->experiencia,
            'disponibilidad'   => $request->disponibilidad,
            'transporte_propio'=> $request->boolean('transporte_propio'),
            'estado'           => 'PENDIENTE',
        ]);

        HistorialPostulacion::create([
            'id_postulacion' => $postulacion->id_postulacion,
            'estado'         => 'PENDIENTE',
            'observacion'    => 'Postulación registrada.',
        ]);

        return redirect()->route('postulaciones.index')->with('success', 'Postulación registrada.');
    }

    public function show(PostulacionPersonero $postulacione)
    {
        $postulacione->load([
            'interesado.persona',
            'historial',
            'capacitaciones.capacitacion',
            'intentos.evaluacion',
            'credencial',
            'asignaciones.tipoPersonero',
        ]);
        return view('postulacion.show', compact('postulacione'));
    }

    public function edit(PostulacionPersonero $postulacione)
    {
        return view('postulacion.edit', compact('postulacione'));
    }

    public function update(Request $request, PostulacionPersonero $postulacione)
    {
        $request->validate([
            'estado'           => 'required|in:PENDIENTE,APROBADO,RECHAZADO',
            'experiencia'      => 'nullable|string',
            'disponibilidad'   => 'nullable|string|max:100',
            'transporte_propio'=> 'nullable|boolean',
            'observacion'      => 'nullable|string',
        ]);

        $postulacione->update([
            'estado'           => $request->estado,
            'experiencia'      => $request->experiencia,
            'disponibilidad'   => $request->disponibilidad,
            'transporte_propio'=> $request->boolean('transporte_propio'),
        ]);

        HistorialPostulacion::create([
            'id_postulacion' => $postulacione->id_postulacion,
            'estado'         => $request->estado,
            'observacion'    => $request->observacion,
        ]);

        return redirect()->route('postulaciones.index')->with('success', 'Postulación actualizada.');
    }

    public function destroy(PostulacionPersonero $postulacione)
    {
        $postulacione->delete();
        return back()->with('success', 'Postulación eliminada.');
    }
}
