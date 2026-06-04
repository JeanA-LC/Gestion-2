<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistorialPostulacion extends Model
{
    protected $table = 'historial_postulacion';
    protected $primaryKey = 'id_historial';
    public $timestamps = false;
    protected $guarded = [];

    public function postulacion()
    {
        return $this->belongsTo(PostulacionPersonero::class, 'id_postulacion');
    }
}
