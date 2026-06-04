<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class ReporteFinal extends Model
{
    protected $table = 'reporte_final';
    protected $primaryKey = 'id_reporte_final';
    public $timestamps = false;
    protected $guarded = [];

    public function asignacion()
    {
        return $this->belongsTo(AsignacionPersonero::class, 'id_asignacion');
    }
}
