<?php

namespace App\Http\Controllers;

use App\Models\ReporteEstado;
use App\Models\AsignacionPersonero;
use Illuminate\Http\Request;

class ReporteEstadoController extends Controller
{
    public function index()
    {
        $reportes = ReporteEstado::with('asignacion.postulacion.interesado.persona')
            ->orderByDesc('fecha_reporte')->paginate(15);
        return view('reportes.estado.index', compact('reportes'));
    }

    public function create()
    {
        $asignaciones = AsignacionPersonero::with('postulacion.interesado.persona')
            ->whereIn('estado',['ASIGNADO','CONFIRMADO'])->get();
        return view('reportes.estado.create', compact('asignaciones'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_asignacion' => 'required|exists:asignacion_personero,id_asignacion',
            'estado_general'=> 'required|in:SIN_NOVEDAD,OBSERVACION,INCIDENCIA,CRITICO',
            'observacion'   => 'nullable|string',
        ]);
        ReporteEstado::create($request->only('id_asignacion','estado_general','observacion'));
        return redirect()->route('reportes-estado.index')->with('success', 'Reporte enviado.');
    }

    public function edit(ReporteEstado $reportesEstado)
    {
        return view('reportes.estado.edit', compact('reportesEstado'));
    }

    public function update(Request $request, ReporteEstado $reportesEstado)
    {
        $request->validate([
            'estado_general' => 'required|in:SIN_NOVEDAD,OBSERVACION,INCIDENCIA,CRITICO',
            'observacion'    => 'nullable|string',
        ]);
        $reportesEstado->update($request->only('estado_general','observacion'));
        return redirect()->route('reportes-estado.index')->with('success', 'Reporte actualizado.');
    }

    public function destroy(ReporteEstado $reportesEstado)
    {
        $reportesEstado->delete();
        return back()->with('success', 'Reporte eliminado.');
    }
}
