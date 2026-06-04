<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\Interesado;
use App\Models\PostulacionPersonero;
use App\Models\AsignacionPersonero;
use App\Models\Credencial;
use App\Models\ReporteEstado;
use App\Models\LinkInvitacion;

class DashboardController extends Controller
{
    public function index()
    {
        $user  = auth()->user();
        $roles = $user->roles->pluck('nombre');

        if ($roles->contains('Administrador')) {
            return $this->adminDashboard();
        }

        if ($roles->contains('Coordinador')) {
            return $this->coordinadorDashboard($user);
        }

        if ($roles->contains('Personero')) {
            return $this->personeroDashboard($user);
        }

        if ($roles->contains('Simpatizante')) {
            return view('dashboards.simpatizante', compact('user'));
        }

        return view('dashboard'); // fallback
    }

    private function adminDashboard()
    {
        $stats = [
            'personas'      => Persona::count(),
            'interesados'   => Interesado::count(),
            'postulaciones' => PostulacionPersonero::count(),
            'aprobados'     => PostulacionPersonero::where('estado','APROBADO')->count(),
            'pendientes'    => PostulacionPersonero::where('estado','PENDIENTE')->count(),
            'rechazados'    => PostulacionPersonero::where('estado','RECHAZADO')->count(),
            'credenciales'  => Credencial::where('estado','ACTIVA')->count(),
            'asignaciones'  => AsignacionPersonero::count(),
            'confirmados'   => AsignacionPersonero::where('estado','CONFIRMADO')->count(),
        ];
        $ultimasPostulaciones = PostulacionPersonero::with('interesado.persona')
            ->latest('id_postulacion')->limit(6)->get();
        $ultimosReportes = ReporteEstado::with('asignacion.postulacion.interesado.persona')
            ->latest('fecha_reporte')->limit(6)->get();

        return view('dashboards.admin', compact('stats','ultimasPostulaciones','ultimosReportes'));
    }

    private function coordinadorDashboard($user)
    {
        $misInteresados  = Interesado::where('id_usuario', $user->id_usuario)->count();
        $misLinks        = LinkInvitacion::where('id_coordinador', $user->id_usuario)->count();
        $totalReferidos  = LinkInvitacion::where('id_coordinador', $user->id_usuario)->sum('veces_usado');
        $postulacionesPendientes = PostulacionPersonero::where('estado','PENDIENTE')->count();

        $ultimosInteresados = Interesado::with('persona','tipoActor')
            ->where('id_usuario', $user->id_usuario)
            ->latest('id_interesado')->limit(8)->get();

        return view('dashboards.coordinador', compact(
            'user','misInteresados','misLinks','totalReferidos',
            'postulacionesPendientes','ultimosInteresados'
        ));
    }

    private function personeroDashboard($user)
    {
        // Buscar asignaciones via persona vinculada al usuario
        $asignaciones = collect();
        if ($user->id_persona) {
            $asignaciones = AsignacionPersonero::with([
                    'postulacion.interesado.persona',
                    'tipoPersonero',
                    'reportesEstado',
                ])
                ->whereHas('postulacion.interesado', function($q) use ($user) {
                    $q->whereHas('persona', function($q2) use ($user) {
                        $q2->where('id_persona', $user->id_persona);
                    });
                })
                ->orderByDesc('id_asignacion')
                ->get();
        }

        return view('dashboards.personero', compact('user','asignaciones'));
    }
}
