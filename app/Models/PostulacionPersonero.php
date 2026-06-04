<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostulacionPersonero extends Model
{
    protected $table='postulacion_personero';
    protected $primaryKey='id_postulacion';
    public $timestamps=false;
    protected $guarded=[];

    public function interesado()
    {
        return $this->belongsTo(Interesado::class,'id_interesado');
    }

    public function historial()
    {
        return $this->hasMany(HistorialPostulacion::class,'id_postulacion');
    }

    public function capacitaciones()
    {
        return $this->hasMany(PostulacionCapacitacion::class,'id_postulacion');
    }

    public function intentos()
    {
        return $this->hasMany(IntentoEvaluacion::class,'id_postulacion');
    }

    public function credencial()
    {
        return $this->hasOne(Credencial::class,'id_postulacion');
    }

    public function asignaciones()
    {
        return $this->hasMany(AsignacionPersonero::class,'id_postulacion');
    }
}
