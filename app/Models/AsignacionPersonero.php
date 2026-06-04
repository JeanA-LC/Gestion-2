<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AsignacionPersonero extends Model
{
    protected $table = 'asignacion_personero';
    protected $primaryKey = 'id_asignacion';
    public $timestamps = false;
    protected $guarded = [];

    public function postulacion()
    {
        return $this->belongsTo(PostulacionPersonero::class, 'id_postulacion');
    }

    public function tipoPersonero()
    {
        return $this->belongsTo(TipoPersonero::class, 'id_tipo_personero');
    }

    public function reportesEstado()
    {
        return $this->hasMany(ReporteEstado::class, 'id_asignacion');
    }

    public function reportesFinales()
    {
        return $this->hasMany(ReporteFinal::class, 'id_asignacion');
    }
}
