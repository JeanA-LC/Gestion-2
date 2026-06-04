<?php

namespace App\Http\Controllers;

use App\Models\AsignacionPersonero;
use App\Models\PostulacionPersonero;
use App\Models\TipoPersonero;
use App\Models\Provincia;
use App\Models\Distrito;
use App\Models\Zona;
use App\Models\CentroVotacion;
use App\Models\MesaSufragio;
use Illuminate\Http\Request;

class AsignacionPersoneroController extends Controller
{
    public function index()
    {
        $asignaciones = AsignacionPersonero::with(['postulacion.interesado.persona','tipoPersonero'])
            ->orderByDesc('id_asignacion')->paginate(15);
        return view('asignaciones.index', compact('asignaciones'));
    }

    public function create()
    {
        $postulaciones    = PostulacionPersonero::with('interesado.persona')
            ->where('estado','APROBADO')->get();
        $tiposPersonero   = TipoPersonero::orderBy('nombre')->get();
        $provincias       = Provincia::orderBy('nombre')->get();
        $distritos        = Distrito::orderBy('nombre')->get();
        $zonas            = Zona::orderBy('nombre')->get();
        $centros          = CentroVotacion::orderBy('nombre')->get();
        $mesas            = MesaSufragio::orderBy('codigo_mesa')->get();
        return view('asignaciones.create', compact(
            'postulaciones','tiposPersonero','provincias','distritos','zonas','centros','mesas'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_postulacion'   => 'required|exists:postulacion_personero,id_postulacion',
            'id_tipo_personero'=> 'required|exists:tipo_personero,id_tipo_personero',
            'nivel_asignacion' => 'required|in:PROVINCIA,DISTRITO,ZONA,CENTRO_VOTACION,MESA_SUFRAGIO',
            'id_referencia'    => 'required|integer',
            'observacion'      => 'nullable|string|max:255',
        ]);
        AsignacionPersonero::create($request->only(
            'id_postulacion','id_tipo_personero','nivel_asignacion','id_referencia','observacion'
        ));
        return redirect()->route('asignaciones.index')->with('success', 'Personero asignado correctamente.');
    }

    public function show(AsignacionPersonero $asignacione)
    {
        $asignacione->load(['postulacion.interesado.persona','tipoPersonero','reportesEstado','reportesFinales']);
        return view('asignaciones.show', compact('asignacione'));
    }

    public function edit(AsignacionPersonero $asignacione)
    {
        $tiposPersonero = TipoPersonero::orderBy('nombre')->get();
        return view('asignaciones.edit', compact('asignacione','tiposPersonero'));
    }

    public function update(Request $request, AsignacionPersonero $asignacione)
    {
        $request->validate([
            'estado'      => 'required|in:ASIGNADO,CONFIRMADO,RECHAZADO,FINALIZADO',
            'observacion' => 'nullable|string|max:255',
        ]);
        $asignacione->update($request->only('estado','observacion'));
        return redirect()->route('asignaciones.index')->with('success', 'Asignación actualizada.');
    }

    public function destroy(AsignacionPersonero $asignacione)
    {
        $asignacione->delete();
        return back()->with('success', 'Asignación eliminada.');
    }
}
