<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReporteEstado extends Model
{
    protected $table = 'reporte_estado';
    protected $primaryKey = 'id_reporte_estado';
    public $timestamps = false;
    protected $guarded = [];

    public function asignacion()
    {
        return $this->belongsTo(AsignacionPersonero::class, 'id_asignacion');
    }
}
