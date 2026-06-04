<?php

namespace App\Http\Controllers;

use App\Models\Credencial;
use App\Models\PostulacionPersonero;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CredencialController extends Controller
{
    public function index()
    {
        $credenciales = Credencial::with('postulacion.interesado.persona')
            ->orderByDesc('id_credencial')->paginate(15);

        // Postulaciones aprobadas sin credencial aún
        $postulaciones = PostulacionPersonero::with('interesado.persona')
            ->where('estado', 'APROBADO')
            ->doesntHave('credencial')
            ->orderBy('id_postulacion')
            ->get();

        return view('credencial.index', compact('credenciales', 'postulaciones'));
    }

    public function show(Credencial $credencial)
    {
        $credencial->load('postulacion.interesado.persona');
        return view('credencial.show', compact('credencial'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_postulacion'    => 'required|exists:postulacion_personero,id_postulacion|unique:credencial,id_postulacion',
            'fecha_emision'     => 'required|date',
            'fecha_vencimiento' => 'required|date|after:fecha_emision',
        ]);

        Credencial::create([
            'id_postulacion'    => $request->id_postulacion,
            'codigo_qr'         => strtoupper(Str::random(16)),
            'fecha_emision'     => $request->fecha_emision,
            'fecha_vencimiento' => $request->fecha_vencimiento,
            'estado'            => 'ACTIVA',
        ]);

        return redirect()->route('credenciales.index')->with('success', 'Credencial emitida.');
    }
}
