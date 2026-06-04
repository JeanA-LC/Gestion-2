<?php

namespace App\Http\Controllers;

use App\Models\LinkInvitacion;
use App\Models\Persona;
use App\Models\Interesado;
use App\Models\TipoActorPolitico;
use Illuminate\Http\Request;

class RegistroPublicoController extends Controller
{
    public function show(string $token)
    {
        $link = LinkInvitacion::where('token', $token)
            ->where('activo', true)
            ->firstOrFail();

        $link->load('coordinador');

        return view('registro-publico.form', compact('link'));
    }

    public function store(Request $request, string $token)
    {
        $link = LinkInvitacion::where('token', $token)
            ->where('activo', true)
            ->firstOrFail();

        $request->validate([
            'dni'       => 'required|string|size:8|unique:persona,dni',
            'nombres'   => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'telefono'  => 'nullable|string|max:20',
            'correo'    => 'nullable|email|max:150',
            'direccion' => 'nullable|string|max:255',
        ], [
            'dni.unique' => 'Este DNI ya está registrado en el sistema.',
            'dni.size'   => 'El DNI debe tener exactamente 8 dígitos.',
        ]);

        // 1. Crear persona
        $persona = Persona::create($request->only('dni','nombres','apellidos','telefono','correo','direccion'));

        // 2. Obtener o crear tipo actor "Simpatizante"
        $tipoActor = TipoActorPolitico::firstOrCreate(
            ['nombre' => 'Simpatizante'],
            ['descripcion' => 'Ciudadano captado a través de invitación de coordinador']
        );

        // 3. Crear interesado vinculado al coordinador del link
        Interesado::create([
            'id_persona'         => $persona->id_persona,
            'id_usuario'         => $link->id_coordinador,
            'id_tipo_actor'      => $tipoActor->id_tipo_actor,
            'id_comite'          => null,
            'id_link_invitacion' => $link->id,
        ]);

        // 4. Incrementar contador
        $link->increment('veces_usado');

        return redirect()->route('registro.gracias', $token);
    }

    public function gracias(string $token)
    {
        $link = LinkInvitacion::where('token', $token)->firstOrFail();
        $link->load('coordinador');
        return view('registro-publico.gracias', compact('link'));
    }
}
