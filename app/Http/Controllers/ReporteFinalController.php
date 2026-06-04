<?php

namespace App\Http\Controllers;

use App\Models\ReporteFinal;
use App\Models\AsignacionPersonero;
use Illuminate\Http\Request;

class ReporteFinalController extends Controller
{
    public function index()
    {
        $reportes = ReporteFinal::with('asignacion.postulacion.interesado.persona')
            ->orderByDesc('fecha_reporte')->paginate(15);
        return view('reportes.final.index', compact('reportes'));
    }

    public function create()
    {
        $asignaciones = AsignacionPersonero::with('postulacion.interesado.persona')
            ->whereIn('estado',['ASIGNADO','CONFIRMADO','FINALIZADO'])->get();
        return view('reportes.final.create', compact('asignaciones'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_asignacion' => 'required|exists:asignacion_personero,id_asignacion',
            'resumen'       => 'required|string',
            'incidencias'   => 'nullable|string',
            'archivo_acta'  => 'nullable|string|max:255',
        ]);
        ReporteFinal::create($request->only('id_asignacion','resumen','incidencias','archivo_acta'));

        AsignacionPersonero::find($request->id_asignacion)->update(['estado' => 'FINALIZADO']);

        return redirect()->route('reportes-final.index')->with('success', 'Reporte final enviado.');
    }

    public function show(ReporteFinal $reportesFinal)
    {
        $reportesFinal->load('asignacion.postulacion.interesado.persona');
        return view('reportes.final.show', compact('reportesFinal'));
    }

    public function edit(ReporteFinal $reportesFinal)
    {
        return view('reportes.final.edit', compact('reportesFinal'));
    }

    public function update(Request $request, ReporteFinal $reportesFinal)
    {
        $request->validate([
            'resumen'      => 'required|string',
            'incidencias'  => 'nullable|string',
            'archivo_acta' => 'nullable|string|max:255',
        ]);
        $reportesFinal->update($request->only('resumen','incidencias','archivo_acta'));
        return redirect()->route('reportes-final.index')->with('success', 'Reporte final actualizado.');
    }

    public function destroy(ReporteFinal $reportesFinal)
    {
        $reportesFinal->delete();
        return back()->with('success', 'Reporte eliminado.');
    }
}
